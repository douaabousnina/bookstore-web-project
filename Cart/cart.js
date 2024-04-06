function load(){
    prices = document.getElementsByClassName("price");
    sum = 0;
    for(price of prices){
        sum += parseFloat(price.innerHTML);
    }

    document.getElementById("total-price").innerHTML = (sum>0)?Math.round(sum*100)/100+0.45:0;
    document.getElementById("total-reduced-price").innerHTML = (sum>0)?Math.floor(sum*0.5)-0.01:0;
}

function remove_from_cart(id){
    $.ajax({
        url: "remove_from_cart.php",
        type: 'get',
        data: {
            'id': id
        },
        dataType: 'json',
        success: function(response) {
            if (response.status == 1) {
                window.location.reload();
            }else {
                alert('Cannot remove from Cart');
            }
        },
        error: function(response) {
            console.log('error');
            console.log(response);
        }
    })
}

function buy_now(){
    $.ajax({
        url: "buy.php",
        type: 'get',
        data: {},
        dataType: 'json',
        success: function(response) {
            if (response.status == 1) {
                window.location.reload();
            }else {
                alert('Cannot buy now ' + response.message);
            }
        },
        error: function(response) {
            console.log('error');
            console.log(response);
        }
    })
}