<!DOCTYPE html>
<html>
<head>
<style>
/* Style the tab */
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>

<script>
var push = [
            {
                "date": "2017/10/01",
            	"FlatBench": 95,
            	"InclineBench": 55,
            	"tricep_extention": 50,
            	"arnolds": 35
            },
            {
            	"date": "2017/10/08",
            	"FlatBench": 105,
            	"InclineBench": 55,
            	"tricep_extention": 55,
            	"arnolds": 40
            },
            {
            	"date": "2017/10/15",
            	"FlatBench": 105,
            	"InclineBench": 60,
            	"tricep_extention": 60,
            	"arnolds": 42.5
            },
            {
            	"date": "2017/10/22",
            	"FlatBench": 115,
            	"InclineBench": 65,
            	"tricep_extention": 70,
            	"arnolds": 45
            },
            {
            	"date": "2017/10/29",
            	"FlatBench": 135,
            	"InclineBench": 70,
            	"tricep_extention": 65,
            	"arnolds": 55
            }
            ];

var pull = [
            {
                "date": "2017/10/03",
                "dead_lift": 135,
                "bent_rows": 35,
                "barbell_curls": 40,
                "lat": 40
            },
            {
            	"date": "2017/10/10",
            	"dead_lift": 145,
                "bent_rows": 40,
                "barbell_curls": 45,
                "lat": 50
            },
            {
            	"date": "2017/10/17",
            	"dead_lift": 155,
                "bent_rows": 45,
                "barbell_curls": 45,
                "lat": 60
            },
            {
            	"date": "2017/10/24",
            	"dead_lift": 160,
                "bent_rows": 45,
                "barbell_curls": 45,
                "lat": 65
            },
            {
            	"date": "2017/10/31",
            	"dead_lift": 165,
                "bent_rows": 55,
                "barbell_curls": 60,
                "lat": 70
            }
            ];

var leg = [
            {
                "date": "2017/10/05",
                "squat": 135,
                "leg_press": 155,
                "leg_extension": 50,
                "leg_curl": 25

            },
            {
            	"date": "2017/10/12",
            	"squat": 145,
                "leg_press": 165,
                "leg_extension": 60,
                "leg_curl": 30
            },
            {
            	"date": "2017/10/19",
            	"squat": 145,
                "leg_press": 175,
                "leg_extension": 55,
                "leg_curl": 35
            },
            {
            	"date": "2017/10/26",
            	"squat": 155,
                "leg_press": 190,
                "leg_extension": 60,
                "leg_curl": 45
            },
            {
            	"date": "2017/11/02",
            	"squat": 165,
                "leg_press": 200,
                "leg_extension": 85,
                "leg_curl": 55
            }
            ];
</script>
<meta charset="UTF-8">
<link href="style.css" type="text/css" rel="stylesheet" >
<title>Insert title here</title>
</head>
<body onload="openCity(event, 'Push_Day')">
<?php
	session_start();
	if (!isset($_SESSION['login']) || !$_SESSION['login']) {
		header ( "Location: ./Login.html" );
		die;
	}
  else {
    require_once ("./DataBaseAdaptor.php");
    $pushArray = $myDatabaseFunctions->getClientsWorkout('push',$_GET['client_id']);
    $pullArray = $myDatabaseFunctions->getClientsWorkout('pull',$_GET['client_id']);
    $legArray = $myDatabaseFunctions->getClientsWorkout('leg',$_GET['client_id']);
  }
?>

<div style="max-width: 900px">


<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Push_Day')">Push Day</button>
  <button class="tablinks" onclick="openCity(event, 'Pull_Day')">Pull Day</button>
  <button class="tablinks" onclick="openCity(event, 'Leg_Day')">Leg Day</button>
</div>

<div id="Push_Day" class="tabcontent" style="display:block;">
  <h3>Push Day</h3>
<table id="PushTable">
<tr>
<th>&nbsp;&nbsp; date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>Flat Bench<br>(3x10) &nbsp;&nbsp;&nbsp;</th>
<th>Incline Bench<br> (2x10) &nbsp;&nbsp;&nbsp; </th>
<th>Tricep Extension<br> (3x10) &nbsp;&nbsp; </th>
<th>Arnold Press<br> (3x10) &nbsp;&nbsp; </th>
</tr>
</table>
<script>
</script>

</div>

<div id="Pull_Day" class="tabcontent">
  <h3>Pull Day</h3>
  <table id="PullTable">
