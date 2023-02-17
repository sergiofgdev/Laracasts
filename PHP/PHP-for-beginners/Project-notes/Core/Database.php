<?php

namespace Core;

use PDO;

// Connect to my MySQL database, and execute a query.
class Database
{
    public $connection; //database connection
    public $statement;

    // constructor, will be called each time we create a new database
    public function __construct($config, $username = 'root', $password = 2705) // arguments = info about the database connection
    {
        // call a function that php provides, intended for quering up a query string -> example.com?localhost&port=3306&dbname=myapp
        $dsn = 'mysql:' . http_build_query($config, '', ';'); //third argument a separator

        // this is the same as up
//      $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]); // PDO instance
    }

    public function query($query, $params = [])
    {
        // Prepare and execute our first query
        $this->statement = $this->connection->prepare($query); //prepare => php function
        $this->statement->execute($params); //execute => php function
        // Fetch all the results as an associative array and return
        // $statement ->fetch(PDO::FETCH_ASSOC);
        return $this;// We changed the return so instead of returning the statement nos iw returning de class Database

    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findAll()
    {
//        dd($this->statement);
        return $this->statement->fetchAll();
    }

    public function findOrFail()
    {
        $result = $this->find();
        if (!$result) {
            abort();
        }
        return $result;
    }
}

