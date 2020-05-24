<?php 
    // koneksi ke database
    $conn = mysqli_connect("localhost","root","","phpdasar");

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }


function tambah($data) {
    global $conn;
    $judul = htmlspecialchars($data["judul"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $tahun = htmlspecialchars($data["tahun"]);

    // upload gambar
    $gambar = upload();
    if ( !$gambar ) {
        return false;
    }

     // query insert data
     $query = "INSERT INTO buku
     VALUES
     ('','$judul','$penulis','$penerbit','$tahun','$gambar')
     ";
 
     mysqli_query($conn, $query);
     return mysqli_affected_rows($conn);
}

function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if ( $error === 4 ) {
        echo "<script>
                alert('Silahkan Upload Gambar terlebih dahulu');
              </script>
        ";
        return false;
    }

    // cek apakh yang di upload adalah gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
                alert('File tidak sesuai [hanya gambar]');
              </script>
        ";
        return false;
    }

    // cek jika ukuranya terlalu besar
    if ( $ukuranFile > 1000000 ) {
        echo "<script>
                alert('File Maksimal 1mb');
              </script>
        ";
        return false;
    }

    // lolos pengecekan gambar siap di upload
    // generate nama gambar baru, agar nama gambar di database tidak sama satu dengan yang lain
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;

}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM buku WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $gambarLama = $data["gambarLama"];


    // cek apakah user pilih gambar baru atau tidak
    if ( $_FILES['gambar']['error'] === 4 ) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

     // query ubah data
     $query = "UPDATE buku SET
         judul = '$judul',
         penulis = '$penulis',
         penerbit = '$penerbit',
         tahun = '$tahun',
         gambar = '$gambar'
        WHERE id = $id
     ";
 
     mysqli_query($conn, $query);
     return mysqli_affected_rows($conn);
    
}

function cari($keyword) {
    $query = "SELECT * FROM buku
            WHERE
            judul LIKE '%$keyword%' OR
            penulis LIKE '%$keyword%' OR
            penerbit LIKE '%$keyword%' OR
            tahun LIKE '%$keyword%'
            ";
       return query($query);     
}

function register($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $email = $data["email"];

    // cek username sudah terdaftar
    $resultUsername = mysqli_query($conn, "SELECT username FROM users WHERE
        username = '$username' ");

    if( mysqli_fetch_assoc($resultUsername) ) {
        echo "
            <script>
                alert('Username sudah terdaftar');
            </script>
            ";
        return false;
    }

    // cek email sudah terdaftar
    $resultEmail = mysqli_query($conn, "SELECT email FROM users WHERE
        email = '$email' ");

    if( mysqli_fetch_assoc($resultEmail) ) {
        echo "
            <script>
                alert('Email sudah terdaftar');
            </script>
            ";
        return false;
    }


    // cek konfirmasi password
    if ( $password !== $password2) {
        echo "
            <script>
                alert('Konfirmasi password tidak sesuai');
            </script>
            ";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO users VALUES
    ('','$username','$password','$email')");

    return mysqli_affected_rows($conn);
}


?>