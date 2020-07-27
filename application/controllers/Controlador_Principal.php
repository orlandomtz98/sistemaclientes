<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    class Controlador_Principal extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->model('Modelo_Principal');
        date_default_timezone_set('America/Mexico_City'); 
    }

      public function Inicio()
      {
        $numCumpleañeros=$this->Modelo_Principal->numCumpleañeros();
        foreach ($numCumpleañeros as $var) {
            $TotalCumpleañeros=$var->total;
        }
        $clientes=$this->Modelo_Principal->numClientes();
        foreach ($clientes as $var2) {
          $numClientes=$var2->clientes;
        }
        $cumpleañeros=$this->Modelo_Principal->cumpleañeros();
        $totalVenta=$this->Modelo_Principal->totalVentas();
        foreach ($totalVenta as $var3) {
          $total=$var3->total;
        }
        $producto=$this->Modelo_Principal->ProductoMasVendido();
        foreach ($producto as $var4) {
          $MasVendido=$var4->producto;
        }
        if($MasVendido==null){
          $MasVendido="Sin producto";
        }
        else{
          $MasVendido=$MasVendido;
        }

        $ventasMes=$this->Modelo_Principal->VentasMes();
        foreach ($ventasMes as $var5) {
          $MontoVentasMes=$var5->total;
        }
        $this->load->view("inicio",compact("TotalCumpleañeros","cumpleañeros","numClientes","total","MasVendido","MontoVentasMes"));
      }

      public function RegistrarCliente_view(){
        
        $numCumpleañeros=$this->Modelo_Principal->numCumpleañeros();
        foreach ($numCumpleañeros as $var) {
            $TotalCumpleañeros=$var->total;
        }
        $cumpleañeros=$this->Modelo_Principal->cumpleañeros();
        $this->load->view("RegistrarCliente",compact("TotalCumpleañeros","cumpleañeros"));
      }

      public function RegistrarCliente(){
        $nombre=$this->input->post("nombre");
        $direccion=$this->input->post("direccion");
        $edad=$this->input->post("edad");
        $tel=$this->input->post("tel");
        $cel=$this->input->post("cel");
        $nacimiento=$this->input->post("nacimiento");
        $this->Modelo_Principal->RegistrarCliente($nombre,$direccion,$edad,$tel,$cel,$nacimiento);
        //redirect("NuevoCliente");
      }

      public function MostrarClientes(){
        $numCumpleañeros=$this->Modelo_Principal->numCumpleañeros();
        foreach ($numCumpleañeros as $var) {
            $TotalCumpleañeros=$var->total;
        }
        $cumpleañeros=$this->Modelo_Principal->cumpleañeros();
        $clientes=$this->Modelo_Principal->InfoClientes();
        $this->load->view("clientes", compact("clientes","TotalCumpleañeros","cumpleañeros"));
      }

      public function Venta_view(){
        $numCumpleañeros=$this->Modelo_Principal->numCumpleañeros();
        foreach ($numCumpleañeros as $var) {
            $TotalCumpleañeros=$var->total;
        }
        $carrito=$this->Modelo_Principal->ConsultarCarrito();
        $cumpleañeros=$this->Modelo_Principal->cumpleañeros();
        $clientes=$this->Modelo_Principal->InfoClientes();
        $totalVenta=$this->Modelo_Principal->totalVenta();
        foreach ($totalVenta as $var2) {
          $total=$var2->total;
        }
        $productos=$this->Modelo_Principal->Productos();
        $this->load->view("venta", compact("clientes","TotalCumpleañeros","cumpleañeros","carrito","total","productos"));
      }

      public function AgregarCarrito(){
        $cliente=$this->input->post("cliente");
        $fecha=$this->input->post("fecha");
        $producto=$this->input->post("producto");
        $cantidad=$this->input->post("cantidad");
        $total=$this->input->post("total");
        $_SESSION['cliente']=$cliente;
        $this->Modelo_Principal->AgregarCarrito($cliente,$fecha,$producto,$cantidad,$total);
        //redirect("venta");
      }

      public function FinalizarCompra(){
        $carrito=$this->Modelo_Principal->ConsultarCarrito();
        foreach ($carrito as $var) {
          $cliente=$var->cliente;
          $fecha=$var->fecha;
          $producto=$var->producto;
          $cantidad=$var->cantidad;
          $total=$var->preciototal;
          $this->Modelo_Principal->AgregarVenta($cliente,$fecha,$producto,$cantidad,$total);
        }

        $this->Modelo_Principal->VaciarCarrito($cliente);
        session_destroy();
        redirect("Inicio");
      }


      public function CancelarCompra(){
        $cliente=$_SESSION['cliente'];
        $this->Modelo_Principal->VaciarCarrito($cliente);
        session_destroy();
        redirect("Inicio");
      }

      public function EliminarCliente(){
        $id=$this->input->post("id");
        $this->Modelo_Principal->EliminarCliente($id);
      }

      public function EliminarProductoCarrito(){
        $id=$this->input->post("id");
        $this->Modelo_Principal->EliminarProductoCarrito($id);
      }

      public function MostrarVentasRealizadas(){
        $numCumpleañeros=$this->Modelo_Principal->numCumpleañeros();
        foreach ($numCumpleañeros as $var) {
            $TotalCumpleañeros=$var->total;
        }
        $cumpleañeros=$this->Modelo_Principal->cumpleañeros();
        $ventas=$this->Modelo_Principal->VentasRealizadas();
        $this->load->view("VentasRealizadas", compact("ventas","TotalCumpleañeros","cumpleañeros"));
      }

      public function DatosGrafica(){
        $result=$this->Modelo_Principal->DatosGrafica();
        echo json_encode($result);
      }

      public function ConsultarPrecio(){
        $producto=$this->input->post("producto");
        $result=$this->Modelo_Principal->ConsultarPrecio($producto);
        echo json_encode($result);
      }

      public function RegistrarNuevoProducto_view(){
        $numCumpleañeros=$this->Modelo_Principal->numCumpleañeros();
        foreach ($numCumpleañeros as $var) {
            $TotalCumpleañeros=$var->total;
        }
        $cumpleañeros=$this->Modelo_Principal->cumpleañeros();
        $this->load->view("RegistrarNuevoProducto",compact("TotalCumpleañeros","cumpleañeros"));
      }

      public function RegistrarNuevoProducto(){
        $nombre=$this->input->post("nombre");
        $precio=$this->input->post("precio");
        $this->Modelo_Principal->RegistrarNuevoProducto($nombre,$precio);
      }

      public function ListaProductos_view(){
        $numCumpleañeros=$this->Modelo_Principal->numCumpleañeros();
        foreach ($numCumpleañeros as $var) {
            $TotalCumpleañeros=$var->total;
        }
        $cumpleañeros=$this->Modelo_Principal->cumpleañeros();
        $productos=$this->Modelo_Principal->ListaProductos();
        $this->load->view("ProductosRegistrados",compact("TotalCumpleañeros","cumpleañeros","productos"));
      }

      public function ModificarProducto($id){
        $numCumpleañeros=$this->Modelo_Principal->numCumpleañeros();
        foreach ($numCumpleañeros as $var) {
            $TotalCumpleañeros=$var->total;
        }
        $cumpleañeros=$this->Modelo_Principal->cumpleañeros();
        $Datos=$this->Modelo_Principal->DatosProducto($id);
        foreach ($Datos as $var2) {
          $producto=$var2->producto;
          $precio=$var2->preciounitario;
          $id=$var2->idproductos;
        }
        $this->load->view("ModificarProducto",compact("producto","precio","TotalCumpleañeros","cumpleañeros","id"));
      }

      public function EliminarProducto(){
        $id=$this->input->post("id");
         $this->Modelo_Principal->EliminarProducto($id);
      }

      public function ModProducto(){
        $id=$this->input->post("id");
        $producto=$this->input->post("nombre");
        $precio=$this->input->post("precio");
        $this->Modelo_Principal->ModificarProducto($id,$producto,$precio);
      }

}?>