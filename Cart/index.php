<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Cart</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">
  <link rel="stylesheet" href="./Style.css" />
  <link rel="stylesheet" href="./cart.css" />
  <link rel="stylesheet" href="./mobile-style.css">
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
              <a class="nav-link" href="../">HOME
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Books">BOOKS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">CART</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../faq.php">FAQ</a>
            </li>

            <li class="nav-item">
              <?php
                if(isset($_SESSION['id'])){
                  echo '<a class="nav-link" href="../Login/logout.php">LOGOUT</a>';
                }else{
                  echo '<a class="nav-link" href="../Login/login.php">SIGN IN</a>';
                }
              ?>
            </li>

          </ul>
        </div>
      </nav>
    </div>

    <div class="container text-center">
      <div class="row">
        <div class="col-md-7 col-sm-12  text-white">
          <h6>PURCHASE NOW</h6>
          <h1>SHOPPING CART</h1>
          <p>
            Pay For Your Books And Start Reading!
          </p>
          <p>
            Total Price : <s><span id="total-price">199.99</span> TND</s> &nbsp;&nbsp; 50% off
          </p>
          <button class="btn btn-light px-5 py-2 primary-btn" onclick="buy_now()">
            By now for <span id="total-reduced-price">199.99</span> TND
          </button>
        </div>
        <div class="col-md-5 col-sm-12  h-25">
          <ul class="books-in-cart">
            <?php
              include '../connect.php';
              $host = 'localhost';
              $dbname = 'bookini';
              $user = 'root';
              $pass = '';
              $port = '3306';
              // establish a connection
              $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
              // prepare a statement to be executed
              $stmt = $pdo->prepare('SELECT book.bid AS bid, book.btitle AS title, book.bdescription AS description, book.bauthor AS author, book.bprice AS price, book.bcoverid AS cover
              FROM book, command
              WHERE book.bid = command.bid AND command.cid = 1 AND command.state = "pending";');
              // execute the statement
              $stmt->execute();
              // fetch the results from database which will be in a dictionary format
              $books = array();
              while ($row = $stmt->fetch()) {
                $book = new Book($row['title'], $row['bid'], $row['price'], $row['author'], $row['description'], $row['cover']);
                array_push($books, $book);
              }
              // close the connection
              $pdo = null;
            ?>
            <?php
            // for every element of books array
            foreach ($books as $book) {?>
            <li class="cart-item">
              <div class="book-img">
                <img src=<?php echo '"https://covers.openlibrary.org/b/olid/'.$book->getCover().'-L.jpg"'; ?> alt="Book"/>
              </div>
              <div class="book-description">
                <div class="book-title"><?php echo $book->getTitle();?></div>
                <div class="book-author"><?php echo $book->getAuthor(); ?></div>
                <div class="book-description"><?php echo substr($book->getDescription(), 0, min(40, strlen($book->getDescription()))) . "..."; ?></div>
                <div class="book-price"><span class="price-tag"></span><span class="price-text"><span class="price"><?php echo $book->getPrice();?></span> DT</span></div>
              </div>
              <div class="remove-icon">
                <input type="button" class="remove-btn" onclick=<?php echo '"' . "remove_from_cart('".$book->getIsbn()."')". '"' ?>>
              </div>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <footer>
    <div class="container-fluid p-0">
      <div class="row text-left">
        <div class="col-md-5 col-sm-5">
          <h4 class="text-light">About us</h4>
          <p class="text-muted">We are 5 enthusiastic students who would like to revolutionize the defintion of technology</p>
          <p class="pt-4 text-muted">Copyright ©2024 All rights reserved | This website is made by
            <span> Iheb Gafsi</span> <span> Douaa Bousnina</span> <span> Rayene Knani</span> <span> Farah Ayeb</span> <span> Omar Sagga</span>
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
                    <a class="fas fa-arrow-right" href="mailto:iheb.gafsi@insat.ucar.tn"></a>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="cart.js"></script>
  <script>$(document).ready(load);</script>
</body>

</html>