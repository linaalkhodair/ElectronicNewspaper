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

    
           $title="";
           if(isset($_POST['articleTitle']))
           $title = $_POST['articleTitle'];

           $content="";
           if(isset($_POST['content']))
           $content = $_POST['content'];
            
           $img="";
           if(isset($_FILES['pic'])) {
               if(!empty($_FILES['pic']['name']))
                $img = addslashes(file_get_contents($_FILES['pic']['tmp_name']));
           }

           $approved=0;
           $feedback="";
            
           $submit=0;
            if(isset($_POST['submit']))
            $submit=1;
     
            if(isset($_SESSION['Article_ID'])){
            $id=$_SESSION['Article_ID'];
            $sql="UPDATE Articles SET Title = '".$title."', Content = '".$content."' ,Submitted= '".$submit."', Image = '".$img."' WHERE Article_ID=". $id;
            $result=mysqli_query($conn,$sql);
                if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    die("bye");
}
                if($result){
                    echo "<script>setTimeout(\"location.href = 'journalist-articles.php';\");</script>";
                }
            }
            else{
                    
                $sql="INSERT INTO Articles (Title, Content, Journalist, Editor, Submitted, Approved, Feedback, Image)
                VALUES ('".$title."', '".$content."', '".$_SESSION['Account_ID']."', NULL, '".$submit."', '".$approved."', '".$feedback."', '".$img."');";
                $result = mysqli_query($conn,$sql); 
                    
                if($result){
                echo "<script> alert('added successfully); </script>"; 
                echo "<script>setTimeout(\"location.href = 'journalist-articles.php';\");</script>";
                }
                else
                echo mysqli_error($conn);
               
             }//end else

unset($_SESSION['Article_ID']);

?>
