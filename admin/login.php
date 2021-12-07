<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
  <?php 
     session_start();
    include '../includes/connection.php';
    $conn = connecttoDB("p%<onZmUeePZ{{");
    if(isset($_POST['loginBtn'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = hash('sha256', $password);
    if(!$conn){

      ?>
      <script type="text/javascript">
        swal("Database Error!", "Database not connected!", "error");
      </script>
      <?php 
      return;
    }else{

      if (!empty($email) && !empty($password)) {
        $sql = "SELECT * FROM admin_user WHERE email = '$email' and password = '$hashedPassword'";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
        $result1=mysqli_fetch_assoc($result);
        if ($count == 1) {
          $_SESSION['adminlogged1'] = "yes"; //set session variables
          $_SESSION['adminid'] = $result1['admin_id'];
          $_SESSION['adminemail'] = $result1['email'];
          header("location: admin");
        } else{
           ?>
          <script type="text/javascript">
          swal("Error!", "Incorrect Email or Password!", "error");
        </script>
        <?php 
        }

      }
    }
  }
   ?>
  <div class="container">
    
    <!-- Outer Row -->
    <div class="row justify-content-center">
    
      <div class="col-xl-10 col-lg-12 col-md-9">
        <br>
        <div style="text-align: center;">
          <h1 style="color:white;">PROPERTY SITE ADMIN LOGIN</h1>
        </div>
        <div class="card o-hidden border-0 shadow-lg my-5">

          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Admin Login</h1>
                  </div>
                  <form class="user" action="login" method="post">
                    <div class="form-group">
                      <input type="text" name="email" class="form-control form-control-user"   placeholder="Email" required="">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user"  placeholder="Password" required="">
                    </div>
                    <button name="loginBtn" type="submit"  class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
