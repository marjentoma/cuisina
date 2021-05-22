<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mirza&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
    .row .col .card :hover {
        transform: scale(1.1);
        transition: 0.5s;
    }
    </style>
</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous"></script>
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
                <li><a class="nav-link active text-primary" href="order.php">Orders</a></li>

                <li><a class="nav-link" href="bill.php">Bill</a></li>

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
        <div class="container mb-5 ">



            <div class="col-sm-6" style=" padding:20px;">
                <!-- <div class="container"> -->
                <table class="table table-hover align-middle table-responsive-lg "
                    style="margin-left:150px;width:900px">
                    <thead class="table-light p-5">
                        <tr>
                            <th scope="col">Table</th>
                            <th scope="col">Order</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ordered_at</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
                        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
                        crossorigin="anonymous"></script>

                    <script>

                    </script>
                    <?php
                include_once('../admin/connection.php');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }else{
                    
                    $sql="select table_orders.order_id, table_orders.table_no,menu.menu_name,menu.price, table_orders.quantity,table_orders.bill,table_orders.status, table_orders.ordered_at from ((table_orders inner join menu on table_orders.menu_id=menu.menu_id)inner join tables on tables.table_no=table_orders.table_no) order by ordered_at asc";
         
                    $result = $conn->query($sql);
      
                    if ($result->num_rows > 0) {
        
                    while($row = $result->fetch_assoc()){
                
            ?>
                    <tbody>

                        <tr>
                            <td class="tableNo"><?php echo $row['table_no']?><input type="hidden" class="orderId"
                                    value="<?php echo $row['order_id'] ?>"></td>
                            <td class="menuName"><?php echo $row['menu_name']?></td>

                            <td class="price"><?php echo '₱'.$row['price']?></td>
                            <td class="quantity"><?php echo $row['quantity']?></td>
                            <td class="status"><?php echo '₱'.$row['bill']?></td>
                            <td class="status"><?php echo $row['status']?></td>
                            <td class="price"><?php echo $row['ordered_at']?></td>
                            <td><button class="btn " data-bs-toggle="modal" data-bs-target="#updateOrder"><i
                                        class="fa fa-pen"></i></button></td>
                        </tr>
                    </tbody>

                    <?php
                            }
                        }
                    
                      
                        
                    }
                   
                ?>
                    <!-- Modal for updating order -->
                    <div class="modal" id="updateOrder" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content"
                                style="width:80%; margin-left:auto; margin-right:auto; text-align:left;padding: 10px;padding:20px">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Order</h5>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#updateOrder"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form method="POST">
                                        <input type="hidden" id="orderId" name="orderId" value="">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend ">
                                                <span class="input-group-text bg-white p-3 mt-3" style="height:79%"
                                                    id="">Status</span>
                                            </div>
                                            <select name="status" id="status" class="form-select mt-3 w-26 p-3 ">
                                                <option value="Delivered">Delivered</option>
                                                <option value="Cancelled">Cancelled</option>

                                            </select><br>
                                        </div>

                                        <input type="submit" name="updateOrder" value="Confirm Status"><br>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#updateOrder">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </table>
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

        //updating the order status

    if(isset($_POST['updateOrder'])){
        $status=$_POST['status'];
        $orderId=$_POST['orderId'];
        $sql="update table_orders set status = '".$status."' where order_id='".$orderId."'";
        
        if($conn->query($sql)==TRUE){
            ?>
    <!--fire a successful message using sweet alert -->

    <script>
    swal({
        position: 'top-end',
        icon: 'success',
        title: 'Order status updated successfully!',
        showConfirmButton: false,
        timer: 1800

    })
    setTimeout(() => {
        location.reload()
    }, 2000);
    </script>


    <?php
        }
    }

    ?>

    </script>
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
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



</body>


</html>