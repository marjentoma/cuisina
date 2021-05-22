<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- ==Bootstrap 4=== -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- ==Bootstrap 5==== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <!-- Vendor CSS Files -->
    <link href="./vendor/animate.css/animate.min.css" rel="stylesheet">

    <link href="./vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="./src/style.css" rel="stylesheet">

    <title>Document</title>
</head>

<body>
    <?php
        session_start();
        $username=$_SESSION['username'];
        $fullName=$_SESSION['accountName'];
        $accountId=$_SESSION['accountId'];

    ?>
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
                    <img src="https://mdbootstrap.com/img/new/avatars/2.jpg" class="rounded-circle" height="35" alt=""
                        loading="lazy" /> <span class="align-middle"><?php echo $username?></span></a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </div>
            <!-- Right elements -->
        </div>
    </nav>
    <!-- Navbar -->

    <!-- Row -->
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-6" style="border-right:1px solid #D3D3D3">
                <div class="d-flex align-items-center">
                    <select name="" id="" class="form-select mt-3 w-25 p-2">
                        <option selected>Meal Category</option>
                        <option value="1">Breakfast</option>
                        <option value="2">Lunch</option>
                        <option value="3">Dinner</option>
                        <option value="4">Dessert</option>
                    </select>
                    <select name="" id="tables" class="form-select mt-3 w-25 p-2 ms-3">
                        <option value="selected" selected>Choose Table</option>
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
                    </select>
                    <form class="d-flex">
                        <input class="form-control me-2 p-2 ms-3 mt-3" type="search" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-outline-success mt-3 " type="submit">Search</button>
                    </form>
                </div>

                <?php
                    include_once('../waiter/displayMenu.php');
                ?>
                
         </div> 
        <div class="col-sm-6" style="margin-bottom: 60%; padding:50px;">
            <div class="container">
                <table class="table">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Table</th>
                            <th scope="col">Order</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ordered_at</th>
                        </tr>
                    </thead>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

            <script>

            </script> 
            <?php
                include_once('../admin/connection.php');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }else{
                    
                    $sql="select table_orders.table_no,menu.menu_name,menu.price, table_orders.quantity,table_orders.bill,table_orders.status, table_orders.ordered_at from ((table_orders inner join menu on table_orders.menu_id=menu.menu_id)inner join tables on tables.table_no=table_orders.table_no)";
         
                    $result = $conn->query($sql);
      
                    if ($result->num_rows > 0) {
        
                    while($row = $result->fetch_assoc()){
                
            ?>
                    <tbody>

                        <tr>
                        <td><?php echo $row['table_no']?></td>
                        <td ><?php echo $row['menu_name']?></td>
                        
                        <td><?php echo '₱'.$row['price']?></td>
                        <td><?php echo $row['quantity']?></td>
                        <td><?php echo '₱'.$row['bill']?></td>
                        <td><?php echo $row['status']?></td>
                        <td><?php echo $row['ordered_at']?></td>
                        </tr>
                    </tbody>
                
                <?php
                            }
                        }
                    
                      
                        
                    }
                   
                ?>
                </table>
            </div>
        </div>

    </div>
    </div>

<!-- Modal for inserting menu -->
<div class="modal" id="addOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="width:80%; margin-left:auto; margin-right:auto; text-align:left;padding: 10px;border-radius:20%;padding:20px">
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
                        <option value="selected" selected>Choose Table</option>
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
                    <input class="form-control"readonly name="menuName"  id="menuName">
                    <h6>Price :</h6>
                    <input class="form-control"readonly name="price"  id="price">
                
                    <h6>Quantity:</h6>
                    <input class="form-control" type="number" id="quantity" name="quantity"><br>
                    <h6>Total Bill: &nbsp;₱<span id="total"></span></h6>
                    <input type="hidden" name="totalBill" id="totalBill" value="">
                    <input type="submit" name ="addOrder" value="Send Order"><br>
            </form>    
            </div> 
            <div class="modal-footer">
              <button  type="button" class="close">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
<script>

$(document).ready(function(){

    //any button with addOrder class will show the modal and get the price and name of menu
    $('.addOrder').click(function(){
        $('#addOrder').modal({ backdrop: 'static', keyboard: false })
        $('#addOrder').modal('show');
        var menuName=$(this).siblings('.menuName').children('span:first-child').html();
        console.log(menuName)
        var price=$(this).siblings('.menuName').children('.price').html();
        $('#menuName').val(menuName);
        $('#price').val(price)
        price=price.substr(1);
        $('#price').val(price)
        $quantity=0;

        //everytime the quantity is filled up function to put content in total fires
        $('#quantity').click(function(){
            $quantity=$(this).val();
            $('#totalBill').val(price*$quantity)
            $('#total').html(price*$quantity)
            $('#quantity').keyup(function(){
                $quantity=$('#quantity').val();
                $('#totalBill').val(price*$quantity)
                $('#total').html(price*$quantity)
            })
           
        })
       
    })
//modal hides
    $(".close").click(() => {
          $('#addOrder').modal('hide');

        })
})
</script>
<script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
</script>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ"
        crossorigin="anonymous"></script>


<?php
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
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
            VALUES('".$tableNo."','".$menuId."','".$quantity."','".$total."','pending','".$dateCreated."') ";
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