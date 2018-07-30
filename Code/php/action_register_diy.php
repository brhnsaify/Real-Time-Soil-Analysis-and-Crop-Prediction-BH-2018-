<?php
include_once 'dbconnect_diy.php';


$name = $_POST['name'];
$mobile = $_POST['mobile'];
$upass = $_POST['password'];

$name = strip_tags($name);
$mobile = strip_tags($mobile);
$upass = strip_tags($upass);



$query = "SELECT c_mobile FROM farmer WHERE c_mobile='$mobile'";
$result = mysqli_query($dbconnection1 ,$query);

$row = mysqli_fetch_row($result);
if ($row)
{
	$dataArray = array('success' => false, 'error' => 'User Already Exists.');
} else 
{
	$query2 = "INSERT INTO farmer (c_name, c_mobile, c_pass) VALUES ('$name', '$mobile', '$upass')";
	if( mysqli_query($dbconnection1 , $query2) ) 
	{
		$dataArray = array('success' => true, 'error' => '', 'mobile' => "$mobile");
	}else
	{
		$dataArray = array('success' => false, 'error' => 'Could not Create User.');
	}
}


header('Content-Type: application/json');
echo json_encode($dataArray);

?>