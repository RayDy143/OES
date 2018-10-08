<?php
    /**
     *
     */
    class MyProfile extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model("UserInfoModel");
			$this->load->model("UserAccountModel");
			$this->load->model("UserUploadedPictureModel");
        }
        public function index()
        {
            if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/Login'));
					}else{
                        if($_SESSION['UserTypeID']==1){
                            $data['title']="My Profile";
                            $this->load->view('admin/my_profile_page',$data);
                        }else{
        					header('location:'.base_url('index.php/Evaluator'));
                        }
					}
				}else{
					header('location:'.base_url('index.php/Login'));
				}
			}else{
				header('location:'.base_url('index.php/Login'));
			}
        }

        function uploadProfilePic($file){
			$config['upload_path']= './assets/uploads/Picture';
            $config['allowed_types']= 'gif|jpg|png|jpeg|JPG|JPEG';
            $this->load->library('upload',$config);
            if($this->upload->do_upload($file)){
           	    $upload = $this->upload->data();
            	$fields = array('Filename' => $upload['file_name']);
            	$this->UserUploadedPictureModel->insertProfilePic($fields);
            	return true;
            }else{
            	return false;
            }
		}
        function InsertInfo(){
			$fields = array('Firstname' => $this->input->post('Firstname'),
                            'Middlename' => $this->input->post('Middlename'),
                            'Lastname' => $this->input->post('Lastname'),
                            'Address' => $this->input->post('Address'),
                            'Birthdate' => $this->input->post('Birthdate'),
                            'Gender' => $this->input->post('Gender'),
                             'ContactNumber' => $this->input->post('ContactNumber')
                         );
			if($this->uploadProfilePic('ProfilePic')){

			}
            $whereinfo = array('UserID' => $_SESSION['UserID'] );
            $data['data']=$this->UserInfoModel->editInfo($fields,$whereinfo);
            $data['success']=false;
            if($data){
                $where = array('UserID' => $_SESSION['UserID']);
                $this->session->sess_destroy();
                $data['success']=true;
            }
			echo json_encode($data);
		}
        public function changePassword()
        {
            $oldpass = array('Password' => $this->input->post('OlpPass'),'UserID'=>$_SESSION['UserID']);
            $where = array('UserID'=>$_SESSION['UserID'] );
            $fields = array('Password'=>$this->input->post('NewPass'));
            $data['success']=false;
            $data['isPassValid']=false;
            if($this->UserAccountModel->checkPassword($oldpass)){
                $data['isPassValid']=true;

                $query=$this->UserAccountModel->changePass($where,$fields);
                if($query){
                    $data['success']=true;
                }
            }
            echo json_encode($data);
        }
    }

 ?>
