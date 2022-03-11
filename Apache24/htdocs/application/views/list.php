<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8"/>
        <title>게시판</title>
    </head>
    <style type="text/css">
        h1{
            text-align: center;
        }
        table{
            border: 1px solid black;
            margin: 0 auto;
        }
        tr{
            border: 1px solid black;
        }
        #button{
            float:right;
            width: 100%;
        }
        #welcome{
            float: right;
            margin: 0 auto;
        }
        #button button{
            float: right;
        }
       
    </style>
    <body>
    <h1>게시판 목록</h1>
    <?php session_start();?>
    
    <div id="button">
        <button id="back">뒤로가기</button>
        <button id="write">글쓰기</button>
        <p id="welcome"><?php echo $_SESSION['userid'];?>님 환엽합니다.</p>
    </div>
    <div>
    <table>
        <thead>
        <tr>
            <th>글번호</th>
            <th>글제목</th>
            <th>작성자</th>
            <th>작성일자</th>
        </tr>
        </thead>
            <?php
                foreach ( $lists as $lists){
            ?>
        <tr>
            <td><?=$lists->board_no?></td>
            <td><a href="read/<?=$lists->board_no?>"><?=$lists->board_name?></a></td>
            <td><?=$lists->board_writer?></td>
            <td><?=$lists->reg_date?></td>
        </tr>
            <?php  
                }
            ?>
    </table>
    </div>
    
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#back').click(function(){
            location.href="/index.php/board"
        })
        $('#write').click(function(){
            location.href="write";
        })
    </script>
</html>