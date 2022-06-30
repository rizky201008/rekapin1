<?php
require_once 'config.php';
$lihat_query = mysqli_query($connect, "SELECT * FROM users ORDER BY `nim` ASC");
$no = 1;
if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jenis_kelamin= $_POST['jkelamin'];
    $hobi= $_POST['hobi'];
    $cek_nim = mysqli_query($connect, "SELECT * FROM users WHERE `nim`=$nim");
    $status_nim = mysqli_num_rows($cek_nim);

    if ($status_nim = 0) {
        $connect->query("INSERT INTO users (`nim`, `nama`, `jenis-kelamin`, `hobi`) VALUES ($nim, '$nama', '$jenis_kelamin', '$hobi')");
        $nim = null;
        $nama = null;
        $alamat = null;
        $jenis_kelamin = null;
        $hobi = null;
        header('Location: index.php');
    } else {
        echo '<script>alert("Maaf Data Sudah Ada")</script>';
    }
}
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <h1 class="fs-3">Formulir Isian Daftar Ulang</h1>
                <form action="" method="post">
                    <label for="nim" class="form-label">
                        NIM:</label>
                    <input type="number" name="nim" id="nim" class="form-control" required><br>
                    <label for="nama">
                        Nama:</label>
                    <input type="text" name="nama" id="nama" class="form-control" required><br>

                    <p>Jenis Kelamin</p>

                    <div class="form-check">
                        <label class="form-check-label" for="laki">
                            Laki-Laki
                        </label>
                        <input class="form-check-input" type="radio" name="jkelamin" id="laki" value="Laki-Laki">
                        <br>
                        <label class="form-check-label" for="perempuan">
                            Perempuan
                        </label>
                        <input class="form-check-input" type="radio" name="jkelamin" id="perempuan" value="Perempuan">
                    </div><br>

                    <p>Hobby</p>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Sepak Bola" id="bola" name="hobi">
                        <label class="form-check-label" for="bola">
                            Sepak Bola
                        </label><br>

                        <input class="form-check-input" type="checkbox" value="Volley" id="volley" name="hobi">
                        <label class="form-check-label" for="volley">
                            Volley
                        </label><br>

                        <input class="form-check-input" type="checkbox" value="Bulu Tangkis" id="btks" name="hobi">
                        <label class="form-check-label" for="btks">
                            Bulu Tangkis
                        </label>
                    </div><br>

                    <button name="submit" class="btn btn-primary w-100">DAFTAR</button>
                </form>
            </div>
        </div>
    </div>
    <hr>

    <!-- Table -->
    <section id="table">
        <h1 class="text-center">Pendaftar Himse</h1>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Hobi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($data = mysqli_fetch_array($lihat_query)) :
                            ?>
                                <tr>
                                    <th scope="row">
                                        <?= $no++ ?>
                                    </th>
                                    <td>
                                        <?= $data['nim'] ?>
                                    </td>
                                    <td>
                                        <?= $data['nama'] ?>
                                    </td>
                                    <td>
                                        <?= $data['jenis-kelamin'] ?>
                                    </td>
                                    <td>
                                        <?= $data['hobi'] ?>
                                    </td>
                                    <td>
                                        <a href="ubah.php?nim=<?= $data['nim'] ?>"><button class="btn btn-primary mb-1 mt-1">Update</button></a>
                                        <a href="hapus.php?nim=<?= $data['nim'] ?>"><button class="btn btn-danger mb-1 mt-1">Hapus</button></a>
                                    </td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>