<?php
    require_once 'pdo.php';
    $categories = all();
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Something</title>
</head>
<body>
<div class="container mt-3">
    <div class="container-fluid"><h3>List Category</h3></div>
    <a class="btn btn-success" href="./create.php">Create</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($categories as $category) : ?>
        <form id="delete_<?= $category['id'] ?>" action="./delete.php" method="post">
        <tr>
            <th scope="row"><?= $category['id'] ?></th>
            <td><?= $category['name'] ?></td>
            <td>
                    <input type="hidden" value="<?= $category['id'] ?>" name="id">
                    <button type="button" class="btn btn-danger" onclick="confirmDelete(<?= $category['id'] ?>)">Delete</button>
                    <a href="./update.php?id=<?php echo $category['id'] ?>" class="btn btn-info">Edit</a>
                </td>
            </tr>
        </form>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    function confirmDelete(id) {
        let result = confirm('Are you sure?');
        if (result === true) {
            document.getElementById(`delete_${id}`).submit();
        }
    }
</script>
</body>
</html>