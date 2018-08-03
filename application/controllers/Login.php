<?php /**
   *
   */
  class Login extends CI_Controller
  {

    function __construct()
    {
        parent::__construct();
        $this->load->model('UserAccountModel');
		$this->load->model('UserInfoModel');
		$this->load->model('UserVerificationCodeModel');
    }
    function index(){
        if(isset($_SESSION['Email'])){
			if($_SESSION['Status']=="Verified"){
				if($_SESSION['IsFirstLogin']=="1"){
					header('location:'.base_url('index.php/FirstTimeLogin'));
				}else{
					header('location:'.base_url('index.php/AdminStart'));
				}
			}else{
				$this->load->view('login_page');
			}
		}else{
			$this->load->view('login_page');
		}
    }
    function authenticate(){
		$fields = array('Email' => $this->input->post('Email'),'Password' => $this->input->post('Password'),'IsDeleted'=>0 );
		$datas['data']=$this->UserAccountModel->Authenticate($fields);
		$data['success']=false;
		if($datas['data']){
			$this->session->set_userdata($datas['data'][0]);
			$data['success']=true;
			$data['Status']=$datas['data'][0]['Status'];
			if($datas['data'][0]['Status']!="Verified"){
				$this->SendCode();
			}
		}
		echo json_encode($data);
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
	function codeExpiry(){
		$where = array('UserID' => $_SESSION['UserID'] );
		$data = array('Status' => 'Expired' );
		$this->UserVerificationCodeModel->codeExpiry($where,$data);
	}
	function checkCodeValidity(){
		$fields = array('UserID' => $_SESSION['UserID'],'Code'=>$this->input->post('Code'),'Status'=>'Active');
		$datas['data']=$this->UserVerificationCodeModel->CheckCodeValidity($fields);
		$data['success']=false;
		if($datas['data']){
			$data['success']=true;
			$this->validateAccount($_SESSION['UserID']);
		}
		echo json_encode($data);
	}
	function validateAccount($userid){
		$fields = array('Status' => 'Verified');
		$this->UserAccountModel->ValidateAccount($userid);
	}
	function SendCode(){
		$this->codeExpiry();
		$config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.googlemail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'alfeche492@gmail.com',
		  'smtp_pass' => '09058456538',
		  'mailtype' => 'html',
		  'charset' => 'iso-8859-1',
		  'wordwrap' => TRUE
		);
		$verifycode = uniqid();
		$messagecontent='Hello '.$_SESSION['Email'].' Use this code to verify you account. '.$verifycode;
		$to_email=$_SESSION['Email'];
		$data = array('Code' => $verifycode,'UserID'=>$_SESSION['UserID'] );
		$this->UserVerificationCodeModel->InsertCode($data);
		$this->email->initialize($config);
     	$this->email->set_newline("\r\n");
		$this->email->from('alfeche492@gmail.com', 'Raymundo Alfeche');
		$this->email->to($to_email);

		$this->email->subject('Online Evalution System for Non-Academic Scholars Accoutn Verification');
		$this->email->message($messagecontent);

		$this->email->send();
	}
  }

 ?>
