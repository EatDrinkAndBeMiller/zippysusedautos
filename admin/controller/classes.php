<?php

switch($action) {
    case 'delete_class' :
        delete_class($classID);
        $classes = get_all_classes();
       header("Location: .?action=list_classes");
        break;
    
    case 'add_class' :
        add_class($className);
        $classes = get_all_classes();
       header("Location: .?action=list_classes");
        break;
    
    case 'list_classes' :
        $classes = get_all_classes();
        include('./view/classes_list.php');
}