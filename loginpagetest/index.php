<!-- I'm going to include the login code on this page 
	so it runs on the same page and errors display here too
	I've changed the page to a PHP file so the PHP codes inside it will be executed.

	The form action is updated to carry the URL of the current page ($_SERVER['PHP_SELF']) 
	 -->
<?php
	require 'config.php';

	$errorMessage = '';
	
	if (isset($_SESSION['errorMessage'])) { // if an error has been passed from the dashboard page, then display it here
		$errorMessage = $_SESSION['errorMessage'];
	}
  	
  	if(isset($_POST['submit'])) { // the code only runs when "submit" btn is clicked. wait let me explain The 'submit' btn represents the login btn
		$Callup_Number = $_POST['callup_number'];
		$Password = $_POST['password'];

		$sql= "SELECT password from corp_member_details where callup_number ='$Callup_Number'";
		$query=mysqli_query($connection, $sql);
		$data=mysqli_fetch_assoc($query);

		if (mysqli_num_rows($query) == 1) {
			if($data['password'] == $Password) {
				// this is where the session will start before navigating to the dashboard
				$_SESSION['id'] = $Callup_Number;
				header("location:dashboard.php");
			}else{
				$errorMessage = 'Invalid Password';
			}
		} else {
			$errorMessage = "User with callup number ".$Callup_Number." was not found";
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
     	<li><a href="http://welcomepage.test/">Home</a></li>
     	<li><a href="#">Signup</a></li>
     	<li><a href="#">Login</a></li>
     	<li><a href="#">Harold</a></li>
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
			<label>Callup Number</label>
			<input type="text" name="callup_number"
			value="<?php echo isset($_POST['callup_number']) ? $_POST['callup_number'] : ''; ?>" 
			required placeholder="Callup Number"><p/>
			<label>Password</label>
			<input type="password" name="password" required placeholder="Password"><p/>
			<button type="submit" id="btn" name="submit">Login</button>

		</form>
	</center>
   </div>
</body>
</html> 