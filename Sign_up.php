<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" type="text/css" href="Library/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="CSS/Style.css">
  <script type="text/javascript" src="Library/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="Library/js/jquery-3.6.1.min.js"></script>
	<title>PHP_CHAT</title>
</head>
<body> 
	<div class="Sign_in" style="width:500px">
		<form method="POST">
			<div class="form-header">
				<h2>Login</h2>
			</div>
			<div class="form-group">
				<label>USERNAME</label>
				<input type="text" name="USERNAME" class="form-control" autocomplete="off" required>
				
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="Email" name="Email" class="form-control" autocomplete="off" required>
				
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" autocomplete="off" required>
				
			</div>
			<div class="form-group">
				<label>Country</label>
			    <select class="form-control" name="Country">
			    	<option disabled="">Select a Countary</option>
			    	<option value="Egypt">Egypt </option>
			    	<option value="Saudia">Saudia </option>
			    	<option value="U.S">U.S </option>
			    	<option value="Amerate"> El Amerate</option>
 	
			    </select>				
			</div>
			<div class="form-group">
				<label>Gender</label>
			    <select class="form-control" name="Gender">
			    	<option disabled="">Select a Gender</option>
			    	<option value="male">male </option>
			    	<option value="Fmale">Fmale </option>
			   
			    </select>				
			</div>
			<div class="small">Forget-password?<a href="" >Click Here</a></div>
			<div class="form-group">
				<button type="submit" name="submit" class=" btn btn-primary btn-block btn-lg">Sign Up</button>
			</div>
		</form>
		<div class="text-center " style="color: white;">Do You Have An account?<a href="Signin.php">Login</div>
	</div>

</body>
</html>
<?php
   if (isset($_POST['submit'])) {
     require 'DB.php';
     if ($_POST['USERNAME']==='') {
             echo "<script>alert('USERNAME IS EMPTY ' ) </script>";
     	     }
     if (strlen($_POST['password'])<8) {
             echo "<script>alert( 'Password should be more 8 Char') </script>";
             exit();
     	     }
    $selectEmail=$db->prepare("SELECT * FROM user WHERE Email=:Email");
    $selectEmail->bindparam("Email",$_POST['Email']);
    $selectEmail->execute();
    if ($selectEmail->rowcount()==1) {
       echo "<script>alert( 'Email is Exist , Try Again Another Email') </script>";

    }
    else{
         $Insert=$db->prepare("INSERT INTO user (USERNAME,Email,password,Country,Gender	) VALUES (:USERNAME,:Email,:password,:Country,:Gender)");
            $Insert->bindparam("USERNAME",$_POST['USERNAME']);
            $Insert->bindparam("Email",$_POST['Email']);
          $Insert->bindparam("password",$_POST['password']);
            $Insert->bindparam("Country",$_POST['Country']);
            $Insert->bindparam("Gender",$_POST['Gender']);
            if ($Insert->execute()) {
            	echo "<script>alert('Welcome ".$_POST['USERNAME']."To our Site')</script>";
            	echo"<script>window.open('Signin.php')</script>";
            }


    }

   }



?>