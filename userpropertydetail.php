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
  $property_id = $_GET['propertyid'];
        
  $query1 = mysqli_query($conn, "SELECT * FROM property where id = '$property_id'");
  $propertydetails = mysqli_fetch_assoc($query1);

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
        <form class="text-center border border-light p-5" action="" id="updateuserproperty" style="padding-bottom: 0px !important;" method="post" enctype="multipart/form-data">

            <p class="h4 mb-4">Property Details</p>

            <div class="form-row mb-2">
                <div class="col-lg-6 col-md-12">
                    <label for="" style="float:left;">Title</label>
                    <input type="text" name="title" id=title class="form-control" placeholder="Title" required value="<?php echo $propertydetails['project_name'] ?>">
                </div>
                <div class="col-lg-3 col-md-12">
                    <label for="" style="float:left;">Type</label>
                    <input type="text" name="type" id="type" class="form-control" placeholder="Type" required value="<?php echo $propertydetails['type'] ?>">
                    
                </div>   
                <div class="col-lg-3 col-md-12">
                    <label for="" style="float:left;">Property Type</label>
                    <input type="text" name="ptype" id="ptype" class="form-control" placeholder="city" required value="<?php echo $propertydetails['property_type'] ?>">
                </div>               
            </div>

            <div class="form-row mb-2">

              <div class="col-lg-3 col-md-12">
                    <label for="" style="float:left;">State</label>
                    <input type="text" name="state" id="state" class="form-control" placeholder="city" required value="<?php echo $propertydetails['state'] ?>">
                </div> 
                <div class="col-lg-3 col-md-12">
                    <label for="" style="float:left;">City</label>
                    <input type="text" name="city" id=city class="form-control" placeholder="city" required value="<?php echo $propertydetails['city'] ?>">
                </div> 
                <div class="col-lg-3 col-md-12">
                  <label for="" style="float:left;">POST CODE</label>
                  <input type="number" name="postcode" id="postcode" class="form-control" placeholder="POST CODE" value="<?php echo $propertydetails['zip']; ?>">
              </div>
                <div class="col-lg-3 col-md-12">
                    <label for="" style="float:left;">Country</label>
                    <input type="text" name="country" id="country" class="form-control" placeholder="city" required value="<?php echo $propertydetails['country'] ?>">
                </div>   

            </div>
            <div class="form-row mb-2">
            <div class="col-lg-3 col-md-12">
                  <label for="" style="float:left;">Purchase Price</label>
                  <input type="number" name="purchase_price" id="purchase_price" class="form-control" placeholder="Price" required value="<?php echo $propertydetails['purchase_price']; ?>">
              </div>
              <div class="col-lg-3 col-md-12">
                  <label for="" style="float:left;">Area in meter sq</label>
                  <input type="number" name="areainsq" id="areainsq" class="form-control" placeholder="Area in meter sq" required value="<?php echo $propertydetails['square_footage']; ?>">
              </div>
              <div class="col-lg-6 col-md-12">
                  <label for="" style="float:left;">Address</label>
                  <input type="text" name="address" id="address" class="form-control" placeholder="" required value="<?php echo $propertydetails['str_addr1']; ?>">
              </div>
              

            </div>
            <div class="form-row mb-2">

              <div class="col-lg-4 col-md-12">
                  <label for="" style="float:left;">Property Condidion</label>
                  <input type="text" name="pcondition" id="pcondition" class="form-control" placeholder="city" required value="<?php echo $propertydetails['property_condition'] ?>">                   
              </div>
              <!-- <div class="col-lg-4 col-md-12">
                  <label for="" style="float:left;">Overall Condidion</label>
                  <input type="text" name="overall" id="overall" class="form-control" placeholder="" required value="<?php echo $propertydetails['property_condition'] ?>">                   
              </div> -->
              <div class="col-lg-8 col-md-12">
                  <label for="" style="float:left;">Neighborhood Condition</label>
                  <input type="text" name="ncondition" id="ncondition" class="form-control" placeholder="" required value="<?php echo $propertydetails['neighborhood_condition'] ?>">                   
              </div>
            </div>

            <div class="form-row mb-2">
              <div class="col-lg-3 col-md-12">
                  <label for="" style="float:left;">No of Units</label>
                  <input type="number" name="nounit" id="nounit" class="form-control" placeholder="no of units" required value="<?php echo $propertydetails['number_of_units'] ?>">                   
              </div>
              <div class="col-lg-3 col-md-12">
                  <label for="" style="float:left;">lot attributes</label>
                  <input type="text" name="lotattributes" id="lotattributes" class="form-control" placeholder="i.e flat" required value="<?php echo $propertydetails['lot_attributes'] ?>">                   
              </div>
              <div class="col-lg-3 col-md-12">
                  <label for="" style="float:left;">Zoning Code</label>
                  <input type="text" name="zcode" id="zocode" class="form-control" placeholder="i.e 123" required value="<?php echo $propertydetails['zoning_code'] ?>">                   
              </div>
              <div class="col-lg-3 col-md-12">
                  <label for="" style="float:left;">Lot Size Measurment</label>
                  <input type="text" name="lsmeaurment" id="lsmeaurment" class="form-control" placeholder="" required value="<?php echo $propertydetails['lot_size_measurment'] ?>">                   
              </div>
            </div>
            <div class="form-row mb-2">
              <div class="col-lg-4 col-md-12">
                  <label for="" style="float:left;">Investment Type</label>
                  <input type="text" name="investtype" id="inverttype" class="form-control" placeholder="no of units" required value="<?php echo $propertydetails['investment_type'] ?>">                   
              </div>
              <div class="col-lg-4 col-md-12">
                  <label for="" style="float:left;">Familiarity with Neighborhood</label>
                  <input type="text" name="famneigh" id="famneigh" class="form-control" placeholder="" required value="<?php echo $propertydetails['familiar_with_neighborhood'] ?>">                   
              </div>
              <div class="col-lg-4 col-md-12">
                  <label for="" style="float:left;">Time Inveting in Realestate</label>
                  <input type="text" name="timeinvest" id="timeinvest" class="form-control" placeholder="" required value="<?php echo $propertydetails['time_in_real_estate'] ?>">                   
              </div>
            
            </div>
            <div class="form-row mb-2">

              <div class="col-lg-4 col-md-12">
                  <label for="" style="float:left;">Rate</label>
                  <input type="number" name="rate" id="rate" class="form-control" placeholder="" required value="<?php echo $propertydetails['rate_of'] ?>">                   
              </div>
              <div class="col-lg-4 col-md-12">
                  <label for="" style="float:left;">Year Amortized</label>
                  <input type="number" name="amortized" id="amortized" class="form-control" placeholder="" required value="<?php echo $propertydetails['years_amortized_of'] ?>">                   
              </div>
              <div class="col-lg-4 col-md-12">
                  <label for="" style="float:left;">Amount</label>
                  <input type="number" name="amount" id="amount" class="form-control" placeholder="" required value="<?php echo $propertydetails['amount_of'] ?>">                   
              </div>
            </div>
            <div class="form-row mb-2">
            
              <div class="col-lg-4 col-md-12">
                  <label for="" style="float:left;">Baloon Amount</label>
                  <input type="number" name="bamount" id="bamount" class="form-control" placeholder="" required value="<?php echo $propertydetails['balloon_amount_of'] ?>">                   
              </div>
              <div class="col-lg-4 col-md-12">
                  <label for="" style="float:left;">Prepayment Penalty</label>
                  <input type="number" name="preamount" id="preamount" class="form-control" placeholder="" required value="<?php echo $propertydetails['prepayment_penalty_amount_of'] ?>">                   
              </div>
              <div class="col-lg-4 col-md-12">
                  <label for="" style="float:left;">Familiarity with Property</label>
                  <input type="text" name="fampro" id="fampro" class="form-control" placeholder="" required value="<?php echo $propertydetails['familiar_with_property'] ?>">                   
              </div>
              
            </div>
            <div class="form-row mb-2">
            <div class="col-lg-4 col-md-12">
                  <label for="" style="float:left;">Cash on Cash Return for Inverstor</label>
                  <input type="number" name="cashreturn" id="cashreturn" class="form-control" placeholder="" required value="<?php echo $propertydetails['cash_on_cash_return'] ?>">                   
              </div>
              
              <div class="col-lg-4 col-md-12">
                  <label for="" style="float:left;">Investment Amount</label>
                  <input type="number" name="investamount" id="investamount" class="form-control" placeholder="i.e flat" required value="<?php echo $propertydetails['investment_amount_needed'] ?>">                   
              </div>
              <div class="col-lg-4 col-md-12">
                  <label for="" style="float:left;">Equity Offer to Partner</label>
                  <input type="number" name="equityoffer" id="equityoffer" class="form-control" placeholder="i.e 123" required value="<?php echo $propertydetails['equity_offered'] ?>">                   
              </div>
            </div>
            <div class="form-row mb-2">
              <div class="col-lg-12 col-md-12">
                  <label for="" style="float:left;">Description</label>
                  <textarea class="form-control" name="description" id="description" cols="30" rows="3" required><?php echo $propertydetails['property_description']; ?></textarea>                      
              </div>
            </div>

            <!-- Submit up button -->
            <div class="form-row mb-2">
              <button class="btn btn-info my-4 btn-block" type="submit">Update Property</button>
            </div>
        </form>
        <?php
                        
                $imagequery=mysqli_query($conn,"SELECT * FROM property_document where property_id='$property_id' order by id desc limit 1");
                $getimage=mysqli_fetch_assoc($imagequery);
                $getimagepath="property_images/".$getimage['property_id']."_l.".$getimage['ext'];
              ?>
            <!-- documents area below -->
          <div class="card-body">
              <div class="form-row mb-2">
                  <div class="col-lg-6 col-md-12">
                  <span><i class="fa fa-upload"></i> Upload Photo</span>
                      <input type="file" name="imgs" id="imgs" class="form-control" oninput="add_user_property_image()"/>
                  </div>              
              </div>
              <div class="col-lg-8 col-md-12">
                <h1>Property Image</h1>   
                <img width="500" src="<?php echo $getimagepath ?>" alt="" class="img-fluid" >
                <!-- <button class="btn btn-danger" onclick="deleteapartimg(this.id);" id=""><i class="fa fa-trash" aria-hidden="true"></i></button> -->
              </div>

          </div> 
          </div>
      </div>
