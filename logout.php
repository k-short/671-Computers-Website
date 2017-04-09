<?php
 session_start();

  echo "Logout Successfully ";
  session_unset();
  session_destroy();   // function that Destroys Session 
  header("Location: Login.php");
?>