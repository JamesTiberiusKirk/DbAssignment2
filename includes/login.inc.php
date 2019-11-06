<?php

if(isset($_POST['login-submit'])){
  require $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';
  $uname = $_POST['uname'];
  $upass = $_POST['upass'];

  //input validation
  if(empty($uname) || empty ($upass)){
    header('Location:  /pages/public/login.php?error=emptyCreds');
    exit();
  } else {
    $sql = 'SELECT * FROM users WHERE uname=?';
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
      header('Location:  /pages/public/login.php?error=sqlError');
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, 's', $uname);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      $row = mysqli_fetch_assoc($result);
      if($row){
        
        $hashedpwd = $row['upass'];

        if (!password_verify($upass, $hashedpwd)){
          header('Location: ../pages/public/login.php?error=WrongPass&uname='.$pcheck);
          exit();
        } else {
          session_start();
          $_SESSION['uID'] = $row['uID'];
          $_SESSION['uname'] = $row['uname']; 

          header('Location:  /pages/members/welcome.php?login=success');
          exit();
        }
      } else {
        header('Location:  /pages/public/login.php??error=NoSuchUser');
        exit();
      }
    }
  }
} else {
  header('Location:  /index.php');
  exit();
}
