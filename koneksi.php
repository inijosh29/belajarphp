<?php
    // membuat koneksi kedatabase
    $server = "localhost"; // bisa juga pake 127.0.0.1
    $username = "root";
    $password = "";
    $dbname = "library";

    // urutan= server , username, password, nama database
    $conn = new mysqli($server, $username, $password, $dbname);
    // cek apakah sudah terhubung ke databses atau belum
    // if (!$conn) {
    //     echo "koneksi gagal!";
    // }
    //     echo "berhasil terhubung";
?>