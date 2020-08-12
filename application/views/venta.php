<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Venta</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url();?>assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <script src="<?php echo base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url();?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Administrador</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="Inicio">
          <i class="fas fa-home"></i>
          <span>Inicio</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      
      <!-- Heading -->

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="NuevoCliente">
          <i class="far fa-user"></i>
          <span>Registrar nuevo cliente</span></a>
      </li>
      <hr class="sidebar-divider">
      

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="clientes">
          <i class="fas fa-fw fa-user"></i>
          <span>Clientes</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <li class="nav-item active">
        <a class="nav-link" href="venta">
          <i class="fas fa-shopping-cart"></i>
          <span>Realizar venta</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="VentasRealizadas">
          <i class="fas fa-dollar-sign"></i>
          <span>Ventas realizadas</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="NuevoProducto">
          <i class="fas fa-box"></i>
          <span>Registrar producto</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="ProductosRegistrados">
          <i class="fas fa-clipboard"></i>
          <span>Lista de productos</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

        

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <?php
                if($TotalCumpleañeros>0)
                {
                  echo'<span class="badge badge-danger badge-counter">'.$TotalCumpleañeros.'</span>';
                }
                 ?>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notificaciones
                </h6>
                <?php
                $Fecha = date("Y-m-d");
                if($TotalCumpleañeros>0){
                foreach ($cumpleañeros as $var){
                  echo '<a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-birthday-cake"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">'.$Fecha.'</div>
                    <span class="font-weight-bold">Hoy es cumpleaños de: '.$var->nombre.'</span>
                  </div>
                </a>';
                }
                }
                else{
                echo '<a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-bell"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">'.$Fecha.'</div>
                    <span class="font-weight-bold">Sin notificaciones</span>
                  </div>
                </a>';
              }
                ?>
                
              </div>
            </li>

            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Venta</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="card-body">
             
              <div class="row">
                <div class="col-sm-3"><lable> Fecha: <br><input type="text" step="any" name="fecha" autocomplete="off" required id="fecha" value="<?php echo date('Y-m-d'); ?>" style="border: none;"></lable></div><br><br>
                <?php
                  if(isset($_SESSION['cliente'])){
                    echo '<div class="col-sm-4"><lable> Nombre: <br><input type="text" name="cliente" id="cliente" size="30" value="'.$_SESSION["cliente"].'" readonly></lable></div><br><br><br>';
                  }
                  else{
                    echo'<div class="col-sm-4"><lable> Nombre: <br><input list="clientes" name="cliente" id="cliente" size="30">
                    <datalist id="clientes" name="clientes">';
                      foreach ($clientes as $var){
                        echo '<option value="'.$var->nombre.'">';
                      }
                    echo '</datalist></lable></div><br><br><br>';
                  }
                 ?>
                
                <div class="col-sm-4"><lable> Producto: <br><?php 
                  echo '<input list="productos" name="producto" id="producto" size="30">
                    <datalist id="productos" name="productos">';
                      foreach ($productos as $prod){
                        echo '<option value="'.$prod->producto.'">';
                      }
                    echo '</datalist></lable>'; ?></lable></div>
                <div class="col-sm-3"><lable> Cantidad: <br><input type="number" step="any" name="cantidad" autocomplete="off" required id="cantidad" onchange="CalcularTotal(); clickBtn();"></lable></div>
                <div class="col-sm-3"><lable> Precio unitario: <br><input type="number" step="any" name="precio" autocomplete="off" required id="precio"></lable></div>
                <div class="col-sm-3"><lable> Total: <br><input type="number" step="any" name="total" autocomplete="off" required id="total" readonly></lable></div>
                <div class="col-sm-3"><br><button class="btn btn-info" id="btnCarrito" ><i class='fas fa-shopping-cart'></i> Agregar producto</button></div>
              </div><br><br>
              <a href="<?php echo base_url()?>FinalizarCompra" class="btn btn-success">Finalizar compra</a>
              <a href="<?php echo base_url()?>CancelarCompra" class="btn btn-danger">Cancelar compra</a>
              <br>
              <table class="table">
                <thead>
                  <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach ($carrito as $car) {
                      echo'
                        <tr>
                          <td>'.$car->producto.'</td>
                          <td>'.$car->cantidad.'</td>
                          <td>$'.$car->preciototal.'</td>
                          <td><button id="Eliminar" title="Eliminar" class="btn btn-danger" onclick="EliminarProductoCarrito('.$car->idcarrito.')" ><i class="fas fa-trash"></i></button></td>
                        </tr>
                      ';
                    }
                  ?>
                </tbody>
                <tfoot>
                    <tr>
                      <td></td>
                      <td style="font-weight: bold;">Total venta:</th>
                      <td><?php echo "$$total";?></td>
                    </tr>
                </tfoot>
              </table>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url();?>assets/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url();?>assets/js/sb-admin-2.min.js"></script>


</body>

</html>

<script>
  function CalcularTotal(){
    var unitario=document.getElementById("precio").value;
    var cantidad=document.getElementById("cantidad").value;
    document.getElementById("total").value=unitario*cantidad;
  }
</script>

<script>
  $("#btnCarrito").click(function(){ 
    var post_url = "<?php echo base_url();?>Controlador_Principal/AgregarCarrito";
    $.ajax({
      type: "POST",
      url: post_url,
      data: { 
        "fecha":$("#fecha").val(), 
        "cliente":$("#cliente").val(), 
        "producto":$("#producto").val(),
        "cantidad":$("#cantidad").val(),
        "precio":$("#precio").val(),
        "total":$("#total").val()
      },
      success: function(data){
            Swal.fire({
              position: "center",
              icon: "success",
              title: "Producto agregado correctamente",
              showConfirmButton: true,
            }).then(function(result){
              if (result.value) {
                  window.location.href = "venta";
                }
            })
            $('#producto').val(""); 
            $('#cantidad').val(""); 
            $('#precio').val("");
          
        
      }
    });
  });
</script>

<script>
    function EliminarProductoCarrito(id){
      var post_url = "<?php echo base_url();?>Controlador_Principal/EliminarProductoCarrito";
      var id=id;
      $.ajax({
        type:"POST",
        url:post_url,
        data:{
          "id":id
        },
        success: function(data){
          Swal.fire({
              position: "center",
              icon: "success",
              title: "producto eliminado correctamente",
              showConfirmButton: true
            }).then(function (result) {
                if (result.value) {
                  window.location.href = "venta";
                }
              })
        }
      })
    }
</script>

<script>
  $("#producto").change(function(){ 
    var post_url = "<?php echo base_url();?>Controlador_Principal/ConsultarPrecio";
    $.ajax({
      type: "POST",
      url: post_url,
      data: { 
        "producto":$("#producto").val()
      },
      success: function(response){
        $.each(JSON.parse(response),function(value,valor){
          $('#precio').val(valor.preciounitario);
        })        
      }
    });
  });
</script>

<script>
  function clickBtn(){
    document.getElementById("btnCarrito").click();
  }
</script>