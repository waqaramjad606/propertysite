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
  if(!isset($_GET['userid'])){
    header("location:admin");
  }
  $getuserid = $_GET['userid'];

  $query1 = mysqli_query($conn, "SELECT * FROM user_detail where user_id = '$getuserid'");
  $userdetail = mysqli_fetch_assoc($query1);



 ?>
 <script>
   $(document).ready(function() {
    var statusvalue = '<?php echo $userdetail['status']; ?>';
    $('#accountstatus').val(statusvalue);

    var emailstatus = '<?php echo $userdetail['emailverified']; ?>';
    $('#emailstatus').val(emailstatus);

   });
 </script>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include "includes/sidebar.php"; ?>
    
    <script>
      
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
              <h6 class="m-0 font-weight-bold text-primary"><?php echo $userdetail['first_name'].' '.$userdetail['last_name'].' Details'; ?></h6>
            </div>
            <div class="card-body">
                <!-- Default form register -->

          <form class="text-center border border-light p-5" action="#!" id="updateuserbyadmin" style="padding-bottom: 0px !important;">

              <p class="h4 mb-4"><?php echo $userdetail['first_name'].' '.$userdetail['last_name'].' Profile'; ?></p>
              
              <div class="form-row mb-2">
                  <div class="col-lg-6 col-md-12">
                      <label for="" style="float:left;">First Name</label>
                      <input type="text" name="firstname" class="form-control" placeholder="First name" value="<?php echo $userdetail['first_name']; ?>" required >
                  </div>
                  <div class="col-lg-6 col-md-12">
                      <label for="" style="float:left;">Last Name</label>
                      <input type="text" name="lastname" class="form-control" placeholder="Last name" value="<?php echo $userdetail['last_name']; ?>" required >
                  </div>
              </div>
              <div class="form-row mb-2">
                <div class="col-lg-6 col-md-12">
                  <label for="" style="float:left;">Email</label>
                  <input type="email" name="email" class="form-control mb-1" placeholder="E-mail" value="<?php echo $userdetail['email']; ?>" required>
                </div>

                <div class="col-lg-6 col-md-12">
                  <label for="" style="float:left;">City</label>
                  <input type="text" name="city" class="form-control mb-1" placeholder="City" value="<?php echo $userdetail['city']; ?>" required>
                </div>
              </div>

               <div class="form-row mb-4">
                <div class="col-lg-4 col-md-12">
                  <label for="" style="float:left;">Phone</label>
                  <input type="text" name="phone" class="form-control mb-1" placeholder="phone number" value="<?php echo $userdetail['phone']; ?>" required>
                </div>

                <div class="col-lg-4 col-md-12">
                  <label for="" style="float:left;">Post Code</label>
                  <input type="text" name="postcode" class="form-control mb-1" placeholder="Post Code" value="<?php echo $userdetail['zip']; ?>" required>
                </div>
                <div class="col-lg-4 col-md-12">
                  <label for="" style="float:left;">Tax ID</label>
                  <input type="text" name="taxid" class="form-control mb-1" placeholder="Taxid" value="<?php echo $userdetail['user_taxid']; ?>">
                </div>
              </div>
            
              <div class="form-row mb-4">
                <div class="col-lg-6 col-md-12">
                  <label for="" style="float:left;">Update New Password</label>
                  <input type="password" id="password" name="password" class="form-control mb-1" placeholder="New Password" onkeyup="checkpassword();">
                </div>

                <div class="col-lg-6 col-md-12">
                  <label for="" style="float:left;">Confirm New Password</label>
                  <input type="password" id="cpassword" name="cpassword" class="form-control mb-1" placeholder="Confirm new password" onkeyup="checkpassword();">
                </div>
              </div>
             <!--  <div class="form-row mb-2">
                <div class="col-lg-4 col-md-12">
                  <label for="" style="float:left;">Account Status</label>
                  <input type="text" name="status" class="form-control mb-1" placeholder="Post Code" value="" > 
                  <select name="accountstatus" id="accountstatus" class="form-control">
                    <option value="APPROVED">APPROVED</option>
                    <option value="PENDING">PENDING</option>
                    <option value="NOT APPROVED">NOT APPROVED</option>
                    <option value="BLOCKED">BLOCK</option>
                    
                  </select>
                </div>-->
                <div class="col-lg-12 col-md-12">
                  <label for="" style="float:left;">Registeration Date</label>
                  <input type="text" name="date" class="form-control mb-1" placeholder="" value="<?php echo $userdetail['date_posted']; ?>" disabled>
                </div>

                
                <div class="col-lg-4 col-md-12">
                  <!-- <label for="" style="float:left;">Email Verified</label>
                  <select name="emailstatus" id="emailstatus" class="form-control">
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                    
                  </select> -->
                  <!-- <input type="text" name="emailverified" class="form-control mb-1" placeholder="email verification" value="<?php echo $userdetail['emailverified']; ?>" disabled> -->
                </div>
              </div>

              <!-- Sign up button -->
              <div class="form-row mb-2">
                <button class="btn btn-info my-4 btn-block" id="updateprofilebtn" type="submit">Update Profile</button>
                
              </div>


              <!-- <hr> -->


          </form>
          <!-- update profile form above -->
              
              <!-- documents area below -->
             
          
            </div>
          </div>
          <!-- main user div -->
          <script>
            $('#updateuserbyadmin').submit(function(event){
              event.preventDefault();
              $.ajax({
                url:"../ajax.php",
                method :"post",
                data:$('#updateuserbyadmin').serialize()+'&func=1.44&sitekey=p%<onZmUeePZ{{&updateprofilebyadmin=yes&user_id=<?php echo $getuserid ?>',
                success:function(data){
                  // alert(data);
                  if(data.trim()=="updated"){
                    swal("Updated!","Profile Updated Successfully.","success");
                  }
                  $('#password').val("");
                  $('#cpassword').val("");

                }//success function
              });//ajax
            });//form submit
          </script>
          <!-- all users div ends here -->    
        </div>

      </div>
      <!-- End of Main Content -->
<script type="text/javascript">

  function checkpassword(){
      var pass=document.getElementById("password").value;
      var cpass=document.getElementById("cpassword").value;
      if(pass!=cpass){
        // alert("123");
        document.getElementById("updateprofilebtn").disabled = true;
        document.getElementById("cpassword").classList.add("red");
        document.getElementById("password").classList.add("red");
      }else{
        // alert('2');
        document.getElementById("updateprofilebtn").disabled = false;
        document.getElementById("cpassword").classList.remove("red");
        document.getElementById("password").classList.remove("red");
      }

    }

</script>
<style>
  .red{
    border-color: red;
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
