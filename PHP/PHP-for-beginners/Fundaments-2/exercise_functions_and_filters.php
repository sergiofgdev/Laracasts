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
        'year' => '1982',

    ],
    [
        'name' => 'Star Wars',
        'year' => '1972',

    ],
    [
        'name' => 'Interstellas',
        'year' => '2008',

    ],
    [
        'name' => 'Pokemon',
        'year' => '2012',

    ],

];

function filterByYear($array, $year)
{
    $filteredArray = [];
    foreach ($array as $title) {
        if ($title[year] >= $year) {
            $filteredArray = $title;
        }
    }
    return $filteredArray;
}

?>


<ul>
    <?php foreach (filteredArray($movies, 2000) as $title) : ?>
        <li>
            <?= $title ?>
        </li>
    <?php endforeach; ?>


</ul>


</body>
</html>