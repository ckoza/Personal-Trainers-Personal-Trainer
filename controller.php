<?php
require_once './DataBaseAdaptor.php';
if (!isset($_SESSION)) {
session_start();
}
		$action = $_POST ['action'];

// register and login
 if (isset ( $_POST ['username']) && isset ( $_POST ['email'] )  && ($action==='googleLogin') ){
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
			$_SESSION ['login'] = true;
		} //in this case it is already registered
	}
}
else if (isset ( $_POST ['username'] ) && isset ( $_POST ['password'] )) {
	$action = $_POST ['action'];
	$user = $_POST ['username'];
	$pwd = $_POST ['password'];

	if ($action === 'login') {
		if ($myDatabaseFunctions->isPasswordVerified ( $user, $pwd )) {
			$myDatabaseFunctions->login ($user);
				$_SESSION ['login'] = true;
			header ( "Location: ./Main.php" );
		} else {
			$_SESSION['errorMessage'] = "Invalid Account/Password";
			header ( "Location: ./index.php?mode=login" );
		}
	}

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

	if ((int)$month == 2 && (int)$day > 28)
		$day = '28';
	if (((int)$month == 4 || (int)$month == 6 || (int)$month == 9 || (int)$month == 11) && (int)$day > 30)
		$day = '30';

	$dob = $year . '-' . $month . '-' . $day;
	$trainer=$_SESSION['user'];
	$getId = $myDatabaseFunctions->getTrainerId($trainer);
	$myDatabaseFunctions->addClient($getId['trainer_id'],$_POST['first_name'], $_POST['last_name'], $_POST['client_sex'], $dob, $_POST['client_weight']);
	header("Location: ./Clients.php" );
}

// logout
else {
	if ($action === 'logout'){
		$myDatabaseFunctions->logout();
	}
	header ( "Location: ./Login.html" );
}
?>
