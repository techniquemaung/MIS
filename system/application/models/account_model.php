<?php
class Account_model extends Model
{

	function Account_model()
	{
	parent::Model();
	$this->load->database();
	//$de_password = array();
	}

	function login($username, $password)
	 {	 	
	 	$this->db->select('user_password');
	 	$this->db->from('user_tbl');
	 	$this->db->where('user_name',$username);
	 	$query1 = $this->db->get(); 
		
		$key = 'ministry-of-education';
		$pwd='KN8DO4LmAiBKzsBUihIOIcvbs8OfzKJ5pR/LLaBnS2emte8FXYao0tXYQKAFQuYiFlP3snJhtmdzBVsr9sHzZA==';
			$decode_password = $this->encrypt->decode($pwd,$key);
			echo  $decode_password;
		foreach($query1->result() as $row1)
		{		
			$user_password=$row1->user_password;
			$key = 'ministry-of-education';
		
			$decode_password = $this->encrypt->decode($user_password,$key);
									
			if ($decode_password==$password){
			    $this -> db -> select('u_id,user_name,user_password');
			    $this -> db -> from('user_tbl');
			    $this->db->where('user_name',$username);
				//$this->db->where('user_password',$decode_password);
				$query = $this -> db -> get();
			 
				if($query -> num_rows() == 1)
				{
				   return $query->result();
				}
			   else
			  {
			     return false;
			   }
			   
			}
			else{
				return false;
			}
		}		
 	}
 	
	function count_posts_content_list()
	{
		$query = $this->db->query('SELECT * FROM announcement_tbl');
		return $query->num_rows();
	}	
		 	
		function get_posts_content_list($limit = NULL, $offset = NULL)
	{
		$this->db->limit($limit, $offset);
		//$this->	db->distinct();
		$this->db->select('*');
		$this->db->order_by("announce_id","desc"); 
		return $this->db->get('announcement_tbl ');
	}	
}
?>