<?php
$id_buku = $_GET['id_buku'] ?? null;

$link = mysqli_connect("localhost", "root", "etherealZ4M.", "perpustakaan");

if ($id_buku) {
    $query = "SELECT * FROM buku WHERE buku_id = '$id_buku'"; 
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "Judul: " . $row['judul'] . "<br>";
        echo "Deskripsi: " . $row['sinopsis'] . "<br>"; // Ubah sinopsis ke deskripsi
        echo "Penulis: " . $row['penulis'] . "<br>";
        echo "Penerbit: " . $row['penerbit'] . "<br>";
        echo "Tahun Terbit: " . $row['tahunTerbit'] . "<br>";
        echo "Jumlah Halaman: " . $row['jumlahHalaman'] . "<br>";
        echo "Bahasa: " . $row['bahasa'] . "<br>";
        echo "Genre: " . $row['genre'] . "<br>";
    } else {
        echo "Buku tidak ditemukan.";
    }
} else {
    echo "ID Buku tidak ditemukan.";
}

mysqli_close($link);
?>