<?php
include('./base.php');

if(!empty($_POST['name'])){


    $Que->save(['name'=>$_POST['name'],'parent'=>0,'sum'=>0]);
    
    $que = $Que->find(['name'=>$_POST['name']]);
    
    foreach ($_POST['opts'] as $key => $opt) {
    
        $Que->save(['name'=>$opt,'parent'=>$que['id'],'sum'=>0]);
    
    }


}
?>