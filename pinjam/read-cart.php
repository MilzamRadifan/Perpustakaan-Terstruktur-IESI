<?php
function read()
{
    $link = new mysqli("localhost", "root", "etherealZ4M.", "perpustakaan");

    $query = "SELECT buku_id, judul from cart natural join buku;";
    $result = mysqli_query($link, $query);

    if(mysqli_num_rows($result) > 0) {
        echo "<form method='post' action='pinjam.php?fitur=save'>"; 
        echo "<table border=1>";
        echo "<tr> <td>No</td> <td>ID</td> <td>Judul</td> <td>Lama Pinjam</td> <td></td> </tr>";
        $i =1;
        while ($row = mysqli_fetch_array($result)) {

            echo "<tr>";
            echo "<td>$i</td><td>$row[0]</td><td>$row[1]</td>"; 
            echo "<td><input type='number' name='hari[]' placeholder='Hari' required></td>"; 
            echo "<input type='hidden' name='buku_id[]' value='$row[0]'>"; 
            echo "<td><a href='./pinjam.php?fitur=delete&idbuku=$row[0]'>hapus</a></td>"; 
            echo "</tr>";
            $i++;
        }
        echo "</table>";
        echo "<a href='../fitur.php'>CARI</a> <br>";
        echo "<input type='submit' value='SIMPAN'></form>"; 
    } else {
        echo "cart kosong";
    }
     
    $query2 = "SELECT * from peminjaman;";
    $result2 = mysqli_query($link, $query2);

    echo "<table border=1>";
    echo "<tr> <td>No</td> <td>ID</td> <td>Judul</td> <td>Tanggal</td> <td>Lama Pinjam</td> </tr>";
    $i =1;
    while ($row = mysqli_fetch_array($result2)) {
        echo "<tr>";
        echo "<td>$i</td> <td>$row[0]</td> <td>$row[1]</td> <td>$row[2]</td> <td>$row[3]</td>"; 
        echo "</tr>";
        $i++;
    }
    mysqli_close($link);
}
?>