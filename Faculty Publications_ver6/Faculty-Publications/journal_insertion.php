<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Journal new record</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>

	<?php 

	
		
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "facultyDB";

	try
	{
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//echo "connection established!<br>" ;

		$title = $_REQUEST['title'];
		$issn = $_REQUEST['issn'];
		$journal_name = $_REQUEST['journal_name'];
		$issue_number = $_REQUEST['issue_number'];
		$volume_number = $_REQUEST['volume_number'];
		$doi = $_REQUEST['doi'];
		$j_date = $_REQUEST['j_date'];
		$j_author_1 =  $_REQUEST['j_author_1'];
		$j_author_2 = $_REQUEST['j_author_2'];
		$j_author_3 =  $_REQUEST['j_author_3'];
		$j_author_4 =  $_REQUEST['j_author_4'];
		$j_author_5 =  $_REQUEST['j_author_5'];
		
		$sqlquery1="INSERT INTO `journal` VALUES('$issn','$j_date','$journal_name','$title','$volume_number','$issue_number','$doi')";
		$conn->exec($sqlquery1) ;

		$sqlquery2="INSERT INTO `journal_author` VALUES('$j_author_1','$doi');" ;
		$conn->exec($sqlquery2) ;
		
		if($j_author_2!="")
		{
			$sqlquery3="INSERT INTO `journal_author` VALUES('$j_author_2','$doi');" ;
			$conn->exec($sqlquery3) ;
		}
		
		if($j_author_3!="")
		{
			$sqlquery4="INSERT INTO `journal_author` VALUES('$j_author_3','$doi');" ;
			$conn->exec($sqlquery4) ;
		}
		
		if($j_author_4!="")
		{
			$sqlquery5="INSERT INTO `journal_author` VALUES('$j_author_4','$doi');";
			$conn->exec($sqlquery5) ;
		}
		
		if($j_author_5!="")
		{
			$sqlquery6="INSERT INTO `journal_author` VALUES('$j_author_5','$doi');";
			$conn->exec($sqlquery6) ;
		}
		
		echo '<div class="container"> <h1 class="display-5">new record inserted ! <br></h1> ' ;
		echo '<a href="journal-form.html" class="btn btn-success">submit another record...</a>' ;
		echo '<br><a href="index.html" class="btn btn-outline-warning">Home</a> </div>' ;

		
		/* if($conn->query($sqlquery1))
		{
			echo "Journal Details Inserted";
		}
		else
			echo "not inserted<br>" ;
		
		if($conn->query($sqlquery2))
		{
			echo "Author Details Inserted";
		}
		else
			echo "not inserted<br>" ;
		
		if($conn->query($sqlquery3) || $conn->query($sqlquery4) || $conn->query($sqlquery5) || $conn->query($sqlquery6))
		{
			echo "Author Details Inserted";
		} */
	}catch(PDOException $e) {
		echo $sqlquery1 . "<br>" . $e->getMessage();
	}
	
	?>
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>
