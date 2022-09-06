<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Journal records</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</head>
<body>

	<?php

    echo '<div class="container"> ' ;

	$servername="localhost";
	$username="root";
	$password="";
	$dbname="facultyDB";

	$conn = new mysqli($servername, $username, $password, $dbname);
	$faculty_name = $_REQUEST['faculty_name'];

	$sqlquery1="SELECT * FROM journal where doi IN (
		SELECT doi from journal_author where author='$faculty_name');" ;



	$result1=$conn->query($sqlquery1) ;  ///asjhdihfas ->query

	echo "<h5 class='display-5'> Details for Faculty: $faculty_name  </h5><br><br>";
	echo "<h6 class='display-6'> Journal Details:</h6> <br>";
	echo'	<table class="table table-dark table-striped">
	<tr>
	<th>Title</th>
	<th>Journal Name</th>
	<th>DOI</th>
	<th>ISSN</th>
	<th>Date</th>
	<th>Volume</th>
	<th>Issue</th>
	</tr>';

	while($row = mysqli_fetch_array($result1))
	{
		echo "<tr> ";
		echo "<td>$row[title]</td>
		<td>$row[journal_name]</td>
		<td>$row[doi]</td>
		<td>$row[issn]</td>
		<td>$row[journal_date]</td>
		<td>$row[volume]</td>
		<td>$row[issue]</td> ";
		echo" </tr>
		</table> ";
		echo "<br>";
	}

    echo '<a href="view-data.html" class="btn btn-outline-success">view other data...</a>' ;
    echo '<br> <br> <a href="index.html" class="btn btn-warning">Home</a> <br></div>' ;


	?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>