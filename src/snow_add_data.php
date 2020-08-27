<?php
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "snow.php");

if (!empty($_POST['fID'])) {

  $db = new DB();
  $snows = $db->getSnows();
  $snows[] = array('idSnow' => $_POST['fID'], 'Marque' => $_POST['fMarque'], 'Boots' => $_POST['fBoots'], 'Type' => $_POST['fType'], 'disponibilite' => $_POST['fDispo']);
  $db->updateSnow($snows);
  echo "Le snow ajouté est le <strong>" . @$_POST['fID'] . "</strong> <br>";
} else {
  echo "moi j'accepte pas ce genre de id pour un snow <br>";
}
?>

<h3><a href='products.php'>Retour à la liste</a></h3>