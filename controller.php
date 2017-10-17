<?php
require_once './DataBaseAdaptor.php';
session_start ();

$_SESSION ['errorMessage'] = "";

// register and login
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
			header ( "Location: ./index.php?mode=login" );
		}
	}
}
?>