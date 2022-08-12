<?php

include('server/connection.php');




//use the search section
if(isset($_POST['search'])){

  $category = $_POST['category'];
  $price = $_POST['price'];

$stmt=$conn->prepare("SELECT * FROM products WHERE  product_category=? AND product_price<=?");

$stmt->bind_param("si",$category,$price);

$stmt->execute();

$products=$stmt->get_result();//array

}
//return all products
else{


$stmt=$conn->prepare("SELECT * FROM products");

$stmt->execute();

$products=$stmt->get_result();//array

}



?>


  <?php include('layouts/header.php');  ?>










    <!-- Search -->
    
  <section id="search" class="my-5 py-5 ms-2">
    <div class="container mt-5 py-5">
      <p>Search Products</p>
      <hr>
    </div>

        <form action="shop.php" method="POST">
         <div class="row mx-auto container">
           <div class="col-lg-12 col-md-12 col-sm-12">
            

            <p>Category</p>
               <div class="form-check">
                <input class="form-check-input" value="shoes" type="radio" name="category" id="category_one" <?php if(isset($category) && $category=='shoes'){echo 'checked';}?> >
                <label class="form-check-label" for="flexRadioDefault1">
                  Shoes
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" value="coats" type="radio" name="category" id="category_two" <?php if(isset($category) && $category=='coats'){echo 'checked';}?>>
                <label class="form-check-label" for="flexRadioDefault2">
                  Coats
                </label>
              </div>

               <div class="form-check">
                <input class="form-check-input" value="watches" type="radio" name="category" id="category_two" <?php if(isset($category) && $category=='watches'){echo 'checked';}?>>
                <label class="form-check-label" for="flexRadioDefault2">
                  Watches
                </label>
              </div>

               <div class="form-check">
                <input class="form-check-input" value="bags" type="radio" name="category" id="category_two" <?php if(isset($category) && $category=='bags'){echo 'checked';}?>>
                <label class="form-check-label" for="flexRadioDefault2">
                  Bags
                </label>
              </div>

           </div>
         </div>


         <div class="row mx-auto container mt-5">
           <div class="col-lg-12 col-md-12 col-sm-12">

               <p>Price</p>
               <input type="range" class="form-range w-50" name="price" value="<?php if(isset($price)){echo $price;}else{ echo "100";} ?>" min="1" max="1000" id="customRange2">
               <div class="w-50">
                 <span style="float: left;">1</span>
                 <span style="float:right;">1000</span>
               </div>
            </div>
          </div>    


          <div class="form-group my-3 mx-3">
            <input type="submit" name="search" value="Search" class="btn btn-primary">
          </div> 

        <form>

  </section>
  
  

       <!-- Shop -->
       <section id="shop" class="my-5 py-5">
        <div class="container mt-5 py-5">
          <h3>Our Products</h3>
          <hr>
          <p>Here you can check our products</p>
        </div>
        <div class="row mx-auto container">


          <?php while($row=$products->fetch_array()){ ?>
          <div onclick="window.location.href='single_product.html';" class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/images/<?php echo $row['product_image']; ?>"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>

            </div>

            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price">₹<?php echo $row['product_price']; ?></h4>
            <a class="btn shop-buy-btn" href="<?php echo "single_product.php?product_id=". $row['product_id']; ?>">Buy Now</a>
          </div>

          

          
          
         <?php } ?>

          

          
          

          
          

          
          


          <nav aria-label="Page navigation example">
            <ul class="pagination mt-5">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
            </ul>
          </nav>
        </div>
      </section>









      <?php include('layouts/footer.php');  ?>