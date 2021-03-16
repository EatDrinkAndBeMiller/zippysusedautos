<?php

switch($action) { 
    case 'add_make' :
        /* echo '<script>alert("add_make")</script>'; */
        add_make($make);
        /* $makes = get_all_makes(); */
        header("Location: .?action=list_makes");
        break;   
    
    case 'delete_make' :
        /* echo '<script>alert("delete_make")</script>'; */
        delete_make($makeID);
       /*  $makes = get_all_makes(); */
        header("Location: .?action=list_makes");
        break;

    case 'list_makes' :
        /* echo '<script>alert("list_makes")</script>'; */
        $makes = get_all_makes();
        include('view/makes_list.php');
}

