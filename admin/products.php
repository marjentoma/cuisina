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
        <nav class="navbar navbar-expand-lg navbar-light bg-light "
            style="background-color: white;width:85%; box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);padding:15px">
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
                <li><a class="nav-link active text-primary" href="products.php">Products</a></li>
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
    <div id="content-wrapper" style="margin-left:25%;">
        <div class="d-flex" style="margin-left:20%">
            <select id="mealOption" class="form-select w-25 mr-5" aria-label="Default select example">
                <option value="all"> Show All</option>
                <option value="breakfast">Breakfast</option>
                <option value="lunch">Lunch</option>
                <option value="dinner">Dinner</option>
                <option value="dessert">Dessert</option>
            </select>
            <button class="btn btn-secondary float-end mt-1 mr-5" name="addMenu" data-bs-toggle="modal"
                data-bs-target="#addMenu">Add new menu</button>
        </div>
        <!-- Modal for adding menu-->
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
        <!--==All Menu Section ===  -->
        <div class="menu container" id="all">
            <h4 class="mt-5" style="margin-left:10%">All Menu</h4>
            <hr style="width:75%;margin-left:10%">
            <div class="row mt-5 " style="right:0px;">
                <?php
                    include_once('../admin/connection.php');
                    // echo $_SESSION['UserId'];
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }else{

                    $sql="select * from menu order by menu_type asc, menu_name asc";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()){

                    ?>
                <div class="col-3 md-4 card m-3 p-3 w-100">

                    <div class="body">
                        <div class="card-header p-0 mt-1 bg-white text-center" style="border:0px solid white">
                            <input type="hidden" class="id" value="<?php echo $row['menu_id'] ?>">
                            <span class="availability"><?php echo $row['availability'] ?></span><br>
                            <span class="menuName">
                                <h5><?php echo $row['menu_name'] ?></h6>
                            </span>

                        </div>
                        <input type="hidden" class="photo" value="<?php echo $row['menu_photo'] ?>">
                        <img id="images" class="img-fluid" src="<?php echo $row['menu_photo'] ?>">
                        <div class="ms-5" style="font-size:16px">
                            <span class="menuPrice ">
                                <p class="mt-2" style="font-size:25px;margin-left:25%"><?php echo "₱".$row['price'] ?>
                                </p>
                            </span> <br>

                        </div>

                        <div class="card-footer bg-white border-white d-flex p-0 ">
                            <!-- <a class="details"><i class="fa fa-info ms-5 p-3"></i></a> -->
                            <button class="btn btn-default" name="update" data-bs-toggle="modal"
                                data-bs-target="#updateMenu"><i class="fa fa-pen p-3 ms-5"></i></button>
                            <a><i class="fa fa-trash-alt p-3"></i></a>
                        </div>
                        <!-- <button type="button" class="update"><i class="fa fa-pen"></i>Edit Menu</button> -->
                    </div>
                </div>


                <?php
          }
        }
      }
          ?>
                <!-- Modal for update-->
                <div class="modal fade" id="updateMenu" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div
                                class="modal-header p-3 text-center border-white align-items-center justify-content-center">
                                <h5 class="modal-title " id="exampleModalLabel" style="margin-left:150px">Add New Menu
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <!-- <input type="hidden" id="menuNo" name="menuNo" value=""> -->
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control p-1" name="menuName" id="menuName"
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
                                <button type="submit" name="updateMenu" class="btn btn-primary">Add menu</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ====END OF MODAL==== -->
    <div class="menu container" id="breakfast" style="display:none">
        <h4 class="mt-5" style="margin-left:10%">BreakFast</h4>
        <hr style="width:75%;margin-left:10%">
        <div class="row " style="margin-left:250px">
            <?php
                    include_once('../admin/connection.php');
                    // echo $_SESSION['UserId'];
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }else{

                    $sql="select * from menu WHERE menu_type='breakfast' order by menu_name asc ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()){

                    ?>

            <div class="col-3 md-4 card m-3 p-3 w-100">

                <div>
                    <div class="card-header p-0 mt-1 bg-white text-center" style="border:0px solid white">
                        <input type="hidden" class="id" value="<?php echo $row['menu_id'] ?>">
                        <span class="availability"><?php echo $row['availability'] ?></span><br>
                        <span class="menuName">
                            <h5><?php echo $row['menu_name'] ?></h6>
                        </span>

                    </div>
                    <input type="hidden" class="photo" value="<?php echo $row['menu_photo'] ?>">
                    <img id="images" class="img-fluid" src="<?php echo $row['menu_photo'] ?>">
                    <div class="ms-5" style="font-size:16px">
                        <span class="menuPrice ">
                            <p class="mt-2" style="font-size:25px;margin-left:25%"><?php echo "₱".$row['price'] ?></p>
                        </span> <br>

                    </div>

                    <div class="card-footer bg-white border-white d-flex p-0 ">
                        <a class="details"><i class="fa fa-info ms-5 p-3"></i></a>
                        <a><i class="fa fa-pen p-3"></i></a>
                        <a><i class="fa fa-trash-alt p-3"></i></a>
                    </div>
                    <!-- <button type="button" class="update"><i class="fa fa-pen"></i>Edit Menu</button> -->
                </div>
            </div>


            <?php
          }
        }
      }
          ?>
        </div>
    </div>
    </div>

    <!--==Lunch Section ===  -->
    <div class="menu container" id="lunch" style="display:none">
        <h4 class="mt-5" style="margin-left:10%">Lunch</h4>
        <hr style="width:75%;margin-left:10%">
        <div class="row   mt-5 " style="margin-left:150px">
            <?php
                    include_once('../admin/connection.php');
                    // echo $_SESSION['UserId'];
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }else{

                    $sql="select * from menu where menu_type='lunch' order by menu_name asc";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()){

                    ?>
            <div class="col-3 md-4 card m-3 p-3 w-100">

                <div>
                    <div class="card-header p-0 mt-1 bg-white text-center" style="border:0px solid white">
                        <input type="hidden" class="id" value="<?php echo $row['menu_id'] ?>">
                        <span class="availability"><?php echo $row['availability'] ?></span><br>
                        <span class="menuName">
                            <h5><?php echo $row['menu_name'] ?></h6>
                        </span>

                    </div>
                    <input type="hidden" class="photo" value="<?php echo $row['menu_photo'] ?>">
                    <img id="images" class="img-fluid" src="<?php echo $row['menu_photo'] ?>">
                    <div class="ms-5" style="font-size:16px">
                        <span class="menuPrice ">
                            <p class="mt-2" style="font-size:25px;margin-left:25%"><?php echo "₱".$row['price'] ?></p>
                        </span> <br>

                    </div>

                    <div class="card-footer bg-white border-white d-flex p-0 ">

                        <a><i class="fa fa-pen p-3"></i></a>
                        <a><i class="fa fa-trash-alt p-3"></i></a>
                    </div>

                </div>
            </div>


            <?php
          }
        }
      }
          ?>
        </div>
    </div>
    </div>
    <!-- ===Dinner Section=== -->
    <div class="menu container" id="dinner" style="display:none">
        <h4 class="mt-5" style="margin-left:10%">Dinner</h4>
        <hr style="width:75%;margin-left:10%">
        <div class="row mt-5 " style="margin-left:150px">
            <?php
                    include_once('../admin/connection.php');
                    // echo $_SESSION['UserId'];
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }else{

                    $sql="select * from menu where menu_type='dinner' order by menu_name asc";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()){

                    ?>
            <div class="col-3 md-4 card m-3 p-3 w-100">

                <div>
                    <div class="card-header p-0 mt-1 bg-white text-center" style="border:0px solid white">
                        <input type="hidden" class="id" value="<?php echo $row['menu_id'] ?>">
                        <span class="availability"><?php echo $row['availability'] ?></span><br>
                        <span class="menuName">
                            <h5><?php echo $row['menu_name'] ?></h6>
                        </span>

                    </div>
                    <input type="hidden" class="photo" value="<?php echo $row['menu_photo'] ?>">
                    <img id="images" class="img-fluid" src="<?php echo $row['menu_photo'] ?>">
                    <div class="ms-5" style="font-size:16px">
                        <span class="menuPrice ">
                            <p class="mt-2" style="font-size:25px;margin-left:25%"><?php echo "₱".$row['price'] ?></p>
                        </span> <br>

                    </div>

                    <div class="card-footer bg-white border-white d-flex p-0 ">
                        <!-- <a class="details"><i class="fa fa-info ms-5 p-3"></i></a> -->
                        <a><i class="fa fa-pen p-3"></i></a>
                        <a><i class="fa fa-trash-alt p-3"></i></a>
                    </div>
                    <!-- <button type="button" class="update"><i class="fa fa-pen"></i>Edit Menu</button> -->
                </div>
            </div>


            <?php
          }
        }
      }
          ?>
        </div>
    </div>
    </div>
    <!-- ===Dessert Section==== -->
    <div class="menu container" id="dessert" style="display:none">
        <h4 class="mt-5" style="margin-left:10%">Dessert</h4>
        <hr style="width:75%;margin-left:10%">
        <div class="row  mt-5 " style="margin-left:150px">
            <?php
                    include_once('../admin/connection.php');
                    // echo $_SESSION['UserId'];
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }else{

                    $sql="select * from menu where menu_type='dessert' order by menu_name asc";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()){

                    ?>
            <div class="col-3 md-4 card ms-5 p-3 w-100">

                <div>
                    <div class="card-header p-0 mt-1 bg-white text-center" style="border:0px solid white">
                        <input type="hidden" class="id" value="<?php echo $row['menu_id'] ?>">
                        <span class="availability"><?php echo $row['availability'] ?></span><br>
                        <span class="menuName">
                            <h5><?php echo $row['menu_name'] ?></h6>
                        </span>

                    </div>
                    <input type="hidden" class="photo" value="<?php echo $row['menu_photo'] ?>">
                    <img id="images" class="img-fluid" src="<?php echo $row['menu_photo'] ?>">
                    <div class="ms-5" style="font-size:16px">
                        <span class="menuPrice ">
                            <p class="mt-2" style="font-size:25px;margin-left:25%"><?php echo "₱".$row['price'] ?></p>
                        </span> <br>

                    </div>
                    <div class="card-footer bg-white border-white d-flex p-0 ">
                        <!-- <a class="details"><i class="fa fa-info ms-5 p-3"></i></a> -->
                        <button class="update btn btn-default"><i class="fa fa-pen p-3"></i></button>
                        <a><i class="fa fa-trash-alt p-3"></i></a>
                    </div>
                    <!-- <button type="button" class="update"><i class="fa fa-pen"></i>Edit Menu</button> -->
                </div>
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
        $('.details').click(function() {
            $('#hidden').toggle();
        });
        $('#mealOption').change(function() {
            $('.menu').hide();
            console.log('nifunction raman');
            $('#' + $(this).val()).show();
        });
        $(".update").click(function() {

            var menuName = $(this).siblings('span.menuName').children().html();
            var menuPhoto = $(this).siblings('input.photo').val();


        })
        $('#menuType').val($(this).siblings(".menuType").html())
        $('#availability').val($(this).siblings(".availability").html())

        // $('#updateMenu').modal('show');
        $('#menuName').val(menuName);
        console.log(menuName);

        $('#menuPhoto').val(menuPhoto);
        $('#menuPrice').val(menuPrice);
        // $("#menuNo").val(menuId)
        $(".close").click(() => {
            $('#updateMenu').modal('hide');

        })

        // })
        // });
    });
    </script>
    <script>
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

      //on insert button click to add new menu
      if(isset($_POST['addMenu'])){
        
          $menuName=$_POST['menuName'];
          $menuPhoto=trim($_POST['photo']);
          $menuType=$_POST['menuType'];
          $availability=$_POST['availability'];
          $price=$_POST['menuPrice'];

          //set default timezone to asia or manila-Philippines timezone
          date_default_timezone_set('Asia/Manila');
          $dateCreated=date("Y-m-d h:i:s");
        //   echo $menuName;
            

              $sql = "insert into menu(menu_name, menu_type, menu_photo, availability, price,created_at) 
              VALUES('".$menuName."','".$menuType."','".$menuPhoto."','".$availability."','".$price."','".$dateCreated."') ";}
    
              if ($conn->query($sql) === TRUE) {
              ?>

    <!--fire a successful message using sweet alert -->
    <script>
    swal({
        position: 'top-end',
        icon: 'success',
        title: 'Menu added to the restaurant!',
        showConfirmButton: false,
        timer: 1800

    })
    setTimeout(() => {
        location.reload()
    }, 2000);
    </script>
    <?php
          
              }
          
          
      
    
      //updating the menu on modal update 
      if(isset($_POST['updateMenu'])){
        $menuNo=$_POST['menuNo'];
        $menuName=$_POST['menuName'];
        $menuPhoto=trim($_POST['photo']);
        $menuType=$_POST['menuType'];
        $availability=$_POST['availability'];
        $price=$_POST['menuPrice'];
        
        //set default timezone to asia or manila-Philippines timezone
        date_default_timezone_set('Asia/Manila');
        $dateUpdated=date("Y-m-d h:i:s");
        // echo "<script>alert('$menuNo+$menuName+$menuPhoto+$menuType+$availability+$price+$dateUpdated')</script>";
            $sql = "UPDATE menu set  menu_name='".$menuName."',menu_type='".$menuType."', menu_photo='".$menuPhoto."', availability='".$availability."',price='".$price."', updated_at='".$dateUpdated."' where menu_id='".$menuNo."'";
            if ($conn->query($sql) === TRUE) {
            ?>

    <!--fire a successful message using sweet alert -->
    <script>
    swal({
        position: 'top-end',
        icon: 'success',
        title: 'Menu updated successfully!',
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