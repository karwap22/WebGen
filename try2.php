<?php
	session_start();
	if (isset($_SESSION['name']))
	{
	$username = $_SESSION["name"];
	}
	else{
		header('location:login.php');
	}
    $fname = $_POST["name"];
    $email = $_POST["email"];
    $prof = $_POST["prof"];
    $linkedin = $_POST["linkedin"];
    $links = $_POST["links"];
    $desc = $_POST["desc"];
    $descpr = $_POST["descpr"];
    $pro1 = $_POST["pro1"];
    $pro2 = $_POST["pro2"];
    $address = $_POST["address"];
    $theme = $_POST["theme"];
	$color1 = $_POST["color1"];
	$color2 = $_POST["color2"];

	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "ed_project";

//create connection

	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

	if (mysqli_connect_error()) {
		alert("Server is down. Try again later !!");
	} else {
		$INSERT = "INSERT INTO websites(username,fname,email,profession,linkedin,links,desciption,descpr,pro1,pro2,address,theme,color1,color2) values('$username','$fname','$email','$prof','$linkedin','$links','$desc','$descpr','$pro1','$pro2','$address','$theme','$color1','$color2')";
		$stmt = $conn->prepare($INSERT);
		
			$stmt->execute();
			$stmt->close();
	$conn->close();

	}


    if ($theme == "Theme1") {
        
    $curdir = getcwd();
    mkdir($curdir.'/'.$fname);
    $uploaddir = $curdir.'/'.$fname.'/';
	$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
		rename($uploadfile,$uploaddir.'/profile_pic.jpg');
		echo "File is valid, and was successfully uploaded.\n";
	  } else {
		 echo "Upload failed";
	  }
	  $curdir = getcwd();
	  mkdir($curdir.'/'.$fname);
	  $uploaddir = $curdir.'/'.$fname.'/';
	  $uploadfile = $uploaddir . basename($_FILES['userresfile']['name']);
	  if (move_uploaded_file($_FILES['userresfile']['tmp_name'], $uploadfile)) {
		  rename($uploadfile,$uploaddir.'/resume.pdf');
		  echo "File is valid, and was successfully uploaded.\n";
		} else {
		   echo "Upload failed";
		}
  




    //creating style file
    $myfile = fopen($curdir.'/'.$fname."/style.css", "w") or die("Unable to open file!");
    $txt = "
    @import 'https://fonts.googleapis.com/css?family=Montserrat:300, 400, 700&display=swap';
* {
	padding: 0;
	margin: 0;
	box-sizing: border-box;
}
html {
	font-size: 10px;
	font-family: 'Montserrat', sans-serif;
	scroll-behavior: smooth;
}
a {
	text-decoration: none;
}
.container {
	min-height: 100vh;
	width: 100%;
	display: flex;
	align-items: center;
	justify-content: center;
}
img {
	height: 100%;
	width: 100%;
	object-fit: cover;
}
p {
	color: black;
	font-size: 1.4rem;
	margin-top: 5px;
	line-height: 2.5rem;
	font-weight: 300;
	letter-spacing: 0.05rem;
}
.section-title {
	font-size: 4rem;
	font-weight: 300;
	color: black;
	margin-bottom: 10px;
	text-transform: uppercase;
	letter-spacing: 0.2rem;
	text-align: center;
}
.section-title span {
	color: crimson;
}

.cta {
	display: inline-block;
	padding: 10px 30px;
	color: white;
	background-color: transparent;
	border: 2px solid crimson;
	font-size: 2rem;
	text-transform: uppercase;
	letter-spacing: 0.1rem;
	margin-top: 30px;
	transition: 0.3s ease;
	transition-property: background-color, color;
}
.cta:hover {
	color: white;
	background-color: $color1;
}
.brand h1 {
	font-size: 3rem;
	text-transform: uppercase;
	color: white;
}
.brand h1 span {
	color: $color2;
}

