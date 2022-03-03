<?php
include "../config/config.php";
header('Content-Type: application/json');
$query = new Config();

$id = $_GET['id'];
$value = $_GET['val'];

$exec = $query->updateDevice($id, $value);
$num = count($query->getDevice($id));

$data = [
    'id' => $id,
    'value' => $value
];
$res = array();

if ($num > 0) {
    if ($exec) {
        $res = [
            'message' => 'send data success',
            'data' => $data
        ];
    } else {
        $res = [
            'message' => 'fail send data',
            'data' => ''
        ];
    }
} else {
    $res = [
        'message' => 'No Data Selected',
        'data' => ''
    ];
}

echo json_encode($res);
