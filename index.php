<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data buku
$sql = "SELECT id_buku, judul, pengarang, penerbit, tahun_terbit, kategori FROM buku";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Daftar Buku Perpustakaan</h1>
    <table>
        <thead>
            <tr>
                <th>ID Buku</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Kategori</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Output data dari setiap baris
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id_buku"]. "</td>
                            <td>" . $row["judul"]. "</td>
                            <td>" . $row["pengarang"]. "</td>
                            <td>" . $row["penerbit"]. "</td>
                            <td>" . $row["tahun_terbit"]. "</td>
                            <td>" . $row["kategori"]. "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Tidak ada buku</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
