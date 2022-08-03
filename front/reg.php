<fieldset style="width: 60%;" class="m-auto">
    <legend>會員註冊</legend>
    <table class="m-auto">
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
        
    }
</script>