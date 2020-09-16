<?php require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "class" . DIRECTORY_SEPARATOR . "Snow.php");

$db = new Snow();
$snow = $db->getASnow($_GET['snowId']);
$idsnow = $snow[$index]['idSnow'];
$marque = $snow[$index]['Marque'];
$boots = $snow[$index]['Boots'];
$type = $snow[$index]['Type'];
$disponibilite = $snow[$index]['Disponibilite'];

ob_start();
$title = "Snowboards | Update Snowboard";
?>


<h1>Modification de snow</h1>

<form class="form" method="POST" action="snow_update_data.php">
    <table>
        <tr>
            <td>IDSnow : </td>
            <td><input type="text" placeholder="Code du snow" name="fID" value="<?= $idsnow ?>" readonly></td>
        </tr>
        <tr>
            <td>Marque : </td>
            <td><input type="text" placeholder="Entrez la marque" name="fMarque" value="<?= $marque ?>">
            </td>
        </tr>
        <tr>
            <td>Boots : </td>
            <td><input type="text" placeholder="Entrez les boots compatibles" name="fBoots" value="<?= $boots ?>"></td>
        </tr>
        <tr>
            <td>Type : </td>
            <td><input type="text" placeholder="Entrez le type de snow" name="fType" value="<?= $type ?>"></td>
        </tr>
        <tr>
            <td>Disponibilité : </td>
            <td><input type="integer" placeholder="Entrez la disponibilité en magasin" name="fDispo"
                    value="<?= $disponibilite ?>"></td>
        </tr>

        <tr>
            <td><input class="btn" type="submit" value="Modifier" /></td>
            <td><input type="reset" class="btn" value="Effacer" /></td>
        </tr>
    </table>
</form>

<?php
$js = '';
$content = ob_get_clean();
require(dirname(__DIR__)  . DIRECTORY_SEPARATOR . "layout" . DIRECTORY_SEPARATOR . "layout.php");