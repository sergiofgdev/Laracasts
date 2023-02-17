<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->findOrFail(); //the query method is returning a statement object

authorize($note['user_id'] == $currentUserId, "test");

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
