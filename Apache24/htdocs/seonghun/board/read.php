<?php include $_SERVER['DOCUMENT_ROOT']."/board/db.php";?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>게시판</title>
</head>
<style type="text/css">
    #table{
        border: 5;
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
    #reviewtable{
        border:1;
    }
</style>
<body>

    <?php
        $no = $_GET['board_no'];
        $readcount = mysqli_fetch_array(query("select * from board where board_no = '$no'"));
        $readcount = $readcount['readcount']+1;
        $fet = query("update board set readcount = '$readcount' where board_no='$no'");
        $sql = query("select * from board where board_no = '$no'");
        $board = $sql->fetch_array();
    ?>
    <div id="board">
        <h1>게시판 글 읽기</h1>
        <table id="table">
                <tr>
                    <th>제목</th>
                    <td><?php echo $board['board_name'];?></td>
                </tr>
                <tr>
                    <th>작성자</th>
                    <td><?php echo $board['board_writer'];?></td>
                    <th>조회수</th>
                    <td><?php echo $board['readcount'];?></td>
                </tr>
                <tr>
                    <th>작성시간</th>
                    <td colspan="3"><?php echo $board['reg_date'];?></td>
                </tr>
                <tr>
                    <th>내용</th>
                    <td colspan="3"><?php echo $board['content'];?></td>
                </tr>
        </table>
        <div>
            <?php
            session_start();
                if($_SESSION['userId'] == $board['board_writer']){
            ?>
              
            <button id="editbtn">수정하기</button>
            <button id="deletebtn">삭제하기</button>
            <?php
                }
            ?>
            <button id="back">뒤로가기</button>
        </div>
    </div>
    <div id="review">
        <textarea name="review" class="review" cols="30" rows="3"></textarea>
        <INPUT type="button" id="reviewbtn" value="댓글쓰기"></INPUT>
    </div>
    <div>
        <table id="reviewtable">
                <tr>
                    <th>내용</th>
                    <th>작성자 </th>
                    <th>작성일자</th>
                </tr>
                <?php
                    $sql = query("select * from review where board_idx = '$no'");
                    while($review=$sql->fetch_array()){
                ?>
                    <tr>
                        <td><?php echo $review['review']?></td>
                        <td><?php echo $review['member_id']?></td>
                        <td><?php echo $review['reg_date']?></td>
                    </tr>
                <?php
                    }
                ?>
        </table>
    </div>
    <input type="hidden" id="no" value=<?php echo $board['board_no']?>>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var no = $('#no').val();
    var userid = <?php echo $_SESSION['userId']?>;

    $('#editbtn').click(function(){
        location.href = "edit.php?board_no="+ no;
    })

    $('#deletebtn').click(function(){
        var result = confirm("삭제하시겠습니까?");
        if(result){
            location.href = "delete.php?board_no="+no;
        }
    })
    $('#back').click(function(){
        history.back();
    })
    $('#reviewbtn').click(function(){
        var review = $('.review').val();
        $.ajax({
            type:'post',
            url:"review_ok.php",
            data:{review : review, userid : userid, no : no}
        })
        .done(function(data){
            if(data =="1"){
                alert("댓글을 달아주세요.");
            }else{
                var res = $.parseJSON(data);
                $.each(res, function(i, item){
                    var html = '<tr><td>'+res.review+'</td><td>'+res.member_id+'</td><td>'+res.reg_date+'</td></tr>'
                    $('#reviewtable').append(html);
                    $('.review').val('');
                    return false;
                })
            }
            
            
        })
            
    })
</script>
</html>
