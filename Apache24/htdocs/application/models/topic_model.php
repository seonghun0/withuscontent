<?php
class Topic_model extends CI_Model{
    function __construct(){ //model 초기화 함수 
        parent::__construct();
    }

    public function gets(){
        return $this->db->query('select * from topic')->result();
    }

    public function get($topic_id){
        return $this->db->get_where('topic', array('id'=>$topic_id))->row();
        // return $this->db->query('select * from topic where id='.$topic_id)
    }
}

?>