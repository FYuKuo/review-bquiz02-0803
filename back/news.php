<fieldset>
<legend>最新文章管理</legend>
<table class="ct" style="width: 100%;">
<tr>
    <th style="width: 6%;">編號</th>
    <th>標題</th>
    <th style="width: 6%;">顯示</th>
    <th style="width: 6%;">刪除</th>
</tr>

<?php
$num = $News->math('COUNT','id');
$limit = 3;
$pages = ceil($num/$limit);
$page = ($_GET['page'])??1;
if($page <= 0 || $page > $pages){
    $page = 1;
}
$start = ($page-1) * $limit;
$limitSql = " LIMIT $start,$limit";
$rows = $News->all($limitSql);
$i = 0;
foreach ($rows as $key => $row) {
    $i ++;
?>
<tr>
    <td class="clo"><?=($start+$i)?></td>
    <td><?=$row['title']?></td>
    <td><input type="checkbox" name="sh[]" class="sh" value="<?=$row['id']?>" <?=($row['sh'] == 1)?'checked':''?>></td>
    <td><input type="checkbox" name="del[]" class="del" value="<?=$row['id']?>"></td>
    <input type="hidden" name="id[]" value="<?=$row['id']?>" class="id">
</tr>
<?php
}
?>
<tr class="page">
    <td colspan="4">
    <?php
    if($page > 1){
    ?>
    <a href="?do=news&page=<?=$page-1?>">&lt;</a>
    <?php
    }
    for ($i=1 ; $i <= $pages ; $i++) {
    ?>
    <a href="?do=news&page=<?=$i?>" class="<?=($page == $i)?'nowPage':''?>"><?=$i?></a>
    <?php
    }
    if($page < $pages){
    ?>
    <a href="?do=news&page=<?=$page+1?>">&gt;</a>
    <?php
    }
    ?>
    </td>
</tr>
<td colspan="4">
    <input type="button" value="確定修改" onclick="news_edit()">
</td>
</table>


</fieldset>

<script>
 
    function news_edit(){
        let del = new Array();
        let sh = new Array();
        let id = new Array();


        $('.sh:checked').each((key,value)=>{
            sh.push($(value).val());
        })
        $('.del:checked').each((key,value)=>{
            del.push($(value).val());
        })
        $('.id').each((key,value)=>{
            id.push($(value).val());
        })

        console.log('sh',sh);
        console.log('del',del);
        console.log('id',id);
        $.post('./api/news_edit.php',{id,del,sh},()=>{
            location.reload();
        })
    }
</script>