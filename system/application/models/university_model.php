<?php
class University_model extends Model
{
	function University_model()
	{
		parent::Model();
	}
	
	function uni_insert($uni_name,$uni_location,$uni_address,$username,$password,$uni_intro,$uni_body,$uni_conclusion)
	{	
		$query_str="INSERT INTO university_tbl (u_name,u_location,u_address,u_introduction,u_body,u_conclusion) Value(?,?,?,?,?,?)";
		$this->db->query($query_str,array($uni_name,$uni_location,$uni_address,$uni_intro,$uni_body,$uni_conclusion));
		
		$u_id = $this->db->insert_id();
		$query_str="INSERT INTO user_tbl (u_id,user_name,user_password) Value(?,?,?)";
		$this->db->query($query_str,array($u_id,$username,$password));
		redirect('education/admin_home','refresh');	
	}
	
	function uni_update($uni_id,$uni_name,$uni_location,$uni_address,$username,$password,$uni_intro,$uni_body,$uni_conclusion)
	{
		$query_str="UPDATE university_tbl SET u_name = '$uni_name',u_location = '$uni_location',u_address = '$uni_address',u_introduction = '$uni_intro',u_body = '$uni_body',u_conclusion = '$uni_conclusion' WHERE u_id = '$uni_id' ";
		$this->db->query($query_str,array($uni_name,$uni_location,$uni_address,$uni_intro,$uni_body,$uni_conclusion));
		
		$query_str="UPDATE user_tbl SET user_name = '$username',user_password = '$password' WHERE u_id = '$uni_id' ";
		$this->db->query($query_str,array($username,$password));
		redirect('administer/show_university','refresh');	
	}
	
	function delete_university($deleid)
	{
		$query_str1="DELETE from university_tbl where u_id='$deleid' ";
		$query_str="DELETE from user_tbl where u_id='$deleid' ";
		$this->db->query($query_str1,array($deleid));
		$this->db->query($query_str,array($deleid));
		redirect('administer/show_university','refresh');		
	}
	
	public function check_university_exist($uni)
	{	
		$this->db->like("u_name",$uni);
		$query=$this->db->get("university_tbl");
		if($query->num_rows()>0)
		{
		return true;
		}
		else
		{
		return false;
		}
	}
		function count_posts_university_list()
	{
		$query = $this->db->query('SELECT * FROM university_tbl');
		return $query->num_rows();
	}	
		 	
		function get_posts_university_list($limit = NULL, $offset = NULL)
	{
		$this->db->limit($limit, $offset);	
		$this->db->select('*');
		$this->db->order_by("u_id","desc"); 
		return $this->db->get('university_tbl ');
	}	
}
?>