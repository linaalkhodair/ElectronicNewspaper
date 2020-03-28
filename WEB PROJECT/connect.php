<?php
session_start();
    DEFINE('DB_USER','root');
    DEFINE('DB_PSWD','');
    DEFINE('DB_HOST','localhost');
    DEFINE('DB_NAME','newspaper');

    $conn = mysqli_connect(DB_HOST,DB_USER,DB_PSWD);

    if (!$conn)
        die("Connection failed.</body></html>");

    if(!mysqli_select_db($conn,DB_NAME))
        die("Could not open the ".DB_NAME." database.");

    
            $name="";
            // isset () function is used to check whether a variable is set or not
            if(isset($_POST['username']))
                $name = $_POST['username'];

            $password="";
           if(isset($_POST['password']))
                $password = $_POST['password'];

                $title="";
                  if(isset($_POST['SignIntype']))
                    $title= $_POST['SignIntype'];

            if($name!=""&&$password!=""&&$title!=""){
                
                $sql = "SELECT * FROM Accounts where Username='" .$name."' AND Password='".$password."' AND Job_title='".$title."'" ;
                
                $result = mysqli_query($conn,$sql);
                if (!$result)
              echo "NO RESULT";

    if(mysqli_num_rows($result)==1){
            $row=mysqli_fetch_row($result);
            $_SESSION['Account_ID']=$row[0];
            $_SESSION['Username']=$name;
        
                 if($title=="journalist"){
                 header('Location:journalist.php');
                     
                     exit();}
  
                     
                else if($title=="editor"){
                 header('Location:editor.php');
                     exit();}
                     
                     
                  else if($title=="adminstrator"){
                  header('Location:Adminstartor.php');
                      exit();}

                     } 

                   else {
 
                       echo "<script> alert('Incorrect Username or Password.'); </script>";                     
                       echo "<script>setTimeout(\"location.href = 'home-page.html';\");</script>";

                   }
            }
            else {
                echo "<script> alert('Missing Field, please fill all fields.'); </script>"; 
                echo "<script>setTimeout(\"location.href = 'home-page.html';\");</script>";
            }
                mysqli_close($conn);
                    
                   ?>