/* Header section */
#header {
	position: fixed;
	z-index: 1000;
	left: 0;
	top: 0;
	width: 100vw;
	height: auto;
}
#header .header {
	min-height: 8vh;
	background-color: rgba(31, 30, 30, 0.24);
	transition: 0.3s ease background-color;
}
#header .nav-bar {
	display: flex;
	align-items: center;
	justify-content: space-between;
	width: 100%;
	height: 100%;
	max-width: 1300px;
	padding: 0 10px;
}
#header .nav-list ul {
	list-style: none;
	position: absolute;
	background-color: rgb(31, 30, 30);
	width: 100vw;
	height: 100vh;
	left: 100%;
	top: 0;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	z-index: 1;
	overflow-x: hidden;
	transition: 0.5s ease left;
}
#header .nav-list ul.active {
	left: 0%;
}
#header .nav-list ul a {
	font-size: 2.5rem;
	font-weight: 500;
	letter-spacing: 0.2rem;
	text-decoration: none;
	color: white;
	text-transform: uppercase;
	padding: 20px;
	display: block;
}
#header .nav-list ul a::after {
	content: attr(data-after);
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%) scale(0);
	color: rgba(240, 248, 255, 0.021);
	font-size: 13rem;
	letter-spacing: 50px;
	z-index: -1;
	transition: 0.3s ease letter-spacing;
}
#header .nav-list ul li:hover a::after {
	transform: translate(-50%, -50%) scale(1);
	letter-spacing: initial;
}
#header .nav-list ul li:hover a {
	color: crimson;
}
#header .hamburger {
	height: 60px;
	width: 60px;
	display: inline-block;
	border: 3px solid white;
	border-radius: 50%;
	position: relative;
	display: flex;
	align-items: center;
	justify-content: center;
	z-index: 100;
	cursor: pointer;
	transform: scale(0.8);
	margin-right: 20px;
}
#header .hamburger:after {
	position: absolute;
	content: '';
	height: 100%;
	width: 100%;
	border-radius: 50%;
	border: 3px solid white;
	animation: hamburger_puls 1s ease infinite;
}
#header .hamburger .bar {
	height: 2px;
	width: 30px;
	position: relative;
	background-color: white;
	z-index: -1;
}
#header .hamburger .bar::after,
#header .hamburger .bar::before {
	content: '';
	position: absolute;
	height: 100%;
	width: 100%;
	left: 0;
	background-color: white;
	transition: 0.3s ease;
	transition-property: top, bottom;
}
#header .hamburger .bar::after {
	top: 8px;
}
#header .hamburger .bar::before {
	bottom: 8px;
}
#header .hamburger.active .bar::before {
	bottom: 0;
}
#header .hamburger.active .bar::after {
	top: 0;
}
/* End Header section */

/* Hero Section */
#hero {
	background-image: url(./img/hero-bg.png);
	background-size: cover;
	background-position: top center;
	position: relative;
	z-index: 1;
}
#hero::after {
	content: '';
	position: absolute;
	left: 0;
	top: 0;
	height: 100%;
	width: 100%;
	background-color: black;
	opacity: 0.7;
	z-index: -1;
}
#hero .hero {
	max-width: 1200px;
	margin: 0 auto;
	padding: 0 50px;
	justify-content: flex-start;
}
#hero h1 {
	display: block;
	width: fit-content;
	font-size: 4rem;
	position: relative;
	color: transparent;
	animation: text_reveal 0.5s ease forwards;
	animation-delay: 1s;
}
#hero h1:nth-child(1) {
	animation-delay: 1s;
}
#hero h1:nth-child(2) {
	animation-delay: 2s;
}
#hero h1:nth-child(3) {
	animation: text_reveal_name 0.5s ease forwards;
	animation-delay: 3s;
}
#hero h1 span {
	position: absolute;
	top: 0;
	left: 0;
	height: 100%;
	width: 0;
	background-color: crimson;
	animation: text_reveal_box 1s ease;
	animation-delay: 0.5s;
}
#hero h1:nth-child(1) span {
	animation-delay: 0.5s;
}
#hero h1:nth-child(2) span {
	animation-delay: 1.5s;
}
#hero h1:nth-child(3) span {
	animation-delay: 2.5s;
}

/* End Hero Section */

/* Services Section */
#services .services {
	flex-direction: column;
	text-align: center;
	max-width: 1500px;
	margin: 0 auto;
	padding: 100px 0;
}
#services .service-top {
	max-width: 500px;
	margin: 0 auto;
}
#services .service-bottom {
	display: flex;
	align-items: center;
	justify-content: center;
	flex-wrap: wrap;
	margin-top: 50px;
}
#services .service-item {
	flex-basis: 80%;
	display: flex;
	align-items: flex-start;
	justify-content: center;
	flex-direction: column;
	padding: 30px;
	border-radius: 10px;
	background-image: url(./img/img-1.png);
	background-size: cover;
	margin: 10px 5%;
	position: relative;
	z-index: 1;
	overflow: hidden;
}
#services .service-item::after {
	content: '';
	position: absolute;
	left: 0;
	top: 0;
	height: 100%;
	width: 100%;
	background-image: linear-gradient(60deg, #29323c 0%, #485563 100%);
	opacity: 0.9;
	z-index: -1;
}
#services .service-bottom .icon {
	height: 80px;
	width: 80px;
	margin-bottom: 20px;
}
#services .service-item h2 {
	font-size: 2rem;
	color: white;
	margin-bottom: 10px;
	text-transform: uppercase;
}
#services .service-item p {
	color: white;
	text-align: left;
}
/* End Services Section */

