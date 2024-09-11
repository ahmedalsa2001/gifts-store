<?php
require_once 'web.php';
require_once 'db.php';
require_once 'customer.php';

if (isLoggedIn()) {
  redirect('index.php');
}

if (isset($_POST['submit'])) {
  register($_POST['name'], $_POST['email'], $_POST['password'], $_POST['phone']);
  redirect('index.php');
}


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width =device-width , initial- scale =1.0">

  <title> Sign Up</title>

  <?php require_once 'style.php' ?>

  <script type="text/javascript">
    function validateName() {
      var name = document.getElementById("name").value;
      var errorMessage
      if (name.length <= 2) {
        errorMessage = "the name is too short🥲 ";
        document.getElementById("nameError").innerHTML = errorMessage;
      } else if (!/^[a-zA-Z ]+$/.test(name)) {
        errorMessage = "Name can only have letter😅";
        document.getElementById("nameError").innerHTML = errorMessage;
      } else {
        document.getElementById("nameError").innerHTML = "";
      }
    }
  </script>


  <script type="text/javascript">
    function validatePhone() {
      var phone = document.getElementById("phone").value;
      var errorMessage
      if (phone.length <= 8) {
        errorMessage = "the phone number is too short🥲 ";
        document.getElementById("phoneError").innerHTML = errorMessage;
      } else if (!/^(\()?\d{3}(\))?(-|\s)?\d{3}(-|\s)\d{4}$/.test(phone)) {
        errorMessage = "this is too long 😅";
        document.getElementById("phoneError").innerHTML = errorMessage;
      } else {
        document.getElementById("phoneError").innerHTML = "";
      }
    }
  </script>


</head>

<body>
  <header>
    <a href="Botuique.html"><img src="loogo.png-removebg-preview.png" alt="logo" height="232" width="250">
      <p>back to home page</p>
    </a>
  </header>
  <div>
    <form action="sign-up.php" method="post">
      <h2>sign up to Jasmine</h2>

      <p><label name="Username">Username:
          <input type="text" id="name" name="name" size="20" maxlenght="35" required onblur="validateName()" placeholder="enter your name">
        </label> <span id="nameError"></span>
      </p>

      <p><label name="email">Email:
          <input type="email" id="email" name="email" size="20" maxlenght="40" placeholder="enter your email" required oninput="validEmail()"> </label></p>
      <span id="emailError"></span>


      <p><label name="password">password:
          <input type="password" name="password" size="20" maxlenght="35" placeholder="enter your password" required></label></p>



      <p><label name="phone">phone number:
          <input type="text" id="phone" name="phone" placeholder="+966" required onblur="validatePhone()"> </label></p></br>
      <span id="phoneError"></span>
      <p><a href="products.php">Sign in to complete your purchase</a></p>

      <div>
        <button name="submit" type="submit">Sign up</button>
      </div>
      <div><a href="sign-in.php">You do have an account? sign in</a></div>

    </form>
  </div>

  <?php require_once 'footer.php' ?>
</body>

</html>