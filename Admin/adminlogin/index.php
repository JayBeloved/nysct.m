<?php
	require 'config.php';

	$errorMessage = '';
	
	if (isset($_SESSION['errorMessage'])) { // if an error has been passed from the dashboard page, then display it here
		$errorMessage = $_SESSION['errorMessage'];
	}
  	
  	if(isset($_POST['submit'])) { // the code only runs when "submit" btn is clicked. wait let me explain The 'submit' btn represents the login btn
		$Staff_ID = $_POST['staff_id'];
		$Password = $_POST['password'];

		$sql= "SELECT password from staff_table where staff_id ='$Staff_ID'";
		$query=mysqli_query($connection, $sql);
		$data=mysqli_fetch_assoc($query);

		if (mysqli_num_rows($query) == 1) {
			if($data['password'] == $Password) {
				// this is where the session will start before navigating to the dashboard
				$_SESSION['id'] = $Staff_ID;
				header("location:dashboard.php");
			}else{
				$errorMessage = 'Invalid Password';
			}
		} else {
			$errorMessage = "User with Staff ID ".$Staff_ID." was not found";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
	<header>
 	<nav>
     <a href="#">
     	<img src="" alt="">
     </a>
     <ul>
     	<li><a href="">Home</a></li>
     	<li><a href="">Signup</a></li>
     	<li><a href="">Login</a></li>
     	<li><a href="">Harold</a></li>
     </ul>
 </header>
   <div class="box">
	<center>
		<h2>Login</h2>
		<?php if($errorMessage != '') { ?>
			<p><?=$errorMessage ?></p>
		<?php } ?>
		<form action="<?=$_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
			<!-- Check if the callup number has been previously entered and auto fill it in the value of the input -->
			<label>Staff ID</label>
			<input type="text" name="staff_id"
			value="<?php echo isset($_POST['staff_id']) ? $_POST['staff_id'] : ''; ?>" 
			required placeholder="Staff Identification"><p/>
			<label>Password</label>
			<input type="password" name="password"  required placeholder="Password"><p/>
			<button type="submit" id="btn" name="submit">Login</button>

		</form>
	</center>
   </div>
</body>
</html> 