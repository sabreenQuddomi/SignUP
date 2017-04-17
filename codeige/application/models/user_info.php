  <?php
     class user_info extends CI_Model
          {
        function sabreen_is_creating_user()
		 {
		   $insert_user_in_database=array(
		   'firstname' => $this->input->post('firstname'),
		   'lastname'  => $this->input->post('lastname'),
		   'age'       => $this->input->post('age'),
		   'gender'    => $this->input->post('gender'),
		   'emailad'   => $this->input->post('emailad'),
		   'username'  => $this->input->post('username'),
		   'password'  => sha1($this->input->post('password')),     );		   
		   
		   $query=$this->db->insert('account',$insert_user_in_database);
		   return $query;
		   
		   }
		   
 
		  }



     ?>