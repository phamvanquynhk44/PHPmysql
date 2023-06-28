<?php
$f=$_REQUEST['f'];
switch ($f){
    case 'login': {
        require_once("views/frontend/customer-login.php");
        break;
    }
    case 'processLogin': {
        require_once("views/frontend/customer-processLogin.php");
        break;
    }
    case 'logout': {
        require_once("views/frontend/customer-logout.php");
        break;
    }
    case 'register': {
        require_once("views/frontend/customer-register.php");
        break;
    }
    case 'processRegister': {
        require_once("views/frontend/customer-processRegister.php");
        break;
    }
    case 'profile': {
        require_once("views/frontend/customer-profile.php");
        break;
    }
    default:{
        require_once("views/frontend/eror-404.php");
        break;
    }

}