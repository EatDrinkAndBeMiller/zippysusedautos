<?php include('header.php') ?>

<!-- <h2>Thank you for signing out,  $_SESSION['userid']. </h2>
 -->
<?php 
    $firstname = $_SESSION['userid'];
    unset($_SESSION['userid']);
    session_destroy();

    $name = session_name();
    $expire = strtotime('-1 year');
    $param = session_get_cookie_params();
    $path = $param['path'];
    $domain = $param['domain'];
    $secure = $param['secure'];
    $httponly = $param['httponly'];
    setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
?>

<h2>Thank you for signing out, <?=$firstname?>. </h2>
<br>
<p><a href=".">Return to Vehicle List</a></p>

<?php include('footer.php')?>