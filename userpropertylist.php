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
  
 <script>
      $(document).ready(function() { 
        $('#dashboardli').addClass('active');
      });
  </script>

  <!--/ Intro Single star /-->

  <?php include "includes/dashboardheader.php"; ?>
  <!--/ Intro Single End /-->

  <!--/ Property Grid Star /-->
  <section class="property-grid grid">
  <div class="card shadow mb-4" id="allordersdiv">

<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary">User Properties</h6>
</div>
<div class="card-body">
  
  <div class="table-responsive">
    <table class="table table-bordered" id="ordertable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>ID</th>
          <th>User ID</th>
          <th>Title</th>
          <th>City</th>
          <th>Address</th>
          <th>Purchase Price</th>
          <th>Area</th>
          <th>Type</th>
          <th>Property Type</th>
          <th>Status</th>
          <th>Action</th>

          
        </tr>
      </thead>

      <tbody>
        <?php 
          if(isset($_SESSION['userID'])){

          $userid=$_SESSION['userID'];
          // $user_id=$_GET['user_id'];
          // $userpropertiesquery = mysqli_query($con, "SELECT * FROM cities");
          $query = mysqli_query($conn, "SELECT * FROM property where user_id='$userid'");
          while($userproperties = mysqli_fetch_assoc($query)){
          ?>
        <tr>
          <td><?php echo $userproperties['id']; ?></td> 
          <td><?php echo $userproperties['user_id']; ?></td>                      
          <td><?php echo $userproperties['project_name']; ?></td>
          <td><?php echo $userproperties['city']; ?></td>
          <td><?php echo $userproperties['str_addr1']; ?></td>
          <td><?php echo $userproperties['purchase_price']; ?></td>
          <td><?php echo $userproperties['square_footage']; ?></td>
          <td><?php echo $userproperties['type']; ?></td>
          <td><?php echo $userproperties['property_type']; ?></td>
          <td>
            <?php
            if($userproperties['is_active']==0){
                echo "not active";
              }else{
                echo "active";
              }
            
            ?>
          </td>
          <td style="padding: 1px;">
            
            <button class=" btn btn-info mybtn"  id="<?php echo $userproperties['id']; ?>" onclick="selectproperty(this.id)">View</button>

            <button class=" btn btn-danger mybtn" name="" id="<?php echo $userproperties['id']; ?>" onclick="deleteproperty(this.id);" >Delete</button>
           
            
          </td>
          
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
//delete user added properties
function deleteproperty(pid){
              swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this property!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  $.ajax({
                    method:"post",
                    url:"serverside/ajax.php",
                    data:{deleteapartmentbyuser:"yes",pid:pid,sitekey:"p%<onZmUeePZ{{",func:"2.1"},
                    success:function(data){
                      if(data.trim()=="deleted"){
                        swal("Deleted!","Property Deleted!","success").then((value) => {
                            window.location.href = "userpropertylist";
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
</body>
</html>

