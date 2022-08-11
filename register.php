<?php


session_start();
include('server/connection.php');
if(isset($_POST['register'])){

  $name=$_POST['name'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $confirmPassword=$_POST['confirmPassword'];

  // if passwords dont match
  if($password !== $confirmPassword){
    header('location: register.php?error=Passwords do not match');
  }
  //if password is less than 6 characters
  else if(strlen($password)<6){
    header('location: register.php?error=Password must be atleast 6 characters');
  }
  //if there is no error
  else{

    //check whether there is a user with this email or not
    $stmt1=$conn->prepare("SELECT count(*) FROM users where user_email=?");
    $stmt1->bind_param('s',$email);
    $stmt1->execute();
    $stmt1->bind_result($num_rows);
    $stmt1->store_result();
    $stmt1->fetch();

    //if there is a user already registered with this email
    if($num_rows!=0){
      header('location: register.php?error=User with this email already exists');
    }

    //if no user registered with this email before
    else{









  //create a new user
  $stmt=$conn->prepare("INSERT INTO users (user_name,user_email,user_password)
  VALUES (?,?,?)");

  $stmt->bind_param('sss',$name,$email,md5($password));

    //if account registered succesfully
   if($stmt->execute()){
    $_SESSION['user_email']=$email;
    $_SESSION['user_name']=$name;
    $_SESSION['logged_in']= true;
    header('location: account.php?register=You are registered succesfully');
   }

   //account could not be created
   else{
      header('location: register.php?error=Could not create an account at this moment');
   }
    


    }
  

}








}
// if user has already registered, then take user to account page
else if(isset($_SESSION['logged_in'])){

  header('location: account.php');
  exit;
}







?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
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



      <!-- Register -->
      <section class="my-5 py-5">

        <div class="container text-center mt-3 pt-5">
          <h2 class="form-weight-bold">Register</h2>
          <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
          <form id="register-form" method="POST" action="register.php">
            <p style="color: red ;"><?php if(isset($_GET['error'])){ echo $_GET['error'];}?></p>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" id="register-name" name="name" placeholder="Name" required/>
              </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required/>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required/>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" id="register-password" name="confirmPassword" placeholder="Confirm Password" required/>
              </div>
            <div class="form-group">
              
              <input type="submit" class="btn" id="register-btn" name="register" value="Register"/>
            </div>
            <div class="form-group">
              
             <a id="login-url" href="login.php" class="btn">Do you have an Account? Login</a>
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