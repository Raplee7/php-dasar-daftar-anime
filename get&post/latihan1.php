<?php 

    $anime = [
        [   "list"              => "1",
            "judul"             => "Stein Gate",
            "genre"             => "Drama, Sci-Fi, Suspense, Psychological ",
            "studio"            => "White Fox",
            "gambar"            => "steingate.jpg"
        ],
        [
            "list"              => "2",
            "judul"             => "Re:Zero kara Hajimeru Isekai Seikatsu",
            "genre"             => "Drama, Fantasy, Suspense, Psychological ",
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
    <ul>
        <?php foreach($anime as $a) : ?>
            <li>
                <a href="latihan2.php?list=<?= $a["list"];  ?>&judul=<?= $a["judul"]; ?>&genre=<?= $a["genre"];  ?>&studio=   <?= $a["studio"];  ?>&gambar=<?= $a["gambar"]; ?> "><?= $a["judul"]; ?></a>
            </li>
        <?php endforeach ?>
    </ul>
</body>
</html>