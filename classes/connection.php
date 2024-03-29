<?php

class Database 
{
    protected static $db;
    private function __construct()
    {
        //deploy herouku
        // $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        // $cleardb_server = $cleardb_url["host"];
        // $cleardb_username = $cleardb_url["user"];
        // $cleardb_password = $cleardb_url["pass"];
        // $cleardb_db = substr($cleardb_url["path"],1);

        $host     = getenv("host");
        $username = "root";
        $pass     = getenv("pass");
        $port     = getenv("port");
        $db       = "railway";

        $connecthost = "mysql:host=$host;dbname=$db;port=$port";
        
        try
        {
            self::$db = new \PDO($connecthost, $username, $pass);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // self::$db->exec('SET NAMES utf8');
            self::$db->exec('SET NAMES utf8mb4');
            self::$db->exec("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
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