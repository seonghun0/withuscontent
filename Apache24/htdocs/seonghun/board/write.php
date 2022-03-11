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
    .name{
        width: 96%;
    }
</style>
<body>
    <div id="board">
        <h1>게시판 글쓰기</h1>
        <form action="write_ok.php" method="post">
        <table id="table">
                <tr>
                    <th>제목</th>
                    <td><input type="text" class ="name" name="name"></td>
                </tr>
                <!-- <tr>
                    <th>작성자</th>
                    <td><input type="text" class ="name" name="writer"></td>
                </tr> -->
                <tr>
                    <th>내용</th>
                    <td><textarea name="writetext" id="write" cols="30" rows="10"></textarea></td>
                </tr>
        </table>
        <div>
            <button type="submit" id="writebtn">글쓰기</button>
        </div>
        </form>
    </div>
</body>
</html>
