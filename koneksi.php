<?php
    $dbhost ='localhost';
        $dbuser ='root';
        $dbpass ='';
        $dbname ='barista';
	    $db_dsn = "mysql:dbname=$dbname;host=$dbhost";
try {
  $db = new PDO($db_dsn, $dbuser, $dbpass);
  // set the PDO error mode to exception
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Connection failed: '.$e->getMessage();
}
