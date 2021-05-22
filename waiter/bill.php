<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mirza&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0/dist/css/bootstrap.min.css" rel="stylesheet"
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
    .row .col .card :hover {
        transform: scale(1.1);
        transition: 0.5s;
    }
    </style>
</head>

<body>
    <!-- Header - Start  -->
    <header id="header">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light "
            style="background-color: white;width:85%;  box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);padding:15px">
            <!-- Container wrapper -->
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand me-2">
                    <h2> Cuisina</h2>
                </a>

                <!-- Right links -->
                <div class="dropdown ">
                    <a class="dropdown-toggle " id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown"
                        aria-expanded="false" style="text-decoration: none;">
                        <img src="https://mdbootstrap.com/img/new/avatars/2.jpg" class="rounded-circle" height="35"
                            alt="" loading="lazy" /> <span class="align-middle">Waiter</span></a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </div>
                <!-- Right elements -->
            </div>
        </nav>
        <!-- Navbar -->
        <!-- Header - End  -->

        <!--  side Navigation - Start  -->
    </header>
    <nav id="sidemenu">
        <i class="fas fa-user text-white mt-5  "></i>
        <h2 class="text-white ms-5">Waiter</h2>
        <div class="main-menu ">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-4 p-3">
                <li><a class="nav-link " href="waiter.php">Menu</a></li>
                <li><a class="nav-link " href="order.php">Order</a></li>
                <li><a class="nav-link active text-primary" href="bill.php">Bill</a></li>

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
        <div class="container" style="margin-left:15%">
            <div class="row ">
                <div class="col-7" style="border-right:1px solid #D3D3D3">
                    <div class="container">
                        <div class="row">
                            <?php
    include_once('../admin/connection.php');
    // echo $_SESSION['UserId'];
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }else{
     
        
    $sql="SELECT table_orders.table_no, sum(table_orders.quantity) as quantity, SUM(table_orders.bill) AS total_bill, table_status FROM ((table_orders inner join tables on table_orders.table_no=tables.table_no) inner join menu on menu.menu_id=table_orders.menu_id) where status='Delivered' group by table_no";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()){
            $table_no=$row['table_no'];
            $query="SELECT menu.menu_name,table_orders.quantity, table_orders.bill FROM ((table_orders inner join tables on table_orders.table_no=tables.table_no) inner join menu on menu.menu_id=table_orders.menu_id) where status='Delivered' and table_orders.table_no='".$table_no."'";
            $result2=$conn->query($query);
            
            
    ?>

                            <!-- Food -->
                            <div class="card  col-sm-5 mt-5 ms-s m-3" style="text-align:center;width:25rem;">
                                <form method="post">
                                    <div class="product-top ">
                                        <h2 class=""><?php echo 'Table '.$row['table_no']?></h2>
                                        <?php
                                while($row2=$result2->fetch_assoc()){
                            ?>
                                        <div class="container align-items-center">
                                            <?php echo 'Orders: '.$row2['menu_name'].'<br>'?>&nbsp;
                                            <?php echo 'Quantity: '.$row2['quantity']?>&nbsp;
                                             <?php echo '₱'.$row2['bill']?>
                                        </div>
                                        <?php
                                }
                            ?>
                                        <div class="card-body text-align-center ">
                                            <h5 class="text-center menuName">
                                                <span><?php echo $row['table_status']?></span></h3>
                                            <h5>Total Number of Item/s:&nbsp;<span
                                                    class="text-center price"><?php echo $row['quantity']?></span></h5>
                                            <h4>Total Bill:&nbsp;<span
                                                    class="text-center price"><?php echo '₱'.$row['total_bill']?></span>
                                            </h4>

                                            <button type="button" name="paid" class="btn btn-primary" title="Order">
                                                <i class="fa fa-check"></i>Confirm Bill Receipt
                                            </button>

                                        </div>

                                    </div>
                                </form>
                            </div>
                            <?php
            
        }

      }
      
    }
    ?>
                        </div>
                    </div>

                </div>
                <div class="col-sm-4" style=" padding:10px;text-align:center">
                    <div class="container">
                        <h1 class="">Bill Receipt</h1>
                        <div class="card" style="width:90%;margin-left:5%">
                            <img src="data:image/png;base64,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"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3>Cusina</h3>
                                <form class="form" method="POST">
                                    <label>Table Number:<input type="text" readonly class="form-control" id="totalBill"
                                            aria-describedby="emailHelp" placeholder=""></span>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Total Bill:</label>
                                            <input type="text" readonly class="form-control" id="totalBill"
                                                aria-describedby="emailHelp" placeholder="">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Customer Name:</label>
                                            <input type="text" class="form-control" id="customerName"
                                                aria-describedby="emailHelp" placeholder="Enter customer name">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Signature:</label>
                                            <input type="text" class="form-control" id="signature"
                                                placeholder="Enter your name as signature">
                                        </div>
                                        <div class="form-group form-check">
                                            <input type="submit" class="btn btn-primary" id="exampleCheck1">

                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <?php
         include_once('../admin/connection.php');
                // echo $_SESSION['UserId'];
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }else{
                
                $sql="select * from menu order by menu_type asc, menu_name asc";
                $result = $conn->query($sql);
                }
    ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
            integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
            crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
            integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
            crossorigin="anonymous"></script>
        <script>

        </script>
</body>


</html>