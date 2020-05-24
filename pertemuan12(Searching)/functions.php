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
    $gambar = htmlspecialchars($data["gambar"]);

     // query insert data
     $query = "INSERT INTO buku
     VALUES
     ('','$judul','$penulis','$penerbit','$tahun','$gambar')
     ";
 
     mysqli_query($conn, $query);
     return mysqli_affected_rows($conn);
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
    $gambar = htmlspecialchars($data["gambar"]);

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


?>