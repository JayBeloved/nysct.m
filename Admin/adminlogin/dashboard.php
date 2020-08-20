<?php
    require 'config.php';
    if (!isset($_SESSION['id'])) { // send the person packing if he/she hasn't logged in
        $_SESSION['errorMessage'] = 'You must log in to continue';
        header('Location:index.php');
    }

    $Staff_ID = $_SESSION['id'];
    $query = "SELECT * FROM staff_table where staff_id ='$Staff_ID'"; // you don't have to add password to the query because the user has already been authenticated
    $query_run = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <title>Dashboard</title>
</head>
<body>
 <center>
 <?php
  if (mysqli_num_rows($query_run)>0){
    while ($row = mysqli_fetch_assoc($query_run)) {
        
        ?>
         <label>Name</label>
         <input type="text" value="<?= $row['name'];?>" readonly>
         <label>Staff ID</label>
         <input type="text" value="<?=$row['staff_id'];?>" readonly>
         <label>Position</label>
         <input type="text" value="<?=$row['position'];?>" readonly>
        <?php
    }

  }
 ?>
 </center>
 <form action="" method="">
  <h3></h3>
  <button>Verify Clearance</button>
 </form>
 <a href="http://login.admin/index.php"><h2>Logout</h2></a>  
</body>
</html>