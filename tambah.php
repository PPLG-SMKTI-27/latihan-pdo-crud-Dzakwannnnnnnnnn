<?php
if(isset($_POST['Submit'])){
  $nama_barang = $_POST['nama'];
  $kategori = $_POST['kategori'];
  $stok = $_POST['stok'];
  $harga = $_POST['harga'];
  include_once("koneksi.php");
  $hasil = mysqli_query($mysqli, "INSERT INTO barang(nama, kategori, stok, harga) VALUES('$nama_barang','$kategori', '$stok', '$harga')");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>  
    <meta charset="UTF-8">
    <title>Tambah Data barang</title>
    <style>
        body {
            background-color: #fafafa;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        .container {
            width: 400px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            display: inline-block;
            margin-bottom: 15px;
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="container">
    <a href="index.php">← Kembali ke Home</a>
    <h2>Tambahkan Data Barang</h2>

    <form method="post" action="tambah.php">
        <table>
            <tr> 
                <td>Nama Barang</td>
                <td><input type="text" name="nama" placeholder="Nama Barang"></td>
            </tr>
            <tr> 
                <td>Kategori</td>
                <td><input type="text" name="kategori" placeholder="Kategori"></td>
            </tr>
            <tr> 
                <td>Stok barang</td>
                <td><input type="text" name="stok" placeholder="Stok barang"></td>
            </tr>
            <tr> 
                <td>Harga Per-Unit</td>
                <td><input type="text" name="harga" placeholder="Harga"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;">
                    <input type="submit" name="Submit" placeholder="tambahkan">
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>
