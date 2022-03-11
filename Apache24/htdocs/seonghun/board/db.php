<?php

    //한글 꺠짐 방지를 위한 UTF-8 인코딩
    header('Content-type: text/html; charset=utf-8');

    $db = new mysqli("localhost","mysql","mysql","practice");
    $db -> set_charset("utf-8");

    function query($query)
    {
        global $db;
        return $db->query($query);
    }



?>