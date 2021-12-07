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


  ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- Sidebar -->
      <?php include "includes/sidebar.php"; ?>

      <script>
        $(document).ready(function() { 
          $('#newapartli').addClass('active');
        });
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
              <h1 class="h3 mb-0 text-gray-800">Add Property</h1>
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
        <h6 class="m-0 font-weight-bold text-primary">Add New Property</h6>
      </div>
    <div class="card-body">
                  <!-- Default form register -->
<form class="text-center border border-light p-5" action="" id="addpropertyform" style="padding-bottom: 0px !important;" method="post" enctype="multipart/form-data">

      <p class="h4 mb-4">Add New Property</p>

      <div class="form-row mb-2">
          <div class="col-lg-6 col-md-12">
              <label for="" style="float:left;">Title</label>
              <input type="text" name="title" id=title class="form-control" placeholder="" required value="">
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
              <input type="text" name="city" id=city class="form-control" placeholder="city" required value="">
          </div> 
          <div class="col-lg-3 col-md-12">
            <label for="" style="float:left;">POST CODE</label>
            <input type="number" name="postcode" id="postcode" class="form-control" placeholder="i.e 123" value="">
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
            <input type="text" name="lotattributes" id="lotattributes" class="form-control" placeholder="i.e flat" required value="">                   
        </div>
        <div class="col-lg-3 col-md-12">
            <label for="" style="float:left;">Zoning Code</label>
            <input type="text" name="zcode" id="zocode" class="form-control" placeholder="i.e 123" required value="">                   
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
            <input type="text" name="timeinvest" id="timeinvest" class="form-control" placeholder="i.e 1-2 years" required value="">                   
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


      <!-- <hr> -->


</form>    
    </div>
  </div>
           
  <script>
    $('#addpropertyform').submit(function(event){
      event.preventDefault();
      $.ajax({
        url:"../serverside/ajax.php",
        method :"post",
        data:$('#addpropertyform').serialize()+'&func=1.77&sitekey=p%<onZmUeePZ{{',
        
        success:function(data){
          // console.log(data);
          if(data.trim()=="true"){
            swal("Added!","Property Added Successfully.","success");
            location.reload();
          }
          else{
            swal("Error!", "Failed to Add New Property!", "error");
          }
  
        }//success function
      });//ajax
    });//form submit
  </script>
              
          </div>

        </div>
        <!-- End of Main Content -->
  
  <style>
    .red{
      border-color: red;
    }
  </style>
        <!-- Footer -->
      <?php include "includes/adminfooter.php"; ?>
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
