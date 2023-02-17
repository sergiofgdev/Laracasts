<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo</title>
    <style>
        /*body {*/
        /*    display: grid;*/
        /*    place-items: center;*/
        /*    height: 100vh;*/
        /*    margin: 0;*/
        /*    font-family: sans-serif;*/
        /*}*/
    </style>
</head>
<body>
<h1>Recommended Books</h1>

<?php
$books = [
    "The Langoliers",
    "Do androids dreams of electric shep",
    "Hail Marry",
];

$booksList = [
    [
        'name' => 'Do androids dreams of electric shep',
        'author' => 'Philip K Dick',
        'webpage' => 'https://example.com',
        'year' => '1980'
    ],
    [
        'name' => 'The Langoliers',
        'author' => 'Sergio',
        'webpage' => 'https://example.com',
        'year' => '1980'
    ]
];

function filterByAuthor()
{

    return 'test';
}

?>


<ul>
    <!--   loop for each v1-->
    <?php
    foreach ($books as $book) {
        echo "<li>$book - v1  </li>";
    }
    echo "-----"
    ?>

    <!--  loop for each v2-->
    <?php foreach ($books as $book) : ?>
        <!--        ?= is the same as writing echo-->
        <li>
            <?= "$book - v2"; ?>
        </li>
    <?php endforeach; ?>
    <?= "----" ?>

    <!-- for each arraylist-->
    <?php foreach ($booksList as $book) : ?>
        <?php if ($book['author'] === "Sergio") : ?>
            <li>
                <a href="<?= $book['webpage'] ?>">
                    <?= $book['name'] ?> <?= $book['author'] ?>)
                </a>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>

    <?= "---" ?>

    <p>
        <?= filterByAuthor(); ?>
    </p>

</ul>

</body>
</html>

