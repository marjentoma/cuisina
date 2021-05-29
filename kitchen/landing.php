<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kitchen</title>
    <!-- ====GOOGLE FONTS==== -->
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i"
        rel="stylesheet">
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- <link src="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <style>
    body {
        background-image: url('../public/img/kitchen.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        margin-left: 100px;

        font-family: 'Mirza', cursive;

    }

    .card-header {
        border: 0px solid white;
    }

    .images {
    height:150px;
    width:260px;
    }
    /* .col-sm-4{
         transition: transform .2s; 

    }
    .col-sm-4 :hover{
    transform: scale(1.1);
} */

    </style>
</head>

<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <nav class="navbar navbar-light  p-3 w-100 fixed-top" style="box-shadow:rgba(0,0,0,5) 0px 0px 20px;background-color:#e6eeff">
        <div class="container">
            <span class="navbar-brand mb-0 ">
                <h3>Kitchen</h3>
            </span>
            <a class="btn btn-info" style="box-shadow:rgba(0,0,0,.1)0px 0px 10px" href="../home.html"><i
                    class="fas fa-long-arrow-alt-left"></i> Back To Home</a>
        </div>
    </nav>

    <div class="container p-0" style="">
        <div class="row" style=" padding:10px;margin-top:10%;">

            <?php
    include_once('../admin/connection.php');
    // echo $_SESSION['UserId'];
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }else{
     
      $sql="select table_orders.order_id,table_orders.table_no, menu.availability, menu.menu_name, menu.menu_photo,menu.price, table_orders.quantity,table_orders.bill,table_orders.status, table_orders.ordered_at from ((table_orders inner join menu on table_orders.menu_id=menu.menu_id)inner join tables on tables.table_no=table_orders.table_no) where status='pending'";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()){
         
    ?>

            <!-- Food -->
            <div class="card col-sm-4 w-25  pt-4  m-3 mt-2 " style="text-align:center;background-color:#ccebff;box-shadow:rgba(0,0,0,5) 0px 10px 20px;border:1px solid #003399">
                <form method="POST">
                    <div class="product-top">
                        <div class="card-header p-2 m-0  d-flex " style="background-color:#99d6ff">
                            <span class="float-start ">
                                <h6><?php echo "Table ". $row['table_no']?></h6>
                            </span>
                            <span class=" " style="margin-left:40%;background-color:#668cff;padding:3px 10px;border-radius:5%;">
                                <h6><?php echo $row['availability']?></h6>
                            </span>

                        </div>
                        <img class="images image-fluid" src="<?php echo $row['menu_photo']?>" class="img-thumbnail" alt="">
                        <div class="card-body text-align-center ">
                            <h6 class="text-center menuName"><span><?php echo $row['menu_name']?></span><br>
                                <span class="text-muted price"><?php echo '₱'.$row['price']?></span>
                            </h6>
                          
                            <h6 class="text-center tableName">
                                <span class="text-center quantity"><?php echo "Quantity: ". $row['quantity']?></span>
                               
                            </h6>
                            <input class="orderId" type="hidden" name="orderId" value="<?php echo $row['order_id']?>">
                            <input class="" type="hidden" name="availability" value="<?php echo $row['availability']?>">
                            
                            <button type="submit" name="acceptOrder" class="btn btn-primary   acceptOrder" title="Order"
                                style="width:40%">
                                <i class="fa fa-check fa-5px ">Accept</i>
                            </button>
                            <button type="button" name="button1" class="btn btn-primary denyOrder" title="Order"
                                style="width:40%" data-toggle="modal" data-target="#reject">
                                <i class="fa fa-ban fa-5px">Deny</i>
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

    <!--modal for denying request-->
    <div class="modal" tabindex="-1" role="dialog" id="reject">
        <div class="modal-dialog" role="document">
            <div class="modal-content w-75">
                <div class="modal-header">
                    <h5 class="modal-title">Deny Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" name="orderId" value="" id="orderId">
                        <h2 class="danger">Are you sure?</h2><br>

                        <button type="submit" name="sendRejection" class="btn btn-danger mb-2">Yes</button>
                        <button type="button" class="btn btn-secondary mb-2" data-dismiss="modal">No</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
            integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
            crossorigin="anonymous"></script>

        <script>
        $(document).ready(function() {
            $('.denyOrder').click(function() {
                console.log($(this).siblings('.orderId').val())
                $('#orderId').val($(this).siblings('.orderId').val())
            })
        })
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
      if(isset($_POST['sendRejection'])){
          
          $orderId=$_POST['orderId'];
              $sql = "update table_orders set status='Rejected' where order_id='".$orderId."' ";
              if ($conn->query($sql) === TRUE) {
                ?>

        <!--fire a successful message using sweet alert -->
        <script>
        swal({
            position: 'top-end',
            icon: 'success',
            title: 'Order denied successfully!',
            timer: 1800

        })
        setTimeout(() => {
            location.reload()
        }, 2000);
        </script>
        <?php
                
            
                }
          
          
      }

//accepting order from customer

if(isset($_POST['acceptOrder'])){
  $orderId=$_POST['orderId'];
  $availability=$_POST['availability'];
  $sql="update table_orders set status='Accepted' where order_id='".$orderId."'";
  if($availability=='available'){
    if ($conn->query($sql) === TRUE) {
      ?>

        <!--fire a successful message using sweet alert -->
        <script>
        swal({
            position: 'top-end',
            icon: 'success',
            title: 'Order accepted successfully!',
            timer: 1800

        })
        setTimeout(() => {
            location.reload()
        }, 2000);
        </script>
        <?php
      
    }
    
}else{
    ?>

        <!--fire a successful message using sweet alert -->
        <script>
        swal({
            position: 'top-end',
            icon: 'error',
            title: 'Menu is not available. Deny order!',
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