<?php

require_once(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . "controller" . DIRECTORY_SEPARATOR . "snowActions.php");

$snow = SnowActions::UpdateData();

$idsnow = $snow[0]['idSnow'];
$marque = $snow[0]['Marque'];
$boots = $snow[0]['Boots'];
$type = $snow[0]['Type'];
$disponibilite = $snow[0]['Disponibilite'];

ob_start();
$title = "Snowboards | Update Snowboard";
?>


<div class="d-flex flex-column justify-content-center align-items-center vh-100">

    <div class="container px-0 d-flex">
        <div class="col-xl-6">
            <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.10lC_4Wwh6v2Bw0ktcfS1AHaEK%26pid%3DApi&f=1" alt="">
        </div>

        <div class="col-xl-6">

            <form class="form" method="POST" action="snow_update_data">

                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" id="id" name="id" value=<?= $idsnow ?>>
                </div>

                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" class="form-control" id="brand" name="brand" value=<?= $marque ?>>
                </div>

                <div class="form-group">
                    <label for="boots">Boots</label>
                    <input type="text" class="form-control" id="boots" name="boots" value=<?= $boots ?>>
                </div>

                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" id="type" name="type" value=<?= $type ?>>
                </div>

                <div class="form-group">
                    <label for="availability">Availability</label>
                    <input type="text" class="form-control" id="availability" name="availability" value=<?= $disponibilite ?>>
                </div>

                <div class="d-flex justify-content-end my-5">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>

            </form>
        </div>

    </div>
</div>



<?php
$js = '';
$content = ob_get_clean();
require(dirname(__DIR__, 2)  . DIRECTORY_SEPARATOR . "layout" . DIRECTORY_SEPARATOR . "layout.php");
