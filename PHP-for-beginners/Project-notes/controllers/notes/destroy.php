<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class); //Database::class is like \Core\Database

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', ['id' => $_POST['id']])->findOrFail(); //the query method is returning object

authorize($note['user_id'] == $currentUserId); // if this is false we abort, if true we continue

// form was submitted. delete the current note.
$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

//at this point the note should be deleted, next thing is returning to notes
header('location: /notes');
exit();

