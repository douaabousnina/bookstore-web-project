function load_more_books(limit, layout) {
    
    $.ajax({
        url: "fetch_more.php",
        type: 'get',
        data: {
            'limit': limit
        },
        dataType: 'json',
        success: function(response) {
            console.log(response);
            fill(response, layout);
        }
    })
    
}
limit = 4;
function first_clicked(layout) {
    load_more_books(limit, layout);
}

function fill(data, layout) {
    console.log('hello');
    console.log(layout);
    let html =`` ;
    $.each(data.data.books, function(index, value){
        html += `<div class="book-item">
        <a href="../BookDetails/?id=${value.id}" class="fill-div">
        <img class="book-cover" src="https://covers.openlibrary.org/b/olid/${value.coverid}-L.jpg" alt="book" />
        <p class="book-title">${value.title}</h5>
        <p class="book-author">${value.author}</p>
        <div class="price-area">
          <span class="price-tag"></span> &nbsp;
          <p class="book-price">${value.price} TND</p>
        </div>
        </a>
        <button class="btn-add-to-cart" onclick="add_to_cart('${value.id}')">Add to Cart &nbsp; <span class="cart-tag"></span></button>
      </div>`
    })
    document.getElementById(layout).innerHTML += html;
}


function add_to_cart(id) {
    console.log('Adding book to cart', id);
    $.ajax({
        url: "add_to_cart.php",
        type: 'get',
        data: {
            'id': id
        },
        dataType: 'json',
        success: function(response) {
            if (response.status == 1) {
                console.log('Book added to cart');
                element = document.getElementById('btn'+id);
                element2 = document.createElement('span');
                element2.setAttribute('class', 'already-in-cart');
                element2.innerHTML = 'Book already in cart';
                element.parentNode.replaceChild(element2, element);
            }else {
                alert('Added to Cart');
            }
        },
        // error
        error: function(response) {
            console.log('error');
            console.log(response);
        }
    })
}