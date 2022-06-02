<?php

$conn=mysqli_connect("localhost","u750376384_pentatronics","w/4jT0owsDD","u750376384_polyseg");// server, user, password, database name

    include_once('inc.inc');
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql        =   "SELECT RECEIVED_BOOL2 FROM ESPtable2 LIMIT 1";
    $result     =   $conn->query($sql);
    
    if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc())
    {
        echo $row['RECEIVED_BOOL2'];
    }
        
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();


?>