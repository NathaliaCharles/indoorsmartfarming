<!DOCTYPE html>
<html>
<head>
<title>Meteo page</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
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
            <h4>Weather prediction for the next 5 days </h4>
            <br/>
    </div> <br/>
  
    <div id="weatherapi-weather-widget-3"></div>
    <script type='text/javascript' src='https://www.weatherapi.com/weather/widget.ashx?loc=1597644&wid=3&tu=1&div=weatherapi-weather-widget-3' async>
    </script>
    <noscript>
        <a href= "https://www.weatherapi.com/weather/q/mahebourg-1597644" alt="Hour by hour Mahebourg weather">5 day hour by hour Mahebourg weather</a></noscript>
        </a>
    </noscript>

</body>

</html>