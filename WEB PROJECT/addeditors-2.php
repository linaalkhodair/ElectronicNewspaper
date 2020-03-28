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

    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="admin.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>
    <div id='cssmenu'>
        <ul>
            <li><a href='Adminstartor.php'>Adminstrator</a></li>
            <li class='active'><a href="addeditors-2.php">Manage Accounts<img class="im" src="IMG_9284.PNG"></a></li>
            <li><a href="logout.php">SignOut</a></li>
        </ul>

    </div>
<!-- here-->
    <form method="post" action="addAccount.php">
        
        <table class="draftslist" id="myTable2">
            <tr>
                <th colspan="2">Create New Account </th>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="newName"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="newPassword"></td>
            </tr>
            <tr>
                <td colspan="2" id="jobtitletd">
                <input type="radio" name="newJobTitle" value="Editor">  Editor
            
                <input type="radio" name="newJobTitle" value="Journalist">  Journalist</td>
            </tr>
            <tr>
                <td id="jobtitletd" colspan="2"><input type="submit" name="add" value="add"></td>
            </tr>
        </table>
    </form>

<!-- here-->    
    <table class="draftslist" id="myTable">
        <tr>
            <th colspan="2">EDITORS ACCOUNTS</th>
        </tr>
        <?php 
               $sql="SELECT * FROM Accounts WHERE Job_title='Editor'";
               $result = mysqli_query($conn,$sql);
        
            if(mysqli_num_rows($result)>=1){
                while($row=mysqli_fetch_row($result)){
                    print("<tr>");
                        print("<td>".$row[1]."</td>"
                        ."<td><a href='deleteAccount.php?name=".$row[0]."'><img src='if_sign-error_299045.png' id='icon' name='".$row[0]."'></a></td>");
                    print("</tr>");
                    }//end while  
                }//end if $result
                else {
                   print("<tr>");
                        print("<td colspan='3'>No Accounts</td>");
                    print("</tr>");
                }
            ?>
    </table>
    
     <table class="draftslist" id="myTable">
        <tr>
            <th colspan="2">JOURNALISTS ACCOUNTS</th>
        </tr>
        <?php 
               $sql="SELECT * FROM Accounts WHERE Job_title='Journalist'";
               $result = mysqli_query($conn,$sql);
        
            if(mysqli_num_rows($result)>=1){
                while($row=mysqli_fetch_row($result)){
                    print("<tr>");
                        print("<td>".$row[1]."</td>"
                        ."<td><a href='deleteAccount.php?name=".$row[0]."'><img src='if_sign-error_299045.png' id='icon' name='".$row[0]."'></a></td>");
                    print("</tr>");
                    }//end while  
                }//end if $result
                else {
                   print("<tr>");
                        print("<td colspan='3'>No Accounts</td>");
                    print("</tr>");
                }
            ?>
    </table>
</body>

</html>
