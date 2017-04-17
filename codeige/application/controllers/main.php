<?php
class main extends CI_Controller
{
public function index()
{
 $this->login();
}
  public function login()
  {
   $this->load->view('login');
  }
  public function members()
  {
   if($this->session->userdata('is_logged_in')){
    $this->load->view('members');
    }else{
	redirect('main/restricted');
	  }
  }
  
    public function restricted()
   {
       $this->load->view('restricted');

   
   }
   public function signup()
   {
   	redirect('user/registration');

   }
  
   public function login_validation()
   {
   $this->load->library('form_validation');
   $this->form_validation->set_rules('username','Username','required|trim|xss_clean|callback_validate_credentials');
   $this->form_validation->set_rules('password','Password','required|sha1|trim');
   
   if($this->form_validation->run()){
   $data=array(
   'username'=>$this->input->post('username'),
   'is_logged_in'=>1
       );
   $this->session->set_userdata($data);
   redirect('main/members');
   }else{
    $this->load->view('login');
   }
   
 }
 public function validate_credentials()
 {
  $this->load->model('model_users');
   if($this->model_users->can_log_in()){
     return true;
   }else{
   $this->form_validation->set_message('validate_credentials','Incorrect Username or password');
   return false;
   }
 }
    public function logout()
	{
	$this->session->sess_destroy();
	redirect('main/login');
	}
   

}



?>