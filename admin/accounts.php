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
    body {
        background-color:#e6eeff;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }

    table {
        border: 1px solid black;
        table-layout: fixed;
        width: 200px;
    }

    th,
    td {
        border: none;
        width: 100px;
        overflow: hidden;
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
                            alt="" loading="lazy" /> <span
                            class="align-middle text-dark"><?php echo $_SESSION['username'] ?></span></a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../adminLogIn.php">Logout</a></li>
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
        <i class="fas fa-user-cog text-white mt-3  "></i>
        <h2 class="text-white ms-5">Admin</h2>
        <hr class="text-white">
        <div class="main-menu ">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-4 p-3">
                <li><a class="nav-link" href="dashboard.php">Dashboard</a></li>
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
        <div class="card table-responsive mt-0"
            style="margin-left:250px;padding:50px;width:80%">
            <div class="card-header d-flex">
                <button type="button" id="button1" class="btn btn-info w-25"
                    style="margin-right:350px;"><i class="fas fa-plus"></i>Add New
                    User</button>
                <div class="searchContainer">

                    <input class="form-control w-100" style="padding:1px 25px;" type="text" id="myInput"
                        onkeyup="myFunction()" placeholder="Search for accounts.." title="Type in a name">
                </div>
            </div>
            <table class="table table-hover text-dark table-striped " id="accounts" style="">
                <thead>
                    <tr>
                        <th scope="col">Account Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
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
       
        $sql="SELECT accounts.account_id, accounts.account_name, accounts.username, accounts.password, position.position_name, accounts.created_at, accounts.updated_at, accounts.deleted_at from accounts inner join position on accounts.position=position.position_id where deleted_at IS NULL order by position.position_name asc, accounts.account_name asc ";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          
          while($row = $result->fetch_assoc()){
           
      ?>

                    <tr id="data">
                        <td class="col id"><?php echo $row['account_id']; ?></td>
                        <td class="col name"><?php echo $row['account_name']; ?></td>
                        <td class="col username"><?php echo $row['username']; ?></td>
                        <td class="col password"><?php echo $row['password']; ?></td>
                        <td class="col position"><?php echo $row['position_name']; ?></td>
                        <td class="col"><?php echo $row['created_at']; ?></td>
                        <td class="col"><?php echo $row['updated_at']; ?></td>

                        <td class="col">

                            <button class="btn btn-info update" ><i
                                    class="fa fa-pen text-danger"></i></button>
                            <a href="../admin/deleteAccount.php?id=<?php echo $row['account_id']; ?>">
                                <button type="button" class="btn  btn-xs"><i
                                        class="fa fa-trash text-danger"></i></button></a>

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

    <!-- Modal for inserting new account -->
    <div class="modal" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="width:80%; background-color:rgba(2, 103, 124, 0.9)">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">New Account</h5>
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="accountName" id="floatingName"
                                placeholder="name@example.com">
                            <label for="floatingName"> Name</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="username" id="floatingUsername"
                                placeholder="name@example.com">
                            <label for="floatingUsername"> Username</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="password" class="form-control" name="accountPassword" id="floatingPassword"
                                placeholder="name@example.com">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <select class="form-select" aria-label="Default select example" name="position">
                            <option value="1">Admin</option>
                            <option value="2">Waiter</option>

                        </select>

                        <!-- 
                        <input type="text" class="form-control" name="accountName"
                            placeholder="Enter account name here"><br><br>
                        <h5>Password:</h5>
                        <input type="password" name="accountPassword" placeholder="Enter account password here"><br><br>
                        <h5>Position:</h5>
                        <select class="form-select" aria-label="Default select example" name="position">
                            <option value="1">Admin</option>
                            <option value="2">Waiter</option>

                        </select><br> -->

                        <button class="btn btn-info float-end mt-3" type="submit" name="addAccount">Add Account<br>
                    </form>
                </div>
                <div class="modal-footer">
                   <button type="button " class=" close btn btn-info" >Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for updating account -->
    <div class="modal" id="updateUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content"
                style="width:80%; margin-left:auto; margin-right:auto; text-align:left;background-color:rgba(2, 103, 124, 0.9);">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Account</h5>
                    <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST">
                        <input type="hidden" id="accountId" name="accountId" value="">

                        <div class="form-floating mb-2">
                            <input type="text" id="accountName" class="form-control" name="accountName"
                                placeholder="name@example.com">
                            <label for="accountName"> Name</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="username" id="username"
                                placeholder="name@example.com">
                            <label for="floatingUsername"> Username</label>
                        </div>

                        <div class="form-floating mb-2">
                            <input type="password" id="accountPassword" class="form-control" name="accountPassword"
                                placeholder="name@example.com">
                            <label for="accountPassword"> Password</label>
                        </div>

                        <select class="form-select" aria-label="Default select example" id="position"
                        name="position">
                        <option value="1">Admin</option>
                        <option value="2">Waiter</option>

                        </select><br>

                        

                        <input type="submit" name="updateAccount" value="Update Account"><br>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {

        $("#button1").click(function(){
    
        $('#addUser').modal({ backdrop: 'static', keyboard: false })
        $('#addUser').modal('show');

        $(".close").click(() => {
            $('#addUser').modal('hide');

        })
    })
        $(".update").click(function() {

            $('#updateUser').modal({
                backdrop: 'static',
                keyboard: false
            })
            $('#updateUser').modal('show');

            $accountId = $(this).parent().siblings('.id').html()
            $accountName = $(this).parent().siblings('.name').html()
            $accountUsername=$(this).parent().siblings('.username').html()
            $accountPassword = $(this).parent().siblings('.password').html()
            $accountPosition = $(this).parent().siblings('.position').html()
            $("#accountId").val($accountId)
            if ($accountPosition == "Admin") {
                $("#position").val("1")
            } else {
                $("#position").val("2")
            }

            $("#accountPassword").val($accountPassword)
            $("#accountName").val($accountName)
            $("#username").val($accountUsername)
            $(".close").click(() => {
                $('#updateUser').modal('hide');

            })


        })


    })
    </script>
    <script>
    //prevent form to submit on page reload
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
    <?php
      include_once('../admin/connection.php');
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

      //on insert button click to add new account
      if(isset($_POST['addAccount'])){
        
          $accountName=$_POST['accountName'];
            $username=$_POST['username'];
          $accountPassword=$_POST['accountPassword'];
          $position=$_POST['position'];
          

          //set default timezone to asia or manila-Philippines timezone
          date_default_timezone_set('Asia/Manila');
          $dateCreated=date("Y-m-d h:i:s");
          
              $sql = "insert into accounts(account_name, username, password, position, created_at) 
              VALUES('".$accountName."','".$username."','".$accountPassword."','".$position."','".$dateCreated."') ";
              if ($conn->query($sql) === TRUE) {
              ?>

    <!--fire a successful message using sweet alert -->
    <script>
    swal({
        position: 'top-end',
        icon: 'success',
        title: 'Account successfully added!',
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

       //on insert button click to update an account
       if(isset($_POST['updateAccount'])){
        $accountId=$_POST['accountId'];
        $accountName=$_POST['accountName'];
        $accountPassword=$_POST['accountPassword'];
        $position=$_POST['position'];
        $username=$_POST['username'];

        //set default timezone to asia or manila-Philippines timezone
        date_default_timezone_set('Asia/Manila');
        $dateUpdated=date("Y-m-d h:i:s");
        // echo "<script>alert('$acccountId+$accountName+$accountPassword+$position+$dateUpdated')</script>";
            $sql = "update accounts set account_name='".$accountName."', username='".$username."', password='".$accountPassword."', position='".$position."', updated_at='".$dateUpdated."' where account_id='".$accountId."'";
            if ($conn->query($sql) === TRUE) {
            ?>

    <!--fire a successful message using sweet alert -->
    <script>
    swal({
        position: 'top-end',
        icon: 'success',
        title: 'Account successfully updated!',
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
    <script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#accounts #data").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script>
</body>

</html>