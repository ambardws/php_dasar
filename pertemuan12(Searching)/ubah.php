<?php

require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiwa berdasarkan id
$buku = query("SELECT * FROM buku WHERE id = $id")[0];
// var_dump($buku);

// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {

    // cek apakah data berhasil di ubah atau tidak
    if( ubah($_POST) > 0 ) {
        echo  " 
        <script>
            alert('Data Berhasil Diubah');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo  " 
        <script>
            alert('Data Gagal Diubah');
            document.location.href = 'index.php';
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <link rel="stylesheet" href="style.css">
    <title>Ubah Data Buku</title>
</head>
<body>
    <div class="container-fluid">
        <h1 class="text-center">Ubah Data Buku</h1>
            <!-- <div class="fieldset"> -->
            <div class="card" style="width: 70%; margin: 0 auto;">
                <div div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $buku["id"] ?>">
                        <div class="form-group col-md-12">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" placeholder="Masukkan Judul" name="judul" value="<?= $buku["judul"] ?>" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="penulis">Penulis</label>
                            <input type="text" class="form-control" id="penulis" placeholder="Masukkan Penulis" name="penulis" value="<?= $buku["penulis"] ?>" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="penerbit">Penerbit</label>
                            <input type="text" class="form-control" id="penerbit" placeholder="Masukkan Penerbit" name="penerbit" value="<?= $buku["penerbit"] ?>" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="tahun">Tahun</label>
                            <input type="text" class="form-control" id="tahun" placeholder="Masukkan Tahun" name="tahun" value="<?= $buku["tahun"] ?>" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="gambar">Gambar</label>
                            <input type="text" class="form-control" id="gambar" placeholder="Masukkan Gambar" name="gambar" value="<?= $buku["gambar"] ?>" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary ml-3">Submit</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>