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
            <h1>로그인</h1>
            <form action="/member/login_ok" method="post" id="loginform">
            <p>아이디 : <input type="text" name="userid" id="userid"></p>
            <p>비밀번호 : <input type="text" name="password" id="password"></p>
            </form>
        </div>
        <div class="button">
            <button id="login" >로그인</button>
            <button id="regist">회원가입</button>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#login').click(function(){
            $('#loginform').submit();
        })

        $('#regist').click(function(){
            location.href="/member/regist"
        })
    </script>
</html>
