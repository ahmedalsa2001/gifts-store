<?php

function redirect(String $page)
{
    echo "<script>window.location.href='" . $page . "'</script>";
}

function alertMessage($message)
{
    echo "<script>alert('" . $message . "')</script>";
}

function isLoggedIn()
{
    return isset($_COOKIE['customer_id']);
}

function currentCustomerId()
{
    return $_COOKIE['customer_id'];
}

function logout()
{
    setcookie('customer_id', null, time() - 3600, "/");
    unset($_COOKIE['customer_id']);
}
