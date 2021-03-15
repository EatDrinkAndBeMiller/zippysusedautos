<?php

switch($action) {
    case 'delete_type' :
        delete_type($typeID);
        header("Location: .?action=list_types");;
        break;
    
    case 'add_type' :
        add_type($typeName);
        header("Location: .?action=list_types");;
        break;
    
    case 'list_types' :
        $types = get_all_types();
        include('view/types_list.php');
}