<?php
require('modelcsv.php');

$snowCherche = $_POST['fID'];
$db = new DB();
$snows = $db->getSnows();

$i = 0;
$id = -1;
foreach ($snows as $snow) {
    if ($snow['idSnow'] == $snowCherche) {
        $id = $i;
    }
    $i++;
}
echo $id . "<br>";

if ($id >= 0) {
    $snows[$id] = array('idSnow' => $_POST['fID'], 'Marque' => $_POST['fMarque'], 'Boots' => $_POST['fBoots'], 'Type' => $_POST['fType'], 'disponibilite' => $_POST['fDispo']);
    $db->updateSnow($snows);
} else {
    echo "Pas trouvé le " . $_POST['fID'];
}

$db->updateSnow($snows);
?>
Le snow modifié est le <strong><?= @$_POST['fID']; ?></strong> <br>
<br>
<h3><a href='products.php'>Retour à la liste</a></h3>