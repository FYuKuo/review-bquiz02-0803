<?php
include('./base.php');
$res = $User->math('COUNT','id',['acc'=>$_GET['acc'],'pw'=>$_GET['pw']]);

if($res == 1) {
    $_SESSION['user'] = $_GET['acc'];
}

echo $res;
?>