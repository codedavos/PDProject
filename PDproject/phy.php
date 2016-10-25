
<!DOCTYPE html>
<html>
<head>
	
<meta charset="utf-8">
	<link rel="stylesheet" href="stylesheet/style.css" media="all" type="text/css">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="http://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>

</head>
<body>
    <style type="text/css">

  .bold-green-font {
    font-weight: bold;
    color: green;
  }

  .bold-font {
    font-weight: bold;
  }

  .right-text {
    text-align: right;
  }

  .large-font {
    font-size: 15px;
  }

  .italic-darkblue-font {
    font-style: italic;
    color: darkblue;
  }

  .italic-purple-font {
    font-style: italic;
    color: purple;
  }

  .underline-blue-font {
    text-decoration: underline;
    color: blue;
  }

  .gold-border {
    border: 3px solid gold;
  }

  .deeppink-border {
    border: 3px solid deeppink;
  }

  .orange-background {
    background-color: orange;
  }

  .orchid-background {
    background-color: orchid;
  }

  .beige-background {
    background-color: beige;
  }
	
	
    </style>
<?php 
$url = 'http://4me302-16.site88.net/getFilterData.php?parameter=User_IDmed&value=1';
$org = simplexml_load_file($url);
$counter = 1;
?>
<script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
		var cssClassNames = {
    'headerRow': 'italic-darkblue-font large-font bold-font',
    'tableRow': '',
    'oddTableRow': 'beige-background',
    'selectedTableRow': 'orange-background large-font',
    'hoverTableRow': '',
    'headerCell': 'gold-border',
    'tableCell': '',
    'rowNumberCell': 'underline-blue-font'};
	var options = {'showRowNumber': true, 'allowHtml': true, 'cssClassNames': cssClassNames};	
		
		
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Patient ID');
        data.addColumn('string', 'Therapy ID');
        data.addColumn('string', 'Therapy list');
		data.addColumn('string', 'Medicine ID');
        data.addColumn('number', 'Date');
        
        <?php foreach ($org as $id) { ?>
        	data.addRows([
          	[ <?php echo "'" . $id->User_IDpatient . "'";?>, <?php echo "'" . $id->therapyID . "'";?>, <?php echo "'" . $id->medicineID . "'";?>, <?php echo "'" . $id->therapy_listID . "'";?>, {v: <?php echo $counter; ?>, f: <?php echo "'" . $id->test_datetime . "'";?>}],
			]);
        <?php $counter +=1; } ?>
         var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data,options);
      }
    </script>
    <div id="table_div"></div>

<br>
<br>
	

<?php  
$file = file("data1.csv");
foreach ($file as $k) {
  $csv[] = explode(',', $k);
}
$ex = count($csv);
?>

<script type="text/javascript">
  window.onload = function () {
      var chart = new CanvasJS.Chart("chartContainer", {
        title: {
          text: "Exersice-1"
        },
        data: [{
          type: "scatter",
          dataPoints: [
         <?php 
for ($i=3; $i < $ex; $i++) { ?>
  { x: <?php echo $csv[$i][0];?>, y: <?php echo $csv[$i][1];?> },
<?php
}
?>]
     
        }]
      });
      chart.render();
    }
</script>




<div id="chartContainer" style="width:70%; height:300px">




<br>
<br>
</div>
<p>social App for parkinsons disease</p>
</body>
</html>

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  