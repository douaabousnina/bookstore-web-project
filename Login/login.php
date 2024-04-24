<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
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
          <i class="fas fa-book-reader fa-2x mx-3"></i>Bookini</a>
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
            <?php

              if (@$_SESSION["logged_in"] === 'yes') {
                echo '
                <li class="nav-item">
                  <a class="nav-link" href="logout.php">LOG OUT</a>
                </li>
                ';
              } else {
                echo '
                <li class="nav-item">
                  <a class="nav-link" href="register.php">SIGN IN</a>
                </li>
                ';
              }
            
            ?>

          </ul>
        </div>
      </nav>
    </div>
  </header>


  <?php

  $email = $_POST["email"] ?? '';
  $password = $_POST["pass"] ?? '';
  $message = "";

  if (isset($_POST["submit"])) {
    try {
      $pdo = new PDO("mysql:host=localhost;dbname=bookini", 'root', '');

      $sql = "SELECT * FROM client WHERE email=? LIMIT 1";
      $stmt = $pdo->prepare($sql);
      // $stmt->bindParam(1, $email, PDO::PARAM_STR);
      $stmt->execute(array($email));
      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      if (!$user) {
        $message = "<li>Wrong email or password</li>";
      } else {
        if (password_verify($password, $user['cpassword'])) {
          
          if($user['isAdmin']===1) {
            $_SESSION['adminAuth'] = 'yes';
            header('location: ../AdminDashboard/acceuiladmin.php');
            exit();
          }

          $_SESSION["logged_in"] = "yes";
          $_SESSION['id'] = $user[''];
          $_SESSION["username"] = ucfirst($user["lastname"]) . " " . ucfirst($user["firstname"]);
          header("location: session.php");


        } 
        else {
          $message = "<li>Wrong email or password</li>";
        }
      }
    } catch (PDOException $e) {
      $message = "Error: " . $e->getMessage();
    }
  }
  ?>




  <main>
    <div>
      <section>
        <div class="signin">
          <div class="content">
            <h2>Sign Up</h2>
            <form class="form" method="post" action="" enctype="multipart/form-data">
              <div class="inputBox">
                <input type="email" name="email" required><i>Email</i>
              </div>
              <div class="inputBox">
                <input type="password" name="pass" required><i>Password</i>
              </div>
              <div class="links">
                <a href="#">Forgot password?</a>
                <a href="register.php">Sign in</a>
              </div>
              <div style=" padding: 2px; margin: 2px; border: 1px; font-family: Arial, sans-serif; font-size: 15px; color: red; text-align: center;">
                <?php echo $message; ?>
              </div>
              <div class="inputBox">
                <input type="submit" name="submit" value="Login">
              </div>
            </form>
          </div>
        </div>
      </section>
    </div>
  </main>




  <footer>
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="main.js"></script>
</body>

</html>