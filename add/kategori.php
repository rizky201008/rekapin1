<?php
include '../config.php';
$display = 'd-none';
$display1 = 'd-none';
if (isset($_POST['submit'])) {
    $idcat = $_POST['idkategori'];
    $category = $_POST['kategori'];
    $id_cat_query= mysqli_query($connect, "SELECT * FROM tbkategori WHERE idkategori = $idcat");
    $idcat_check = mysqli_num_rows($id_cat_query);
    if ($idcat_check==0) {
        $connect->query("INSERT INTO tbkategori (idkategori, kategori) VALUES ($idcat, '$category');");
        $idcat = '';
        $category = '';
        $display = '';
    } else {
        $display1 = '';
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulir Kategori</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-3 mb-3">Formulir Kategori</h1>
        <div class="alert alert-danger alert-dismissible fade show <?= $display1 ?>" role="alert">
            <strong>Yaaah!</strong> Id Kategori sudah digunakan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="alert alert-success alert-dismissible fade show <?= $display ?>" role="alert">
            <strong>Hore!</strong> Data berhasil disimpan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <form class="form" action="" method="post">
            <label for="idkategori" class="form-label">Id Kategori</label>
            <input type="text" class="form-control mb-3" id="idkategori" name="idkategori" placeholder="Id Kategori">
            <label for="kategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control mb-3" id="kategori" name="kategori" placeholder="Id Kategori">
            <button class="btn btn-primary w-100 mb-3" name="submit">Submit</button>
        </form>
    </div>

    <div class="container mb-3">
        <div class="row justify-content-center text-center">
            <div class="col-md">
                <a href="../index.php"><button class="btn btn-primary"><i class="bi bi-house-fill"> </i>Home</button></a>
            </div>
            <div class="col-md ms-auto">
                <a href="https://ittelkom-sby.ac.id" target="_blank"><button class="btn btn-info"><i class="bi bi-patch-check-fill"> </i>Official Campuss</button></a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>