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

$query2 = "SELECT Climatic_T_date_time , Humidity , Temperature ,  Moisture, Light from Climatic_Test WHERE c_id ='$c_id'";
//Climatic_T_date_time , Humidity, Temperature, Moisture, Light
$result1 = $dbconnection1->query($query2);

$dataArray = array();

//$myArray[] = array("id" => 1, "data" => 45);
//$myArray[] = array("id" => 3, "data" => 54);



if ($result1->num_rows > 0) {
    // output data of each row
    while($rows = $result1->fetch_assoc()) {
   //     echo "pH_value: " . $rows["pH_value"]. " - Ph_T_date_time: " . $rows["Ph_T_date_time"]. "<br>";
         $dataArray [] = array( 'success' => true, 'error' => '', 'date_time' => $rows["Climatic_T_date_time"] , 'h'=>$rows["Humidity"] , 't'=>$rows["Temperature"]  , 'm'=> $rows["Moisture"], 'l'=>$rows["Light"] );
    }
}else
{
  $dataArray [] = array( 'success' => false, 'error' => 'has Error', 'date_time' => '' , 'h'=>'' , 't'=>''  , 'm'=> '', 'l'=>'' );
}




echo json_encode($dataArray);


?>