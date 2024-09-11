<?php
require_once 'web.php';
require_once 'order.php';
require_once 'db.php';

if (isset($_POST['submit'])) {
    mail('f90540@gmail.com', 'Message From ' . $_POST['name'], $_POST['message']);
    alertMessage('Message sended successfully!');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width =device-width , initial- scale =1.0">
    <title>Contact Us</title>
    <?php require_once 'style.php' ?>
</head>

<body>
    <?php require_once 'nav-menu.php' ?>
    <form action="contact-us.php" method="post">
        <h2>sign in to Jasmine</h2>

        <p><label name="name">Name:
                <input type="text" id="name" name="name" size="20" maxlenght="35" required onblur="validateName()" placeholder="enter your name">
            </label> <span id="nameError"></span>
        </p>

        <p><label name="email">Email:
                <input type="email" id="email" name="email" size="20" maxlenght="40" placeholder="enter your email" required oninput="validEmail()"> </label></p>
        <span id="emailError"></span>


        <p><label name="Message">Message:
                <input type="message" name="message" size="20" maxlenght="35" placeholder="enter your email" required></label></p>

        <div>
            <button name="submit" type="submit">Send Email</button>
        </div>
    </form>
    <?php require_once 'footer.php' ?>
</body>

</html>