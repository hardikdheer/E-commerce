      <?php

      include('layouts/header.php');





      ?>
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
        
        
        <?php include('server/get_watches.php');?>

        <?php while($row=$watches->fetch_assoc()){?>

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

          

          

          
      </section>

      <!-- Shoes -->
      <section id="shoes" class="my-5">
        <div class="container text-center mt-5 py-5">
          <h3>Shoes</h3>
          <hr class="mx-auto">
          <p>Here you can check our amazing Shoes</p>
        </div>
        <div class="row mx-auto container-fluid">
        
        
        <?php include('server/get_shoes.php');?>

        <?php while($row=$shoes->fetch_assoc()){?>

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

         

          

         
      </section>


      <?php include('layouts/footer.php'); ?>

      