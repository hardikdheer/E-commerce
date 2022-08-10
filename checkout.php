<?php


session_start();

if( !empty($_SESSION['cart'])  && isset($_POST['checkout'])){

  //let user in
}

else{

  //send user to home page
  header('location: index.php');
}







?>






<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout</title>
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
              <a href="cart.php"><i class="fas fa-shopping-bag"></i></a>
              <i class="fas fa-user"></i>
            </li>

           


            
            
          </ul>
          
        </div>
      </div>
    </nav>



      <!-- Checkout -->
      <!-- Register -->
      <section class="my-5 py-5">

        <div class="container text-center mt-3 pt-5">
          <h2 class="form-weight-bold">Check Out</h2>
          <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
          <form id="checkout-form" method="POST" action="server/place_order.php">
            <div class="form-group checkout-small-element">
                <label>Name</label>
                <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Name" required/>
              </div>
            <div class="form-group checkout-small-element">
              <label>Email</label>
              <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Email" required/>
            </div>
            <div class="form-group checkout-small-element">
              <label>Phone</label>
              <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="Phone" required/>
            </div>
            <div class="form-group checkout-small-element">
                <label>City</label>
                <input type="text" class="form-control" id="checkout-city" name="city" placeholder="City" required/>
              </div>
              <div class="form-group checkout-large-element">
                <label>Address</label>
                <input type="text" class="form-control" id="checkout-address" name="address" placeholder="Address" required/>
              </div>
            <div class="form-group checkout-btn-container">
              <p>Total amount: ₹ <?php echo $_SESSION['total'];?></p>
              <input type="submit" class="btn" id="checkout-btn" name="place_order" value="Place Order"/>
            </div>
           
          </form>
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