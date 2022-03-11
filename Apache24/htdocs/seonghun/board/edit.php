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
    <?php
        $no = $_GET['board_no'];
        $sql = query("select * from board where board_no = '$no'");
        $board = $sql->fetch_array();
    ?>
<body>
    <div id="board">
        <h1>게시판 글쓰기</h1>
        <form action="edit_ok.php" method="post">
        <table id="table">
                <tr>
                    <th>제목</th>
                    <td><input type="text" class ="name" name="name" value="<?php echo $board['board_name']?>"></td>
                </tr>
                <tr>
                    <th>작성자</th>
                    <td><input type="text" class ="name" name="writer" value="<?php echo $board['board_writer']?>"></td>
                </tr>
                <tr>
                    <th>내용</th>
                    <td><textarea name="writetext" id="write" cols="30" rows="10"><?php echo $board['content']?></textarea></td>
                </tr>
        </table>
        <div>
            <input type="hidden" name="no" value="<?php echo $board['board_no']?>">
            <button type="submit" id="writebtn">수정하기</button>
        </div>
        </form>
    </div>
</body>
</html>
