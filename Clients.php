<!DOCTYPE html>
<html>
<head>
<script>
// for (var key in localStorage){   -------what is this for?
//    console.log(key)
// }
</script>
<meta charset="UTF-8">
<link href="style.css" type="text/css" rel="stylesheet" >
<title>Clients Page</title>
<base target="_parent">
</head>

<body>
<?php
	session_start();
	if (!isset($_SESSION['login']) || !$_SESSION['login']) {
		header ( "Location: ./Login.html" );
		die;
	}
  else {
    require_once ("./DataBaseAdaptor.php");
    $user = $_SESSION ['user'];
    $getId = $myDatabaseFunctions->getTrainerId($user);
    $clientArray= $myDatabaseFunctions->getClientsAsArray($getId['trainer_id']);
  }
?>

<div>
<table id="clients">
<tr>
<th>First Name &nbsp;&nbsp;</th>
<th>Last Name &nbsp;&nbsp;</th>
<th>Sex &nbsp;</th>
<th>Age &nbsp;</th>
<th>Weight &nbsp;</th>
<th>View Client &nbsp;</th>
<th>Update Measurements &nbsp;</th>
<th>Delete Client</th>
</tr>
</table>

<script>
    function getAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
    }
  var data = <?php echo json_encode($clientArray); ?>;
	var ds = 0;
	var s = data.length;
	//console.log(s);
	var table = document.getElementById("clients");
	for(var i = 0; i < s; i++){
		var row = table.insertRow(i+1);
		row.id = "Row"+i;
		var call = row.id;
		var cell0 = row.insertCell(0);
		cell0.id=i+"_Cell0";
		var cell1 = row.insertCell(1);
		cell1.id=i+"_Cell1";
		var cell2 = row.insertCell(2);
		cell2.id=i+"_Cell2";
		var cell3 = row.insertCell(3);
		cell3.id=i+"_Cell3";
		var cell4 = row.insertCell(4);
		cell4.id=i+"_Cell4";
		var cell5 = row.insertCell(5);
		cell5.id="B_Row"+i;
		var cell6 = row.insertCell(6);
		cell6.id="B_Row"+i;
		var cell7 = row.insertCell(7);
		cell7.id="B_Row"+i;

		cell0.innerHTML = data[ds].first_name;
		cell1.innerHTML = data[ds].last_name;
		cell2.innerHTML = data[ds].sex;
		cell3.innerHTML = getAge(data[ds].dob);
		cell4.innerHTML = data[ds].weight;

		var viewButton = '<form action="controller.php" method="post">' +
		'<input type="hidden" name="client_id" value="' + data[ds].client_id + '">' +
		'<input type="hidden" name="action" value="goToClientMain">' +
		'<button type="submit" name="submit" value="ClientMain">View</button>' +
		'</form>';
		var measurementsButton = '<form action="controller.php" method="post">' +
		'<input type="hidden" name="client_id" value="' + data[ds].client_id + '">' +
		'<input type="hidden" name="action" value="goToMeasurements">' +
		'<button type="submit" name="submit" value="goToMeasurements">Update</button>' +
		'</form>';
		var deleteButton = '<form action="controller.php" method="post">' +
		'<input type="hidden" name="client_id" value="' + data[ds].client_id + '">' +
		'<input type="hidden" name="action" value="deleteClient">' +
		'<button type="submit" name="submit" value="deleteClient">Delete</button>' +
		'</form>';

		cell5.innerHTML = viewButton;
		cell6.innerHTML = measurementsButton;
		cell7.innerHTML = deleteButton;

		ds++;
	}

</script>
</div>

</body>
</html>
