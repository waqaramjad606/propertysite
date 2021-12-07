<?php 
  require "includes/connection.php";
  include "serverside/functions.php";
  include "includes/header.php";

  
  $conn = connecttoDB("p%<onZmUeePZ{{");
  if(!isset($_SESSION['userID'])){
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
  <!-- Start paypal integration scripts -->
 <script
    src="https://www.paypal.com/sdk/js?client-id=AfnBOMCz6fXT1zOeNTwYkk0paR_52jtMRWDwZny2QPVl9x8uAJH5BbyHjn3OQ02IWKzoEKJg5GRgVQ9m"> // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
  </script>
    <?php 
           $subdetail2=mysqli_query($conn, "SELECT * FROM admin_user limit 1");
           // $getsub=mysqli_fetch_row($subdetail);
            while($getmembership=mysqli_fetch_assoc($subdetail2)){
               ?>
<script>   
  paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.

      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '<?php echo $getmembership['membership'] ?>'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        // console.log(details);
        var pay_amount=details.purchase_units[0].amount.value;
        var status=details.status;
        var tranid=details.id;
        var session_id = '<?php echo $_SESSION['userID'];?>';
        $.ajax({
          url:"serverside/ajax.php",
          method :"post",
          data:{pay_amount:pay_amount,status:status,tranid:tranid,userid:session_id,sitekey:"p%<onZmUeePZ{{",func:"2.7"},
           success:function(data){
            console.log(data);
            if(data.trim()=="true"){
              swal("Process","Transcation Successfully.","success")
                .then((value) => {
                  location.reload();
                });
             
            }
            else{
              swal("Error!", "Failed transcation!", "error");
            }
          }//success function
        });//ajax
      });
    }
  }).render('#paypal-button-container');
  //This function displays Smart Payment Buttons on your web page.
</script>
               <?php
            }
          ?>

  <!-- End paypal integration scripts -->
 <script>
      $(document).ready(function() { 
        $('#dashboardli').addClass('active');
      });
  </script>

  <!--/ Intro Single star /-->

  <?php include "includes/dashboardheader.php"; ?>
 
  <!--/ Intro Single End /-->
    <div class="card py-3">
      <div class="card-header bg-success">
      <h6 class="m-0 font-weight-bold text-light">Pay Subscription</h6>
      </div>
      <div class="card-body">
          <!-- start paypal button -->
          <div class="row">
            <div class="col-6">
            <?php
            $uname="admin";
            $sql="SELECT is_subscription from admin_user where username='$uname' limit 1";
            $result=$conn->query($sql);
            $getresult=$result->fetch_assoc();
            $is_paid=$getresult['is_subscription'];
            $subdetail=mysqli_query($conn, "SELECT * FROM user_detail where user_id='".$_SESSION['userID']."'  limit 1");
            // $getsub=mysqli_fetch_row($subdetail);
                while($getsubsdetail=mysqli_fetch_assoc($subdetail)){?>
                    <?php
                      if($getsubsdetail["is_subscription"]==0 && $is_paid=='1'){
                        ?>
                           <script>
                              swal("Dear User","You have to pay membership amount in order to access add property and property details","info");
                           </script>
                        <?php

                      }else{
                        echo "You have access add and view property details";
                      }

                    ?>
                   
                    <p class="py-4 text-danger">Membership Type: <strong> <?php
                        
                        if($getsubsdetail["is_subscription"]==0){
                            echo "Un-Paid ";
                        }else{
                            echo "Paid";
                        }
                     ?> </strong></p>
                    <!-- <p>Membership Fees: <strong> $</strong></p> -->
                    <?php
                }
             ?>
                
            </div>
            <div class="col-6">
            <div class="">
            <div id="paypal-button-container" class=""></div>
            </div>
            </div>
            
          </div>
        
          <!-- start paypal button -->
      </div>
    </div>
  <!--/ Property Grid Star /-->
<section class="property-grid grid">
<div class="card shadow mb-4" id="allordersdiv">
<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary">User Transcation</h6>
</div>
<div class="card-body">
  
  <div class="table-responsive">
    <table class="table table-bordered" id="ordertable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>ID</th>
          <th>User ID</th>
          <th>Transcation id</th>
          <th>Payment Amount</th>
          <th>Payment Status</th>
          <th>Trancation Time</th> 
        </tr>
      </thead>

      <tbody>
        <?php 
          if(isset($_SESSION['userID'])){
            //get user is from session
          $userid=$_SESSION['userID'];
          $query = mysqli_query($conn, "SELECT * FROM paymentinfo where user_id='$userid'");
          while($usertransaction = mysqli_fetch_assoc($query)){
          ?>
        <tr>
          <td><?php echo $usertransaction['id']; ?></td> 
          <td><?php echo $usertransaction['user_id']; ?></td>                      
          <td><?php echo $usertransaction['tnxid']; ?></td>
          <td><?php echo $usertransaction['payment_amount']; ?></td>
          <td><?php echo $usertransaction['payment_status']; ?></td>
          <td><?php echo $usertransaction['createdtime']; ?></td> 
        </tr>
        <?php 
          }
        }//if sesssion is not set
          ?>
      </tbody>
    </table>
  </div>
</div>
</div>
  </section>
  
  <!--/ Property Grid End /-->
 
<?php include "includes/footer.php"; ?>

<script>
    $(document).ready( function () {
    $('#ordertable').DataTable();
} );
//select property
function selectproperty(pid){
    window.location.href = "userpropertydetail?propertyid="+pid;
}

</script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
</body>
</html>

