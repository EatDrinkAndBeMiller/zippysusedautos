<?php

$makeID = filter_input(INPUT_POST, 'makeID', FILTER_VALIDATE_INT);
$typeID = filter_input(INPUT_POST, 'typeID', FILTER_VALIDATE_INT);
$classID = filter_input(INPUT_POST, 'classID', FILTER_VALIDATE_INT);
$sortBy = filter_input(INPUT_POST, 'sortBy', FILTER_SANITIZE_STRING);
$year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
$model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
$vehicleID = filter_input(INPUT_POST, 'vehicleID', FILTER_VALIDATE_INT);

switch($action) {
    case 'list_for_add_a_vehicle' :
        $makes = get_all_makes();
        $types = get_all_types();
        $classes = get_all_classes();
        include('view/add_vehicle.php');
        break;

    case 'add_a_vehicle' :
        add_a_vehicle($makeID, $typeID, $classID, $year, $model, $price);
        header("Location: view/add_vehicle.php?vehicle_added");
        break;

    case 'delete_vehicle' :
        delete_a_vehicle($vehicleID);
        header("Location: .?vehicle_deleted");
        break;

    case 'list_by_trait':
        if ($makeID && $sortBy == 'Price') {
            $vehicles = get_vehicles_by_make_price($makeID);
            $makes = get_all_makes();
            $types = get_all_types();
            $classes = get_all_classes();
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
}