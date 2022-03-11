<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    function __construct(){ //model 초기화 함수 
        parent::__construct();

        $this->load->database();
        $this->load->model('member_model');
        $this->load->helpers(array('form','url'));
        
    }

    public function index(){
        $this->load->view('main');
	}

    public function login_ok(){
        session_start();
        $login_data['userid'] = $this->input->post('userid');
        $login_data['password'] = $this->input->post('password');
        if($login_data['userid'] != "" && $login_data['password'] != ""){
            $result = $this->member_model->login($login_data);
            $rs = password_verify($login_data['password'], $result->password);
            if($rs ==true){
                $_SESSION['userid'] = $login_data['userid'];
                echo "<script> alert('반갑습니다.'); location.href='/board/list'</script>";

            }else{
                echo "<script>alert('아이디 또는 비밀번호가 틀립니다.');history.back();</script>";
            }
        }else{
            echo "<script>alert('아이디 또는 비밀번호를 입력해주세요.');history.back();</script>";
        }       
    }

    public function regist(){
        $this->load->view('regist');
    }
    public function regist_ok(){
        $regist_data['userid'] = $this->input->post('userid');
        $regist_data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $regist_data['email'] = $this->input->post('email');

        $this->member_model->regist($regist_data);

        echo "<script>alert('회원가입이 완료되었습니다.');location.href='/index.php/board'</script>";
    }

}
?>