<?php

function getFlowerProducts()
{
    $db = connectDB();
    $sql = "SELECT p.*, AVG(r.rate) review FROM products p LEFT JOIN reviews r ON (p.id = r.product_id) WHERE category = 'flower' GROUP BY p.id";
    $result = mysqli_query($db, $sql);
    $products = array();
    while ($row = mysqli_fetch_array($result)) {
        $products[] = $row;
    }
    return $products;
}

function getBallonProducts()
{
    $db = connectDB();
    $sql = "SELECT p.*, AVG(r.rate) review FROM products p LEFT JOIN reviews r ON (p.id = r.product_id) WHERE category = 'ballon' GROUP BY p.id";
    $result = mysqli_query($db, $sql);
    $products = array();
    while ($row = mysqli_fetch_array($result)) {
        $products[] = $row;
    }
    return $products;
}

function getBabeProducts()
{
    $db = connectDB();
    $sql = "SELECT p.*, AVG(r.rate) review FROM products p LEFT JOIN reviews r ON (p.id = r.product_id) WHERE category = 'babe' GROUP BY p.id";
    $result = mysqli_query($db, $sql);
    $products = array();
    while ($row = mysqli_fetch_array($result)) {
        $products[] = $row;
    }
    return $products;
}

function getChocoProducts()
{
    $db = connectDB();
    $sql = "SELECT p.*, AVG(r.rate) review FROM products p LEFT  JOIN reviews r ON (p.id = r.product_id) WHERE category = 'choco' GROUP BY p.id";
    $result = mysqli_query($db, $sql);
    $products = array();
    while ($row = mysqli_fetch_array($result)) {
        $products[] = $row;
    }
    return $products;
}

function rateProduct($product_id, $customer_id, $rate)
{
    $db = connectDB();
    $sql = "INSERT INTO reviews (product_id, customer_id, rate) VALUES ($product_id, $customer_id, $rate)";
    mysqli_query($db, $sql);
}
