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
    <style>
        body {
            background: linear-gradient(to right, #ff9966, #ff5e62);
        }

        .container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-top: 50px;
        }

        .center-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="index.php" class="btn btn-info mt-5 mb-3">&lt;&lt;</a>

        <form class="col-sm-5 mx-auto center-form" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="category" name="category" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="name" name="name" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="branch" name="branch" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="detail" name="detail" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="location" name="location" required>
            </div>
            <div class="mb-3">
                <input type="number" class="form-control" placeholder="fda_number" name="fda_number" required>
            </div>
            <div class="mb-3">
                <input type="number" class="form-control" placeholder="price" name="price" required>
            </div>
            <div class="mb-3">
                <input type="number" class="form-control" placeholder="stock" name="stock" required>
            </div>
            <input type="submit" class="btn btn-primary" value="SAVE" name="save">
        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['save'])) {
    include "config.php";
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $branch = mysqli_real_escape_string($con, $_POST['branch']);
    $detail = mysqli_real_escape_string($con, $_POST['detail']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $fda_number = mysqli_real_escape_string($con, $_POST['fda_number']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $stock = mysqli_real_escape_string($con, $_POST['stock']);

    $insert = "INSERT INTO products (category, name, branch, detail, location, fda_number, price, stock) 
                VALUES 
                ('$category','$name','$branch','$detail','$location','$fda_number','$price','$stock')";

    $result = mysqli_query($con, $insert);

    if ($result) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
