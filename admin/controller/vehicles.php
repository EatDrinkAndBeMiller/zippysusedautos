<?php

switch($action) {
    case 'add_a_vehicle' :
        if ($makeID && $typeID && $classID && $year && $model && $price) {
            add_a_vehicle($makeID, $typeID, $classID, $year, $model, $price);
        } else {
            $error = "Invalid vehicle data. Check all fields and try again.";
            include('view/error.php');
            exit();
        }
        header("Location: .?action=list_for_add_a_vehicle");
        break;

    case 'delete_vehicle' :
        if ($vehicle_id) {
            try {
                delete_a_vehicle($vehicleID);
            } catch (PDOException $e) {
                $error = "Missing or incorrect vehicle id.";
                include('view/error.php');
                exit();
            }
        }
        header("Location: .?action=list_vehicles");
        break;

    case 'list_for_add_a_vehicle' :
        include('view/add_vehicle.php');
        break;

    default:
        $vehicles = get_all_vehicles($sortBy);
        if ($makeID) {
            $make_name = get_make_name($makeID);
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