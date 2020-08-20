<?php
  session_start(); // I'm moving this whole block to a file that will be included everywhere it's needed
  $connection = new mysqli('nysctm.test','root','nysctm2020','nysc_db');
   if ($connection->connect_error) {
  	die('connection failed :' .$connection->connect_error);
  }
  if($_SESSION["callup_number"]==true){
    echo "Welcome"." ".$_SESSION["name"];
  }
  else{
    echo "invalid user";
  }
?>
<?php
  if(isset($_POST['submit'])){
  $Callup_Number = $_POST['callup_number'];
  $Password = $_POST['password'];

  $Callup_Number = $_SESSION["callup_number"];
  $sql= " SELECT * from corp_member_details where callup_number ='$Callup_Number' and binary password = '$Password'";
  $query=mysqli_query($connection, $sql);
  $data=mysqli_fetch_assoc($query);
  
  if (mysqli_num_rows($query) == 1){
  	header("location:dashboard.php");
  } else{
    echo "invalid user";
  }
   header("refresh:; url=index.html");
}
?>