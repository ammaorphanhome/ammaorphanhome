<?php
define('DB_TYPE','mysql');
define('DB_HOST','localhost');
define('DB_NAME','abc');
define('DB_USER','abc');
define('DB_PASS','abc');
$db = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
return($db);
?>