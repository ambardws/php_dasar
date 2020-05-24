<?php 
    require 'functions.php';
    // ambil data dari tabel mahasiswa / query data buku
    $buku = query("SELECT * FROM buku");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Halaman Admin</title>
</head>
<body>
    <div class="container-fluid">
        <h1 class="text-center">Data Buku</h1>
            <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                <th>No</th>
                <th scope="col">Aksi</th>
                <th scope="col">Gambar</th>
                <th scope="col">Judul</th>
                <th scope="col">Penulis</th>
                <th scope="col">Penerbit</th>
                <th scope="col">Tahun</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($buku as $row) : ?>
                <tr>
                <th scope="row"><?= $i ?></th>
                <td>
                    <div class="text-center">
                        <a href="">Ubah</a> |
                        <a href="">Hapus</a>
                    </div>
                </td>
                <td><img src="../pertemuan7/img/<?= $row["gambar"] ?>" height="100px" width="100px" alt=""></td>
                <td><?= $row["judul"] ?></td>
                <td><?= $row["penulis"] ?></td>
                <td><?= $row["penerbit"] ?></td>
                <td><?= $row["tahun"] ?></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach ?>
            </tbody>
            </table>
    </div>
    
</body>
</html>