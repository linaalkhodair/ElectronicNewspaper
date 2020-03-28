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

    $pass = $_POST['newPassword'];
    $name = $_POST['newName'];
    $title = $_POST['newJobTitle'];
        
    if(isset($_POST['add'])){
        
        $sql="INSERT INTO Accounts (Account_ID, Username, Job_title, Password)
                VALUES (NULL, '".$name."', '".$title."', '".$pass."');";
                $result = mysqli_query($conn,$sql); 
        if($result){
                echo "<script>setTimeout(\"location.href = 'addeditors-2.php';\");</script>";
                }
        else
                echo mysqli_error($conn);
    }
?>