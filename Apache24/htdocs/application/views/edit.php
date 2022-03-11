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
        input{
            width: 98%;
            text-align: center;
        }
    </style>
    <body>
    <h1>게시판 보기</h1>
    <form action="/index.php/board/edit_ok" method="POST" id="editform">
    <table class="table">
        <tr>
            <th>글제목</th>
            <th><input type="text" value="<?=$data->board_name?>" class="name" name="name"></th>
        </tr>
        <tr>
            <th>작성자</th>
            <th><input type="text" value="<?=$data->board_writer?>" class="name" name="writer"></th>
        </tr>
        <tr>
            <th>내용</th>
            <th><textarea name="content" id="content" cols="60" rows="3"><?=$data->content?></textarea></th>
        </tr>
    </table>
        <input type="hidden" name="no" value='<?=$data->board_no?>'>
    </form>
    <div id="button">
        <button id="editbtn">수정하기</button>
        <button id="back">뒤로가기</button>
    </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        $('#editbtn').click(function(){
            $('#editform').submit();
        })

        $('#back').click(function(){
            history.back();
        })
    </script>
</html>