<?php

namespace lbs\bd;

use Exception;

class ConnectionFactory
{
    public static function setConfig($file)
    {
        if (!isset($file)){
            throw new Exception("Aucun fichier de configuration chargé");
        }

    }
}