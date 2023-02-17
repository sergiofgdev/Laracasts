<?php


// Connect to my MySQL database, and execute a query.
class Database
{
    public $connection; //database connection

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
        $statement = $this->connection->prepare($query); //prepare => php function
        $statement->execute($params); //execute => php function
        // Fetch all the results as an associative array and return
        // return $statement ->fetch(PDO::FETCH_ASSOC);
        return $statement;
    }
}
