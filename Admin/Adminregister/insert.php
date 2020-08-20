<?php
  $Name = $_POST['name'];
  $Staff_ID = $_POST['staff_id'];
  $Position = $_POST['position'];
  $Password = $_POST['password'];

 //Database connection
  $connection = new mysqli('nysctm.test','root','nysctm2020','nysc_db');
   if ($connection->connect_error) {
  	die('connection failed :' .$connection->connect_error);
   }
   else{

   //insert query
  $sql ="INSERT into staff_table(name,staff_id,position,password) VALUES('$Name','$Staff_ID','$Position','$Password')";

    if ($connection->query($sql)===true) {
    echo "Staff Registered";
  } else{
    echo "Error;" .$sql ."<br>" .$connection->error;
  }
  header("refresh:5; url=index.html");

  mysqli_close($connection);
  
}



?>
  