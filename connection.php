<?php

class Database 
{
    protected static $db;
    private function __construct()
    {
        $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $cleardb_server = $cleardb_url["host"];
        $cleardb_username = $cleardb_url["user"];
        $cleardb_password = $cleardb_url["pass"];
        $cleardb_db = substr($cleardb_url["path"],1);
        $active_group = 'default';
        $query_builder = TRUE;
        // // Connect to DB
        // $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
        // // $db_host = 'localhost';
        // // $db_user = 'root';
        // // $db_password = '';
        // // $db_name = 'bdlolcblol';
        // // $db_driver = "mysql";
        $options = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );
      
        try
        {
            self::$db = new PDO("$db_driver:host=$cleardb_server; dbname=$cleardb_db", $cleardb_username, $cleardb_password, $options);
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