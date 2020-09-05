<?php $title = "Register" ?>

<div class="d-flex justify-content-center align-items-center vh-100">
    <form class="form container " method=" POST" action="snow_add_data.php">

        <div class=" form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" placeholder="Entrez le code de votre snow" id="username" name="fID"
                value="">
        </div>

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

        <input class="btn btn-primary" type="submit" value="Submit" />

    </form>
</div>