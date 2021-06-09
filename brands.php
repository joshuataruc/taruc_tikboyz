<?php
include 'session_check.php';
if ($_SESSION['user_access_type'] == 'Admin') {
  
}
else{
    header('location:cart.php');
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Tikboys</title>
      <link rel="icon" href="icons/logo.png">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
   </head>
   <body>
      <div class="wrapper">
         <div class="header">
            <div class="header-menu">
               <div class="title"><span>Tikboys</span></div>
               <ul>
                  <li><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
                  <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
               </ul>
            </div>
         </div>
         <div class="sidebar">
            <div class="sidebar-menu">
               <center class="profile">
                  <!-- logo here -->
               </center>
               <li class="item">
                  <a href="dashboard.php" class="menu-btn">
                  <i class="fas fa-home"></i><span>Dashboard </span>
                  </a>
               </li>
                <hr>
               <li class="item" id="profile">
                  <a href="sales.php" class="menu-btn">
                  <i class="fas fa-chart-line"></i><span>Sales</span>
                  </a>
               </li>
               <li class="item">
                  <a href="stocks.php" class="menu-btn">
                  <i class="fas fa-layer-group"></i><span>Stocks </span>
                  </a>
               </li>
              
               <li class="item">
                  <a href="supplier.php" class="menu-btn">
                  <i class="fas fa-truck-loading"></i><span>Supplier</span>
                  </a>
               </li>
               <li class="item active">
                  <a href="brands.php" class="menu-btn">
                  <i class="fas fa-tag"></i><span>Brands</span>
                  </a>
               </li>
               <hr>
               <li class="item ">
                  <a href="users.php" class="menu-btn">
                  <i class="fas fa-user"></i></i><span>Users</span>
                  </a>
               </li>
               
               
            </div>
         </div>
         <div class="main-container">
            <div class="house-table">
              <?php include 'brands/view_brands.php'; ?> 
               
            </div>
         </div>
      </div>
     
   </body>
</html>

