<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update data</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>

<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "facultyDB";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error)
{
	die("Connection failed".$conn->connect_error);
}

$doi = $_REQUEST['doi'];
$conference_name = $_REQUEST['conference_name'];
$field_to_alter  =$_REQUEST['field_to_alter'];
$alter_value = $_REQUEST['alter_value'];

$j_authors=array("j_author_1","j_author_2","j_author_3","j_author_4","j_author_5");
$c_authors=array("c_author_1","c_author_2","c_author_3","c_author_4","c_author_5");

$q1 = "" ;
$q2 = "" ;
$q3 = "" ;
$q3 = "" ;



// in_array(search_value, array) == false
if(($doi!="") && in_array($field_to_alter,$j_authors)==false)
{
	$q1="UPDATE journal
			SET $field_to_alter = '$alter_value'
				WHERE doi = '$doi';";
}

elseif(($doi!="") && in_array($field_to_alter,$j_authors)==true)
{
	$q2="UPDATE journal_author
			SET $field_to_alter = '$alter_value'
				WHERE doi = '$doi';";
}

elseif(($conference_name!="") && in_array($field_to_alter,$c_authors)==false)
{
	$q3="UPDATE conference
			SET $field_to_alter = '$alter_value'
				WHERE conference_name = '$conference_name';";
}

elseif(($conference_name!="") && in_array($field_to_alter,$j_authors)==true)
{
	$q4="UPDATE conference_author
			SET $field_to_alter = '$alter_value'
				WHERE conference_name = '$conference_name';";
}

if($q1!="" && $q2!="")
{
	echo '<div class="container"> <h1 class="display-5">you can edit only one table at a time <br></h1>' ;
	echo '<a href="Work-with-data.html" class="btn btn-success">previous page...</a> <br> <br> ' ;
}

if($q1!="" && (mysqli_query($conn, $q1) || mysqli_query($conn, $q2))) 
{
	echo '<div class="container"> <h1 class="display-5">Details updated! <br></h1> ' ;
		echo '<a href="Work-with-data.html" class="btn btn-success">previous page...</a> <br> <br> ' ;
		echo '<a href="index.html" class="btn btn-outline-warning">Home</a> </div>' ;
}

if($q3!="" && (mysqli_query($conn, $q3) || mysqli_query($conn, $q4)))
{
	echo '<div class="container"> <h1 class="display-5">Details updated! <br></h1> ' ;
		echo '<a href="Work-with-data.html" class="btn btn-success">previous page...</a> <br> <br> ' ;
		echo '<a href="index.html" class="btn btn-outline-warning">Home</a> </div>' ;
}

?>
	
	
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>




