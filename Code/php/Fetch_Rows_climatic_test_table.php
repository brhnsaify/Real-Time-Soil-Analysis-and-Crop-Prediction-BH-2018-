<?php
include_once 'dbconnect_diy.php';

$mobile = $_POST['mobile'];
$mobile = strip_tags($mobile);

//$mobile='9644272667';
// Fetch_Rows_climatic_test_table
$query = "SELECT c_id FROM farmer WHERE c_mobile='$mobile'";
$result = mysqli_query($dbconnection1 ,$query);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
while($row = mysqli_fetch_assoc($result)) {
		$c_id =$row["c_id"];

	}
}

$query2 = "SELECT * from Climatic_Test WHERE c_id ='$c_id'";

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

echo json_encode($dataArray);


?>