/* Projects section */
#projects .projects {
	flex-direction: column;
	max-width: 1200px;
	margin: 0 auto;
	padding: 100px 0;
}
#projects .projects-header h1 {
	margin-bottom: 50px;
}
#projects .all-projects {
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
}
#projects .project-item {
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	width: 80%;
	margin: 20px auto;
	overflow: hidden;
	border-radius: 10px;
}
#projects .project-info {
	padding: 30px;
	flex-basis: 50%;
	height: 100%;
	display: flex;
	align-items: flex-start;
	justify-content: center;
	flex-direction: column;
	background-image: linear-gradient(60deg, #29323c 0%, #485563 100%);
	color: white;
}
#projects .project-info h1 {
	font-size: 4rem;
	font-weight: 500;
}
#projects .project-info h2 {
	font-size: 1.8rem;
	font-weight: 500;
	margin-top: 10px;
}
#projects .project-info p {
	color: white;
}
#projects .project-img {
	flex-basis: 50%;
	height: 300px;
	overflow: hidden;
	position: relative;
}
#projects .project-img:after {
	content: '';
	position: absolute;
	left: 0;
	top: 0;
	height: 100%;
	width: 100%;
	background-image: linear-gradient(60deg, #29323c 0%, #485563 100%);
	opacity: 0.7;
}
#projects .project-img img {
	transition: 0.3s ease transform;
}
#projects .project-item:hover .project-img img {
	transform: scale(1.1);
}
/* End Projects section */

/* About Section */
#about .about {
	flex-direction: column-reverse;
	text-align: center;
	max-width: 1200px;
	margin: 0 auto;
	padding: 100px 20px;
}
#about .col-left {
	width: 250px;
	height: 360px;
}
#about .col-right {
	width: 100%;
}
#about .col-right h2 {
	font-size: 1.8rem;
	font-weight: 500;
	letter-spacing: 0.2rem;
	margin-bottom: 10px;
}
#about .col-right p {
	margin-bottom: 20px;
}
#about .col-right .cta {
	color: black;
	margin-bottom: 50px;
	padding: 10px 20px;
	font-size: 2rem;
}
#about .col-left .about-img {
	height: 100%;
	width: 100%;
	position: relative;
	border: 10px solid white;
}
#about .col-left .about-img::after {
	content: '';
	position: absolute;
	left: -33px;
	top: 19px;
	height: 98%;
	width: 98%;
	border: 7px solid crimson;
	z-index: -1;
}
/* End About Section */

/* contact Section */
#contact .contact {
	flex-direction: column;
	max-width: 1200px;
	margin: 0 auto;
	width: 90%;
}
#contact .contact-items {
	/* max-width: 400px; */
	width: 100%;
}
#contact .contact-item {
	width: 80%;
	padding: 20px;
	text-align: center;
	border-radius: 10px;
	padding: 30px;
	margin: 30px;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	box-shadow: 0px 0px 18px 0 #0000002c;
	transition: 0.3s ease box-shadow;
}
#contact .contact-item:hover {
	box-shadow: 0px 0px 5px 0 #0000002c;
}
#contact .icon {
	width: 70px;
	margin: 0 auto;
	margin-bottom: 10px;
}
#contact .contact-info h1 {
	font-size: 2.5rem;
	font-weight: 500;
	margin-bottom: 5px;
}
#contact .contact-info h2 {
	font-size: 1.3rem;
	line-height: 2rem;
	font-weight: 500;
}
/*End contact Section */

/* Footer */
#footer {
	background-image: linear-gradient(60deg, #29323c 0%, #485563 100%);
}
#footer .footer {
	min-height: 200px;
	flex-direction: column;
	padding-top: 50px;
	padding-bottom: 10px;
}
#footer h2 {
	color: white;
	font-weight: 500;
	font-size: 1.8rem;
	letter-spacing: 0.1rem;
	margin-top: 10px;
	margin-bottom: 10px;
}
#footer .social-icon {
	display: flex;
	margin-bottom: 30px;
}
#footer .social-item {
	height: 50px;
	width: 50px;
	margin: 0 5px;
}
#footer .social-item img {
	filter: grayscale(1);
	transition: 0.3s ease filter;
}
#footer .social-item:hover img {
	filter: grayscale(0);
}
#footer p {
	color: white;
	font-size: 1.3rem;
}
/* End Footer */

