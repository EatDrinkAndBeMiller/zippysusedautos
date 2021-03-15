<?php

$makeID = filter_input(INPUT_POST, 'makeID', FILTER_VALIDATE_INT);
$make = filter_input(INPUT_POST, 'make', FILTER_SANITIZE_STRING);

switch($action) {
    case 'list_makes' :
        $makes = get_all_makes();
        include('view/makes_list.php');
        break;
    
    case 'delete_make' :
        delete_make($makeID);
        $makes = get_all_makes();
        include('view/makes_list.php');
        break;
    
    case 'add_make' :
        add_make($make);
        $makes = get_all_makes();
        include('view/makes_list.php');
        break;
}