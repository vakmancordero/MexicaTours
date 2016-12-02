<?php

require dirname(__DIR__).'/config/dbconnect.php';
require dirname(__DIR__).'/model/tour.php';

$dbhandler = new Config() ;

$tour = new Tour($dbhandler);

$data = json_decode(file_get_contents("php://input")); 

$tour->name = $data->name;
$tour->about = $data->about;
$tour->departureTime = $data->departureTime;
$tour->arriveTime = $data->arriveTime;
$tour->price = $data->price;

if ($tour->create()) {
    echo 'El tour ha sido almacenado';
} else {
    echo 'Imposible almacenar tour';
}