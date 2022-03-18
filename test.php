<?php 
$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
$dt = $dt->format('d-m-Y, g:i:s');

echo $date = date('m-d-Y h:i:s', time());


?>