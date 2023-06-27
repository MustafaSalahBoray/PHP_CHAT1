<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" type="text/css" href="Library/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="CSS/Style.css"> -->
  <script type="text/javascript" src="Library/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="Library/js/jquery-3.6.1.min.js"></script>
	<title>PHP_CHAT</title>
</head>
<body> 
	<div class="Sign_in">
		<form method="POST">
			<div class="form-header">
				<h2>Register</h2>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="Email" class="form-control" autocomplete="off" required>
				
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" autocomplete="off" required>
				
			</div>
			<div class="small">Forget-password?<a href="" >Click Here</a></div>
			<div class="form-group">
				<button type="submit" name="submit" class=" btn btn-primary btn-block btn-lg">Sign In</button>
			</div>
		</form>
		<div class="text-center " style="color: white;">Dont Have An account?<a href="Sign_up.php">Create</div>
	</div>

</body>
</html>
<?php 
   require'DB.php';
   if (isset($_POST['submit'])) {
   		$Email=$_POST['Email'];
   	   $Login=$db->prepare("SELECT * FROM user WHERE Email=:Email AND password=:password");
   	   $Login->bindparam("Email",$Email);
   	   $Login->bindparam("password",$_POST['password']);
   	   $Login->execute();
   	  
   	   if ($Login->rowcount()==1) {
               $Login=$Login->fetchObject();               
   	   	session_start();
   	   	$_SESSION['user']=$Login;
   	   	
   	   	$Email=$_POST['Email'];
            $updateUser=$db->prepare("UPDATE user SET UserLogin='Online' WHERE Email='$Email'");
            $updateUser->execute();
            $selectUs=$db->prepare("SELECT * FROM user WHERE Email='$Email'");
            $selectUs->execute();
            foreach ($selectUs as $key) {
            	$username=$key['USERNAME'];
                      header("location:Home.php?username=".$username."");

   	   		   	   	}}
   	      	   //	echo"<script>window.open('Home.php')</script>";
   	   
  
   }





?>