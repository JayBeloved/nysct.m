<?php
  $Name =$_POST['name'];
  $Callup_Number = $_POST['callup_number'];
  $Statecode = $_POST['statecode'];
  $Cds = $_POST['cds'];
  $Ppa =$_POST['ppa'];
  $Password = $_POST['password'];


 //Database connection
  $connection = new mysqli('nysctm.test','root','nysctm2020','nysc_db');
   if ($connection->connect_error) {
  	die('connection failed :' .$connection->connect_error);
   }
   else{

   //insert query
  $sql="INSERT into corp_member_details(name,callup_number,statecode,cds,ppa,password) VALUES('$Name','$Callup_Number','$Statecode','$Cds','$Ppa','$Password')";

    if ($connection->query($sql)===true) {
    echo "New Record Inserted successfully";
  } else{
    echo "Error;" .$sql ."<br>" .$connection->error;
  }
  header("refresh:2; url=index.html");

  mysqli_close($connection);
  
}



?>
  