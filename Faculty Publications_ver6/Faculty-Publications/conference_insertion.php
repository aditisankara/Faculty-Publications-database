<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Conference new record</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>

<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "facultyDB";

try{
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$conference_name = $_REQUEST['conference_name'];
$c_date = $_REQUEST['c_date'];
$location = $_REQUEST['location'];
$c_author_1 =  $_REQUEST['c_author_1'];
$c_author_2 = $_REQUEST['c_author_2'];
$c_author_3 =  $_REQUEST['c_author_3'];
$c_author_4 =  $_REQUEST['c_author_4'];
$c_author_5 =  $_REQUEST['c_author_5'];

$sqlquery1="INSERT INTO conference(conference_date, location, conference_name) VALUES('$c_date', '$location', '$conference_name') ;" ;
$conn->exec($sqlquery1) ;
// $confid = "SELECT conference_id FROM conference WHERE conference_name='$conference_name'" ;

// $conn->exec($confid) ;



 if($c_author_1!="")
{
	$sqlquery2="INSERT INTO conference_author VALUES('$c_author_1','$conference_name');" ;
	$conn->exec($sqlquery2) ;
}

if($c_author_2!="")
{
	$sqlquery3="INSERT INTO conference_author VALUES('$c_author_2','$conference_name');" ;
	$conn->exec($sqlquery3) ;
}

if($c_author_3!="")
{
	$sqlquery4="INSERT INTO conference_author VALUES('$c_author_3','$conference_name');" ;
	$conn->exec($sqlquery4) ;
}

if($c_author_4!="")
{
	$sqlquery5="INSERT INTO conference_author VALUES('$c_author_4','$conference_name');";
	$conn->exec($sqlquery5) ;
}

if($c_author_5!="")
{
	$sqlquery6="INSERT INTO conference_author VALUES('$c_author_5','$conference_name');";
	$conn->exec($sqlquery6) ;
} 
echo '<div class="container"> <h1 class="display-5">new record inserted ! <br></h1> ' ;
		echo '<a href="conference-form.html" class="btn btn-success">submit another record...</a>' ;
		echo '<a href="index.html" class="btn btn-primary-outline">Home</a>  </div>' ;
}catch(PDOException $e) {
	echo $sqlquery1 . "<br>" . $e->getMessage();
}

/* if(mysqli_query($conn, $sqlquery1))
{
	echo "Journal Details Inserted";
}

if(mysqli_query($conn, $sqlquery2))
{
	echo "Author Details Inserted";
}

if(mysqli_query($conn, $sqlquery3) || mysqli_query($conn, $sqlquery4) || mysqli_query($conn, $sqlquery5) || mysqli_query($conn, $sqlquery6))
{
	echo "Author Details Inserted";
}
 */
?>
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>