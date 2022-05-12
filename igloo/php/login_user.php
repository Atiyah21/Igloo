<?php
require "config.php";
session_start();
usrLog();

if(isset($_SESSION['signed_up'])){
	echo "<style> .validate{display: unset!important;}</style>";
	unset($_SESSION['signed_up']);
}

if (isset($_POST["submit"])) {
	$query = $conn->prepare("SELECT * FROM user WHERE email=:email");
	$query->execute(array(':email' => $_POST["usrLogin"]));
	$user = $query->fetch();
	if ($user && password_verify($_POST['usrPwd'], $user['password'])) {
		session_start();
		$_SESSION['usrID'] = $user['usrID'];
		usrLog();
	} else {
		echo "<style> .wrong{display: unset!important;} .textbox{border: 2px solid #ff6b6b !important;} </style>";
	}
}