/* Keyframes */
@keyframes hamburger_puls {
	0% {
		opacity: 1;
		transform: scale(1);
	}
	100% {
		opacity: 0;
		transform: scale(1.4);
	}
}
@keyframes text_reveal_box {
	50% {
		width: 100%;
		left: 0;
	}
	100% {
		width: 0;
		left: 100%;
	}
}
@keyframes text_reveal {
	100% {
		color: white;
	}
}
@keyframes text_reveal_name {
	100% {
		color: crimson;
		font-weight: 500;
	}
}
/* End Keyframes */

/* Media Query For Tablet */
@media only screen and (min-width: 768px) {
	.cta {
		font-size: 2.5rem;
		padding: 20px 60px;
	}
	h1.section-title {
		font-size: 6rem;
	}

	/* Hero */
	#hero h1 {
		font-size: 7rem;
	}
	/* End Hero */

	/* Services Section */
	#services .service-bottom .service-item {
		flex-basis: 45%;
		margin: 2.5%;
	}
	/* End Services Section */

	/* Project */
	#projects .project-item {
		flex-direction: row;
	}
	#projects .project-item:nth-child(even) {
		flex-direction: row-reverse;
	}
	#projects .project-item {
		height: 400px;
		margin: 0;
		width: 100%;
		border-radius: 0;
	}
	#projects .all-projects .project-info {
		height: 100%;
	}
	#projects .all-projects .project-img {
		height: 100%;
	}
	/* End Project */

	/* About */
	#about .about {
		flex-direction: row;
	}
	#about .col-left {
		width: 600px;
		height: 400px;
		padding-left: 60px;
	}
	#about .about .col-left .about-img::after {
		left: -45px;
		top: 34px;
		height: 98%;
		width: 98%;
		border: 10px solid crimson;
	}
	#about .col-right {
		text-align: left;
		padding: 30px;
	}
	#about .col-right h1 {
		text-align: left;
	}
	/* End About */

	/* contact  */
	#contact .contact {
		flex-direction: column;
		padding: 100px 0;
		align-items: center;
		justify-content: center;
		min-width: 20vh;
	}
	#contact .contact-items {
		width: 100%;
		display: flex;
		flex-direction: row;
		justify-content: space-evenly;
		margin: 0;
	}
	#contact .contact-item {
		width: 30%;
		margin: 0;
		flex-direction: row;
	}
	#contact .contact-item .icon {
		height: 100px;
		width: 100px;
	}
	#contact .contact-item .icon img {
		object-fit: contain;
	}
	#contact .contact-item .contact-info {
		width: 100%;
		text-align: left;
		padding-left: 20px;
	}
	/* End contact  */
}
/* End Media Query For Tablet */

/* Media Query For Desktop */
@media only screen and (min-width: 1200px) {
	/* header */
	#header .hamburger {
		display: none;
	}
	#header .nav-list ul {
		position: initial;
		display: block;
		height: auto;
		width: fit-content;
		background-color: transparent;
	}
	#header .nav-list ul li {
		display: inline-block;
	}
	#header .nav-list ul li a {
		font-size: 1.8rem;
	}
	#header .nav-list ul a:after {
		display: none;
	}
	/* End header */

	#services .service-bottom .service-item {
		flex-basis: 22%;
		margin: 1.5%;
	}
}
/* End  Media Query For Desktop */

    ";
    fwrite($myfile, $txt);
    fclose($myfile);


    //creating js file
    $myfile = fopen($curdir.'/'.$fname."/app.js", "w") or die("Unable to open file!");
    $txt = "
    const hamburger = document.querySelector('.header .nav-bar .nav-list .hamburger');
const mobile_menu = document.querySelector('.header .nav-bar .nav-list ul');
const menu_item = document.querySelectorAll('.header .nav-bar .nav-list ul li a');
const header = document.querySelector('.header.container');

hamburger.addEventListener('click', () => {
	hamburger.classList.toggle('active');
	mobile_menu.classList.toggle('active');
});

document.addEventListener('scroll', () => {
	var scroll_position = window.scrollY;
	if (scroll_position > 250) {
		header.style.backgroundColor = '#29323c';
	} else {
		header.style.backgroundColor = 'transparent';
	}
});

menu_item.forEach((item) => {
	item.addEventListener('click', () => {
		hamburger.classList.toggle('active');
		mobile_menu.classList.toggle('active');
	});
});

    ";
    fwrite($myfile, $txt);
    fclose($myfile);

    //creating js file
    $myfile = fopen($curdir.'/'.$fname."/index.html", "w") or die("Unable to open file!");
    $txt = "
    
    <!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <link rel='stylesheet' href='style.css'>
  <title>My Website</title>
  <style>
    #header{
      background-color: $color1;
    }
    .cta {
      border-color: $color1;
    }
    .cta:hover{
      background-color: $color1;
      border-color: $color1;
    }
    .section-title span {
	color: $color2;
}
    .brand span{
      color: $color2;
    }
    ul:hover{
      color: $color2;
    }
  </style>
