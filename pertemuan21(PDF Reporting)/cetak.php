<?php

require_once __DIR__ . '/vendor/autoload.php';
require 'functions.php';
// ambil data dari tabel buku / query data buku
$buku = query("SELECT * FROM buku");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/print.css">
  <title>Print Data Buku</title>
</head>
<body>
  <h1>Data Buku</h1>
  <table border="1" cellpading="10" cellspacing="0">

  <tr>
      <th>No</th>
      <th>Gambar</th>
      <th>Judul</th>
      <th>Penulis</th>
      <th>Penerbit</th>
      <th>Tahun</th>
  </tr>';

$i = 1;
foreach ($buku as $row) {
  $html .= '<tr>
        <td>' . $i++ . '</td>
        <td><img src="img/' . $row["gambar"] . '"height="75px" width="75px"></td>
        <td>' . $row["judul"] . '</td>
        <td>' . $row["penulis"] . '</td>
        <td>' . $row["penerbit"] . '</td>
        <td>' . $row["tahun"] . '</td>

        </tr>';
}

$html .= '</table>
</body>
</html>';






$mpdf->WriteHTML($html);
$mpdf->Output('daftar-buku.pdf', \Mpdf\Output\Destination::INLINE);
