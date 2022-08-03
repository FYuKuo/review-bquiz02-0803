<?php
include('./base.php');
$res = $User->math('COUNT','id',['acc'=>$_GET['acc']]);

echo $res;
?>