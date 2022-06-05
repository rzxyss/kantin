<?php
    $sql = "DELETE FROM siswa WHERE id_siswa='$_GET[id]'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo '<script>alert("Data Siswa Telah Di Hapus");</script>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?pages=siswa">';
    }
?>