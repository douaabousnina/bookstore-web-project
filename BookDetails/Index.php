<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Books</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="details.css" />
  <link rel="stylesheet" href="mobile-style.css">
  <script src="details.js"></script>
</head>

<body>
  <?php include '../connect.php'; 
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $sql = "SELECT * FROM book WHERE bid =" . '"'. $id . '"';
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $title = "";
      $author = "";
      $description = "";
      $price = 0;
      $coverid = 0;
      while ($row = $stmt->fetch()) {
        $title = $row['btitle'];
        $author = $row['bauthor'];
        $description = $row['bdescription'];
        $price = $row['bprice'];
        $coverid = $row['bcoverid'];
      }
    }
  ?>
  <header>
    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">
          <i class="fas fa-book-reader fa-2x mx-3"></i>Bookini</a>
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
              <a class="nav-link" href="../Cart/">CART</a>
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
  </header>
  <main>
    <!--https://marketplace.canva.com/EAFPHUaBrFc/1/0/1003w/canva-black-and-white-modern-alone-story-book-cover-QHBKwQnsgzs.jpg-->
    <section class="description-sec">
      <div class="image-container">
        <img class="book-cover" src=<?php echo '"https://covers.openlibrary.org/b/olid/'.$coverid.'-L.jpg"'?> alt="book cover" />
      </div>
      <div class="description-container">
        <div class="title">
          O<?php echo $title; ?>
        </div>
        <div class="daterelease">
          Hardcover – January 21, 2025
        </div>
        <div class="author">
          by <span class="authorname"><?php echo $author ?></span> (Author)
        </div>
        <hr />
        <div class="preorder">
          <span class="preorder-tag"></span>&nbsp;Pre-order Price Guarantee.
        </div>
        <div class="description-text">
          Preorder now and receive the stunning DELUXE LIMITED EDITION while supplies last―featuring gorgeous sprayed edges with stenciled artwork, 
          as well as exclusive special design features. This incredible collectible is only available for a limited time, a must-have for any book lover while supplies last in the US and Canada only.
          Get ready to fly or die in the breathtaking follow-up to Fourth Wing and Iron Flame from #1 New York Times bestselling author Rebecca Yarros.
        </div>
        <a class="report-issues" href="mailto:iheb.gafsi@insat.ucar.tn">Report an issue about this product</a>
        <hr />
        <div class="general">
          <div class="general-item">
            <div class="general-item-title">
              Language
            </div>
            <img class="general-item-image" src="https://cdn-icons-png.flaticon.com/512/44/44386.png" alt="item content" />
            <div class="general-item-value">
              English
            </div>
          </div>
          <div class="general-item">
            <div class="general-item-title">
              Publisher
            </div>
            <img class="general-item-image" src="../assets/building.png" alt="item content" />
            <div class="general-item-value">
              Entangled: Red Tower Books
            </div>
          </div>
          <div class="general-item">
            <div class="general-item-title">
              Publication date
            </div>
            <img class="general-item-image" src="../assets/calendar.png" alt="item content" />
            <div class="general-item-value">
              January 21, 2025
            </div>
          </div>
          <div class="general-item">
            <div class="general-item-title">
              Dimensions
            </div>
            <img class="general-item-image" src="../assets/dimensions.png" alt="item content" />
            <div class="general-item-value">
              15 x 3 x 23 centimeters
            </div>
          </div>
          <div class="general-item">
            <div class="general-item-title">
              Key
            </div>
            <img class="general-item-image" src="../assets/barcode.png" alt="item content" />
            <div class="general-item-value">
                OL1077449W
            </div>
          </div>
        </div>

      </div>
      </div>
      <div class="purchase-details-container">
        <div class="hardcover-price">
          <span class="hardcover-text">Hardcover</span><br>
          <span class="price1"><?php echo $price ?> TND</span>
        </div>
        <span class="authorname">Other New</span> From <span class="authorname"><?php echo $price ?> TND</span>
        <hr />
        <div class="buy-new">
          <span class="buy-new-text">Buy New</span>
          <span class="price2"><?php echo $price ?> TND</span>
        </div>
        <div class="actual-price">
          <span class="normal-text">List Price:</span>
          <span class="price3"><s><?php echo round($price*4/3, 2) ?> TND</s></span>
        </div>
        <div class="actual-price">
          <span class="normal-text">Save: <?php echo round($price*4/3 -$price, 2) ?> TND</span>
        </div>
        <div class="normal-text">
        <?php echo $price +20.45 ?> TND Shipping & Import Fees Deposit to Tunisia
        </div>
        <div class="normal-text">
          Delivery <span class="buy-new-text">Wednesday, January 22, 2025</span>
        </div>
        <div class="big-title">
          This title will be released on January 21, 2025.
        </div>
        <?php
          // check if the book is already in cart, if so we write a text else we write a btn-add-to-cart button
          $query = "SELECT bid FROM command WHERE cid='".$_SESSION['id']."' AND bid='$id'";
          $stmt = $pdo->prepare($query);
          $stmt->execute();
          $val = $stmt->fetchAll();
          if($val){
            echo '<p class="already-in-cart">This book is already in your cart</p>';
          }else{
            echo '<button id="btn-add-to-cart" class="btn-add-to-cart" onclick="add_to_cart(\''.$id.'\')">Add to Cart &nbsp;<span class="cart-tag"></span></button>';
          }
        ?>
        <!--button class="btn-add-to-cart">Add to Cart &nbsp;<span class="cart-tag"></span></button-->
        <table class="buy-info">
          <tr>
            <td>Ships from</td>
            <td>Bookini</td>
          </tr>
          <tr>
            <td>Sold by</td>
            <td>Bookini.tn</td>
          </tr>
          <tr>
            <td>Returns</td>
            <td class="returns-payment">
              Eligible for Return, Refund or Replacement within 30 days of receipt</td>
          </tr>
          <tr>
            <td>Payment</td>
            <td class="returns-payment">Secure transaction</td>
          </tr>
        </table>
      </div>
    </section>
    <img class="page-breaker" src="../assets/books2.jpg" />
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