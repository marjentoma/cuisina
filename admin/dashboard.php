<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Mirza&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="../src/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
    <!-- <link rel="stylesheet" href="../src/admin.css"> -->
    <title>Admin Dashboard</title>

    <style>
    body {
        font-family: 'Mirza', cursive;
        background-color:#e6eeff;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }

    .card {
        opacity: .7;
        background-color: black;
        border: 1px dashed white;
        border-radius: 5%;
    }

    .content :hover {
        opacity: 1;
        -webkit-animation: flash 1.5s;
        animation: flash 1.5s;
    }

    @-webkit-keyframes flash {
        0% {
            opacity: .4;
        }

        100% {
            opacity: 1;
        }
    }

    @keyframes flash {
        0% {
            opacity: .4;
        }

        100% {
            opacity: 1;
        }
    }
    </style>
</head>

<body>
    <?php 
    session_start();
    if($_SESSION['username']==""){
        header("Location: ../adminLogIn.php");
    }
 ?>
    <!-- Header - Start  -->
    <header id="header">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light p-0"
            style="background-color: #e6eeff; width:81%; margin-left:4%;box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);padding:15px">
            <!-- Container wrapper -->
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand me-2">
                    <img class="img-fluid" src="../public/img/logo.PNG" alt="" style="width:100px;height:50px">
                </a>

                <!-- Right links -->
                <div class="dropdown ">
                    <a class="dropdown-toggle " id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown"
                        aria-expanded="false" style="text-decoration: none;">
                        <img src="https://mdbootstrap.com/img/new/avatars/2.jpg" class="rounded-circle" height="35"
                            alt="" loading="lazy" /> <span
                            class="align-middle text-dark"><?php echo $_SESSION['username']?></span></a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../adminLogIn.php">Logout</a></li>
                    </ul>
                </div>
                <!-- Right elements -->
            </div>
        </nav>
        <!-- Navbar -->
        <!-- Header - End  -->
        <!-- Navigation - Start  -->
        <nav id="sidemenu" style="width:19%;background-color:#014e">
            <i class="fas fa-user-cog text-white mt-3  "></i>
            <h2 class="text-white ms-5">Admin</h2>
            <hr class="text-white">
            <div class="main-menu ">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-4 p-3">
                    <li><a class="nav-link active text-primary" href="dashboard.php">Dashboard</a></li>
                    <li><a class="nav-link " href="products.php">Products</a></li>
                    <li><a class="nav-link" href="transactions.php">Transactions</a></li>
                    <li><a class="nav-link" href="accounts.php">Accounts</a></li>

                </ul>
                <ul class='main-menu bottom'>
                    <li>
                        <a href="#">
                            <span class='fa fa-user'></span> Profile
                        </a>
                    </li><br>
                    <li>
                        <a href="#">
                            <span class='fa fa-cog'></span> Settings
                        </a>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- Navigation - End  -->
        <!-- Content - Start  -->
        <div id="content-wrapper">
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
            <!-- start count stats -->
            <div class="container d-flex">
                            
                <?php 
                    include_once('../admin/connection.php');

                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }else{
                        $sql = "SELECT count(account_id) as countAccounts FROM `accounts`";
                        $sql2 = "SELECT count(menu_id) as countProducts FROM `menu`";
                        $sql3 = "SELECT sum(bill) as total FROM `sales`";
                        // $result = $conn->query($sql);
                        $result = mysqli_query($conn,$sql);
                        $result2 = mysqli_query($conn,$sql2);
                        $result3 = mysqli_query($conn,$sql3);
                       
                        $row=mysqli_fetch_array($result);
                        $row2=mysqli_fetch_array($result2);
                        $row3=mysqli_fetch_array($result3);
                        
                        
                ?>
                <div class="card col-sm-3 align-items-center text-white p-3" style="margin-left:150px ">
                    <div class="icon" style="font-size:40px"><i class="fas fa-chart-line"></i></div>
                    <div class="counter">
                        <h5><?php echo "₱ ".$row3['total']?></h5>
                    </div>
                    <div class="text">
                        <h4>Total Sales</h4>
                    </div>
                </div>

                <div class="card col-sm-3 align-items-center text-white ms-5 p-3">
                    <div class="icon" style="font-size:40px"><i class="fa fa-shopping-cart"></i></div>
                    <div class="counter">
                        <h5><?php echo $row2['countProducts']?></h5>
                    </div>
                    <div class="text">
                        <h4>Total Products</h4>
                    </div>
                </div>

                <div class="card col-sm-3 align-items-center text-white ms-5 p-3">
                    <div class="icon" style="font-size:40px"><i class="fa fa-users"></i></div>
                    <div class="counter">
                        <h5><?php echo $row['countAccounts']?></h5>
                    </div>
                    <div class="text">
                        <h4>Total Accounts</h4>
                    </div>
                </div>
            <?php }?>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>


        </script>
</body>

</html>