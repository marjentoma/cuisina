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
</head>

<body>
    <!-- Header - Start  -->
    <header id="header">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light"
            style="background-color: white;  box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);padding:15px">
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
        <i class="fas fa-user-cog text-white mt-5  "></i>
        <h2 class="text-white ms-5">Admin</h2>
        <div class="main-menu ">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-4 p-3">
                <li><a class="nav-link" href="dashboard.php">Home</a></li>
                <li><a class="nav-link " href="products.php">Products</a></li>
                <li><a class="nav-link" href="transactions.php">Transactions</a></li>
                <li><a class="nav-link active text-primary" href="accounts.php">Accounts</a></li>

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
        <button class="btn btn-secondary float-end mr-5 mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#addMenu">Add
            new account</button>
        <!-- Modal -->
        <div class="modal fade" id="addMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header p-3 text-center border-white align-items-center justify-content-center">
                        <h5 class="modal-title " id="exampleModalLabel" style="margin-left:150px">Add New Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <!-- <input type="hidden" id="menuNo" name="menuNo" value=""> -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control p-1" name="menuName" id="name"
                                    placeholder="Menu Name">
                                <label for="name">Menu Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control p-1" id="menuPhoto" name="photo"
                                    placeholder="Photo">
                                <label for="menuPhoto">Photo</label>
                            </div>
                            <select class="form-select" name="menuType" aria-label="Default select example">
                                <option selected>Menu Type</option>
                                <option value="breakfast">Breakfast</option>
                                <option value="lunch">Lunch</option>
                                <option value="dinner">Dinner</option>
                                <option value="dessert">Dessert</option>
                            </select><br>
                            <select class="form-select" name="availabilty" aria-label="Default select example">
                                <option selected>Availability</option>
                                <option value="available">Available</option>
                                <option value="not available">Unavailable</option>
                            </select><br>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control p-1" id="menuPrice" name="menuPrice"
                                    placeholder="Price">
                                <label for="menuPrice">Price</label>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="addMenu" class="btn btn-primary">Add menu</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ===End of modAL=== -->
        <div class="table-responsive" style="margin-left:220px;margin-right:40px">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Account Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Password</th>
                        <th scope="col">Position</th>
                        <th scope="col">Created_At</th>
                        <th scope="col">Updated_At</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
    include_once('../admin/connection.php');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }else{
       
        $sql="SELECT accounts.account_id, accounts.account_name, accounts.password, position.position_name, accounts.created_at, accounts.updated_at, accounts.deleted_at from accounts inner join position on accounts.position=position.position_id where deleted_at IS NULL order by position.position_name asc, accounts.account_name asc ";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          
          while($row = $result->fetch_assoc()){
           
      ?>

                    <tr>
                        <td class="col-1 id"><?php echo $row['account_id']; ?></td>
                        <td class="col-1 name"><?php echo $row['account_name']; ?></td>
                        <td class="col-1 password"><?php echo $row['password']; ?></td>
                        <td class="col-1 position"><?php echo $row['position_name']; ?></td>
                        <td class="col-1"><?php echo $row['created_at']; ?></td>
                        <td class="col-1"><?php echo $row['updated_at']; ?></td>

                        <td class="col-1">

                            <button class="btn btn-info btn-xs" href=""><i class="fa fa-pen"></i></button>
                            <a href="../admin/deleteAccount.php?id=<?php echo $row['account_id']; ?>">
                                <button type="button" class="btn btn-danger btn-xs"><i
                                        class="fa fa-trash"></i></button></a>

                        </td>
                    </tr>
                    <?php }?>
                </tbody>
                <?php
        }
      }
    ?>
            </table>
        </div>
    </div>
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
    < /body>

    <
    /html>