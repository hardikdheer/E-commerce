<?php


session_start();

if(isset($_POST['add_to_cart'])){

  //if user has already added to cart
  if(isset($_SESSION['cart'])){

    $products_array_ids= array_column($_SESSION['cart'],"product_id");//this will all arrays product_ids.
    //if product has already been added to cart or not
    if(!in_array($_POST['product_id'], $products_array_ids)){

      $product_id=$_POST['product_id'];


    $product_array=array(
      'product_id' => $_POST['product_id'],
      'product_name' => $_POST['product_name'],
      'product_price' => $_POST['product_price'],
      'product_image' => $_POST['product_image'],
      'product_quantity' => $_POST['product_quantity']

    );  

    $_SESSION['cart'][$product_id] = $product_array;

    }
    
    //product has already been added
    else{
      echo '<script>alert("Product was already added to cart")</script';
      
    }

  }
  //if this is the first product
  else{

    $product_id=$_POST['product_id'];
    $product_name=$_POST['product_name'];
    $product_price=$_POST['product_price'];
    $product_image=$_POST['product_image'];
    $product_quantity=$_POST['product_quantity'];


    $product_array=array(
      'product_id' => $product_id,
      'product_name' => $product_name,
      'product_price' => $product_price,
      'product_image' => $product_image,
      'product_quantity' => $product_quantity

    );  

    $_SESSION['cart'][$product_id] = $product_array;
    //Each id denotes different array
    //2=>[],3=>[]....
  }
  //calculate total
  calculateTotalCart();

}
//remove produtx from carts
else if(isset($_POST['remove_product'])){

  $product_id = $_POST['product_id'];
  unset($_SESSION['cart'][$product_id]);

  //calculate total
  calculateTotalCart();
}

else if(isset($_POST['edit_quantity'])){
  
  //we get id and quantity from form 
  $product_id=$_POST['product_id'];
  $product_quantity=$_POST['product_quantity'];
  // get the product array from the session
  $product_array=$_SESSION['cart'][$product_id];
  //update product quantity
  $product_array['product_quantity']=$product_quantity;
  //return array back its place
  $_SESSION['cart'][$product_id]=$product_array;

  //calculate total
  calculateTotalCart();

}

else{
  header('location: index.php');
}


function calculateTotalCart(){
  $total=0;

  foreach($_SESSION['cart'] as $key => $value){
    $product = $_SESSION['cart'][$key];

    $price = $product['product_price'];
    $quantity = $product['product_quantity'];
    $total=  $total+ ($price * $quantity);
  }

  $_SESSION['total']=$total;
}


?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="assets/css/style.css"/>
</head>
  <body>


     <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
      <div class="container">
        <img class="logo" src="assets/images/logo.jpeg"/>
        <h2 class="brand">VariaT</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="shop.html">Shop</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Blog</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Contact Us</a>
            </li>

            <li class="nav-item">
              <i class="fas fa-shopping-bag"></i>
              <i class="fas fa-user"></i>
            </li>

           


            
            
          </ul>
          
        </div>
      </div>
    </nav>





      <!-- Cart -->
      <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bold">Your Cart</h2>
            <hr>
        </div>


        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>

            <?php foreach($_SESSION['cart'] as $key => $value){?>

            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/images/<?php echo $value['product_image'];?>"/>
                    
                    <div>
                        <p><?php echo $value['product_name'];?></p>
                        <small><span>₹</span><?php echo $value['product_price'];?></small>
                        <br>
                        <form method="POST" action="cart.php">
                          <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>"/>
                          <input type="submit" name="remove_product"class="remove-btn" value="Remove"/>
                        </form>
                        </div> 
                    </div>
                </td>

                <td>
                    
                    <form method="POST" action="cart.php">
                      <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>"/>
                      <input type="number" name="product_quantity" value="<?php echo $value['product_quantity'];?>"/> 
                    <input type="submit" class="edit-btn" value="Edit" name="edit_quantity"/>
                    </form>
                </td>

                <td>
                    <span>₹</span>
                    <span class="product-price"><?php echo $value['product_quantity'] * $value['product_price'];?></span>
                </td>
            </tr>

            <?php
            }
            ?>

           

            
        </table>
        
        
        <div class="cart-total">
            <table>
                <!-- <tr>
                    <td>Subtotal</td>
                    <td>₹155</td>
                </tr> -->
                <tr><td>
                    Total
                </td>
            <td>₹ <?php echo $_SESSION['total']; ?></td></tr>
            </table>
        </div>


        <div class="checkout-container">
            <button class="btn checkout-btn">Checkout</button>
        </div>

       
      </section>







       <!-- Footer -->
       <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
          <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <img class="logo" src="assets/images/logo.jpeg"/>
            <p class="pt-3">We provide the best products at most affordable prices.</p>
          </div>

          <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Featured</h5>
            <ul class="text-uppercase">
              <li><a href="#">Men</a></li>
              <li><a href="#">Women</a></li>
              <li><a href="#">Boys</a></li>
              <li><a href="#">Girls</a></li>
              <li><a href="#">New Arrivals</a></li>
              <li><a href="#">Clothes</a></li>
            </ul>
          </div>

          <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Contact Us</h5>
            <div>
              <h6 class="text-uppercase">Address</h6>
              <p>5-Street No., New Delhi</p>
            </div>
          
          <div>
            <h6 class="text-uppercase">Phone</h6>
            <p>997-778-8855</p>
          </div>

          <div>
            <h6 class="text-uppercase">Email</h6>
            <p>info@gmail.com</p>
          </div>

        </div>

        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
          <h5 class="pb-2">Instagram</h5>
          <div class="row">
            <img src="assets/images/featured1.jpeg" class="img-fluid w-25 h-100 m-2"/>
            <img src="assets/images/featured2.jpeg" class="img-fluid w-25 h-100 m-2"/>
            <img src="assets/images/featured3.jpeg" class="img-fluid w-25 h-100 m-2"/>
            <img src="assets/images/featured4.jpeg" class="img-fluid w-25 h-100 m-2"/>
            <img src="assets/images/clothes1.jpeg" class="img-fluid w-25 h-100 m-2"/>
          </div>
        </div>


        </div>

        <div class="copyright mt-5">
          <div class="row container mx-auto">
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
              <img src="assets/images/payment.jpeg"/>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
              <p>Hardik Dheer @2022 All Rights Reserved</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4 text-nowrap mb-2">
              <a href="#"><i class="fab fa-facebook"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              
            </div>
          </div>
        </div>

      </footer>













    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
 

</body>
</html>