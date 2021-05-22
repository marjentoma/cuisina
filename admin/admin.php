<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Admin</title>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link src="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <style>
        body{
            color: white;
        }
        a{
          text-decoration: none;
        }

.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a{
  padding: 6px 6px 6px 32px;
  text-decoration: none;
  font-size: 25px;
  /* color: #818181; */
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 200px; /* Same as the width of the sidenav */
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.modal{
            color:black;
            border: solid 2px white; 
            display:none; 
        }
        #button1{
          background-color: blue;
          border-style: none;
          border-radius: 15%;
          color:skyblue;
          font-size: 20px;
        }
        #button1:hover{
          color: white;
        }

     .update{
       width:50%;
       height: 40px;
       border-radius: 20%;
       background-color:skyblue;

     }
    </style>
    
</head>

<body bgColor="black">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
<div class="sidenav">
  <h3>&nbsp;Dashboard</h3>
  <a href="admin.php">Home</a>
  <button id="button1" style="margin-left: 30px">Add New</button>
  <a href="accounts.php">Accounts</a>
  <a href="transactions.php">Transactions</a>
</div>

<div class="container" style="margin-left:20%;background-color:white;">
  <div class="row" style=" padding:20px;">

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
      <div class="card col-sm-4" style="box-shadow:5px 5px #4E2D04; width:20rem;margin:10px;margin-top:20px;margin-bottom:20px;border:solid black 2px;height:fit-content;font-size:18px; border-radius:10%;border:solid black 2px;color:black;padding:10px;border-radius: 10px;">
   
        <div>
        <label><strong>Id:</strong></label>
        <input type="hidden" class="id" value="<?php echo $row['menu_id'] ?>">
            <span class="menuId"><em><?php echo $row['menu_id'] ?></em></span><br>
          <label><strong>Name:</strong></label>
            <span class="menuName"><em><?php echo $row['menu_name'] ?></em></span><br>
            <label><strong>Photo:</strong></label>
            <input type="hidden" class="photo" value="<?php echo $row['menu_photo'] ?>">
            <div class="container"><img style="width:100%;height:auto;border-radius:5%"src="<?php echo $row['menu_photo'] ?>"></div>
            <label><strong>Menu Type:</strong></label>
            <span class="menuType"><?php echo $row['menu_type'] ?></span><br>
            <label><strong>Availability:</strong></label>
            <span class="availability"><?php echo $row['availability'] ?></span><br>
            <label><strong>Price:</strong></label>
            <span class="menuPrice"><?php echo "Php".$row['price'] ?></span><br>
            <label><strong>Date Created:</strong></label> 
             <span><?php echo $row['created_at'] ?></span><br>
             <label><strong>Date Updated:</strong></label> 
             <span><?php echo $row['updated_at'] ?></span><br> 
              <button type="button" class="update"><i class="fa fa-pen"></i>Edit Menu</button>   
        </div>
    </div>
        
 
          <?php
          }
        }
      }
          ?>
  </div>
</div> 

<!-- Modal for inserting menu -->
<div class="modal" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="width:80%; margin-left:auto; margin-right:auto; text-align:left;padding: 10px;border-radius:20%;padding:20px">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">New Menu</h5>
            <button type="button" class="close" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <form method="POST">
              
                <h5>Name:</h5>
                    <input id="title" type="text" name="menuName" placeholder="Enter menu name here"><br>
                <h5>Photo:</h5>
                    <textarea id="photo" rows="2" cols="45" name="photo">
                    Enter menu photo here...</textarea>
                    
                <h5>Menu Type:</h5>
                <select class="form-select" aria-label="Default select example" name="menuType">
                    <option value="breakfast">breakfast</option>
                    <option value="lunch">lunch</option>
                    <option value="dessert">dessert</option>
                    <option value="dinner">dinner</option>
                </select>
                <h5>Availability:</h5>
                <select class="form-select" aria-label="Default select example" name="availability">
                    <option value="available">Available</option>
                    <option value="not available">Not Available</option>
                </select>
                    <h5>Price:</h5>
                    <input type="text" id="price"  value="" name="menuPrice"><br><br>
                    <input type="submit" name ="addMenu" value="Add Menu"><br>
            </form>    
            </div> 
            <div class="modal-footer">
              <button  type="button" class="close">Cancel</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal for updating menu -->
<div class="modal" id="updateMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="width:80%; margin-left:auto; margin-right:auto; text-align:left;padding: 10px;border-radius:10%">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Update Menu</h5>
            <button type="button" class="close" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <form method="POST">
                <input type="hidden" id="menuNo" name="menuNo" value="">
                <h5>Name:</h5>
                <input id="menuName" type="text" name="menuName" placeholder="Enter title here" required><br>
                <h5>Photo:</h5>
                <textarea id="menuPhoto" rows="4" cols="45" name="photo" required>
                Enter the online link of the photo...</textarea>
                <h5>Menu Type:</h5>
                <select class="form-select" id="menuType" aria-label="Default select example" name="menuType">
                    <option value="breakfast">breakfast</option>
                    <option value="lunch">lunch</option>
                    <option value="dessert">dessert</option>
                    <option value="dinner">dinner</option>
                </select>
                <h5>Availability:</h5>
                <select class="form-select" id="availability" aria-label="Default select example" name="availability">
                    <option value="available">Available</option>
                    <option value="not available">Not Available</option>
                    
                </select><br>
                <span><strong>Price:<strong></span>
                <input type="text" id="menuPrice"  name="menuPrice" required><br><br>
                <input type="submit" name ="updateMenu" value="Save Changes"><br>
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

     //trigger modal for inserting new menu
    $("#button1").click(function(){
      
      $('#addMenu').modal({ backdrop: 'static', keyboard: false })
      $('#addMenu').modal('show');

      $(".close").click(() => {
          $('#addMenu').modal('hide');

        })
    })
    
   
    //trigger modal for updating menu
    $(".update").click(function(){
      var menuId=$(this).siblings('.id').val();
      var menuName=$(this).siblings('span.menuName').children().html();
      var menuPhoto=$(this).siblings('input.photo').val();
     
      var menuPrice=$(this).siblings('span.menuPrice').html()
      var menuPrice=menuPrice.substr(3)
      $('#updateMenu').modal({ backdrop: 'static', keyboard: false })
      $('#menuType').val($(this).siblings(".menuType").html())
      $('#availability').val($(this).siblings(".availability").html())
     
      $('#updateMenu').modal('show');
      $('#menuName').val(menuName);
      $('#menuPhoto').val(menuPhoto);
      $('#menuPrice').val(menuPrice);
      $("#menuNo").val(menuId)
      $(".close").click(() => {
          $('#updateMenu').modal('hide');

        })

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
      if(isset($_POST['addMenu'])){
        
          $menuName=$_POST['menuName'];
          $menuPhoto=trim($_POST['photo']);
          $menuType=$_POST['menuType'];
          $availability=$_POST['availability'];
          $price=$_POST['menuPrice'];

          //set default timezone to asia or manila-Philippines timezone
          date_default_timezone_set('Asia/Manila');
          $dateCreated=date("Y-m-d h:i:s");
          echo $menuName;
          
              $sql = "insert into menu(menu_name, menu_type, menu_photo, availability, price,created_at) 
              VALUES('".$menuName."','".$menuType."','".$menuPhoto."','".$availability."','".$price."','".$dateCreated."') ";
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