<?php
    include_once("koneksi.php");

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $queryDelete = "DELETE FROM books WHERE id = $id";
        if (mysqli_query($conn, $queryDelete)) {
            header("Location: index.php"); // Redirect kembali ke halaman utama setelah penghapusan
        } else {
            echo "Gagal menghapus data: " . mysqli_error($conn);
        }
    }
?>