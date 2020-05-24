<?php 
require 'functions.php';
// ambil data dari tabel mahasiswa / query data buku
$buku = query("SELECT * FROM buku");

// tombol cari di tekan
if ( isset($_POST["cari"]) ) {
    $buku = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Halaman Admin</title>
</head>
<body>
    <div class="container-fluid">
        <h1 class="text-center">Data Buku</h1>
        <a class="btn btn-primary" href="tambah.php" role="button">Tambah Data Buku</a>
        <br>
        <br>
        <form class="form-inline" action="" method="POST">
            <input type="text" name="keyword" class="form-control mb-2 mr-sm-2" placeholder="Cari Data" autofocus autocomplete="off">
            <button type="submit" name="cari" class="btn btn-secondary mb-2">Cari</button>
        </form>
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
                        <a href="ubah.php?id=<?= $row["id"] ?>">Ubah</a> |
                        <a href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('Anda Yakin?');">Hapus</a>
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