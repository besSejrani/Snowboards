<?php
require_once(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php");
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "class" . DIRECTORY_SEPARATOR . "Snow.php");

$uri = $_SERVER['REQUEST_URI'];
$product = explode('/', $uri)[2];

$db = new Snow();
$snow = $db->getASnow($product);

$idsnow = $snow[0]['idSnow'];
$marque = $snow[0]['Marque'];
$boots = $snow[0]['Boots'];
$type = $snow[0]['Type'];
$disponibilite = $snow[0]['Disponibilite'];

ob_start();
$title = "Snowboards | Update Snowboard";
?>


<div class="d-flex flex-column justify-content-center align-items-center vh-100">

    <div class="container px-0">

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
                    <td><input type="text" placeholder="Entrez les boots compatibles" name="fBoots"
                            value="<?= $boots ?>"></td>
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

    </div>
</div>



<?php
$js = '';
$content = ob_get_clean();
require(dirname(__DIR__)  . DIRECTORY_SEPARATOR . "layout" . DIRECTORY_SEPARATOR . "layout.php");