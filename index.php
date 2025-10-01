<?php
include_once("koneksi.php");

$hasil = mysqli_query($mysqli, "SELECT * FROM barang");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang</title>
    <style>
        *{
            font-family: Arial, sans-serif;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: black;
            font-weight: bold;
            transition-duration: 0.3s;
            padding: 12px;
        }

        a:hover {
            padding-right: 100px;
            border: 1px solid #ccc;
            background-color: #f2f2f2;
            text-align: center;
            transform: perspective();
        }

        body {
            background-color: #fafafa;
            padding: 20px;
        }

        h2 {
            text-align: center;
            font-family: Arial, sans-serif;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2>Daftar Barang</h2>
<a href="tambah.php">Tambah Barang</a>
<a href="stokKurang.php">Periksa stok yang kurang</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Stok Barang</th>
        <th>Harga Per-unit</th>
        <th>Aksi</th>
    </tr>

    <?php while($barang = mysqli_fetch_array($hasil)): ?>
        <tr>
            <td><?= $barang['id_barang']; ?></td>
            <td><?= $barang['nama']; ?></td>
            <td><?= $barang['kategori']; ?></td>
            <td><?= $barang['stok']; ?></td>
            <td><?= $barang['harga']; ?></td>
            <td>
                <a href="edit.php?id=<?= $barang['id_barang']; ?>">Edit</a> |
                <a href="delete.php?id=<?= $barang['id_barang']; ?>" onclick="return confirm('Yakin ingin hapus?')">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>