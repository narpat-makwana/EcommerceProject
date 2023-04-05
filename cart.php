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
    <title>Ecommerce-Electronic Site-Cart Details</title>

    <!-- Bootstrape CSS Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <!-- FontAwesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />

    <!-- css file -->
    <link rel="stylesheet" href="style.css">
    <style>
        .cart_image {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>

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
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">Cart <i class="fa-solid fa-cart-shopping"></i>
                                <sup>
                                    <?php cart_item(); ?>
                                </sup></a>
                        </li>

                    </ul>

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

    <!-- third child -->
    <div class="navbar-expand-lg style=" background-color: #e3f2fd;">
        <h3 class="text-center">Electronic Store</h3>
        <p class="text-center">Electronic Market is Here..</p>
    </div>

    <!-- fourth child -> Cart table -->
    <div class="container">
        <div class="row">
            <form action="" method="post">
                <table class="table table-bordered text-center">


                    <!-- php code to display dynamic data -->
                    <?php

                    $get_ip_add = getIPAddress();
                    $total_price = 0;

                    $cart_query = "Select * from `cart_details` where ip_address = '$get_ip_add'";
                    $result = mysqli_query($con, $cart_query);

                    $result_count = mysqli_num_rows($result);
                    if ($result_count > 0) {

                        echo "<thead>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan='2'>Operations</th>
                        </thead> <tbody>";

                        while ($row = mysqli_fetch_array($result)) {
                            $product_id = $row['product_id'];
                            $select_products = "Select * from `products` where product_id = '$product_id'";
                            $result_products = mysqli_query($con, $select_products);

                            while ($row_product_price = mysqli_fetch_array($result_products)) {
                                $product_price = array($row_product_price['product_price']);
                                $price_table = $row_product_price['product_price'];
                                $product_title = $row_product_price['product_title'];
                                $product_image1 = $row_product_price['product_image1'];
                                $product_values = array_sum($product_price);
                                $total_price += $product_values;

                    ?>

                                <tr>
                                    <td>
                                        <?php echo $product_title ?>
                                    </td>
                                    <td><img src="./admin_page/product_images/<?php echo $product_image1 ?>" class="cart_image"></td>
                                    <td><input type="text" class="form-input w-50" name="qty">
                                    </td>

                                    <?php
                                    $get_ip_add = getIPAddress();
                                    if (isset($_POST['update_cart'])) {
                                        $quantities = $_POST['qty'];
                                        $update_cart = "update `cart_details` set quantity = $quantities where ip_address = '$get_ip_add'";
                                        $result_products_quantity = mysqli_query($con, $update_cart);
                                        $total_price = $total_price * $quantities;
                                    }
                                    ?>

                                    <td>₹ <?php echo $price_table ?>/-</td>
                                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id; ?>"></td>
                                    <td>
                                        <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                                        <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                                    </td>
                                </tr>
                    <?php
                            }
                        }
                    } else {
                        echo "<h2 class='text-center text-danger' > Cart is Empty!! </h2>";
                    }
                    ?>
                    </tbody>
                </table>

                <!-- subtotal -->
                <div class="d-flex mb-5">

                    <?php
                    $get_ip_add = getIPAddress();
                    $cart_query = "Select * from `cart_details` where ip_address = '$get_ip_add'";
                    $result = mysqli_query($con, $cart_query);

                    $result_count = mysqli_num_rows($result);
                    if ($result_count > 0) {
                        echo "<h4 class='px-3'>Subtotal: <strong class='text-info'>₹ $total_price /- </strong></h4>
                            <a href='index.php'><button class='bg-info px-3 py-2 border-0 mx-3' name='continue_shop'>Continue Shopping</button></a>
                            <button class='bg-secondary p-3 py-2 border-0 '><a href='checkout.php' class='text-light text-decoration-none'>Checkout</button>";
                    } else 
                    {
                        echo "<a href='index.php'><button class='bg-info px-3 py-2 border-0 mx-3' name='continue_shop'>Continue Shopping</button></a>";
                    }

                    if(isset($_POST['continue_shop'])){
                        echo "<script> window.open('index.php','_self') </script>";
                    }

                    ?>

                </div>
            </form>
        </div>
    </div>

    <!-- function to remove item from cart -->
    <?php
    function remove_cart_item()
    {
        global $con;
        if (isset($_POST['remove_cart'])) {
            foreach ($_POST['removeitem'] as $remove_id) {
                echo $remove_id;
                $delete_query = "delete from `cart_details` where product_id = $remove_id";
                $run_query = mysqli_query($con, $delete_query);

                if ($run_query) {
                    echo "<script> window.open('cart.php','_self') </script>";
                }
            }
        }
    }

    echo $remove_item = remove_cart_item();

    ?>

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