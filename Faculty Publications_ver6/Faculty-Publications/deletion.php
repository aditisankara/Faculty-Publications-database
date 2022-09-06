<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete record</title>

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

        $doi=$_REQUEST['doi'];
        $conference_name=$_REQUEST['conference_name'];

        if($doi!="")
        {
            $q1="DELETE FROM journal
                    WHERE doi='$doi';";
        }

        if($conference_name!="")
        {
            $q1="DELETE FROM conference
                    WHERE conference_name='$conference_name';";
        }

        if(mysqli_query($conn, $q1) || mysqli_query($conn, $q2))
        {
            echo '<div class="container"> <h1 class="display-5">Record deleted <br></h1> ' ;
            echo '<a href="Work-with-data.html" class="btn btn-success">previous page...</a> <br> <br> ' ;
            echo '<a href="index.html" class="btn btn-outline-warning">Home</a> </div>' ;
        }
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>