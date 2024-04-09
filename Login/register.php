<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Books</title>

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
              <a class="nav-link" href="#">SIGN IN</a>
            </li>

          </ul>
        </div>
      </nav>
    </div>
  </header>


  <?php

  session_start();
  include('connexion.php');

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require 'vendor/autoload.php';
  function sendemail_verify( $firstName, $lastName, $email)
  {
  $mail = new PHPMailer(true);
  $mail->isSMTP();
  $mail->SMTPAuth   = true;
  $mail->Host       = 'bookini.gmail.com';
  $mail->Username   = 'insatBookini@gmail.com';
  $mail->Password   = 'secret123.';

  $mail->SMTPSecure = "tls";
  $mail->Port       = 587;


  $mail->setFrom('insatBookini@gmail.com', $firstName+$lastName);
  $mail->addAddress($email);
  $email_template=' <table style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 10px;">
  <tr>
  <td>
  <h2 style="text-align: center; color: #333;">Welcome to Bookini!</h2>
  </td>
  </tr>
  <tr>
  <td>
  <p style="color: #333;">Hello .$firstName. ,</p>
  <p style="color: #333;">Thank you for registering with us. </p>
  <div style="text-align: center; margin-top: 20px;">
  <a href="" style="display: inline-block; background-color: #007bff; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 5px;">Click here</a>
  </div>
  <p style="color: #333;">Thanks<br> The Bookini Team</p>
  </td>
  </tr>
  </table>
  ';


  $mail->isHTML(true);
  $mail->Subject = 'Email verification from Bookini';
  $mail->Body    = $email_template;
  $mail->send();
  echo 'Message has been sent to your Email.';}


  if (isset($_POST["submit_btn"])) {
    $firstName = $_SESSION["firstname"] ?? '';
    $lastName = $_SESSION["lastname"] ?? '';
    $email = $_SESSION["email"] ?? '';
    $password = $_SESSION["password"] ?? '';
    $rePassword = $_POST["repass"] ?? '';

    $check_email_query = "SELECT cid FROM client WHERE email='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($connexion, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
      $_SESSION['status'] = "the Email has been used!";
      header("Location: register.php");
    } else {
      $query = "INSERT INTO client(firstname,lastname,email,cpassword) VALUES ('$firstName','$lastName ','$email','$password')";

      if ($query_run) {
        sendemail_verify("$firstName", "$lastName ", "$email");
        $_SESSION['status'] = "Registration succeeded.Please verify you Email.";
        header("Location: register.php");
      } else {

        $_SESSION['status'] = "Registration failed.Try again.";
        header("Location: register.php");
      }
    }
  }



  ?>

  <main>
    <div>
      <section>
        <div class="signin">
          <div class="content">
            <h2>Sign In</h2>
            <form class="form" method="post" action="" enctype="multipart/form-data">
              <div class="inputBox">
                <input type="text" name="firstname" required><i>first Name</i>
              </div>
              <div class="inputBox">
                <input type="text" name="lastname" required><i>last Name</i>
              </div>
              <div class="inputBox">
                <input type="email" name="email" required><i>Email</i>
              </div>
              <div class="inputBox">
                <input type="password" name="passowrd" required><i>Password</i>
              </div>
              <div class="inputBox">
                <input type="password" name="repass" required><i>Confirm password</i>
              </div>
              <div class="alert">
                <?php
                if (isset($_SESSION['status'])) {
                  echo $_SESSION['status'];
                  unset($_SESSION['status']);
                }


                ?>
              </div>

              <div class="links">
                <a>Already have an account?</a>
                <a href="login.php">Log in</a>
              </div>
              <div class="inputBox">
                <input type="submit" name="submit_btn" value="Sign in!">
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