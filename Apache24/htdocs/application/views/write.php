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
        .table{
            border: 3px ridge;
            margin: 0 auto;
        }
        #button{
            float:right;
            text-align: center;
            width: 50%;
        }
        #button button{
            float: left;
        }
        textarea{
            resize: none;
        }
        .name{
            width: 98%;
        }
        input[name=writer]{
            outline: none;
            border: none;
        }
    </style>
    <body>
    <h1>게시판 목록</h1>
    <?php session_start(); ?>
    <form action="write_ok" method="POST" id="writeform">
    <table class="table">
        <tr>
            <th>글제목</th>
            <th><input type="text" value="" class="name" name="name"></th>
        </tr>
        <tr>
            <th>작성자</th>
            <th><input type="text" value="<?php echo $_SESSION['userid']; ?>" class="name" name="writer" readonly></th>
        </tr>
        <tr>
            <th>내용</th>
            <th><textarea name="content" id="content" cols="60" rows="3"></textarea></th>
        </tr>
    </table>
    </form>
    <div id="button">
        <button id="write">작성하기</button>
        <button id="back">뒤로가기</button>
    </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        $('#write').click(function(){
            $('#writeform').submit();
        })

        $('#back').click(function(){
            history.back();
        })
    </script>
</html>