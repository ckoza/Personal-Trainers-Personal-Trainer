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
                "Date": "2017/10/01",
            	"FlatBench": 95,
            	"InclineBench": 55,
            	"TricepExtention": 50,
            	"Arnolds": 35
            },
            {
            	"Date": "2017/10/08",
            	"FlatBench": 105,
            	"InclineBench": 55,
            	"TricepExtention": 55,
            	"Arnolds": 40
            },
            {
            	"Date": "2017/10/15",
            	"FlatBench": 105,
            	"InclineBench": 60,
            	"TricepExtention": 60,
            	"Arnolds": 42.5
            },
            {
            	"Date": "2017/10/22",
            	"FlatBench": 115,
            	"InclineBench": 65,
            	"TricepExtention": 70,
            	"Arnolds": 45
            },
            {
            	"Date": "2017/10/29",
            	"FlatBench": 135,
            	"InclineBench": 70,
            	"TricepExtention": 65,
            	"Arnolds": 55
            }
            ];
            
var pull = [
            {
                "Date": "2017/10/03",
                "Deadlift": 135,
                "BentRows": 35,
                "BarbellCurls": 40,
                "Lat": 40
            },
            {
            	"Date": "2017/10/10",
            	"Deadlift": 145,
                "BentRows": 40,
                "BarbellCurls": 45,
                "Lat": 50
            },
            {
            	"Date": "2017/10/17",
            	"Deadlift": 155,
                "BentRows": 45,
                "BarbellCurls": 45,
                "Lat": 60
            },
            {
            	"Date": "2017/10/24",
            	"Deadlift": 160,
                "BentRows": 45,
                "BarbellCurls": 45,
                "Lat": 65
            },
            {
            	"Date": "2017/10/31",
            	"Deadlift": 165,
                "BentRows": 55,
                "BarbellCurls": 60,
                "Lat": 70
            }
            ];
            
