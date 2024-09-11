<?php
require_once 'web.php';
require_once 'order.php';
require_once 'db.php';
require_once 'customer.php';


if (!isLoggedIn()) {
    redirect('sign-in.php');
}
$purshases=getPurchasedOrder(currentCustomerId());
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
            <div class="title">Orders History</div>
            <div style="overflow-x: none;">
                <table style="border:1px solid black">
                    <thead>
                        <th>Order ID</th>
                        <th>Total Price</th>
                        <th>Order Date</th>
                    </thead>
                    <?php
                    foreach ($purshases as $purchese) {
                        echo '
                            <tr>
                                <td>
                                    <div class="name">' . $purchese['id'] . '</div>
                                </td>
                                <td>
                                    <div class="name">' . $purchese['total'] . '</div>
                                </td>
                                <td>
                                    <div class="name">' . $purchese['order_date'] . '</div>
                                </td>
                            </tr>';
                    }
                    ?>
                </table>
            </div>
            <?php require_once 'footer.php' ?>
        </div>
    </div

</body>

</html>