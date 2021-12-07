


      <?php 
        include "includes/header.php";
        require "includes/connection.php";
        $conn = connecttoDB("p%<onZmUeePZ{{");
        $uname="admin";
        $sql="SELECT is_subscription from admin_user where username='$uname' limit 1";
        $result=$conn->query($sql);
        $getresult=$result->fetch_assoc();
        $is_paid=$getresult['is_subscription'];
        if(isset($_SESSION['userID'])){
          if($_SESSION['issubscribe']==0 && $is_paid=='1'){
            ?>
            <script>
                window.location.href="property-grid";
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
      
      $propertyid = $_GET['property_id'];
      $query1 = mysqli_query($conn, "SELECT * FROM property where id = '$propertyid' && is_active=1");
      $propertydetails = mysqli_fetch_assoc($query1);
      $getimages=mysqli_query($conn,"SELECT * FROM property_document where property_id='$propertyid' order by id desc limit 1");
      $imagedetail=mysqli_fetch_assoc($getimages);
      $imagepath="property_images/".$imagedetail['property_id']."_l.".$imagedetail['ext'];
       if(!file_exists($imagepath)){
         $imagepath="property_images/default-img.jpg";
       }else{
         $imagepath=$imagepath;
       }         
      ?>
      <style>
        .owl-carousel .owl-item img {
            width: unset !important;
        }


      </style>
      <!--/ Nav End /-->

      <!--/ Intro Single star /-->
      <section class="intro-single">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-lg-8">
              <div class="title-single-box">
                <h1 class="title-single"><?php echo $propertydetails['project_name'] ?></h1>
                <span class="color-text-a"><?php echo $propertydetails['city'] ," ",$propertydetails['state']," ",$propertydetails['country'] ?></span>
              </div>
            </div>
            <div class="col-md-12 col-lg-4">
              <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="index">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="property-grid">Properties</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                  <?php echo $propertydetails['project_name'] ?>
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <!--/ Intro Single End /-->

      <!--/ Property Single Star /-->
      <section class="property-single nav-arrow-b">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
                <div class="carousel-item-b" style="height: 750px;">
                  <img src="<?php echo $imagepath ?>" alt="" class="img-fluid">
                </div>
               
              </div>
              <div class="row justify-content-between">
                <div class="col-md-5 col-lg-4">
                  <div class="property-price d-flex justify-content-center foo">
                    <div class="card-header-c d-flex">
                      <div class="card-box-ico">
                        <span class="ion-money">$</span>
                      </div>
                      <div class="card-title-c align-self-center">
                        <h5 class="title-c"><?php echo $propertydetails['purchase_price'] ?></h5>
                      </div>
                    </div>
                  </div>
                  <div class="property-summary">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="title-box-d section-t4">
                          <h3 class="title-d">Property Information</h3>
                        </div>
                      </div>
                    </div>
                    <div class="summary-list">
                      <ul class="list">
                        <li class="d-flex justify-content-between">
                          <strong>Property ID: </strong>
                          <span><?php echo $propertydetails['id'] ?></span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Location: </strong>
                          <span><?php echo $propertydetails['city'],", ",$propertydetails['state'],", ",$propertydetails['zip'], " ,",$propertydetails['country'] ?></span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Property Type:</strong>
                          <span><?php echo $propertydetails['property_type'] ?></span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Status:</strong>
                          <span><?php 
                           if($propertydetails['is_active']==1){ echo "Active";} ?></span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Area:</strong>
                          <span><?php echo $propertydetails['square_footage'] ?>m
                            <sup>2</sup>
                          </span>
                        </li>
                        
                        <li class="d-flex justify-content-between">
                          <strong>Lot Size:</strong>
                          <span><?php echo $propertydetails['lot_size'] ?></span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Lot Attributes:</strong>
                          <span><?php echo $propertydetails['lot_attributes'] ?></span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Lot Size Measurment:</strong>
                          <span><?php echo $propertydetails['lot_size_measurment'] ?></span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Zoning Code:</strong>
                          <span><?php echo $propertydetails['zoning_code'] ?></span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Overall Condition:</strong>
                          <span><?php echo $propertydetails['property_condition'] ?></span>
                        </li>
                        <!-- <li class="d-flex justify-content-between">
                          <strong>Beds:</strong>
                          <span>4</span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Baths:</strong>
                          <span>2</span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Garage:</strong>
                          <span>1</span>
                        </li> -->
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-md-7 col-lg-7 section-md-t3">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d">
                        <h3 class="title-d">Property Description</h3>
                      </div>
                    </div>
                  </div>
                  <div class="property-description">
                    <p class="description color-text-a">
                    <?php echo $propertydetails["property_description"] ?>
                    </p>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d">
                        <h3 class="title-d">Surrounding Neighborhood</h3>
                      </div>
                    </div>
                  </div>
                  <div class="property-description">
                    <p class="description color-text-a">
                    <?php echo $propertydetails["neighborhood_condition"] ?>
                    </p>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d">
                        <h3 class="title-d">Purchase & Invesment Information</h3>
                      </div>
                    </div>
                  </div>
                  <div class="summary-list">
                      <ul class="list">
                        <li class="d-flex justify-content-between">
                          <strong>Purchase Price:</strong>
                          <span><?php echo $propertydetails['purchase_price'] ?></span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Investment Type:</strong>
                          <span><?php echo $propertydetails['investment_type'] ?></span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Investment Amount:</strong>
                          <span><?php echo $propertydetails['investment_amount_needed'] ?></span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Equity Offer to Equity Partner:</strong>
                          <span><?php echo $propertydetails['equity_offered'] ?></span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Estimated Cash on Cash Return for Inverstor:</strong>
                          <span><?php echo $propertydetails['cash_on_cash_return'] ?>
                            
                          </span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Continqency Expiration Date:</strong>
                          <span><?php echo $propertydetails['contingency_exp_date'] ?>
                          </span>
                        </li> 
                      </ul>
                    </div>
                    <!-- <div class="col-sm-12">
                      <div class="title-box-d">
                        <h3 class="title-d">Why is the Property being Sold?:</h3>
                      </div>
                    </div>
                    <div class="property-description">
                    <p class="description color-text-a">
                    <?php //echo $propertydetails["reason_being_sold"] ?>
                    </p>
                  </div> -->

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d">
                        <h3 class="title-d">Personal & Investment Details</h3>
                      </div>
                    </div>
                  </div>
                  <div class="summary-list">
                      <ul class="list">
                        <li class="d-flex justify-content-between">
                          <strong>Will Seller Carry a Note:</strong>
                          <span><?php echo $propertydetails['seller_note'] ?></span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Rate:</strong>
                          <span><?php echo $propertydetails['rate_of'] ?></span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Year Amortized:</strong>
                          <span><?php echo $propertydetails['years_amortized_of'] ?></span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Amount:</strong>
                          <span><?php echo $propertydetails['amount_of'] ?></span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Baloon Amount:</strong>
                          <span><?php echo $propertydetails['balloon_amount_of'] ?>
                            
                          </span>
                        </li>
                        <li class="d-flex justify-content-between">
                          <strong>Prepayment Penalty:</strong>
                          <span><?php echo $propertydetails['prepayment_penalty_amount_of'] ?>
                          </span>
                        </li> 
                        <li class="d-flex justify-content-between">
                          <strong>Familiarity with Property:</strong>
                          <span><?php echo $propertydetails['familiar_with_property'] ?>
                          </span>
                        </li> 
                        <li class="d-flex justify-content-between">
                          <strong>Familiarity with Neighborhood:</strong>
                          <span><?php echo $propertydetails['familiar_with_neighborhood'] ?>
                          </span>
                        </li> 
                        <li class="d-flex justify-content-between">
                          <strong>Time Inveting in Realestate:</strong>
                          <span><?php echo $propertydetails['time_in_real_estate'] ?>
                          </span>
                        </li> 
                      </ul>
                    </div>
                  <!-- <div class="row section-t3">
                    <div class="col-sm-12">
                      <div class="title-box-d">
                        <h3 class="title-d">Amenities</h3>
                      </div>
                    </div>
                  </div>
                  <div class="amenities-list color-text-a">
                    <ul class="list-a no-margin">
                      <li>Balcony</li>
                      <li>Outdoor Kitchen</li>
                      <li>Cable Tv</li>
                      <li>Deck</li>
                      <li>Tennis Courts</li>
                      <li>Internet</li>
                      <li>Parking</li>
                      <li>Sun Room</li>
                      <li>Concrete Flooring</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div> -->
          
          
          </div>
        </div>
      </section>
      <!--/ Property Single End /-->

      <!--/ footer Star /-->

    <?php include "includes/footer.php"; ?>
      <!--/ Footer End /-->

      <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
      <!-- <div id="preloader"></div> -->

      <!-- JavaScript Libraries -->
      <script src="lib/jquery/jquery.min.js"></script>
      <script src="lib/jquery/jquery-migrate.min.js"></script>
      <script src="lib/popper/popper.min.js"></script>
      <script src="lib/bootstrap/js/bootstrap.min.js"></script>
      <script src="lib/easing/easing.min.js"></script>
      <script src="lib/owlcarousel/owl.carousel.min.js"></script>
      <script src="lib/scrollreveal/scrollreveal.min.js"></script>
      <!-- Contact Form JavaScript File -->
      <script src="contactform/contactform.js"></script>

      <!-- Template Main Javascript File -->
      <script src="js/main.js"></script>

    </body>
    </html>
