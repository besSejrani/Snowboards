<?php
ob_start();
$title = "Snowboards | Register";
?>

<div class="d-flex justify-content-center align-items-center vh-100">
    <form class="form container " method="POST" action="/register">

        <div class=" form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>

        <div class=" form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
        </div>

        <input class="btn btn-primary" type="submit" value="Submit" />

    </form>
</div>

<?php
$js = '';
$content = ob_get_clean();
require dirname(__DIR__) . DIRECTORY_SEPARATOR . "layout" . DIRECTORY_SEPARATOR . "layout.php";