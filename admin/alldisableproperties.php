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


 
  $query1 = mysqli_query($conn, "SELECT * FROM property where is_active=0");
  $totalapartments = mysqli_num_rows($query1);  

  
 ?>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include "includes/sidebar.php";  ?>
    <script>
      $(document).ready(function() { 
        $('#disableli').addClass('active');
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
            <h1 class="h3 mb-0 text-gray-800">Disable Properties</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Disable Properties</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalapartments; ?></div>
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
      <h6 class="m-0 font-weight-bold text-primary">All Apartments</h6>
    </div>
    <div class="card-body">
      
      <div class="table-responsive">
        <table class="table table-bordered" id="ordertable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>User Id</th>
              <th>Title</th>
              <th>City</th>
              <th>Address</th>
              <th>Purchase Price</th>
              <th>Area</th>
              <th>Type</th>
              <th>Property Type</th>
              <th>Creation Date</th>
              <th>Action</th>

              
            </tr>
          </thead>

          <tbody>
            <?php 
              // $allapartmentsquery = mysqli_query($con, "SELECT * FROM cities");
              while($allapartments = mysqli_fetch_assoc($query1)){
              ?>
            <tr>
              <td><?php echo $allapartments['id']; ?></td> 
              <td><?php echo $allapartments['user_id']; ?></td>                      
              <td><?php echo $allapartments['project_name']; ?></td>
              <td><?php echo $allapartments['city']; ?></td>
              <td><?php echo $allapartments['str_addr1']; ?></td>
              <td><?php echo $allapartments['purchase_price']; ?></td>
              <td><?php echo $allapartments['square_footage']; ?></td>
              <td><?php echo $allapartments['type']; ?></td>
              <td><?php echo $allapartments['property_type']; ?></td>
              <td><?php echo $allapartments['date_activated']; ?></td>
              <td style="padding: 1px;">
                
                <button class=" btn btn-info mybtn" name="updatecitybtn" id="<?php echo $allapartments['id']; ?>" onclick="selectapartment(this.id)">View</button>

                <button class=" btn btn-danger mybtn" name="" id="<?php echo $allapartments['id']; ?>" onclick="deleteapartment(this.id);" >Delete</button>
                <?php if($allapartments['is_active']=="0") {?>
                <button class=" btn btn-success mybtn" name="" id="<?php echo $allapartments['id']; ?>" onclick="enableproperty(this.id);" >Enable</button>
                <?php } ?>
                
              </td>
              
            </tr>
            <?php 
              }
              ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script>
    function selectapartment(apartmentid){
      window.location.href = "apartmentdetail?apartmentid="+apartmentid;
    }
    function deleteapartment(apartment_id){
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this Apartment!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            method:"post",
            url:"../serverside/ajax.php",
            data:{deleteapartmentbyadmin:"yes",apartment_id:apartment_id,sitekey:"p%<onZmUeePZ{{",func:"1.55"},
            success:function(data){
              if(data.trim()=="deleted"){
                swal("Deleted!","Apartment Deleted!","success").then((value) => {
                    window.location.href = "alldisableproperties";
                  });
                
              }else{
                alert(data);
              }
            }
          });
        } else {
          // swal("Your imaginary file is safe!");
        }
      });
      
      
    }
  </script>
  <!-- Block and Unblock user scripts -->    
<script>
    function enableproperty(property_id){
      $.ajax({
        type:"post",
        url:"../serverside/ajax.php",
        data:{property_id:property_id,func: "1.8",sitekey:"p%<onZmUeePZ{{"},
        success:function(response){
          console.log(response);
          if(response.trim()=="true"){
            swal("Done","Property enable successfully!","success").then((value)=>{
              location.reload();
            });
          }else{
            swal("Error!","Error while enable property!","error");
          }
        }
      });
    }
    function disableproperty(property_id){
      $.ajax({
        type:"post",
        url:"../serverside/ajax.php",
        data:{property_id:property_id,func: "1.9",sitekey:"p%<onZmUeePZ{{"},
        success:function(response){
          if(response.trim()=="true"){
            swal("Done","Property disable successfully!","success").then((value)=>{
              location.reload();
            });
          }else{
            swal("Error!","Error while disable property!","error");
          }
        }
      });
    }

</script>

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
