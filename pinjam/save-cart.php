<?php
// function save($idbuku, $hari)
// {
//     // Buat koneksi ke database
//     $link = new mysqli("localhost", "root", "etherealZ4M.", "perpustakaan");

//     foreach ($_POST['hari'] as $hari) {
//         ; 
//     }

//     // Lakukan query untuk membuat peminjaman baru dan ambil ID peminjaman
//     $query = "INSERT INTO peminjaman (buku_id, tanggal, hari ) VALUES ( '$idbuku',current_timestamp(), '$hari')";
//     $result = $link->query($query);
//     $id_peminjaman = $link->insert_id;

//     // Tutup koneksi ke database
//     $link->close();
// }

function save()
{
    // Buat koneksi ke database
    $link = new mysqli("localhost", "root", "etherealZ4M.", "perpustakaan");

    // Ambil data yang dikirimkan melalui metode POST
    $idbuku = $_POST['buku_id']; // Anda perlu menyertakan ID buku yang ingin Anda simpan.
    $hari = $_POST['hari'];
    echo $idbuku;
    echo $hari;

    // Lakukan perulangan untuk menyimpan setiap nilai hari
    foreach ($hari as $value) {
        // Lakukan query untuk membuat peminjaman baru dan ambil ID peminjaman
        $query = "INSERT INTO peminjaman (buku_id, tanggal, hari ) VALUES ('$idbuku', current_timestamp(), '$value')";
        $result = $link->query($query);
    }

    // Tutup koneksi ke database
    $link->close();
}



?>