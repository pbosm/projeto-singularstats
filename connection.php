<?php

class Database 
{
    protected static $db;
    private function __construct()
    {
        $url = parse_url(getenv("DATABASE_URL"));

        $servername     = $url["host"];
        $username       = $url["user"];
        $password       = $url["pass"];
        $dbname         = substr($url["path"], 1);

        try
        {
            self::$db = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // self::$db->exec('SET NAMES utf8');
            self::$db->exec('SET NAMES utf8mb4');
        }
        catch (PDOException $e)
        {   
            die("Connection Error: " . $e->getMessage());
        }
    }
    public static function connectionPDO()
    {
        if (!self::$db)
        {
            new Database();
        }
        return self::$db;
    }
}

?>