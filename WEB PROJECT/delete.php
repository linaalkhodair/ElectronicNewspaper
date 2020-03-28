<?php
    session_start();
	if(!isset($_SESSION['Account_ID'])) {
		header("location: home-page.html");
		exit();
	}	
    DEFINE('DB_USER','root');
    DEFINE('DB_PSWD','');
    DEFINE('DB_HOST','localhost');
    DEFINE('DB_NAME','newspaper');

    $conn = mysqli_connect(DB_HOST,DB_USER,DB_PSWD);

    if (!$conn)
        die("Connection failed.</body></html>");

    if(!mysqli_select_db($conn,DB_NAME))
        die("Could not open the ".DB_NAME." database.");

if (isset($_GET['name']))
    $name=$_GET['name'];

$sql = "DELETE FROM Articles WHERE Article_ID = ".$name;
$result=mysqli_query($conn,$sql);

if($result){
    echo "<script> alert('Deleted Successfully'); </script>";
    echo "<script>setTimeout(\"location.href = 'journalist-articles.php';\");</script>";
}
?>