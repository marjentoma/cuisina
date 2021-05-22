<?php 
   include_once("../admin/connection.php");
    session_start();
   
   if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

   }

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        $sql = "SELECT * FROM `accounts` WHERE `username` = '".$username."' AND `password`= '".$password."' and position='1'";
        // $result = $conn->query($sql);
        $result = mysqli_query($conn,$sql);
        $num_row = mysqli_num_rows($result);
        $row=mysqli_fetch_array($result);
        
        if( $num_row ==1 )
            {
        
        $_SESSION['accountId']=$row['account_id'];
        $_SESSION['accountName']=$row['account_name'];
        $_SESSION['username']=$row['username'];
        if( $num_row ==1 )
            {
        
        header("Location: ../admin/admin.php");
        }
        else
            {

            echo "Error: " . $username . " and " . $password." does not exist/match";
        }
   
    
    $conn->close();
    }

   }
   ?>