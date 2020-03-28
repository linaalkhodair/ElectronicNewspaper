<?php
    session_start();
	if(!isset($_SESSION['Account_ID'])) {
		header("location: home-page.html");
		exit();
	}	
    DEFINE('DB_USER','root');
    DEFINE('DB_PSWD','');
    DEFINE('DB_HOST','localhost');
    DEFINE('DB_NAME','Newspaper');

    if (!$conn = mysqli_connect(DB_HOST,DB_USER,DB_PSWD))
        die("Connection failed.");

    if(!mysqli_select_db($conn,DB_NAME))
        die("Could not open the ".DB_NAME." database.");

?>
<!doctype html>
<html lang=''>

<head>
    <meta charset='utf-8'>
    <title>Journalist Page</title>

    <link rel="stylesheet" type="text/css" href="journ.css">
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <!---nav--->
    <div id='cssmenu'>
        <ul>
            <li class='active'>
                <a href='#'>Journalist</a>
            </li>
            <li><a href="journalist-articles.php">Articles</a>
            <li ><a href="logout.php">Sign out</a></li>

        </ul>
    </div>
   
    <div id="circleimage">
     <img src="journ.png" >
   <h2>Weclome <?php echo $_SESSION['Username'] ?> !</h2>
    </div>
  
</body>
<html>
