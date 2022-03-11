<?php 

include $_SERVER['DOCUMENT_ROOT']."/board/db.php";
session_start();
//각 변수에 write.php 에서 input name 값들을 저장한다.

// $writer = $_POST['writer'];
$writer = $_SESSION['userId'];
$title = $_POST['name'];
$contents = $_POST['writetext'];

if($writer && $title && $contents){
    $sql = query("insert into board(board_name, board_writer, content) values('$title','$writer','$contents')");
    echo "<script>
    alert('글쓰기 완료되었습니다.');
    location.href='/board/index.php';</script>";
}else{
    echo "<script>
    alert('글쓰기 실패하였습니다.');
    history.back();</script>";
}
?>