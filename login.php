<?php  session_start(); ?> 

<?php

if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
    header("Location:index.php"); 
 }

if(isset($_POST['login']))   // it checks whether the user clicked login button or not 
{
	include 'validUser.php';
	include 'getName.php';
	
     $user = $_POST['user'];
	 
	 //Use this code when connected to Db, to see if valid user. 
	 $userCall = isvalid($user);
	 $userName = getName($user);
        if($userCall == 0)  // username is  set to "user"  and Password   
         {                                   // is 1234 by default     
          $_SESSION['use']=$user;
		  $_SESSION['useType']="customer";
		  $_SESSION['name']=$userName;

		  //  On Successful Login redirects to home.php
          echo '<script type="text/javascript"> window.open("index.php","_self");</script>';            
        }
		else if($userCall == 1){
			$_SESSION['use']=$user;
			$_SESSION['useType']="admin";
			$_SESSION['name']=$userName;
			
			echo '<script type="text/javascript"> window.open("admin.php","_self");</script>';  
		}
        else
        {
            echo "Invalid username.";        
        }
}
 ?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>671 Computers</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/navbar-static-top.css" rel="stylesheet"> 
	<link href="styles.css" rel="stylesheet">
  </head>
  
  <body>

    <div class="container">
	  <form method="post"  action="">
		<div class="input-group col-md-4 col-md-offset-4 row.center vertical-center">
			<input type="text" name="user" class="form-control " placeholder="Name" aria-label="...">
			<div class="input-group-btn">
			<!-- Button and dropdown menu -->
				<button class="btn btn-default" name="login" type="submit" value="LOGIN">Login</button>
			
				<ul id="divNewNotifications" class="dropdown-menu">
					<li ><a>User</a></li>
					<li ><a>Admin</a></li>
				</ul>
			</div>
		</div>
	  </form>
	<button class="btn-default">Create new account</button>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="jscript.js"></script>
  </body>
</html>  