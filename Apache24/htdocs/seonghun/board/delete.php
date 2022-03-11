<?php 

include $_SERVER['DOCUMENT_ROOT']."/board/db.php";

//각 변수에 write.php 에서 input name 값들을 저장한다.

$no = $_GET['board_no'];

if($no){
    $sql = query("delete from board where board_no = '$no'");
    echo "<script>
    alert('삭제되었습니다.');
    location.href='/board/index.php';</script>";
}else{
    echo "<script>
    alert('삭제되지 않았습니다.');
    history.back();</script>";
}
?>