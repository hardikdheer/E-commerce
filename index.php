<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
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
                <a class="nav-link" href="index.html">Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="shop.html">Shop</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="">Blog</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>

              <li class="nav-item">
                <a href="cart.html"><i class="fas fa-shopping-bag"></i></a>
                <a href="account.html"><i class="fas fa-user"></i></a>
              </li>

             


              
              
            </ul>
            
          </div>
        </div>
      </nav>

      <!-- Home -->
      <section id="home">
        <div class="container">
          <h5>NEW ARRIVALS</h5>
          <h1><span>Best Prices</span> This Season</h1>
          <p>EShop offers the best products for the best prices.</p>
          <button>Shop Now</button>
        </div>

      </section>

      <!-- Brand -->
      <section id="brand" class="container">
        <div class="row m-0">
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/brand1.jpeg"/>
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/brand2.jpeg"/>
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/brand3.jpeg"/>
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/brand4.jpeg"/>
        </div>
      </section>

      <!-- New -->
      <section id="new" class="w-100">
        <div class="row p-0 m-0">
          <!-- one -->
         <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
          <img class="img-fluid " src="assets/images/1.jpeg"/>
          <div class="details">
            <h2>Extremely Awesome Shoes</h2>
            <button class="text-uppercase">Shop Now</button>
          </div>
        </div>
          <!-- two -->
         <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
          <img class="img-fluid" src="assets/images/2.jpeg"/>
          <div class="details">
            <h2>Awesome Bags</h2>
            <button class="text-uppercase">Shop Now</button>
          </div>
        </div>
          <!-- three -->
         <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
          <img class="img-fluid" src="assets/images/3.jpeg"/>
          <div class="details">
            <h2>50% OFF Watches</h2>
            <button class="text-uppercase">Shop Now</button>
          </div>
        </div>

        


        </div>
      </section>

      <!-- Featured -->
      <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
          <h3>Our Featured</h3>
          <hr class="mx-auto">
          <p>Here you can check our featured products</p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php include('server/get_featured_products.php');?>



        <?php while($row=$featured_products->fetch_assoc()){?>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/images/<?php echo $row['product_image']; ?>"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>

            </div>

            <h5 class="p-name"><?php echo $row['product_name'];?></h5>
            <h4 class="p-price">₹<?php echo $row['product_price'];?></h4>
            <a href="<?php echo "single_product.php?product_id=". $row['product_id'];?>"><button class="buy-btn">Buy Now</button></a>
          </div>

          
          

          <?php } ?>
        </div>
      </section>

      <!-- Banner -->
      
      <section id="banner" class="my-5 py-5">
        <div class="container">
          <h4>MID SEASON SALE</h4>
          <h1>Autumn Collection <br> UP TO 30% OFF</h1>
          <button class="text-uppercase">Shop Now</button>
        </div>

      </section>


      <!-- Clothes -->
      <section id="featured" class="my-5">
        <div class="container text-center mt-5 py-5">
          <h3>Dresses and Coats</h3>
          <hr class="mx-auto">
          <p>Here you can check our amazing formals</p>
        </div>
        <div class="row mx-auto container-fluid">

          <?php include('server/get_coats.php');?>
          <?php while($row=$coats_products->fetch_assoc()){?>

          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/images/<?php echo $row['product_image'];?>"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>

            </div>

            <h5 class="p-name"><?php echo $row['product_name'];?></h5>
            <h4 class="p-price">₹<?php echo $row['product_price'];?></h4>
            <a href="<?php echo "single_product.php?product_id=". $row['product_id'];?>"><button class="buy-btn">Buy Now</button></a>
          
            
          </div>

         

          

         <?php } ?>
        </div>
      </section>

      <!-- Watches -->
      <section id="watches" class="my-5">
        <div class="container text-center mt-5 py-5">
          <h3>Best Watches</h3>
          <hr class="mx-auto">
          <p>Here you can check our unique watches</p>
        </div>
        <div class="row mx-auto container-fluid">
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/images/watch1.jpeg"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>

            </div>

            <h5 class="p-name">Titan</h5>
            <h4 class="p-price">₹199.99</h4>
            <button class="buy-btn">Buy Now</button>
          </div>

          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/images/watch2.jpeg"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>

            </div>

            <h5 class="p-name">Daniel Wellington</h5>
            <h4 class="p-price">₹512.00</h4>
            <button class="buy-btn">Buy Now</button>
          </div>

          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/images/watch1.jpeg"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>

            </div>

            <h5 class="p-name">Apple</h5>
            <h4 class="p-price">₹600.00</h4>
            <button class="buy-btn">Buy Now</button>
          </div>

          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/images/watch4.jpeg"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>

            </div>

            <h5 class="p-name">Samsung</h5>
            <h4 class="p-price">₹999.00</h4>
            <button class="buy-btn">Buy Now</button>
          </div>
        </div>
      </section>

      <!-- Shoes -->
      <section id="shoes" class="my-5">
        <div class="container text-center mt-5 py-5">
          <h3>Shoes</h3>
          <hr class="mx-auto">
          <p>Here you can check our amazing Shoes</p>
        </div>
        <div class="row mx-auto container-fluid">
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/images/shoes1.jpeg"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>

            </div>

            <h5 class="p-name">Nike</h5>
            <h4 class="p-price">₹199.99</h4>
            <button class="buy-btn">Buy Now</button>
          </div>

          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/images/shoes2.jpeg"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>

            </div>

            <h5 class="p-name">Red Tape</h5>
            <h4 class="p-price">₹512.00</h4>
            <button class="buy-btn">Buy Now</button>
          </div>

          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/images/shoes3.jpeg"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>

            </div>

            <h5 class="p-name">Puma</h5>
            <h4 class="p-price">₹600.00</h4>
            <button class="buy-btn">Buy Now</button>
          </div>

          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/images/shoes4.jpeg"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>

            </div>

            <h5 class="p-name">Adidas</h5>
            <h4 class="p-price">₹999.00</h4>
            <button class="buy-btn">Buy Now</button>
          </div>
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