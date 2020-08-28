<?php
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "snow.php");

$db = new DB();
$snows = $db->getSnows();

$id = -1;
for ($i = 0; $i < count($snows); $i++) {
    if ($snows[$i]['idSnow'] == $_GET['idSnow']) {
        $id = $i;
    }
}

if ($id >= 0) {
    unset($snows[$id]);
    $snows = array_slice($snows, 0);
    $db->deleteSnow($snows);
} else {
    echo "pas trouvé le " . $_GET['idSnow'];
}
?>

Le snow supprimé est le <strong><?= @$_GET['idSnow']; ?></strong> <br>
<br>
<h3><a href='products.php'>Retour à la liste</a></h3>