var leg = [
            {
                "Date": "2017/10/05",
                "Squat": 135,
                "LegPress": 155,
                "LegExtension": 50,
                "LegCurl": 25
                
            },
            {
            	"Date": "2017/10/12",
            	"Squat": 145,
                "LegPress": 165,
                "LegExtension": 60,
                "LegCurl": 30
            },
            {
            	"Date": "2017/10/19",
            	"Squat": 145,
                "LegPress": 175,
                "LegExtension": 55,
                "LegCurl": 35
            },
            {
            	"Date": "2017/10/26",
            	"Squat": 155,
                "LegPress": 190,
                "LegExtension": 60,
                "LegCurl": 45
            },
            {
            	"Date": "2017/11/02",
            	"Squat": 165,
                "LegPress": 200,
                "LegExtension": 85,
                "LegCurl": 55
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
<th>&nbsp;&nbsp; Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
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
<th>&nbsp;&nbsp; Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>Deadlift<br> (3x6) &nbsp;&nbsp;&nbsp;</th>
<th>Bent Row<br> (2x10) &nbsp;&nbsp;&nbsp; </th>
<th>Barbell Curl<br> (2x15) &nbsp;&nbsp; </th>
<th>Lat Pull Down<br> (3x10) &nbsp;&nbsp; </th>
</tr>
</table>
</div>

<div id="Leg_Day" class="tabcontent">
  <h3>Leg Day</h3>
  <table id="LegTable" >
<tr>
<th>&nbsp;&nbsp; Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>Squat<br>(2x10)</th>
<th>Leg Press<br> (3x8) &nbsp;&nbsp;&nbsp; </th>
<th>Leg Extentions<br> (2x15) &nbsp;&nbsp; </th>
<th>Leg Curls<br> (2x12) &nbsp;&nbsp; </th>
</tr>
</table>
</div>

</div>

<script>

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
        "parseDates": true,
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
			 <th>&nbsp;&nbsp; Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
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
			 <th>&nbsp;&nbsp; Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			 <th>Deadlift<br> (3x6) &nbsp;&nbsp;&nbsp;</th>
			 <th>Bent Row<br> (2x10) &nbsp;&nbsp;&nbsp; </th>
			 <th>Barbell Curl<br> (2x15) &nbsp;&nbsp; </th>
			 <th>Lat Pull Down<br> (3x10) &nbsp;&nbsp; </th>
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
			 <th>&nbsp;&nbsp; Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			 <th>Squat<br> (2x10) &nbsp;&nbsp;&nbsp;</th>
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
				 cell0.innerHTML = push[ds].Date;
				 cell1.innerHTML = push[ds].FlatBench;
				 cell2.innerHTML = push[ds].InclineBench;
				 cell3.innerHTML = push[ds].TricepExtention;
				 cell4.innerHTML = push[ds].Arnolds;
				 break;
			 case "Pull_Day":
				 cell0.innerHTML = pull[ds].Date;
				 cell1.innerHTML = pull[ds].Deadlift;
				 cell2.innerHTML = pull[ds].BentRows;
				 cell3.innerHTML = pull[ds].BarbellCurls;
				 cell4.innerHTML = pull[ds].Lat;
				 break;
			 case "Leg_Day":
				 cell0.innerHTML = leg[ds].Date;
				 cell1.innerHTML = leg[ds].Squat;
				 cell2.innerHTML = leg[ds].LegPress;
				 cell3.innerHTML = leg[ds].LegExtension;
				 cell4.innerHTML = leg[ds].LegCurl;
				 break;
			 default:
				 break;
			 }
			
		//	cell0.innerHTML = data[ds].Date;
		//	cell1.innerHTML = data[ds].Bench;
		//	cell2.innerHTML = data[ds].Squat;
		//	cell3.innerHTML = data[ds].Lat;
			
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
		 var len = push.length -1;
		 toRet[0] = "Next Up";
		 toRet[1] = round5(push[len].FlatBench + ((push[len].FlatBench - push[0].FlatBench) / len));
		 toRet[2] = round5(push[len].InclineBench + ((push[len].InclineBench - push[0].InclineBench) / len));
		 toRet[3] = round5(push[len].TricepExtention + ((push[len].TricepExtention - push[0].TricepExtention) / len));
		 toRet[4] = round5(push[len].Arnolds + ((push[len].Arnolds - push[0].Arnolds) / len));
		 break;
	 case "Pull_Day":
		 var len = pull.length -1;
		 toRet[0] = "Next Up";
		 toRet[1] = round5(pull[len].Deadlift + ((pull[len].Deadlift - pull[0].Deadlift) / len));
		 toRet[2] = round5(pull[len].BentRows + ((pull[len].BentRows - pull[0].BentRows) / len));
		 toRet[3] = round5(pull[len].BarbellCurls + ((pull[len].BarbellCurls - pull[0].BarbellCurls) / len));
		 toRet[4] = round5(pull[len].Lat + ((pull[len].Lat - pull[0].Lat) / len));
		 break;
	 case "Leg_Day":
		 var len = leg.length -1;
		 toRet[0] = "Next Up";
		 toRet[1] = round5(leg[len].Squat + ((leg[len].Squat - leg[0].Squat) / len));
		 toRet[2] = round5(leg[len].LegPress + ((leg[len].LegPress - leg[0].LegPress) / len));
		 toRet[3] = round5(leg[len].LegExtension + ((leg[len].LegExtension - leg[0].LegExtension) / len));
		 toRet[4] = round5(leg[len].LegCurl + ((leg[len].LegCurl - leg[0].LegCurl) / len));
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
    var s = push.length;
    //var firstDate = new Date();
   // firstDate.setDate(firstDate.getDate() - 100);
    
    if(theDay == "Push_Day"){
    	console.log("yay");
    }

        var done;// = push[0].FlatBench;
        var dtwo;// = push[0].InclineBench;
        var dthree;// = push[0].TricepExtension;
        var dfour;// = push[0].Arnolds;
        var ddate;

    for (var i = 0; i < s; i++) {
        // we create date objects here. In your data, you can have date strings
        // and then set format of your dates using chart.dataDateFormat property,
        // however when possible, use date objects, as this will speed up chart rendering.
       // var newDate = new Date(firstDate);
       // newDate.setDate(newDate.getDate() + i);
       
       switch(theDay){
       case "Push_Day":
			 ddate   = push[i].Date;
			 done   = push[i].FlatBench;
			 dtwo   = push[i].InclineBench;
			 dthree = push[i].TricepExtention;
			 dfour  = push[i].Arnolds;
			 break;
		 case "Pull_Day":
			 ddate  = pull[i].Date;
			 done   = pull[i].Deadlift;
			 dtwo   = pull[i].BentRows;
			 dthree = pull[i].BarbellCurls;
			 dfour  = pull[i].Lat;
			 break;
		 case "Leg_Day":
			 ddate  = leg[i].Date;
			 done   = leg[i].Squat;
			 dtwo   = leg[i].LegPress;
			 dthree = leg[i].LegExtension;
			 dfour  = leg[i].LegCurl;
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