</head>

<body>
  <!-- Header -->
  <section id='header'>
    <div class='header container'>
      <div class='nav-bar'>
        <div class='brand'>
          <a href='#hero'>
            <h1><span>$fname</span></h1>
          </a>
        </div>
        <div class='nav-list'>
          <div class='hamburger'>
            <div class='bar'></div>
          </div>
          <ul>
            <li><a href='#hero' data-after='Home'>Home</a></li>
            <li><a href='#services' data-after='Service'>Profession</a></li>
            <li><a href='#projects' data-after='Projects'>Projects</a></li>
            <li><a href='#about' data-after='About'>About</a></li>
            <li><a href='#contact' data-after='Contact'>Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->


  <!-- Hero Section  -->
  <section id='hero'>
    <div class='hero container'>
      <div>
        <h1>Hello, <span></span></h1>
        <h1>My Name is <span></span></h1>
        <h1>$fname<span></span></h1>
        <a href='#projects' type='button' class='cta'>Portfolio</a>
      </div>
    </div>
  </section>
  <!-- End Hero Section  -->

  <!-- Service Section -->
  <section id='services'>
    <div class='services container'>
      <div class='service-top'>
        <h1 class='section-title'>Prof<span>e</span>ssion</h1>
        
      </div>
      <div class='service-bottom'>
        <div class='service-item' style='min-width:50vh;'>
          <div class='icon'><img src='https://img.icons8.com/bubbles/100/000000/services.png' /></div>
          <h2>Expertise</h2>
          <p>$descpr</p>
        </div>
      </div>
    </div>
  </section>
  <!-- End Service Section -->
  <!-- Projects Section -->
  <section id='projects'>
    <div class='projects container'>
      <div class='projects-header'>
        <h1 class='section-title'>Recent <span>Projects</span></h1>
      </div>
      <div class='all-projects'>
        <div class='project-item'>
          <div class='project-info'>
            <h1>Project 1</h1>
            <p>$pro1</p>
          </div>
          <div class='project-img'>
            
          </div>
        </div>
        <div class='project-item'>
          <div class='project-info'>
            <h1>Project 2</h1>
            <p>$pro2</p>
          </div>
          <div class='project-img'>
            
          </div>
        </div>
        
        </div>
      </div>
    </div>
  </section>
  <!-- End Projects Section -->

  <!-- About Section -->
  <section id='about'>
    <div class='about container'>
      <div class='col-left'>
        <div class='about-img'>
          <img src='./profile_pic.jpg' alt='img'>
        </div>
      </div>
      <div class='col-right'>
        <h1 class='section-title'>About <span>me</span></h1>
        <p>$desc</p>
        <a href='resume.pdf' class='cta' download>Download Resume</a>
      </div>
    </div>
  </section>
  <!-- End About Section -->

  <!-- Contact Section -->
  <section id='contact'>
    <div class='contact container'>
      <div>
        <h1 class='section-title'>Contact <span>info</span></h1>
      </div>
      <div class='contact-items'>
        <div class='contact-item'>
          <div class='icon'><img src='https://img.icons8.com/color/48/000000/linkedin.png'/></div>
          <div class='contact-info'>
            <h1>LinkedIn</h1>
            <h2>$linkedin</h2>
          </div>
        </div>
        <div class='contact-item'>
          <div class='icon'><img src='https://img.icons8.com/bubbles/100/000000/new-post.png' /></div>
          <div class='contact-info'>
            <h1>Email</h1>
            <h2>$email</h2>
          </div>
        </div>
        <div class='contact-item'>
          <div class='icon'><img src='https://img.icons8.com/bubbles/100/000000/map-marker.png' /></div>
          <div class='contact-info'>
            <h1>Address</h1>
            <h2>$address</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact Section -->

  <!-- Footer -->
  <section id='footer'>
    <div class='footer container'>
      <div class='brand'>
        <h1><span>$fname</span></h1>
      </div>
      
      <p>Copyright © 2022 $fname. All rights reserved</p>
    </div>
  </section>
  <!-- End Footer -->
  <script src='./app.js'>
  </script>
</body>

