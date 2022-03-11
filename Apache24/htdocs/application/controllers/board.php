<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller {

    function __construct(){ //model 초기화 함수 
        parent::__construct();

        $this->load->database();
        $this->load->model('board_model');
        $this->load->helpers(array('form','url'));
        
    }

	public function index(){
        $this->load->view('main');
	}

    public function list(){
        $lists = $this->board_model->gets();
        $this->load->view('list',array('lists'=>$lists));
    }

    public function read($board_no){
        $this->board_model->updatereadcount($board_no);
        $data = $this->board_model->get($board_no);
        $reply = $this->board_model->get_reply($board_no);
        $this->load->view('read', array('data'=>$data , 'reply'=>$reply ));
    }

    public function write(){
        $this->load->view('write');
    }

    public function write_ok(){
        session_start();
        $input_data['name'] = $this->input->post('name');
        $input_data['writer'] = $_SESSION['userid'];
        $input_data['content'] = $this->input->post('content');

        $this->board_model->input($input_data);
        
        redirect('board/list');
    }

    public function edit($board_no){
        $data = $this->board_model->get($board_no);
        $this->load->view('edit', array('data'=>$data));
    }

    public function edit_ok(){
        $input_data['no'] = $this->input->post('no');
        $input_data['name'] = $this->input->post('name');
        $input_data['writer'] = $this->input->post('writer');
        $input_data['content'] = $this->input->post('content');

        $this->board_model->update($input_data);
        redirect('board/read/'.$input_data['no']);
    }

    public function delete($id){
        $this->board_model->delete($id);

        redirect('board/list');
    }
    
    public function reply_ok(){
        $reply_data['no'] = $this->input->post('no');
        $reply_data['writer'] = $this->input->post('writer');
        $reply_data['reply'] = $this->input->post('reply');

        $this->board_model->reply($reply_data);

        $result = $this->board_model->get_replys($reply_data['no']);

        echo json_encode($result);        
    }

    public function reply_edit(){
        $edit_data['no'] = $this->input->post('no');
        $edit_data['review'] = $this->input->post('review');
        $edit_data['member_id'] = $this->input->post('reviewid');
        $edit_data['date'] = $this->input->post('date');

        $this->board_model->edit_reply($edit_data);

        echo "1";
    }

    public function reply_delete(){
        $del_data['no'] = $this->input->post('no');
        $del_data['review'] = $this->input->post('review');
        $del_data['member_id'] = $this->input->post('reviewid');
        $del_data['date'] = $this->input->post('date');

        $this->board_model->delete_reply($del_data);

        echo"1";
    }

}
?>