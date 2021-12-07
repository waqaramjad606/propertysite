
<?php 
  include "includes/header.php";
  require "includes/connection.php";

  
  
  if(!isset($_SESSION['userID'])){
    ?>
    <script>
          window.location.href="signup";
        </script> 
  <?php
  }
  
 ?>
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
        <!-- <div class="col-sm-12">
          <div class="grid-option">
            <form>
              <select class="custom-select">
                <option selected>All</option>
                <option value="1">Neu zu alt</option>
                <option value="2">Zu vermieten</option>
                <option value="3">Zu verkaufen</option>
              </select>
            </form>
          </div>
        </div> -->
        <!-- main div of apartment -->
       
       
        <!-- main div of col apartment -->
                <!-- main div of apartment -->

        <!-- main div of col apartment -->


      </div>
    
      <!-- main row of apartments above -->
  <!--     <div class="row">
        <div class="col-sm-12">
          <nav class="pagination-a">
            <ul class="pagination justify-content-end">
              <li class="page-item disabled">
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
              </li>
            </ul>
          </nav>
        </div>
      </div> -->
    </div>
  </section>
  <!--/ Property Grid End /-->
<?php include "includes/footer.php"; ?>

</body>
</html>
