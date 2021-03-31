<?php

switch($action) { 
    case 'add_make' :
        add_make($make);
        header("Location: .?action=list_makes");
        break;   
    
    case 'delete_make' :
        //try/catch for foreign key
        if ($make_id) {
            try {
                delete_make($makeID);
            } catch (PDOException $e) {
                $error = "You cannot delete a make if vehicles are assigned to the make ID.";
                include('view/error.php');
                exit();
            }
        }
        header("Location: .?action=list_makes");
        break;

    case 'list_makes' :
        //$makes = get_all_makes();
        include('view/makes_list.php');
}

