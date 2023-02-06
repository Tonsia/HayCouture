<?php include './master.head.php';?>

<div class="row">
  
              <div class="col-md-12">
                <div class="breadcrumb__content">
                  <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                      <h2>Dashboard</h2>
                    </div>
                  </div>
                  <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                      <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="http://localhost/proadmin/dashboard.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="status__box-3 bg-style">
                  <div class="item__left">
                    <h2>Total Sale</h2>
                    <div class="status__box__data">
                     
                      <h2><?php include 'db_connect.php'; 
                          echo $conn->query("SELECT * FROM orders")->num_rows; ?></h2>
                    </div>
                  </div>
                  <div class="item__right">
                    <div class="status__box__img">
                      <i class="fas fa-chart-bar fa-2x"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="status__box-3 bg-style">
                  <div class="item__left">
                    <h2>Today Order</h2>
                    <div class="status__box__data">
                      <h2>0</h2>
                    </div>
                  </div>
                  <div class="item__right">
                    <div class="status__box__img">
                      <i class="fas fa-chart-bar fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="status__box-3 bg-style">
                  <div class="item__left">
                    <h2>July Sale</h2>
                    <div class="status__box__data">
                      <h2>0</h2>
                    </div>
                  </div>
                  <div class="item__right">
                    <div class="status__box__img">
                      <i class="fas fa-chart-bar fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="status__box-3 bg-style">
                  <div class="item__left">
                    <h2>Yearly Sale</h2>
                    <div class="status__box__data">
                      <h2>0</h2>
                    </div>
                  </div>
                  <div class="item__right">
                    <div class="status__box__img">
                      <i class="fas fa-chart-bar fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="status__box-3 bg-style">
                  <div class="item__left">
                    <h2>Orders</h2>
                    <div class="status__box__data">
                      <h2>0</h2>
                    </div>
                  </div>
                  <div class="item__right">
                    <div class="status__box__img">
                      <i class="fas fa-shopping-cart fa-2x"></i>
                    </div>
                  </div>
                </div>
              </div> -->
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="status__box-3 bg-style">
                  <div class="item__left">
                    <h2>Pending Orders</h2>
                    <div class="status__box__data">
                    <h2><?php include 'db_connect.php'; 
                          echo $conn->query("SELECT * FROM cart where status=2 ")->num_rows; ?></h2> 
                    </div>
                  </div>
                  <div class="item__right">
                    <div class="status__box__img">
                      <i class="fas fa-shopping-cart fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="status__box-3 bg-style">
                  <div class="item__left">
                    <h2> Delivered Orders</h2>
                    <div class="status__box__data">
                    <h2><?php include 'db_connect.php'; 
                          echo $conn->query("SELECT * FROM cart where status=5 ")->num_rows; ?></h2> 
                    </div>
                  </div>
                  <div class="item__right">
                    <div class="status__box__img">
                      <i class="fas fa-shopping-cart fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="status__box-3 bg-style">
                  <div class="item__left">
                    <h2>Returned Orders</h2>
                    <div class="status__box__data">
                    <h2><?php include 'db_connect.php'; 
                          echo $conn->query("SELECT * FROM cart where status=9 ")->num_rows; ?></h2> 
                    </div>
                  </div>
                  <div class="item__right">
                    <div class="status__box__img">
                      <i class="fas fa-shopping-cart fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="status__box-3 bg-style">
                  <div class="item__left">
                    <h2>Total Earning</h2>
                    <div class="status__box__data">
                    <h2>
                    </div>
                  </div>
                  <div class="item__right">
                    <div class="status__box__img">
                      <i class="fas fa-money-bill-wave fa-2x"></i>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="status__box-3 bg-style">
                  <div class="item__left">
                    <h2>Today Earning</h2>
                    <div class="status__box__data">
                      <h2>Rs 0.00</h2>
                    </div>
                  </div>
                  <div class="item__right">
                    <div class="status__box__img">
                      <i class="fas fa-money-bill-wave fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="status__box-3 bg-style">
                  <div class="item__left">
                    <h2>July Earning</h2>
                    <div class="status__box__data">
                      <h2>Rs 0.00</h2>
                    </div>
                  </div>
                  <div class="item__right">
                    <div class="status__box__img">
                      <i class="fas fa-money-bill-wave fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="status__box-3 bg-style">
                  <div class="item__left">
                    <h2>Yearly Earning</h2>
                    <div class="status__box__data">
                      <h2>Rs 0.00</h2>
                    </div>
                  </div>
                  <div class="item__right">
                    <div class="status__box__img">
                      <i class="fas fa-shopping-cart fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div> -->
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="status__box-3 bg-style">
                  <div class="item__left">
                    <h2>Products</h2>
                    <div class="status__box__data">
                    <h2><?php include 'db_connect.php'; 
                          echo $conn->query("SELECT * FROM products where product_status=1")->num_rows; ?></h2>
                    </div>
                  </div>
                  <div class="item__right">
                    <div class="status__box__img">
                      <i class="fas fa-check-circle fa-2x"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="status__box-3 bg-style">
                  <div class="item__left">
                    <h2>Customers</h2>
                    <div class="status__box__data">
                    <h2><?php include 'db_connect.php'; 
                          echo $conn->query("SELECT * FROM registration where reg_role=1 & reg_status=1")->num_rows; ?></h2>
                    </div>
                  </div>
                  <div class="item__right">
                    <div class="status__box__img">
                      <i class="fas fa-check-circle fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="status__box-3 bg-style">
                  <div class="item__left">
                    <h2>Categories</h2>
                    <div class="status__box__data">
                    <h2><?php include 'db_connect.php'; 
                          echo $conn->query("SELECT * FROM category where cat_status=1")->num_rows; ?></h2>
                    </div>
                  </div>
                  <div class="item__right">
                    <div class="status__box__img">
                      <i class="fas fa-check-circle fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="status__box-3 bg-style">
                  <div class="item__left">
                    <h2>Brands</h2>
                    <div class="status__box__data">
                      <h2>0</h2>
                    </div>
                  </div>
                  <div class="item__right">
                    <div class="status__box__img">
                      <i class="fas fa-check-circle fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="status__box-3 bg-style">
                  <div class="item__left">
                    <h2>Online Transactions</h2>
                    <div class="status__box__data">
                      <h2>Rs0.00</h2>
                    </div>
                  </div>
                  <div class="item__right">
                    <div class="status__box__img">
                      <i class="fas fa-dollar-sign fa-2x"></i>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="status__box-3 bg-style">
                  <div class="item__left">
                    <h2>Paypal Transactions</h2>
                    <div class="status__box__data">
                      <h2>Rs0.00</h2>
                    </div>
                  </div>
                  <div class="item__right">
                    <div class="status__box__img">
                      <i class="fas fa-dollar-sign fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="status__box-3 bg-style">
                  <div class="item__left">
                    <h2>Stripe Transactions</h2>
                    <div class="status__box__data">
                      <h2>Rs0.00</h2>
                    </div>
                  </div>
                  <div class="item__right">
                    <div class="status__box__img">
                      <i class="fas fa-dollar-sign fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="status__box-3 bg-style">
                  <div class="item__left">
                    <h2>Razorpay Transactions</h2>
                    <div class="status__box__data">
                      <h2>Rs0.00</h2>
                    </div>
                  </div>
                  <div class="item__right">
                    <div class="status__box__img">
                      <i class="fas fa-dollar-sign fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="status__box-3 bg-style">
                  <div class="item__left">
                    <h2>Bank Transactions</h2>
                    <div class="status__box__data">
                      <h2>Rs0.00</h2>
                    </div>
                  </div>
                  <div class="item__right">
                    <div class="status__box__img">
                      <i class="fas fa-dollar-sign fa-2x"></i>
                    </div>
                  </div>
                </div>
              </div> -->
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="status__box-3 bg-style">
                  <div class="item__left">
                    <h2>Reviews</h2>
                    <div class="status__box__data">
                    <h2><?php include 'db_connect.php'; 
                          echo $conn->query("SELECT * FROM review where review_status=1")->num_rows; ?></h2>
                    </div>
                  </div>
                  <div class="item__right">
                    <div class="status__box__img">
                      <i class="fas fa-comment-alt fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="status__box-3 bg-style">
                  <div class="item__left">
                    <h2>Blogs</h2>
                    <div class="status__box__data">
                      <h2>0</h2>
                    </div>
                  </div>
                  <div class="item__right">
                    <div class="status__box__img">
                      <i class="fas fa-blog fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="status__box-3 bg-style">
                  <div class="item__left">
                    <h2>Subscribers</h2>
                    <div class="status__box__data">
                      <h2>0</h2>
                    </div>
                  </div>
                  <div class="item__right">
                    <div class="status__box__img">
                      <i class="fas fa-users fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- <div class="row">
              <div class="col-md-6 mb-3">
                <div class="card transactions-chart-card">
                  <div class="item-top card-header mb-30">
                    <h2 class="card-title">Transactions</h2>
                  </div>
                  <div class="card-body">
                    <div class="chart-container">
                      <canvas id="earnSource"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="card sales-ratio-chart-card">
                  <div class="item-top card-header mb-30">
                    <h2 class="card-title">Sales Ratio</h2>
                  </div>
                  <div class="card-body">
                    <div class="chart-container">
                      <canvas id="salesRatio"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="card">
                  <div class="item-top card-header mb-30">
                    <h2 class="card-title">July Sales</h2>
                  </div>
                  <div class="card-body">
                    <div class="chart-container">
                      <canvas id="multipleLineChart"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="card">
                  <div class="item-top card-header mb-30">
                    <h2 class="card-title">July Earnings</h2>
                  </div>
                  <div class="card-body">
                    <div class="chart-container">
                      <canvas id="multipleLineChart2"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- <div id="transaction_pie" data-dt='[76.47058823529412,0,11.76470588235294,0,1700]'></div>
            <div id="sales_ratio" data-dt='[0,0]'></div> -->
          </div>
        </div>

