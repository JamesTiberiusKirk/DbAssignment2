<?php

if (isset($_POST['signup-submit'])){
  $uname = $_POST['uname'];
  //$email =  $_POST['uemail'];
  $upass = $_POST['upass'];
  $upass_repeat = $_POST['repeatupass'];

  //Validation
  if(empty($uname) /*|| empty($email) */||  empty($upass) || empty($upass_repeat)){
    header('Location:/pages/public/signup.php?error=emptyFileds&uname='.$uname.'&uemail='.$email);
    exit();
  /* email validation
  } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location:/pages/public/signup.php?error=invalidEmail&uname='.$uname);
    exit();
  */
  } else if(!preg_match("/^[a-zA-Z0-9]*$/", $uname)){
    header('Location:/pages/public/signup.php?error=invalidUsername');
    exit();
  } else if($upass !== $upass_repeat){
    header('Location: /pages/public/signup.php?error=invalidUsername&uname='.$uname);
    exit();
  }
 
  require $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';
  //Checking for existing user
  $sql = 'SELECT `Username` FROM `Account` WHERE `Username`=?';
  $stmt = mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt, $sql)){
    header('Location: /pages/public/signup.php?error=sqlError&uname='.$uname);
    exit();   
  } else {
    mysqli_stmt_bind_param($stmt,'s',$uname);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultCheck = mysqli_stmt_num_rows($stmt);
    if($resultCheck>0){
      header('Location: /pages/public/signup.php?error=userTaken&uname='.$uname);
      exit();   
    } else {
      //Inserting into the database
      $sql = 'INSERT INTO `Account` (`Username`, `Password`) VALUES (?,?)';
      $stmt = mysqli_stmt_init($conn);

      if(!mysqli_stmt_prepare($stmt, $sql)){
        header('Location: /pages/public/signup.php?error=sqlError2&uname='.$uname);
        exit();   
      } else {
        $hashedpwd = password_hash($upass, PASSWORD_BCRYPT); //this uses bcrypt to hash it
        mysqli_stmt_bind_param($stmt,"ss",$uname,$hashedpwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        header('Location: /pages/public/signup.php?signup=success');
  	}
  }
}
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
	header('Location: /pages/public/signup.php?error=someError');
  exit();  
}
