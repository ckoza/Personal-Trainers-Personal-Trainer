<?php
require_once './DataBaseAdaptor.php';
if (! isset ( $_SESSION )) {
	session_start ();
}
  $action = $_POST ['action'];

if ($action === 'updateGmail'){
  $user = $_SESSION['user'];
  $gmail = $_POST['gmail'];
  $myDatabaseFunctions->updateGmail($user,$gmail);
	header ( "Location: ./calender.php" );
}
// go to ClientMain
else if ($action === 'goToClientMain') {
	$_SESSION ['client_id'] = $_POST ['client_id'];
	header ( "Location: ./ClientMain.php" );
}// adding workouts
else if ($action === 'push') {
	$client_id = $_POST ['client_id'];
	$trainer_id = $myDatabaseFunctions->getTrainerId ( $_SESSION ['user'] ) ['trainer_id'];
	$date = $_POST ['workout_date'];
	$flat_bench = $_POST ['flat_bench'];
	$incline_bench = $_POST ['incline_bench'];
	$tri_ext = $_POST ['tri_ext'];
	$arnolds = $_POST ['arnolds'];

	$myDatabaseFunctions->addPushWorkout ( $client_id, $trainer_id, $date, $flat_bench, $incline_bench, $tri_ext, $arnolds );
} else if ($action === 'pull') {
	$client_id = $_POST ['client_id'];
	$trainer_id = $myDatabaseFunctions->getTrainerId ( $_SESSION ['user'] ) ['trainer_id'];
	$date = $_POST ['workout_date'];
	$dead_lift = $_POST ['dead_lift'];
	$bent_row = $_POST ['bent_row'];
	$barbell_curl = $_POST ['barbell_curl'];
	$lat = $_POST ['lat'];

	$myDatabaseFunctions->addPullWorkout ( $client_id, $trainer_id, $date, $dead_lift, $bent_row, $barbell_curl, $lat );
} else if ($action === 'leg') {
	$client_id = $_POST ['client_id'];
	$trainer_id = $myDatabaseFunctions->getTrainerId ( $_SESSION ['user'] ) ['trainer_id'];
	$date = $_POST ['workout_date'];
	$squat = $_POST ['squat'];
	$leg_press = $_POST ['leg_press'];
	$leg_ext = $_POST ['leg_ext'];
	$leg_curl = $_POST ['leg_curl'];

	$myDatabaseFunctions->addLegWorkout ( $client_id, $trainer_id, $date, $squat, $leg_press, $leg_ext, $leg_curl );
} // register and login
else if ($action === 'googleLogin') {
		$user = $_POST ['username'];
		$email = $_POST ['email'];
		$pwd = '';
		$_SESSION ['user'] = $user;
		$_SESSION ['email'] = $email;
		$_SESSION ['googleLogin'] = 'googleLogin';
		if ($myDatabaseFunctions->canRegisterTrainer ( $user )) {
			$myDatabaseFunctions->registerTrainer ( $user, $pwd, $email );
			$_SESSION ['login'] = true;
		} else {
			$_SESSION ['login'] = true;
		} // in this case it is already registered
	}
else if (isset ( $_POST ['username'] ) && isset ( $_POST ['password'] )) {
	$user = $_POST ['username'];
	$pwd = $_POST ['password'];
	if ($action === 'login') {
		if ($myDatabaseFunctions->isPasswordVerified ( $user, $pwd )) {
			$myDatabaseFunctions->login ( $user);
			header ( "Location: ./Main.php" );
		} else {
			$_SESSION ['errorMessage'] = "Invalid Account/Password";
			header ( "Location: ./Login.html" );
		}
	}

	if ($action === 'register') {
		$email = $_POST ['email'];
		if ($myDatabaseFunctions->canRegisterTrainer ( $user )) {
			$myDatabaseFunctions->registerTrainer ( $user, $pwd, $email );
			header ( "Location: ./Main.php" );
		} else {
			$_SESSION ['errorMessage'] = "Account already exists";
			header ( "Location: ./RegisterTrainer.php" );
		}
	}
}
// add client
else if ($action === 'addClient') {
	$trainer = $_SESSION ['user'];
	$getId = $myDatabaseFunctions->getTrainerId ( $trainer );
	$myDatabaseFunctions->addClient ( $getId ['trainer_id'], $_POST ['first_name'], $_POST ['last_name'], $_POST ['client_sex'], $_POST ['DOB'], $_POST ['client_weight'] );
	header ( "Location: ./Clients.php" );
}
// delete client
else if ($action === 'deleteClient') {
	$myDatabaseFunctions->deleteClient ($_POST ['client_id']);
	header ( "Location: ./Main.php" );
}
// logout
else if ($action === 'logout') {
	$myDatabaseFunctions->logout ();
	session_unset ();
	session_destroy ();

	header ( "Location: ./Login.html" );
}
?>