</html>
    
    ";
    fwrite($myfile, $txt);
    fclose($myfile);
    
    header('Location: '.$fname.'/');
    die();
}

    
 
   





    #if selected theme 2
    if ($theme == "Theme2") {
        
    
		$curdir = getcwd();
		mkdir($curdir.'/'.$fname);
		$uploaddir = $curdir.'/'.$fname.'/';
		$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
			rename($uploadfile,$uploaddir.'/profile_pic.jpg');
			echo "File is valid, and was successfully uploaded.\n";
		  } else {
			 echo "Upload failed";
		  }

		
		  $curdir = getcwd();
		  mkdir($curdir.'/'.$fname);
		  $uploaddir = $curdir.'/'.$fname.'/';
		  $uploadfile = $uploaddir . basename($_FILES['userresfile']['name']);
		  if (move_uploaded_file($_FILES['userresfile']['tmp_name'], $uploadfile)) {
			  rename($uploadfile,$uploaddir.'/resume.pdf');
			  echo "File is valid, and was successfully uploaded.\n";
			} else {
			   echo "Upload failed";
			}
	
	
    //creating style file
    $myfile = fopen($curdir.'/'.$fname."/style.css", "w") or die("Unable to open file!");
    $txt = "
    :root{
        --mainColor:#eaeaea;
        --secondaryColor:#fff;
    
        --borderColor:#c1c1c1;
    
        --mainText:black;
        --secondaryText:#4b5156;
    
        --themeDotBorder:#24292e;
    
        --previewBg:rgb(251, 249, 243, 0.8);
        --previewShadow:#f0ead6;
    
    
        --buttonColor:black;
    
    
    }
    
    
    html, body{
        padding: 0;
        margin: 0;
        scroll-behavior: smooth;
    }
    
    body *{
        transition: 0.3s;
    }
    
    
    h1, h2, h3, h4, h5, h6, strong{
        color: var(--mainText);
        font-family: 'Russo One', sans-serif;
        font-weight: 500;
    }
    
    p, li, span, label, input, textarea{
        color: var(--secondaryText);
        font-family: 'Roboto Mono', monospace;
    }
    
    a{
        text-decoration: none;
        color:#17a2b8;
    }
    
    ul{
        list-style: none;
    }
    
    h1 { font-size: 56px;}
    h2 { font-size: 36px;}
    h3 { font-size: 28px;}
    h4 { font-size: 24px;}
    h5 { font-size: 20px;}
    h6 { font-size: 16px;}
    
    
    .s1{
        background-color: var(--mainColor);
        border-bottom:1px solid var(--borderColor);
        overflow:auto;
    }
    
    .s2{
        background-color: var(--secondaryColor);
        border-bottom:1px solid var(--borderColor);
        overflow:auto;
    }
    
    
    
    
    .main-container{
        width: 1200px;
        margin: 0 auto;
    }
    
    
    .greeting-wrapper{
        display: grid;
        text-align: center;
        align-content: center;
        min-height: 10em;
    
    }
    
    .intro-wrapper{
        background-color: var(--secondaryColor);
        border:1px solid var(--borderColor);
        border-radius:5px 5px 0 0;
    
    
        -webkit-box-shadow: -1px 1px 3px -1px rgba(0,0,0,0.75);
        -moz-box-shadow: -1px 1px 3px -1px rgba(0,0,0,0.75);
        box-shadow: -1px 1px 3px -1px rgba(0,0,0,0.75);
    
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-areas: 
            'nav-wrapper nav-wrapper'
            'left-column right-column'
        ;
    }
    
    
    .nav-wrapper{
        border-radius:5px 5px 0 0;
        grid-area:nav-wrapper;
        border-bottom: 1px solid var(--borderColor);
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: var(--mainColor);
    }
    
    #navigation a{
        color:var(--mainText);
    }
    
    
    #navigation{
        margin:0;
        padding: 10px;
    }
    
    #navigation li{
        display: inline-block;
        margin-right: 5px;
        margin-left:5px;
    }
    
    .dots-wrapper{
        display: flex;
        padding: 10px;
    }
    
    #dot-1{
        background-color:  #FC6058;
    }
    
    #dot-2{
        background-color:  #FEC02F;
    }
    
    #dot-3{
        background-color:  #2ACA3E;
    }
    
    .browser-dot{
        background-color: black;
        height: 15px;
        width: 15px;
        border-radius: 50%;
        margin: 5px;
    
        -webkit-box-shadow: -1px 1px 3px -1px rgba(0,0,0,0.75);
        -moz-box-shadow: -1px 1px 3px -1px rgba(0,0,0,0.75);
        box-shadow: -1px 1px 3px -1px rgba(0,0,0,0.75);
    
    }
    
    
    .left-column{
        grid-area: left-column;
        padding-top:50px;
        padding-bottom: 50px;
    }
    
    #profile_pic{
        display: block;
        margin:0 auto;
    
        height: 200px;
        width: 200px;
        object-fit: cover;
        border:2px solid var(--borderColor);
    }
    
    
    #theme-options-wrapper{
        display: flex;
        justify-content: center;
    }
    
    .theme-dot{
        height: 30px;
        width: 30px;
        background-color: black;
        border-radius: 50%;
    
        margin: 5px;
        border:2px solid var(--themeDotBorder);
    
        -webkit-box-shadow: -1px 1px 3px -1px rgba(0,0,0,0.75);
        -moz-box-shadow: -1px 1px 3px -1px rgba(0,0,0,0.75);
        box-shadow: -1px 1px 3px -1px rgba(0,0,0,0.75);
    
        cursor: pointer;
    }
    
    
    .theme-dot:hover{
        border-width: 5px;
    }
    
    
    #light-mode{
        background-color: #fff;
    }
    
    #blue-mode{
        background-color: #192734;
    }
    
    #green-mode{
        background-color: #78866b;
    }
    
    #purple-mode{
        background-color: #7E4C74;
    }
    
    #settings-note{
        font-size: 12px;
        font-style: italic;
        text-align: center;
    }
    
    .right-column{
        grid-area: right-column;
        display: grid;
        align-content: center;
    
        padding-top: 50px;
        padding-bottom: 50px;
    }
    
    
    #preview-shadow{
        background-color: var(--previewShadow);
        max-width: 300px;
        height: 180px;
        padding-left: 30px;
        padding-top: 30px;
    }
    
    #preview{
        width: 300px;
        border:1.5px solid #17a2b8;
        background-color: var(--previewBg);
        padding:15px;
        position: relative;
    }
    
    .corner{
        width:7px;
        height: 7px;
        border-radius: 50%;
        border:1.5px solid #17a2b8;
        background-color: #fff;
        position: absolute;
    }
    
    #corner-tl{
        top:-5px;
        left: -5px
    }
    
    #corner-tr{
        top:-5px;
        right: -5px
    }
    
    
    #corner-br{
        bottom:-5px;
        right: -5px
    }
    
    
    #corner-bl{
        bottom:-5px;
        left: -5px
    }
    
    .about-wrapper{
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        padding-bottom: 50px;
        padding-top: 50px;
        gap:100px;
    }
    
    
    #skills{
        display: flex;
        justify-content: space-evenly;
        background-color: var(--previewShadow);
    }
    
    .social-links{
        display: grid;
        align-content: center;
        text-align: center;
    }
    
    #social_img{
        width: 100%;
    }
    
    
    .post-wrapper{
        display: grid;
        grid-template-columns: repeat(auto-fit, 320px);
        gap:20px;
        justify-content: center;
        padding-bottom: 50px;
    }
    
    .post{
        border:1px solid var(--borderColor);
        -webkit-box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
        -moz-box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
        box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
    }
    
    .thumbnail{
        display: block;
        width: 100%;
        height:180px;
        object-fit: cover;
    }
    
    .post-preview{
        background-color: #fff;
        padding:15px;
    }
    
    .post-title{
        color:black;
        margin: 0;
    }
    
    .post-intro{
        color:#4b5156;
        font-size: 14px;
    }
    
    
    #contact-form{
        display: block;
        max-width: 600px;
        margin: 0 auto;
        border: 1px solid var(--borderColor);
        padding: 15px;
        border-radius: 5px;
        background-color: var(--mainColor);
        margin-bottom: 50px;
    
    }
    
    #contact-form label{
        line-height: 2.7em;
    }
    
    #contact-form textarea{
        min-height: 100px;
        font-size: 14px;
    }
    
    
    .input-field{
        width: 100%;
        padding-top: 10px;
        padding-bottom:10px; 
        background-color: var(--secondaryColor);
        border-radius: 5px;
        border:1px solid var(--borderColor);
        font-size: 14px;
    }
    
    
    #submit-btn{
        margin-top: 10px;
        width: 100%;
        padding-top: 10px;
        padding-bottom:10px; 
        color: #fff;
        background-color: var(--buttonColor);
        border:none;
    }
    
    
    @media screen and (max-width: 1200px){
        .main-container{
            width: 95%;
        }
    }
    
    @media screen and (max-width: 800px){
        .intro-wrapper{
            grid-template-columns: 1fr;
            grid-template-areas: 
                'nav-wrapper'
                'left-column'
                'right-column'
            ;
        }
    
        .right-column{
            justify-content: center;
        }
    
    }
    
    @media screen and (max-width: 400px){
        #preview-shadow{
            max-width: 280px;
            height: 180px;
            padding-left: 10px;
            padding-top: 10px;
        }
    
        #preview{
            width: 280px;
    
        }
    
    }    
    ";
    fwrite($myfile, $txt);
    fclose($myfile);


    //creating js file
    $myfile = fopen($curdir.'/'.$fname."/script.js", "w") or die("Unable to open file!");
    $txt = "
    console.log('Its working')

