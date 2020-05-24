<?php

// $mahasiswa = [
//     ["2017470080","Ambar Dwi Saputra","Teknik Informatika"],
//     ["2017470900","Ambar Saputra","Teknik Informatika"]
// ];

// var_dump($mahasiswa);

// Menampilkan 1 elemen pada array
// echo $mahasiswa[1];

// Menampilkan array multi dimensi array
// echo $mahasiswa[1][2];


// array associative
// terdapat key and vlue
// tetapi key nya berupa string jika array biasa berupa numeric

$dataBuku = [
    [
    "judul" => "Dear Tomorrow",
    "penulis" => "Maudy Ayunda",
    "penerbit" => "Bentang Pustaka",
    "tahun" => "2018",
    "gambar" => "1.jpeg"
    ],
    [
    "judul" => "Aroma Karsa",
    "penulis" => "Dee Lestari",
    "penerbit" => "Bentang Pustaka",
    "tahun" => "2018",
    "gambar" => "2.jpg"
    ],
    [
    "judul" => "Sebuah Seni Untuk Bersikap Bodo Amat",
    "penulis" => "Mark Manson",
    "penerbit" => "Gramedia",
    "tahun" => "2018",
    "gambar" => "3.jpg"
    ],
    [
    "judul" => "365 Ideas Of Happniness",
    "penulis" => "Puty Puar",
    "penerbit" => "Bentang Pustaka",
    "tahun" => "2016",
    "gambar" => "4.jpg"
    ],
    [
    "judul" => "11 : 11 Albuk",
    "penulis" => "Fiersa Besar",
    "penerbit" => "Media Kita",
    "tahun" => "2018",
    "gambar" => "5.jpg"
    ],
    [
    "judul" => "Dunia Sophie",
    "penulis" => "Jostein Gaarder",
    "penerbit" => "Mizan DBU",
    "tahun" => "1991",
    "gambar" => "6.jpg"
    ],
    [
    "judul" => "Nanti Kita Cerita Tentang Hari Ini",
    "penulis" => "Marchella FP",
    "penerbit" => "Gramedia",
    "tahun" => "2018",
    "gambar" => "7.jpg"
    ],
    [
    "judul" => "1984 - Republish",
    "penulis" => "George Orwell",
    "penerbit" => "Bentang Pustaka",
    "tahun" => "1984",
    "gambar" => "8.jpg"
    ],
    [
    "judul" => "Nevermoor #2: Wundersmith. The Calling Of Morrigan Crow",
    "penulis" => "Jessica Towsend",
    "penerbit" => "Noura Books",
    "tahun" => "2018",
    "gambar" => "9.jpg"
    ],
    [
    "judul" => "#MO: Mobilisasi dan Orkentrasi - Edisi Soft Cover",
    "penulis" => "Rhenald Kasali",
    "penerbit" => "Expose Publika",
    "tahun" => "2019",
    "gambar" => "10.jpg"
    ]
];

// echo $mahasiswa[1]["nama"];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        li {
           list-style: none;
        }
    </style>

</head>
<body>
    <h3>Data Buku</h3>
    <?php foreach($dataBuku as $db) : ?>
        <ul>    
                <li>
                    <img src="img/<?= $db["gambar"] ?>">
                </li>
                <li>Judul Buku: <?= $db["judul"] ?></li>
                <li>Penulis : <?= $db["penulis"] ?></li>
                <li>Penerbit: <?= $db["penerbit"] ?></li>  
                <li>Tahun: <?= $db["tahun"] ?></li>  
        </ul>
    <?php endforeach ?>
</body>
</html>