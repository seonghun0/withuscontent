<?php
class Board_model extends CI_Model{
    function __construct(){ //model 초기화 함수 
        parent::__construct();
    }

    public function gets(){
        return $this->db->query('select * from board')->result();
    }

    public function get($id){
        return $this->db->get_where('board', array('board_no'=>$id))->row();
    }

    public function updatereadcount($id){
        $this->db->query("update board set readcount = readcount + 1 where board_no ='$id'");
    }

    public function input($input_data){
        $name = $input_data['name'];
        $writer = $input_data['writer'];
        $content = $input_data['content'];
        $this->db->query("insert into board(board_name, board_writer, content) values ('$name','$writer','$content')");
    }

    public function update($input_data){
        $no = $input_data['no'];
        $name = $input_data['name'];
        $writer = $input_data['writer'];
        $content = $input_data['content'];
        $this->db->query("update board set board_name ='$name', board_writer='$writer',content='$content' where board_no='$no'");
    }
    public function delete($id){
        $this->db->query("delete from board where board_no='$id'");
    }

    public function reply($reply_data){
        $no = $reply_data['no'];
        $writer = $reply_data['writer'];
        $content = $reply_data['reply'];

        $this->db->query("insert into review (board_idx, member_id, review) values ('$no','$writer','$content')");
    }

    public function get_reply($id){
        return $this->db->query("select * from review where board_idx ='$id'")->result();
    }

    public function get_replys($id){
        return $this->db->query("select * from review where board_idx ='$id' order by reg_date desc")->row();
    }
    public function edit_reply($edit_data){
        $no = $edit_data['no'];
        $review = $edit_data['review'];
        $id = $edit_data['member_id'];
        $date = $edit_data['date'];
        $this->db->query("update review set review='$review' where member_id ='$id' and reg_date='$date' and board_idx='$no' ");
    }

    public function delete_reply($del_data){
        $no = $del_data['no'];
        // $review = $edit_data['review'];
        $id = $del_data['member_id'];
        $date = $del_data['date'];
        $this->db->query("delete from review where member_id ='$id' and reg_date='$date' and board_idx='$no' ");
    }

}

?>