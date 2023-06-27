<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="Library/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="CSS/Style.css">
  <script type="text/javascript" src="Library/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="Library/js/jquery-3.6.1.min.js"></script>

	<title>PHP-MY CHAT</title>
</head>
<body>

<div class="container">
	<div class="row">
       <div class="col-md-3 sm-3 cols-xs-12 Left-sidebar">
       <div class="input-group searchbox">
       	<div class="input-group-btn">
       		<center>
       			<a href="Find_Frinds.php"><button class="btn brn-default search-icon" name="search" type="submit">Add new user</button></a>
       		</center>
       	</div>
       	   
       </div> 
       <div class="left-chat">
           <ul>
               <?php require 'GetUser.php';?>
           </ul>
       	  <div>
       </div>  
       <div class="col-md-9 cols-xs-12 right-sidebar ">
        <div class="row" >
            <?php 
            session_start();  
            require 'DB.php';
                  if (isset($_SESSION['user'])) {
                      // code...
                  
                  $user=$_SESSION['user']->Email;
                  $getUser=$db->prepare("SELECT * FROM user WHERE Email=:Email");
                  $getUser->bindparam("Email",$user);
                  $getUser->execute();
                 $getUser=$getUser->fetchAll(PDO::FETCH_ASSOC);
                   foreach ($getUser as $key) {}
                      if (isset($_GET['username'])) {
                        $Email=$_GET['username'];

                            $selectS =$db->prepare("SELECT * FROM user WHERE Email=:Email ");
                            $selectS->bindparam("Email",$Email);
                            $selectS->execute();
                                  $selectS=$selectS->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($selectS as $row) {
                                        echo $row['Email'];
                                       }           

                                               }
                     
                  }
              
              else{
                echo "string";}

             
            ?>
            
        </div>
           
       </div>    	
       </div>		
	</div>
	
</div>
</body>
</html>