<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Ambil data dari form
    $judul = $_POST["judul"];
    $pengarang = $_POST["pengarang"];
    $penerbit = $_POST["penerbit"];
    $tahun_terbit = $_POST["tahun_terbit"];
    $kategori = $_POST["kategori"];

    // Query untuk menambahkan buku baru
    $sql = "INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, kategori) 
            VALUES ('$judul', '$pengarang', '$penerbit', '$tahun_terbit', '$kategori')";

    if ($conn->query($sql) === TRUE) {
        echo "Buku berhasil ditambahkan!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
</head>
<body>
    <h1>Tambah Buku Baru</h1>
    <form method="post" action="tambah_buku.php">
        <label for="judul">Judul:</label><br>
        <input type="text" id="judul" name="judul" required><br>
        <label for="pengarang">Pengarang:</label><br>
        <input type="text" id="pengarang" name="pengarang" required><br>
        <label for="penerbit">Penerbit:</label><br>
        <input type="text" id="penerbit" name="penerbit" required><br>
        <label for="tahun_terbit">Tahun Terbit:</label><br>
        <input type="number" id="tahun_terbit" name="tahun_terbit" required><br>
        <label for="kategori">Kategori:</label><br>
        <input type="text" id="kategori" name="kategori" required><br><br>
        <input type="submit" value="Tambah Buku">
    </form>
</body>
</html>
