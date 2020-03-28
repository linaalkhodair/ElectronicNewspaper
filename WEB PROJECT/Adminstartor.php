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
<!DOCTYPE html>
<html>

<head>

    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="admin.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="script.js"></script>
    <title>Adminstrator</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>


    <!---nav--->
    <div id='cssmenu'>
        <ul>
            <li class='active'><a href='#'>Adminstrator</a></li>
            <li><a href="addeditors-2.php">Manage Accounts<img class="im" src="IMG_9284.PNG"></a></li>
            <li><a href="logout.php">SignOut</a></li>
        </ul>

    </div>

    <div id="circleimage">
        <img src="admin.png">
        <h2>Weclome <?php echo $_SESSION['Username'] ?> !</h2>
    </div>

</body>

</html>
