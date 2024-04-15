<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Books</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="books.css" />
  <link rel="stylesheet" href="mobile-style.css">
  <script src="books.js"></script>
</head>

<body>
  <?php include '../connect.php'?>
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
              <a class="nav-link" href="">BOOKS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Cart/">CART</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../faq.php">FAQ</a>
            </li>
            <?php

            if (@$_SESSION["logged_in"] === 'yes') {
              echo '
              <li class="nav-item">
                <a class="nav-link" href="../Login/logout.php">LOG OUT</a>
              </li>
              ';
            } else {
              echo '
              <li class="nav-item">
                <a class="nav-link" href="../Login/register.php">SIGN IN</a>
              </li>
              ';
            }
            
            ?>

          </ul>
        </div>
      </nav>
    </div>


    <div class="container text-center">
      <div class="row">
        <div class="col-md-7 col-sm-12  text-white">
          <h6>TEAM RT2</h6>
          <h1>EXCITING ADVENTURE</h1>
          <p>
            Scroll down to see more
          </p>
          <button class="btn btn-light px-5 py-2 primary-btn">
            We have a 50% reduction!
          </button>
        </div>
      </div>
    </div>
  </header>
  <main>
    <!--Scientific Books-->
    <section class="book-sec">
      <h2 class="book-category">Search, Read, And Purchase</h2>
      <div class="container">
        <div class="previous-list">
        </div>
        <div class="book-list" id="first-list">
          <?php
          //$_SESSION['id'] = 1;
          if (isset($_GET['limit'])) {
            $limit = $_GET['limit'];
          }
          $limit = 4;
          $query = "SELECT bid as id, btitle as title, bauthor as author, bcoverid as coverid, bprice as price, bdescription as description
                    FROM book 
                    ORDER BY RAND()
                    LIMIT $limit";
          //echo $query . "<br>";
          $stmt = $pdo->prepare($query);
          $stmt->execute();
          $books = array();
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $books[] = new Book($row['title'], $row['id'], $row['price'], $row['author'], $row['description'], $row['coverid']);
          }?>
          <?php foreach ($books as $book){?>
            <div class="book-item" id=<?php echo '"book'.$book->getIsbn().'"'?>>
            <a href=<?php echo '"../BookDetails/?id='.$book->getIsbn().'"'?>class="fill-div">
              <img class="book-cover" src=<?php echo '"https://covers.openlibrary.org/b/olid/'.$book->getCover().'-L.jpg"'; ?> alt="book" />
              <p class="book-title"><?php echo $book->getTitle(); ?></h5>
                <p class="book-author"><?php echo $book->getAuthor()?></p>
                <div class="price-area">
                  <span class="price-tag"></span> &nbsp;
                  <p class="book-price"><?php echo $book->getPrice()?> TND</p>
                </div>
            </a>
            <button class="btn-add-to-cart" id=<?php echo '"btn'.$book->getIsbn().'"'?> onclick=<?php echo '"' . "add_to_cart('".$book->getIsbn()."')". '"' ?>>Add to Cart &nbsp; <span class="cart-tag"></span></button>
          </div>
          <?php }?>
          
          <div class="book-item">
            <a href="../BookDetails/" class="fill-div">
              <img class="book-cover" src="https://marketplace.canva.com/EAFPHUaBrFc/1/0/1003w/canva-black-and-white-modern-alone-story-book-cover-QHBKwQnsgzs.jpg" alt="book" />
              <p class="book-title">Book Title</h5>
                <p class="book-author">Author</p>
                <div class="price-area">
                  <span class="price-tag"></span> &nbsp;
                  <p class="book-price">15.99 TND</p>
                </div>
            </a>
            <button class="btn-add-to-cart">Add to Cart &nbsp; <span class="cart-tag"></span></button>
          </div>
        </div>
      </div>
      <button class="load-more-btn" id="first-btn" onclick="first_clicked('first-list')">
        Load More
      </button>
    </section>
    <img class="page-breaker" src="../assets/page-breaker-1.jpg" />
    <section class="book-sec">
      <h2 class="book-category">Learning is always a plus</h2>
      <div class="container">
        <div class="previous-list">
        </div>
        <div class="book-list" id="second-list">
          <?php
          if (isset($_GET['limit'])) {
            $limit = $_GET['limit'];
          }
          $limit = 4;
          $query = "SELECT bid as id, btitle as title, bauthor as author, bcoverid as coverid, bprice as price, bdescription as description
                    FROM book 
                    ORDER BY RAND()
                    LIMIT $limit";
          //echo $query . "<br>";
          $stmt = $pdo->prepare($query);
          $stmt->execute();
          $books = array();
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $books[] = new Book($row['title'], $row['id'], $row['price'], $row['author'], $row['description'], $row['coverid']);
          }?>
          <?php foreach ($books as $book){?>
            <div class="book-item">
            <a href=<?php echo '"../BookDetails/?id='.$book->getIsbn().'"'?>class="fill-div">
              <img class="book-cover" src=<?php echo '"https://covers.openlibrary.org/b/olid/'.$book->getCover().'-L.jpg"'; ?> alt="book" />
              <p class="book-title"><?php echo $book->getTitle(); ?></h5>
                <p class="book-author"><?php echo $book->getAuthor()?></p>
                <div class="price-area">
                  <span class="price-tag"></span> &nbsp;
                  <p class="book-price"><?php echo $book->getPrice()?> TND</p>
                </div>
            </a>
            <button class="btn-add-to-cart">Add to Cart &nbsp; <span class="cart-tag"></span></button>
          </div>
          <?php }?>
          
          <div class="book-item">
            <a href="../BookDetails/" class="fill-div">
              <img class="book-cover" src="https://marketplace.canva.com/EAFPHUaBrFc/1/0/1003w/canva-black-and-white-modern-alone-story-book-cover-QHBKwQnsgzs.jpg" alt="book" />
              <p class="book-title">Book Title</h5>
                <p class="book-author">Author</p>
                <div class="price-area">
                  <span class="price-tag"></span> &nbsp;
                  <p class="book-price">15.99 TND</p>
                </div>
            </a>
            <button class="btn-add-to-cart">Add to Cart &nbsp; <span class="cart-tag"></span></button>
          </div>
        </div>
      </div>
      <button class="load-more-btn" id="first-btn" onclick="first_clicked('second-list')">
        Load More
      </button>
    </section>
    <img class="page-breaker" src="../assets/page-breaker-2.jpg" />
    <section class="book-sec">
      <h2 class="book-category">Buy One and Get 50% Off for The Second</h2>
      <div class="container">
        <div class="previous-list">
        </div>
        <div class="book-list" id="third-list">
          <?php
          if (isset($_GET['limit'])) {
            $limit = $_GET['limit'];
          }
          $limit = 4;
          $query = "SELECT bid as id, btitle as title, bauthor as author, bcoverid as coverid, bprice as price, bdescription as description
                    FROM book 
                    ORDER BY RAND()
                    LIMIT $limit";
          //echo $query . "<br>";
          $stmt = $pdo->prepare($query);
          $stmt->execute();
          $books = array();
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $books[] = new Book($row['title'], $row['id'], $row['price'], $row['author'], $row['description'], $row['coverid']);
          }?>
          <?php foreach ($books as $book){?>
            <div class="book-item">
            <a href=<?php echo '"../BookDetails/?id='.$book->getIsbn().'"'?>class="fill-div">
              <img class="book-cover" src=<?php echo '"https://covers.openlibrary.org/b/olid/'.$book->getCover().'-L.jpg"'; ?> alt="book" />
              <p class="book-title"><?php echo $book->getTitle(); ?></h5>
                <p class="book-author"><?php echo $book->getAuthor()?></p>
                <div class="price-area">
                  <span class="price-tag"></span> &nbsp;
                  <p class="book-price"><?php echo $book->getPrice()?> TND</p>
                </div>
            </a>
            <button class="btn-add-to-cart">Add to Cart &nbsp; <span class="cart-tag"></span></button>
          </div>
          <?php }?>
          
          <div class="book-item">
            <a href="../BookDetails/" class="fill-div">
              <img class="book-cover" src="https://marketplace.canva.com/EAFPHUaBrFc/1/0/1003w/canva-black-and-white-modern-alone-story-book-cover-QHBKwQnsgzs.jpg" alt="book" />
              <p class="book-title">Book Title</h5>
                <p class="book-author">Author</p>
                <div class="price-area">
                  <span class="price-tag"></span> &nbsp;
                  <p class="book-price">15.99 TND</p>
                </div>
            </a>
            <button class="btn-add-to-cart">Add to Cart &nbsp; <span class="cart-tag"></span></button>
          </div>
        </div>
      </div>
      <button class="load-more-btn" id="first-btn" onclick="first_clicked('third-list')">
        Load More
      </button>
    </section>
  </main>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>