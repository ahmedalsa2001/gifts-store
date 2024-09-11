<?php
require_once 'db.php';
require_once 'product.php';
require_once 'order.php';
require_once 'web.php';

if (!isLoggedIn()) {
    redirect('sign-in.php');
}

if (isset($_POST['submit'])) {
    createOrder($_POST['product_id'], currentCustomerId());
    alertMessage('Product added to your shopping cart');
} else if (isset($_POST['rate'])) {
    try {
        rateProduct($_POST['product_id'], currentCustomerId(), $_POST['rate']);
        alertMessage('You\'re rate created successfully');
    } catch (\Throwable $th) {
        alertMessage('You can\'t rate this product 2 times');
    }
}
$products = getBabeProducts();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width =device-width, initial- scale =1.0">
    <title>Babes</title>
    <?php require_once 'style.php' ?>
</head>

<body>
    <?php require_once 'nav-menu.php' ?>

    <section class="p50">
        <div class="container">

            <div class="b-menu">
                <div class="row">
                    <?php
                    foreach ($products as $product) {
                        echo '
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="menu-item">
                            <img src="' . $product['image'] . '" alt="' . $product['name'] . '">
                            <p>' . $product['name'] . '</p>
                            <h5>Price: ' . $product['price'] . ' SAR</h5>
                            <h5>Review Average: ' . (round($product['review'], 2) ?? 0) . ' <i class="fa fa-star"></i></h5>
                            <form action="babe.php" method="post">
                            <input type="hidden" name="product_id" value="' . $product['id'] . '"/>
                                <label for="rating">Rate this product:</label>
                                <select name="rate" id="rating">
                                    <option value="1">1 star</option>
                                    <option value="2">2 stars</option>
                                    <option value="3">3 stars</option>
                                    <option value="4">4 stars</option>
                                    <option value="5">5 stars</option>
                                </select>
                                <input type="submit" value="Submit">
                            </form>
                            <form action="babe.php" method="post">
                                    <input type="hidden" name="product_id" value="' . $product['id'] . '"/>
                                    <button name="submit" type="submit" class="order">Buy Now</button>
                                </form>
                            </div>
                        </div>
                        ';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php require_once 'footer.php' ?>

</body>

</html>