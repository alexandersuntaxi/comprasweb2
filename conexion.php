<?php
/* Conexión BD */
define('DB_SERVER', 'ip-10-0-161-234.ec2.internal');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'rootroot');
define('DB_DATABASE', 'COMPRASWEB');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
   if (!$db) {
		die("Error conexión: " . mysqli_connect_error());
	}
?>
