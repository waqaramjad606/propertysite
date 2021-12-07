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

  $query1 = mysqli_query($conn, "SELECT * FROM user");
  $totalusers = mysqli_num_rows($query1);  

  $query2 = mysqli_query($conn, "SELECT * FROM property where is_active=0");
  $totalpending = mysqli_num_rows($query2);

  $query3 = mysqli_query($conn, "SELECT * FROM property where is_active=1");
  $totalactive = mysqli_num_rows($query3);

  // $query4 = mysqli_query($conn, "SELECT * FROM users where status='BLOCKED'");
  // $totalblocked = mysqli_num_rows($query4);

 
  
 ?>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include "includes/sidebar.php";  ?>
    <script>
      $(document).ready(function() { 
        $('#adminli').addClass('active');
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
            <h1 class="h3 mb-0 text-gray-800">Admin Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Users</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalusers ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>    
             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Active Properties</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalactive ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-check fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

              <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Disable Properties</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalpending ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-clipboard fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Blocked Users</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-ban fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div> -->
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
              <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="ordertable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>User_ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>City</th>
                      <th>ZIP</th>
                      <th>Subscription</th>
                      <th>Subscription Date</th>
                      <th>Registeration</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>

                  <tbody>
                    <?php 
                      $allusersquery = mysqli_query($conn, "SELECT * FROM user_detail");
                      while($allusers = mysqli_fetch_assoc($allusersquery)){
                     ?>
                    <tr>
                      <td><?php echo $allusers['user_id']; ?></td>
                      <td><?php echo $allusers['first_name'].' '.$allusers['last_name']; ?></td>
                      <td><?php echo $allusers['email']; ?></td>
                      <td><?php echo $allusers['phone']; ?></td>

                      <td><?php echo $allusers['city']; ?></td>
                      <td><?php echo $allusers['zip']; ?></td>
                      <td><?php
                        if($allusers['is_subscription']==0){
                          echo "Un-Paid";
                        }else{
                          echo "Paid";
                        }
                        ?></td>
                        <td><?php echo $allusers['subscription_date']; ?></td>
                      <td><?php echo $allusers['date_posted']; ?></td>
                      <td style="padding: 1px;">
                        
                        <button class=" btn btn-info mybtn" name="getuserdetails" id="<?php echo $allusers['user_id']; ?>" onclick="selectuser(this.id);">View User</button>

                        <button class=" btn btn-danger mybtn" name="" id="<?php echo $allusers['user_id']; ?>" onclick="deleteuser(this.id);" >Delete User</button>
                        
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
            function selectuser(user_id){
              window.location.href = "userdetail?userid="+user_id;
            }
            function deleteuser(user_id){
              swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this User!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  var userid=user_id;
                  $.ajax({
                    method:"post",
                    url:"../serverside/ajax.php",
                    data:{deleteuserbyadmin:"yes",user_id:userid,sitekey:"p%<onZmUeePZ{{",func:"1.33"},
                    success:function(data){
                      if(data.trim()=="deleted"){
                        swal("Deleted!","User Deleted!","success").then((value) => {
                            window.location.href = "admin";
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
          <!-- all users div ends here -->    


        </div>
<?php 

  if(isset($_POST['updatebtn'])){
    $pass=$_POST['pass'];
    $hashedPassword=hash('sha256', $pass);
    $updatequery="update users set password='$hashedPassword' where username='admin'";
    $update=mysqli_query($con,$updatequery);
    if($update){
      ?>

      <script type="text/javascript">
      $(document).ready(function() {
        swal("Success!", "Password Updated!", "success");               
          });
      </script>
      <?php 
    }else{
      ?>
      <script type="text/javascript">
      $(document).ready(function() {
        swal("Error!", "Not updated because of some error!", "error");               
          });
      </script>
      <?php 
    }
  }
         ?>
        <!-- <form method="post" action="admin">
            <div class="row">


              <div class="form-group col-lg-4">
                <label for="exampleInputPassword1">Update Password</label>
                <input type="password" class="form-control" name="pass" placeholder=" New Password" id="pass" required onkeyup="checkpassword();">
                <input type="password" class="form-control mt-2"  placeholder="Confirm New Password" id="cpass" required onkeyup="checkpassword();">
                <button type="submit" class="btn btn-primary" style="margin-top:5px;" name="updatebtn" id="updatebtn">Update</button>
              </div>
            
            
          </form> -->
      </div>
      <!-- End of Main Content -->
<script type="text/javascript">

  function checkpassword(){
    // alert('a');
      var pass=document.getElementById("pass").value;
      var cpass=document.getElementById("cpass").value;
      if(pass!=cpass){
        document.getElementById("updatebtn").disabled = true;
        document.getElementById("cpass").classList.add("red");
        document.getElementById("pass").classList.add("red");
      }else{
        document.getElementById("updatebtn").disabled = false;
        document.getElementById("cpass").classList.remove("red");
        document.getElementById("pass").classList.remove("red");
      }


    }

</script>
<style>
  .red{
    border-color: red;
  }
  .mybtn{
    margin-top: 2px;
    height: 40px;
    font-size: 11px;
    line-height: 1;
    font-weight: bold;
  }
</style>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Estate Agency 2020</span>
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

  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>

  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="js/demo/datatables-demo.js"></script>
</body>

</html>
