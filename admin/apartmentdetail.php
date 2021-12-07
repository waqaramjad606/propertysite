      <!DOCTYPE html>
      <html lang="en">

      <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin Panel</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

      </head>

      <body id="page-top">
      <?php 
        session_start();
        include '../includes/connection.php';
        $conn = connecttoDB("p%<onZmUeePZ{{");
        if (!isset($_SESSION['adminlogged1'])) {
          header("Location:login");
        }
        if(!isset($_GET['apartmentid'])){
          header("location:allactiveproperties");
        }
        $apartmentid = $_GET['apartmentid'];
        
        $query1 = mysqli_query($conn, "SELECT * FROM property where id = '$apartmentid'");
        $apartmentdetails = mysqli_fetch_assoc($query1);



      ?>

        <!-- Page Wrapper -->
        <div id="wrapper">

          <!-- Sidebar -->
          <?php include "includes/sidebar.php"; ?>
        <script>
            // $(document).ready(function() { 
            //   $('#allapartli').addClass('active');
            // });
          </script>
          <!-- End of Sidebar -->

          <!-- Content Wrapper -->
          <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

              <!-- Topbar -->
              <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                  <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
        

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                  <!-- Nav Item - Messages -->


                  <div class="topbar-divider d-none d-sm-block"></div>

                  <!-- Nav Item - User Information -->
                  <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                      <span><i class="fas fa-arrow-down fa-sm fa-fw mr-2 text-gray-400"></i></span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                    <!--  <a class="dropdown-item" href="setting.php">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                      </a> -->

                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="logout" >
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                      </a>
                    </div>
                  </li>

                </ul>

              </nav>
              <!-- End of Topbar -->

              <!-- Begin Page Content -->
              <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  <h1 class="h3 mb-0 text-gray-800">Admin Dashboard</h1>
                </div>
                <!-- Content Row -->
              <div class="container-fluid">

      <script>

      </script>
      <style>
        .hideit{
          display: none;
        }
      </style>


          <!-- All users div -->
