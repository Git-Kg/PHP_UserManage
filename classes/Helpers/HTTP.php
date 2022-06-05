<?php
    namespace Helpers;

    class HTTP
    {
        static $base = "http://localhost/php_project";

        static function redirect($part, $query="")
        {
            $url = static::$base . $part;
            if($query) $url .= "?$query";
 
            header("Location: $url");
            exit();
        }
    }



