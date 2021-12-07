<?php 
include "includes/header.php";
require "includes/connection.php";
include "serverside/functions.php";

//if the user is already logged in, don't let him to login again
if(isset($_SESSION['userID']) || !empty($_SESSION['userID']) ){
	header("Location: index");
}

 ?>
<head>
  <link rel="stylesheet" href="css/logincss.css">
</head>
<script>
      $(document).ready(function() { 
        $('#signupli').addClass('active');
      });
      </script>
<script src="lib/jquery/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Login/SignUp</h1>
            <span class="color-text-a">Welcome to our website</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                SignUp
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Property Grid Star /-->
  <section class="property-grid grid">
    <div class="container">
      <div class="row">

        <div class="limiter" id="logindiv">
          <div class="container-login100">
            <div class="wrap-login100">
              <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="post" action=""  id="loginform">
                <span class="login100-form-title">
                  Login
                </span>

                <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter Email">
                  <input class="input100" type="email" name="loginemail" id="loginemail" placeholder="Email" required>
                  <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Please enter password">
                  <input class="input100" type="password" name="loginpassword" id="loginpassword" placeholder="Password" required>
                  <span class="focus-input100"></span>
                </div>

                <!-- <div class="text-right p-t-13 p-b-23">
                  <span class="txt1">
                    Forgot
                  </span>

                  <a href="#" class="txt2">
                    Username / Password?
                  </a>
                </div> -->

                <div class="container-login100-form-btn">
                  <button class="login100-form-btn" name="loginbtn" id="">
                    Login
                  </button>
                </div>

                <div class="flex-col-c p-b-40">
                  <span class="txt1 p-b-9">
                  Don't have an account with us yet?
                  </span>

                  <a href="#" class="txt3" id="signupclick">
                   Register User
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>
       
        <!-- login desgin, limiter div ends -->

        <div class="limiter hideit" id="signupdiv">
          <div class="container-login100">
            <div class="wrap-login100">
              <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="post" action="" id="registerform">
                <span class="login100-form-title">
                  Register User
                </span>

                <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email">
                  <input class="input100" type="email" name="email" placeholder="email" required>
                  <span class="focus-input100"></span>
                </div>
        
                <div class="wrap-input100 validate-input m-b-16" data-validate = "Please enter password">
                  <input class="input100" type="password" id="password1" name="password1"  placeholder="Password" required>
                  <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate = "Please enter password">
                  <input class="input100" type="password" id="password2" name="password2"  placeholder="Repeat Password" required>
                  <span class="focus-input100"></span>
                </div>
                <div class="container-login100-form-btn">
                  <button class="login100-form-btn" id="registerbtn" name="register">
                    Register User
                  </button>
                </div>

                <div class="flex-col-c p-b-40">
                  <span class="txt1 p-b-9">
                  Are you already a member?
                  </span>

                  <a href="login" class="txt3" id="loginclick">
                    Click to Login
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- sign desgin, limiter div -->
      </div>
    </div>
  </section>
  <!--/ Property Grid End /-->

<script>
  
  $('#signupclick').click(function(e){
    e.preventDefault();    
    $('#signupdiv').removeClass('hideit');
    $('#logindiv').addClass('hideit');
  });
  $('#loginclick').click(function(e){
    e.preventDefault();    
    $('#signupdiv').addClass('hideit');
    $('#logindiv').removeClass('hideit');
  });
  $('#registerform').submit(function(e){
		e.preventDefault();
		
		 if($('#password1').val() != $('#password2').val()){
			swal("Password mismatch!", "your passwords don't match, please try again!", "error");
			$('#password1').val("");
			$('#password2').val("");
		}else{
			$("#registerbtn").prop("disabled", true);
			$.ajax({
				url:"serverside/ajax.php",
				type:"post",
				data: $('#registerform').serialize() + "&func=1&sitekey=p%<onZmUeePZ{{",
				success:function(response){
					// alert(response);
					var data = JSON.parse(response);
					if(data.success){
						swal("Registered", "Registeration Successful, please login!", "success").then((value) => {
							// location.reload();
							location.href = "signup";
						});
						

					}else{
						swal("Error", data.message, "error");
						$("#registerbtn").prop("disabled", false);
					}
				}
			});//registerform ajax
		}
		
	});//register form submit


      //login form
$('#loginform').submit(function(e) {

e.preventDefault();

$.ajax({
  url: "serverside/ajax.php",
  type: 'POST',
  data:{
    func: "1.1",
    loginemail: $("#loginemail").val(),
    loginpassword: $("#loginpassword").val(),
    sitekey:"p%<onZmUeePZ{{"
  },
  success: function(response){
      // alert(response);
      // console.log(response);
    if(response.trim() == "true"){
      window.location.href = "userpropertylist";
    }else{
                // alert(response);
                swal({
                  text: "Invalid username and/or password.",
                  icon: "error",
                  button: "Try Again",
                  footer: 'Please try again.'
                });

                $("#loginpassword").focus();

              }

          }
      });

  });//login form submit
</script>

<?php 
  include "includes/footer.php";
 ?>
</body>
</html>
