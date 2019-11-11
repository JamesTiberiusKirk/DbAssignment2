<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php' ?>

<div class="jumbotron">
    <h1>Admin Console</h1>
    <form action="/pages/admin/users.php">
        <button type="submit" class="btn btn-primary">Users</button>
    </form>
    <form action="/pages/admin/products.php">
        <button type="submit" class="btn btn-primary">Products</button>
    </form>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php' ?>