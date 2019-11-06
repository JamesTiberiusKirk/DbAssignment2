<?php

$options = [
  'salt' => 'aqwertyuiopasdfghjklzxc',
  'cost' => 12
];

if (isset($_POST['signup-submit'])){
  $uname = $_POST['uname'];
  $email =  $_POST['uemail'];
  $upass = $_POST['upass'];
  $upass_repeat = $_POST['repeatupass'];

  //Validation
  if(empty($uname) || empty($email) ||  empty($upass) || empty($upass_repeat)){
    header("Location: /pages/public/signup.php?error=emptyFileds&uname=".$uname."&uemail=".$email);
    exit();
  } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: /pages/public/signup.php?error=invalidEmail&uname=".$uname);
    exit();
  } else if(!preg_match("/^[a-zA-Z0-9]*$/", $uname)){
    header("Location: /pages/public/signup.php?error=invalidUsername&uemail=".$email);
    exit();
  } else if($upass !== $upass_repeat){
    header("Location: /pages/public/signup.php?error=invalidUsername"."&uname=".$uname."&uemail=".$email);
    exit();
  }
 
  require './db.inc.php';

  //Checking for existing user
  $sql = "SELECT uID FROM users WHERE uID=?";
  $stmt = mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: /pages/public/signup.php?error=sqlError"."&uname=".$uname."&uemail=".$email);
    exit();   
  } else {
    mysqli_stmt_bind_param($stmt,"s",$uname);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultCheck = mysqli_stmt_num_rows($stmt);
    if($resultCheck>0){
      header("Location: /pages/public/signup.php?error=userTaken"."&uname=".$uname."&uemail=".$email);
      exit();   
    } else {
      //Inserting into the database
      $sql = "INSERT INTO users (uname, email, upass) VALUES (?,?,?)";
      $stmt = mysqli_stmt_init($conn);

      if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: /pages/public/signup.php?error=sqlError"."&uname=".$uname."&uemail=".$email);
        exit();   
      } else {
        $hashedpwd = crypt($upass, '$2a$07$ewmfioffdasd$'); //this uses bcrypt to hash it
        mysqli_stmt_bind_param($stmt,"sss",$uname,$email,$hashedpwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        header("Location: /pages/public/signup.php?signup=success");
        exit();          
    	}
  	}
	}
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
	header("Location: /pages/public/signup.php?error=someError");
  exit();  
}
