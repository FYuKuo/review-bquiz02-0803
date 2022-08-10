<fieldset style="width: 90%;" class="m-auto">
    <legend>帳號管理</legend>
    <table style="width: 80%" class="m-auto ct">
        <tr>
            <th class="clo">帳號</th>
            <th class="clo">密碼</th>
            <th class="clo">刪除</th>
        </tr>

        <?php
        $rows = $User->all();
        foreach ($rows as $key => $row) {

            if($row['acc'] != 'admin'){
        ?>
        <tr>
            <td><?=$row['acc']?></td>
            <td><?=str_repeat('*',strlen($row['pw']))?></td>
            <td><input type="checkbox" name="del[]" class="del" value="<?=$row['id']?>"></td>
            <input type="hidden" name="id[]" class="id" value="<?=$row['id']?>">
        </tr>
        <?php
            }
        }
        ?>
        <tr>
            <td colspan="3">
                <input type="button" value="確定刪除" onclick="deluser()">
                <input type="button" value="清空選取" onclick="delreset()">
            </td>
        </tr>
    </table>




    <h2>新增會員</h2>
    <table>
        <tr>
            <td style="color: red;" colspan="2">
                ＊請設定您要的註冊的帳號及密碼（最長12個字元）
            </td>
        </tr>
        <tr>
            <td class="clo" style="width: 50%;">
                Step1:登入帳號
            </td>
            <td>
                <input type="text" name="acc" id="acc" class="w-90">
            </td>
        </tr>
        <tr>
            <td class="clo">
                Step2:登入密碼
            </td>
            <td>
                <input type="password" name="pw" id="pw" class="w-90">
            </td>
        </tr>
        <tr>
            <td class="clo">
                Step3:再次確認密碼
            </td>
            <td>
                <input type="password" name="pwch" id="pwch" class="w-90">
            </td>
        </tr>
        <tr>
            <td class="clo" style="width: 50%;">
                Step4:信箱(忘記密碼時使用)
            </td>
            <td>
                <input type="text" name="email" id="email" class="w-90">
            </td>
        </tr>
        <tr>
            <td>
                <input type="button" value="註冊" onclick="reg()">
                <input type="button" value="清除" onclick="reset()">
            </td>
        </tr>
    </table>
</fieldset>

<script>
    function reset(){
		$('#acc').val("");
		$('#pw').val("");
		$('#pwch').val("");
		$('#email').val("");
	}

    function reg(){
        let acc = $('#acc').val();
		let pw = $('#pw').val();
		let pwch = $('#pwch').val();
		let email = $('#email').val();

        // console.log('123');

        if(acc == '' || pw == '' || pwch == '' || email ==''){

            alert('不可為空');

        }else if (pw != pwch){

            alert('密碼錯誤');

        }else{

            $.post('./api/reg.php',{acc,pw,email},(res)=>{
                
                if(parseInt(res) == 1){
                    location.reload();

                }else{
                    alert('帳號重複');
                }

            })
        }

    }

    function deluser(){
        let del = new Array();


        $('.del:checked').each((key,value)=>{
            del.push($(value).val());
        })



        $.post('api/del_user.php',{del},()=>{
            location.reload();
        })
    }

    function delreset(){
        $('.del:checked').each((key,value)=>{
           $(value).prop('checked',false);
        })
    }
</script>