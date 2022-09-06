<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <title>Initial Set-up</title>
</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>


  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dname = "facultyDB";

    try {
        $conn = new PDO("mysql:host=$servername", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE IF NOT EXISTS facultyDB";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo '<div class="container"><h5 class="display-5">Database created...</h5><br></div>';
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;

    try{
        
        $conn = new PDO("mysql:host=$servername;dbname=$dname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
        $journal = "CREATE TABLE IF NOT EXISTS journal (
            issn varchar(255),
            journal_date date,
            journal_name varchar(255),
            title varchar(255),
            volume int,
            issue int,
            doi varchar(255) PRIMARY KEY
          );" ;
    
        $journal_author = "CREATE TABLE IF NOT EXISTS journal_author (
            author varchar(225) ,
            doi varchar(255),
            FOREIGN KEY (doi) REFERENCES journal(doi) ON DELETE CASCADE
          );" ;
    
        $conference = "CREATE TABLE IF NOT EXISTS conference (
            conference_date date,
            location varchar(255),
            conference_name varchar(255) PRIMARY KEY
          )" ;
    
        $conference_author = "CREATE TABLE IF NOT EXISTS conference_author (
            author varchar(225) ,
            conference_name varchar(225),
            FOREIGN KEY (conference_name) REFERENCES conference(conference_name) ON DELETE CASCADE
          );" ;
    
        $tables = [$journal, $journal_author, $conference, $conference_author] ;
        foreach($tables as $k => $sql){
            $conn->exec($sql) ;
        }
        echo '<div class="container"> <h5 class="display-6">all tables created successfully!</h5><br>
              <a href="index.html" class="btn btn-success">go back...</a>
        </div>' ;
        

    }catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null ;

?>

</body>
</html>
