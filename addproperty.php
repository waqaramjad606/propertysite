<?php 
  require "includes/connection.php";
  include "serverside/functions.php";
  include "includes/header.php";
  include "includes/session.php";
  $conn = connecttoDB("p%<onZmUeePZ{{");
  $userinfo = getuserprofileinfo($_SESSION['userID']);
  $uname="admin";
  $sql="SELECT is_subscription from admin_user where username='$uname' limit 1";
  $result=$conn->query($sql);
  $getresult=$result->fetch_assoc();
  $is_paid=$getresult['is_subscription'];
//   echo $is_paid;
    if(isset($_SESSION['userID'])){
      if($_SESSION['issubscribe']==0 && $is_paid=='1'){
        ?>
        <script>
            window.location.href="transcations";
        </script>
        <?php
      }
    }else{
        ?>
        <script>
            window.location.href="signup";
        </script>
        <?php
    }
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
          <!-- Add Property Form -->
          <form class="text-center border border-light p-5" action="" id="addpropertyform" style="padding-bottom: 0px !important;" method="post" enctype="multipart/form-data">

    <p class="h4 mb-4">Add New Property</p>
    <input type="hidden" name="userid" id="userid" class="form-control" placeholder="" required value="<?php echo $_SESSION['userID'] ?>">
    <div class="form-row mb-2">
        <div class="col-lg-6 col-md-12">
            <label for="" style="float:left;">Title</label>
            <input type="text" name="title" id="title"e class="form-control" placeholder="" required value="">
        </div>
        <div class="col-lg-3 col-md-12">
            <label for="" style="float:left;">Type</label>
            <input type="text" name="type" id="type" class="form-control" placeholder="" required value="">
            
        </div>   
        <div class="col-lg-3 col-md-12">
            <label for="" style="float:left;">Property Type</label>
            <input type="text" name="ptype" id="ptype" class="form-control" placeholder="" required value="">
        </div>               
    </div>

    <div class="form-row mb-2">

    <div class="col-lg-3 col-md-12">
            <label for="" style="float:left;">State</label>
            <input type="text" name="state" id="state" class="form-control" placeholder="" required value="">
        </div> 
        <div class="col-lg-3 col-md-12">
            <label for="" style="float:left;">City</label>
            <input type="text" name="city" id=city class="form-control" placeholder="" required value="">
        </div> 
        <div class="col-lg-3 col-md-12">
        <label for="" style="float:left;">POST CODE</label>
        <input type="number" name="postcode" id="postcode" class="form-control" placeholder="" value="">
    </div>
        <div class="col-lg-3 col-md-12">
            <label for="" style="float:left;">Country</label>
            <input type="text" name="country" id="country" class="form-control" placeholder="" required value="">
        </div>   

    </div>
    <div class="form-row mb-2">
    <div class="col-lg-3 col-md-12">
        <label for="" style="float:left;">Purchase Price</label>
        <input type="number" name="purchase_price" id="purchase_price" class="form-control" placeholder="" required value="">
    </div>
    <div class="col-lg-3 col-md-12">
        <label for="" style="float:left;">Area in meter sq</label>
        <input type="number" name="areainsq" id="areainsq" class="form-control" placeholder="" required value="">
    </div>
    <div class="col-lg-6 col-md-12">
        <label for="" style="float:left;">Address</label>
        <input type="text" name="address" id="address" class="form-control" placeholder="" required value="">
    </div>
    

    </div>
    <div class="form-row mb-2">

    <div class="col-lg-4 col-md-12">
        <label for="" style="float:left;">Property Condidion</label>
        <input type="text" name="pcondition" id="pcondition" class="form-control" placeholder="" required value="">                   
    </div>
    <!-- <div class="col-lg-4 col-md-12">
        <label for="" style="float:left;">Overall Condidion</label>
        <input type="text" name="overall" id="overall" class="form-control" placeholder="" required value="">                   
    </div> -->
    <div class="col-lg-8 col-md-12">
        <label for="" style="float:left;">Neighborhood Condition</label>
        <input type="text" name="ncondition" id="ncondition" class="form-control" placeholder="" required value="">                   
    </div>
    </div>

    <div class="form-row mb-2">
    <div class="col-lg-3 col-md-12">
        <label for="" style="float:left;">No of Units</label>
        <input type="number" name="nounit" id="nounit" class="form-control" placeholder="" required value="">                   
    </div>
    <div class="col-lg-3 col-md-12">
        <label for="" style="float:left;">lot attributes</label>
        <input type="text" name="lotattributes" id="lotattributes" class="form-control" placeholder="" required value="">                   
    </div>
    <div class="col-lg-3 col-md-12">
        <label for="" style="float:left;">Zoning Code</label>
        <input type="text" name="zcode" id="zocode" class="form-control" placeholder="" required value="">                   
    </div>
    <div class="col-lg-3 col-md-12">
        <label for="" style="float:left;">Lot Size Measurment</label>
        <input type="text" name="lsmeaurment" id="lsmeaurment" class="form-control" placeholder="" required value="">                   
    </div>
    </div>
    <div class="form-row mb-2">
    <div class="col-lg-4 col-md-12">
        <label for="" style="float:left;">Investment Type</label>
        <input type="text" name="investtype" id="inverttype" class="form-control" placeholder="" required value="">                   
    </div>
    <div class="col-lg-4 col-md-12">
        <label for="" style="float:left;">Familiarity with Neighborhood</label>
        <input type="text" name="famneigh" id="famneigh" class="form-control" placeholder="" required value="">                   
    </div>
    <div class="col-lg-4 col-md-12">
        <label for="" style="float:left;">Time Inveting in Realestate</label>
        <input type="text" name="timeinvest" id="timeinvest" class="form-control" placeholder="" required value="">                   
    </div>

    </div>
    <div class="form-row mb-2">

    <div class="col-lg-4 col-md-12">
        <label for="" style="float:left;">Rate</label>
        <input type="number" name="rate" id="rate" class="form-control" placeholder="" required value="">                   
    </div>
    <div class="col-lg-4 col-md-12">
        <label for="" style="float:left;">Year Amortized</label>
        <input type="number" name="amortized" id="amortized" class="form-control" placeholder="" required value="">                   
    </div>
    <div class="col-lg-4 col-md-12">
        <label for="" style="float:left;">Amount</label>
        <input type="number" name="amount" id="amount" class="form-control" placeholder="" required value="">                   
    </div>
    </div>
    <div class="form-row mb-2">

    <div class="col-lg-4 col-md-12">
        <label for="" style="float:left;">Baloon Amount</label>
        <input type="number" name="bamount" id="bamount" class="form-control" placeholder="" required value="">                   
    </div>
    <div class="col-lg-4 col-md-12">
        <label for="" style="float:left;">Prepayment Penalty</label>
        <input type="number" name="preamount" id="preamount" class="form-control" placeholder="" required value="">                   
    </div>
    <div class="col-lg-4 col-md-12">
        <label for="" style="float:left;">Familiarity with Property</label>
        <input type="text" name="fampro" id="fampro" class="form-control" placeholder="" required value="">                   
    </div>
    
    </div>
    <div class="form-row mb-2">
    <div class="col-lg-4 col-md-12">
        <label for="" style="float:left;">Cash on Cash Return for Inverstor</label>
        <input type="number" name="cashreturn" id="cashreturn" class="form-control" placeholder="" required value="">                   
    </div>
    
    <div class="col-lg-4 col-md-12">
        <label for="" style="float:left;">Investment Amount</label>
        <input type="number" name="investamount" id="investamount" class="form-control" placeholder="" required value="">                   
    </div>
    <div class="col-lg-4 col-md-12">
        <label for="" style="float:left;">Equity Offer to Partner</label>
        <input type="number" name="equityoffer" id="equityoffer" class="form-control" placeholder="" required value="">                   
    </div>
    </div>
    <div class="form-row mb-2">
    <div class="col-lg-12 col-md-12">
        <label for="" style="float:left;">Description</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="3" required></textarea>                      
    </div>
    </div>

    <!-- Sign up button -->
    <div class="form-row mb-2">
      <button class="btn btn-info my-4 btn-block" name="addpropertybtn" id="addpropertybtn" type="submit">Add Property</button>
    </div>
</form> 
          <!-- End Property From -->
       
        </div>
      </div>    
    </div>
  </section>
  
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

<script>
    $('#addpropertyform').submit(function(event){
      event.preventDefault();
      $.ajax({
        url:"serverside/ajax.php",
        method :"post",
        data:$('#addpropertyform').serialize()+'&func=2&sitekey=p%<onZmUeePZ{{',
        
        success:function(data){
        //   console.log(data);
          if(data.trim()=="true"){
            swal("Added!","Property Added Successfully.Your property cannot be active please wait for admin approval","success")
            .then((value) => {
            window.location.href="userpropertylist";
            });
          }
          else{
            swal("Error!", "Failed to Add New Property!", "error");
          }
  
        }//success function
      });//ajax
    });//form submit
  </script>