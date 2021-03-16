<?php

require('../model/database.php');
require('../model/vehicles_db.php');
require('../model/types_db.php');
require('../model/class_db.php');
require('../model/makes_db.php');

$makeID = filter_input(INPUT_POST, 'makeID', FILTER_VALIDATE_INT);
$typeID = filter_input(INPUT_POST, 'typeID', FILTER_VALIDATE_INT);
$classID = filter_input(INPUT_POST, 'classID', FILTER_VALIDATE_INT);
$year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
$model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
$vehicleID = filter_input(INPUT_POST, 'vehicleID', FILTER_VALIDATE_INT);
$make = filter_input(INPUT_POST, 'make', FILTER_SANITIZE_STRING);
$className = filter_input(INPUT_POST, 'className', FILTER_SANITIZE_STRING);
$typeName = filter_input(INPUT_POST, 'typeName', FILTER_SANITIZE_STRING);
$sortBy = filter_input(INPUT_POST, 'sortBy', FILTER_SANITIZE_STRING);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if(!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if(!$action) {
        $action = 'list_vehicles';
    } 
}  

if($action == 'list_makes' || $action == 'delete_make' || $action == 'add_make') {
    include('controller/makes.php');
} else if($action == 'list_types' || $action == 'delete_type' || $action == 'add_type') {
    include('controller/types.php');
} else if($action == 'list_classes' || $action == 'delete_class' || $action == 'add_class') {
    include('controller/classes.php');
} else if($action == 'list_vehicles' || $action == 'list_by_trait' || $action == 'list_for_add_a_vehicle' || $action == 'add_a_vehicle' || $action='delete_vehicle' ) {
    include('controller/vehicles.php');
} 
