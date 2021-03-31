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
$makes = get_all_makes();
$types = get_all_types();
$classes = get_all_classes();

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
        $vehicles = get_all_vehicles($sortBy);
        if ($makeID) {
            $make_name = get_make_name($makeID);
            //need to look up "function() use()
            $vehicles = array_filter($vehicles, function($array) use ($make_name) {
                return $array["Make"] === $make_name;
            });
        }
        if ($typeID) {
            $type_name = get_type_name($typeID);
            $vehicles = array_filter($vehicles, function($array) use ($type_name) {
                return $array["Type"] === $type_name;
            });
        }
        if ($classID) {
            $class_name = get_class_name($classID);
            $vehicles = array_filter($vehicles, function($array) use ($class_name) {
                return $array["Class"] === $class_name;
            });
        }
        include('view/vehicles_list.php');

}



// Get Data for View -- original solve for the drop-down (not a switch statement like yours...less code -- no use of $action)
/* if ($make_id) {
    $make_name = get_make_name($make_id);
    $vehicles = get_vehicles_by_make($make_id, $sort);
} else if ($type_id) {
    $type_name = get_type_name($type_id);
    $vehicles = get_vehicles_by_type($type_id, $sort);
} else if ($class_id) {
    $class_name = get_class_name($class_id);
    $vehicles = get_vehicles_by_class($class_id, $sort);
} else {
    $vehicles = get_all_vehicles($sort);
} */


/* $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if(!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_VALIDATE_INT);
    if(!$action) {
        $action = 'list_vehicles';
    }
}  

switch($action) {
    case 'list_by_trait':
        if ($makeID && $sortBy == 'Price') {
            $vehicles = get_vehicles_by_make_price($makeID);

        } else if ($makeID && $sortBy == 'Year') {
            $vehicles = get_vehicles_by_make_year($makeID);
            $makes = get_all_makes();
            $types = get_all_types();
            $classes = get_all_classes();
        } else if ($typeID && $sortBy == 'Price') {
            $vehicles = get_vehicles_by_type_price($typeID);
            $makes = get_all_makes();
            $types = get_all_types();
            $classes = get_all_classes();
        } else if ($typeID && $sortBy == 'Year') {
            $vehicles = get_vehicles_by_type_year($typeID);
            $makes = get_all_makes();
            $types = get_all_types();
            $classes = get_all_classes();
        } else if ($classID && $sortBy == 'Price') {
            $vehicles = get_vehicles_by_class_price($classID);
            $makes = get_all_makes();
            $types = get_all_types();
            $classes = get_all_classes();
        } else if ($classID && $sortBy == 'Year') {
            $vehicles = get_vehicles_by_class_year($classID);
            $makes = get_all_makes();
            $types = get_all_types();
            $classes = get_all_classes();
        } else if ($sortBy == 'Year') {
            $vehicles = get_all_vehicles_by_year();
            $makes = get_all_makes();
            $types = get_all_types();
            $classes = get_all_classes();
        } else {
            $vehicles = get_all_vehicles_by_price();
            $makes = get_all_makes();
            $types = get_all_types();
            $classes = get_all_classes();
        }
        include('view/vehicles_list.php');
        break;

    default:
        $vehicles = get_all_vehicles_by_price();
        $makes = get_all_makes();
        $types = get_all_types();
        $classes = get_all_classes();
        include('view/vehicles_list.php');
} */