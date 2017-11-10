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
		// add push workout
		public function addPushWorkout($client_id, $trainer_id, $date, $flat_bench, $incline_bench, $tri_ext, $arnolds) {
			$stmt = $this->DB->prepare ( "INSERT INTO pull (client_id, trainer_id, date, flat_bench, incline_bench, tricep_extension, arnolds) values(:client_id, :trainer_id, :date, :flat_bench, :incline_bench, :tri_ext, :arnolds)" );
			$stmt->bindParam ( 'client_id', $client_id );
			$stmt->bindParam ( 'trainer_id', $trainer_id );
			$stmt->bindParam ( 'date', $date );
			$stmt->bindParam ( 'flat_bench', $flat_bench );
			$stmt->bindParam ( 'incline_bench', $incline_bench );
			$stmt->bindParam ( 'tri_ext', $tri_ext );
			$stmt->bindParam ( 'arnolds', $arnolds );
			$stmt->execute ();
		}
		// add pull workout
		public function addPullWorkout($client_id, $trainer_id, $date, $dead_lift, $bent_row, $barbell_curl, $lat) {
			$stmt = $this->DB->prepare ( "INSERT INTO pull (client_id, trainer_id, date, dead_lift, bent_rows, barbell_curls, lat) values(:client_id, :trainer_id, :date, :dead_lift, :bent_row, :barbell_curl, :lat)" );
			$stmt->bindParam ( 'client_id', $client_id );
			$stmt->bindParam ( 'trainer_id', $trainer_id );
			$stmt->bindParam ( 'date', $date );
			$stmt->bindParam ( 'dead_lift', $dead_lift );
			$stmt->bindParam ( 'bent_row', $bent_row );
			$stmt->bindParam ( 'barbell_curl', $barbell_curl );
			$stmt->bindParam ( 'lat', $lat );
			$stmt->execute ();
		}
		// add leg workout
		public function addLegWorkout($client_id, $trainer_id, $date, $squat, $leg_press, $leg_ext, $leg_curl) {
			$stmt = $this->DB->prepare ( "INSERT INTO pull (client_id, trainer_id, date, squat, leg_press, leg_extension, leg_curl) values(:client_id, :trainer_id, :date, :squat, :leg_press, :leg_ext, :leg_curl)" );
			$stmt->bindParam ( 'client_id', $client_id );
			$stmt->bindParam ( 'trainer_id', $trainer_id );
			$stmt->bindParam ( 'date', $date );
			$stmt->bindParam ( 'flat_bench', $squat );
			$stmt->bindParam ( 'incline_bench', $leg_press );
			$stmt->bindParam ( 'tri_ext', $leg_ext );
			$stmt->bindParam ( 'arnolds', $leg_curl );
			$stmt->execute ();
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
      $lowercaseTrainer=$trainer;
			$stmt->bindParam ( 'trainer', $lowercaseTrainer );
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
    public function getClientsWorkout($workout,$id){
      if ($workout=='push')
        $stmt = $this->DB->prepare ( "SELECT * FROM push WHERE client_id=:id" );
      else if ($workout=='pull')
        $stmt = $this->DB->prepare ( "SELECT * FROM pull WHERE client_id=:id" );
      else
        $stmt = $this->DB->prepare ( "SELECT * FROM leg WHERE client_id=:id" );
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
				return false;
			} else {
				return true;
			}
		}
		// used to register a new trainer
		public function registerTrainer($user, $pwd, $email) {
			$hashed_pwd = password_hash ( $pwd, PASSWORD_DEFAULT );
			$stmt = $this->DB->prepare ( "INSERT INTO trainers (user_name, password, email) values(:user, :password, :email)" );
      $lowercaseUser=strtolower ( $user );
			$stmt->bindParam ( 'user', $lowercaseUser);
			$stmt->bindParam ( 'password', $hashed_pwd );
			$stmt->bindParam ( 'email', $email );
			$stmt->execute ();
		}
		// call before logging in. Checks if the password is correct.
		public function isPasswordVerified($user, $pwd) {
			$stmt = $this->DB->prepare ( "SELECT password FROM trainers WHERE user_name=:user" );
      $lowercaseUser=strtolower ( $user );
			$stmt->bindParam ( 'user',$lowercaseUser );
			$stmt->execute ();
			$hash = $stmt->fetch ();
			return password_verify ( $pwd, $hash [0] );
		}
	}

	$myDatabaseFunctions = new DatabaseAdaptor ();
	?>