<tr>
<th>&nbsp;&nbsp; date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>dead_lift<br> (3x6) &nbsp;&nbsp;&nbsp;</th>
<th>Bent Row<br> (2x10) &nbsp;&nbsp;&nbsp; </th>
<th>Barbell Curl<br> (2x15) &nbsp;&nbsp; </th>
<th>lat Pull Down<br> (3x10) &nbsp;&nbsp; </th>
</tr>
</table>
</div>

<div id="Leg_Day" class="tabcontent">
  <h3>Leg Day</h3>
  <table id="LegTable" >
<tr>
<th>&nbsp;&nbsp; date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>squat<br>(2x10)</th>
<th>Leg Press<br> (3x8) &nbsp;&nbsp;&nbsp; </th>
<th>Leg Extentions<br> (2x15) &nbsp;&nbsp; </th>
<th>Leg Curls<br> (2x12) &nbsp;&nbsp; </th>
</tr>
</table>
</div>

</div>

<script>
var push = <?php echo json_encode($pushArray); ?>;
var pull = <?php echo json_encode($pullArray); ?>;
var leg = <?php echo json_encode($legArray); ?>;
var theDay = "Push_Day";
var chartData;
var chart;

function openCity(evt, whatDay) {
	theDay=whatDay;

//-----------------------------------------------------------------------
chartData = generateChartData();

 chart = AmCharts.makeChart("chartdiv", {
    "type": "serial",
    "theme": "light",
    "legend": {
        "useGraphSettings": true
    },
    "dataProvider": chartData,
    "synchronizeGrid":true,
    "valueAxes": [{
        "id":"v1",
        "axisColor": "#FF6600",
        "axisThickness": 2,
        "axisAlpha": 1,
        "position": "left"
    }, {
        "id":"v2",
        "axisColor": "#FCD202",
        "axisThickness": 2,
        "axisAlpha": 1,
        "position": "right"
    }, {
        "id":"v3",
        "axisColor": "#B0DE09",
        "axisThickness": 2,
        "offset": 50,
        "axisAlpha": 1,
        "position": "right"
    }, {
        "id":"v4",
        "axisColor": "#000000",
        "axisThickness": 2,
        "gridAlpha": 0,
        "offset": 50,
        "axisAlpha": 1,
        "position": "left"
    }],
    "graphs": [{
        "valueAxis": "v1",
        "lineColor": "#FF6600",
        "bullet": "round",
        "bulletBorderThickness": 1,
        "hideBulletsCount": 30,
        "title": "Flat Bench",
        "valueField": "one",
		"fillAlphas": 0
    }, {
        "valueAxis": "v2",
        "lineColor": "#FCD202",
        "bullet": "round",
        "bulletBorderThickness": 1,
        "hideBulletsCount": 30,
        "title": "Incline Bench",
        "valueField": "two",
		"fillAlphas": 0
    }, {
        "valueAxis": "v3",
        "lineColor": "#B0DE09",
        "bullet": "triangleDown",
        "bulletBorderThickness": 1,
        "hideBulletsCount": 30,
        "title": "Tricep Extension",
        "valueField": "three",
		"fillAlphas": 0
    } , {
        "valueAxis": "v4",
        "lineColor": "#000000",
        "bullet": "triangleUp",
        "bulletBorderThickness": 1,
        "hideBulletsCount": 30,
        "title": "Arnold Press",
        "valueField": "four",
		"fillAlphas": 0
    }],
    "chartScrollbar": {},
    "chartCursor": {
        "cursorPosition": "mouse"
    },
    "categoryField": "date",
    "categoryAxis": {
        "parsedates": true,
        "axisColor": "#DADADA",
        "minorGridEnabled": true
    }
});

chart.addListener("dataUpdated", zoomChart);
zoomChart();
//-----------------------------------------------------------------------

	fillTable(whatDay);
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(whatDay).style.display = "block";
    evt.currentTarget.className += " active";
}



