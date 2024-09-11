// var product;
// var price;

// Automatically submit the form when a rating is selected


// function autoSubmit(id) {
//   alert("theForm_" + id)
//   var formObject = document.getElementsByClassName("theForm")[id];
//   formObject.innerHTML = "djksa90dia"
//   // formObject.submit();
// }

// function BuyNow(productDetails) {
//   if (!localStorage.getItem("product")) {
//     product = productDetails.getAttribute("data-product");
//     price = productDetails.getAttribute("data-product");
//   } else {
//     product = localStorage.getItem("product");
//     price = localStorage.getItem("price");
//     product += "," + productDetails.getAttribute("data-product");
//     price += "," + productDetails.getAttribute("data-price");
//   }
// }

// localStorage.setItem("product", product);
// localStorage.setItem("price", price);

// window.alert(localStorage.getItem("product"));
// window.alert(localStorage.getItem("price"));
// showCart();

// function showCart() {
//   window.alert("showCart function ");
//   if (localStorage.getItem("product")) {
//     var productList = localStorage.getItem("product").split(",");
//     var priceList = localStorage.getItem("price").split(",");
//     document.getElementById("cartcounter").innerHTML = productList.length;
//     var shoppingCartTable = "<table><tr> <th>Product</th><th>Price</th></tr>";
//     document.getElementById("orderDetails").innerHTML = shoppingCartTable;
//   } else {
//     document.getElementById("cartcounter").innerHTML = "";
//   }
// }

// function emptyCart() {
//   localStorage.clear();
//   product = "";
//   price = "";
//   window.alert("deleted");
// }
// addEventListener("load", showCart);
