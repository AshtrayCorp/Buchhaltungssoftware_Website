
<?php
session_start();

  if(isset($_POST['submit'])) {
    include 'dbh.inc.php';

    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //Error handlers
    //Check if Empty
    if(empty($uid) || empty($password)) {
      header("Location: ../index.php?login=empty");
      exit();
    } else {
      $sql = "SELECT * FROM users WHERE username = '$uid' OR email = '$uid'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);

      if($resultCheck < 1) {
        //Check if user is valid
        header("Location: ../index.php?login=error1");
        exit();
      } else {
        if($row = mysqli_fetch_assoc($result)) {
          //Dehashing Password and Check if valid
          $hashedpwdcheck = password_verify($password, $row['password']);
          if($hashedpwdcheck == false) {
            header("Location: ../index.php?login=error2");
            exit();
          } elseif($hashedpwdcheck == true) {
            //Log in the Username
            $_SESSION['username'] = $row['username'];
            header("Location: ../index.php?login=success");
            exit();

          }
        }
      }
    }
  } else {
    header("Location: ../index.php?login=error");
    exit();
  }
?>
