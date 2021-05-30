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
    /* body {
        background-color:#e6eeff;
        background-repeat: no-repeat;
            background-size:cover;
        background-attachment: fixed
    } */

    #invoice-POS {
        box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
      
        /* width: 44mm; */
        background: #FFF;


        ::selection {
            background: #f31544;
            color: #FFF;
        }

        ::moz-selection {
            background: #f31544;
            color: #FFF;
        }

        h1 {
            font-size: 1.5em;
            color: #222;
        }


        p {
            font-size: .7em;
            color: #666;
            line-height: 1.2em;
        }

        #top,
        #mid,
        #bot {
            /* Targets all id with 'col-' */
            border-bottom: 1px solid #EEE;
        }

        #top {
            min-height: 100px;
        }

        #mid {
            min-height: 80px;
        }

        #bot {
            min-height: 50px;
        }



        .info {
            display: block;
            //float:left;
            margin-left: 0;
        }

        .title {
            float: right;
        }

        .title p {
            text-align: right;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            //padding: 5px 0 5px 15px;
            //border: 1px solid #EEE
        }

        .tabletitle {
            //padding: 5px;
            font-size: .5em;
            background: #EEE;
        }

        .service {
            border-bottom: 1px solid #EEE;
        }

        .item {
            width: 24mm;
        }

        .itemtext {
            font-size: .5em;
        }

        #legalcopy {
            margin-top: 5mm;
        }



    }
    </style>
</head>

<body>
    <?php 
session_start();
if($_SESSION['username']==""){
    header("Location: ../waiterLogIn.php");
}
?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous"></script>


    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>

    <!-- Header - Start  -->
    <header id="header">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light ms-5 p-0"
            style="background-color:#e6eeff;width:82%;  box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);padding:15px">
            <!-- Container wrapper -->
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand me-2">
                    <img class="img-fluid" src="../public/img/logo.PNG" alt="" style="width:100px;height:60px">
                </a>

                <!-- Right links -->
                <div class="dropdown ">
                    <a class="dropdown-toggle " id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown"
                        aria-expanded="false" style="text-decoration: none;">
                        <img src="https://mdbootstrap.com/img/new/avatars/2.jpg" class="rounded-circle" height="35"
                            alt="" loading="lazy" /> <span
                            class="align-middle text-dark"><?php echo $_SESSION['username']?></span></a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../waiterLogIn.php">Logout</a></li>
                    </ul>
                </div>
                <!-- Right elements -->
            </div>
        </nav>
        <!-- Navbar -->
        <!-- Header - End  -->

        <!--  side Navigation - Start  -->
    </header>
    <nav id="sidemenu" style="background-color:#014e">
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
<div id="flex-items" class="d-flex ">
<div class="row"  style="margin-left:20%;margin-top:10%;padding:5px;">
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
     
        <div id="invoice-POS" class="card col-sm-6 p-3 m-1" style='width:30rem; min-width:25rem;'>

            <center id="top">
                <div class="logo"></div>
                <div class="info">
                    <img class="img-fluid" src="../public/img/logo.PNG" alt="" style="width:100px;height:50px">
                </div>
                <!--End Info-->
            </center>
            <!--End InvoiceTop-->

            <div id="mid">
                <div class="info">
                    <p>
                        Address : Nasipit Road, Talamban Cebu City 6000</br>
                        Email : pinoy_cuisina@gmail.com</br>
                        Phone : 09057663551</br>
                    </p>
                </div>
            </div>
            <!--End Invoice Mid-->
            <form method="POST" class="form">
            <div id="bot">
                <input type="hidden" name="tableNo" value="<?php echo $row['table_no']?>">
                <input type="hidden" name="quantity" value="<?php echo $row['quantity']?>">
                 <input type="hidden" name="totalBill" value="<?php echo $row['total_bill']?>">
                <div id="table">
                    <table>
                        <tr class="tabletitle">
                            <td class="item">
                                <h6>Item</h6>
                            </td>
                            <td class="Hours">
                                <h6>Qty</h6>
                            </td>
                            <td class="Rate">
                                <h6>Sub Total</h6>
                            </td>
                        </tr>
                        <?php
                                while($row2=$result2->fetch_assoc()){
                            ?>
                        <tr class="service">
                            <td class="tableitem">
                                <p class="itemtext"><?php echo $row2['menu_name']?></p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext"><?php echo $row2['quantity']?></p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext"><?php echo '₱'.$row2['bill']?></p>
                            </td>
                        </tr>


                        <?php
                                }
                            ?>

                        <tr class="tabletitle">
                            <td></td>

                        </tr>

                        <tr class="tabletitle">
                            <td></td>
                            <td class="Rate">
                                <h6>Total Bill</h6>
                            </td>
                            <td class="payment">
                                <h5><?php echo '₱'.$row['total_bill']?></h5>

                            </td>
                        </tr>

                    </table>
                </div>
                <!--End Table-->
               
                <div id="legalcopy " class="mt-3">
                    <label for="Customer's Name: ">Customer's Name<input type="text"
                            name="customer" class="form-control p-0  w-100 readonly" value="" required></label>
                    <label for="Waiter's Name: ">Waiter's Signature<input type="text"
                            class="form-control p-0  w-100 readonly" name="waiter" value="" required></label>
                     <p class="legal"><strong>Thank you for dining with us
                            <?php echo 'Table Number '.$row['table_no']?>. Please come again!</strong>
                    </p>
                    <button type="submit" class="btn btn-info w-100" name="paid"><span class="fas fa-check"></span> Confirm Bill</button>
                   
                </div>

            </div>
            </form>
            <!--End InvoiceBot-->
        </div>
        <!--End Invoice-->

<!-- End of row -->

        <?php
            
        }

      }else{
    ?>
        <div class="alert alert-info w-50  text-center" style="margin-left:250px" role="alert">
            All table bills are paid.!
        </div>
        <?php   
      }
    }
    ?>
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
<?php 

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }else{
        
        if(isset($_POST['paid'])){
            $tableNo=$_POST['tableNo'];
            $quantity=$_POST['quantity'];
            $totalBill=$_POST['totalBill'];
            $customer=$_POST['customer'];
            $waiter=$_POST['waiter'];

            //set default timezone to asia or manila-Philippines timezone
            date_default_timezone_set('Asia/Manila');
            $datePaid=date("Y-m-d h:i:s");
            $query="update table_orders set status='Paid', paid_at = '".$datePaid."' where table_no='".$tableNo."'";
            // $sql="update tables set total_bill='".$totalBill."', table_status = 'available' where table_no = '".$tableNo."' ";
            $sql="insert into sales (table_no, customer_name, quantity, bill, paid_at, signature) values('".$tableNo."', '".$customer."', '".$quantity."', '".$totalBill."', '".$datePaid."', '".$waiter."')";
            if($conn->query($query)===TRUE && $conn->query($sql)===TRUE){
              
                ?>

               <!--fire a successful message using sweet alert -->
                <script>
                swal({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Table bill has been paid and table is now vacant!',
                    showConfirmButton: false,
                    timer: 1800
                
                })
                setTimeout(() => {  
                location.reload()
                }, 2000);
                </script>
              <?php
                
            }else{
                ?>

                <!--fire a successful message using sweet alert -->
                 <script>
                 swal({
                     position: 'top-end',
                     icon: 'success',
                     title: 'Something is wrong!',
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