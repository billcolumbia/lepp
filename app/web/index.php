<?php

namespace LEPPStack;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(dirname(__DIR__));
$dotenv->load();

/**
 * Class PGConnection
 * @package LEPPStack
 */
class PGConnection
{
    public $connection;

    public function connect($connectionString)
    {
        $this->connection = pg_connect(implode(' ', $connectionString));
        if (!$this->connection) {
            die('Error connecting :x' . pg_last_error());
        } else {
            echo 'PG connected :D';
        }
    }

    public function __construct()
    {
        $connectionString = [
            'host=' . getenv('DB_HOST'),
            'dbname=' . getenv('DB_NAME'),
            'user=' . getenv('DB_USER'),
            'password=' . getenv('DB_PASS'),
        ];
        $this->connect($connectionString);
    }
}

$dbConnection = new PGConnection();