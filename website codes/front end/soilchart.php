<?php

$servername = "fdb1028.awardspace.net";
$dbname = "4355543_soilmoisturedb";
$username = "4355543_soilmoisturedb";
$password = "rBE@rYTQHjgZ83t";


$db = '';
// Create connection
$db = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno()) {
  echo "Connection to database is failed: ";
  exit();
}
echo "Connection successful!";
$sensor_data = [];
$sql = "SELECT id, value1, reading_time FROM Sensor order by reading_time desc limit 40";

$result = $con->query($sql);

while ($data = $result->fetch_assoc()){
    $sensor_data[] = $data;
}

$readings_time = array_column($sensor_data, 'reading_time');

$value1 = json_encode(array_reverse(array_column($sensor_data, 'value1')), JSON_NUMERIC_CHECK);
$reading_time = json_encode(array_reverse($readings_time), JSON_NUMERIC_CHECK);

/*echo $value1;

echo $reading_time;*/

$result->free();
$db->close();
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="refresh" content="30">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <style>
  
    body {
      min-width: 310px;
      max-width: 1280px;
      height: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      margin: 0 auto;
      background-image: url(soilbg.jpg);
      
    }
    h2 {
      font-family: Arial;
      font-size: 2.5rem;
      text-align: center;
    }
    .buttonON {
        display: inline-block;
        padding: 15px 25px;
        font-size: 24px;
        font-weight: bold;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: #fff;
        background-color: #2CF30B;
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px #999;
        margin: 0;
        position: absolute;
        top:110%;
        left: 30%;
      }
      .buttonON:hover {background-color: #3e8e41}
      .buttonON:active {
        background-color: #3e8e41;
        box-shadow: 0 1px #666;
        transform: translateY(4px);
      }
        
      .buttonOFF {
        display: inline-block;
        padding: 15px 25px;
        font-size: 24px;
        font-weight: bold;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: #fff;
        background-color: #8B0000;
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px #999;
        margin: 0;
        position: absolute;
        top:110%;
        left: 60%;
  
      }
      .buttonOFF:hover {background-color: #c0392b}
      .buttonOFF:active {
        background-color: #c0392b;
        box-shadow: 0 1px #666;
        transform: translateY(4px);
        
      }
      .text-block{
      background-color:white;
      text-align: center;
    }
    
    .text-block{
      background-color:#B2BEB5;
      text-align: center;
    } 
    .text-block1{
      background-color:#B2BEB5;
      text-align: center;
    }
    
  </style>
  <body>
<nav class="navbar navbar-inverse" style="height: 5%; position:absolute; left:0; right:0;">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Home</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="soilchart.php">Moisture Value</a></li>
        <li><a href="Tempair.php">Temperature Value</a></li>
        <li><a href="meteo.php">Meteo Cart</a></li>
        <li><a href="aboutus.php">About Us</a></li>
      </ul>
    </div>
  </nav> <br/><br/> <br/>
  
  <div class="text-block">
            <br/>
            <h4> Indoor Smart Farming</h4>
            <br/>
    </div> <br/>
  
    <h2>   </h2>
    <div id="chart-soilmoisture" class="container"></div>
    <br>
    <br>
    <div class="text-block1">
            <br/>
            <h4>Switch ON and OFF the pump</h4>
            <br/>
    </div><br/><br/>

      
<script>

var value1 = [10,10,10,10,10,10,10,10,16,-6,14,15,14,17,17,-4,0,0,-6,12,13,13,13,15,15,15,0,-2,16,17,17,14,14,14,16,16,15,11,17,16];
var reading_time = ["2023-08-19 09:05:53","2023-08-19 09:06:16","2023-08-19 09:06:39","22023-08-19 09:07:03","2023-08-19 09:07:21","2023-08-19 09:07:38","2023-08-19 09:08:01","2023-08-19 09:08:19","2023-08-19 11:40:21","2023-08-19 11:40:38","2023-08-19 11:41:14","2022-08-19 11:41:34","2023-08-19 11:42:05","2023-08-19 11:42:26","2023-08-19 11:48:14","2023-08-19 11:48:36","2023-08-19 11:49:01","2023-08-19 11:49:28","2023-08-19 11:50:17","2023-08-19 11:50:56","2023-08-19 11:51:27","2023-08-19 11:51:44","2023-08-19 11:52:08","2023-08-19 12:13:21","2023-08-19 12:13:43","2023-08-19 12:14:06","2023-08-19 12:14:28","2023-08-19 12:14:56","2023-08-19 12:15:19","2023-08-19 12:15:43","2023-08-19 12:16:04","2023-08-19 12:16:30","2023-08-19 12:16:54","2023-08-19 12:17:15","2023-08-19 12:17:41","2023-08-19 12:18:01","2023-08-19 12:18:35","2023-08-19 12:18:59","2023-08-19 12:19:22","2023-08-19 12:19:46"];

var chartT = new Highcharts.Chart({
  chart:{ renderTo : 'chart-soilmoisture' },
  title: { text: 'Soil Moisture Level' },
  series: [{
    showInLegend: false,
    data: value1
  }],
  plotOptions: {
    line: { animation: false,
      dataLabels: { enabled: true }
    },
    series: { color: '#00FF00' }
  },
  xAxis: {
    type: 'datetime',
    categories: reading_time
  },
  yAxis: {
    title: { text: 'Relative Moisture' }
    //title: { text: 'Temperature (Fahrenheit)' }
  },
  credits: { enabled: false }

});


</script>
<br/>
<form action="updateDBLED.php" method="post" id="PUMP_ON" onsubmit="myFunction()">
      <input type="hidden" name="Stat" value="1"/>    
    </form>
    
    <form action="updateDBLED.php" method="post" id="PUMP_OFF">
      <input type="hidden" name="Stat" value="0"/>
    </form>
    
    <button class="buttonON" name= "subject" type="submit" form="PUMP_ON" value="SubmitPUMPON" >PUMP ON</button>
    <button class="buttonOFF" name= "subject" type="submit" form="PUMP_OFF" value="SubmitPUMPOFF">PUMP OFF</button>
</body>
</html>