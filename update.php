<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</head>
<style>
      body {
            background: linear-gradient(to right, #3498db, #ff58ff62);
        }

</style>
<body>
    <div class="container">
        <a href="index.php" class="btn btn-info mt-5 mb-3"><< </a>
        <?php
            include 'config.php';
            $id = $_GET['id'];
            $select = "SELECT * FROM products WHERE id=$id";
            $result = mysqli_query($con, $select);
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <form class="col-sm-5 mx-auto" method="post">
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="id" name="id" value="<?php echo $row['id']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="category" name="category" value="<?php echo $row['category']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="name" name="name" value="<?php echo $row['name']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="branch" name="branch" value="<?php echo $row['branch']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="detail" name="detail" value="<?php echo $row['detail']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="location" name="location" value="<?php echo $row['location']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="fda_number" name="fda_number" value="<?php echo $row['fda_number']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="price" name="price" value="<?php echo $row['price']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="stock" name="stock" value="<?php echo $row['stock']; ?>" required>
                    </div>
                    <input type="submit" class="btn btn-primary" value="update" name="update">
                </form>
            <?php } ?>
    </div>
</body>

</html>

<?php 
if (isset($_POST['update'])) {
    include "config.php";
    $id = $_POST['id'];
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $branch = mysqli_real_escape_string($con, $_POST['branch']);
    $detail = mysqli_real_escape_string($con, $_POST['detail']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $fda_number = mysqli_real_escape_string($con, $_POST['fda_number']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $stock = mysqli_real_escape_string($con, $_POST['stock']);

    $update_query = "UPDATE products SET category='$category', name='$name', branch='$branch',
    detail='$detail', location='$location', fda_number='$fda_number',
    price='$price', stock='$stock' WHERE id=$id";

    $result = mysqli_query($con, $update_query);

    if ($result) {
        ?>
        <script>
            window.location='index.php';
        </script>
        <?php
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}
?>
