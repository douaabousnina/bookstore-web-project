<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>FAQ</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">
  
  <link rel="stylesheet" href="./mobile-style.css">

  <link rel="stylesheet" href="style.css">

 
</head>

<body onload="load()">
  <header>
    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="index.php">
          <i class="fas fa-book-reader fa-2x mx-3"></i>Books</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
          aria-label="Toggle navigation">
          <i class="fas fa-align-right text-light"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="mr-auto"></div>
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">HOME
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">BOOKS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./cart/src/cart.php">CART</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="faq.php">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">SIGN IN</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>

  <section id="faq" class="container py-5">
    <h2 class="text-center mb-4">Frequently Asked Questions</h2>
    <style>
      #faq h2 {
          color: purple;
          font-family:"Sniglet", cursive;
          font-weight: bold;
          /*box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.2); */
      }
    </style>

    <div class="accordion" id="faqAccordion">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <button class="btn btn-link faq-question" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <i class="fas fa-book mr-2"></i> What is Bookini?
            </button>
          </h5>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
          <div class="card-body faq-answer">
            Bookini is a platform for purchasing and reading books online.
          </div>
        </div>
      </div>
      
      <div class="card">
        <div class="card-header" id="headingTwo">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed faq-question" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <i class="fas fa-shopping-cart mr-2 "></i>How do I purchase books on Bookini?
            </button>
          </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
          <div class="card-body faq-answer">
             You can purchase books by adding them to your cart and proceeding to checkout.
          </div>
        </div>
      </div>
      
      <div class="card">
        <div class="card-header" id="headingThree">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed faq-question" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              <i class="fas fa-phone mr-2"></i> How can I contact the authors through phone?
            </button>
          </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
          <div class="card-body faq-answer">
            You can call us on the number +216240142xx
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingFour">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed faq-question" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              <i class="fas fa-user mr-2"></i>  How do I create an account on Bookini?
            </button>
          </h5>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#faqAccordion">
          <div class="card-body faq-answer">
            Simply click on the 'Sign Up'. Fill in the required information, such as your name, email address, and password, then click 'Sign Up' to complete the process
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingFive">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed faq-question" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
              <i class="far fa-credit-card mr-2"></i> What payment methods do you accept?
            </button>
          </h5>
        </div>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#faqAccordion">
          <div class="card-body faq-answer">
            We accept various payment methods, including credit/debit cards, PayPal, and bank transfers.
             You can choose your preferred payment method during the checkout process.
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingSix">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed faq-question" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
              <i class="fas fa-percent mr-2"></i> Will be there any available discounts ? 
            </button>
          </h5>
        </div>
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#faqAccordion">
          <div class="card-body faq-answer">
            Yes, we regularly offer discounts and promotions on selected items.
             Keep an eye on our website and subscribe to our newsletter to stay updated on the latest deals.
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingSeven">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed faq-question" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
              <i class="fas fa-undo mr-2"></i> What is your return policy?
            </button>
          </h5>
        </div>
        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#faqAccordion">
          <div class="card-body faq-answer">
            We have a hassle-free return policy. If you are not satisfied with your purchase, 
            you can return the item within 14 days of receipt for a refund or exchange.
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingEight">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed faq-question" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
              <i class="fas fa-ban mr-2"></i> Can I cancel my order after it has been placed?
            </button>
          </h5>
        </div>
        <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#faqAccordion">
          <div class="card-body faq-answer">
            
           Yes, you have the option to cancel your order provided it hasn't been processed or shipped yet. 
           Kindly reach out to our customer support team promptly to initiate the cancellation request.
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingNine">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed faq-question" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
              <i class="fas fa-globe-americas mr-2"></i> Do you offer international shipping?
            </button>
          </h5>
        </div>
        <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#faqAccordion">
          <div class="card-body faq-answer">
            Yes, we offer international shipping to many countries.But shipping fees and delivery times may vary depending on your location.
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingTen">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed faq-question" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
              <i class="fas fa-star mr-2"></i>Do you have a loyalty rewards program?
            </button>
          </h5>
        </div>
        <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#faqAccordion">
          <div class="card-body faq-answer">
            Yes, we have a loyalty rewards program for our frequent customers. You can earn points with every purchase,
             which can be redeemed for discounts on future orders.
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingEleven">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed faq-question" type="button" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
              <i class="fas fa-file mr-2"></i>  Are the books on your platform available in digital format?
            </button>
          </h5>
        </div>
        <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#faqAccordion">
          <div class="card-body faq-answer">
            Yes, we offer a selection of books in digital format. You can find digital versions available for purchase alongside physical copies.
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingTwelve">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed faq-question" type="button" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
              <i class="fas fa-exchange-alt mr-2"></i>  Can I return or exchange an eBook after purchase?
            </button>
          </h5>
        </div>
        <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#faqAccordion">
          <div class="card-body faq-answer">
            Unfortunately, due to the nature of digital content, we cannot accept returns or exchanges for eBooks once they have been purchased and downloaded. We recommend reviewing the book's description and sample chapters before making a purchase to ensure it meets your expectations.
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingThirteen">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed faq-question" type="button" data-toggle="collapse" data-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
              <i class="fas fa-th-list mr-2"></i>  What genres of books do you offer?
            </button>
          </h5>
        </div>
        <div id="collapseThirteen" class="collapse" aria-labelledby="headingThirteen" data-parent="#faqAccordion">
          <div class="card-body faq-answer">
            We offer a wide range of genres to cater to diverse reading preferences.
             Our collection includes fiction, non-fiction, romance, mystery, thriller, science fiction, fantasy, self-help, biography, and many more. 
             Whether you're into classic literature or the latest bestsellers, we have something for everyone!
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingFourteen">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed faq-question" type="button" data-toggle="collapse" data-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
              <i class="fas fa-calendar-plus mr-2"></i> Can I pre-order upcoming book releases?
            </button>
          </h5>
        </div>
        <div id="collapseFourteen" class="collapse" aria-labelledby="headingFourteen" data-parent="#faqAccordion">
          <div class="card-body faq-answer">
            Yes, we offer the option to pre-order upcoming book releases.
             Keep an eye on our website for announcements about new releases and pre-order availability 

          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingFifteen">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed faq-question" type="button" data-toggle="collapse" data-target="#collapseFifteen" aria-expanded="false" aria-controls="collapseFifteen">
               <i class="fas fa-question-circle mr-2"></i>Another Question ?? 
            </button>
          </h5>
        </div>
        <div id="collapseFifteen" class="collapse" aria-labelledby="headingFifteen" data-parent="#faqAccordion">
          <div class="card-body faq-answer">
            No worries ! You can contact us directly through our email : bookini@gmail.com !
             You're so welcome and we'll try to respond as soon as possible!
          </div>
        </div>
      </div>
      
      
      
    </div>
  </section>

 

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"  ></script>
  <script src="./main.js"></script>
</body>

</html>
