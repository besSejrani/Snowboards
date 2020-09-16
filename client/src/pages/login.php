<?php


ob_start();
$title = "Snowboards | Login";
?>

<div class="d-flex flex-column justify-content-center align-items-center vh-100">
    <form class="form container " method=" POST" action="snow_add_data.php">

        <div class=" form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" placeholder="Entrez le code de votre snow" id="email" name="fID"
                value="">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" placeholder="Entrez la marque" id="password" name="fMarque"
                value="">
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <input class="btn btn-primary" type="submit" value="Submit" />

            <div class="d-flex">
                <h6>Not a member ?</h6>
                <a href="/register"> Register</a>
            </div>
        </div>

    </form>

</div>

<?php
$js = '';
$content = ob_get_clean();
require(dirname(__DIR__)  . DIRECTORY_SEPARATOR . "layout" . DIRECTORY_SEPARATOR . "layout.php");