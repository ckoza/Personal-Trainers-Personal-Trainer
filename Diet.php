<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>

<style>
label {
  display: block;
  box-shadow: 0.1em 0.1em 0.2em #888;
  margin: 1em;
  border-radius: 1ex;
  padding: 1ex 1em;
  width: 300px;
  background: white;
}

input[type=number] {
  text-align: right;
  border: none;
}
input {
  float: right;
}
span {
  font-weight: bold;
}
</style>

<body>

<?php
	session_start();
	if (!isset($_SESSION['login']) || !$_SESSION['login']) {
		header ( "Location: ./Login.html" );
		die;
	}
?>

<h1>Caloric Intake Calculator</h1>

<div style="width: 400px">
<label><b>Female:</b>
  <input id="female" type="radio" name="gender" onchange="calsPerDay()">
</label>
<label><b>Male:</b>
  <input id="male" type="radio" name="gender" onchange="calsPerDay()" checked>
</label>
<label><b>Age:</b>
  <input id="age" type="number" oninput="calsPerDay()" value="20">
</label>
<label><b>Height:</b>
  <input id="height" type="number" oninput="calsPerDay()" value="70">
<br>
4' = 48" //
5' = 60" //
6' = 72" 
</label>
<label><b>Weight:</b>
  <input id="weight" type="number" oninput="calsPerDay()" value="160">
  (lbs)
</label>
<label>
  Base metabolic rate: <span id="totalCals"></span> kcal per day
</label>

<label>
  <b>Level of activity:</b> <br>
  <select id="activity" onchange="calsPerDay()">
  <option value=1.2>little or no exercise</option>
  <option value=1.375>light exercise 1-3 days/week</option>
  <option value=1.55>moderate exercise 3-5 days/week</option>
  <option value=1.725>hard exercise 6-7 days a week</option>
  <option value=1.9>very hard exercise + physical job or training</option>
</select>
</label>

<label>
Caloric intake needed to maintain weight... <br>
<span id="calories"></span> calories
</label>

</div>

</body>

<script>

function calsPerDay() {
	  function find(id) { return document.getElementById(id) }

	  var age = find("age").value;
	  var height = find("height").value;
	  var weight = find("weight").value;
	  var result = 0
	  if (find("female").checked) {
	    result = 655 + (4.35 * weight) + (4.7 * height) - (4.7 * age);
	  }
	  else if (find("male").checked){
	    result = 66 + (6.23 * weight) + (12.7 * height) - (6.8 * age);
	  }
	  find("totalCals").innerHTML = Math.round( result )
	  
	  var active = find("activity").value;
	  
	  var cals = result * active;
	  find("calories").innerHTML = Math.round( cals );
	  
	}
	calsPerDay()
</script>
</html>