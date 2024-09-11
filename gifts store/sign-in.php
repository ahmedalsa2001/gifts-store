<?php
require_once 'web.php';
require_once 'db.php';
require_once 'customer.php';

if (isLoggedIn()) {
  redirect('index.php');
}

if (isset($_POST['submit'])) {
  $isSuccess = login($_POST['email'], $_POST['password']);
  if ($isSuccess)
    redirect('index.php');
  else alertMessage('Email or password is wrong');
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width =device-width , initial- scale =1.0">

  <title> Sign-In</title>

  <?php require_once 'style.php' ?>

</head>

<body>
  <header>
    <a href="index.php"><img src="loogo.png-removebg-preview.png" alt="logo" height="232" width="250">
      <p>back to home page</p>
    </a>
  </header>
  <div>
    <form action="sign-in.php" method="post">
      <h2>sign in to Jasmine</h2>

      <p><label name="email">Email:
          <input type="email" id="email" name="email" size="20" maxlenght="40" placeholder="enter your email" required oninput="validEmail()"> </label></p>
      <span id="emailError"></span>


      <p><label name="password">password:
          <input type="password" name="password" size="20" maxlenght="35" placeholder="enter your email" required></label></p>

      <div>
        <button name="submit" type="submit">Sign in</button>
      </div>
      <div><a href="sign-up.php">You don't have an account? sign up</a></div>
    </form>
  </div>

  <?php require_once 'footer.php' ?>
</body>

</html>