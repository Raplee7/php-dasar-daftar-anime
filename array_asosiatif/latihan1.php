<style>
    .kotak{
        width: 50px;
        height: 50px;
        background-color: deepskyblue;
        text-align: center;
        float: left;
        margin: 3px;
        line-height: 50px;
        transition: 1s;
    }

    .kotak:hover{
        transform: rotate(360deg);
        border-radius: 50%;
    }

    .clear{
        clear: both;
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

    <?php 
    $angka = [[1,2,3],[4,5,6],[7,8,9]];
    ?>

    <?php foreach ($angka as $a) : ?>
        <?php foreach ($a as $b) : ?>
            <div class="kotak"><?= $b ?></div>
        <?php endforeach ?>
    <div class="clear"></div>
    <?php endforeach ?>

    <?php echo $angka[1][1]; ?>
</body>
</html>