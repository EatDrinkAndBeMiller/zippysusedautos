<?php

switch($action) {
    case 'add_a_vehicle' :
        /* echo '<script>alert("add_a_vehicle")</script>'; */
        add_a_vehicle($makeID, $typeID, $classID, $year, $model, $price);
        header("Location: .?action=list_for_add_a_vehicle");
        break;

    case 'delete_vehicle' :
        /* echo '<script>alert("delete_vehicle")</script>'; */
        delete_a_vehicle($vehicleID);
        header("Location: .?action=list_for_add_a_vehicle");
        break;

    case 'list_for_add_a_vehicle' :
        /* echo '<script>alert("list_for_add_a_vehicle")</script>'; */
        $makes = get_all_makes();
        $types = get_all_types();
        $classes = get_all_classes();
        include('view/add_vehicle.php');
        break;

    case 'list_by_trait':
        /* echo '<script>alert("list_by_trait")</script>'; */
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