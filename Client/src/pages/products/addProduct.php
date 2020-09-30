<?php
ob_start();
$title = "Snowboards | Add Snowboard";
?>

<div class="d-flex justify-content-center align-items-center vh-100">
    <form class="form container " method="POST" action="addSnowActions">

        <!--    <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="validatedCustomFile">
            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
            <div class="invalid-feedback">Example invalid custom file feedback</div>
        </div> -->

        <div class=" form-group">
            <label for="coupon">Snow coupon</label>
            <input type="text" class="form-control" id="coupon" name="coupon">
        </div>
        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" class="form-control" id="brand" name="brand">
        </div>
        <div class="form-group">
            <label for="boots">Boots</label>
            <input type="text" class="form-control" id="boots" name="boots">
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" class="form-control" id="type" name="type">
        </div>

        <div class="form-group">
            <label for="available">Available Stock</label>
            <input type="number" class="form-control" id="available" name="available" value="10">
        </div>

        <input class="btn btn-primary" type="submit" value="Ajouter" />
        <input type="reset" class="btn" value="Effacer" />
    </form>
</div>

<?php
$js = '';
$content = ob_get_clean();
require(dirname(__DIR__, 2)  . DIRECTORY_SEPARATOR . "layout" . DIRECTORY_SEPARATOR . "layout.php");