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
    $descpr = $_POST["descpr"];
    $pro1 = $_POST["pro1"];
    $pro2 = $_POST["pro2"];
	$pro3 = $_POST["pro3"];
	$address = $_POST["address"];
    $theme = $_POST["theme"];

	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "ed_project";

//create connection
/*
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
*/

    if ($theme == "Theme1") {
        
    $curdir = getcwd();
    mkdir($curdir.'/'.$fname);
	



    //creating style file
    $myfile = fopen($curdir.'/'.$fname."/style.css", "w") or die("Unable to open file!");
    $txt = "
	/* CSS Reset */
	*{
		margin: 0;
		padding: 0;
	}
	
	html{
		scroll-behavior: smooth;
	}
	
	/* CSS Variables */
	:root{
		--navbar-height: 59px;
	}
	
	/* Navigation Bar */
	#navbar{
		display: flex;
		align-items: center;
		position: sticky;
		top: 0px;
	}
	
	#navbar::before{
		content: '';
		background-color: black;
		position: absolute;
		top:0px;
		left:0px;
		height: 100%;
		width:100%;
		z-index: -1;
		opacity: 0.7;
	}
	
	/* Navigation Bar: Logo and Image */
	#logo{
		margin: 10px 34px;
	}
	
	#logo img{
		height: 59px;
		margin: 3px 6px;
	}
	
	
	/* Navigation Bar: List Styling */
	
	#navbar ul{
		display: flex;
		font-family: 'Baloo Bhai', cursive;
	}
	
	#navbar ul li{ 
		list-style: none;
		font-size: 1.3rem;
	}
	
	#navbar ul li a{
		color: white;
		display: block;
		padding: 3px 22px;
		border-radius: 20px;
		text-decoration: none;
	}
	
	#navbar ul li a:hover{
		color: black;
		background-color: white;
	}
	
	/* Home Section */
	#home{
		display: flex;
		flex-direction: column;
		padding:3px 200px;
		height: 550px;
		justify-content: center;
		align-items: center;
	}
	
	#home::before{ 
		content: '';
		position: absolute;
		background: url('bg1.jpg') no-repeat center center/cover;
		height: 642px;
		top:0px;
		left:0px;
		width: 100%;
		z-index: -1;
		opacity:0.89;
	}
	
	#home h1{
		color:white;
		text-align: center;
		font-family: 'Bree Serif', serif;
	}
	
	#home p{
		color:white;
		text-align: center;
		font-size: 1.5rem;
		font-family: 'Bree Serif', serif;
	}
	/* Services Section */
	#services{
		margin: 34px;
		display: flex;
	}
	#services .box{ 
		border: 2px solid brown;
		padding: 34px;
		margin: 2px 55px;
		border-radius: 28px;
		background: #f2f2f2;
		margin-bottom: 20px;
	}
	
	#services .box img{ 
	   height: 160px;
	   margin: auto;
	   display: block;
	}
	
	#services .box p{
		font-family: 'Bree Serif', serif;
	
	} 
	
	/* Clients Section */
	#client-section{ 
		position: relative;
	}
	
	#client-section::before{
	 content: '';
	 position: absolute;
	 background: url('bg.jpg');
	 width: 100%;
	 height: 100%;
	 z-index: -1;
	 opacity: 0.3;
	}
	
	#clients{
		display: flex;
		justify-content: center;
		align-items: center;
	}
	
	.client-item{
		padding: 34px;
	}
	
	#clients img{
		height: 124px;
	}
	
	
	/* Contact Section */
	#contact{
		position: relative;
	}
	#contact::before{
		content: '';
		position: absolute;
		width: 100%;
		height: 100%;
		z-index: -1;
		opacity: 0.7;
		background: url('contact.jpg') no-repeat center center/cover;
	
	}
	#contact-box{
		display: flex;
		justify-content: center;
		align-items: center;
		padding-bottom: 34px;
	}
	#contact-box input, 
	#contact-box textarea{
		width: 100%;
		padding: 0.5rem;
		border-radius: 9px;
		font-size: 1.1rem;
	} 
	
	#contact-box form{
		width: 40%;
	}
	
	#contact-box label{
	   font-size: 1.3rem;
	   font-family: 'Bree Serif', serif;
	
	}
	
	
	footer{
		background: black;
		color: white;
		padding: 9px 20px;
	}
	
	/* Utility Classes */
	.h-primary{
		font-family: 'Bree Serif', serif;
		font-size: 3.8rem;
		padding: 12px;
	}
	
	.h-secondary{
		font-family: 'Bree Serif', serif;
		font-size: 2.3rem;
		padding: 12px;
	}
	
	.btn{
		padding: 6px 20px;
		border: 2px solid white;
		background-color: brown;
		color: white;
		margin: 17px;
		font-size: 1.5rem;
		border-radius: 10px;
		cursor:pointer;
	}
	
	.center{
		text-align: center;
	}";
    fwrite($myfile, $txt);
    fclose($myfile);


    //creating style file
    $myfile = fopen($curdir.'/'.$fname."/phone.css", "w") or die("Unable to open file!");
    $txt = "
	/* Navigation */
