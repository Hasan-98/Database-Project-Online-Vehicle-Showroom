<!DOCTYPE html>
<html>
<head>
<title>MainPage</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}
.text2 {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  top: 8px;
  width: 100%;
  text-align: center;
}
/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: blue;
  margin-top: 25px;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  	padding: 12px;
	transition:0.5s ease;

  border: 1px solid #fff;

  text-decoration: none;
}

li a:hover {
	background-color: rgb(192,192,192);
	color:black;
}
ul li.active a{
	background-color: rgb(192,192,192);
	color:black;
}
header{
	height :66px;
	background-position:center;
	background-repeat: no-repeat;
	background-size : cover;
}
.logo img{
	float : left;
	width: 120px;
	height: 88px;
}

.headtext{
	max-width : 600px;
	margin: auto;
}
</style>
</head>
<body style="background-color:rgb(240, 240, 240)">
	<header>
		<div class = "logo">
<img src="logo1.jpg" alt="logo Icon" >
		</div>
	<div class = "headtext">
		<h1 style="font-style: italic; color: blue; ">You Order,<br> We Deliver !</h1>

	</div>
	</header>

<ul>
  <li class="active" ><a href="#home">Home</a></li>
  <li><a href="signupCopy.php" target="_blank">SignUp</a></li>
  <li><a href="loginCopy.php" target="_blank">Login</a></li>
  <li><a href="#C1">Contact</a></li>
  <li><a href="#C2">About us</a></li>
</ul>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="pic3.jpg" style="width:100%; height:100%;">
  <div class="text">Pic One</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="pic2.jpg" style="width:100%; height:100%;">
  <div class="text2"><h2>Order Your Dream CARR!</h2></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="pic1.jpg" style="width:100%; height:100%;">
  <div class="text">Pic Three</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 3 seconds
}
</script>
<br><br><br><br><br><br><br><br><br>
<div class="headtext">
<h2 id="C1">Contact</h2>
<p>Email: AutoShop.order@gmail.com</p>
<p>Phone: 051-7771414</p>
<p>Address:  Sector G-8, Near Nori Hospital, Islamabad</p>

<p>You can contact us at: <a href="http://www.pakpost.gov.pk/">AutoShop </a>
</p>
</div>
<div class="headtext">
<h2 id="C2">About us</h2>
<p>The main purpose of this Online Vehicle Showroom is that it provides provision to customers to buy or book vehicles 
or spare parts through online. 
It will make the process of buying and booking of products hustle free.
Our project aims at creating a website which holds customers records, online booking, 
online vehicle records and it provides easy to use web based interface for customers. </p>
</div>

</body>
</html>
