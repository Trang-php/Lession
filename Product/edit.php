<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Update product</title>
</head>
<body>
<?php
    require_once 'pdo.php';

    $product = findById(['id' => $_GET['id']]);

?>
<div class="container mt-3">
    <div class="container-fluid"><h3>Update Product</h3></div>
    <a href="./index.php" class="btn btn-primary">Back</a>
    <form method="POST" action="./process_update.php">
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input value='<?php echo $product['id'] ?>' type="hidden" name="id">
            <input required type="text" class="form-control" name="name" value="<?php echo $product['name']?>">
            <br>
            <label for="" class="form-label">Category ID</label>
            <input required type="text" class="form-control" name="id_category" value="<?php echo $product['id_category']?>">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>