<!DOCTYPE html>
<html>
<head>
	<title>About Us Section</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>	
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap');
*{
	margin:0px;
	padding:0px;
	box-sizing: border-box;
	font-family: 'Poppins', sans-serif;
}
.section{
	width: 100%;
	min-height: 100vh;
        background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
	background-image: url(aboutusbg.jpg);
}
.container{
	width: 80%;
	display: block;
	margin:auto;
	padding-top: 100px;
}
.content-section{
	float: left;
	width: 55%;
}
.image-section{
	float: right;
	width: 40%;
}
.image-section img{
	width: 100%;
	height: auto;
}
.content-section .title{
	text-transform: uppercase;
	font-size: 28px;
}
.content-section .content h3{
	margin-top: 20px;
	color:#5d5d5d;
	font-size: 21px;
}
.content-section .content p{
	margin-top: 10px;
	font-family: sans-serif;
	font-size: 18px;
	line-height: 1.5;
}

@media screen and (max-width: 768px){
	.container{
	width: 80%;
	display: block;
	margin:auto;
	padding-top:50px;
}
.content-section{
	float:none;
	width:100%;
	display: block;
	margin:auto;
}
.image-section{
	float:none;
	width:100%;
	
}
.image-section img{
	width: 100%;
	height: auto;
	display: block;
	margin:auto;
}
.content-section .title{
	text-align: center;
	font-size: 19px;
}

.imgContainer{
    float:left;
}

}
</style>
<body>
	
	<div class="section">
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
	</nav>
		<div class="container">
			<div class="content-section">
				<div class="title">
					<h1>About Us</h1>
				</div>
				<div class="write">
					<h3>Indoor Smart Farming</h3>
					<p>For my 3rd year at Open University of Mauritius, I have done this project as my final year project, 
                                        Indoor Smart Farming.
                                        ISF(Indoor Smart Farming) consist of 3 main types of irrigation and a shade system. The types of irrigation are: 
                                         <br> (1) Automatic Irrigation, it automatically irrigates the plant when it need water.</br>

                                         <br> (2) Programmed Irrigation, the plant is irrigated at 08 00 everyday and </br>
										 <br> (3) Manual irrigation, we just only need to click on on and off button on soil moisture page. </br>

                                         The shade system consist of covering the plant when it's too hot.
                                        </p>
				</div>
			<br/>
			<img class=mobile-image src="uni_logo.jpg" alt="Snow" style="height: 70" >
			
			
<style>
  .img {
    display: inline-block;
  }
  img.mobile-image {
    width: 49%;
    display: inline-block;
    float: left;
  	width: 50%;
  	padding: 5px;
	content: "";
  }
</style>
			</div>
			<div class="image-section">
				<img src="bg1.jpg">
			</div>
		</div>
	</div>

	
</body>
</html>)