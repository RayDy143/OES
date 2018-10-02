<?php
    /**
     *
     */
    class RenewalRemarks extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
        }
        public function index()
        {
            if(isset($_SESSION['Email'])){
				if($_SESSION['Status']=="Verified"){
					if($_SESSION['IsFirstLogin']=="1"){
						header('location:'.base_url('index.php/Login'));
					}else{
                        if($_SESSION['UserTypeID']==1){
                            $data['Title']="OES-Renewal Remarks";
                            $data['useraccounts']="";
                            $data['nas']="";
                            $data['eval']="";
                            $data['scheduler']="";
                            $data['department']="";
                            $data['evaluation']="";
                            $data['sy']=$this->DTRModel->getSchoolyear();
                            $data['month']=$this->DTRModel->getMonth();
                            $data['allowancenav']="active";
                            $this->load->view('layout/header',$data);
                            $this->load->view('admin/renewal_remarks_page');
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
    }

 ?>
