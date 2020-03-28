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

    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    
    <meta charset='utf-8'>
    <title>Articles Page</title>

    <link rel="stylesheet" type="text/css" href="journ.css">
        

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js">
        
$("#contactUs").click(function() {
  $("#dialog").dialog("open");
  return false;
});

    </script>

</head>

<body>

    <!---nav--->
    <div id='cssmenu'>
        <ul>
            <li><a href="journalist.php">Journalist</a></li>
            <li class='active'><a href='#'>Articles</a></li>
            <li><a href="logout.php">Sign out</a></li>

        </ul>
    </div>
    <!----------------------------------------------------------->

    <table class="draftslist">
        <tr>

            <th colspan="4">DRAFTS</th>
        </tr>
        <tr>
            <td> Articles </td>
            <td> Status </td>
            <td colspan="2"><a href="journalist_new_article_form.php"><img src="if_sign-add_299068.png" id="icon"></a></td>
            
        </tr>
        <?php 
               $sql="SELECT * FROM Articles WHERE Submitted=0 AND Journalist='".$_SESSION['Account_ID']."'";
               
               $result = mysqli_query($conn,$sql);
        
            if(mysqli_num_rows($result)>=1){
                while($row=mysqli_fetch_row($result)){
                    print("<tr>");
                        print("<td>".$row[1]."</td>"
                        ."<td> draft </td>"
                        ."<td><a href='delete.php?name=".$row[0]."'><img src='if_sign-error_299045.png' id='icon' name='".$row[0]."'></a></td>"
                        ."<td><a href='journalist-articles-form.php?name=".$row[0]."'><img src='if_pencil_285638.png' id='icon' name='".$row[0]."'></a></td>");
                    print("</tr>");
                    }//end while  
                }//end if $result
                else {
                   print("<tr>");
                        print("<td colspan='3'>No Articles</td>");
                    print("</tr>");
                }
            ?>
    </table>

    <!----------------------------------------------------------->

    <table class="draftslist">
        <tr>
            <th colspan="4">SUBMITTED</th>
        </tr>
        <tr>
            <td> Articles </td>
            <td> Status </td>
        </tr>
        <?php 
               $sql="SELECT * FROM Articles WHERE Submitted=1 AND Journalist='".$_SESSION['Account_ID']."'";
               
               $result = mysqli_query($conn,$sql);
        
            if(mysqli_num_rows($result)>=1){

                
                while($row=mysqli_fetch_row($result)){
                    $approved="Unapproved";
                    if($row[6]==1)
                    $approved="Approved";
                    if($approved=="Approved"){
                    print("<tr>");
                        print("<td>".$row[1]."</td>"
                        ."<td>".$approved."</td>");
                    print("</tr>");
                    }
                    else{
                    print("<tr>");
                        print("<td>".$row[1]."</td>"
                        ."<td>".$approved."</td>"
                        .'<td><a href="#" id="contactUs"></a><div id="dialog" title='.$row[7].'><img src="if_notepad_285631.png" id="icon"></div></td>');
                    print("</tr>");
                    }
                    }//end while  
                }//end if $result
                else {
                   print("<tr>");
                        print("<td colspan='3'>No Articles</td>");
                    print("</tr>");
                }
            ?>
        
    </table>
    
</body>
<html>
