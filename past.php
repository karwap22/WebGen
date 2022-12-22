<?php
session_start();
if (isset($_SESSION['name']))
{
$name = $_SESSION["name"];
}
else{
    header('location:login.php');
}


$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "ed_project";

//create connection

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
if(!$conn){
    die('Could not Connect My Sql:' .mysql_error());
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
table, th, td {
  border:1px solid black;
}
table{
    margin-left:10ch;
}
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
            <a href="logout.php"  id="topbar">Logout</a>&nbsp;&nbsp;&nbsp;
            
    
        </nav>
    <main>
        
        <section>
            <p id="intro">Welcome <?php echo $name; ?> </p>
            You have made following websites using <b id="heading"> make your websites!!!</b>.
        </section>
<section>
        <table style="width:80%;">
  <tr>
    <th>Name of owner</th>
    <th>Email id of owner</th>
    <th>Website Created on</th>
    <th>Download Project</th>
  </tr>

   <?php
   $query = "SELECT `fname`, `email`, `date_time` FROM `websites` WHERE `username`='$name'";
   $result = mysqli_query($conn,$query);
   if ($result) {
    while ($row = mysqli_fetch_array($result)) {
      ?>
      
  <tr>
    <td><?php  echo $row['fname']; ?></td>
    <td><?php  echo $row['email']; ?></td>
    <td><?php  echo $row['date_time']; ?></td>
    <td>
    <form action="Download.php" method="post"> 
    <?php 
    echo "<input type='hidden' name='project_name' value=".$row['fname'].">";
    ?>
    <input type="submit" value="Download">
    </form>
    </td>
  </tr>
    <?php
    } }
        else {
    echo "There was problem showing your Past Projects or you haven't created one";
  }
?>
</table> 

</section>


    </main>
    
</body>
</html>