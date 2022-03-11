<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8"/>
    </head>
    <style>
        .table{
            position: relative;
            margin: 100px 100px auto;
            text-align: center;
        }
        .button{
            margin: 0 100px auto;
            text-align: center;
        }
    </style>
    <body>
        <div class="table">
            <h1>회원가입</h1>
            <form action="regist_ok" method="post" id="registform">
            <p>아 이 디 : <input type="text" name="userid" id="userid"></p>
            <p>비밀번호 : <input type="text" name="password" id="password"></p>
            <p>비밀번호확인 : <input type="text" name="passwordconfirm" id="passwordconfirm"></p>
            <p>이 메 일 : <input type="text" name="email" id="email"></p>
            </form>
        </div>
        <div class="button">
            <button id="regist">가입하기</button>
            <button id="back">돌아가기</button>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        $('#passwordconfirm').blur(function(){
            var userid = $('#userid').val();
            var pw = $('#password').val();
            var pwc = $('#passwordconfirm').val();
            var email = $('#email').val();
            
            if( pw != pwc){
                alert('비밀번호는 같아야 합니다.');
                return
            }
        })
        $('#regist').click(function(){
            var userid = $('#userid').val();
            var pw = $('#password').val();
            var pwc = $('#passwordconfirm').val();
            var email = $('#email').val();

            if( userid == ""){
                alert('아이디를 입력해주세요');
                return
            }
            if( pw == ""){
                alert('비밀번호를 입력해주세요')
                return
            }
            if( pw != pwc){
                alert('비밀번호는 같아야 합니다.');
                return
            }
            if(email == ""){
                alert('email을 입력해주세요');
                return
            }

            $('#registform').submit();
        })

        $('#back').click(function(){
           history.back();
        })
    </script>
</html>
