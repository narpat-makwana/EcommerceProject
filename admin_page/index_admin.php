<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

   <!-- Bootstrape CSS Link -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <!-- FontAwesome Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>

  <style>
    .admin_image{
    width: 100px;
    object-fit: contain;
  }
  </style>

</head>
<body>
    <div class="container-fluid p-0">
      <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fa-solid fa-bag-shopping"></i> E-Mart</a>
              <nav class="navbar navbar-expand-lg>
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a href="" class="nav-link">Welcome Guest</a>
                  </li>
                </ul>
              </nav>
            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
          <h3 class="text-center p-2">Manage Details </h3>
        </div>

        <!-- third child -->
        <div class="row">
          <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="p-3">
              <a href="#"><img src="../images/admin.png" alt="img1" class="admin_image"> </a>
              <p class="text-light text-center">Admin Name</p>
            </div>

            <div class="button text-center">
              <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Product</a></button>
              <button><a href="" class="nav-link text-light bg-info my-1">View Products</a></button>
              <button><a href="index_admin.php?insert_categories" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
              <button><a href="" class="nav-link text-light bg-info my-1">View Categories</a></button>
              <button><a href="index_admin.php?insert_brands" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
              <button><a href="" class="nav-link text-light bg-info my-1">View Brands</a></button>
              <button><a href="" class="nav-link text-light bg-info my-1">All Orders</a></button>
              <button><a href="" class="nav-link text-light bg-info my-1">All Payments</a></button>
              <button><a href="" class="nav-link text-light bg-info my-1">List Users</a></button>
              <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
            </div>

          </div>
        </div>

        <!-- fourth child -->
        <div class="container my-5">
          <?php 
            if(isset($_GET['insert_categories'])){
              include('insert_categories.php');
            }
            if(isset($_GET['insert_brands'])){
              include('insert_brands.php');
            }
          ?>
        </div>

        
        </div>

      </div>

  <!-- Bootstrape JS Link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Footer -->
  <div class="p-3 text-center bg-light">
    <p>
      <center>All rights reserved © 2020 Created by Narpat-Rohan-Vishal. </center>
    </p>
  </div>

</body>
</html>