<div class="card shadow mb-4" id="allordersdiv">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?php echo 'Apartment ID '.$apartmentdetails['id']; ?></h6>
  </div>
    <div class="card-body">
      <!-- Default form register -->

                <form class="text-center border border-light p-5" action="apartmentdetail?apartmentid=<?php echo $apartmentid; ?>" id="updateapartment" style="padding-bottom: 0px !important;" method="post" enctype="multipart/form-data">

                    <p class="h4 mb-4">Apartment Details</p>
                    
                    <div class="form-row mb-2">
                        <div class="col-lg-6 col-md-12">
                            <label for="" style="float:left;">Title</label>
                            <input type="text" name="title" id=title class="form-control" placeholder="Title" required value="<?php echo $apartmentdetails['project_name'] ?>">
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <label for="" style="float:left;">Type</label>
                            <input type="text" name="type" id="type" class="form-control" placeholder="Type" required value="<?php echo $apartmentdetails['type'] ?>">
                            
                        </div>   
                        <div class="col-lg-3 col-md-12">
                            <label for="" style="float:left;">Property Type</label>
                            <input type="text" name="ptype" id="ptype" class="form-control" placeholder="city" required value="<?php echo $apartmentdetails['property_type'] ?>">
                        </div>               
                    </div>
                    
                    <div class="form-row mb-2">
                    
                      <div class="col-lg-3 col-md-12">
                            <label for="" style="float:left;">State</label>
                            <input type="text" name="state" id="state" class="form-control" placeholder="city" required value="<?php echo $apartmentdetails['state'] ?>">
                        </div> 
                        <div class="col-lg-3 col-md-12">
                            <label for="" style="float:left;">City</label>
                            <input type="text" name="city" id=city class="form-control" placeholder="city" required value="<?php echo $apartmentdetails['city'] ?>">
                        </div> 
                        <div class="col-lg-3 col-md-12">
                          <label for="" style="float:left;">POST CODE</label>
                          <input type="number" name="postcode" id="postcode" class="form-control" placeholder="POST CODE" value="<?php echo $apartmentdetails['zip']; ?>">
                      </div>
                        <div class="col-lg-3 col-md-12">
                            <label for="" style="float:left;">Country</label>
                            <input type="text" name="country" id="country" class="form-control" placeholder="city" required value="<?php echo $apartmentdetails['country'] ?>">
                        </div>   
                  
                    </div>
                    <div class="form-row mb-2">
                    <div class="col-lg-3 col-md-12">
                          <label for="" style="float:left;">Purchase Price</label>
                          <input type="number" name="purchase_price" id="purchase_price" class="form-control" placeholder="Price" required value="<?php echo $apartmentdetails['purchase_price']; ?>">
                      </div>
                      <div class="col-lg-3 col-md-12">
                          <label for="" style="float:left;">Area in meter sq</label>
                          <input type="number" name="areainsq" id="areainsq" class="form-control" placeholder="Area in meter sq" required value="<?php echo $apartmentdetails['square_footage']; ?>">
                      </div>
                      <div class="col-lg-6 col-md-12">
                          <label for="" style="float:left;">Address</label>
                          <input type="text" name="address" id="address" class="form-control" placeholder="" required value="<?php echo $apartmentdetails['str_addr1']; ?>">
                      </div>
                      

                    </div>
                    <div class="form-row mb-2">
                    
                      <div class="col-lg-4 col-md-12">
                          <label for="" style="float:left;">Property Condidion</label>
                          <input type="text" name="pcondition" id="pcondition" class="form-control" placeholder="city" required value="<?php echo $apartmentdetails['property_condition'] ?>">                   
                      </div>
                      <!-- <div class="col-lg-4 col-md-12">
                          <label for="" style="float:left;">Overall Condidion</label>
                          <input type="text" name="overall" id="overall" class="form-control" placeholder="" required value="<?php echo $apartmentdetails['property_condition'] ?>">                   
                      </div> -->
                      <div class="col-lg-8 col-md-12">
                          <label for="" style="float:left;">Neighborhood Condition</label>
                          <input type="text" name="ncondition" id="ncondition" class="form-control" placeholder="" required value="<?php echo $apartmentdetails['neighborhood_condition'] ?>">                   
                      </div>
                    </div>
                    
                    <div class="form-row mb-2">
                      <div class="col-lg-3 col-md-12">
                          <label for="" style="float:left;">No of Units</label>
                          <input type="number" name="nounit" id="nounit" class="form-control" placeholder="no of units" required value="<?php echo $apartmentdetails['number_of_units'] ?>">                   
                      </div>
                      <div class="col-lg-3 col-md-12">
                          <label for="" style="float:left;">lot attributes</label>
                          <input type="text" name="lotattributes" id="lotattributes" class="form-control" placeholder="i.e flat" required value="<?php echo $apartmentdetails['lot_attributes'] ?>">                   
                      </div>
                      <div class="col-lg-3 col-md-12">
                          <label for="" style="float:left;">Zoning Code</label>
                          <input type="text" name="zcode" id="zocode" class="form-control" placeholder="i.e 123" required value="<?php echo $apartmentdetails['zoning_code'] ?>">                   
                      </div>
                      <div class="col-lg-3 col-md-12">
                          <label for="" style="float:left;">Lot Size Measurment</label>
                          <input type="text" name="lsmeaurment" id="lsmeaurment" class="form-control" placeholder="" required value="<?php echo $apartmentdetails['lot_size_measurment'] ?>">                   
                      </div>
                    </div>
                    <div class="form-row mb-2">
                      <div class="col-lg-4 col-md-12">
                          <label for="" style="float:left;">Investment Type</label>
                          <input type="text" name="investtype" id="inverttype" class="form-control" placeholder="no of units" required value="<?php echo $apartmentdetails['investment_type'] ?>">                   
                      </div>
                      <div class="col-lg-4 col-md-12">
                          <label for="" style="float:left;">Familiarity with Neighborhood</label>
                          <input type="text" name="famneigh" id="famneigh" class="form-control" placeholder="" required value="<?php echo $apartmentdetails['familiar_with_neighborhood'] ?>">                   
                      </div>
                      <div class="col-lg-4 col-md-12">
                          <label for="" style="float:left;">Time Inveting in Realestate</label>
                          <input type="text" name="timeinvest" id="timeinvest" class="form-control" placeholder="" required value="<?php echo $apartmentdetails['time_in_real_estate'] ?>">                   
                      </div>
                     
                    </div>
                    <div class="form-row mb-2">
                    
                      <div class="col-lg-4 col-md-12">
                          <label for="" style="float:left;">Rate</label>
                          <input type="number" name="rate" id="rate" class="form-control" placeholder="" required value="<?php echo $apartmentdetails['rate_of'] ?>">                   
                      </div>
                      <div class="col-lg-4 col-md-12">
                          <label for="" style="float:left;">Year Amortized</label>
                          <input type="number" name="amortized" id="amortized" class="form-control" placeholder="" required value="<?php echo $apartmentdetails['years_amortized_of'] ?>">                   
                      </div>
                      <div class="col-lg-4 col-md-12">
                          <label for="" style="float:left;">Amount</label>
                          <input type="number" name="amount" id="amount" class="form-control" placeholder="" required value="<?php echo $apartmentdetails['amount_of'] ?>">                   
                      </div>
                    </div>
                    <div class="form-row mb-2">
                     
                      <div class="col-lg-4 col-md-12">
                          <label for="" style="float:left;">Baloon Amount</label>
                          <input type="number" name="bamount" id="bamount" class="form-control" placeholder="" required value="<?php echo $apartmentdetails['balloon_amount_of'] ?>">                   
                      </div>
                      <div class="col-lg-4 col-md-12">
                          <label for="" style="float:left;">Prepayment Penalty</label>
                          <input type="number" name="preamount" id="preamount" class="form-control" placeholder="" required value="<?php echo $apartmentdetails['prepayment_penalty_amount_of'] ?>">                   
                      </div>
                      <div class="col-lg-4 col-md-12">
                          <label for="" style="float:left;">Familiarity with Property</label>
                          <input type="text" name="fampro" id="fampro" class="form-control" placeholder="" required value="<?php echo $apartmentdetails['familiar_with_property'] ?>">                   
                      </div>
                      
                    </div>
                    <div class="form-row mb-2">
                    <div class="col-lg-4 col-md-12">
                          <label for="" style="float:left;">Cash on Cash Return for Inverstor</label>
                          <input type="number" name="cashreturn" id="cashreturn" class="form-control" placeholder="" required value="<?php echo $apartmentdetails['cash_on_cash_return'] ?>">                   
                      </div>
                      
                      <div class="col-lg-4 col-md-12">
                          <label for="" style="float:left;">Investment Amount</label>
                          <input type="number" name="investamount" id="investamount" class="form-control" placeholder="i.e flat" required value="<?php echo $apartmentdetails['investment_amount_needed'] ?>">                   
                      </div>
                      <div class="col-lg-4 col-md-12">
                          <label for="" style="float:left;">Equity Offer to Partner</label>
                          <input type="number" name="equityoffer" id="equityoffer" class="form-control" placeholder="i.e 123" required value="<?php echo $apartmentdetails['equity_offered'] ?>">                   
                      </div>
                    </div>
                    <div class="form-row mb-2">
                      <div class="col-lg-12 col-md-12">
                          <label for="" style="float:left;">Description</label>
                          <textarea class="form-control" name="description" id="description" cols="30" rows="3" required><?php echo $apartmentdetails['property_description']; ?></textarea>                      
                      </div>
                    </div>
                    
                    <!-- Sign up button -->
                    <div class="form-row mb-2">
                      <button class="btn btn-info my-4 btn-block" name="updateapartmentbyadmin" id="updateapartment" type="submit">Update Property</button>
                    </div>
                </form>
               
                <!-- update profile form above -->
                      <?php
                        // $pid=$_GET['appartmentid'];
                        $imagequery=mysqli_query($conn,"SELECT * FROM property_document where property_id='$apartmentid' order by id desc limit 1");
                        $getimage=mysqli_fetch_assoc($imagequery);
                        $getimagepath="../property_images/".$getimage['property_id']."_l.".$getimage['ext'];
                      ?>
                    <!-- documents area below -->
                  <div class="card-body">
                      <div class="form-row mb-2">
                          <div class="col-lg-6 col-md-12">
                          <span><i class="fa fa-upload"></i> Upload Photo</span>
                              <input type="file" name="imgs" id="imgs" class="form-control" oninput="add_Property_image()"/>
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
                <!-- main user div -->
                <script>
                  function deleteapartimg(imgid){
                    swal({
                      title: "Are you sure?",
                      text: "Once deleted, you will not be able to recover this Image!",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                    })
                    .then((willDelete) => {
                      if (willDelete) {
                        $.ajax({
                          method:"post",
                          url:"../serverside/ajax.php",
                          data:{deleteapartmentimg:"yes",imgid:imgid},
                          success:function(data){
                            if(data.trim()=="deleted"){
                              swal("Deleted!","Image Deleted!","success").then((value) => {
                                  window.location.href = "apartmentdetail?apartmentid="+"<?php echo $apartmentid ?>";
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
                  $('#updateapartment').submit(function(event){
                    event.preventDefault();
                    $.ajax({
                      url:"../serverside/ajax.php",
                      method :"post",
                      data:$('#updateapartment').serialize()+'&func=1.66&sitekey=p%<onZmUeePZ{{&updateapartmentbyadmin=yes&apartmentid=<?php echo $apartmentid ?>',
                      success:function(data){
                        // alert(data);
                        // console.log(data);
                        if(data.trim()=="updated"){
                          swal("Updated!","Property Updated Successfully.","success");
                        }
                        // else{
                        //   swal("Error!","Unable to update property.","Failure");
                        // }


                      }//success function
                    });//ajax
                  });//form submit
                  //update actor images
                  function add_Property_image(){
                    var ajax_data = new FormData();
                    ajax_data.append('imgs', $('#imgs')[0].files[0]);
                    ajax_data.append('sitekey', 'p%<onZmUeePZ{{');
                    ajax_data.append('func', '2.3');
                    ajax_data.append('apartmentid',<?php echo $apartmentid ?>)

                    $.ajax({
                        url: '../serverside/ajax.php',
                        type: 'post',
                            // dataType : 'json',
                            processData: false,
                            contentType: false,
                            data: ajax_data,

                            success: function(response) {
                              swal("Updated!","image Uploaded Successfully.","success");
                                // location.reload();

                                // console.log(response);
                            },
                            error: function(err) {
                                location.reload();
                                console.error(err);

                            }
                        });
                }
                </script>
                <!-- all users div ends here -->    
              </div>

            </div>
            <!-- End of Main Content -->
      
      <style>
        .red{
          border-color: red;
        }
      </style>
      <!--  -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
              <div class="container my-auto">
                <div class="copyright text-center my-auto">
                  <span>Copyright &copy; Estate Agency 2020</span>
                </div>
              </div>
            </footer>
            <!-- End of Footer -->

          </div>
          <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fas fa-angle-up"></i>
        </a>

        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/sb-admin-2.min.js"></script>

        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="js/demo/datatables-demo.js"></script>
      </body>

      </html>
