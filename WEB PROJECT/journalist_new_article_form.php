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
<html lang=''>

<head>

    <meta charset='utf-8'>
    <title>Article Form Page</title>

    <link rel="stylesheet" type="text/css" href="journ.css">
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <!----------------------------------------------------------->


</head>

<body>

    <!---nav--->
    <div id='cssmenu'>
        <ul>
            <li><a href="journalist.php">Journalist</a></li>
            <li class='active'><a href="journalist-articles.php">Articles</a></li>
            <li><a href="logout.php">Sign out</a></li>

        </ul>
    </div>
    <!----------------------------------------------------------->
    <form method="post" action="addArticle.php" enctype="multipart/form-data">
        <table class="writearticles">
            <tr>
                <th colspan="2">Write an article</th>
            </tr>
            <tr>
                <td>Title</td>
                <td><input type="text" name="articleTitle" placeholder="write your title"></td>
            </tr>
            <tr>
            <td>Image</td>
            <td><input type="file" name="pic" accept="image/*"></td>    
            </tr>

            <tr>
                <td>Article</td>
                <td><textarea rows="10" cols="40" name="content"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" id="submitButton"><input type="submit" value="Submit" name="submit">
                <input type="submit" value="Save" name="save"></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
        </table>
    </form>
    <!----------------------------------------------------------->

</body>
<html>
