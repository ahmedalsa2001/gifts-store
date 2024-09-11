<?php

function register($name, $email, $password, $phone)
{
    $db = connectDB();
    $sql = "INSERT INTO customers (name, email,  password, phone) VALUES('" . $name . "', '" . $email . "',  '" . $password . "', '" . $phone . "')";
    mysqli_query($db, $sql);
    $customer_id = mysqli_insert_id($db);
    setcookie('customer_id', $customer_id, time() + (86400 * 30), "/");
}

function login($email, $password)
{
    $db = connectDB();
    $sql = "SELECT id FROM customers WHERE email = '" . $email . "' AND password = '" . $password . "'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    if (isset($row['id'])) {
        setcookie('customer_id', $row['id'], time() + (86400 * 30), "/");
        return true;
    }
    return false;
}

function sendMail($message)
{
    $db = connectDB();
    $id = currentCustomerId();
    $sql = "SELECT email FROM customers WHERE id = $id";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    mail($row['email'], 'Confirmation Email', $message);
}
