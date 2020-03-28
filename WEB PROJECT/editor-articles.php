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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="script.js"></script>
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="editorStyle.css">

    <!--Custom styles-->


    <title>Editor Articles</title>
</head>

<body>

    <div id='cssmenu'>
        <ul>
            <li><a href="editor.php">Editor</a></li>
            <li class='active'><a href='#'>Articles</a></li>
            <li><a href="logout.php">SignOut</a></li>

        </ul>
    </div>


    <!--articles-->
    <!--lina added check-->
    <h2 id="recieved">Recieved articles: </h2>

    <?php 
    
               $sql="SELECT * FROM Articles WHERE Submitted=1 AND Approved=0 AND Feedback IS NULL";
               $result = mysqli_query($conn,$sql);
                
    if(mysqli_num_rows($result)>=1){
                while($row=mysqli_fetch_array($result)){
                    // the title button
                    print('<button class="collapsible" type="button">'.$row[1].'</button>');
                    
                    //print wiht img 
                     print('<div class="content"><p>'.$row[2].'</p>');
                    if (!empty($row[8]))
                        print('<div class="col-md-4 offset-md-4">
                        <img  height="325" width="300" src="data:image/jpeg;base64,'.base64_encode($row[8]).'">
                        </div>');
                    //the approve button
                    print('<a href="aprove.php?id='.$row[0].'"><button id="'.$row[0].'"class="afbuttons" name="approve" type="submit"> Approve</button></a>');
                    //the feedback button
                    print('<a href="feedback.php?id='.$row[0].'"><button id="'.$row[0].'"class="afbuttons" name="feedback" type="submit">Send Feedback</button></a></div>');
                    }//end while  
                }//end if $result
                else {
                   print("<tr>");
                        print("<td colspan='3'>No Articles</td>");
                    print("</tr>");
                }
            ?>

    <!--lina added check-->

    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }

    </script>


</body>

</html>
