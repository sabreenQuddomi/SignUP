   
 <?php class model_users extends CI_Model{
	public function can_log_in()
	{
	$this->db->where('username',$this->input->post('username'));
	$this->db->where('password',sha1($this->input->post('password')));
	$query=$this->db->get('account');
	if($query->num_rows()==1){
	return true;
	}else{
	return false;
	}
		} 
	 
	 }



?>