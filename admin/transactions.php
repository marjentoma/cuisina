<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mirza&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-v4-rtl/4.6.0-2/js/bootstrap.min.js">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">

    <link rel="stylesheet" href="../src/dashboard.css">
    <!-- Vendor CSS Files -->
    <!-- <link rel="stylesheet" href="./src/style.css"> -->
    <title>Admin Dashboard</title>
    <style>
  
        body {
        background-color:#e6eeff;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
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
        <nav class="navbar navbar-expand-lg navbar-light  p-0"
            style="background-color: #e6eeff;width:81%;margin-left:4%;box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);">
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
                            alt="" loading="lazy" /> <span class="align-middle text-dark"><?php echo $_SESSION['username'];?></span></a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item " href="../adminLogIn.php">Logout</a></li>
                    </ul>
                </div>
                <!-- Right elements -->
            </div>
        </nav>
        <!-- Navbar -->
        <!-- Header - End  -->

        <!--  side Navigation - Start  -->
    </header>
    <nav id="sidemenu" style="width:19%;background-color:#014e;margin-right:10px;">

        <i class="fas fa-user-cog text-white mt-3 "></i>
        <h2 class="text-white ms-5">Admin</h2>
        <hr class="text-white">
        <div class="main-menu ">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-4 p-3">
                <li><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                <li><a class="nav-link  " href="products.php">Products</a></li>
                <li><a class="nav-link active text-primary" href="transactions.php">Transactions</a></li>
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
        <div class="container" style="margin-left:17%; padding:15px">
            <div class="row">

                <div class="card col-sm-6 p-2 ms-3 ">
                    <div class="container p-0  mb-3 d-flex" >
                        <span style="margin-right:30%">
                            <h4>Total Sales</h4>
                        </span>

                        <input class="form-control me-2   p-4" style="width:35%" type="search"
                            placeholder="Quick Search..." aria-label="Search" id="input">
                        <button class="btn btn-outline-secondary " type="submit"
                            style="padding:1px 15px"><i class="fas fa-search"></i></button>
                    </div>
                    <table class="table w-25 table-hover "
                        id="sales" style="">
                        <thead>
                            <th scope="col ">Sale_Id</th>
                            <th scope="col ">Table Number</th>
                            <th scope="col ">Customer Name</th>
                            <th scope="col ">Total Items</th>
                            <th scope="col ">Bill</th>
                            <th scope="col ">Transaction Date</th>
                            <th scope="col ">Received By</th>


                        </thead>
                        <tbody>

                            <?php
                         include_once('../admin/connection.php');
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    } else {

                        $sql = "SELECT * from sales";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {

                    ?>

                            <tr>
                                <td class=""><?php echo $row['sale_id'] ?></td>
                                <td class=""><?php echo $row['table_no'] ?></td>
                                <td class=""><?php echo $row['customer_name'] ?></td>
                                <td class=""><?php echo $row['quantity'] ?></td>
                                <td class=""><?php echo $row['bill'] ?></td>
                                <td class=""><?php echo $row['paid_at'] ?></td>
                                <td class=""><?php echo $row['signature'] ?></td>

                            </tr>

                            <?php
                            }
                        }
                    }

                    ?>
                        </tbody>
                    </table>
                </div>

                <div class="card col-sm-4 ms-5 align-items-center">
                    <div class="container p-0 mr-3 mb-3 d-flex">
                        <span class="mt-3 ">
                            <h4 class="ms-5"> Total Sales of the Day</h4>
                        </span>
                    </div>
                    <table class="table table-hover mt-3" style="width:contain">
                        <thead class="">

                            <th scope="col ">Total Items</th>
                            <th scope="col ">Bill</th>
                            <th scope="col ">Transaction Date</th>


                        </thead>
                        <tbody>


                            <?php
                   
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    } else {

                        $sql = "SELECT sum(quantity) as quantity, sum(bill) as bill, DATE(paid_at) as transaction_date FROM sales group by DATE(paid_at)";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {

                    ?>

                            <tr>
                                <td class=""><?php echo $row['quantity'] ?></td>

                                <td class=""><?php echo $row['bill'] ?></td>

                                <td class=""><?php echo $row['transaction_date'] ?></td>

                            </tr>

                            <?php
                            }
                        }
                    }

                    ?>
                        </tbody>
                    </table>


                    <?php
            date_default_timezone_set('Asia/Manila');
            $dateCreated = date("Y-m-d");
            //query for displaying the menu who is top sales
            //$query="select menu_name from menu inner join table_orders on table_orders.menu_id=menu.menu_id order by date(table_orders.paid_at)";

            $sql = "SELECT sum(quantity) as quantity, sum(bill) as bill, DATE(paid_at) as transaction_date FROM sales where DATE(paid_at)='" . $dateCreated . "'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    if($row['quantity']==NULL && $row['bill']==NULL && $row['transaction_date']==NULL){
                    ?>
                    <div class="card  mt-5 p-3" style="width:20rem">No sales data for today</div>
                    <?php
            
                    }else{
            ?>
                    <div class="card  mt-5 p-3" style="width:20rem">
                        <h3 class="text-center">Total Sales for the day</h3>

                        <span>Total Items Sold:</span><?php echo $row['quantity'] ?><br>

                        <span>Bill:</span><?php echo '₱' . $row['bill'] ?><br>

                        <span>Date:</span><?php echo date('l  F d, Y', strtotime($row['transaction_date'])) ?><br>

                    </div>

                    <?php
                    }
                }
            }

            ?>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
        // $(document).ready(function() {
        //     $('#sales').DataTable({
        //         "scrollY": "50vh",
        //         "scrollCollapse": true,
        //     });
        //     $('.dataTables_length').addClass('bs-select');
        // });
        </script>
</body>

</html>