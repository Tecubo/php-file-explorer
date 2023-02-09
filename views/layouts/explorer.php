<?php

function extension ($filename) : string {
    $arr = explode('.', $filename);
    return $arr[count($arr) - 1];
}

$uri = $_SERVER['REQUEST_URI'];
$folder = glob(dirname(__DIR__, 2) . $uri . '/*');
$split = explode('/', ltrim($uri, '/'));
$path = '';
for ($i = 1; $i < count($split); $i++) {
    $path .= $split[$i] . '/';
}

?>

<?php if (!empty($folder)): ?>

<h4>
<?php for($i = 0; $i < count($split); $i++): ?>
    /
    <a href="<?= substr($uri, 0, stripos($uri, $split[$i]) + strlen($split[$i])) ?>"><?= $split[$i] ?></a>
<?php endfor ?>
</h4>

<?php foreach($folder as $element): ?>
    <?php if (!is_file($element)): ?>
        <a href="<?= $uri . '/' . basename($element) ?>" class="list-group-item list-group-item-action folder"><?= basename($element, '.php')?></a>
    <?php else: ?>
        <a href="<?= '/download.php?file=' . $path . basename($element)?>" class="list-group-item list-group-item-action"><?= basename($element)?></a>
    <?php endif ?>
<?php endforeach ?>

<?php else:
    header('Location: /error?e=foldernotfound');
endif;
?>