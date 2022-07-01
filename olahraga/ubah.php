<?php
require_once '../config.php';
$id = $_GET['id_olahraga'];
$select_query = $connect->query("SELECT * FROM tb_olahraga WHERE `id_olahraga`=$id");
$kategori_query = mysqli_query($connect, "SELECT * FROM tb_kategori");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <h1 class="fs-3">Formulir Update Data</h1>
                <form action="action_update.php" method="post">
                    <?php while ($data = mysqli_fetch_array($select_query)) : ?>
                        <label for="nama" class="form-label">
                            Nama:</label>
                        <input type="text" name="nama" id="nama" class="form-control" maxlength="30" required value="<?= $data['nama'] ?>"><br>
                        <label for="kategori" class="form-label">Kategori</label>
                    <?php endwhile ?>
                    <select class="form-select mb-3" name="kategori" id="kategori">
                        <option selected>Pilih Kategori</option>
                        <?php while ($category = mysqli_fetch_array($kategori_query)) : ?>
                            <option value="<?= $category['id_kategori'] ?>"><?= $category['nama'] ?></option>
                            <?php endwhile ?><br>
                        </select>
                    <button type="submit" class="btn btn-primary w-100">UPDATE</button>

                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>