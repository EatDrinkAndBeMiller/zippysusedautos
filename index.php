<?php

//start session
$lifetime = 60 * 60 * 24 * 14;
session_set_cookie_params($lifetime, '/');
session_start();

require('model/database.php');
require('model/vehicles_db.php');
require('model/makes_db.php');
require('model/class_db.php');
require('model/types_db.php');

//get required data regardless of sort (this is in all original switch statements)
$makes = MakesDB::get_all_makes();
$types = TypesDB::get_all_types();
$classes = ClassDB::get_all_classes();

//filter parameters
$makeID = filter_input(INPUT_POST, 'makeID', FILTER_VALIDATE_INT);
$typeID = filter_input(INPUT_POST, 'typeID', FILTER_VALIDATE_INT);
$classID = filter_input(INPUT_POST, 'classID', FILTER_VALIDATE_INT);
$sortBy = filter_input(INPUT_POST, 'sortBy', FILTER_SANITIZE_STRING);
if (!$sortBy) $sortBy = 'Price';

$action=filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if(!$action) {
    $action=filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if(!$action){
        $action='vehicle_list';
    }
}

//registering name
$firstname = filter_input(INPUT_GET, 'firstName', FILTER_SANITIZE_STRING);
if($firstname) {
    $_SESSION['userid'] = $firstname;
}

switch($action) {
    case 'register':
        include('view/register.php');
        break;

    case 'logout':
        include('view/logout.php');
        break;

    default: 
        // Extra credit solution -- this allows drop-downs to work together
        $vehicles = VehiclesDB::get_all_vehicles($sortBy);
        if ($makeID) {
            $make_name = MakesDB::get_make_name($makeID);
            $vehicles = array_filter($vehicles, function($array) use ($make_name) {
                return $array["Make"] === $make_name;
            });
        }
        if ($typeID) {
            $type_name = TypesDB::get_type_name($typeID);
            $vehicles = array_filter($vehicles, function($array) use ($type_name) {
                return $array["Type"] === $type_name;
            });
        }
        if ($classID) {
            $class_name = ClassDB::get_class_name($classID);
            $vehicles = array_filter($vehicles, function($array) use ($class_name) {
                return $array["Class"] === $class_name;
            });
        }
        include('view/vehicles_list.php');

}