</section>
<script>
 $('#updateuserproperty').submit(function(event){
    event.preventDefault();
    $.ajax({
      url:"serverside/ajax.php",
      method :"post",
      data:$('#updateuserproperty').serialize()+'&func=2.2&sitekey=p%<onZmUeePZ{{&propertyid=<?php echo $property_id ?>',
      success:function(data){
        // alert(data);
        // console.log(data);
        if(data.trim()=="updated"){
          swal("Updated!","Property Updated Successfully.","success")
          .then((value) => {
            location.reload();
          });
        }
        else{
          swal("Error!","Unable to update property.","Failure");
        }


      }//success function
    });//ajax
  });//form submit
  //update actor images
  function add_user_property_image(){
    var ajax_data = new FormData();
    ajax_data.append('imgs', $('#imgs')[0].files[0]);
    ajax_data.append('sitekey', 'p%<onZmUeePZ{{');
    ajax_data.append('func', '2.8');
    ajax_data.append('propertyid',<?php echo $property_id ?>)

    $.ajax({
        url: 'serverside/ajax.php',
        type: 'post',
            // dataType : 'json',
            processData: false,
            contentType: false,
            data: ajax_data,

            success: function(response) {
                console.log(response);
              swal("Updated!","image Uploaded Successfully.","success");
                // location.reload();

                // console.log(response);
            },
            error: function(err) {
                // location.reload();
                console.error(err);

            }
        });
    }
</script>
  
<?php include "includes/footer.php"; ?>
</body>
</html>

