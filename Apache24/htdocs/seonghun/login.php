<?php 

    include $_SERVER['DOCUMENT_ROOT']."/board/db.php";
    
    $id = $_POST['userid'];
    $pw = $_POST['password'];

    $sql = query("select * from member where member_id = $id");
    $member = $sql -> fetch_array();

    $pwResult = password_verify($pw, $member['password']);

    if(password_verify($pw, $member['password'])){

        session_start();
        $_SESSION['userId'] = $id;

        echo "<script>
        alert('반갑습니다');
        location.href='/board/index.php';</script>";
    }else{
        echo"<script>
        alert('아이디 또는 비밀번호가 틀렸습니다.');
        history.back();</script>";
    }
    
?>