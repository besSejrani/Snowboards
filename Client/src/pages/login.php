<?php
ob_start();
$title = "Snowboards | Login";
?>

<div class="d-flex flex-column justify-content-center align-items-center vh-100">
    <form class="form container " method="POST" action="/login">

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <input class="btn btn-primary" type="submit" value="Submit" />

            <div class="d-flex">
                <h6>Not a member ? </h6>
                <a href="/register"> Register</a>
            </div>
        </div>

    </form>

</div>

<?php
$js = '';
$content = ob_get_clean();
require(dirname(__DIR__)  . DIRECTORY_SEPARATOR . "layout" . DIRECTORY_SEPARATOR . "layout.php");