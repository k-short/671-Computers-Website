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

<body onload="queryInventory('Storage')">

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
                        <?php echo $_SESSION['name'];?> <span class="caret"></span></a>
        <ul class="dropdown-menu">

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
      <li ><a href="customers.php">Customer List</a></li>
      <li ><a href="defaultSystems.php">Default Systems</a></li>
      <li ><a href="purchases.php">Purchases</a></li>
      <li ><a href="#">Inventory</a>
        <ul class="sidebar-submenu">
          <li ><a href="inventory-chassis.php">Chassis</a></li>
          <li ><a href="inventory-memory.php">Memory</a></li>
          <li ><a href="#">Storage</a></li>
        </ul>
      </li>

      <!--<li><a href="#">Export</a></li> -->
    </ul>
    <ul class="nav nav-sidebar">
  <li role="separator" class="nav-divider"></li>
<li><a href="addDefault.php">Add Default System</a></li>
  </div>
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <!--<h1 class="page-header">Dashboard</h1> -->

    <h2 class="sub-header" id="adminHeader">Storage Inventory</h2>
    <br>

    <table  id="inventoryTable" class="table table-striped">

    </table>


    <div class="col-lg-4 col-md-4" id="inventoryForm" name="inventoryForm"> <!-- Time frame -->
      <form>
        <label for="storSizeInput">Storage Size: </label>
          <div class="form-group">
            <input type="number" min="500" id="storSizeInput" name="storSizeInput"></input>
          </div>
        </form>

        <form>
          <label for="storTypeInput">Storage Type: </label>
            <div class="form-group">
              <input type="text" id="storTypeInput" name="storTypeInput"></input>
            </div>
          </form>

      <form>
        <label for="invInput">New Inventory: </label>
          <div class="form-group">
            <input type="number" min="0" id="sInvInput" name="sInvInput"></input>
          </div>
        </form>


      <button class="btn btn-info" id="updateSInv" name="updateSInv">Update</button>
      <h5 id="updateResponse" name="updateResponse"></h5>
    </div>
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
