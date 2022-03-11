<?php
    include $_SERVER['DOCUMENT_ROOT']."/board/db.php";

    $no = $_POST['no'];
    $review = $_POST['review'];
    $userid = $_POST['userid'];

    if($review == ""){
        echo "1";
    }else{
        query("insert into review (board_idx, member_id, review) values('$no','$userid','$review')");
        $sql = query("select * from review where board_idx = '$no' order by reg_date desc");
        $data = mysqli_fetch_array($sql);
        echo json_encode($data);
    }

?>