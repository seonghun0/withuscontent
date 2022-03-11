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
            margin: 2px;
            float:right;
            text-align: center;
            width: 100%;
        }
        input{
            outline: none;
            border: none;
            text-align: center;
        }
        textarea{
            resize: none;
        }
        #area2{
            margin: 0 auto;
            text-align: center;
        }
        #welcome{
            text-align: center;
        }
        .area{
            border: 1px solid black;
        }
        p{
            margin: 0 auto;
        }
        #replyarea{
            margin: 0px 100px auto;
        }
        .replytext{
            text-align: left;
        }
        .replybtn{
            float: right;
            position: relative;
            bottom: 50px;
        }
        .on{
            border: 0.5 solid black;
            outline: auto;
        }
    </style>
    <body>
    <h1>게시판 목록</h1>
    <?php
        session_start();
   ?>
   <p id="welcome"><?php echo $_SESSION['userid'];?>님 환영합니다.</p>
    <table class="table">
        <tr>
            <th>글번호</th>
            <th><input type="text" id="board_no" value="<?=$data->board_no?>" id="num" readonly></th>
        </tr>
        <tr>
            <th>글제목</th>
            <th><input type="text" value="<?=$data->board_name?>"readonly></th>
            <th>조회수</th>
            <th><input type="text"  value="<?=$data->readcount?>"readonly></th>
        </tr>
        <tr>
            <th>작성자</th>
            <th><input type="text" id="writer" value="<?=$data->board_writer?>"readonly></th>
            <th>작성일자</th>
            <th><input type="text" id="reg_date" value="<?=$data->reg_date?>"readonly></th>
        </tr>
        <tr>
            <th>내용</th>
            <th colspan="3"><input type="text" value="<?=$data->content?>"readonly></th>
        </tr>
    </table>
    <div id="button">
        <button id="edit">수정하기</button>
        <button id="delete">삭제하기</button>
        <button id="viewlist">목록보기</button>
    </div>
    <div id ="area2">
        <textarea name="reply" id="reply" cols="60" rows="3"></textarea>
        <button class="replywrite">작성하기</button>
    </div>
    <div id="replyarea">
        <?php if($reply != null){
            foreach ($reply as $reply){
        ?>
        <div class="area">
        <p><input type="text" class="replytext review" value="<?=$reply->review?>" readonly></p>
        <p><input type="text" class="replytext reviewid" value="<?=$reply->member_id ?>" readonly></p>
        <p><input type="text" class="replytext reviewdate" value="<?=$reply->reg_date ?>" readonly></p>
        <button class="replybtn editbtn">수정</button>
        <button class="replybtn deletebtn">삭제</button>
        </div>
        <?php
        }}
        ?>
    </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            var no = "<?=$data->board_no?>";
            var writer = '<?php echo $_SESSION['userid']; ?>';

            $('#delete').click(function(){
                var result = confirm("삭제하시겠습니까?");

                if(result){
                    location.href = "/index.php/board/delete/"+no;
                }
                
            })

            $('#edit').click(function(){
                location.href = "/index.php/board/edit/"+ no;
            })
            $('#viewlist').click(function(){
                location.href = "/index.php/board/list"
            })

            $('.replywrite').click(function(){

                var reply = $('#reply').val();
                console.log(no, writer, reply);

                $.ajax({
                    type:'post',
                    url:'/index.php/board/reply_ok',
                    data:{ no : no, writer: writer, reply :reply}
                })
                .done(function(data){
                    var res = $.parseJSON(data);
                    var review = res.review;
                    var member_id = res.member_id;

                    var html = "<div class='area'><p id='review'>"+ review +"</p><p id='reviewid'>"+member_id+"</p>";
                        html += "<p id='reviewdate'>"+res.reg_date+"</p><button class='replybtn editbtn'>수정</button><button class='replybtn deletebtn'>삭제</button></div>"
                    $('#replyarea').append(html);
                    
                    $('#reply').val('');
                })
                .fail(function(err, xhr, status){
                    console.log(status);
                })
            })
            $('.editbtn').click(function(){
                if($(this).hasClass('on') == false){
                    $(this).addClass('on');
                    $(this).closest('div').find('.review').attr('readonly', false).addClass('on');
                }else{
                    $(this).removeClass('on');
                    $(this).closest('div').find('.review').attr('readonly', true).removeClass('on')
                    $(this).closest('div').find('.reviewid').attr('readonly', true).removeClass('on');
                    $(this).closest('div').find('.reviewdate').attr('readonly', true).removeClass('on');

                    var review = $(this).closest('div').find('.review').val();
                    var reviewid = $(this).closest('div').find('.reviewid').val();
                    var date = $(this).closest('div').find('.reviewdate').val();

                    $.ajax({
                        type:'POST',
                        url:'/index.php/board/reply_edit',
                        data:{ no : no, review : review, reviewid:reviewid, date:date}
                    })
                    .done(function(data){
                        location.reload();
                        alert('변경되었습니다.');
                    })
                    .fail(function(err, xhr, status){
                        console.log(status);
                    })
                }
            })
            $('.deletebtn').click(function(){
                var review = $(this).closest('div').find('.review').val();
                var reviewid = $(this).closest('div').find('.reviewid').val();
                var date = $(this).closest('div').find('.reviewdate').val();

                var result = confirm('삭제하시겠습니까?')

                if(result){
                    $.ajax({
                        type:'post',
                        url:'/index.php/board/reply_delete',
                        data:{ no : no, review : review, reviewid:reviewid, date:date}
                    })
                    .done(function(data){
                        location.reload();
                        alert('삭제되었습니다.');
                    })
                    .fail(function(err, xhr, status){
                        console.log(status);
                    })
                }
            })
        })
        
    </script>
</html>