<?php

namespace lbs\bd;

use Exception;
use ParseError;
use PDO;

class ConnectionFactory
{

    private static $PDO;
    private static $config;

    public static function setConfig($file)
    {
        if (!isset($file)){
            throw new Exception('Aucun fichier de configuration chargé');
        }
        try {
            self::$config = parse_ini_file($file);
        } catch (ParseError $e){
            die($e -> getMessage());
        }
    }

    public static function makeConnection()
    {
        if (is_null(self::$PDO) && !is_null(self::$config)){
            self::$PDO = new PDO(self::$config);
        } else {
            throw new Exception('Configuration is null');
        }
        return self::$PDO;
    }
}