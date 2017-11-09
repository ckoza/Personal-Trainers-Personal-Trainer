 <?php
	// to use methods, call: require_once './DataBaseAdaptor.php';
	// then call $myDatabaseFunctions->someFunction();
	class DatabaseAdaptor {
		private $DB;
		public function __construct() {
			$db = 'mysql:dbname=PTPA_DATABASE;host=ptpa.c2ihxd5ursch.us-west-1.rds.amazonaws.com:3306';
			$user = 'root';
			$password = '12345678';
			
			try {
				$this->DB = new PDO ( $db, $user, $password );
				$this->DB->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			} catch ( PDOException $e ) {
				echo ('Error establishing Connection');
				exit ();
			}
		}
		// adds a client to trainer_id's list
		public function addClient($id, $first, $last, $sex, $dob, $weight) {
			$stmt = $this->DB->prepare ( "INSERT INTO clients (belongs_to_id, first_name, last_name, sex, dob, weight) values(:id, :first, :last, :sex, :dob, :weight)" );
			$stmt->bindParam ( 'id', $id );
			$stmt->bindParam ( 'first', $first );
			$stmt->bindParam ( 'last', $last );
			$stmt->bindParam ( 'sex', $sex );
			$stmt->bindParam ( 'dob', $dob );
			$stmt->bindParam ( 'weight', $weight );
			$stmt->execute ();
		}
		public function getTrainerId($trainer) {
			$stmt = $this->DB->prepare ( "SELECT trainer_id FROM trainers WHERE user_name=:trainer" );
			$stmt->bindParam ( 'trainer', strtolower ( $trainer ) );
			$stmt->execute ();
			return $stmt->fetch ( PDO::FETCH_ASSOC );
		}
		
		// $trainer is the variable used in the belongs_to field for the client
		public function getClientsAsArray($id) {
			$stmt = $this->DB->prepare ( "SELECT * FROM clients WHERE belongs_to_id=:id" );
			$stmt->bindParam ( 'id', $id );
			$stmt->execute ();
			return $stmt->fetchAll ( PDO::FETCH_ASSOC );
		}
		// for login page
		public function login($user) {
			$_SESSION ['user'] = strtolower ( $user );
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
			$user = strtolower ( $user );
			$stmt = $this->DB->prepare ( "SELECT user_name FROM trainers" );
			$stmt->execute ();
			$userArray = $stmt->fetchAll ( PDO::FETCH_COLUMN );
			
			if (in_array ( $user, $userArray )) {
				$stmt = $this->DB->prepare ( "SELECT email FROM trainers WHERE user_name=:user" );
				$stmt->bindParam ( 'user', $user );
				$stmt->execute ();
				$emailArray = $stmt->fetch ();
				$_SESSION ['email'] = $emailArray [0];
				$_SESSION ['errorMessage'] = "Account already exists";
				echo $emailArray [0];
				$_SESSION ['passHere'] = "True";
				return false;
			} else {
				return true;
			}
		}
		// used to register a new trainer
		public function registerTrainer($user, $pwd, $email) {
			$hashed_pwd = password_hash ( $pwd, PASSWORD_DEFAULT );
			$stmt = $this->DB->prepare ( "INSERT INTO trainers (user_name, password, email) values(:user, :password, :email)" );
			$stmt->bindParam ( 'user', strtolower ( $user ) );
			$stmt->bindParam ( 'password', $hashed_pwd );
			$stmt->bindParam ( 'email', $email );
			$stmt->execute ();
		}
		// call before logging in. Checks if the password is correct.
		public function isPasswordVerified($user, $pwd) {
			$stmt = $this->DB->prepare ( "SELECT password FROM trainers WHERE user_name=:user" );
			$stmt->bindParam ( 'user', strtolower ( $user ) );
			$stmt->execute ();
			$hash = $stmt->fetch ();
			return password_verify ( $pwd, $hash [0] );
		}
	}
	
	$myDatabaseFunctions = new DatabaseAdaptor ();
	?>
