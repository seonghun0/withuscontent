<?php include $_SERVER['DOCUMENT_ROOT']."/board/db.php";?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>게시판</title>
</head>
<style type="text/css">
    #table{
        border: 5px;
        outline: auto;
    }
    td
    {
        text-align: center;
    }
    #board{
        margin: 0 auto;
    }
</style>
<body>
    <div id="board">
        <h1>게시판</h1>
        <form action="login.php" method="post" id="login">
        <table id="table">
                <tr>
                    <th width=100px>아이디</th>
                    <th><input type="text" name="userid"></th>
                </tr>
                <tr>
                    <td>비밀번호</td>
                    <td><input type="text" name="password"></td>
                </tr>
        </table>
        <div>
            <input type="submit" id="loginbtn" value="로그인">
            <input type="button" class="regbtn" value="회원가입">
        </div>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('.regbtn').on('click',function(){
        location.href="reg.php";
    })
</script>
</html>
