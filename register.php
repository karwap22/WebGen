<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2&display=swap" rel="stylesheet">
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2&family=Rubik+Moonrocks&display=swap" rel="stylesheet">
    <title>mk websites</title>
    <style>
        font{
	background-color: white;
	text-align: center;
	font-size: 30px;
	
}
form{
	background-color: #bdb6e9;
	text-align: center;
    font-size:30px;
}
input{
	background-color: white;
	size: 2000px;
}
input:hover {
	background-color: rgb(22, 18, 241);
    color: white;

}	

#username{
	width: 600px;
	height: 60px;
	font-size: 30px;
	border: 2px solid black;
	text-align: center;
}

#topbar:hover{
    background-color:#9892c0;

}

a:hover {
	color: rgb(22, 18, 241);

}



/* Typewriter Effect*/
.typewriter h1 {
  overflow: hidden; /* Ensures the content is not revealed until the animation */
  border-right: .15em solid rgb(22, 18, 241);  /* The typwriter cursor */
  white-space: nowrap; /* Keeps the content on a single line */
  margin: 0 auto; /* Gives that scrolling effect as the typing happens */
  letter-spacing: .08em; /* Adjust as needed */
  animation: 
    typing 3.5s steps(40, end),
    blink-caret .75s step-end infinite;
}

/* The typing effect */
@keyframes typing {
  from { width: 0 }
  to { width: 100% }
}

/* The typewriter cursor effect */
@keyframes blink-caret {
  from, to { border-color: transparent }
  50% { border-color: rgb(22, 18, 241); }
}



        </style>
    
</head>

<body>
    <header>
	<div class="typewriter">
            <h1>
                make your websites
            </h1>
        </div>
        </header>
        <nav>
            <a href="web.html" id="topbar">Home</a>&nbsp;&nbsp;&nbsp;
            <a href="register.php"  id="topbar">Register</a>&nbsp;&nbsp;&nbsp;
            <a href="login.php"  id="topbar">Log In</a>&nbsp;&nbsp;&nbsp;
            
            
    
        </nav>
    <form method="post" action="registeration2.php">
			<h1 align="center">Registration</h1>
			<br>
			Name: <br>
			<input type="text" name="name" placeholder="Your Name"id="username">
			<br><br>
			Email: <br>
			<input type="email" name="email" placeholder="Your Email Address" id="username">
			<br><br>
			
            Password: <br>
			<input type="password" name="password" placeholder="Your Password" id="username">
			<br><br>
			Confirm Password: <br>
			<input type="password" name="password2" placeholder="Confirm Your Password" id="username">
			<br><br>
			<input type="submit" name="register" value="Register" id="username"><br>
			<br>
		</form>
    
</body>
</html>