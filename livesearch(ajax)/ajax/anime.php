<?php 

require "../functions.php";

$keyword = $_GET["keyword"];

$query  = "SELECT * FROM anime 
                WHERE
                judul LIKE '%$keyword%' OR
                kode LIKE '%$keyword%' OR
                genre LIKE '%$keyword%' OR
                studio LIKE '%$keyword%' 
            ";

$anime = query($query); 

?>

            <table border="1" cellspacing="0" cellpadding="10">
                
                <tr>
                    <th>No.</th>
                    <th>Kode</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Genre</th>
                    <th>Studio</th>
                    <th>Aksi</th>
                </tr>

                <?php $i = 1; ?>
                <?php foreach($anime as $a) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $a["kode"] ?></td>
                    <td><img src="img/<?= $a["gambar"] ?> " width="50"></td>
                    <td><?= $a["judul"] ?></td>
                    <td><?= $a["genre"] ?></td>
                    <td><?= $a["studio"] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $a["id"] ?>">Edit</a> | 
                        <a href="hapus.php?id=<?= $a["id"] ?>" onclick="return confirm('yakin?');">Hapus</a>
                    </td>
                </tr>
                <?php $i++ ?>
                <?php endforeach ?>
            </table>