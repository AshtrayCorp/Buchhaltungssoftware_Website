<?php
  if(isset($_POST['submit'])) {

    include_once 'dbh.inc.php';

    $username =   mysqli_real_escape_string($conn, $_POST['username']);
    $firstname =  mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname =   mysqli_real_escape_string($conn, $_POST['lastname']);
    $email=       mysqli_real_escape_string($conn, $_POST['email']);
    $password =   mysqli_real_escape_string($conn, $_POST['password']);
    $pwdvalid =   mysqli_real_escape_string($conn, $_POST['pwdvalid']);

    //Check for empty fields
    if(empty($username) || empty($firstname) || empty($lastname) || empty($email) || empty($password)) {
      header("Location: ../signup.php?signup=empty");
      exit();
    } else {
      //Check if input chars are valid
      if(!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname) ) {
        header("Location: ../signup.php?signup=invalidchars");
        exit();
      } else {
        //Validate Email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          header("Location: ../signup.php?signup=invalidemail");
          exit();
        } else {
          //Check Username
          $sql = "SELECT * FROM users WHERE username='$username'";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);

          if($resultCheck > 0) {
            header("Location: ../signup.php?signup=usertaken");
            exit();
          } else {
            if($password !== $pwdvalid){
              header("Location: ../signup.php?signup=password");
              exit();
            } else {
              //Hash Password
              $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
              //Insert the user into the database
              $sqlinsert = "INSERT INTO users (username, firstname, lastname, email, password) VALUES ('$username', '$firstname', '$lastname', '$email', '$hashedpassword');";
              $result = mysqli_query($conn, $sqlinsert);
              header("Location: ../index.php?signup=success");
              exit();
            }
          }
          }
        }
      }
    } else {
    header("Location: ../signup.php");
    exit();
  }
?>
