<?php
	session_start();
	if (isset($_SESSION['name']))
	{
	$username = $_SESSION["name"];
	}
	else{
		header('location:login.php');
	}
?>
<html>
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

textarea{
	background-color: white;
	size: 2000px;
    min-height: 200px;
    width: fit-content;
    height: fit-content;
    
}
textarea:hover {
	background-color: rgb(22, 18, 241);
    color: white;
    width: fit-content;
    height: fit-content;
}	
a:hover {
	color: red;

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
                make your personal websites
            </h1>
        </div>
        </header>
        <nav>
        <a href="index.php" id="topbar">Home</a>&nbsp;&nbsp;&nbsp;
            <a href="busi_web.php" id="topbar">Make Business Website</a>&nbsp;&nbsp;&nbsp;
            <a href="past.php" id="topbar">Past Projects</a>&nbsp;&nbsp;&nbsp;
            <a href="logout.php"  id="topbar">Logout</a>&nbsp;&nbsp;&nbsp;
            
            
    
        </nav>
        <form method="post" action="try2.php" enctype="multipart/form-data">
            <label for="name">Name :</label><br>
            
            <input type="text" name="name" id="username"  placeholder="Enter Your Name">
            <br><br>
            
            <label for="email">Contact Email :</label><br>
            <input type="email" name="email" id="username"  placeholder="Where to contact you">
            <br><br>
            
            <label for="prof">Profession :</label><br>
            <input type="text" name="prof" id="username"  placeholder="What you do?">
            <br><br>

            <label for="descpr">Description of Profession :</label><br>
            <textarea name="descpr" id="username" placeholder="Describe your profession"></textarea>
            <br><br>

            <label for="links">Important Links :</label><br>
            <textarea name="links" id="username" placeholder="Write Imp Links "></textarea>
            <br><br>

            <label for="pro1">Project 1 :</label><br>
            <textarea name="pro1" id="username" placeholder="Write a project you did"></textarea>
            <br><br>
            <label for="pro2">Project 2 :</label><br>
            <textarea name="pro2" id="username" placeholder="Write a project you did"></textarea>
            <br><br>


            <label for="linkedin">LinkedIn Id :</label><br>
            <input type="text" name="linkedin" id="username"  placeholder="your LinkedIn id">
            <br><br>

            <label for="address">Address :</label><br>
            <input type="text" name="address" id="username"  placeholder="where do you live ?">
            <br><br>


            <label for="desc">Description :</label><br>
            <textarea name="desc" id="username" placeholder="describe about yourself"></textarea>
            <br><br>


            <label for="image">Profile Image: </label><br>
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
            <input name="userfile" type="file" />
            
            <br><br>
            <label for="image">Resume: </label><br>
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
            <input name="userresfile" type="file" />
            
            <br><br>

            <label for="desc">Theme type :</label>
            <br>
            <input type="radio" id="theme1" name="theme" value="Theme1">
            <label for="theme1">Standard Trivial Style</label><br>
            <input type="radio" id="theme2" name="theme" value="Theme2">
            <label for="theme2">Mordern unicolour </label><br>

            <br><br>
            <label for="favcolor">Select your Front color:</label>
            <input type="color" id="favcolor" name="color1" value="#ff0000">
            <br><br>
            <label for="favcolor">Select your Background color:</label>
            <input type="color" id="favcolor" name="color2" value="#ff0000">
            <br><br>
  
            <input type="submit" name="submit" value="Submit" id="username">
        </form>
    </body>
</html>