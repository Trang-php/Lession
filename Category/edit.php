<?php 
include 'pdo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    $name = $_POST['name'];

    $data = array('id' => $id, 'name' => $name);
    edit($data);

    header("Location: ./index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $category = $connection->query("SELECT * FROM categories WHERE id = $id")->fetch();
} else {
    header("Location: ./index.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit Category</title>
</head>
<body>
<div class="container mt-3">
    <div class="container-fluid"><h3>Edit Category</h3></div>
    <a href="./index.php" class="btn btn-primary">Back</a>
    <form method="POST" action="./edit.php?id=<?= $category['id'] ?>">
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input required type="text" class="form-control" name="name" placeholder="Enter name ..." value="<?= $category['name'] ?>">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>