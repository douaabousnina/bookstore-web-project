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
                element = document.getElementById('btn-add-to-cart');
                element2 = document.createElement('span');
                element2.setAttribute('class', 'already-in-cart');
                element2.innerHTML = 'Book already in cart';
                element.parentNode.replaceChild(element2, element);
            }else {
                alert('Error Occured');
            }
        },
        // error
        error: function(response) {
            console.log('error');
            console.log(response);
        }
    })
}