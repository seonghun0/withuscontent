<?php 

    include $_SERVER['DOCUMENT_ROOT']."/board/db.php";
    
    $id = $_POST['userid'];
    $email = $_POST['email'];
    // $pw = $_POST['password'];
    $hashedPassword = password_hash($_POST['password'],PASSWORD_DEFAULT);

    if($id != "" && $email != "" && $_POST['password'] != ""){  
        $sql = query("insert into member (member_id, password, email) values('$id', '$hashedPassword', '$email')");
        echo "<script>
        alert('회원가입이 완료되었습니다.');
        location.href='/index.php';</script>";
    }else{
        echo"<script>
        alert('모두 입력해주세요.');
        history.back();</script>";
    }
    
?>