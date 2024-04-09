<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookini</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/styles/loginRegisterStyle.css">
  <link rel="stylesheet" href="../assets/styles/mobile-style.css">
  <link rel="stylesheet" href="../assets/styles/Style.css">
</head>
<body>
<header>
        <div class="container-fluid p-0">
          <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="../Index.php">
              <i class="fas fa-book-reader fa-2x mx-3"></i>Books</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fas fa-align-right text-light"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <div class="mr-auto"></div>
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="../Index.php">HOME
                    <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../Books/Index.php">BOOKS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../Cart/index.php">CART</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../faq.php">FAQ</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="register.php">SIGN IN</a>
                </li>

              </ul>
            </div>
          </nav>
        </div>
      </header>


<?php
      session_start();
      include('connexion.php');
      if(!isset($_SESSION["permission"]))
      { $_SESSION["status"]="Please login to access user dashboard";
        
        header("location:login.php");
          exit(0);


      }

?>


<h1>hello <?=$_SESSION['auth_user']['username']; ?></h1>




footer>
        <div class="container-fluid p-0">
          <div class="row text-left">
            <div class="col-md-5 col-sm-5">
              <h4 class="text-light">About us</h4>
              <p class="text-muted">We are 5 enthusiastic students who would like to revolutionize the defintion of technology</p>
              <p class="pt-4 text-muted">Copyright ©2024 All rights reserved | This website is made by 
                <span> Iheb Gafsi Douaa Bousnina Rayene Knani Farah Ayeb Omar Sagga</span>
              </p>
            </div>
            <div class="col-md-5 col-sm-12">
              <h4 class="text-light">Newsletter</h4>
              <p class="text-muted">Stay Updated</p>
              <form class="form-inline">
                <div class="col pl-0">
                  <div class="input-group pr-5">
                    <input type="text" class="form-control bg-dark text-white" id="inlineFormInputGroupUsername2" placeholder="Email">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-arrow-right"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-2 col-sm-12">
              <h4 class="text-light">Follow Us</h4>
              <p class="text-muted">Let us be social</p>
              <div class="column text-light">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-youtube"></i>
              </div>
            </div>
          </div>
        </div>
      </footer>
 

</body>
</html>