function fillTable(ID){
	//console.log("Log: " + ID);
	stuff = document.getElementById(ID);
	 var ds = 0;
	 var tableID;
	 switch(ID){
	 case "Push_Day":
		 var s = push.length;
		 tableID ="PushTable";
		 var reset = `
			 <table id="PushTable">
			 <tr>
			 <th>&nbsp;&nbsp; date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			 <th>Flat Bench<br>(3x10) &nbsp;&nbsp;&nbsp;</th>
			 <th>Incline Bench<br> (2x10) &nbsp;&nbsp;&nbsp; </th>
			 <th>Tricep Extension<br> (3x10) &nbsp;&nbsp; </th>
			 <th>Arnold Press<br> (3x10) &nbsp;&nbsp; </th>
			 </tr>
			 </table>
			 `;
		 break;
	 case "Pull_Day":
		 var s = pull.length;
		 tableID ="PullTable";
		 var reset = `
			 <table id="PullTable">
			 <tr>
			 <th>&nbsp;&nbsp; date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			 <th>dead_lift<br> (3x6) &nbsp;&nbsp;&nbsp;</th>
			 <th>Bent Row<br> (2x10) &nbsp;&nbsp;&nbsp; </th>
			 <th>Barbell Curl<br> (2x15) &nbsp;&nbsp; </th>
			 <th>lat Pull Down<br> (3x10) &nbsp;&nbsp; </th>
			 </tr>
			 </table>
			 `;
		 break;
	 case "Leg_Day":
		 var s = leg.length;
		 tableID ="LegTable";
		 var reset = `
			 <table id="LegTable" >
			 <tr>
			 <th>&nbsp;&nbsp; date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			 <th>squat<br> (2x10) &nbsp;&nbsp;&nbsp;</th>
			 <th>Leg Press<br> (3x8) &nbsp;&nbsp;&nbsp; </th>
			 <th>Leg Extentions<br> (2x15) &nbsp;&nbsp; </th>
			 <th>Leg Curls<br> (2x12) &nbsp;&nbsp; </th>
			 </tr>
			 </table>
			 `;
		 break;
	 default:
		 break;
	 }
		stuff.innerHTML=reset;

		var table = document.getElementById(tableID);
		for(var i = 0; i < s; i++){

			var row = table.insertRow(i+1);
			row.id = "Row"+i;

			var call = row.id;

			var cell0 = row.insertCell(0);
			var cell1 = row.insertCell(1);
			var cell2 = row.insertCell(2);
			var cell3 = row.insertCell(3);
			var cell4 = row.insertCell(4);

			 switch(ID){
			 case "Push_Day":
				 cell0.innerHTML = push[ds].date;
				 cell1.innerHTML = push[ds].flat_bench;
				 cell2.innerHTML = push[ds].incline_bench;
				 cell3.innerHTML = push[ds].tricep_extention;
				 cell4.innerHTML = push[ds].arnolds;
				 break;
			 case "Pull_Day":
				 cell0.innerHTML = pull[ds].date;
				 cell1.innerHTML = pull[ds].dead_lift;
				 cell2.innerHTML = pull[ds].bent_rows;
				 cell3.innerHTML = pull[ds].barbell_curls;
				 cell4.innerHTML = pull[ds].lat;
				 break;
			 case "Leg_Day":
				 cell0.innerHTML = leg[ds].date;
				 cell1.innerHTML = leg[ds].squat;
				 cell2.innerHTML = leg[ds].leg_press;
				 cell3.innerHTML = leg[ds].leg_extension;
				 cell4.innerHTML = leg[ds].leg_curl;
				 break;
			 default:
				 break;
			 }

		//	cell0.innerHTML = data[ds].date;
		//	cell1.innerHTML = data[ds].Bench;
		//	cell2.innerHTML = data[ds].squat;
		//	cell3.innerHTML = data[ds].lat;

			ds++;
		}
		var next;
		next = getNextWorkout(ID);

		var row = table.insertRow(s+1);
    	var cell0 = row.insertCell(0);
    	var cell1 = row.insertCell(1);
    	var cell2 = row.insertCell(2);
    	var cell3 = row.insertCell(3);
    	var cell4 = row.insertCell(4);

    	cell0.innerHTML = next[0];
    	cell1.innerHTML = next[1];
    	cell2.innerHTML = next[2];
    	cell3.innerHTML = next[3];
    	cell4.innerHTML = next[4];
}
</script>

