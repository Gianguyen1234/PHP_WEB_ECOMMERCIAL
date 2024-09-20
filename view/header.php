<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>X-SHOP</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="view/stylebar.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="icon" href="favicon.svg" type="image/svg+xml">


</head>

<body>
  <div class="top-bar">
    <div class="container">
      <div class="logo">
        <a href="index.php"><i class="fas fa-store"></i> X-Shop</a>
      </div>
      <div class="menu">
        <ul>
          <li>
            <div class="dropdown">
              <button class="dropbtn">
                <i class="fa fa-bars"></i>
                Menu
              </button>
              <div class="dropdown-content">
                <?php
                $dsdm = fetch_list_danhmuc();
                foreach ($dsdm as $dm) {
                  extract($dm);
                  $linkdm = "index.php?act=danhmucsp&iddm=" . $id;
                  echo ' <a href="' . $linkdm . '">' . $name . '</a> ';
                }
                ?>
              </div>
            </div>
          </li>
          <li><a href="index.php?act=gioithieu"><i class="fas fa-info-circle"></i> About Us</a></li>
          <li><a href="index.php?act=hoidap"><i class="fas fa-question-circle"></i> Ask?</a></li>
        </ul>
      </div>
      <div class="search">
        <form action="index.php?act=danhmucsp" method="post">
          <input type="text" placeholder="Search..." name="keyword">
          <button type="submit"><i class="fas fa-search"></i></button>
        </form>
      </div>
      <?php
      if (isset($_SESSION['user'])) {
        extract($_SESSION['user']);
      ?>
        <!-- <div class="user-name">         -->
          <div class="user-info">
            <div class="user-icon">
            <a href="index.php?act=updatetk"><i class="fas fa-user-circle"></i></a>
            </div>
            <div class="user-name">
                <a href="index.php?act=updatetk">Welcome,<?= $name ?></a>
            </div>           
            <a style="color:white;" href="index.php?act=thoat"><i class="fas fa-sign-out-alt"></i>Logout</a>           
          </div>
        <!-- </div> -->
      <?php
      } else {
      ?>
        <div class="user-name">
          <a href="index.php?act=dangki"><i class="fas fa-user-plus"></i> Sign Up</a>
          <a href="index.php?act=dangnhap"><i class="fas fa-user-circle"></i> Login</a>
        </div>
      <?php } ?>
    </div>
  </div>