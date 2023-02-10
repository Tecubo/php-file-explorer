<?php

if (isset($pageTitle)) {
    $title = 'PHP File Explorer - ' . $pageTitle;
} else {
    $title = 'PHP File Explorer';
}
?>

<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="/src/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
<header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="<?= $router->generate('home') ?>" class="nav-link px-2 text-white">Home</a></li>
          <li><a href="<?= $router->generate('explorer') ?>" class="nav-link px-2 text-white">Explorer</a></li>
        <?php if ($_SESSION['connected']) : ?>
          <li><a href="/login?logout=1" class="nav-link px-2 text-secondary">Log Out</a></li>
        <?php endif ?>
        </ul>
      </div>
    </div>
  </header>

<div class="container my-5">
    <?= $pageContent ?>
</div>
</body>
</html>