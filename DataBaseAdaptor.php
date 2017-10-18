 <?php

	// to use methods, call: require_once './DataBaseAdaptor.php';
	// then call $myDatabaseFunctions->someFunction();
	class DatabaseAdaptor {
		private $DB;
		public function __construct() {
			$db = 'mysql:dbname=PTPA_DATABASE;host=127.0.0.1';
			$user = 'root';
			$password = '';

			try {
				$this->DB = new PDO ( $db, $user, $password );
				$this->DB->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			} catch ( PDOException $e ) {
				echo ('Error establishing Connection');
				exit ();
			}
		}
		// $trainer is the variable used in the belongs_to field for the client
		public function getClientsAsArray($trainer) {
			$stmt = $this->DB->prepare ( "SELECT * FROM clients WHERE belongs_to=:trainer" );
			$stmt->bindParam ( 'trainer', $trainer );
			$stmt->execute ();
			return $stmt->fetchAll ( PDO::FETCH_ASSOC );
		}
		// for login page
		public function login() {
			$_SESSION ['user'] = $user;
			$_SESSION ['login'] = true;
		}
		// for login page
		public function logout() {
			$_SESSION ['user'] = '';
			$_SESSION ['login'] = false;
		}
		// used to see if trainer username already exists.
		// If the trainer username already exists return false
		public function canRegisterTrainer($user) {
			$stmt = $this->DB->prepare ( "SELECT user_name FROM trainers" );
			$stmt->execute ();
			$userArray = $stmt->fetchAll ( PDO::FETCH_COLUMN );
			foreach ( $userArray as $user_name ) {
				if (in_array ( $user, $userArray ))
					return false;
			}
			return true;
		}
		// used to register a new trainer
		public function registerTrainer($user, $pwd, $email) {
			$hashed_pwd = password_hash ( $pwd, PASSWORD_DEFAULT );
			$stmt = $this->DB->prepare ( "INSERT INTO trainers (user_name, password, email) values(:user, :password, :email)" );
			$stmt->bindParam ( 'user', $user );
			$stmt->bindParam ( 'password', $hashed_pwd );
			$stmt->bindParam ( 'email', $email );
			$stmt->execute ();
		}
		// call before logging in. Checks if the password is correct.
		public function isPasswordVerified($user, $pwd) {
			$stmt = $this->DB->prepare ( "SELECT password FROM trainers WHERE user_name=:user" );
			$stmt->bindParam ( 'user', $user );
			$stmt->execute ();
			$hash = $stmt->fetch ();
			return password_verify ( $pwd, $hash [0] );
		}
	}

	$myDatabaseFunctions = new DatabaseAdaptor ();
	?>
