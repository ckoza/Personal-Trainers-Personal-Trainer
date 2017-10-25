<?php
require_once './DataBaseAdaptor.php';
session_start ();

$_SESSION ['errorMessage'] = "";

// register and login
if (isset ( $_POST ['username']) && isset ( $_POST ['email'] ) ){
		$action = $_POST ['action'];
			if ($action ==='googleLogin'){
			$user = $_POST ['username'];
			$email = $_POST['email'];
			$pwd='';
			$_SESSION ['user'] = $user;
		 if ($myDatabaseFunctions->canRegisterTrainer($user)){
				$myDatabaseFunctions->registerTrainer($user, $pwd, $email);
				$_SESSION ['login'] = true;
			} else {
			$_SESSION ['login'] = true; //in this case it is already registered
		}
	}
}
if (isset ( $_POST ['username'] ) && isset ( $_POST ['password'] )) {
	$action = $_POST ['action'];
	$user = $_POST ['username'];
	$pwd = $_POST ['password'];

	if ($action === 'login') {
		assert ($myDatabaseFunctions->isPasswordVerified ( $user, $pwd ));
		if ($myDatabaseFunctions->isPasswordVerified ( $user, $pwd )) {
			$myDatabaseFunctions->login ();
			header ( "Location: ./index.php?mode=main" );
		} else {
			$_SESSION['errorMessage'] = "Invalid Account/Password";
			header ( "Location: ./index.php?mode=login" );
		}
	}


	if ($action === 'register'){
		$email = $_POST['email'];
		if ($myDatabaseFunctions->canRegisterTrainer($user,$email)){
			$myDatabaseFunctions->registerTrainer($user, $pwd, $email);
			header("Location: ./index.php?mode=main" );
		} else {
			$_SESSION['errorMessage'] = "Account already exists";
			header("Location: ./index.php?mode=register" );
		}
	}
}

// logout
else {
	if ($action === 'logout'){
		$myDatabaseFunctions->logout();
	}
	header ( "Location: ./index.php?mode=login" );
}
?>
