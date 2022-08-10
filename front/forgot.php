<fieldset style="width: 60%;" class="m-auto">
    <legend>會員註冊</legend>
    <table class="m-auto" style="width: 100%;">
        <tr>
            <td>
                請輸入信箱以查詢密碼
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="email" id="email" class="w-90">
            </td>
        </tr>
        <tr>
            <td class="addText">
                
            </td>
        </tr>
        <tr>
            <td>
                <input type="button" value="尋找" onclick="findPw()">
            </td>
        </tr>
    </table>
</fieldset>

<script>

    function findPw(){
        let email = $('#email').val();


        $.get('./api/find_pw.php',{email},(res)=>{

            // console.log(parseInt(res));
            if(parseInt(res) == 0){
                $('.addText').html(`查無此資料`);
                $('#email').val("");

            }else{

                $('.addText').html(`您的密碼為:${res}`);
                
                $('#email').val("");

            }
        })
    }


</script>