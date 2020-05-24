<?php
    // cek apakah tidak ada data di $_GET
    if ( !isset($_GET["judul"]) || 
         !isset($_GET["penulis"]) ||
         !isset($_GET["penerbit"]) ||
         !isset($_GET["tahun"]) ||
         !isset($_GET["gambar"]))  {
        // redirect
        header("Location: latihan1.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
    <style>
        ul {
            list-style: none;
        }
    </style>
</head>
<body>
    <ul>
        <li><img src="img/<?= $_GET["gambar"] ?>"></li>
        <li>Judul : <?= $_GET["judul"] ?></li>
        <li>Penulis : <?= $_GET["penulis"] ?></li>
        <li>Penerbit : <?= $_GET["penerbit"] ?></li>
        <li>Tahun : <?= $_GET["tahun"] ?></li>
    </ul>

    <a href="latihan1.php">Kembali</a>
</body>
</html>