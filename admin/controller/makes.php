<?php

switch($action) { 
    case 'add_make' :
        add_make($make);
        header("Location: .?action=list_makes");
        break;   
    
    case 'delete_make' :
        delete_make($makeID);
        header("Location: .?action=list_makes");
        break;

    case 'list_makes' :
        $makes = get_all_makes();
        include('view/makes_list.php');
}

