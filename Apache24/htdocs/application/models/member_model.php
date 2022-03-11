<?php
class Board_model extends CI_Model{
    function __construct(){ //model 초기화 함수 
        parent::__construct();
    }

    public function login($login_data){
        $userid = $login_data['userid'];
        return $this->db->query("select * from member where member_id='$userid'")->row();
    }

    public function regist($regist_data){
        $userid = $regist_data['userid'];
        $pw = $regist_data['password'];
        $email = $regist_data['email'];

        $this->db->query("insert into member (member_id, password, email) values('$userid', '$pw','$email')");
    }

}

?>