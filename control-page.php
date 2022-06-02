<?php
session_start();

if ($_SESSION["status"] != true){

    header("Location: login-page.php");
}

?>


<?php
//This line will make the page auto-refresh each 60 seconds
$page = $_SERVER['PHP_SELF'];
$sec = "60";
?>


<!DOCTYPE html>
<html>
<head>
    <!--<meta http-equiv="refresh" content="5" > -->
    <meta name="viewport" content="with= device-width, initial-scale= 1.0">
    <link rel="stylesheet" type="text/css" href="control-style.css" media="screen"/>
	<title> POLYSEG </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,700;1,600&display=swap" rel="stylesheet">
</head>

<body>
<section class="sub-header"> 
    <h1 style="font-size:x-large">Control</h1>
    </section>
	<br><br><br>
	<div style="width: 500px; padding: 10px; border: 5px solid #F3F5F6; font-size: 15px; color: black; margin: 0; margin-left: 33%">
	GUIDELINES: Once a button is ON, other buttons will not be visible. Turning ON two or more buttons at the same time is prohibited. This is to prevent possible complications to the system.</div>
	<br><br><br>
</body>
</html>




<html>
<head>
<!--<meta name="viewport" content="with= device-width, initial-scale= 1.0">-->
<!--//I've used bootstrap for the tables, so I import the CSS files for that as well...-->
<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">		
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<title> POLYSEG </title>
<link rel="stylesheet" type="text/css" href="control-style.css" media="screen"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,700;1,600&display=swap" rel="stylesheet">
</head>
	

<body>
<!-- For Button Table-->
<?php
include("database_connect.php"); //We include the database_connect.php which has the data for the connection to the database


// Check the connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//Again, we grab the table out of the database, name is ESPtable2 in this case
$result = mysqli_query($con,"SELECT * FROM ESPtable2");//table select

//Select values from second table
//$result_2 = mysqli_query($con,"SELECT * FROM ESPtable2");
//while($row = mysqli_fetch_array($result_2)) { 
	//$current_bool_1_2 = $row['RECEIVED_BOOL1_2'];
    //$current_bool_2_2 = $row['RECEIVED_BOOL2_2'];
    //$current_bool_3_2 = $row['RECEIVED_BOOL3_2'];
    //$current_bool_4_2 = $row['RECEIVED_BOOL4_2'];
//}
		 

//Now we create the table with all the values from the database	  
echo "<table class='table' style='font-size: 30px; color:white;'>
	
    <tbody>
      <tr class='active'>
        <td style='color:#F3F5F6;'>Collection</td>
        <td style='color:#F3F5F6;'>Segregation</td>
		<td style='color:#F3F5F6;'>Food Dispenser</td>
		<td style='color:#F3F5F6;'>Exhaust Fan</td>	
      </tr>  
		";
		  
