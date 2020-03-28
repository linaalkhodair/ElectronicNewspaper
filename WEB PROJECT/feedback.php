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
            
  if (isset($_GET['id']))
    $id=$_GET['id'];

    $sql = "SELECT * FROM Articles WHERE Article_ID =".$id;
    $result=mysqli_query($conn,$sql);
    if($result){
    
    $row=mysqli_fetch_row($result);
    $_SESSION['Article_ID']=$row[0];
    }
?>
<!DOCTYPE html>
<html>
<head>
    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    
<link rel="stylesheet" href="feedback.css"> 
    
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   
    
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
        	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    
    
    
<title>Feedback</title>    
    
    
 </head>



<body>
    
<div id='cssmenu'>
<ul>
   <li ><a href='editor.php'>Editor</a></li>
   <li class='active'><a href="#">Feedback</a></li>
   <li><a href="logout.php">SignOut</a></li>


</ul>
</div>
    <form method="post" action="feedbackbutton.php">
    <h1 class="h1">Feedback</h1>
    
    <p class="enter">Enter your feedback to the journalist:</p>

<div class="div">
<textarea  class="textArea" rows="15" cols="80" name="feedbacktext" placeholder="Wrtie here...">
</textarea>
<br>
</div>
    <a href="feedbackbutton.php"><button class="new">Send</button></a>

</form>
</body>

</html>