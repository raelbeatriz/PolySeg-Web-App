<?php
session_start();

if ($_SESSION["status"] != true){

    header("Location: login-page.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <!--<meta http-equiv="refresh" content="5" > -->
    <meta name="viewport" content="with= device-width, initial-scale= 1.0">
    <link rel="stylesheet" type="text/css" href="monitoring-style.css" media="screen"/>
	<title> POLYSEG </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,700;1,600&display=swap" rel="stylesheet">
</head>

<body>
<section class="sub-header"> 
    <h1>Monitor</h1>
    <a href="monitoring-page1.php" style="color: rgb(80, 59, 0); font-size: 13px; text-decoration: none;" name='temp-link'>> Temperature & Humidity</a><br>
    <a href="monitoring-page2.php" style="color: rgb(80, 59, 0); font-size: 13px; text-decoration: none;" name='weight-link'>> Weight</a>
    </section>
    <div class = "sensors-box">

<!--For Temp and Humidity notification-->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "polyseg";
 
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
 
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()."<br>");
}
//echo "Connected successfully <br>";
mysqli_select_db($conn,$dbname);
 
$qry1 = mysqli_query($conn, "SELECT * FROM tempData");
while($result1= mysqli_fetch_array($qry1)){
    //echo $result["value1"];
    if ($result1['value1']>=27.5)
    echo "NOTICE: ".$result1['reading_time'].", temperature is ".$result1['value1']." C. <script type='text/javascript'> alert('Temperature: Reached the 27.5 C limit');</script><br>";
} 

$qry2 = mysqli_query($conn, "SELECT * FROM tempData");
while($result2= mysqli_fetch_array($qry2)){
    //echo $result["value2"];
    if ($result2['value2']>=90)
    echo "NOTICE: ".$result2['reading_time'].", humidity is ".$result2['value2']." %. <script type='text/javascript'> alert('Humidity: Reached the 90% limit');</script><br>";
} 
mysqli_close($conn);
?>




<!--For Temp and Humidity chart-->
<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<body >
<?Php
require "config-pdo.php";// Database connection
$query="SELECT reading_time,value1,value2
 FROM tempData";
$step=$dbo->prepare($query);
if($step->execute()){
$php_data_array=$step->fetchAll();
//print_r($php_data_array);
echo "<script>
      var my_2d= ".json_encode($php_data_array)."
			</script>";
}
?>
<div id='curve_chart'></div>
<script type="text/javascript"
	src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current',{packages:['corechart']})
google.charts.setOnLoadCallback(tempChart);
function tempChart(){
	//var data=new google.visualization
	var data=new google.visualization.DataTable();
	data.addColumn('string','reading_time');
	data.addColumn('number','temperature');
	data.addColumn('number','humidity');
	data.addColumn('number','');
	data.addColumn('number','');
	for(i=0;i<my_2d.length;i++)
data.addRow([my_2d[i][0],parseInt(my_2d[i][1]),parseInt(my_2d[i][2]),
parseInt(my_2d[i][3]),parseInt(my_2d[i][4])]);

var options = {
 title: 'Temperature and Humidity Sensor Data',
 curveType: 'function',
width: 1230,
 height: 600,
	 legend: { position: 'bottom' },
	   animation:{'startup':true,
        duration: 5000,
        easing: 'out',
      },
 };
 var chart=new
 google.visualization.LineChart(document.getElementById('curve_chart'))
chart.draw(data,options);
}
</script>
</body>
</html>
<br>
<br>
<br>
<br>


<!--For Temp and Humidity Table-->
    <h1 class = "sensor-title">TEMPERATURE & HUMIDITY SENSOR DATA</h1>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "polyseg";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, value1, value2, reading_time FROM tempData ORDER BY id DESC"; /*select items to display from the Temp data table in the data base*/

echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        <th>ID</th> 
        <th>Date & Time</th>  
        <th>Temperature &deg;C</th> 
        <th>Humidity &#37;</th>      
      </tr>';
 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_id = $row["id"];
        $row_reading_time = $row["reading_time"];
        $row_value1 = $row["value1"];
        $row_value2 = $row["value2"]; 
        
        // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
       // $row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));
      
        // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));
      
        echo '<tr> 
                <td>' . $row_id . '</td> 
                <td>' . $row_reading_time . '</td> 
                <td>' . $row_value1 . '</td> 
                <td>' . $row_value2 . '</td>
                
              </tr>';
    }
    $result->free();
}

$conn->close();
?> 
</table>
</div>
<br>
<a href="login-choose.php" style="text-decoration: none;padding: 8px 16px;
background-color: #ddd;color: black; margin-left: 2%; font-size: 13px">Back &raquo;</a>
<a href="logout.php" style="text-decoration: none;padding: 8px 16px;
background-color: #C46200;color: white; margin-left: 2%; font-size: 13px">LOG OUT &raquo;</a>
<br>
</body>
<br>
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


<!-----------php----------------->
<?php
if(isset($_POST["logout"])){
    header("Location: logout.php");
}
?>