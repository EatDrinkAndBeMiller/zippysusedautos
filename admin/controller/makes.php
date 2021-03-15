<?php

switch($action) { 
    case 'add_make' :
        add_make($make);
        /* $makes = get_all_makes(); */
        header("Location: .?action=list_makes");
        break;   
    
        case 'delete_make' :
        delete_make($makeID);
       /*  $makes = get_all_makes(); */
       header("Location: .?action=list_makes");
        break;

        case 'list_makes' :
        $makes = get_all_makes();
        include('view/makes_list.php');
}

