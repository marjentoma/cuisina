

<?php

include_once('../admin/connection.php');

$id=$_GET['id'];
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//set default timezone to asia or manila-Philippines timezone
date_default_timezone_set('Asia/Manila');
$dateDeleted=date("Y-m-d h:i:s");

$sql = "update accounts set deleted_at='".$dateDeleted."' where account_id = '".$id."' and position=2";
if ($conn->query($sql) === TRUE) {
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
    <script>
//     swal({
//       position: 'top-end',
//       icon: 'success',
//       title: 'Menu added to the restaurant!',
//       showConfirmButton: false,
//       timer: 1800
    
//   })
//   setTimeout(() => {
//    ;
//               }, 2000);
  
//   </script>
    <?php
    header("Location:../admin/accounts.php");
} else {
  echo "<script>alert('Error: Admin account can\'t be deleted')
    window.location.replace('../admin/accounts.php');
  </script>";
  
}
$conn->close();
?>