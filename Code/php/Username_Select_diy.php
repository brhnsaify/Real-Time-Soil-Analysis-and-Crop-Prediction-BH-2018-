<?php
include_once 'dbconnect_diy.php';

$mobile = $_POST['mobile'];
$mobile = strip_tags($mobile);
//$mobile='9644272667';
$query = "SELECT c_name FROM farmer WHERE c_mobile='$mobile'";

$result = mysqli_query($dbconnection1 ,$query);

/*
$result = $mysqli->query("SELECT c_name FROM farmer WHERE c_mobile='$mobile'");
if($result->num_rows > 0){
    echo $result->fetch_object()->product_name;
}
*/
//$row = mysqli_fetch_row($result);
//string name = $row;
if (mysqli_num_rows($result) > 0) {
    // output data of each row
while($row = mysqli_fetch_assoc($result)) {
        //echo "<br> name: ". $row["c_name"];
   	    $dataArray = array('success' => true, 'error' => '', 'username' => $row["c_name"] );
    }
}else{
		$dataArray = array('success' => false, 'error' => 'Invalid Mobile Number or Password.', 'username'=>'');
}     



header('Content-Type: application/json');
echo json_encode($dataArray);
?>