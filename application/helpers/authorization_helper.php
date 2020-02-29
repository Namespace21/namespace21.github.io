<?php

class AUTHORIZATION
{
    public static function validateTimestamp($token)
    {
        $CI =& get_instance();
        $token = self::validateToken($token);
        if ($token != false && (now() - $token->timestamp < ($CI->config->item('token_timeout') * 60))) {
            return $token;
        }
        return false;
    }

    public static function validateToken($token)
    {
        $CI =& get_instance();
        return JWT::decode($token, $CI->config->item('jwt_key'));
    }

    public static function generateToken($data)
    {
        $CI =& get_instance();
        return JWT::encode($data, $CI->config->item('jwt_key'));
    }

    public static function get_jwt($type, $jwt)
    {
        $jwt = explode('.', $jwt);
        if ($type == 'header') return trim($jwt[0]);
        elseif ($type == 'payload') return trim($jwt[1]);
        elseif ($type == 'sign') return trim($jwt[2]);
        else return "no type selected";
    }

}

?>