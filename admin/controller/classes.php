<?php

switch($action) {
    case 'delete_class' :
        delete_class($classID);
        header("Location: .?action=list_classes");
        break;
    
    case 'add_class' :
        add_class($className);
        header("Location: .?action=list_classes");
        break;
    
    case 'list_classes' :
        $classes = get_all_classes();
        include('./view/classes_list.php');
}