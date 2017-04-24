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
    <div class="container-fluid">
      <div class="col-sm-9 col-md-10 main">
        <!--<h1 class="page-header">Dashboard</h1> -->

        <h2 class="sub-header" id="adminHeader">Create New User Account</h2>
    <form>
            <div class="col-lg-4 col-md-4">
              <div class="form-group">
                <label for="userID">User ID: </label>
                <input type="text" name="userID" id="userID" class="form-control " aria-label="..."></input>
                <br>
                <label for="userName">Name: </label>
                <input type="text" name="userName" id="userName" class="form-control " aria-label="..."></input>
                <br>
                <label for="userEmail">Email: </label>
                <input type="email" name="userEmail" id="userEmail" class="form-control " aria-label="..."></input>
                <br>
                <label for="userPhone">Phone Number: </label>
                <input type="tel" name="userPhone" id="userPhone" class="form-control " aria-label="..."></input>
                <br>
                <label for="userMailAdd">Mailing Address: </label>
                <input type="text" name="userMailAdd"  id="userMailAdd" class="form-control " aria-label="..."></input>

              </div>
              <br>
              <input  class="btn btn-info" name="createUserButton" id="createUserButton" value="Create"></input>
              <br>
              <h4 class="sub-header" id="creationMessage"></h4>
              <br>
              <a href="login.php" class="btn btn-info">Login</a>
          </div>
        </form> <!-- Form to POST -->

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
