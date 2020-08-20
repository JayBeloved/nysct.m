<?php
    require 'config.php';
    if (!isset($_SESSION['id'])) { // send the person packing if he/she hasn't logged in
        $_SESSION['errorMessage'] = 'You must log in to continue';
        header('Location:index.php');
    }

    $Callup_Number = $_SESSION['id'];
    $query = "SELECT * FROM corp_member_details where callup_number ='$Callup_Number'"; // you don't have to add password to the query because the user has already been authenticated
    $query_run = mysqli_query($connection, $query);
     if(isset($_POST['submit'])){
        $Time= $_POST['time'];
        $Date=$_POST['date'];
        $Time_selected= "$Date  $Time";

        
        $sql="INSERT into time_table (callup_number, Time_selected) VALUES ('$Callup_Number','$Time_selected')";

        if (mysqli_query($connection, $sql)) {

             echo "Clearance Request Submitted";
        } else{
            echo "Error;" .$sql ."<br>" .$connection->error;
        }
        header("refresh:10; url=dashboard.php");

        mysqli_close($connection);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
 <center>
 <?php
  if (mysqli_num_rows($query_run)>0){
    while ($row = mysqli_fetch_assoc($query_run)) {
        
        ?>
         <label>Name</label>
         <input type="text" value="<?= $row['name'];?>"readonly><p/>
         <label>Callup Number</label>
         <input type="text" value="<?=$row['callup_number'];?>"readonly><p/>
         <label>Statecode</label>
         <input type="text" value="<?=$row['statecode'];?>"readonly><p/>
         <label>Community Development Service</label>
         <input type="text" value="<?=$row['cds'];?>"readonly><p/>
         <label>Place of Primary Assignment</label>
         <input type="text" value="<?=$row['ppa'];?>" readonly>
        <?php
    }

  }
 ?>
 </center>
 <center>
  <form action="<?=$_SERVER['PHP_SELF']; ?>" method="POST">
  <h3>Select Time for Clearance</h3>
   <input type="date" name="date">
   <input type="time" name="time">
   <button type="submit" id="btn" name="submit">Select Time</button>
  </form>
 <a href="http://localhost/loginpagetest/"><h2>Logout</h2></a>  
</body>
</html>