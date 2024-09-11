<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel</title>
<link rel="stylesheet" href="../css/styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="../favicon.svg" type="image/svg+xml">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>
<body>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
  <div style="text-align: center; margin-bottom: 20px;">
    <img src="img_avatar.png" alt="Profile Image" style="width: 100px; height: 100px; border-radius: 50%;">
    <h4 style="color: white; margin-top: 10px;">Linux Antonio</h4>
  </div>
  <a href="index.php"><i class="fas fa-home"></i> Home</a>
  <a href="index.php?act=adddm"><i class="fas fa-list"></i> Menu</a>
  <a href="index.php?act=addsp"><i class="fas fa-cubes"></i> Product</a>
  <a href="index.php?act=dskh"><i class="fas fa-user-alt"></i> Customer</a>
  <a href="index.php?act=dsbl"><i class="fas fa-comments"></i> Comment</a>
  <div class="dropdown">
    <a href="index.php?act=thongke" class="dropbtn">
        <i class="fas fa-chart-bar"></i>
        Statistics
    </a>
    <div class="dropdown-content">
        <a href="index.php?act=tkdm">Statistics by Category</a>
        <a href="index.php?act=tkdt">Revenue Statistics</a>
    </div>
</div>
  <a href="index.php?act=listbill"><i class="fas fa-shopping-cart"></i> Orders</a>
  <a href="index.php?act=transaction"><i class="fa fa-exchange"></i> Payment</a>
</div>
<!-- Top Bar -->
<div class="top-bar">
  <div class="logo">Admin Panel</div>
  <div class="search-bar">
    <input type="text" placeholder="Search...">
    <button><i class="fa fa-search"></i></button>
  </div>
  <div class="icons-container">
    <i class="fa fa-envelope"></i>
    <i class="fa fa-bell"></i>
    <div class="profile">
      <i class='fas fa-user-cog'></i>
      <div class="admin-name">Linux Antonio</div>
    </div>
  </div>
</div>
</div>

</body>
</html>
