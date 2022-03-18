<?php
$connect_error='sorry, we are experiencing connection prolems';
$link=mysqli_connect("localhost","root","","lr") or die($connect_error);
mysqli_close($link);
?>