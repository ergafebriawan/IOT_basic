<?php
include "../config/config.php";
header('Content-Type: application/json');
$query = new Config();

$mlx = intval($_GET['mlx']);
$lm = intval($_GET['lm']);
$image =$_GET['image'];
$kondisi = $_GET['kondisi'];

$rep = $query->addReport($mlx, $lm, $image, $kondisi);
$sen_mlx = $query->updateDevice(1,$mlx);
$sen_lm = $query->updateDevice(2, $lm);
$num = count($query->getDevice($id));

$data = [
    'mlx 19640' => $mlx,
    'lm35' => $lm,
    'image' => $image,
    'kondisi' => $kondisi
];
$res = array();

if ($num > 0) {
    if ($rep && $sen_mlx && $sen_lm) {
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
