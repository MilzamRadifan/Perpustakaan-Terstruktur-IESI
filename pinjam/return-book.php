<?php
function kembali($i)
{
    $link = new mysqli("localhost", "root", "etherealZ4M.", "perpustakaan");
    $query = "DELETE from peminjaman where peminjaman_id = '$i'";
    mysqli_query($link, $query);
    mysqli_close($link);
}
?>