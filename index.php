<?php //Einfügen des Headers der Website
 include_once 'header.php';
?>

<section class="main-container">
  <?php
  if(isset($_SESSION['username'])){
    echo $_SESSION['username'];
    echo "hello!";
  }
   ?>
</section>

<?php
  include_once 'footer.php';
?>
