<?php 

    $anime = [
        [
            "judul"             => "Stein Gate",
            "genre"             => "Drama, Sci-Fi, Suspense, Psychological ",
            "jlh_eps"           => "24",
            "studio"            => "White Fox",
            "gambar"            => "steingate.jpg"
        ],
        [
            "judul"             => "Re:Zero kara Hajimeru Isekai Seikatsu",
            "genre"             => "Drama, Fantasy, Suspense, Psychological ",
            "jlh_eps"           => "25",
            "studio"            => "White Fox",
            "gambar"            => "rezero.jpg"
        ]
    ]

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anime</title>
</head>
<body>
    <h1>Daftar Anime</h1>
    <?php foreach($anime as $a) : ?>
        <ul>
            <li>
                <img src="img/<?= $a["gambar"]; ?>">
            </li>
            <li>Judul   : <?= $a["judul"];  ?></li>
            <li>Genre   : <?= $a["genre"];  ?></li>
            <li>Episode : <?= $a["jlh_eps"];  ?></li>
            <li>Studio  : <?= $a["studio"];  ?></li>
        </ul>
    <?php endforeach ?>
</body>
</html>
