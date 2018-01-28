<?php
$servername = "localhost";
$databasename = "aliaa";
$serverpassword = "aliaa123";
$dbname = "cafteria";

try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $databasename, $serverpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


?>
