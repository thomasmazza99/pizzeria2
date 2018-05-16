
<?php 
    $homedir = substr($_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
    include $homedir.'/pizzeria2/head.php';
    require_once  $homedir.'/pizzeria2/models/UserModel.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if( isset($_SESSION['user'])){ 
            unset($_SESSION['user']);   
            $url = "/pizzeria2";
        }
        header("Location:$url");
?>