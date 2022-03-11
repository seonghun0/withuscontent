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
        <form action="reg_ok.php" method="post" id="reg">
        <table id="table">
                <tr>
                    <th width=150px>아이디</th>
                    <th><input type="text" name="userid"></th>
                </tr>
                <tr>
                    <td>비밀번호</td>
                    <td><input type="text" name="password"></td>
                </tr>
                <tr>
                    <td>비밀번호 확인</td>
                    <td><input type="text" name="passwordconfirm"></td>
                </tr>
                <tr>
                    <td>이메일</td>
                    <td><input type="text" name="email"></td>
                </tr>
        </table>
        <div>
            <input type="submit" id="loginbtn" value="가입하기">
            <input type="button" id="backbtn" value="뒤로가기">
        </div>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#backbtn').on('click',function(){
        history.back();
    })
</script>
</html>
