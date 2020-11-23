<?php

$redis2 = new Redis();
$redis2->connect('redis');
//$redis2->set('foo', 'hallo');

$title = "Snowboards | Contact";
?>

<div class="vh-100 d-flex justify-content-center align-items-center">
    <h1>Contact</h1>
</div>


<?php
echo $redis2->get('foo');
?>
<?php

$js = '';