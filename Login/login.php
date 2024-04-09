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
              <a class="nav-link" href="register.php">SIGN IN</a>
            </li>

          </ul>
        </div>
      </nav>
    </div>
  </header>


 <?php
     
         /* session_start();
          include('connexion.php');
          if(isset($_SESSION["permission"]))
            { $_SESSION["status"]="you are aleardy logged in";
              
              header("location:index.php");
                exit(0);


            }

          if(isset($_POST["submitButton"]))
          {  if(!empty(trim($_SESSION["email"])) && !empty(trim($_SESSION["password"])))
             {   $email = mysqli_real_escape_string($connexion, $_SESSION["email"]);
                $password =  mysqli_real_escape_string($connexion, $_SESSION["password"]); 
                $login_query="SELECT * FROM client WHERE email='$email' AND cpassword='$password' LIMIT 1" ;
                $login_query_run = mysqli_query($connexion, $login_query);
                
                if(mysqli_num_rows($login_query_run) == 1)
                {   
                    $row = mysqli_fetch_array($login_query_run);
                    $_SESSION["permission"]=TRUE;
                    $_SESSION["auth_user"]=[
                      'username'=> $row['firstname'] + $row['lastname'],
                      'email'=> $row['email'],
                    ];
                    $_SESSION['status']="you're logged in successfully.";
                    header("Location: AdminDashboard/acceuiladmin.php");
                    exit(0);

                }
                else 
                {        
                  $_SESSION['status']="Invalid Email or Password.";
                  header("Location: login.php");
                  exit(0); 
                 

                 }}
                
            else{

               $_SESSION['status']="Fill the form to register.";
               header("Location: register.php");
              exit(0);
            }}*/
      session_start();
      $email = $_SESSION["email"] ?? '';
      $password = $_SESSION["pass"] ?? ''; 
      $message = "";
      if(isset($_POST["submit"])){
            $pdo = new PDO("mysql:host=localhost;dbname=bookini", 'root', '');
            $res=$pdo->prepare("SELECT * FROM client WHERE email=? LIMIT 1");
            $res->setFetchMode(PDO::FETCH_ASSOC);
            $res->execute(array($email,md5($password)));
            $tab=$res->fetchAll();
            if(count($tab)>0)
                    $message="<li>Wrong email or password</li>";
            else{
              $_SESSION["permission"]="yes";
              $_SESSION["username"]=strtoupper($tab[0]["lastname"]." ".$tab[0]["firstname"]);
              header("location:session.php");
            }}
            ?>


 
 
            <main>
            <div>
              <section>
                <div class="signin">
                  <div class="content">
                    <h2>Sign Up</h2>
                    <form class="form" method="post" action="register.php" enctype="multipart/form-data">
                      <div class="inputBox">
                        <input type="email" name="email" required><i>Email</i>
                      </div>
                      <div class="inputBox">
                        <input type="password" name="pass" required><i>Password</i>
                      </div>
                      <div class="links">
                        <a href="#">Forgot password?</a>
                        <a href="../Register/register.php">Sign in</a>
                      </div>
                      <div class="inputBox">
                        <input type="submit" name="submit"  value="Login">
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