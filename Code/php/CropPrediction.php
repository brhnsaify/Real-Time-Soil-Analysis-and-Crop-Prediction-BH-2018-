<?php


include_once 'dbconnect_diy.php';

$mobile = $_POST['mobile'];
$mobile = strip_tags($mobile);
//$mobile = "9644272667";

//Fetch_Data_Climatic_test_Table_diy.php

$query = "SELECT c_id FROM farmer WHERE c_mobile='$mobile'";
$result = mysqli_query($dbconnection1 ,$query);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
while($row = mysqli_fetch_assoc($result)) {
    $c_id =$row["c_id"];

  }
}




$queryhum = "SELECT Humidity FROM Climatic_Test WHERE c_id = $c_id ORDER BY Climatic_Test_id DESC LIMIT 1";
$resulthum = mysqli_query($dbconnection1 ,$queryhum);

if (mysqli_num_rows($resulthum) > 0) {
    // output data of each row
while($rowhum = mysqli_fetch_assoc($resulthum)) {
    $hum =$rowhum["Humidity"];
  }
}



$querytem = "SELECT Temperature FROM Climatic_Test WHERE c_id = $c_id ORDER BY Climatic_Test_id DESC LIMIT 1";
$resulttem = mysqli_query($dbconnection1 ,$querytem);

if (mysqli_num_rows($resulttem) > 0) {
    // output data of each row
while($rowtem = mysqli_fetch_assoc($resulttem)) {
    $tem =$rowtem["Temperature"];

  }
}


$queryph = "SELECT pH_value FROM pH_Test WHERE c_id = $c_id ORDER BY Ph_Test_id DESC LIMIT 1";
$resultph = mysqli_query($dbconnection1 ,$queryph);

if (mysqli_num_rows($resultph) > 0) {
    // output data of each row
while($rowph = mysqli_fetch_assoc($resultph)) {
    $ph =$rowph["pH_value"];

  }
}

/*
print($c_id);
print($hum);
print($tem);
print($tem);
print($hum);
*/
//$query2 = "SELECT Climatic_T_date_time , Humidity , Temperature ,  Moisture, Light from Climatic_Test WHERE c_id ='$c_id'";
$query2 = "SELECT cropName, minHum, maxHum, minTemp, maxTemp, minPH, maxPH FROM Crop WHERE minHum <= $hum AND maxHum >= $hum AND minTemp <= $tem AND maxTemp >= $tem AND minPH <= $ph AND maxPH >= $ph";   

//Climatic_T_date_time , Humidity, Temperature, Moisture, Light
$result1 = $dbconnection1->query($query2);

$dataArray = array();

//$myArray[] = array("id" => 1, "data" => 45);
//$myArray[] = array("id" => 3, "data" => 54);



if ($result1->num_rows > 0) {
    // output data of each row
    while($rows = $result1->fetch_assoc()) {
   //     echo "pH_value: " . $rows["pH_value"]. " - Ph_T_date_time: " . $rows["Ph_T_date_time"]. "<br>";
         $dataArray [] = array( 'success' => true, 'error' => '', 'CN' => $rows["cropName"] , 'MiH'=>$rows["minHum"] , 'MaH'=>$rows["maxHum"]  , 'MiT'=> $rows["minTemp"], 'MaT'=>$rows["maxTemp"], 'MiPH'=>$rows["minPH"], 'MaPH'=>$rows["maxPH"] );
    }
}else
{
  $dataArray [] = array( 'success' => false, 'error' => 'has Error', 'CN' => '' , 'MiH'=>'' , 'MaH'=>''  , 'MiT'=> '', 'MaT'=>'' , 'MiPH'=>'' , 'MaPH'=>'' );
}




echo json_encode($dataArray);


?>