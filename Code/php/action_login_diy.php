<?php
include_once 'dbconnect_diy.php';

$mobile = $_POST['mobile'];
$upass = $_POST['password'];

$mobile = strip_tags($mobile);
$upass = strip_tags($upass);

$query = "SELECT c_mobile FROM farmer WHERE c_mobile='$mobile' AND c_pass='$upass'";

$result = mysqli_query($dbconnection1 ,$query);

$row = mysqli_fetch_row($result);
if ($row)
{
	$dataArray = array('success' => true, 'error' => '');
} else 
{
	$dataArray = array('success' => false, 'error' => 'Invalid Mobile Number or Password.');
}


header('Content-Type: application/json');
echo json_encode($dataArray);

?>