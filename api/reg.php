<?php
include('./base.php');
$user = $User->find(['acc'=>$_POST['acc']]);

if(empty($user)){

    $User->save(['acc'=>$_POST['acc'],'pw'=>$_POST['pw'],'email'=>$_POST['email']]);
    echo $res = 1;
    
}else{
    
    echo $res = 0;
    
}


?>