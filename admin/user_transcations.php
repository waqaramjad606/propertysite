<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Panel</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
<?php 
  session_start();
   include '../includes/connection.php';
   $conn = connecttoDB("p%<onZmUeePZ{{");
  if (!isset($_SESSION['adminlogged1'])) {
    header("Location:login");
  }


 
  $querytrans = mysqli_query($conn, "SELECT * FROM paymentinfo");
  $totaltrans = mysqli_num_rows($querytrans);  

 

 ?>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include "includes/sidebar.php";  ?>
    <script>
      $(document).ready(function() { 
        $('#tranli').addClass('active');
      });
    </script>
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

          <!-- Topbar Search -->
   

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Messages -->


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <span><i class="fas fa-arrow-down fa-sm fa-fw mr-2 text-gray-400"></i></span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

               <!--  <a class="dropdown-item" href="setting.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a> -->

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout" >
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
            <h1 class="h3 mb-0 text-gray-800">User Transcation</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Transcations</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totaltrans; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-building fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>    
     

          
          </div>

          <!-- Content Row -->
        <div class="container-fluid">

<script>

</script>
<style>
  .hideit{
    display: none;
  }
</style>


                    <!-- All users div -->
  <div class="card shadow mb-4" id="allordersdiv">

    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Transcation Details</h6>
    </div>
    <div class="card-body">
      
      <div class="table-responsive">
        <table class="table table-bordered" id="ordertable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>User Id</th>
              <th>Trancation Id</th>
              <th>Payment Amount</th>
              <th>Payment Status</th>
              <th>Payment Date</th>
            </tr>
          </thead>

          <tbody>
            <?php 
              // $alltranscationsquery = mysqli_query($con, "SELECT * FROM cities");
              while($alltranscations = mysqli_fetch_assoc($querytrans)){
              ?>
            <tr>
              <td><?php echo $alltranscations['id']; ?></td> 
              <td><?php echo $alltranscations['user_id']; ?></td>                      
              <td><?php echo $alltranscations['tnxid']; ?></td>
              <td><?php echo $alltranscations['payment_amount']; ?></td>
              <td><?php echo $alltranscations['payment_status']; ?></td>
              <td><?php echo $alltranscations['createdtime']; ?></td> 
            </tr>
            <?php 
              }
              ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
 

        </div>


      </div>
      <!-- End of Main Content -->

<style>
  .red{
    border-color: red;
  }
  .mybtn{
    margin-top: 2px;
    height: 40px;
    font-size: 15px;
    line-height: 1;
    /*font-weight: bold;*/
  }
</style>
      <!-- Footer -->
      <?php include "includes/adminfooter.php"; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>

  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="js/demo/datatables-demo.js"></script>
</body>

</html>
