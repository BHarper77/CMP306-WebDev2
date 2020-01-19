<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Formula 1</title>

		<meta charset = 'utf-8'>

		<meta name="viewport" content="width=device-width, intial-scale=1.0">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 

        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

        <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
        <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	</head>

	<body>
		<?php
		include "../connectionInclude";
		include "../Model/electricIMPAPI.php";
		?>

		<div data-role="page" id="home" data-title="Home Page">
			<?php include "../navbarInclude.php"; ?>
			<div data-role="header">
				<h1>Multi-Page Example</h1>
			</div>

			<div data-role="content">
				<a href="#firstPage" data-role="button">1. Display the most recent value from the database</a><br>	
				<a href="#secondPage" data-role="button">2. Display the 10 most recent values from the database</a><br>
				<a href="#thirdPage" data-role="button">3. Using AJAX to show latest value</a><br>
				<a href="#fourthPage" data-role="button">4. Displaying the data as a graph</a><br>
			</div>
		</div>

		<!--FIRST PAGE-->

		<div data-role="page" id="firstPage">
			<?php include "../navbarInclude.php"; ?>
			<div data-role="header">
				<h1>Display most recent value from database</h1>
			</div>

			<?php
			$valueJSON = getOneResult();
			$value = json_decode($valueJSON);
			?>

			<div class="container" data-role="content">
				<table class="table">
					<thead>
						<tr>
							<th>ReadingID</th>
							<th>Values</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td><?php echo $value[0]-> ReadingID; ?></td>
							<td><?php echo $value[0]-> ReadingsString; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<a href="#home" data-role="button">Home</a>
		</div>

		<!--SECOND PAGE-->

		<div data-role="page" id="secondPage">
			<?php include "../navbarInclude.php"; ?>
			<div data-role="header">
				<h1>Display 10 most recent values from database</h1>
			</div>

			<?php 
			$valuesJSON = getTenResults();
			$values = json_decode($valuesJSON);
			?>

			<div class="container">
				<table class="table">
					<thead>
						<tr>
							<th>ReadingID</th>
							<th>Value</th>
						</tr>
					</thead>

					<tbody>
						<?php 
						for ($i=0; $i < 10; $i++) 
						{
							echo '<tr>';
								echo '<td>'.$values[$i]-> ReadingID.'</td>';
								echo '<td>'.$values[$i]-> ReadingsString.'</td>';
							echo '</tr>';
						}
						?>
					</tbody>
				</table>
			</div>
			<a href="#home" data-role="button">Home</a>
		</div>

		<!--THIRD PAGE-->

		<div data-role="page" id="thirdPage">
			<script type="text/javascript" src="updateValuesAJAX.js"></script>
			<?php include "../navbarInclude.php"; ?>
			
			<div data-role="header">
				<h1>Using AJAX to update latest value</h1>
			</div>

			<div class="container" data-role="content">
				Latest value: <p id="changeThis"></p>
			</div>
			<a href="#home" data-role="button">Home</a>
		</div>

		<!--FOURTH PAGE-->

		<div data-role="page" id="fourthPage">
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<?php include "../navbarInclude.php"; ?>
			<?php include "../errorReportingInclude.php"; ?>

			<?php
			$valuesJSON = getTenResults();
			$values = json_decode($valuesJSON);
			?>

			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

			<script type="text/javascript">
		        google.charts.load('current', {'packages':['line']});
		        google.charts.setOnLoadCallback(drawChart);

		        function drawChart() 
		        {
			        var data = new google.visualization.DataTable();

			      	data.addColumn('number', 'ReadingID');
			      	data.addColumn('number', 'External');
			      	data.addColumn('number', 'Internal');

			      	data.addRows([
				        <?php
		        		for ($i = 0; $i < 10; $i++)
		        		{
		        			$readingsStringJSON = $values[$i] -> ReadingsString;
		        			$readingsString = json_decode($readingsStringJSON);

		        			echo '['.$values[$i] -> ReadingID.', '.$readingsString -> external.', '.$readingsString -> internal.'], ';
		        		}
		        		?>
			      	]);

			      	var options = {
			      		chart: 
			      		{
			          		title: 'Temperature Readings',
			          		subtitle: 'in degrees celsius'
			        	},
			      	};

			      	var chart = new google.charts.Line(document.getElementById('temps'));

			      	chart.draw(data, google.charts.Line.convertOptions(options));
			    }
		    </script>

		    <script type="text/javascript">
		        google.charts.load('current', {'packages':['line']});
		        google.charts.setOnLoadCallback(drawChart);

		        function drawChart() 
		        {
			        var data = new google.visualization.DataTable();

			      	data.addColumn('number', 'ReadingID');
			      	data.addColumn('number', 'External');

			      	data.addRows([
				        <?php
		        		for ($i = 0; $i < 10; $i++)
		        		{
		        			$readingsStringJSON = $values[$i] -> ReadingsString;
		        			$readingsString = json_decode($readingsStringJSON);

		        			echo '['.$values[$i] -> ReadingID.', '.$readingsString -> voltage.'], ';
		        		}
		        		?>
			      	]);

			      	var options = {
			      		chart: 
			      		{
			          		title: 'Voltage',
			        	},
			      	};

			      	var chart = new google.charts.Line(document.getElementById('voltage'));

			      	chart.draw(data, google.charts.Line.convertOptions(options));
			    }
		    </script>

			<div data-role="header">
				<h1>Displaying values as a graph</h1>
			</div>

			<div class="container" id="temps"></div>

			<br><br>

			<div class="container" id="voltage"></div>
			<a href="#home" data-role="button">Home</a>
		</div>
	</body>
</html>