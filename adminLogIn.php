<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link href="./public/src/login.css" rel="stylesheet">

    <title>Login</title>
</head>

<body>
    <div class="container">
        <!-- <div class="row  p-3 w-75"> -->
        <!-- <div class="col md-6 mt-5 form-1 p-0 ">
                <img src="./img/admin.jpg" alt="" style="width: 450px;height:auto">
            </div> -->

        <div class="card  ">
            <center>
                <h1 class="text-dark mb-5 text-align-center"> 🅰🅳🅼🅸🅽
  </h1>
                <form  method="post">
                <div class="input-group mb-3 w-75">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white" id="basic-addon1"><i
                                class="fa fa-user p-1 bg-"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" name="username">
                </div>

                <div class="input-group mb-3 w-75">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white" id="basic-addon1"><i
                                class="fa fa-lock p-1 bg-"></i></span>
                    </div>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn btn-default mb-4 float-end btn-rounded p-2" name="login" type="submit"
                    style="margin-right: 50px;width:100px;">𝐋𝐨𝐠𝐢𝐧</button>
                </form>
            </center>
        </div>
    </div>

</body>
<?php 
   include_once("./admin/connection.php");
    session_start();
    session_unset();
   
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
        echo $_SESSION['username'];
        if( $num_row ==1 )
            {
        
        header("Location: ./admin/dashboard.php");
        }
        else
            {

            echo "Error: " . $username . " and " . $password." does not exist/match";
        }
   
    
    $conn->close();
    }

   }
   ?>

</html>