<?php

$typeID = filter_input(INPUT_POST, 'typeID', FILTER_VALIDATE_INT);
$typeName = filter_input(INPUT_POST, 'typeName', FILTER_SANITIZE_STRING);

switch($action) {
    case 'list_types' :
        $types = get_all_types();
        include('./view/types_list.php');
        break;
    
    case 'delete_type' :
        delete_type($typeID);
        $types = get_all_types();
        include('view/types_list.php');
        break;
    
    case 'add_type' :
        add_type($typeName);
        $types = get_all_types();
        include('view/types_list.php');
        break;
}