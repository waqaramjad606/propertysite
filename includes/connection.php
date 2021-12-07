

<?php

define("sitekey", "p%<onZmUeePZ{{");

  //method for getting connection
  function connecttoDB($sitekey){
  
    if($sitekey != sitekey){
      echo "Unforbidden!";
      return;
    }
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "propertysite";
  
  
    $conn = new mysqli($servername, $username, $password, $dbname);
  
    // Check connection
    if ($conn -> connect_errno) {
      echo "Failed to connect to MySQL: " . $conn -> connect_error;
      
      exit();
    }else{
      return $conn;
      
    }
  
  }//connnecttoDB
  if (session_status() == PHP_SESSION_NONE)
    session_start();


?>
