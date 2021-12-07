<?php 
  require "includes/connection.php";
  include "serverside/functions.php";
  include "includes/header.php";
  include "includes/session.php";
  
  $userinfo = getuserprofileinfo($_SESSION['userID']);
  $usubscription=getusersubscriptioninfo($_SESSION['userID']);
  if(!isset($_SESSION['userID'])){
      ?>
      <script>
          window.location.href="signup";
      </script>
      <?php
  }//if
  

 ?>

  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

 <script src="lib/jquery/jquery.min.js"></script>
 <script src="./js/main.js"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
<script>
  $('#homeli').removeClass('active');
  $('#aboutli').removeClass('active');
  $('#contactli').removeClass('active');
  $('#loginli').removeClass('active');
  $('#dashboardli').addClass('active'); 
  
</script>

  <!--/ Intro Single star /-->

  <?php include "includes/dashboardheader.php"; ?>
  <!--/ Intro Single End /-->

  <!--/ Property Grid Star /-->
  <section class="property-grid grid">
    <div class="container">
      <div class="row">   
      <div class="col-12">     
          <!-- Default form register -->

          <form class="text-center border border-light p-5" action="#" id="updateprofileform" style="padding-bottom: 0px !important;">

              <p class="h4 mb-4">Profile</p>
              
              <div class="form-row mb-2">
                  <div class="col-lg-6 col-md-12">
                      <label for="" style="float:left;">First Name</label>
                      <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Firstname" value="<?= $userinfo->user['first_name']; ?>" required>
                  </div>
                  <div class="col-lg-6 col-md-12">
                      <label for="" style="float:left;">last Name</label>
                      <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Lastname" value="<?= $userinfo->user['last_name']; ?>" required>
                  </div>
              </div>
              <div class="form-row mb-2">
                <div class="col-lg-6 col-md-12">
                  <label for="" style="float:left;">Email</label>
                  <input type="email" name="email" id="email" class="form-control mb-1" placeholder="email" value="<?= $userinfo->user['email'];?>" required>
                </div>

                <div class="col-lg-6 col-md-12">
                  <label for="" style="float:left;">City</label>
                  <input type="text" name="city" id="city" class="form-control mb-1" placeholder="city" value="<?= $userinfo->user['city'];?>" required>
                </div>
              </div>

               <div class="form-row mb-4">
                <div class="col-lg-6 col-md-12">
                  <label for="" style="float:left;">Phone</label>
                  <input type="text" name="phone" id="phone" class="form-control mb-1" placeholder="phone no" value="<?= $userinfo->user['phone'];?>" required>
                </div>

                <div class="col-lg-6 col-md-12">
                  <label for="" style="float:left;">Post Code</label>
                  <input type="text" name="postcode" id="postcode" class="form-control mb-1" placeholder="postcode" value="<?= $userinfo->user['zip'];?>" required>
                </div>
              </div>
              
              <div class="form-row mb-2">
                <div class="col-lg-12 col-md-12">
                  <label for="" style="float:left;">Registeration Date</label>
                  <input type="text" name="date" class="form-control mb-1" placeholder="" value="<?=$userinfo->user['date_posted'];?>" disabled>
                </div>
                <div class="col-lg-12 col-md-12">
                  <label for="" style="float:left;">Subscription Date</label>
                  <input type="text" name="sub_date" class="form-control mb-1" placeholder="" value="<?=$userinfo->user['subscription_date'];?>" disabled>
                </div>
                
              </div>
              <!-- Sign up button -->
              <button class="btn btn-info my-4 btn-block" id="updateprofilebtn" type="submit">Update Profile</button>
          </form>
          <!-- update profile form above -->
          <!-- Change Password -->
          
          <div class="form-row mb-2 py-5">
              <div class="form-row mb-4">
                    <div class="col-lg-4 col-md-12">
                      <label for="" style="float:left;">Old Password</label>
                      <input type="password" id="password" name="password" class="form-control mb-1" placeholder="Old Password" >
                  </div>
                    <div class="col-lg-4 col-md-12">
                      <label for="" style="float:left;">New password</label>
                      <input type="password" id="password1" name="password1" class="form-control mb-1" placeholder="New Password" >
                    </div>

                    <div class="col-lg-4 col-md-12">
                      <label for="" style="float:left;">Confirm Password</label>
                      <input type="password" id="password2" name="password2" class="form-control mb-1" placeholder="Confirm Password">
                    </div>
                  </div>
                  <button class="btn btn-info my-4 btn-block" id="changepswbtn" type="button">Update Password</button>
                </div>
                
            </div>
        </div>
      </div>    
    </div>
     
      
  </section>
  <script>
   
      //change password
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
              url:"serverside/ajax.php",
              data:{password:pass1,oldpass:pass,sitekey:"p%<onZmUeePZ{{",func:"2.4"},
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

    //update profile
    //update profile
    // $('#updateprofilebtn').click(function(){    
      $('#updateprofileform').submit(function(e){
      e.preventDefault();	
	   	var firstname = $('#firstname').val();
	   	var lastname = $('#lastname').val();
	   	var phone = $('#phone').val();
      var email = $('#email').val();
      var city = $('#city').val();
      var postcode = $('#postcode').val();
	   	if(email!=""){
	   		$.ajax({
	   			type:"post",
	   			url:"serverside/ajax.php",
	   			data:{phone:phone, email:email, city:city, postcode:postcode,firstname:firstname,lastname:lastname,sitekey:"p%<onZmUeePZ{{",func:"1.2"},
	   			success:function(response){
	    			// alert(response);
            // console.log(response);
	    			if(response.trim()=="updated"){
	    				swal("updated","Profile updated successfully!","success").then((value)=>{
	    					location.reload();
	    				})
	    			}else{
              // alert(response);
	    				swal("Error","Profile Not updated!","error");
	    			}
	    		}
	    	});
	   	}else{
	   		swal("Email Required","Please Fill Email field","error");
	   	} 	
	   }); 
  </script>
  <!--/ Property Grid End /-->
  <style>
    .intro-single {
        padding: 12rem 0 0rem !important;
    }
    .lipadding{
      padding-left: 5px;
    }
  </style>
<?php include "includes/footer.php"; ?>

</body>
</html>
