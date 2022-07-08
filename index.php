<?php
include './config.php';
$no = 1;
$kategori= mysqli_query($connect, "SELECT * FROM tbkategori");
$artikel= mysqli_query($connect, "SELECT * FROM tbartikel");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Daftar Ulang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <section id="tbkategori">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <h1 class="text-center mb-3">Tabel Kategori</h1>
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">id kategori</th>
                            <th scope="col">kategori</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($data = mysqli_fetch_array($kategori)) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['idkategori'] ?></td>
                                <td><?= $data['kategori'] ?></td>
                                <td><a href="#"><button class="btn btn-primary">Edit</button></a><a href="#"><button class="btn btn-danger ms-1">Delete</button></a></td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section id="tbartikel">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <h1 class="text-center mb-3">Tabel Artikel</h1>
                <table class="table table-dark mb-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">id artikel</th>
                            <th scope="col">id kategori</th>
                            <th scope="col">judul</th>
                            <th scope="col">pengirim</th>
                            <th scope="col">tanggal</th>
                            <th scope="col">waktu</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php while($data = mysqli_fetch_array($artikel)):?>
                        <tr>
                            <td><?= $no++?></td>
                            <td><?= $data['idartikel']?></td>
                            <td><?= $data['idkategori']?></td>
                            <td><?= $data['judul']?></td>
                            <td><?= $data['pengirim']?></td>
                            <td><?= $data['tanggal']?></td>
                            <td><?= $data['waktu']?></td>
                            <td><a href="#"><button class="btn btn-primary">Edit</button></a><a href="#"><button class="btn btn-danger ms-1">Delete</button></a></td>
                        </tr>
                        <?php endwhile?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section id="btnact">
        <div class="container-fluid">
            <div class="row justify-content-center text-center">
                <div class="col-md-6"><a href="./add/kategori.php"><button class="btn btn-primary">Form Kategori</button></a><a href="./add/artikel.php"><button class="btn btn-primary ms-5">Form Artikel</button></a></div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>