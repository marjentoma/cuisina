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

    <title>Waiter View</title>
    <style>
    .row .col .card :hover {
        transform: scale(1.1);
        transition: 0.5s;
    }

    body {
        background-color: #e6eeff;
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
    header("Location: ../waiterLogIn.php");
}
?>
    <!-- Header - Start  -->
    <header id="header">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light  ms-5 "
            style="background-color:#e6eeff;width:82%;  box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);">
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
        <i class="fas fa-user text-white mt-1 "></i>
        <h2 class="text-white ms-5">Waiter</h2>
        <hr class="text-white">
        <div class="main-menu ">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-4 p-3">
                <li><a class="nav-link active text-primary" href="waiter.php">Menu</a></li>
                <li><a class="nav-link " href="order.php">Order</a></li>
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
        <div class="container mb-5 d-flex ">
            <!-- <select name="" id="tableOption" class="form-control w-25 float-start mr-5 ms-5 mt-3">
                <option selected>Choose Meal Category</option>
                <option value="breakfast">Breakfast</option>
                <option value="lunch">Lunch</option>
                <option value="dinner">Dinner</option>
                <option value="dessert">Dessert</option>
            </select> -->

            <div class="card col-3 mr-5 p-3 " style="margin-left:20%">
                <h4 class="text-center"> Table Status</h4>
                <?php
                include_once('../admin/connection.php');
                // echo $_SESSION['UserId'];
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }else{
                     $sql="select * from tables ";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        
                        while($row = $result->fetch_assoc()){
                        
                    
            ?>
                <span>
                    <h6><?php echo "Table Number ".$row['table_no']?>:
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['table_status']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i
                            class="fa fa-pen" id="<?php echo $row['table_no']?>"></i></h6>
                </span>
                <?php }}}?>
            </div>

            <!-- <select class="form-select w-50  mt-3 p-3 " id="selectTable" style="float:right" name="tables"
                aria-label="Default select example">
                <option selected>Choose Table</option>
                <option value="1">Table 1</option>
                <option value="2">Table 2</option>
                <option value="3">Table 3</option>
                <option value="4">Table 4</option>
                <option value="5">Table 5</option>
                <option value="6">Table 6</option>
                <option value="7">Table 7</option>
                <option value="8">Table 8</option>
                <option value="9">Table 9</option>
                <option value="10">Table 10</option>
            </select> -->
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script>
        $('.fa-pen').on('click', function() {
            $('#tableStatus').modal('show')
            $("#table").val(this.id)
        })
        </script>
        <?php
            //  if ($conn->connect_error) {
            //     die("Connection failed: " . $conn->connect_error);
            //     }else{
                
            //     $sql="select * from menu where menu_type='breakfast' order by  menu_name asc";
            //     $result = $conn->query($sql);
                
            //     if ($result->num_rows > 0) {
                    
            //         while($row = $result->fetch_assoc()){
                    
                ?>
        <!-- Modal -->
        <div class="modal fade" id="tableStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog w-25" style="height:50px">
                <div class="modal-content p-0 ">
                    <div class="modal-header p-3">
                        <h6 class="modal-title " style="margin-left:100px" id="exampleModalLabel">Update table status
                        </h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" class="form">
                        <div class="modal-body p-3 text-center">

                            <input type="hidden" id="table" name="tableNo" value="">
                            <div class="form-floating text-center">

                                <select class="form-select w-50  mt-3 p-3 mr-5" id="selectTable" style="float:right"
                                    name="tableStatus" aria-label="Default select example">

                                    <option value="available">Available</option>
                                    <option value="occupied">Occupied</option>
                                </select>
                            </div>
                            <br>

                            <button type="submit" id="" name="updateTable"
                                class="btn btn-secondary bg-transparent text-dark" style="">Save</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
        <!-- End of the Modal -->
        <!-- Show lunch -->
        <!-- <div class="container p-0 m-0 float-end" > -->
        <h4 class="text-center ms-5">Breakfast</h4>
        <hr class="w-50 float-start " style="margin-left:20%">
        <div class="menu row " style="margin-top:5%;margin-left:20%">
            <?php
                include_once('../admin/connection.php');
                // echo $_SESSION['UserId'];
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }else{
                
                $sql="select * from menu where menu_type='breakfast' order by  menu_name asc";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    
                    while($row = $result->fetch_assoc()){
                    
                ?>

            <div class="col col-3 m-1">
                <div class="card p-3">
                    <img src="<?php echo $row['menu_photo']?>" class="img-fluid" alt=""
                        style="width:230px;height:200px">
                    <h4 class="menuName text-center "><?php echo $row['menu_name']?></h3>
                        <h4 class=" price text-muted text-center "><?php echo "₱" . $row['price']?></h4>
                        <button name="button1" class="btn btn-info float-end mb-3 addOrder" title="Order">
                            <i class="fa fa-check fa-5px ">Order</i>
                        </button>
                </div>
            </div>
            <?php
        }

      }
      
    }
    ?>
        </div>
    </div>

    <!-- Show lunch -->
    <!-- <div class="container p-0 m-0 float-end" > -->
    <h4 class=" ms-5 text-center mt-5 " style="float-left">Lunch</h4>
    <hr class="w-50 float-start " style="margin-left:20%">
    <div class="menu row " style="margin-top:5%;margin-left:20%">
        <?php
                include_once('../admin/connection.php');
                // echo $_SESSION['UserId'];
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }else{
                
                $sql="select * from menu where menu_type='lunch' order by  menu_name asc";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    
                    while($row = $result->fetch_assoc()){
                    
                ?>
        <div class="col col-3 m-1">
            <div class="card p-3">
                <img src="<?php echo $row['menu_photo']?>" class="img-fluid" alt="" style="width:230px;height:200px">
                <h4 class=" menuName text-center"><?php echo $row['menu_name']?></h3>
                    <h4 class="price text-muted text-center"><?php echo "₱" . $row['price']?></h4>
                    <button name="button1" class="btn btn-info float-end mb-3 addOrder" title="Order">
                        <i class="fa fa-check fa-5px ">Order</i>
                    </button>
            </div>
        </div>
        <?php
        }

      }
      
    }
    ?>
    </div>
    </div>
    <!-- Show dinner -->
    <!-- <div class="container p-0 m-0 float-end" > -->
    <h4 class=" ms-5 text-center mt-5 " style="float-left">Dinner</h4>
    <hr class="w-50 float-start " style="margin-left:20%">
    <div class="menu row " style="margin-top:5%;margin-left:20%">
        <?php
                include_once('../admin/connection.php');
                // echo $_SESSION['UserId'];
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }else{
                
                $sql="select * from menu where menu_type='dinner' order by  menu_name asc";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    
                    while($row = $result->fetch_assoc()){
                    
                ?>
        <div class="col col-3 m-1">
            <div class="card p-3">
                <img src="<?php echo $row['menu_photo']?>" class="img-fluid" alt="" style="width:230px;height:200px">
                <h4 class="menuName text-center"><?php echo $row['menu_name']?></h3>
                    <h4 class="price text-muted text-center"><?php echo "₱" . $row['price']?></h4>
                    <button name="button1" class="btn btn-info float-end mb-3 addOrder" title="Order">
                        <i class="fa fa-check fa-5px ">Order</i>
                    </button>
            </div>
        </div>
        <?php
        }

      }
      
    }
    ?>
    </div>
    </div>
    <!-- Show dessert -->
    <!-- <div class="container p-0 m-0 float-end" > -->
    <h4 class="text-center ms-5">Dessert</h4>
    <hr class="w-50 float-start " style="margin-left:20%">
    <div class="menu row " style="margin-top:5%;margin-left:20%">
        <?php
                include_once('../admin/connection.php');
                // echo $_SESSION['UserId'];
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }else{
                
                $sql="select * from menu where menu_type='dessert' order by  menu_name asc";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    
                    while($row = $result->fetch_assoc()){
                    
                ?>
        <div class="col col-3 m-1">
            <div class="card p-3">
                <img src="<?php echo $row['menu_photo']?>" class="img-fluid" alt="" style="width:230px;height:200px">
                <h4 class=" menuName text-center "><?php echo $row['menu_name']?></h3>
                    <h4 class="price text-muted text-center"><?php echo "₱" . $row['price']?></h4>
                    <button name="button1" class="btn btn-info float-end mb-3 addOrder" title="Order">
                        <i class="fa fa-check fa-5px ">Order</i>
                    </button>
            </div>
        </div>
        <?php
        }

      }
      
    }
    ?>
    </div>
    </div>
    <!-- Show drinks -->
    
    <h4 class=" ms-5 text-center mt-5 " style="float-left">Drinks</h4>
    <hr class="w-50 float-start " style="margin-left:20%">
    <div class="menu row " style="margin-top:5%;margin-left:20%">
        <?php
                include_once('../admin/connection.php');
                // echo $_SESSION['UserId'];
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }else{
                
                $sql="select * from menu where menu_type='drinks' order by  menu_name asc";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    
                    while($row = $result->fetch_assoc()){
                    
                ?>
        <div class="col col-3 m-1">
            <div class="card p-3">
                <img src="<?php echo $row['menu_photo']?>" class="img-fluid" alt="" style="width:230px;height:200px">
                <h4 class="menuName text-center"><?php echo $row['menu_name']?></h3>
                    <h4 class="price text-muted text-center"><?php echo "₱" . $row['price']?></h4>
                    <button name="button1" class="btn btn-info float-end mb-3 addOrder" title="Order">
                        <i class="fa fa-check fa-5px ">Order</i>
                    </button>
            </div>
        </div>
        <?php
        }

      }
      
    }
    ?>
    </div>
    </div>
    <!-- </div> -->

    <!-- Modal for inserting new order -->
    <div class="modal" id="addOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content"
                style="width:80%; margin-left:auto; margin-right:auto; text-align:left;padding: 10px;border-radius:3%;padding:20px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">New Order</h5>
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST">

                        <h6>Table No:</h6>
                        <select name="table" id="tables" class="form-select mt-3 w-26 p-2 ms-1">

                            <option value="1">Table 1</option>
                            <option value="2">Table 2</option>
                            <option value="3">Table 3</option>
                            <option value="4">Table 4</option>
                            <option value="5">Table 5</option>
                            <option value="6">Table 6</option>
                            <option value="7">Table 7</option>
                            <option value="8">Table 8</option>
                            <option value="9">Table 9</option>
                            <option value="10">Table 10</option>
                        </select><br>
                        <h6>Menu :</h6>
                        <input class="form-control" readonly name="menuName" id="menuName">
                        <h6>Price :</h6>
                        <input class="form-control" readonly name="price" id="price">

                        <h6>Quantity:</h6>
                        <input class="form-control" type="number" id="quantity" name="quantity"><br>
                        <h6>Total Bill: &nbsp;₱<span id="total"></span></h6>
                        <input type="hidden" name="totalBill" id="totalBill" value="">
                        <input type="submit" class="btn btn-primary" name="addOrder" value="Send Order"><br>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close">Cancel</button>
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



    <script>
    $(document).ready(function() {
        // $('#selectTable').change(function() {
        //     //  $('#' + $(this).val());
        //     var input = $(this).val();
        //     console.log(input);
        //     $('#tables').val(input)
        // });

        //any button with addOrder class will show the modal and get the price and name of menu
        $('.addOrder').click(function() {
            $('#addOrder').modal({
                backdrop: 'static',
                keyboard: false
            })
            $('#addOrder').modal('show');
            var menuName = $(this).siblings('.menuName').html();
            console.log(menuName);
            var price = $(this).siblings('.price').html();
            console.log(price);
            $('#menuName').val(menuName);
            $('#price').val(price)
            price = price.substr(1);
            $('#price').val(price)
            $quantity = 0;

            //everytime the quantity is filled up function to put content in total fires
            $('#quantity').click(function() {
                $quantity = $(this).val();
                $('#totalBill').val(price * $quantity)
                $('#total').html(price * $quantity)
                $('#quantity').keyup(function() {
                    $quantity = $('#quantity').val();
                    $('#totalBill').val(price * $quantity)
                    $('#total').html(price * $quantity)
                })

            })

        })
        //modal hides
        $(".close").click(() => {
            $('#addOrder').modal('hide');

        })
    });
    </script>
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
    <?php
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_POST['updateTable'])){
        $status=$_POST['tableStatus'];
        $tableNo=$_POST['tableNo'];
       
        $sql="update tables set table_status = '".$status."' where table_no='".$tableNo."'";
        
        if($conn->query($sql)===TRUE){
            ?>
    <!--fire a successful message using sweet alert -->

    <script>
    swal({
        position: 'top-end',
        icon: 'success',
        title: 'Table status updated successfully!',
        showConfirmButton: false,
        timer: 1800

    })
    setTimeout(() => {
        location.reload()
    }, 2000);
    </script>


    <?php
        }else{
        echo "error";
        }
    }
 
    
    if(isset($_POST['addOrder'])){
        $tableNo=$_POST['table'];
        $menuName=$_POST['menuName'];
        $quantity=$_POST['quantity'];
        $price=$_POST['price'];
        $total=$_POST['totalBill'];
        // echo "<script>alert('$tableNo+$menuName+$quantity+$price+$total')</script>";
        $sql="select menu_id from menu where menu_name='".$menuName."' and price='".$price."'";
        $result = mysqli_query($conn,$sql);
        $num_row = mysqli_num_rows($result);
        $row=mysqli_fetch_array($result);
        
        $menuId=$row['menu_id'];
        
        //set default timezone to asia or manila-Philippines timezone
        date_default_timezone_set('Asia/Manila');
        $dateCreated=date("Y-m-d h:i:s");
        
            $sql = "insert into table_orders(table_no, menu_id, quantity, bill, status,ordered_at) 
            VALUES('".$tableNo."','".$menuId."','".$quantity."','".$total."','Pending','".$dateCreated."') ";
            if ($conn->query($sql) === TRUE) {
            ?>

    <!--fire a successful message using sweet alert -->

    <script>
    swal({
        position: 'top-end',
        icon: 'success',
        title: 'Order sent to the kitchen!',
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
</body>

</html>