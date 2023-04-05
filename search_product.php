<!-- connect file -->
<?php
include('./includes/connect.php'); 
include('./functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerce-Electronic Site</title>

  <!-- Bootstrape CSS Link -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

  <!-- FontAwesome Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />

  <!-- css file -->
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <!-- navBar -->

  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-info">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="fa-solid fa-bag-shopping"></i> E-Mart</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Cart <i class="fa-solid fa-cart-shopping"></i>
              <sup><?php cart_item(); ?> </sup>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Total Price: ₹<?php total_cart_price() ; ?>/- </a>
            </li>


          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
            <input type="submit" class="btn btn-outline-success" value="Search" name="search_data_product">

          </form>
        </div>
      </div>
    </nav>
  </div>

  <!-- second child -->
  <nav class="navbar navbar-expand-lg bg-light">
    <ul class="navbar-nav me-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Welcome Guest</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Login</a>
      </li>

    </ul>
  </nav>

  <?php
     // calling add to cart()
         cart();
  ?>


  <!-- third child -->
  <div class="navbar-expand-lg style=" background-color: #e3f2fd;">
    <h3 class="text-center">Electronic Store</h3>
    <p class="text-center">Electronic Market is Here..</p>
  </div>


  <!-- fourth child -->

  <div class="row">
    <div class="col-md-10">
      <!-- Products -->
      <div class="row">

        <!-- fetching products -->
        <?php

        // searching data
        search_product();
        // get_unique_categories();
        get_unique_categories();
        // get_unique_categories();
        get_unique_brands();


        ?>

        <!-- row end -->
      </div>
      <!-- column end -->
    </div>

    <div class="col-md-2 bg-secondary p-0">
      <!-- Side bar -->
      <!-- brands to be display -->
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a href="" class="nav-link text-light bg-info text-center">
            <h4>Delivery Brands</h4>
          </a>
        </li>

        <?php
        // displaying brands
        get_brands();
        ?>

      </ul>

      <!-- categories to be display -->

      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a href="" class="nav-link text-light bg-info text-center">
            <h4>Categories</h4>
          </a>
        </li>

        <?php
        // displaying categories
        get_categories();
        ?>

      </ul>
    </div>
  </div>


  <!-- Footer -->
  <div class="p-3 text-center bg-light">
    <p>
      <center>All rights reserved © 2020 Created by Narpat-Rohan-Vishal. </center>
    </p>
  </div>

  <!-- Bootstrape JS Link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>