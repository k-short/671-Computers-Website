<?php  session_start(); ?>

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

	<?php
      if(!isset($_SESSION['use'])) // If session is not set then redirect to Login Page
       {
           header("Location:Login.php");  
       }
	?>
  
    <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">671 Computers</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li class="active"><a "">Shop</a></li>
            <li><a href="about.php">About</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
			<li><a href="wishlist.php">Wishlist</a></li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['use'];?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="account.php">Update Info</a></li>
                <li><a href="#">Order History</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


<!-- Search Panel -->
 <div class="container">
   <div class="panel-group" id="accordion">
     <div id="SearchPanel" class="panel panel-default">
       <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
         <h5 class="panel-title"> <a class="accordion-toggle"> Search
           <span class="indicator glyphicon glyphicon-chevron-down pull-right"></span></a></h5>
       </div>
       <div class="panel-body collapse" id="collapseOne">
         <div class="col-lg-4 col-md-4">
           Price
           <br />
           <div class="form-group">
             <select class="form-control" id="priceSearch"></select>
           </div> <!-- Price Search -->
           <br />
           Computer Type
           <br />
           <div class="form-group">
             <select class="form-control" id="computerType"></select>
           </div> <!-- Computer Type Search -->
         </div>
         <div class="col-lg-4 col-md-4">
           Weight
           <br />
           <div class="form-group">
             <select class="form-control" id="weightSearch"></select>
           </div> <!-- Weight Search -->
           <br />
           Memory
           <br />
           <div class="form-group">
             <select class="form-control" id="memorySearch"></select>
           </div> <!-- Memory Search -->
         </div>
         <div class="col-lg-4 col-md-4">
           Size
           <br />
           <div class="form-group">
             <select class="form-control" id="sizeSearch"></select>
           </div> <!-- Size Search -->
           Disk Type
           <br />
           <div class="form-group">
             <select class="form-control" id="diskType">
               <option>Hard Disk Drive</option>
               <option>Solid State Drive</option>
             </select>
           </div> <!-- Disk Type Search -->
           <br />
           Disk Capacity
           <div class="form-group">
             <select class="form-control" id="diskCapacity"></select>
           </div> <!-- Disk Capacity Search -->
           <br />
           <input type="button" id="searchBtn" class="btn btn-info" value="Search" />
         </div>
       </div> <!-- Panel Body -->
     </div>
   </div> <!-- Accordion Panel group -->
 </div> <!-- Container -->

 <div class="container">

 </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="javascript.js"></script>
  </body>
</html>