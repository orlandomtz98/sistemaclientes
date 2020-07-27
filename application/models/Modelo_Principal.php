<?php
    defined('BASEPATH') OR exit('No direct script access alowed');

	class Modelo_Principal extends CI_Model{

	function __construct(){
		$this->load->database();
		parent::__construct();
	}

	public function RegistrarCliente($nombre,$direccion,$edad,$tel,$cel,$nacimiento){
		$sql=$this->db->query("INSERT INTO clientes(nombre,direccion,edad,telefono,celular,nacimiento) VALUES('$nombre','$direccion','$edad','$tel','$cel','$nacimiento')");
	}

	public function numCumpleañeros(){
		$mes = date("m");
		$dia= date("d");
		$sql=$this->db->query("SELECT COUNT(nombre) as total FROM clientes where (SELECT DAYOFMONTH(nacimiento) = '$dia' and MONTH(nacimiento) = '$mes')")->result();
		return $sql;
	}

	public function cumpleañeros(){
		$mes = date("m");
		$dia= date("d");
		$sql=$this->db->query("SELECT * FROM clientes where (SELECT DAYOFMONTH(nacimiento) = '$dia' and MONTH(nacimiento) = '$mes')")->result();
		return $sql;
	}

	public function InfoClientes(){
		$sql=$this->db->query("SELECT * FROM clientes")->result();
		return $sql;
	}

	public function numClientes(){
		$sql=$this->db->query("SELECT COUNT(nombre) as clientes from clientes")->result();
		return $sql;
	}

	public function AgregarCarrito($cliente,$fecha,$producto,$cantidad,$total){
		$sql=$this->db->query("INSERT INTO carrito(cliente,fecha,producto,cantidad,preciototal)VALUES('$cliente','$fecha','$producto','$cantidad','$total')");
	}

	public function ConsultarCarrito(){
		$sql=$this->db->query("SELECT * FROM carrito")->result();
		return $sql;
	}

	public function AgregarVenta($cliente,$fecha,$producto,$cantidad,$total){
		$sql=$this->db->query("INSERT INTO ventas(cliente,fecha,producto,cantidad,preciototal)VALUES('$cliente','$fecha','$producto','$cantidad','$total')");
	}

	public function VaciarCarrito($cliente){
		$sql=$this->db->query("DELETE FROM carrito where cliente='$cliente'");
	}

	public function totalVenta(){
		$sql=$this->db->query("SELECT SUM(preciototal) as total from carrito")->result();
		return $sql;
	}

	public function totalVentas(){
		$sql=$this->db->query("SELECT SUM(preciototal) as total from ventas")->result();
		return $sql;
	}

	public function EliminarCliente($id){
		$sql=$this->db->query("DELETE FROM clientes where idClientes='$id'");
	}

	public function EliminarProductoCarrito($id){
		$sql=$this->db->query("DELETE FROM carrito where idcarrito='$id'");
	}

	public function VentasRealizadas(){
		$sql=$this->db->query("SELECT * FROM ventas order by fecha desc")->result();
		return $sql;
	}

	public function DatosGrafica(){
		$sql=$this->db->query("SELECT producto, sum(preciototal) total from ventas group by producto order by total desc limit 5")->result();
		return $sql;
	}

	public function Productos(){
		$sql=$this->db->query("SELECT * FROM productos")->result();
		return $sql;
	}

	public function ConsultarPrecio($producto){
		$sql=$this->db->query("SELECT preciounitario from productos where producto='$producto'")->result();
		return $sql;
	}

	public function ProductoMasVendido(){
		$sql=$this->db->query("SELECT producto, sum(cantidad) total from ventas group by producto order by total desc limit 1")->result();
		return $sql;
	}

	public function VentasMes(){
		$mes=date("m");
		$sql=$this->db->query("SELECT sum(preciototal) total from ventas where (SELECT MONTH(fecha)='$mes')")->result();
		return $sql;
	}

	public function RegistrarNuevoProducto($nombre,$precio){
		$sql=$this->db->query("INSERT INTO productos(producto,preciounitario) values('$nombre','$precio')");
	}

	public function ListaProductos(){
		$sql=$this->db->query("SELECT * FROM productos")->result();
		return $sql;
	}

	public function DatosProducto($id){
		$sql=$this->db->query("SELECT * FROM productos where idproductos='$id'")->result();
		return $sql;
	}

	public function EliminarProducto($id){
		$sql=$this->db->query("DELETE FROM productos where idproductos='$id'");
	}

	public function ModificarProducto($id,$producto,$precio){
		$sql=$this->db->query("UPDATE productos set producto='$producto',preciounitario='$precio' where idproductos='$id'");
	}
}?>
