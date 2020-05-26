<?php

// membuat simulasi untuk loading search (hanya simulasi)
usleep(500000);
// end simulasi

require '../functions.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM buku WHERE
        judul LIKE '%$keyword%' OR
        penulis LIKE '%$keyword%' OR
        penerbit LIKE '%$keyword%' OR
        tahun LIKE '%$keyword%'
        ";
$buku = query($query);
?>

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
        <td><img src="img/<?= $row["gambar"] ?>" height="100px" width="100px" alt=""></td>
        <td><?= $row["judul"] ?></td>
        <td><?= $row["penulis"] ?></td>
        <td><?= $row["penerbit"] ?></td>
        <td><?= $row["tahun"] ?></td>
      </tr>
      <?php $i++; ?>
    <?php endforeach ?>
  </tbody>
</table>