<script>
function getNextWorkout(day){
	var toRet = ["Next", 0,0,0,0];

	switch(day){
	 case "Push_Day":
		 var len = push.length ;
		 toRet[0] = "Next Up";
     console.log(push[len-1].flat_bench);
     console.log(push[0].flat_bench);
     console.log(len);
		 toRet[1] = round5(parseInt(push[len-1].flat_bench) + parseInt((push[len-1].flat_bench - push[0].flat_bench) / len));
      console.log(push[len-1].flat_bench + (push[len-1].flat_bench - push[0].flat_bench) / len);
      console.log(toRet[1]);
		 toRet[2] = round5(parseInt(push[len-1].incline_bench) + parseInt((push[len-1].incline_bench - push[0].incline_bench) / len));
		 toRet[3] = round5(parseInt(push[len-1].tricep_extention) + parseInt((push[len-1].tricep_extention - push[0].tricep_extention) / len));
		 toRet[4] = round5(parseInt(push[len-1].arnolds) + parseInt((push[len-1].arnolds - push[0].arnolds) / len));
		 break;
	 case "Pull_Day":
		 var len = pull.length ;
		 toRet[0] = "Next Up";
		 toRet[1] = round5(parseInt(pull[len-1].dead_lift) + parseInt((pull[len-1].dead_lift - pull[0].dead_lift) / len));
		 toRet[2] = round5(parseInt(pull[len-1].bent_rows) + parseInt((pull[len-1].bent_rows - pull[0].bent_rows) / len));
		 toRet[3] = round5(parseInt(pull[len-1].barbell_curls) + parseInt((pull[len-1].barbell_curls - pull[0].barbell_curls) / len));
		 toRet[4] = round5(parseInt(pull[len-1].lat) + parseInt((pull[len-1].lat - pull[0].lat) / len));
		 break;
	 case "Leg_Day":
		 var len = leg.length ;
		 toRet[0] = "Next Up";
		 toRet[1] = round5(parseInt(leg[len-1].squat) + parseInt((leg[len-1].squat - leg[0].squat) / len));
		 toRet[2] = round5(parseInt(leg[len-1].leg_press) + parseInt((leg[len-1].leg_press - leg[0].leg_press) / len));
		 toRet[3] = round5(parseInt(leg[len-1].leg_extension) + parseInt((leg[len-1].leg_extension - leg[0].leg_extension) / len));
		 toRet[4] = round5(parseInt(leg[len-1].leg_curl) + parseInt((leg[len-1].leg_curl - leg[0].leg_curl) / len));
		 break;
	 default:
		 break;
	 }

	return toRet;
}

function round5(x)
{
    return Math.ceil(x/5)*5;
}
</script>

<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<div style="width:100%; height:500px;" id="chartdiv"></div>

<script>



// generate some random data, quite different range
function generateChartData() {
    var chartData = [];
    var s ;
    //var firstdate = new date();
   // firstdate.setdate(firstdate.getdate() - 100);

    if(theDay == "Push_Day"){
        s = push.length;
    }
    else if (theDay == "Pull_Day"){
           s = pull.length;
    }
    else{
           s = leg.length;
    }

        var done;// = push[0].FlatBench;
        var dtwo;// = push[0].InclineBench;
        var dthree;// = push[0].TricepExtension;
        var dfour;// = push[0].arnolds;
        var ddate;

    for (var i = 0; i < s; i++) {
        // we create date objects here. In your data, you can have date strings
        // and then set format of your dates using chart.datadateFormat property,
        // however when possible, use date objects, as this will speed up chart rendering.
       // var newdate = new date(firstdate);
       // newdate.setdate(newdate.getdate() + i);

       switch(theDay){
       case "Push_Day":
			 ddate   = push[i].date;
			 done   = push[i].flat_bench;
			 dtwo   = push[i].incline_bench;
			 dthree = push[i].tricep_extention;
			 dfour  = push[i].arnolds;
			 break;
		 case "Pull_Day":
			 ddate  = pull[i].date;
			 done   = pull[i].dead_lift;
			 dtwo   = pull[i].bent_rows;
			 dthree = pull[i].barbell_curls;
			 dfour  = pull[i].lat;
			 break;
		 case "Leg_Day":
			 ddate  = leg[i].date;
			 done   = leg[i].squat;
			 dtwo   = leg[i].leg_press;
			 dthree = leg[i].leg_extension;
			 dfour  = leg[i].leg_curl;
			 break;
		 default:
			 break;

       }

        chartData.push({
            date: ddate,
            one: done,
            two: dtwo,
            three: dthree,
            four: dfour
        });
    }
    return chartData;
}

function zoomChart(){
    chart.zoomToIndexes(chart.dataProvider.length - 20, chart.dataProvider.length - 1);
}
</script>




</body>
</html>
