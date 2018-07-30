<?php
include_once 'dbconnect_diy.php';

$mobile = $_POST['mobile'];
$mobile = strip_tags($mobile);

//$mobile='9644272667';
//$mobile='8302121189';


$query = "SELECT c_id FROM farmer WHERE c_mobile='$mobile'";
$result = mysqli_query($dbconnection1 ,$query);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
while($row = mysqli_fetch_assoc($result)) {
		$c_id =$row["c_id"];

	}
}

$query2 = "SELECT pH_value,Ph_T_date_time from pH_Test WHERE c_id ='$c_id'";

$result1 = $dbconnection1->query($query2);

$dataArray = array();

//$myArray[] = array("id" => 1, "data" => 45);
//$myArray[] = array("id" => 3, "data" => 54);



if ($result1->num_rows > 0) {
    // output data of each row
    while($rows = $result1->fetch_assoc()) {
   //     echo "pH_value: " . $rows["pH_value"]. " - Ph_T_date_time: " . $rows["Ph_T_date_time"]. "<br>";
         $dataArray [] = array( 'success' => true, 'error' => '', 'pH_value' => $rows["pH_value"] ,  'date_time' => $rows["Ph_T_date_time"]);
    }
}else
{
  $dataArray [] = array( 'success' => false, 'error' => 'has Error', 'pH_value' => '' ,  'date_time' => '');
}


/*
if ($result1=mysqli_query($dbconnection1,$query2))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result1);
  //echo "I'd like ".$rowcount." waffles";
   $dataArray = array('success' => true, 'error' => '', 'rowcount' => $rowcount );
 // print("Result set has %d rows.\n",$);
  // Free result set
  mysqli_free_result($result1);
  }
  else{
  	$dataArray = array('success' => false, 'error' => 'has Error', 'rowcount'=>'');

  }
*/

//header('Content-Type: application/json');

echo json_encode($dataArray);


?>