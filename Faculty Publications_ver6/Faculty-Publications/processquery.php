<?php
    $host="localhost";
    $username="root";
    $password="";
    $dbname="facultyDB";
    $conn=mysqli_connect('localhost','root','',$dbname);
    $sql_data = $_REQUEST["query"] ;
        // $sql_data="select * from table_name";
        /* $result_data=$con->query($sql_data);
        $results=array(); */
        $user_query = mysqli_query($conn,$sql_data);

        if(!strncasecmp("SELECT",$sql_data,6))
        {
            $filename = "publicationDetails.xls"; // File Name
            // Download file
            header("Content-Disposition: attachment; filename=\"$filename\"");
            header("Content-Type: application/vnd.ms-excel");
            
            // Write data to file
            $flag = false;
            while ($row = mysqli_fetch_assoc($user_query)) {
                if (!$flag) {
                    // display field/column names as first row
                    echo implode("\t", array_keys($row)) . "\r\n";
                    $flag = true;
                }
                echo implode("\t", array_values($row)) . "\r\n";
            }die() ;    
        }else
        {
            echo '<div> <h2>Your query was executed successfully! <br></h2> ' ;
            echo '<a href="query.php">another query...</a> <br> <br> ' ;
            echo '<a href="index.html">Home</a> </div>' ;
        }
        
    ?>
