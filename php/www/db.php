<?php

class Conexion
{
    public static $server = "mariadb_host"; 
    public static $user = "root";
    public static $password = "Custom.2020";
    public static $db = "custom_db";

    static public function conectar()
    {
        $link = null;
        try {
            $server = self::$server;
            $user = self::$user;
            $password = self::$password;
            $db = self::$db;

            $link = new PDO(
                "mysql:host=$server;port=3306;dbname=$db;charset=utf8mb4",
                "$user",
                $password,
                array(
                    PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                )
            );
        } catch (\Throwable $e) {
            $link = "Ocurrio un error al intento de la conexión: " .  $e->getMessage(); 
        } finally {
            // $link = null;
        }
        return $link;
    }

}

$conexion = Conexion::conectar();
var_dump($conexion);