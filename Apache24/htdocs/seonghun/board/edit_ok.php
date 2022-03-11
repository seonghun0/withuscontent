<?php 

include $_SERVER['DOCUMENT_ROOT']."/board/db.php";

//각 변수에 write.php 에서 input name 값들을 저장한다.

$writer = $_POST['writer'];
$title = $_POST['name'];
$contents = $_POST['writetext'];
$no = $_POST['no'];

if($writer && $title && $contents && $no){
    $sql = query("update board set board_name='$title', board_writer='$writer', content='$contents' where board_no = '$no'");
    echo "<script>
    alert('수정 완료되었습니다.');
    location.href='/board/read.php?board_no=$no';</script>";
}else{
    echo "<script>
    alert('수정 실패하였습니다.');
    history.back();</script>";
}
?>