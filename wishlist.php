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
            <li><a href="shop.php">Shop</a></li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
			<li class="active"><a href="">Wishlist</a></li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name'];?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                
                <li><a href="orderHistory.php">Order History</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <!--<table class="table">-->
      <h2 class="sub-header" id="wishlistHeader">Wish List</h2>
       <div class="table-responsive">
         <table class="table table-bordered" id="wishListTable">

             <?php

             include 'showWishlist.php';

             $user=$_SESSION['use'];
             showWishlist($user);


             ?>

           </table> <!-- Table -->
       </div>
    </div> <!-- /container -->


    <div class="container">
      <!--<form class="form-horizontal" method="post" action="">-->
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <form class="form-horizontal span6" method="post" action="">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h1 class="panel-title">Purchase and Payment</h1>
              </div>
              <div class="panel-body">



                <div class="form-group">
                  <label class="control-label">Chassis Number</label>
                  <div class="controls">
                    <div class="row">
                      <div class="col-sm-3 col-md-3">
                        <input class="form-control" id="CHNumber" name="CHNumber" type="text" >
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Memory</label>
                  <div class="controls">
                    <div class="row">
                      <div class="col-sm-3 col-md-3">
                        <select class="form-control" class="input-block-level" id="memWanted" name="memWanted">
                          <option>2</option>
                          <option>4</option>
                          <option>6</option>
                          <option>8</option>
                          <option>16</option>
                          <option>32</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Storage Size</label>
                  <div class="controls">
                    <div class="row">
                      <div class="col-sm-3 col-md-3">
                        <select class="form-control" class="input-block-level" id="storSize" name="storSize">
                          <option>500</option>
                          <option>800</option>
                          <option>1000</option>
                          <option>1600</option>
                          <option>2000</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Storage Type</label>
                  <div class="controls">
                    <div class="row">
                      <div class="col-sm-3 col-md-3">
                        <select class="form-control" class="input-block-level" id="storType" name="storType">
                          <option>hard drive</option>
                          <option>SSD</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Quantity</label>
                  <div class="controls">
                    <div class="row">
                      <div class="col-sm-3 col-md-3">
                        <select class="form-control" class="input-block-level" id="quantityWanted" name="quantityWanted">
                          <option>1</option>
                          <option>2</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Card Holder's Name</label>
                  <div class="controls">
                    <input type="text" name="nameOnCard" id="nameOnCard" class="form-control" pattern="\w+ \w+.*" title="Fill your first and last name" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Card Number</label>
                  <div class="controls">
                    <div class="row">
                      <div class="col-sm-3 col-md-3">
                        <input type="text" class="form-control" name="ccNo" id="ccNo" autocomplete="off" maxlength="16" pattern="\d{16}" title="First four digits" required="">
                      </div>
                      <!--<div class="col-sm-3 col-md-3">
                        <input type="text" class="form-control" autocomplete="off" maxlength="4" pattern="\d{4}" title="Second four digits" required="">
                      </div>
                      <div class="col-sm-3 col-md-3">
                        <input type="text" class="form-control" autocomplete="off" maxlength="4" pattern="\d{4}" title="Third four digits" required="">
                      </div>
                      <div class="col-sm-3 col-md-3">
                        <input type="text" class="form-control" autocomplete="off" maxlength="4" pattern="\d{4}" title="Fourth four digits" required="">
                      </div>-->
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Card Type</label>
                  <div class="controls">
                    <div class="row">
                      <div class="col-sm-3 col-md-3">
                        <select class="form-control" class="input-block-level" name="cardType" id="cardType">
                          <option>Visa</option>
                          <option>MasterCard</option>
                          <option>Discover</option>
                          <option>American Express</option>
                        </select>
                      </div>
                  </div>
                </div>
              </div>

                <div class="form-group">
                  <label class="control-label">Card Expiration Date</label>
                  <div class="controls">
                    <div class="row">
                      <div class="col-sm-3 col-md-3">
                        <select class="form-control" class="input-block-level" name="cardYear" id="cardYear">
                          <option>2017</option>
                          <option>2018</option>
                          <option>2019</option>
                          <option>2020</option>
                        </select>
                      </div>
                      <div class="col-sm-3 col-md-3">
                        <select class="form-control" class="input-block-level" name="cardMonth" id="cardMonth">
                          <option>01</option>
                          <option>02</option>
                          <option>03</option>
                          <option>04</option>
                          <option>05</option>
                          <option>06</option>
                          <option>07</option>
                          <option>08</option>
                          <option>09</option>
                          <option>10</option>
                          <option>11</option>
                          <option>12</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Billing Address</label>
                  <div class="controls">
                    <input type="text" name="billingAddress" id="billingAddress" class="form-control" pattern="\w+ \w+.*" title="Fill your billing address" required="">
                  </div>
                </div>

                <br />
                <div class="panel-footer clearfix">
                  <div class="pull-right">
                    <input  class="btn btn-info" name="submitPurchaseBtn" type="submit" id="submitPurchaseBtn" value="Submit Order" />

                    <?php
                    if(isset($_POST['submitPurchaseBtn']))   // it checks whether the user clicked search button or not
                              {
                                include 'makePurchase.php';

                                  $user=$_SESSION['use'];

                                  $ccNumber = $_POST['ccNo'];
                                  $cardType = $_POST['cardType'];
                                  $nameOnCard = $_POST['nameOnCard'];
                                  $expYear = $_POST['cardYear'];
                                  $expMonth = $_POST['cardMonth'];
                                  $billingAddress = $_POST['billingAddress'];
                                  $thisChNumber = $_POST['CHNumber'];
                                  $thisMemory = $_POST['memWanted'];
                                  $thisStorSize = $_POST['storSize'];
                                  $thisStorType = $_POST['storType'];
                                  $quantity = $_POST['quantityWanted'];

                                  makePurchase($user, $ccNumber, $cardType, $nameOnCard, $expYear, $expMonth, $billingAddress, $thisChNumber, $thisMemory, $thisStorSize, $thisStorType, $quantity);
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div><!--Container-->

<!--
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 class="panel-title">Purchase</h1>
        </div>
        <div class="panel-body">Panel content…
          <form class="form-inline" method="post" action="">
            <fieldset>

            <div class="form-group">
              <label for="focusedInput">Item Number</label>
              <input class="form-control" id="itemNumber" name="itemNumber" type="text">
            </div>
            <div class="form-group">
              <label for="focusedInput">Memory</label>
              <input class="form-control" id="memWanted" name="memWanted" type="text">
            </div>
            <div class="form-group">
              <label for="focusedInput">Storage Size</label>
              <input class="form-control" id="storSize" name="storSize" type="text">
            </div>
            <div class="form-group">
              <label for="focusedInput">Storage Type</label>
              <input class="form-control" id="storType" name="storType" type="text">
            </div>
            </fieldset>
            <br />

        </div>
      </div>
    </div> <!-- Container -->






    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="jscript.js"></script>
  </body>
</html>
