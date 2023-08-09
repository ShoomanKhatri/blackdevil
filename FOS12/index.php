<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E Khaja</title>
  <!--bootstrap css link-->
  <!--bootstrap js link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
  <!--font awesome link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- css file -->
  <link rel="stylesheet" href="style.css" />

  <style>
    body {
      overflow-x: hidden;
      /* for removing horizontal scrollbar.*/
    }

    .NAV {

    background-color:  #1ad1ff;
    }

    .hov:hover {
      font-weight: 1000;
      color:#ff1a8c;
      background-color: ;
      border-radius: 17px;
      transition: 0.2s;
      display: block;
    }

    .hov {
      color: white;
      font-family: Arial, sans-serif;
      font-weight: bold;
    }

    .log {
      background-color: #04AA6D;
      color: white;
      padding: ;
      margin: ;
      border: none;
      cursor: pointer;
      width: ;
      border-radius: 5px 5px 5px 5px;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg  NAV ">
      <div class="container-fluid">
        <img src="images/logo5bg.png" alt="logo" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link hov" aria-current="page" href="index.php">Home</a>
            </li>


            <li class="nav-item">
              <a class="nav-link hov " href="display_all.php">Products</a>
            </li>
            <?php
            if (isset($_SESSION['username'])) {
              echo " <li class='nav-item '>
              <a class='nav-link hov' href='./users_area/profile.php'>My Account</a>
            </li>";
            } else {
              echo "<li class='nav-item'>
              <a class='nav-link hov' href='./users_area/user_registration.php'>Register</a>
            </li>";
            }
            ?>

            <li class="nav-item">
              <a class="nav-link hov " href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link hov" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                  <?php cart_item(); ?>
                </sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link hov" href="#">Total Price:
                <?php total_cart_price(); ?>/-
              </a>
            </li>

          </ul>
          <form class="d-flex" action="search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="search" name="search_data">
            <input type="submit" value="search" class="btn-outline-light px-2" name="search_data_product">
          </form>
        </div>
      </div>
    </nav>

    <!-- calling cart function -->
    <?php cart(); ?>

    <!-- second child -->
    <nav class="nav navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">


        <?php
        if (!isset($_SESSION['username'])) {
          echo "<li class='nav-item'>
            <a class='nav-link mx-2' href='#'>Welcome Guest </a>
          </li>";
        } else {
          echo "<li class='nav-item'>
            <a class='nav-link mx-2 ' href='#'>Welcome " . $_SESSION['username'] . "</a>
          </li>";
        }

        ?>
        <?php
        if (!isset($_SESSION['username'])) {
          echo "<li class='nav-item'>
            <a class='nav-link log' href='./users_area/user_login.php'> Login</a>
          </li>";
        } else {
          echo "<li class='nav-item me-auto log'>
            <a class='nav-link mx-2 text-white' href='./users_area/logout.php'> Logout</a>
          </li>";

        }
        ?>

      </ul>
    </nav>

    <!-- third child -->
    <div class="bg-light">
      <h3 class="text-center text-success"><span style="color:orange; font-weight:bold;"> E </span>khaja Store</h3>
      <p class="text-center">Choose the Best, Savor the Rest!</p>
    </div>



  </div>

  <!-- fourth child -->
  <div class="row px-1">
    <div class="col-md-10">
      <!-- products -->
      <div class="row">

        <!-- fetching products  -->
        <?php

        //calling function.
        getproducts();
        get_unique_categories();
        get_unique_brands();
        //     $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;
        ?>

        <!-- <div class="col-md-4 mb-2">
          <div class="card">
            <img class="card-img-top" src="images/1.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <a href="#" class="btn btn-info">Add to cart</a>
              <a href="#" class="btn btn-secondary">View more</a>
            </div>
          </div>
        </div> -->

        <!-- row end  -->

      </div>

      <!-- column end  -->
    </div>

    <!-- static data -->
    <!-- <div class="col-md-4 mb-2">
          <div class="card">
            <img class="card-img-top" src="images/2.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <a href="#" class="btn btn-info">Add to cart</a>
              <a href="#" class="btn btn-secondary">View more</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-2">
          <div class="card">
            <img class="card-img-top" src="images/3.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <a href="#" class="btn btn-info">Add to cart</a>
              <a href="#" class="btn btn-secondary">View more</a>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-2">
          <div class="card">
            <img class="card-img-top" src="images/3.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <a href="#" class="btn btn-info">Add to cart</a>
              <a href="#" class="btn btn-secondary">View more</a>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-2">
          <div class="card">
            <img class="card-img-top" src="images/3.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <a href="#" class="btn btn-info">Add to cart</a>
              <a href="#" class="btn btn-secondary">View more</a>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-2">
          <div class="card">
            <img class="card-img-top" src="images/3.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <a href="#" class="btn btn-info">Add to cart</a>
              <a href="#" class="btn btn-secondary">View more</a>
            </div>
          </div>
        </div>
      </div>
    </div> -->


    <!-- sidenav -->
    <div class="col-md-2 bg-secondary p-0 sidebar">
      <!-- Brands to be displayed. -->
      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
          <a href="#" class="nav-link text-light">
            <h4>Delivery Brands</h4>
          </a>
        </li>


        <?php
        //calling a function.
        getbrands();

        ?>

        <!-- <li class="nav-item">
          <a href="#" class="nav-link text-light">Brand1</a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link text-light">Brand2</a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link text-light">Brand3</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-light">Brand4</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-light">Brand5</a>
        </li> -->
      </ul>
      <!-- categories to be displayed -->
      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
          <a href="#" class="nav-link text-light">
            <h4>Categories</h4>
          </a>
        </li>

        <?php
        getcategories();


        ?>


        <!-- <li class="nav-item">
          <a href="#" class="nav-link text-light">Categories1</a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link text-light">Categories2</a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link text-light">Categories3</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-light">Categories4</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-light">Categories5</a>
        </li> -->
      </ul>
    </div>




    <!-- last child  -->
    <!-- include footer -->
    <?php 
    // include("includes/footer.php");
     ?>


<div class="bg-info p-3 text-center footer">
      <p>All Rights Reserved &copy; -Designed by EKhaja-2023
        <!-- <?php echo date("Y") ?> -->
      </p>
    </div>
  </div>

</body>

</html>