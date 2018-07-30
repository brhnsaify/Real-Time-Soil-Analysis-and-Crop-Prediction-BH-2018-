<?php
include_once 'dbconnect_diy.php';


$mobile = $_POST['mobile'];
$time_and_Date = $_POST['date_time'];
$h = $_POST['humid'];
$t = $_POST['temp'];
$m = $_POST['moist'];
$l = $_POST['light'];


$mobile = strip_tags($mobile);
$time_and_Date = strip_tags($time_and_Date);
$h = strip_tags($h);
$t = strip_tags($t);
$m = strip_tags($m);
$l = strip_tags($l);

/*
table `Climatic_Test` (
	`Climatic_Test_id` pk auto_increment,
     `c_id` fk,
    `Climatic_T_date_time` varchar(50) ,
    `Humidity` varchar(50) not null,
    `Temperature` varchar(50) not null,
    `Moisture` varchar(50) not null,
    `Light` varchar(50) not null,
    );
*/
/*
$mobile='9644272667';
$time_and_Date='16-04-2018';
$h='16';
$t='1';
$m='1600';
$l='160';
*/

$query = "SELECT c_id FROM farmer WHERE c_mobile='$mobile'";
$result = mysqli_query($dbconnection1 ,$query);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
while($row = mysqli_fetch_assoc($result)) {
		$c_id =$row["c_id"];

	}
}
	

	$query2 = "INSERT INTO Climatic_Test ( c_id , Climatic_T_date_time , Humidity, Temperature, Moisture, Light ) VALUES ('$c_id', '$time_and_Date' , '$h' , '$t' , '$m' , '$l' )";
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