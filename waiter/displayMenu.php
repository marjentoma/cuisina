<div class="row product d-flex align-items-center "> 
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
    
                    <!-- Food -->
                    <div class="card col-sm-4 w-28 mt-5 ms-s">
                        <div class="product-top">
                            <img src="<?php echo $row['menu_photo']?>" class="img-thumbnail" alt="">
                            <div class="card-body text-align-center ">
                                <h6 class="text-center menuName"><span><?php echo $row['menu_name']?></span>
                                <span class="text-muted price"><?php echo '₱'.$row['price']?></span></h6>
                                
                                <button name="button1" class="btn btn-primary float-end mb-3 addOrder" title="Order">
                                    <i class="fa fa-check fa-5px ">Order</i>
                                </button>
                            </div>
                        </div>
                    </div>
    <?php
        }

      }
      
    }
    ?>
</div>

