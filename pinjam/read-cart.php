<?php
function read()
{
    // Buat koneksi ke database
    $link = new mysqli("localhost", "root", "etherealZ4M.", "perpustakaan");

    // Lakukan query untuk mendapatkan data dari cart dan buku
    $query = "SELECT buku_id, judul from cart natural join buku;";
    $result = mysqli_query($link, $query);

    // Cek apakah ada data yang ditemukan
    if(mysqli_num_rows($result) > 0) {
        echo "<form method='post' action='pinjam.php?fitur=save'>"; // Form untuk menyimpan lama pinjam
        echo "<table border=1>";
        echo "<tr><td>No</td><td>ID</td><td>Judul</td><td>Hari Pinjam</td><td></td><td></td></tr>";
        $i =1;
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>$i</td><td>$row[0]</td><td>$row[1]</td>"; // Menampilkan data buku
            echo "<td><input type='number' name='hari' placeholder='Hari' required></td>"; // Kolom untuk memasukkan lama pinjam
            echo "<td><a href='./pinjam.php?fitur=delete&idbuku=$row[0]'>hapus</a></td>"; // Tombol hapus
            echo "</tr>";
            $i++;
        }
        echo "</table>";
        echo "<a href='../fitur.php'>CARI</a> <br>";
        echo "<input type='submit' value='SIMPAN'></form>"; // Tombol untuk menyimpan
    } else {
        echo "cart kosong";
    }

    // Tutup koneksi ke database
    mysqli_close($link);
}
?>