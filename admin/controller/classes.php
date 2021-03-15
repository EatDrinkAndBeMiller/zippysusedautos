<?php

$classID = filter_input(INPUT_POST, 'classID', FILTER_VALIDATE_INT);
$className = filter_input(INPUT_POST, 'className', FILTER_SANITIZE_STRING);

switch($action) {
    case 'list_classes' :
        $classes = get_all_classes();
        include('./view/classes_list.php');
        break;
    
    case 'delete_class' :
        delete_class($classID);
        $classes = get_all_classes();
        include('view/classes_list.php');
        break;
    
    case 'add_class' :
        add_class($className);
        $classes = get_all_classes();
        include('view/classes_list.php');
        break;
}