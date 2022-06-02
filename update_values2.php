<?php
//This file will get the values when you click any of the ON/OFF buttons or change buttons on the index.php file
//We get that value and send it to the datapase table and by that update the values
$value = $_POST['value1'];		//Get the value
$unit = $_POST['unit1'];			//Get the id if the unit where we want to update the value
$column = $_POST['column1'];		//Which coulumn of the database, could be the RECEIVED_BOOL1, etc...

//connect to the database
include("database_connect.php"); //We include the database_connect.php which has the data for the connection to the database

// Check the connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//Now update the value sent from the post (ON/OFF, change or send button)
mysqli_query($con,"UPDATE ESPtable2 SET $column1_2 = '{$value1}'
WHERE id=$unit1");

//go back to the interface
header("location: control-page.php");
?>