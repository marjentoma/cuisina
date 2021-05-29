<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers view</title>
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
        background-color: #e6eeff;
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
        height: 150px;
        width: 260px;
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
    <nav class="navbar navbar-light  p-3 w-100 fixed-top"
        style="box-shadow:rgba(0,0,0,5) 0px 0px 20px;background-color:#e6eeff">
        <div class="container">
            <span class="navbar-brand mb-0 ">
                <h3>Menu</h3>
            </span>
            <a class="btn btn-info" style="box-shadow:rgba(0,0,0,.1)0px 0px 10px" href="../home.html"><i
                    class="fas fa-long-arrow-alt-left"></i> Back To Home</a>
        </div>
    </nav>

    <div class="container p-1 align-contents-center" style="text-align:center">
        <div class="row" style="padding:10px;margin-top:10%;">
            <!-- <div class="menu row " style="margin-top:5%;"> -->
            <?php
                include_once('../admin/connection.php');
                // echo $_SESSION['UserId'];
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }else{
                
                $sql="select * from menu  order by  menu_name asc";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    
                    while($row = $result->fetch_assoc()){
                    
                ?>

            <div class="col col-xs-4 mt-5 pl-5" style="">
                <div class="card p-3 m-2 " style="height:90%;width:15rem">
                    <img src="<?php echo $row['menu_photo']?>" class="img-fluid mb-3" alt=""
                        style="width:100%;height:100%">
                    <h6 class="menuName text-center "><?php echo $row['menu_name']?></h6>
                        <h6 class=" price text-muted text-center "><?php echo "₱" . $row['price']?></h6>
                        <div class="footer  ">
                            <i class="fa fa-star text-danger" style=""></i>
                            <i class="fa fa-star text-danger" style=""></i>
                            <i class="fa fa-star text-danger" style=""></i>
                            <i class="fa fa-star text-danger" style=""></i>
                            <i class="fa fa-star text-danger" style=""></i>

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

</body>

</html>