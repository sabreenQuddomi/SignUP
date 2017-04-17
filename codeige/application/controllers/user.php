<?php
class  user extends CI_Controller{
	function __construct(){
			parent::__construct();
			$this->load->model('user_info');
			$this->baseurl=dirname(dirname(base_url()));
		
	}
	  function members(){
		$data['content']='success';
		 $this->load->view('v_content',$data);
		}
	   function index(){
	
		// $this->load->view('registration_form');
		 	
		$data['content']='v_content';
		$this->load->view('registration_form',$data);
	
		}
		
		function registration(){
		
	  //  $this->load->view('registration_form');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'is_unique[account.username]','trim|required');//accoutn column name and username in account database

			$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('age', 'Age', 'trim|required');
			$this->form_validation->set_rules('emailad', 'Email Address', 'trim|required|valid_email','is_unique[account.emailad]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
			$this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required|matches[password]');
			if($this->form_validation->run() == FALSE)
			{
				$this->index();
			}
			
			else
			{			
				if($query = $this->user_info->sabreen_is_creating_user())
				{
					$this->members();	
				}
				else
				{
					//$this->load->view('registration');
					$this->index();			
				}
			}
		
		

		}
	}
	

 ?>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 