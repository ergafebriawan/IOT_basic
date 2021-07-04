<?php
include "../config.php";
header('Content-Type: application/json');
$query = new Config();

$id = $_GET['id'];
$value = $_GET['val'];

$exec = $query->updateDevice($id, $value);
$num = count($query->getDevice($id));

$response = array();

if ($num > 0) {
    if ($exec) {
        $response['code'] = '200';
        $response['message'] = 'Updated Success';
    } else {
        $response['code'] = '400';
        $response['message'] = 'Update Failed';
    }
} else {
    $response['code'] = '404';
    $response['message'] = 'No data Selected';
}

echo json_encode($response);
