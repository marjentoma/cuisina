<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bill</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link src="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<style>
#signature {
  font-family: "Sofia", sans-serif;
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>


<script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
</script>  


<div class="container-fluid" style="margin-left:15%">
        <div class="row ">
            
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
                    <div class="card col-sm-6 mt-5 ms-s m-2" style="text-align:center;width:25rem;">
                        <form method="post" class="form">
                      
                        <div class="product-top">
                           <h2 class="jumbotron"><?php echo 'Table Number '.$row['table_no']?></h2>
                           <input class="" type="hidden" name="tableNo" value="<?php echo $table_no?>">
                           <?php
                                while($row2=$result2->fetch_assoc()){
                            ?>
                           <div class="container orders"><?php echo $row2['menu_name']?>&nbsp;<?php echo $row2['quantity']?>&nbsp;<?php echo '₱'.$row2['bill']?></div>
                           <?php
                                }
                            ?>
                             
                                <div class="card-body text-align-center ">
                                    <h3 class="text-center menuName"><span><?php echo $row['table_status']?></span></h3>
                                    <input type="hidden" name="quantity" value="<?php echo $row['quantity']?>">
                                    <h5>Total Number of Item/s:&nbsp;<span class="text-center price"><?php echo $row['quantity']?></span></h5>
                                    <h4>Total Bill:&nbsp;<span class="text-center price"><?php echo '₱'.$row['total_bill']?></span></h4><br>
                                    <label>Customer:</label>
                                    <input type="text" name="customer" placeholder="Enter customer's name"><br><br>
                                    <label>Signature:</label>
                                    <input type="text" name="waiter" placeholder="Enter your name"><br><br>
                                    <input type="hidden" name="totalBill" value="<?php echo $row['total_bill']?>">
                                    <button type="submit" name="paid" class="btn btn-primary receipt" title="Order">
                                        <i class="fa fa-check"></i>Confirm Bill Receipt
                                    </button>
                                    
                                </div>
                           
                        </div>
                        </form>
                    </div>
    <?php
            
        }

      }else{
    ?>
        <div class="alert alert-info w-50 m-5 text-center" role="alert">
            All table bills are paid. Customers are not done eating!
        </div>
   <?php   
      }
    }
    ?>

      
    </div> 
       

    </div>
</div>


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
            $sql="insert into sales (table_no, customer_name, quantity, bill, paid_at, signature) values('".$table_no."', '".$customer."', '".$quantity."', '".$totalBill."', '".$datePaid."', '".$waiter."')";
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

</body>
</html>