let theme = localStorage.getItem('theme')

if(theme == null){
	setTheme('light')
}else{
	setTheme(theme)
}

let themeDots = document.getElementsByClassName('theme-dot')


for (var i=0; themeDots.length > i; i++){
	themeDots[i].addEventListener('click', function(){
		let mode = this.dataset.mode
		console.log('Option clicked:', mode)
		setTheme(mode)
	})
}

function setTheme(mode){
	if(mode == 'light'){
		document.getElementById('theme-style').href = 'default.css'
	}

	if(mode == 'blue'){
		document.getElementById('theme-style').href = 'blue.css'
	}

	if(mode == 'green'){
		document.getElementById('theme-style').href = 'green.css'
	}

	if(mode == 'purple'){
		document.getElementById('theme-style').href = 'purple.css'
	}

	localStorage.setItem('theme', mode)
}
    ";
    fwrite($myfile, $txt);
    fclose($myfile);

    //creating js file
    $myfile = fopen($curdir.'/'.$fname."/index.html", "w") or die("Unable to open file!");
    $txt = "
    <!DOCTYPE html>
<html>
<head>
	<title>$fname</title>


	<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1' />

	<link href='https://fonts.googleapis.com/css2?family=Russo+One&display=swap' rel='stylesheet'>

	<link href='https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&family=Russo+One&display=swap' rel='stylesheet'>

	<link rel='stylesheet' type='text/css' href='style.css'>
	<link id='theme-style' rel='stylesheet' type='text/css' href=''>
