<?php $title = "Add Snowboard" ?>

<div class="d-flex justify-content-center align-items-center vh-100">
    <form class="form container " method=" POST" action="snow_add_data.php">
        <div class=" form-group">
            <label for="code">Snow Code</label>
            <input type="text" class="form-control" placeholder="Entrez le code de votre snow" id="code" name="fID"
                value="">
        </div>
        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" class="form-control" placeholder="Entrez la marque" id="brand" name="fMarque" value="">
        </div>
        <div class="form-group">
            <label for="boots">Boots</label>
            <input type="text" class="form-control" placeholder="Entrez les boots compatibles" id="boots" name="fBoots"
                value="">
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" class="form-control" placeholder="Entrez le type de snow" id="type" name="fType"
                value="">
        </div>

        <div class="form-group">
            <label for="available">Available</label>
            <input type="integer" class="form-control" placeholder="Entrez la disponibilité en magasin" id="available"
                name="fDispo" value="10">
        </div>

        <input class="btn btn-primary" type="submit" value="Ajouter" />
        <input type="reset" class="btn" value="Effacer" />
    </form>
</div>