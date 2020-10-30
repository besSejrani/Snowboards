<?php

//use Redis;

//Redis
/*
$redis2 = new Redis();
$redis2->connect('redis');
$redis2->set('foo', 'besMasta');
*/

ob_start();
$title = "Snowboards | 404";
?>

<div class="vh-100 d-flex justify-content-center align-items-center">
    <h1>Sorry, 404 Error</h1>
</div>


<?php

echo $redis2->get('foo') . PHP_EOL;
$js = '';
$content = ob_get_clean();
require(dirname(__DIR__) . "/layout/layout.php");