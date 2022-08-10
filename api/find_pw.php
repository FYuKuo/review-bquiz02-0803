<?php
include('./base.php');
$res = $User->math('COUNT','id',['email'=>$_GET['email']]);

if($res == 1){

    echo $res = $User->find(['email'=>$_GET['email']])['pw'];
    
}else{
    
    echo $res;
    
}


?>