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


 ?>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include "includes/sidebar.php"; ?>

    <script>
      $(document).ready(function() { 
        $('#settingli').addClass('active');
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
            <h1 class="h3 mb-0 text-gray-800">Site Settings</h1>
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
      <div class="card-header py-3 bg-info">
        <h6 class="m-0 font-weight-bold text-light">Site Settings</h6>
      </div>
    <div class="card-body">
        <h3>Update Admin Password</h3>
          <div class="row">
            <div class="form-group col-lg-4">
              <!-- <label for="exampleInputPassword1">Update Admin</label> -->
              <input class="form-control mb-2" type="email" name="adminemail" placeholder="email" required value="<?php echo $_SESSION['adminemail']; ?>" disabled>
              <input type="password" class="form-control" name="password" id="password" placeholder="Old Password"   >
              <input type="password" class="form-control" name="password1" id="password1" placeholder=" New Password"   >
              <input type="password" class="form-control mt-2"  placeholder="Confirm New Password" name="password2" id="password2" >
              <button type="submit" class="btn btn-primary" style="margin-top:5px;" name="changepsw" id="changepswbtn">Update</button>
            </div> 
      </div>
</div>
<div class="card shadow mb-4 py-2" id="allordersdiv">
      <div class="card-header py-3 bg-info">
        <h6 class="m-0 font-weight-bold text-light">Update User Subscription</h6>
      </div>
    <div class="card-body">
        <!-- <h3>Update Admin Password</h3> -->
          <?php
          $loginemail=$_SESSION['adminemail'];
          $sql=mysqli_query($conn,"SELECT * FROM admin_user where email='$loginemail'");
          while($getadmindetail=mysqli_fetch_assoc($sql)){
            ?>
              <div class="row">
            <div class="form-group col-lg-5">
              <label for="exampleInputPassword1">Current Status:</label>
              <input class="form-control mb-2" type="text"    required value="<?php echo $_SESSION['adminemail']; ?>" disabled>
              <label for="1">Current Subscription Status:</label>
              <input class="form-control mb-2" type="text" name="" required value="<?php if($getadmindetail['is_subscription']==0){ echo "Free Subscription";}else{echo "Paid Subscription" ;} ; ?>" disabled>
              <small class="form-text text-danger">Change subscription status from below selection input.</small>
              <label for="1">Current Subscription Price:</label>
              <input class="form-control mb-2" type="text" name="memberprice" id="memberprice" value="<?php echo $getadmindetail['membership'] ; ?>">
            </div> 
          </div>
            <?php
          }
          ?>
        
          <div class="row">
            <div class="col-lg-8">
              <select class="form-select form-select-lg" aria-label="Default select example" id="subscription" name="subscription">
              <option value="2">----Select Subscription-----</option>
              <option value="0">Free</option>
              <option value="1">Paid</option>
              </select> 
              <button class="btn btn-primary"  name="updatesubscription" id="updatesubscription">Update Subscription</button>
            </div>
          </div> 
    </div>
</div>
          <!-- main user div -->
          <script>
            $('#changepswbtn').click(function(){
                      // alert('checking');
                      var pass = $('#password').val();
                      var pass1 = $('#password1').val();
                      var pass2 = $('#password2').val();
                      
                      if(pass =="" || pass1=="" || pass2 == ""){
                          swal("Error","Please fill all fields","error");

                      }
                      else if(pass1 != pass2){
                          swal("Password mismatch","Password don't match!","error");
                          return;
                      }else{
                          $.ajax({
                              type:"post",
                              url:"../serverside/ajax.php",
                              data:{password:pass1,oldpass:pass,sitekey:"p%<onZmUeePZ{{",func:"2.5"},
                              success:function(response){
                                  // alert(response);
                                  // console.log(response);
                                  if(response.trim()=="updated"){
                                      swal("updated","password updated successfully!","success").then((value)=>{
                                          // location.reload();
                                      })
                                  }else{
                                      swal("Error","Old Password is not correct!","error");
                                  }
                              }
                          });
                      }

                  });

                  $('#updatesubscription').click(function(){
                      // alert('checking');
                      var subscription = $('#subscription').val();
                      var membership = $('#memberprice').val();
                      if(subscription ==2){
                          swal("Error","Please Select option","error");

                      }else{
                          $.ajax({
                              type:"post",
                              url:"../serverside/ajax.php",
                              data:{subscription:subscription,membership:membership,sitekey:"p%<onZmUeePZ{{",func:"2.6"},
                              success:function(response){
                                  // alert(response);
                                  // console.log(response);
                                  if(response.trim()=="updated"){
                                      swal("updated","Subscription updated successfully!","success").then((value)=>{
                                          location.reload();
                                      });
                                  }else{
                                      swal("Error","Subscription not updated!","error");
                                  }
                              }
                          });
                      }

                  });
          </script>
          <!-- all users div ends here -->    
        </div>

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
<?php 

  if(isset($_POST['updatebtn'])){
    $adminemail= $_POST['adminemail'];

    $pass=$_POST['pass'];
    if($pass!=""){
      $hashedPassword=hash('sha256', $pass);
      $updatequery="update admin set password='$hashedPassword', email = '$adminemail' where admin_id='1'";
    }else{
       $updatequery="update admin set email = '$adminemail' where admin_id='1'";
    }
    
    $update=mysqli_query($con,$updatequery);
    if($update){
      ?>

      <script type="text/javascript">
      $(document).ready(function() {
        swal("Success!", "Admin Updated!", "success");               
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

  if(isset($_POST['addtesti'])){
    $clientname = $_POST['clientname'];
    $shorttext1 = $_POST['shorttext1'];

    $clientimg = $_FILES['clientimg']['name'];
    $clientimgtarget = "clientimg/".basename($clientimg);
    move_uploaded_file($_FILES['clientimg']['tmp_name'], $clientimgtarget);

    mysqli_query($con,"INSERT into testimonials(clientname, clientimgpath, clienttext) values ('$clientname','$clientimgtarget','$shorttext1')");
    ?>
    <script>
      swal("Done","Testimonial Added Successfully","success");
    </script>
    <?php

  }
         ?>
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
