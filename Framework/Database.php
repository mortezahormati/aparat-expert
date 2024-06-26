<?php

namespace Framework;

use PDO , PDOException, Exception;
class Database
{
    public $conn;

    /**
     *  constructor database connection
     * @param array $config
     * @throws PDOException
     * @throws Exception
     */

    public function __construct($config)
    {
//        dd($config);
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        try {
            $this->conn = new PDO($dsn, $config['username'], $config['password'], $options);
        } catch (PDOException $e) {
            throw new Exception("database  connect failed because :  {$e->getMessage()}");
        }
    }

    /**
     *  constructor database connection
     * @param mixed $query
     * @param array $params
     * @return bool|\PDOStatement
     * @throws Exception
     */
    public function query($query , $params=[])
    {
        try {

            $sta = $this->conn->prepare($query);

            sizeof($params) > 0 ? $sta->execute($params): $sta->execute();
            return $sta;
        } catch (PDOException $e) {
            throw new Exception("query failed because :  {$e->getMessage()}");
        }
    }


}