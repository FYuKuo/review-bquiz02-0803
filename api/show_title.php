<?php
include('./base.php');

switch ($_GET['type']) {
    case 'value':
        break;
    
        case '健康新知' :
        $type = 1;
        break;
            
        case '菸害防治' :
        $type = 2;
        break;
            
        case '癌症防治' :
        $type = 3;
        break;
            
        case '慢性病防治' :
        $type = 4;
        break;
            
}

$res = $News->all(['sh'=>1,'type'=>$type]);

echo json_encode($res);
?>