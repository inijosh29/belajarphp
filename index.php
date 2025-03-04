<?php
include_once("koneksi.php");

$books = [];
// $queryBook = mysqli_query($conn,"select * from books");
// while($book = mysqli_fetch_assoc($queryBook)){
//     $books[] = $book;
// }

if (isset($_POST["search"])) {
    $search = htmlspecialchars($_POST["searchPost"]);

    $queryBook = mysqli_query($conn, "SELECT * FROM books 
                                        WHERE judul LIKE '%$search%' 
                                        OR kategori LIKE '%$search%'");

    while ($book = mysqli_fetch_assoc($queryBook)) {
        $books[] = $book;
    }
} else {
    // If no search is performed, you can display all blog posts here.
    $queryBook = mysqli_query($conn, "select * from books");
    while ($book = mysqli_fetch_assoc($queryBook)) {
        $books[] = $book;
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
    <nav class="navbar navbar-expand-lg bg-info">
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
                <form class="d-flex" role="search" action="" method="POST">
                    <input name="searchPost" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button name="search" btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- navbar end -->

    <!-- books start -->
    <div class="container mt-5">
        <h1>daftar buku</h1>
        <a href="tambah.php" class="btn btn-outline-success btn-lg my-5">Tambah buku</a>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Keterangan</th>
                    <th>Kategori</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $buku) : ?>
                    <tr>
                        <td> <?= $buku["judul"]; ?></td>
                        <td> <?= $buku["gambar"]; ?></td>
                        <td> <?= $buku["keterangan"]; ?></td>
                        <td> <?= $buku["kategori"]; ?></td>
                        <td>
                            <a href="hapus.php?id=<?= $buku['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')" class="btn btn-danger delete-btn">Delete</a>
                            <a href="ubah.php?id=<?php echo $buku["id"]; ?>" class="btn btn-primary">edit</a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    <!-- books end -->

    <!-- gs bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>