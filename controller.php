<?php
require_once './DataBaseAdaptor.php';
session_start ();
		$action = $_POST ['action'];
$_SESSION ['errorMessage'] = "";
// echo "what the !";
// register and login
if (isset ( $_POST ['username']) && isset ( $_POST ['email'] ) && ($action==='googleLogin')){
		$action = $_POST ['action'];
			if ($action ==='googleLogin'){
			$user = $_POST ['username'];
			$pwd='';
			$_SESSION ['user'] = $user;
		 if ($myDatabaseFunctions->canRegisterTrainer($user)){
				$myDatabaseFunctions->registerTrainer($user, $pwd, $email);
				$_SESSION ['login'] = true;
		}
		else {
			$_SESSION ['login'] = false;
		} //in this case it is already registered
	}
}
else if (isset ( $_POST ['username'] ) && isset ( $_POST ['password'] )) {
	$action = $_POST ['action'];
	$user = $_POST ['username'];
	$pwd = $_POST ['password'];

	if ($action === 'login') {
		assert ($myDatabaseFunctions->isPasswordVerified ( $user, $pwd ));
		if ($myDatabaseFunctions->isPasswordVerified ( $user, $pwd )) {
			$myDatabaseFunctions->login ();
			header ( "Location: ./Main.php" );
		} else {
			$_SESSION['errorMessage'] = "Invalid Account/Password";
			header ( "Location: ./Login.html" );
		}
	}

// echo $action;

	if ($action === 'register'){
		$email = $_POST['email'];
		if ($myDatabaseFunctions->canRegisterTrainer($user)){
			$myDatabaseFunctions->registerTrainer($user, $pwd, $email);
			header("Location: ./Main.php" );
		} else {
			$_SESSION['errorMessage'] = "Account already exists";
			header("Location: ./RegisterTrainer.php" );
		}
	}
}

// add client
else if (isset($_POST['first_name'])) {
	$month = $_POST['DOBMonth'];
	$day = $_POST['DOBDay'];
	$year = $_POST['DOBYear'];
	$dob = $year . '-' . $month . '-' . $day;	
	$myDatabaseFunctions->addClient($_POST['first_name'], $_POST['last_name'], $_POST['client_sex'], $dob, $_POST['client_weight']);
	header("Location: ./Main.php" );
}

// logout
else {
	if ($action === 'logout'){
		$myDatabaseFunctions->logout();
	}
	header ( "Location: ./Login.html" );
}
?>
