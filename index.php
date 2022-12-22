<?php
session_start();
if (isset($_SESSION['name']))
{
$name = $_SESSION["name"];
}
else{
    header('location:login.php');
}
?>

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
        
#topbar:hover{
    background-color:#9892c0;

}

a:hover {
	color: rgb(22, 18, 241);

}

#intro{
    font-size: 50px;
    color:rgb(22, 18, 241); 
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
            <a href="index.php" id="topbar">Home</a>&nbsp;&nbsp;&nbsp;
            <a href="pers_web.php" id="topbar">Make Personal Website</a>&nbsp;&nbsp;&nbsp;
            <a href="busi_web.php" id="topbar">Make Business Website</a>&nbsp;&nbsp;&nbsp;
            <a href="past.php" id="topbar">Past Projects</a>&nbsp;&nbsp;&nbsp;
            <a href="logout.php"  id="topbar">Logout</a>&nbsp;&nbsp;&nbsp;
            
    
        </nav>
    <main>
        
        <section>
            <p id="intro">Welcome <?php echo $name; ?> </p>
            <b id="heading">make your websites</b> is a free website where you can build your own personal or business websites by filling a form and not needing any technical background.
            So what are you waiting for , start creating  <b id="heading">websites!!!</b>.
        </section>
    </main>
    
</body>
</html>