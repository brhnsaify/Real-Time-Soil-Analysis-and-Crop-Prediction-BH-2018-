<?php
include_once 'dbconnect_diy.php';


$mobile = $_POST['mobile'];
$time_and_Date = $_POST['date_time'];
$ph_value = $_POST['ph_value'];


$mobile = strip_tags($mobile);
$time_and_Date = strip_tags($time_and_Date);
$ph_value = strip_tags($ph_value);



/* table `pH_Test` (
	`Ph_Test_id` pk  auto increment,
    `c_id` fk,
    `pH_value` ,
    `Ph_T_date_time` ,
    )
*/

//$mobile='9644272667';
//$time_and_Date='16-04-2018';
//$ph_value='16';

$query = "SELECT c_id FROM farmer WHERE c_mobile='$mobile'";
$result = mysqli_query($dbconnection1 ,$query);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
while($row = mysqli_fetch_assoc($result)) {
		$c_id =$row["c_id"];

	}
}
	

	$query2 = "INSERT INTO pH_Test ( c_id , pH_value , Ph_T_date_time ) VALUES ('$c_id','$ph_value' , '$time_and_Date' )";
	if( mysqli_query($dbconnection1 , $query2) ) 
	{
		$dataArray = array('success' => true, 'error' => '');
	}else
	{
		$dataArray = array('success' => false, 'error' => 'error in inserting data');
	}

header('Content-Type: application/json');
echo json_encode($dataArray);

?>