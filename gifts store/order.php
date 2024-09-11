<?php

function createOrder($product_id, $customer_id)
{
    $db = connectDB();
    $sql = "INSERT INTO orders (product_id, customer_id, qty) VALUES ($product_id, $customer_id, 1)";
    mysqli_query($db, $sql);
}

function getNumberOfOrders($customer_id)
{
    $db = connectDB();
    $sql = "SELECT COUNT(*) count FROM orders WHERE customer_id = $customer_id";
    $result = mysqli_query($db, $sql);
    return mysqli_fetch_array($result)['count'];
}

function getOrders($customer_id)
{
    $db = connectDB();
    $sql = "SELECT o.id id, o.qty qty, p.image image, p.price price, p.name name FROM customers c JOIN orders o ON(c.id = o.customer_id) JOIN products p ON(p.id = o.product_id)  WHERE c.id = $customer_id";
    $result = mysqli_query($db, $sql);
    $orders = array();
    while ($row = mysqli_fetch_array($result)) {
        $orders[] = $row;
    }

    return $orders;
}

function addOneToOrder($order_id)
{
    $db = connectDB();
    $sql = "UPDATE orders SET qty = qty + 1 WHERE id = $order_id";
    mysqli_query($db, $sql);
}

function minusOneToOrder($order_id)
{
    $db = connectDB();
    $sql = "UPDATE orders SET qty = qty - 1 WHERE id = $order_id";
    mysqli_query($db, $sql);
}

function deleteOrders($customer_id)
{
    $db = connectDB();
    $sql = "DELETE FROM orders WHERE customer_id = $customer_id";
    mysqli_query($db, $sql);
}

function deleteOrder($order_id)
{
    $db = connectDB();
    $sql = "DELETE FROM orders WHERE id = $order_id";
    mysqli_query($db, $sql);
}


// create purchase

function createPurchase($total, $customer_id)
{
    $db = connectDB();
    $sql = "INSERT INTO purchases (total, customer_id) VALUES ($total, $customer_id)";
    mysqli_query($db, $sql);
}


function getPurchasedOrder($customer_id)
{
    $db = connectDB();
    $sql = "SELECT p.id id ,p.total total ,p.order_date order_date FROM purchases p WHERE p.customer_id = $customer_id";
    $result = mysqli_query($db, $sql);
    $purshase = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $purshase[] = $row;
    }


    return $purshase;
}

function getNumberOfPurchasedOrders($customer_id)
{
    $db = connectDB();
    $sql = "SELECT COUNT(*) count FROM purchases WHERE customer_id = $customer_id";
    $result = mysqli_query($db, $sql);
    return mysqli_fetch_array($result)['count'];
}