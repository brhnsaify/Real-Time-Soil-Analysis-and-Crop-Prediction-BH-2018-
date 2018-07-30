<?php
$dbuser = 'root';
$dbpassword = 'root';
$db = 'gameserver1';
$dbhost = '127.0.0.1';
$dbport = 3306;

$dblink = mysqli_init();

$dbconnection = mysqli_real_connect($dblink, $dbhost, $dbuser, $dbpassword, $db, $dbport);
$dbconnection1 = mysqli_connect($dbhost, $dbuser, $dbpassword, $db, $dbport);

if($dbconnection){
	print("ho gya success");
}else{
	die("Connection failed" . mysql_error());
}
?>