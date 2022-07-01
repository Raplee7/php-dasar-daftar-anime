<?php 

// for ($i=0; $i < 5 ; $i++) { 
//     echo "Rafli Ganteng <br>";
// }

// $i = 0;
// while ($i <= 5) {
//     echo "Rafli Tamvan <br>";
//     $i++;
// }

// $a = 0;
// do {
//     echo "Rafli Menawan";
//     $a++;
// } while ($a <= 10);



?>

<style>
    .warna{
        background-color: greenyellow;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border="1" cellspacing="0" cellpadding="10" width="300" align="center">

    <?php for($i=1; $i<=3; $i++) : ?> 
        <?php if($i % 2 == 1) : ?>
            <tr class="warna">
        <?php else : ?>
            <tr>
    <?php endif ?>

        <?php for($j=1; $j<=5; $j++) : ?>
            <td><?= "$i,$j"; ?></td>
            <?php endfor ?>
        </tr>
    <?php endfor ?>

</table>
</body>
</html>