#navbar {
    flex-direction: column;
}

#navbar ul li a{
    font-size: 1rem;
    padding: 0px 7px;
    padding-bottom: 8px;
}
/* Home section */
#home{
    height: 370px; 
    padding: 3px 28px;
}

#home::before{
    height: 480px; 
}

#home p{
    font-size: 13px;
}

/* Services section  */
#services{
    flex-direction: column;
}

#services .box { 
    padding: 14px;
    margin: 2px 0px; 
    margin-bottom: 20px;
}

/* Clients section */
#clients{
    flex-wrap: wrap;
}

#clients img{
    width: 66px;
    padding: 6px;
    height: auto;
}

/* Contact us section */
#contact-box form{
    width:80%;
}
/* Footer */

/* Utility classes */
.h-primary{
    font-size:26px;
}
.btn{
    font-size: 13px;
    padding: 4px 8px;
}";
    fwrite($myfile, $txt);
    fclose($myfile);

//creating html file
    $myfile = fopen($curdir.'/'.$fname."/index.html", "w") or die("Unable to open file!");
    $txt = "
    <!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Best Online Food Delivery Service in India | $fname.com</title>
    <link rel='stylesheet' href='style.css'>
    <link rel='stylesheet' media='screen and (max-width: 1170px)' href='phone.css'>
    <link href='https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&display=swap' rel='stylesheet'>
</head>

<body>
    <nav id='navbar'>
        <div id='logo'>
            <img src='bg1.jpg' alt='MyOnlineMeal.com'>
        </div>
        <ul>
            <li class='item'><a href='#home'>Home</a></li>
            <li class='item'><a href='#services-container'>Our Products</a></li>
            <li class='item'><a href='#contact'>Contact Us</a></li>
        </ul>
    </nav>

    <section id='home'>
        <h1 class='h-primary'>Welcome to $prof</h1>
        <p>$descpr</p>
        <p>We are located at $address. </p>
        <button class='btn'>Order Now</button>
    </section>

    <section id='services-container'>
        <h1 class='h-primary center'>Our Products</h1>
        <div id='services'>
            <div class='box'>
                <img src='1.png' alt=''>
                <h2 class='h-secondary center'>Item No. 1</h2>
                <p class='center'>$pro1</p>
            </div>
            <div class='box'>
                <img src='2.png' alt=''>
                <h2 class='h-secondary center'>Item No.2</h2>
                <p class='center'>$pro2</p>
            </div>
            <div class='box'>
                <img src='1.png' alt=''>
                <h2 class='h-secondary center'>Item No. 3</h2>
                <p class='center'>$pro3</p>
            </div>
        </div>
    </section>
    

    <section id='contact'>
        <h1 class='h-primary center'>Contact Us</h1>
        <div id='contact-box'>
            <form action=''>
                <div class='form-group'>
                    <label for='name'>Name: </label>
                    <input type='text' name='name' id='name' placeholder='Enter your name'>
                </div>
                <div class='form-group'>
                    <label for='email'>Email: </label>
                    <input type='email' name='name' id='email' placeholder='Enter your email'>
                </div>
                <div class='form-group'>
                    <label for='phone'>Phone Number: </label>
                    <input type='phone' name='name' id='phone' placeholder='Enter your phone'>
                </div>
                <div class='form-group'>
                    <label for='message'>Message: </label>
                    <textarea name='message' id='message' cols='30' rows='10'></textarea>
                </div>
            </form>
        </div>
    </section>

    <footer>
        <div class='center'>
            Copyright of $fname.  All rights reserved!
        </div>
    </footer>
</body>

</html>
    ";
    fwrite($myfile, $txt);
    fclose($myfile);
    
	$old = $_SERVER['DOCUMENT_ROOT'].'/ed_project/port_images/';
$new = $_SERVER['DOCUMENT_ROOT'].'/ed_project/'.$fname.'/';

$dh = opendir($old);

while (($file = readdir($dh)) !== false) {
    if (preg_match('/\.jpg$/', $file)) {
        copy($old.'/'.$file, $new.'/'.$file);
    }
	if (preg_match('/\.png$/', $file)) {
        copy($old.'/'.$file, $new.'/'.$file);
    }
}


closedir($dh);



    header('Location: '.$fname.'/');
    die();
}

    
 
   




    ?>
