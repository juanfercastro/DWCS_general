<?php
include_once(PATH_MODEL.'AuthModel.php');
class AuthController{
    public static function checkPermisos($token, $endpoint, $method):bool{
        $auth = false;
        if (isset($endpoint) && isset($token) && isset($method)) {
            $auth = AuthModel::hasAccess($token, $endpoint, $method);
        }
        return $auth;
    }
}