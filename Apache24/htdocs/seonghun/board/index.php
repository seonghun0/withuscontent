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
    #logout{
        float: right;
    }
    h6{
        width: 100px;
    }
</style>
<body>
    <div id="board">
        <h1>게시판</h1>
        <?php
        session_start();
        ?>
        <div>
        <h6><?php echo $_SESSION['userId']; ?>님 반갑습니다</h6>
        <input type="button" value="로그아웃" id="logout">
        </div>
        <table id="table">
            <thead>
                <tr>
                    <th width=100px>번호</th>
                    <th>제목</th>
                    <th>글쓴이</th>
                    <th>작성일</th>
                    <th>조회수</th>
                </tr>
            </thead>
            <?php
                $sql = query("select * from board order by board_no desc");
                while($board = $sql->fetch_array())
                {
            ?>
            <tbody>
                <tr>
                    <td><?php echo $board['board_no'];?></td>
                    <td><a href="read.php?board_no=<?php echo $board['board_no'];?>"><?php echo $board['board_name'];?></a></td>
                    <td><?php echo $board['board_writer'];?></td>
                    <td><?php echo $board['reg_date'];?></td>
                    <td><?php echo $board['readcount'];?></td>
                </tr>
            </tbody>
            <?php
                }
            ?>
        </table>
        <div>
            <input type="button" class="writebtn" value="글쓰기">
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('.writebtn').on('click',function(){
        location.href="write.php";
    })
    $('#logout').click(function(){
        location.href="/logout.php";
    })
</script>
</html>
