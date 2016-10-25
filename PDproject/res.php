<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
	<link rel="stylesheet" href="stylesheet/style.css" media="all" type="text/css">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="http://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
  
  
    <style>
       #map {
        height: 400px;
        width: 700px;
		padding: 0;
       }
    #apDiv1 {
	position:absolute;
	left:717px;
	top:495px;
	width:418px;
	height:63px;
	z-index:1;
}
    </style>
</head>
  <body>
    <div id="apDiv1">
    
    <?php 
$url = 'http://4me302-16.site88.net/getData.php?table=Note';
$anno = simplexml_load_file($url);
foreach ($anno as $note) { ?>
<ul>
  <li><?php echo "Session ID: " .$note->Test_Session_IDtest_session; ?></li>
  <li><?php echo "Annotation: " .$note->note; ?></li>
  <li><?php echo "Given by user ID: " .$note->User_IDmed; ?></li>
</ul>
<?php  
}
?>  
    
    </div>
  <h3>Locate Patients</h3>
    <div id="map"></div>
    <script>
    
	function initMap() {
	
	var Aberga = {
		info: '<a href="https://goo.gl/maps/jKNEDz4SyyH2">Get Directions</a>',
		lat: 59.6567,
		long: 16.6709
	};

	var Storegården  = {
		info: '<a href="https://goo.gl/maps/PHfsWTvgKa92">Get Directions</a>',
		lat: 57.3365,
		long: 12.5164
	};


	var locations = [
      [Aberga.info, Aberga.lat, Aberga.long, 0],
      [Storegården.info, Storegården.lat, Storegården.long, 1],
   
    ];

	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 6,
		center: new google.maps.LatLng(59.4022, 13.5115),
		mapTypeId: google.maps.MapTypeId.ROADMAP
	});

	var infowindow = new google.maps.InfoWindow({});

	var marker, i;

	for (i = 0; i < locations.length; i++) {
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(locations[i][1], locations[i][2]),
			map: map
		});

		google.maps.event.addListener(marker, 'click', (function (marker, i) {
			return function () {
				infowindow.setContent(locations[i][0]);
				infowindow.open(map, marker);
			}
		})(marker, i));
	}
}
	
	
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC4N3grOMnh2uAbDKVMXjWpJf97m_qm8xA&callback=initMap">
    </script>
	
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

		
	
	
	
  </body>
</html>