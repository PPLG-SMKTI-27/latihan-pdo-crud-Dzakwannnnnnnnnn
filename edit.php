<?php
include_once("./koneksi.php");

// --- Proses Update ---
if (isset($_POST['update'])) {  
    $id = (int) $_POST['id_barang'];
    $nama_barang = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    // pakai prepared statement agar aman
    $stmt = $mysqli->prepare("UPDATE barang 
                              SET nama = ?, kategori = ?, stok = ?, harga = ? 
                              WHERE id_barang = ?");
    $stmt->bind_param("ssiii", $nama_barang, $kategori, $stok, $harga, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit;
}

// --- Ambil data lama berdasarkan id di URL ---
if (!isset($_GET['id'])) {
    echo "ID barang tidak ditemukan.";
    exit;
}

$id = (int) $_GET['id'];

// prepared statement ambil data
$stmt = $mysqli->prepare("SELECT * FROM barang WHERE id_barang = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($barang = $result->fetch_assoc()) {
    $nama_barang = $barang['nama'];
    $kategori = $barang['kategori'];
    $stok = $barang['stok'];
    $harga = $barang['harga'];
} else {
    echo "Data tidak ditemukan.";
    exit;
}
$stmt->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>  
    <meta charset="UTF-8">
    <title>Edit Data Barang</title>
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
    <h2>Edit Data Barang</h2>

    <form method="post" action="edit.php">
        <table>
            <tr> 
                <td>Nama Barang</td>
                <td><input type="text" name="nama" value="<?= htmlspecialchars($nama_barang); ?>"></td>
            </tr>
            <tr> 
                <td>Kategori</td>
                <td><input type="text" name="kategori" value="<?= htmlspecialchars($kategori); ?>"></td>
            </tr>
            <tr> 
                <td>Stok Barang</td>
                <td><input type="text" name="stok" value="<?= htmlspecialchars($stok); ?>"></td>
            </tr>
            <tr> 
                <td>Harga Per-unit</td>
                <td><input type="text" name="harga" value="<?= htmlspecialchars($harga); ?>"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;">
                    <input type="hidden" name="id_barang" value="<?= $id; ?>">
                    <input type="submit" name="update" value="Update">
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>
