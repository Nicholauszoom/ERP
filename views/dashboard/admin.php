<?php
use app\models\Customer;
use app\models\Product;
use app\models\Purchase;
use app\models\Store;
use app\models\Supplier;
use app\models\User;

$this->context->layout = 'create2_main';
?>
 
   
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Sales Cards  -->
          <!-- ============================================================== -->
          <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-cyan text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-view-dashboard"></i>
                  </h1>
                  <h6 class="text-white">Leads</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <?php 
            $products=Product::find()->count();
            
            ?>
            <div class="col-md-6 col-lg-4 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-barcode"></i>
                  </h1>
                  <h6 class="text-white">Products</h6>
                  <h6 class="text-white"><?=$products?></h6>
                </div>
                
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-warning text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-chart-areaspline"></i>
                  </h1>
                  <h6 class="text-white">Sales</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <?php 
            $purchase=Purchase::find()->count();
            
            ?>
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-danger text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-cart"></i>
                  </h1>
                  <h6 class="text-white">Purchase</h6>
                  <h6 class="text-white"><?=$purchase?></h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-arrow-all"></i>
                  </h1>
                  <h6 class="text-white">Production</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <?php 
            $customer=Customer::find()->count();
            
            ?>
            <div class="col-md-6 col-lg-4 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-danger text-center">
                  <h1 class="font-light text-white">
                    <i class="fas fa-users"></i>
                  </h1>
                  <h6 class="text-white">Customers</h6>
                  <h6 class="text-white"><?=$customer?></h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <?php 
            $user=User::find()->count();
            
            ?>
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white">
                    <i class="fas fa-user"></i>
                  </h1>
                  <h6 class="text-white">Users</h6>
                  <h6 class="text-white"><?=$user?></h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <?php 
            $supplier=Supplier::find()->count();
            
            ?>
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-cyan text-center">
                  <h1 class="font-light text-white">
                    <i class="fas fa-briefcase"></i>
                  </h1>
                  <h6 class="text-white">Suppliers</h6>
                  <h6 class="text-white"><?=$supplier?></h6>

                </div>
              </div>
            </div>
            <!-- Column -->
            <?php 
            $store=Store::find()->count();
            
            ?>
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-calendar-check"></i>
                  </h1>
                  <h6 class="text-white">Warehouse</h6>
                  <h6 class="text-white"><?=$store?></h6>

                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-warning text-center">
                  <h1 class="font-light text-white">
                    <i class="fas fa-cog"></i>
                  </h1>
                  <h6 class="text-white">Settings</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
          </div>
          <!-- ============================================================== -->
          <!-- Sales chart -->
          <!-- ============================================================== -->
    
        </div>
    
        <footer class="footer text-center">
          All Rights Reserved by ERP Experts. Designed and Developed by
          <a href="">company name</a>.
     
      </div>
    
    </div>
  
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="../assets/libs/flot/excanvas.js"></script>
    <script src="../assets/libs/flot/jquery.flot.js"></script>
    <script src="../assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="../assets/libs/flot/jquery.flot.time.js"></script>
    <script src="../assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="../assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="../assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="../dist/js/pages/chart/chart-page-init.js"></script>

