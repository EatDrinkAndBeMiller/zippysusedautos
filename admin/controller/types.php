<?php

switch($action) {
    case 'delete_type' :
        if ($type_id) {
            try {
                delete_type($typeID);
            } catch (PDOException $e) {
                $error = "You cannot delete a type if vehicles are assigned to the type ID.";
                include('view/error.php');
                exit();
            }
        }
        header("Location: .?action=list_types");
        break;
    
    case 'add_type' :
        add_type($typeName);
        header("Location: .?action=list_types");
        break;
    
    case 'list_types' :
        //$types = get_all_types();
        include('view/types_list.php');
}