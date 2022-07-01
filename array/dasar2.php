<?php 

$angka = ["18","3","2","7","20","78","10"];

?>


<style>
    .kotak{
        width: 50px;
        height: 50px;
        background-color: chartreuse;
        text-align: center;
        float: left;
        line-height: 50px;
        margin: 3px;
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
    for ($i=0; $i < count($angka) ; $i++) 
    : ?>
    <div class="kotak"><?= $angka[$i]  ?></div>
    <?php endfor ?>
    
    <div class="clear"></div>

    <?php foreach($angka as $a) : ?>
        <div class="kotak"><?= $a ?></div>
    <?php endforeach ?>

</body>
</html>