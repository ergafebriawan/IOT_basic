<?php 
error_reporting(0);
include "../config/config.php";
header('Content-Type: application/json');

$query = new Config();

$id = $_GET['id'];

if($id === null){
    $data = $query->getDevice();
}else{
    $data = $query->getDevice($id);
}

$res = [
    'message' => 'view all data',
    'data' => $data
];

echo json_encode($res);

?>