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
    <link href="bootstrap/css/dashboard.css" rel="stylesheet">
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
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
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
            <li class="active"><a href="">Admin</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			                        <?php echo $_SESSION['use'];?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="account.php">Update Info</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="logout.php" >Logout</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <!--<li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li> -->
            <li onClick="queryAllCustomers()"><a href="#">Customer List</a></li>
            <li onClick="queryAllDefaultSystems()"><a href="#">Default Systems</a></li>
            <!--<li><a href="#">Export</a></li> -->
          </ul>
          <ul class="nav nav-sidebar">
		    <li role="separator" class="nav-divider"></li>
			<li><a href="#">Add Default System</a></li>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <!--<h1 class="page-header">Dashboard</h1> -->

          <h2 class="sub-header" id="adminHeader">Add new default system</h2>
		  <form method="post"  action="">
			<!--<div class="panel-group" id="accordion">
            <div id="SearchPanel" class="panel panel-default">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
              <h5 class="panel-title"> <a class="accordion-toggle"> Search
                <span class="indicator glyphicon glyphicon-chevron-down pull-right"></span></a></h5>
            </div>
            <div class="panel-body collapse" id="collapseOne">-->
              <div class="col-lg-4 col-md-4">
			   <br>
                Chassis Type 
                </br>
                <div class="form-group">
                  <select class="form-control" id="chassisType" name="chassisType">
                    <option>L700</option>
                    <option>H900</option>
                    <option>T300</option>
                  </select>
                </div> <!-- Price Search -->
                <br>
                Storage Type 
                </br>
                <div class="form-group">
                  <select class="form-control" id="storageType" name="storageType">
                    <option>hard drive</option>
                    <option>SSD</option>
                  </select>
                </div> <!-- Computer Type Search -->
				<br>
                Memory Size (GB)  
                </br>
                <div class="form-group">
                  <select class="form-control" id="memorySize" name="memorySize">
                    <option>2</option>
                    <option>4</option>
                    <option>6</option>
					<option>8</option>
					<option>16</option>
					<option>32</option>
                  </select>
                </div>
				<br>
                Disk Size (GB)
                </br>
                <div class="form-group">
                  <select class="form-control" id="diskSize" name="diskSize">
                    <option>500</option>
                    <option>800</option>
                    <option>1000</option>
					<option>1600</option>
					<option>2000</option>
                  </select>
                </div>
				<br>
                <input  class="btn btn-info" name="addButton" type="submit" id="addButton" value="Add System" />
				</br>
				<br> <h4 class="sub-header" id="defaultSuccess">
				<?php
				if(isset($_POST['addButton']))   // it checks whether the user clicked search button or not
                  {
                  	include 'newDefault.php';

                  		$chassis = $_POST['chassisType'];
                  		$storage = $_POST['storageType'];
                  		$memory = $_POST['memorySize'];
                  		$disk = $_POST['diskSize'];

                  	  //$results = showDefaults($price, $computerType, $weight, $memory, $processor, $measurement, $diskType, $diskCapacity);
                      addDefault($chassis, $memory, $storage, $disk);
				  }
				?>
				</h4></br>
              </div>
      </form> <!-- Form to POST -->
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="jscript.js" ></script>

  </body>
</html>
