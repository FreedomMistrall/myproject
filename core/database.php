<?php 
class Database {
    public $connection;
    public $pdo;
    private static $_instance;

    public static function getInstance($config = [])
    {
        if(!self::$_instance) {
            self::$_instance = new self($config);
        }
        return self::$_instance;
    }


    private function __construct($config)
    {
        $this->connection = new mysqli($config['host'], $config['user'], $config['password'], $config['db']);
        $this->connection->set_charset('utf8');
        if ($this->connection->connect_errno)
        {
            printf($this->connection->connect_error);
            exit();
        }

        $dsn = "mysql:host=" . $config['host'] . ";dbname=" . $config['db'] . ";charset=utf8";
        $this->pdo = new PDO($dsn, $config['user'], $config['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }
}