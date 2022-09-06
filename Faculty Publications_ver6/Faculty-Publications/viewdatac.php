<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Conference records</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</head>
<body>

<?php

$servername="localhost";
	$username="root";
	$password="";
	$dbname="facultyDB";

    $conn = new mysqli($servername, $username, $password, $dbname);
	$faculty_name = $_REQUEST['faculty_name'];

$sqlquery2="SELECT * FROM conference where conference_name IN (
		SELECT conference_name from conference_author  where author='$faculty_name');" ;

	
	
    echo '<div class="container"> ' ;
	

	


	$result2=$conn->query($sqlquery2);
    echo "<h5 class='display-5'> Details for Faculty: $faculty_name  </h5><br><br>";
	echo "<h6 class='display-6'> Conference Details:</h6> <br>";

	echo'	<table class="table table-dark table-striped" >
	<tr>
	<th>Conference Name</th>
	<th>Date</th>
	<th>Location</th>
	</tr>';

	while($row = mysqli_fetch_array($result2))
	{
		echo "<tr> ";
		echo "<td>$row[conference_name]</td>
		<td>$row[conference_date]</td>
		<td>$row[location]</td>";
		echo" </tr>
		</table> ";
		echo "<br>";
	}

    echo '<a href="view-data.html" class="btn btn-outline-success">view other data...</a>' ;
    echo '<br> <br> <a href="index.html" class="btn btn-warning">Home</a> </div>' ;


	?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>