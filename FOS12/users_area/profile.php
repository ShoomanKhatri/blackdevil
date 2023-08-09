<!-- connect file -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome
        <?php echo $_SESSION['username'] ?>
    </title>
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
    <!-- <link rel="stylesheet" href="../style.css" /> -->

    <style>


            .profile_img {
                width: 90%;
                /* height:100%; */
                margin: auto;
                display: block;
                object-fit: contain;
            }

            .logo {
                width: 7%;
                height: 7%;
            }
        
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
    .hov2:hover{
        background-color: #04AA6D;
        cursor: pointer;
        border-radius: 5px 5px 5px 5px;
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
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <img src="../images/logo5bg.png" alt="logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link hov" aria-current="page" href="../index.php">Home</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link hov" href="../display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hov" href="profile.php">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hov" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hov" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                                    <?php cart_item(); ?>
                                </sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hov" href="#">Total Price:
                                <?php total_cart_price(); ?>/-
                            </a>
                        </li>

                    </ul>
                    <form class="d-flex" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="search"
                            name="search_data">
                        <input type="submit" value="search" class="btn-outline-white text-light log hov2" name="search_data_product">
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
            <a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . "</a>
          </li>";
                }

                ?>
                <?php
                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
            <a class='nav-link log' href='./users_area/user_login.php'> Login</a>
          </li>";
                } else {
                    echo "<li class='nav-item me-auto'>
            <a class='nav-link mx-2 log' href='../users_area/logout.php'> Logout</a>
          </li>";

                }
                ?>

            </ul>
        </nav>

        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center text-success"><span style="color:orange; font-weight:bold;"> E </span>khaja Store
            </h3>
            <p class="text-center">Choose the Best, Savor the Rest!</p>
        </div>

        <!-- Fourth child -->
        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="#">
                            <h4>Your Profile</h4>
                        </a>
                    </li>

                    <?php
                    $username = $_SESSION['username'];
                    $user_image = "select * from `user_table` where user_name='$username';";
                    $user_image = mysqli_query($con, $user_image);
                    $row_image = mysqli_fetch_array($user_image);
                    $user_image = $row_image['user_image'];
                    echo "<li class='nav-item '>
                    <img src='./user_images/$user_image' class='profile_img my-4 ' alt=''>
                </li>";
                    ?>

                    <li class="nav-item ">
                        <a class="nav-link text-light hov2" href="profile.php"> Pending Orders</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light hov2" href="profile.php?edit_account"> Edit Account</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light hov2" href="profile.php?my_orders"> My Orders </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light hov2" href="profile.php?delete_account"> Delete Account </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light hov2" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 text-center">
                <?php get_user_order_details();
                if (isset($_GET['edit_account'])) {
                    include('edit_account.php');
                }
                if (isset($_GET['my_orders'])) {
                    include('user_orders.php');
                }
                if (isset($_GET['delete_account'])) {
                    include('delete_account.php');
                }
                ?>

            </div>
        </div>



        <!-- last child  -->
        <!-- include footer -->
        <?php include("../includes/footer.php") ?>
    </div>

</body>

</html>