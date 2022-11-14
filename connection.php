<?php

class Database 
{
    protected static $db;
    private function __construct()
    {
        $db = parse_url(getenv("DATABASE_URL"));

        $pdo = new PDO("mysql:" . sprintf(
            "host=%s;port=%s;user=%s;password=%s;dbname=%s",
            $db["host"],
            $db["port"],
            $db["user"],
            $db["pass"],
            ltrim($db["path"], "/")
        ));
      
        try
        {
            $db = parse_url(getenv("DATABASE_URL"));

            $pdo = new PDO("mysql:" . sprintf(
                "host=%s;port=%s;user=%s;password=%s;dbname=%s",
                $db["host"],
                $db["port"],
                $db["user"],
                $db["pass"],
                ltrim($db["path"], "/")
            ));
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