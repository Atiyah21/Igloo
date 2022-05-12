<?php
require "config.php";
session_start();
usrLog();

if (isset($_POST["submit"])) {


  $chekUserExist = $conn->prepare("SELECT * FROM user WHERE email=:email");
  $chekUserExist->execute(array(':email' => $_POST["usrLogin"]));
  if ($chekUserExist->rowCount() == 0) {
      $password = password_hash($_POST["usrPwd"], PASSWORD_DEFAULT);
      $insertUserInDb = $conn->prepare("INSERT INTO user(email, password, name)VALUES(?, ?, ? )");
      $insertUserInDb->execute([$_POST["usrLogin"], $password, $_POST["usrPseudo"]]);
      $_SESSION['signed_up'] = true;
      header('Location: login.php');
	    exit;
  } else {
    echo "<style> .wrong{ display: unset !important; } .textbox{border: 2px solid #ff6b6b !important;} </style>";
  }
}
