<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Android WebApp</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<meta name="description" content="*******************">
		<link rel="stylesheet" href="http://bootswatch.com/readable/bootstrap.min.css"> <!-- http://bootswatch.com/ -->
		<link rel="stylesheet" href="css/bootstrap.css"> <!-- http://bootswatch.com/ -->
		<link rel="stylesheet" href="css/styles.css">
		<script src="http://code.jquery.com/jquery-1.10.1.min.js" ></script> 
		<script src="js/bootstrap.min.js"></script>

		<!-- <link rel="shortcut icon" href="img/favicon.ico"> -->
	</head> 

	<body>

		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-4">
				<form class="form-horizontal" role="form" method="post" action=" <?php $_PHP_SELF ?> " >
				  	<div class="form-group">
					    <label for="inputLongitude" class="col-lg-2 control-label">Longitude</label>
					    <div class="col-lg-10">
					      <input type="number" class="form-control" id="inputLongitude" placeholder="longitude" name="inputLongitude">
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label for="inputLatitude" class="col-lg-2 control-label">Latitude</label>
					    <div class="col-lg-10">
					      <input type="number" class="form-control" id="inputLatitude" placeholder="latitude" name="inputLatitude">
						</div>
				 	</div>
					<div class="form-group">
					    <div class="col-lg-offset-2 col-lg-10">
					      <button type="submit" class="btn btn-primary">Save</button>
					    </div>
					</div>
				</form>
			</div>

			<?php
			
				$conn = mysqli_connect('localhost', 'root', '', 'and');

	            if (mysqli_connect_errno()){
	            echo "Failed to connect to MySQL: " . mysqli_connect_error();
	            }
				
				// http://diskuse.jakpsatweb.cz/?action=vthread&forum=9&topic=145971 We need isset() 
	            $lin = isset($_POST['inputLongitude']);
	            $lat = isset($_POST['inputLatitude']);
	            $sql="INSERT INTO poid (lin, lat) VALUES('$lin','$lat')";

				if (!mysqli_query($conn,$sql)){
				  die('Error: ' . mysqli_error($conn));
				}
				
			?>	

			<div class="col-xs-6 col-sm-6 col-md-4">	    

			</div>


			<div class="col-xs-6 col-sm-6 col-md-4">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID in the database</th>
							<th>Longitude</th>
							<th>Latitude</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php
							/*
								$query = "SELECT * FROM poid";
								$results = mysql_query($query) or die(mysql_error());
								$row_users = mysql_fetch_array($results);
								while ($row_users = mysql_fetch_array($results)) {
							 		echo row_users;
								}
								*/
							?>

						</tr>
					</tbody>
				</table>

			</div>

		</div>	
	</body>
</html>


