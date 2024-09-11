<?php
require_once 'web.php';
require_once 'order.php';
require_once 'db.php';
require_once 'customer.php';


if (!isLoggedIn()) {
    redirect('sign-in.php');
}

if (isset($_POST['plus'])) {
    addOneToOrder($_POST['order_id']);
} else 
if (isset($_POST['minus'])) {
    if ($_POST['qty'] > 1) {
        minusOneToOrder($_POST['order_id']);
    } else {
        deleteOrder($_POST['order_id']);
    }
} else
if (isset($_POST['empty'])) {
    deleteOrders(currentCustomerId());
} else
if (isset($_POST['submit'])) {
    createPurchase($_POST['total'], currentCustomerId());
    alertMessage("The Total Bill Amount= " . $_POST['total'] . " SAR");
    sendMail("The Total Bill Amount= " . $_POST['total'] . " SAR");
}

$orders = getOrders(currentCustomerId());
$total = 0;
?>
<!DOCTYPE html>
<html>

<head>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width =device-width , initial- scale =1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Shopping Cart</title>
        <?php require_once 'style.php' ?>

        <style>
            th,
            td {
                padding: 0.5em;
                border: 1px solid black;
                text-align: left;
                font-size: 1em;
            }

            @media only screen and (max-width: 600px) {

                table {
                    width: 100%;
                }

                /* Make the table responsive for smaller screens */
                th,
                td {
                    font-size: 0.8em;
                    padding: 0.2em;
                }

                img {
                    width: 50px !important;
                    height: 50px !important;
                }
            }
        </style>
    </head>

<body>
    <?php require_once 'nav-menu.php' ?>
    <div class="container">
        <div class="content">
            <div class="title">Shopping Cart</div>
            <div style="overflow-x: none;">
                <table style="border:1px solid black">
                    <thead>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </thead>
                    <?php
                    foreach ($orders as $order) {
                        $total += $order['price'] * $order['qty'];
                        echo '
                            <tr>
                                <td>
                                    <div class="image"><img class="product" src="' . $order['image'] . '" alt=""></div>
                                </td>
                                <td>
                                    <div class="name">' . $order['name'] . '</div>
                                </td>
                                <td>
                                    <div class="quantity">
                                        <form action="shopping-cart.php" method="post"><input type="hidden" name="order_id" value="' . $order['id'] . '"><button name="plus" type="submit" style="border: none; background-color: transparent;" class="plus">+</button></form>
                                        <div class="input"><input id="product-' . $order['id'] . '" type="text" value="' . $order['qty'] . '"></div>
                                        <form action="shopping-cart.php" method="post"><input type="hidden" name="order_id" value="' . $order['id'] . '"><input type="hidden" name="qty" value="' . $order['qty'] . '"><button name="minus" type="submit" style="border: none; background-color: transparent;" class="minus">-</button></form>
                                    </div>
                                </td>
                                <td>
                                    <div id="p2" value="100" class="price">' . $order['price'] . ' SAR</div>
                                </td>
                            </tr>';
                    }

                    ?>
                </table>
            </div>
            <div class="total">
                <h1>Total is: <?php echo $total ?> SAR</h1>
                <main>
                    <form action="shopping-cart.php" method="post">
                        <div id="total">
                            <input type="hidden" name="total" value="<?php echo $total ?>">
                            <input name="submit" type="submit" class="EndButtons" onclick="calculate()">
                        </div>
                    </form>
                    <form action="shopping-cart.php" method="post">
                        <div id="orderDetails">
                            <input type="submit" name="empty" class="EndButtons" value="empty cart" onclick="clear ()">
                        </div>
                    </form>
                </main>
            </div>
            <?php require_once 'footer.php' ?>
        </div>
    </div>

    <script>
        // function addOne(id) {
        //     var input = document.getElementById(id)
        //     var qty = parseInt(input.getAttribute("value"))
        //     qty++
        //     input.setAttribute("value", qty)
        // }

        // function minusOne(id) {
        //     var input = document.getElementById(id)
        //     var qty = parseInt(input.getAttribute("value"))
        //     if (qty != 0)
        //         qty--
        //     input.setAttribute("value", qty)
        // }

        // function calculate() {
        //     var price1 = document.getElementById("p1").getAttribute("value")
        //     var price2 = document.getElementById("p2").getAttribute("value")
        //     var price3 = document.getElementById("p3").getAttribute("value")
        //     price1 = parseFloat(price1)
        //     price2 = parseFloat(price2)
        //     price3 = parseFloat(price3)
        //     var total = price1 + price2 + price3
        //     var vat = 15 / 100

        //     var vatAmount = parseFloat(vatAmount)
        //     vatAmount = total * vat
        //     var totalAmount = parseFloat(totalAmount)
        //     totalAmount = total + vatAmount

        //     var vatT = document.getElementById("vat").innerText = "The VAT (15%) Amount= " + vatAmount + " SAR"
        //     var receiptT = document.getElementById("total").innerText = "The Total Bill Amount= " + totalAmount + " SAR"
        // }
    </script>

</body>

</html>