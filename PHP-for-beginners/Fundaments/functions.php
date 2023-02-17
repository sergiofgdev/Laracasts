<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise Functions and filters</title>
</head>

<body>
<?php
$movies = [
    [
        'name' => 'Blade Runner',
        'year' => 1982,

    ],
    [
        'name' => 'Star Wars',
        'year' => 1972,

    ],
    [
        'name' => 'Interstellar',
        'year' => 2008,

    ],
    [
        'name' => 'Pokemon',
        'year' => 2012,

    ],

];

function filterByYear($array, $year)
{
    $filteredArray = [];
    foreach ($array as $title) {
        if ($title['year'] >= $year) {
            $filteredArray[] = $title;
        }
    }
    return $filteredArray;
}

//La funcion filter se puede ahorrar en php si utilizamos la funcion array_NOMBRE
function filter($items, $fn)
{
    $filteredItems = [];
    foreach ($items as $item) {
        if ($fn($item)) {
            $filteredItems[] = $item;
        }
    }
    return $filteredItems;
}

//Le paso una funcion personalizada y me ahorro tener que pasarle 2 variables, de este modo si cambio algo no necesito
//cambiarlo en la funcion si no en la variable $filteredMovies
//$filteredBooks = filter($movies, "year", 1900)

$filteredMovies = filter($movies, function($movie){
    return $movie['year'] >= 2000;
});

$filteredMoviesPHP = array_filter($movies, function($movie){
    return $movie['year'] >= 2000;
});




?>

<p><?= "--- Normal function ---" ?></p>
<ul>
    <?php foreach (filterByYear($movies, 2000) as $title) : ?>
        <li>
            <?= $title['name'] ?>
        </li>
    <?php endforeach; ?>
</ul>

<p><?= "--- Lambda function ---" ?></p>
<ul>
    <?php foreach ($filteredMoviesPHP as $book) : ?>
        <li>
            <?= $book['name']?> (<?= $book['year']?>)
        </li>

    <?php endforeach; ?>


</ul>

</body>
</html>