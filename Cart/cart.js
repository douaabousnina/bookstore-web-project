function load(){
    prices = document.getElementsByClassName("price");
    sum = 0;
    for(price of prices){
        sum += parseFloat(price.innerHTML);
    }
    document.getElementById("total-price").innerHTML = (sum>0)?Math.floor(sum)-0.01:0;
}