<?php include './master.foot.php';?>

<script src="./assets/backend/plugins/chart.min.js"></script>
        <script src="./assets/backend/js/admin/dashboard.js"></script>
        <script>
            multipleLineChart = document.getElementById('multipleLineChart').getContext('2d'),
                multipleLineChart2 = document.getElementById('multipleLineChart2').getContext('2d')
            var myMultipleLineChart = new Chart(multipleLineChart, {
                type: 'bar',
                data: {
                    labels: [{}],
                    datasets: [{
                        label: "Product Sales",
                        borderColor: "#6777ef",
                        pointBorderColor: "#FFF",
                        pointBackgroundColor: "#6777ef",
                        pointBorderWidth: 2,
                        pointHoverRadius: 4,
                        pointHoverBorderWidth: 1,
                        pointRadius: 4,
                        backgroundColor: '#6777ef',
                        fill: true,
                        borderWidth: 2,
                        data: [{ }]
                    }]
                },
                options : {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        bodySpacing: 4,
                        mode:"nearest",
                        intersect: 0,
                        position:"nearest",
                        xPadding:10,
                        yPadding:10,
                        caretPadding:10
                    },
                    layout:{
                        padding:{left:15,right:15,top:15,bottom:15}
                    }
                }
            });

            var myMultipleLineChart2 = new Chart(multipleLineChart2, {
                type: 'bar',
                data: {
                    labels: [{}],
                    datasets: [ {
                        label: "Earning $",
                        borderColor: "#66bb6a",
                        pointBorderColor: "#FFF",
                        pointBackgroundColor: "#66bb6a",
                        pointBorderWidth: 2,
                        pointHoverRadius: 4,
                        pointHoverBorderWidth: 1,
                        pointRadius: 4,
                        backgroundColor: '#66bb6a',
                        fill: true,
                        borderWidth: 2,
                        data: [{}]
                    }]
                },
                options : {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        bodySpacing: 4,
                        mode:"nearest",
                        intersect: 0,
                        position:"nearest",
                        xPadding:10,
                        yPadding:10,
                        caretPadding:10
                    },
                    layout:{
                        padding:{left:15,right:15,top:15,bottom:15}
                    }
                }
            });
        </script>