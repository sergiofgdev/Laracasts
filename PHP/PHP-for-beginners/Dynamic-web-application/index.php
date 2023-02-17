<?php

require 'functions.php';
require 'Database.php';

$config = require 'config.php'; //config equal to whatever is return in config.php


$db = new Database($config['database']); //creating an instance of the database class
// super global $_GET -> access information about the get request
$id = ($_GET['id']); //If there's a problem here is because you need to http://localhost:8888/?id=1

$query = "select * from posts where id = :id"; // never ever inline where id = {id}

$posts = $db->query($query, [':id' => $id])->fetchAll(); // call the query method, this is like in java say Database.query or db.query

// if i only need one result instead of a list, i will just fetch instead of fetchAll


// print in screen
// Loop over the post and for each one display a title
foreach ($posts as $post) {
    echo '<li>' . $post['title'] . "</li>";
}

//dd($posts);