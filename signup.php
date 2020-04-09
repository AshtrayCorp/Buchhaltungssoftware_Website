<head>
  <title>Sign Up</title>
  <link rel="stylesheet" type="text/css" href="/buchhaltungssoftware_website/stylesheets/signup.css">
</head>

<?php //Einfügen des Headers der Website
 include_once 'header.php';
?>

<section class="main-container">
    <h2>Sign Up</h2>
    <form class="signup-form" action="/buchhaltungssoftware_website/includes/signup.inc.php" method="post">
      <div class="signup-inputs">
        <input type="text" name="username" placeholder="Username">
        <input type="text" name="firstname" placeholder="First name">
        <input type="text" name="lastname" placeholder="Last name">
        <input type="text" name="email" placeholder="Email adress">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="pwdvalid" placeholder="Confirm Password"
      </div>
      <button type="submit" name="submit">Sign Up Now!</button>
    </form>
</section>

<?php
  include_once 'footer.php';
?>
