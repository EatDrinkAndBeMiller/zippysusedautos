<?php

switch($action) {
    case 'logout':
        $_SESSION = array();
        session_destroy();
        $login_message = 'You are logged out.';
        include('view/login.php');
        break;

    case 'show_register':
        include('view/register.php');
        break;

    case 'show_login':
        $login_message = 'You must login to view this page.';
        include('view/login.php');
        break;

    case 'login':
        $verify = is_valid_admin_login($username, $password);
        if ($verify === true) {
            $_SESSION['is_valid_admin'] = true;
            header('Location: .?action=list_vehicles');
        } else {
            $login_message = 'Incorrect Login - Login Required';
            include('view/login.php');
        } 
        break;

    case 'register':
        include('util/valid_register.php');
        $error = valid_registration($username, $password, $confirm_password);
        if ($error) {
            include('view/register.php');
        } else {
            add_admin($username, $password);
            $_SESSION['is_valid_admin'] = true;
            header('Location: .?action=list_vehicles');
        }
        break;
}