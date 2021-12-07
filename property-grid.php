<?php 
include "includes/header.php";
    
    ?>
  
  <?php require "includes/connection.php";
  $conn = connecttoDB("p%<onZmUeePZ{{");


    $searchquery = "";
$check = "";
	

if(isset($_GET['statename']) && $_GET['statename'] != ""){
		$check = $check."state=".$_GET['statename'];
		$searchquery = $searchquery." and state like '%".$_GET['statename']."%'";
	
}
if(isset($_GET['postcode']) && $_GET['postcode'] != ""){
		$check = $check."&zip=".$_GET['postcode'];
		$searchquery = $searchquery." and zip = '".$_GET['postcode']."'";
	
}
if(isset($_GET['cityname']) && $_GET['cityname'] != ""){
		$check = $check."&city=".$_GET['cityname'];
		$searchquery = $searchquery." and city like '%".$_GET['cityname']."%'";
	
}
// echo $searchquery;
  ?>

    <style>
    #setimages {
        width: 350px;
        height: 467px;
      }
    
  </style>
    <!--/ Nav Star /-->

    <!--/ Nav End /-->
    <script>
      $(document).ready(function() { 
        $('#propertyli').addClass('active');
      });
      </script>
    <!--/ Intro Single star /-->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Our Amazing Properties</h1>
              <span class="color-text-a">Grid Properties</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Properties Grid
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
          <div class="col-sm-12">
            <div class="grid-option">
              <form>
                <select class="custom-select">
                  <option selected>All</option>
                  <option value="1">New to Old</option>
                  <option value="2">For Rent</option>
                  <option value="3">For Sale</option>
                </select>
              </form>
            </div>
          </div>
          
        <?php 
            if (isset($_GET['pageno'])) {
              $pageno = $_GET['pageno'];
          } else {
              $pageno = 1;
          }
          $no_of_records_per_page = 12;
          $offset = ($pageno-1) * $no_of_records_per_page;
          $total_pages_sql = "SELECT COUNT(*) FROM property";
          $result = mysqli_query($conn,$total_pages_sql);
          $total_rows = mysqli_fetch_array($result)[0];
          $total_pages = ceil($total_rows / $no_of_records_per_page);
  
          $sql = "SELECT * FROM property where is_active=1 ".$searchquery." order by id desc LIMIT $offset, $no_of_records_per_page";
          // echo $sql;
          $res_data = mysqli_query($conn,$sql);
         
            // $propertyquery = mysqli_query($conn,"SELECT * from property where is_active=1 order by id acs");
            while($property= mysqli_fetch_assoc($res_data)){
              $propertyid = $property['id'];
              $selectimgsquery = mysqli_query($conn,"SELECT * from property_document where property_id = '$propertyid' order by id desc limit 1");
              $images = mysqli_fetch_assoc($selectimgsquery);
              $imagepath="property_images/".$images['property_id']."_l.".$images['ext'];
              if(!file_exists($imagepath)){
                  $getimage="property_images/default-img.jpg";
              }else{
                $getimage=$imagepath;
              }
             
        ?>
        
          <div class="col-md-4">
          
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="<?php echo $getimage ?>" alt="" class="img-a img-fluid" id="setimages">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="property-single?property_id= <?php echo $property['id'] ?>">
                        <?php echo $property['project_name'] ?>
                       
                      </a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a">price | $ <?php echo $property['purchase_price'] ?> </span>
                    </div>
                    <a href="property-single?property_id=<?php echo $property['id'] ?>" class="link-a">Click here to view
                      <span class="ion-ios-arrow-forward"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">Area</h4>
                        <span> <?php echo $property['square_footage'] ?>m
                          <sup>2</sup>
                        </span>
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
        <div class="row">
          <div class="col-sm-12">
            <nav class="pagination-a">
              <ul class="pagination justify-content-end">
              <li><a class="px-1" href="?pageno=1">First</a></li>
              <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                  <a class="px-1" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
              </li>
              <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                  <a class="px-1" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
              </li>
              <li><a class="px-1" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>

                <!-- <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">
                    <span class="ion-ios-arrow-back"></span>
                  </a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item next">
                  <a class="page-link" href="#">
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </li> -->
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <!--/ Property Grid End /-->

    <!--/ footer Star /-->
  
    <?php include "includes/footer.php";?>
    <!--/ Footer End /-->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <div id="preloader"></div>

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
