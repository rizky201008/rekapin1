<?php
require_once 'config.php';
$NIM = $_GET['nim'];
$select_query = $connect->query("SELECT * FROM users WHERE `nim`=$NIM");

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
            <div class="col-md-4">
                <h1 class="fs-3">Formulir Update Data</h1>
                <form action="action_update.php" method="post">
                    <?php while ($data = mysqli_fetch_array($select_query)) : ?>
                        <label for="nim" class="form-label">
                            NIM:</label>
                        <input type="number" name="nim" id="nim" class="form-control" maxlength="10" required value="<?= $data['nim'] ?>"><br>
                        <label for="nama">
                            Nama:</label>
                        <input type="text" name="nama" id="nama" class="form-control" required value="<?= $data['nama'] ?>"><br>
                        <p>Jenis Kelamin</p>

                        <div class="form-check">
                            <label class="form-check-label" for="laki">
                                Laki-Laki
                            </label>
                            <input class="form-check-input" type="radio" name="jkelamin" id="laki" value="Laki-Laki"<?php if($data['jenis-kelamin']=='Laki-Laki'){ echo 'checked';}?>>
                            <br>
                            <label class="form-check-label" for="perempuan">
                                Perempuan
                            </label>
                            <input class="form-check-input" type="radio" name="jkelamin" id="perempuan" value="Perempuan" <?php if($data['jenis-kelamin']=='Perempuan'){ echo 'checked';}?>>
                        </div><br>

                        <p>Hobby</p>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Sepak Bola" id="bola" name="hobi" <?php if($data['hobi']=='Sepak Bola'){echo 'checked';}?>>
                            <label class="form-check-label" for="bola">
                                Sepak Bola
                            </label><br>

                            <input class="form-check-input" type="checkbox" value="Volley" id="volley" name="hobi" <?php if($data['hobi']=='Volley'){ echo 'checked';}?>>
                            <label class="form-check-label" for="volley">
                                Volley
                            </label><br>

                            <input class="form-check-input" type="checkbox" value="Bulu Tangkis" id="btks" name="hobi" <?php if($data['hobi']=='Bulu Tangkis'){ echo 'checked';}?>>
                            <label class="form-check-label" for="btks">
                                Bulu Tangkis
                            </label>
                        </div><br>
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                    <?php endwhile ?>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>