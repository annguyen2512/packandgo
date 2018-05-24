<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">    
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type ="text/css" href="vendors/css/normalize.css">
    <link rel="stylesheet" type ="text/css" href="vendors/css/ionicons.min.css">
    <link rel="stylesheet" type ="text/css" href="vendors/css/grid.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type ="text/css" href="resource/css/style.css">
     <meta charset="UTF-8">
    <title>travelmate</title>
    </head>
<body>
    <header id="travelmate">
        <nav>
    <div class ="row">
    <a href="index.php"><img src="resource/css/img/logo1.jpg" alt="Pack&gologo" class ="logo"></a>
    <ul class ="main-nav">
    <li><a href="#">About us</a></li>
    <li><a href="travelmate.php">Travel mate</a></li>
    <li><a href="#">Our Places</a></li>
    <?php if(isset($_SESSION) && empty($_SESSION['name'])){ ?>
        <a href=#>Sign Up</a>
    <?php } else { ?>
    <li><a href="#">Hello, <?= $_SESSION['name']; ?></a></li>
    <?php } ?>
   </ul>
        </div>
        </nav> 
        <div class="hero-text-box">
            <h1>FIND YOUR IDEAL MATCH</h1>
            <form class="form-wrapper" action="search.php" >
    <input name="searchtext" type="text" id="search" placeholder="Search for..." required>
    <input class="searchbox" type="submit" value="Search" id="submit">
</form>
        </div>
    </header>   
    
    </body>
</html>