</head>
<body>

	<section class='s1'>
		<div class='main-container'>
			<div class='greeting-wrapper'>
				<h1>Hi, I'm $fname</h1>
			</div>


			<div class='intro-wrapper'>
				<div class='nav-wrapper'>

					<!-- Link around dots-wrapper added after tutorial video -->
					<a href='index.html'>
						<div class='dots-wrapper'>
							<div id='dot-1' class='browser-dot'></div>
							<div id='dot-2' class='browser-dot'></div>
							<div id='dot-3' class='browser-dot'></div>
						</div>
					</a>
					

					
				</div>

				<div class='left-column'>
					<img id='profile_pic' src='profile_pic.jpg'>
					<h5 style='text-align: center;line-height: 0;'>Personalize Theme</h5>

					<div id='theme-options-wrapper'>
						<div data-mode='light' id='light-mode' class='theme-dot'></div>
						<div data-mode='blue' id='blue-mode' class='theme-dot'></div>
						<div data-mode='green' id='green-mode' class='theme-dot'></div>
						<div data-mode='purple' id='purple-mode' class='theme-dot'></div>
					</div>

					<p id='settings-note'>*Theme settings will be saved for<br>your next vist</p>
				</div>

				<div class='right-column'>

					<div id='preview-shadow'>
						<div id='preview'>
							<div id='corner-tl' class='corner'></div>
							<div id='corner-tr' class='corner'></div>
							<h3>What I Do</h3>
							<p>I am a $prof. $descpr.</p>
							<div id='corner-br' class='corner'></div>
							<div id='corner-bl' class='corner'></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class='s2'>
		<div class='main-container'>

			<div class='about-wrapper'>
				<div class='about-me'>
					<h4>Important Links</h4>

					<p>$links</p>


					<hr>

					<h4>TOP EXPERTISE</h4>

					<p>$descpr
					<br>
					<a href='resume.pdf' download>Download Resume</a></p>

				</div>

				
				<div class='social-links'>
					<h3>Find me on LinkedIn & Email</h3>

					<b>LinkedIn: </b> $linkedin
					<br>
					<b>Email Address: </b> $email
				</div>
			</div>

		</div>
	</section>

	<section class='s1'>
		<div class='main-container'>
			<h3 style='text-align: center;'>Some of my past projects</h3>

			<div class='post-wrapper'>

				<div>
					<div class='post'>
						<div class='post-preview'>
							<h6 class='post-title'>Project</h6>
							<p class='post-intro'>$pro1</p>
						</div>
					</div>
				</div>

				<div>
					<div class='post'>
						<div class='post-preview'>
							<h6 class='post-title'>Project</h6>
							<p class='post-intro'>$pro2</p>
							
						</div>
					</div>
				</div>


			</div>
		</div>
	</section>


	<script type='text/javascript' src='script.js'></script>
</body>
</html>
    ";
    fwrite($myfile, $txt);
    fclose($myfile);
    
    header('Location: '.$fname.'/');
    die();
    
}    
    ?>
