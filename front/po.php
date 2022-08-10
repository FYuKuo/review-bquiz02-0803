<p>目前位置：首頁 ＞ 分類網誌 ＞ <span class="title">健康新知</span></p>

<div style="display: flex; width:90%" class="m-auto">
    <fieldset style="width: 15%;">
        <legend>分類網誌</legend>
        <p onclick="showTitle(this)" class="showTitle">健康新知</p>
        <p onclick="showTitle(this)" class="showTitle">菸害防治</p>
        <p onclick="showTitle(this)" class="showTitle">癌症防治</p>
        <p onclick="showTitle(this)" class="showTitle">慢性病防治</p>
    </fieldset>
    <fieldset class="newList" style="width: 75%;">
        <legend>文章列表</legend>

        
    </fieldset>

</div>

<script>
        $.get('./api/show_title.php',{type:'健康新知'},(res)=>{
            res = JSON.parse(res);

            let pText = '';
            res.forEach(element => {
                pText = pText + `<p>${element.title}</p>`
            });

            $('.newList').append(pText)

        })
    function showTitle(e){

        let type = $(e).text();

        $('.title').text(type);

        $('.newList').children('p').remove();

        $.get('./api/show_title.php',{type},(res)=>{
            res = JSON.parse(res);

            let pText = '';
            res.forEach(element => {
                pText = pText + `<p>${element.title}</p>`
            });

            $('.newList').append(pText)

        })

    }

</script>