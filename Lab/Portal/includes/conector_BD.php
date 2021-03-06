<?php

/** The name of the database  */
define('DB_NAME', 'al375903_ei1036_42');

/** Database username */
define('DB_USER', 'al375903');

/** Database password */
define('DB_PASSWORD',                                                                                                                                                                                                     '***');// No me fio

/** Database hostname */
define('DB_HOST', "db-aules.uji.es");

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

if (!isset($pdo)){
  try{
   $pdo = new PDO("pgsql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
  }
  catch (PDOException $e) {
		//echo "Failed to get DB handle: " . $e->getMessage() . "\n";
		$pdo = new PDO(
      'sqlite::memory:',
      null,
      null,
      array(PDO::ATTR_PERSISTENT => true)
    );

    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    include_once("sqlite_test.php");
  }
}						  

?>
