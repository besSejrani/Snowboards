<?php
require_once(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php");
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "db.php");
?>
<hr>

<?php
$snowboard = $_POST;
foreach ($snowboard as $info) {
  echo $info;
}

?>
<pre>
  <?php dump($_POST) ?>
</pre>
<?php
// header('Location: http://localhost:3000/');
// exit;
?>