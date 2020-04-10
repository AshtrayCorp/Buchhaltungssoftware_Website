<?php
  session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="/buchhaltungssoftware_website/stylesheets/headerstyle.css">
</head>
<body>

<header>
<nav>
  <div class="main-wrapper">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php">Transactions</a></li>
        <li><a href="index.php">Accountmanager</a></li>
      </ul>
      <div class="nav-login">
        <?php
          if(isset($_SESSION['username'])){
            echo '<form action="/buchhaltungssoftware_website/includes/logout.inc.php" method="post">
                    <button type="submit" name="submit">Logout</button>
                  </form>';
          } else {
            echo '<form action="/buchhaltungssoftware_website/includes/login.inc.php" method="post">
                    <div class="login-inputs">
                      <input type="text" name="uid" placeholder="Username/Email">
                      <input type="password" name="password" placeholder="Password">
                    </div>
                    <button type="submit" name="submit">Login</button>
                  </form>
                  <a href="/buchhaltungssoftware_website/signup.php">Sign Up</a>';
          }
        ?>
      </div>
    </div>
  </nav>
  </header>
