<?php

if (isset($pageTitle)) {
    $title = 'PHP Explorer - ' . $pageTitle;
} else {
    $title = 'PHP Explorer';
}
?>

<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <meta name="description" content="<?= $pageDescription ?? 'PCSIA' ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body class="d-flex flex-column h-100">
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= $router->generate('home') ?>">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <a class="nav-link" href="<?= $router->generate('explorer') ?>">Explorer</a>
            </ul>
            <ul class="navbar-nav">
                <?php if ($_SESSION['connected']) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/login?logout=1">Log Out</a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>
<?php if (!isset($noContainer) || $noContainer == FALSE): ?>
<div class="container my-5">
    <?= $pageContent ?>
</div>
<?php else: ?>
    <?= $pageContent ?>
<?php endif ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>