<?php
$svr = "127.0.0.1";
$usr = "root";
$pwd = "";
$db = "Igloo";

try {
  $conn = new PDO('mysql:host='.$svr.';dbname='.$db, $usr, $pwd);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Could not connect to the database $db :" . $e->getMessage();
}

function fetchDB($test){
  global $conn;
  $query = $conn->prepare("SELECT * FROM user WHERE usrID=:usrID");
  $query->execute(array(':usrID' => $_SESSION['usrID']));
  $user = $query->fetch();
  return $user[$test];
}

function usrNotLog(){
  if (!isset($_SESSION['usrID'])) {
  	header('Location: /igloo/php/login.php');
	  exit;
  }
}

function usrLog(){
  if (isset($_SESSION['usrID'])) {
  	header('Location: /igloo/php/accueil.php');
	  exit;
  }
}

function isAdmin(){
  if(is_null(fetchDB('grpID'))){
    $admin = false;
  }else{
    $admin = true;
  }
  return $admin;
}