<?php

require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {

    // cek apakah data berhasil di tambahkan atau tidak
    if( tambah($_POST) > 0 ) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'index.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
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
    <title>Tambah Data Buku</title>
</head>
<body>
    <div class="container-fluid">
        <h1 class="text-center">Tambah Data Buku</h1>
            <!-- <div class="fieldset"> -->
            <div class="card" style="width: 70%; margin: 0 auto;">
                <div div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group col-md-12">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" placeholder="Masukkan Judul" name="judul" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="penulis">Penulis</label>
                            <input type="text" class="form-control" id="penulis" placeholder="Masukkan Penulis" name="penulis" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="penerbit">Penerbit</label>
                            <input type="text" class="form-control" id="penerbit" placeholder="Masukkan Penerbit" name="penerbit" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="tahun">Tahun</label>
                            <input type="text" class="form-control" id="tahun" placeholder="Masukkan Tahun" name="tahun" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="gambar">Gambar</label>
                            <input type="text" class="form-control" id="gambar" placeholder="Masukkan Gambar" name="gambar" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary ml-3">Submit</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>