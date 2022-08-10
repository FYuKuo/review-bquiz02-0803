<fieldset>
<legend>新增問卷</legend>
<div class="tr">
    <div class="td clo" style="width: 20%;">問卷名稱</div>
    <div class="td"><input type="text" name="name" id="name"></div>
</div>
<div class="trSec clo" style=" margin:5px 0">
    <div class="td">選項<input type="text" name="opts[]" class="opts"><input type="button" value="更多" onclick="addTd()"></div>
</div>
<div class="tr ct m-auto">
    <input type="button" value="新增" onclick="addQue()">
    <input type="button" value="清空" onclick="reset()">
</div>


</fieldset>

<script>
    function addTd(){
        $('.trSec').append(`<div class="td">選項<input type="text" name="opts[]" class="opts"></div>`)
    }

    function addQue(){
        let name = $('#name').val();
        let opts = new Array();


        $('.opts').each((key,value)=>{
            opts.push($(value).val());
        })

        $.post('./api/add_que.php',{name,opts},()=>{
            location.reload();
        })
    }

    function reset(){
        $('input[type=text]').val("");
    }

</script>