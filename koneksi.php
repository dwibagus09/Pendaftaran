<?php
    $dbhost ='localhost';
        $dbuser ='u1098311_barista';
        $dbpass ='Barista123_';
        $dbname ='u1098311_barista';
	    $db_dsn = "mysql:dbname=$dbname;host=$dbhost";
try {
  $db = new PDO($db_dsn, $dbuser, $dbpass);
  // set the PDO error mode to exception
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Connection failed: '.$e->getMessage();
}
