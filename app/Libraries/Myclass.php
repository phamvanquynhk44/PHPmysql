<?php
namespace App\Libraries;
class MyClass
{
    public static function set_flash($message,$msg){
        $_SESSION[$message]=$msg;
    }
    public static function get_flash($message){
        $tmp=$_SESSION[$message];
        unset($_SESSION[$message]);
        return $tmp;
    }
    public static function has_flash($message){
        return isset($_SESSION[$message]);
    }
}
?>