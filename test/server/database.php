<?php
//Written by Sebastian Deslauriers 
//Peter Drakulic
    //takes the database credentials
  require_once('db_credentials.php');

  function db_connect() { //connects to the database
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    confirm_db_connect();
    return $connection;
  }

  function db_disconnect($connection) { //disconnects from the database
    if(isset($connection)) {
      mysqli_close($connection);
    }
  }

  function confirm_db_connect() { //makes sure your connected to the database
    if(mysqli_connect_errno()) {
      $msg = "Database connection failed: ";
      $msg .= mysqli_connect_error();
      $msg .= " (" . mysqli_connect_errno() . ")";
      exit($msg);
    }
  }

  function confirm_result_set($result_set) {//checks if a querry fails or succeeds 
    if (!$result_set) {
    	exit("Database query failed.");
    }
  }

?>
