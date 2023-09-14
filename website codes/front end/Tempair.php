<?php

$servername = "fdb1028.awardspace.net";
$dbname = "4355543_soilmoisturedb";
$username = "4355543_soilmoisturedb";
$password = "rBE@rYTQHjgZ83t";

// Create connection
$db = mysqli_connect($servername, $dbname, $username, $password);

// Check connection
if (mysqli_connect_errno()) {
  echo "Connection to database is failed: ";
  exit();
}
echo "Connection successful!";

$sensor_data = [];
$sql = "SELECT id, value2, value3, reading_time FROM Sensor order by reading_time desc limit 40";

$result = $con->query($sql);

while ($data = $result->fetch_assoc()){
    $sensor_data[] = $data;
}

$readings_time = array_column($sensor_data, 'reading_time');


$value2 = json_encode(array_reverse(array_column($sensor_data, 'value2')), JSON_NUMERIC_CHECK);
$value3 = json_encode(array_reverse(array_column($sensor_data, 'value3')), JSON_NUMERIC_CHECK);
$reading_time = json_encode(array_reverse($readings_time), JSON_NUMERIC_CHECK);

/*echo $value2;
echo $value3;
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
     .text-block{
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
  </nav><br/><br/><br/>
  <div class="text-block">
            <br/>
            <h4> Indoor Smart Farming</h4>
            <br/>
    </div> <br/>
    <h2> </h2>
    <div id="chart-temperature" class="container"></div> <br/>
    <div id="chart-humidity" class="container"></div>
<script>

var value2 = [21.10000000000000142108547152020037174224853515625,21.10000000000000142108547152020037174224853515625,21.10000000000000142108547152020037174224853515625,21.10000000000000142108547152020037174224853515625,21.10000000000000142108547152020037174224853515625,21.10000000000000142108547152020037174224853515625,21.10000000000000142108547152020037174224853515625,21.10000000000000142108547152020037174224853515625,22.10000000000000142108547152020037174224853515625,22.10000000000000142108547152020037174224853515625,22.199999999999999289457264239899814128875732421875,22,22.10000000000000142108547152020037174224853515625,22.199999999999999289457264239899814128875732421875,22.10000000000000142108547152020037174224853515625,22.10000000000000142108547152020037174224853515625,22.199999999999999289457264239899814128875732421875,22.300000000000000710542735760100185871124267578125,22.199999999999999289457264239899814128875732421875,22.199999999999999289457264239899814128875732421875,21,22.199999999999999289457264239899814128875732421875,22.300000000000000710542735760100185871124267578125,22.39999999999999857891452847979962825775146484375,22.5,22.5,22.5,22.5,22.60000000000000142108547152020037174224853515625,24.5,28.10000000000000142108547152020037174224853515625,28.5,27.199999999999999289457264239899814128875732421875,26.60000000000000142108547152020037174224853515625,26,25.5,25.10000000000000142108547152020037174224853515625,24.699999999999999289457264239899814128875732421875,24.5,24.300000000000000710542735760100185871124267578125];
var value3 = [96,96.099999999999994315658113919198513031005859375,96.099999999999994315658113919198513031005859375,96.099999999999994315658113919198513031005859375,96.2000000000000028421709430404007434844970703125,96.2000000000000028421709430404007434844970703125,96.099999999999994315658113919198513031005859375,96.2000000000000028421709430404007434844970703125,71.2999999999999971578290569595992565155029296875,71.400000000000005684341886080801486968994140625,71.7000000000000028421709430404007434844970703125,71,71,71.5,70.5,70.5,71.099999999999994315658113919198513031005859375,72.900000000000005684341886080801486968994140625,71.400000000000005684341886080801486968994140625,71,70.400000000000005684341886080801486968994140625,71.2999999999999971578290569595992565155029296875,79.7000000000000028421709430404007434844970703125,71.7000000000000028421709430404007434844970703125,72.5,71.900000000000005684341886080801486968994140625,71.7999999999999971578290569595992565155029296875,72.7999999999999971578290569595992565155029296875,73.7999999999999971578290569595992565155029296875,75.2999999999999971578290569595992565155029296875,70.7000000000000028421709430404007434844970703125,65.099999999999994315658113919198513031005859375,61.89999999999999857891452847979962825775146484375,61.7999999999999971578290569595992565155029296875,62.2000000000000028421709430404007434844970703125,62.89999999999999857891452847979962825775146484375,64.2999999999999971578290569595992565155029296875,66.2999999999999971578290569595992565155029296875,66.2999999999999971578290569595992565155029296875,67];

var reading_time = ["2023-08-19 09:05:53","2023-08-19 09:06:16","2023-08-19 09:06:39","2023-08-19 09:07:03","2023-08-19 09:07:21","2023-08-19 09:07:38","2023-08-19 09:08:01","2023-08-19 09:08:19","2023-08-19 11:40:21","2023-08-19 11:40:38","2023-08-19 11:41:14","2023-08-19 11:41:34","2023-08-19 11:42:05","2023-08-19 11:42:26","2023-08-19 11:48:14","2023-08-19 11:48:36","2023-08-19 11:49:01","2023-08-19 11:49:28","2023-08-19 11:50:17","2023-08-19 11:50:56","2023-08-19 11:51:27","2023-08-19 11:51:44","2023-08-19 11:52:08","2023-08-19 12:13:21","2023-08-19 12:13:43","2023-08-19 12:14:06","2023-08-19 12:14:28","2023-08-19 12:14:56","2023-08-19 12:15:19","2023-08-19 12:15:43","2023-08-19 12:16:04","2023-08-19 12:16:30","2023-08-19 12:16:54","2023-08-19 12:17:15","2023-08-19 12:17:41","2023-08-19 12:18:01","2023-08-19 12:18:35","2023-08-19 12:18:59","2023-08-19 12:19:22","2023-08-19 12:19:46"];

var chartT = new Highcharts.Chart({
  chart:{ renderTo : 'chart-temperature' },
  title: { text: 'Temperature Level' },
  series: [{
    showInLegend: false,
    data: value2
  }],
  plotOptions: {
    line: { animation: false,
      dataLabels: { enabled: true }
    },
    series: { color: '#059e8a' }
  },
  xAxis: {
    type: 'datetime',
    categories: reading_time
  },
  yAxis: {
    title: { text: 'Temperature (degree celsius)' }
  },
  credits: { enabled: false }
});
 
 
var chartT1 = new Highcharts.Chart({
  chart:{ renderTo : 'chart-humidity' },
  title: { text: 'Humidity Level' },
  series: [{
    showInLegend: false,
    data: value3
  }],
  plotOptions: {
    line: { animation: false,
      dataLabels: { enabled: true }
    },
    series: { color: '#059e8a' }
  },
  xAxis: {
    type: 'datetime',
    categories: reading_time
  },
  yAxis: {
    //title: { text: 'Relative Moisture' }
    title: { text: 'Percentage' }
  },
  credits: { enabled: false }
});
</script>
</body>
</html>