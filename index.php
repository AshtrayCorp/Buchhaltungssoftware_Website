<!DOCTYPE html>
<html>

<head>
  <title>Homepage</title>
  <link rel="stylesheet" type="text/css" href="/buchhaltungssoftware_website/stylesheets/homepage.css">
</head>

<?php //Einfügen des Headers der Website
 include_once 'header.php';
?>

<section class="main-container">
  <?php
  if(isset($_SESSION['username'])){
    echo 'Hello ';
    echo $_SESSION['username'];
  } else {
    echo '<h2>Welcome to ATCs Accounting Software</h2>
            <div class="welcomepagecontent">
              <p1>
                This software is used to keep track of your personal finances.<br>
                When you sign up an account you will be able to log every transaction<br>
                of yours with a simple form that allows cassification of the transaction<br>
                and also where the money is taken from.<br>
                You are able to define the different transaction classes and accounts or<br>
                cash deposits yourself to ensure individuality and optimal personal use.<br><br>
              </p1>
              <p2>
                Later on you can visualize your cashflow with simple diagrams to keep an<br>
                overview of your cashflow. How you can use this information for your own<br>
                profit depends on the user.
              </p2>
            </div>';
  }
   ?>
</section>
<?php
  include_once 'footer.php';
?>
