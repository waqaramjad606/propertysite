<?php
include "includes/header.php";
require "includes/connection.php";

$conn = connecttoDB("p%<onZmUeePZ{{");
?>
  <script>
      $(document).ready(function() { 
        $('#homeli').addClass('active');
      });
    </script>
  <!--/ Carousel Star /-->
  <div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
      <?php
      
       $propertyquery = mysqli_query($conn,"SELECT * from property where is_active=1 group by id desc limit 5");
       while($property= mysqli_fetch_assoc($propertyquery)){
         $propertyid = $property['id'];
         $selectimgsquery = mysqli_query($conn,"SELECT * from property_document where property_id = '$propertyid' order by id desc limit 1");
         $images = mysqli_fetch_assoc($selectimgsquery);
         $imagepath="property_images/".$images['property_id']."_l.".$images['ext'];
         if(!file_exists($imagepath)){
           $imagepath="property_images/default-img.jpg";
         }
         else{
           $imagepath=$imagepath;
         }
      ?>
      <div class="carousel-item-a intro-item bg-image">
     
        <div class="overlay overlay-a">
        <img src="<?php echo $imagepath ?>" alt="" class="img-a img-fluid">
        </div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top"><?php echo $property['city'] ,'-',$property['state'],'-',$property['country'] ?>,
                      <br> <?php echo $property['zip'] ?></p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b"> <?php echo $property['zip'] ?></span> 
                      <?php echo $property['project_name'] ?>
                      </h1>
                    <p class="intro-subtitle intro-price">
                      <a href="property-single?property_id=<?php echo $property['id'] ?>"><span class="price-a">Price | $<?php echo $property['purchase_price'] ?></span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <?php
       }
        ?>
    </div>
  </div>
  <!--/ Carousel end /-->

  <!--/ Services Star /-->
  <section class="section-services section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Our Services</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-gamepad"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Lifestyle</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
              But the ferry selected the ball. Cras ultricies ligula sed magna dictum porta. It's a mass of unemployment
                the valley from the kids
                no, not unless there is poverty.
              </p>
            </div>
            <div class="card-footer-c">
              <a href="#" class="link-c link-icon">Read more
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-usd"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Loans</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
              There is no innovative layer to stop. Curabitur aliquet quam id dui posuere blandit. Mauris blandit
                bananas
                a pillow
              </p>
            </div>
            <div class="card-footer-c">
              <a href="" class="link-c link-icon">Read more
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-home"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Sell</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
              But the ferry selected the ball. Cras ultricies ligula sed magna dictum porta. It's a mass of unemployment
                the valley from the kids
                no, not unless there is poverty.
              </p>
            </div>
            <div class="card-footer-c">
              <a href="" class="link-c link-icon">Read more
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Services End /-->

  <!--/ Property Star /-->
  <section class="section-property section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Latest Properties</h2>
            </div>
            <div class="title-link">
              <a href="property-grid.html">All Property
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
      </div>

     
      <div id="property-carousel" class="owl-carousel owl-theme">
      <?php 
          // $selectapartmentsquery = ;
          $propertyquery = mysqli_query($conn,"SELECT * from property where is_active=1 group by id desc limit 3");
          while($property= mysqli_fetch_assoc($propertyquery)){
            $propertyid = $property['id'];
            $selectimgsquery = mysqli_query($conn,"SELECT * from property_document where property_id = '$propertyid' order by id desc limit 1");
            $images = mysqli_fetch_assoc($selectimgsquery);
            $imagepath="property_images/".$images['property_id']."_l.".$images['ext'];
            if(!file_exists($imagepath)){
              $imagepath="property_images/default-img.jpg";
            }
            else{
              $imagepath=$imagepath;
            }
          // }//while
      ?>
        <div class="carousel-item-b">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="<?php echo $imagepath ?>" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="property-single?property_id=<?php echo $property['id'] ?>">
                    <!-- 206 Mount<br /> Olive Road Two</a> -->

                    <?php echo $property["project_name"] ?>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">Price | $<?php echo $property["purchase_price"] ?></span>
                  </div>
                  <a href="property-single?property_id=<?php echo $property['id'] ?>" class="link-a">Click here to view
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Area</h4>
                      <span><?php echo $property['square_footage'] ?>m
                        <sup>2</sup>
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Property Type</h4>
                      <?php echo $property['property_type'] ?>
                    </li>
                    <li>
                      <h4 class="card-info-title">City</h4>
                      <?php echo $property['city'] ?>
                    </li>
                   
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
          }
        ?>
      </div>
     
    </div>
  </section>
  <!--/ Property End /-->

  <!--/ Testimonials End /-->

<?php include "includes/footer.php";?>