//loop through the table and print the data into the table
while($row = mysqli_fetch_array($result)) {
	
   echo "<tr class='success'>"; 	
    $unit_id = $row['id'];
    //echo "<td>" . $row['id'] . "</td>";
	
    $column1 = "RECEIVED_BOOL1_2";
    $column2 = "RECEIVED_BOOL2_2";
    $column3 = "RECEIVED_BOOL3_2";
    $column4 = "RECEIVED_BOOL4_2";
	
    $current_bool_1 = $row['RECEIVED_BOOL1_2'];
	$current_bool_2 = $row['RECEIVED_BOOL2_2'];
	$current_bool_3 = $row['RECEIVED_BOOL3_2'];
	$current_bool_4 = $row['RECEIVED_BOOL4_2'];

	if($current_bool_1 == 1){
    $inv_current_bool_1 = 0;
	$text_current_bool_1 = "Collection";
	$color_current_bool_1 = "#33cc33";
	}
	//elseif($current_bool_1 == 1 && ($current_bool_2 == 1 || $current_bool_3 == 1 || $current_bool_4 == 1)){
	//$inv_current_bool_1 = 0;
	//$text_current_bool_1 = "OFF";
	//$color_current_bool_1 = "#efdecd";
	//}
	else{
    $inv_current_bool_1 = 1;
	$text_current_bool_1 = "Collection";
	$color_current_bool_1 = "#cc0000";
	}
	
	
	if($current_bool_2 == 1){
    $inv_current_bool_2 = 0;
	$text_current_bool_2 = "Segregation";
	$color_current_bool_2 = "#33cc33";
	}
	else{
    $inv_current_bool_2 = 1;
	$text_current_bool_2 = "Segregation";
	$color_current_bool_2 = "#cc0000";
	}
	
	
	if($current_bool_3 == 1){
    $inv_current_bool_3 = 0;
	$text_current_bool_3 = "Food";
	$color_current_bool_3 = "#33cc33";
	}
	else{
    $inv_current_bool_3 = 1;
	$text_current_bool_3 = "Food";
	$color_current_bool_3 = "#cc0000";
	}
	
	
	if($current_bool_4 == 1){
    $inv_current_bool_4 = 0;
	$text_current_bool_4 = "Fan";
	$color_current_bool_4 = "#33cc33";
	}
	else{
    $inv_current_bool_4 = 1;
	$text_current_bool_4 = "Fan";
	$color_current_bool_4 = "#cc0000";
	}

	if($current_bool_2 == 0 && $current_bool_3 == 0 && $current_bool_4 == 0){
	echo "<td><form action= update_values.php method= 'post'>
  	<input type='hidden' name='value2' value=$current_bool_1   size='15' >	
	<input type='hidden' name='value' value=$inv_current_bool_1  size='15' >	
  	<input type='hidden' name='unit' value=$unit_id >
  	<input type='hidden' name='column' value=$column1 >
  	<input type= 'submit' name= 'change_but' style=' margin-left: 0%; margin-top: 10%; margin-bottom: 10%; font-size: 20px; padding: 10px; text-align:center; background-color: $color_current_bool_1' value=$text_current_bool_1></form></td>";
	}

	if($current_bool_1 == 0 && $current_bool_3 == 0 && $current_bool_4 == 0){
	echo "<td><form action= update_values.php method= 'post'>
  	<input type='hidden' name='value2' value=$current_bool_2   size='15' >	
	<input type='hidden' name='value' value=$inv_current_bool_2  size='15' >	
  	<input type='hidden' name='unit' value=$unit_id >
  	<input type='hidden' name='column' value=$column2 >
  	<input type= 'submit' name= 'change_but' style=' margin-left: 5%; margin-top: 8%; margin-bottom: 10%; font-size: 20px; padding: 10px; text-align:center; background-color: $color_current_bool_2' value=$text_current_bool_2></form></td>";
	}
	
	if($current_bool_1 == 0 && $current_bool_2 == 0 && $current_bool_4 == 0){
	echo "<td><form action= update_values.php method= 'post'>
  	<input type='hidden' name='value2' value=$current_bool_3   size='15' >	
	<input type='hidden' name='value' value=$inv_current_bool_3  size='15' >	
  	<input type='hidden' name='unit' value=$unit_id >
  	<input type='hidden' name='column' value=$column3 >
  	<input type= 'submit' name= 'change_but' style=' margin-left: 5%; margin-top: 10%; margin-bottom: 10%; font-size: 20px; padding: 10px; text-align:center; background-color: $color_current_bool_3' value=$text_current_bool_3></form></td>";
	}
	
	if($current_bool_1 == 0 && $current_bool_3 == 0 && $current_bool_2 == 0){
	echo "<td><form action= update_values.php method= 'post'>
  	<input type='hidden' name='value2' value=$current_bool_4   size='15' >	
	<input type='hidden' name='value' value=$inv_current_bool_4  size='15' >	
  	<input type='hidden' name='unit' value=$unit_id >
  	<input type='hidden' name='column' value=$column4 >
  	<input type= 'submit' name= 'change_but' style=' margin-left: 5%; margin-top: 10%; margin-bottom: 10%; font-size: 20px; padding: 10px; text-align:center; background-color: $color_current_bool_4' value=$text_current_bool_4></form></td>";
	}
	
	echo "</tr>
	  </tbody>"; 
	
}
echo "</table>
<br>
";
?>



<br>
<a href="login-choose.php" style="text-decoration: none;padding: 8px 16px;
background-color: #ddd;color: black; margin-left: 2%; font-size: 13px">Back &raquo;</a>
<a href="logout.php" style="text-decoration: none;padding: 8px 16px;
background-color: #C46200;color: white; margin-left: 2%; font-size: 13px">LOG OUT &raquo;</a>
<br>
<br>


<!DOCTYPE html>
<html>
<head>
    <!--<meta http-equiv="refresh" content="5" > -->
    <meta name="viewport" content="with= device-width, initial-scale= 1.0">
    <link rel="stylesheet" type="text/css" href="control-style.css" media="screen"/>
	<title> POLYSEG </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,700;1,600&display=swap" rel="stylesheet">
</head>
<!--Footer-->
<footer class="footer">
    <h4>About Us</h4>
    <p>FULLY AUTOMATED POLYSTYRENE BIODEGRADING SYSTEM FOR MEALWORM 
        SEGREGATION USING ARDUINO MEGA 2560 <br> WITH ESP 32 FOR WIRELESS 
        NOTIFICATION<br>Technological University of the Philippines - Manila<br>
        Ayala Blvd, Ermita, Manila, 1000 Metro Manila<br><br>
        College of Engineering<br>
        Electronics Engineering Department<br>
        Email: pentatronics.polyseg@gmail.com • Contact No.: 0926 032 1173   
    </p>   
</footer>
</html>

<!-----------------php------------------> 
<?php
if(isset($_POST["logout"])){
    header("Location: logout.php");
}
?>