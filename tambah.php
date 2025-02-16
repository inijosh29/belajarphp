<?php
include_once("koneksi.php");

if (isset($_POST["simpan"])) {
    $judul = $_POST["judul"];
    $gambar = $_FILES["gambar"]["name"]; // Ambil nama file gambar
    $keterangan = $_POST["keterangan"];
    $kategori = $_POST["kategori"];

    //query untuk menambahkan data ke database
    $queryPost= "insert into books values ('','$judul', '$gambar', '$keterangan', '$kategori')";

    // pengecekan apakah data berhasil di simpan atau tidak
    if (mysqli_query($conn, $queryPost)) {
        echo "<script>
            alert('Berhasil disimpan')
        </script>";
    } else {
        echo "<script>
        alert('Gagal disimpan')
        </script>";
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- navbar end -->

    <!-- form start -->
    <div class="container mt-5">
        <div class="row">
            <h1>Halaman Admin</h1>
        </div>
        <div class="row my-5">
            <div class="col-8">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-5">
                        <label for="judul" class="form-label"> Judul buku</label>
                        <input type="text" class="form-control" name="judul" id="judul" placeholder="Isi judul buku anda" required>
                    </div>

                    <div class="mb-5">
                        <label for="judul" class="form-label">Upload Gambar</label>
                        <input type="file" class="form-control" name="gambar" id="judul" required>
                    </div>

                    <div class="mb-5">
                        <label for="Isi" class="form-label">Isi keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required></textarea>
                    </div>

                    <div class="mb-5">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori" id="kategori" class="form-select" required>
                            <option value="Coding">Coding</option>
                            <option value="Design">Design</option>
                            <option value="Personal">Personal</option>
                        </select>
                    </div>

                    <a href="index.php" class="btn btn-outline-secondary btn-lg">Back</a>
                    <button type="submit" name="simpan" class="btn btn-outline-success btn-lg col-4">Simpan</button>

                </form>
            </div>
                    
        </div>

    </div>
    <!-- form end -->

    <!-- gs bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>