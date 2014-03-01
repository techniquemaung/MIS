<?php
class Announcement_model extends Model
{
	function Announcement_model()
	{
		parent::Model();
	}
	
	function announce_insert($title,$body,$date)
	{
		$query="INSERT INTO announcement_tbl(announce_title,announce_body,announce_date) Value(?,?,?)";
		$this->db->query($query,array($title,$body,$date));
		$announce_id = $this->db->insert_id();
		
		redirect('announcement/announcement_show/'.$announce_id,'refresh');
	}
	
	function announce_update($announce_id,$title,$body,$date)
	{
		$query="UPDATE announcement_tbl SET announce_title = '$title',announce_body = '$body',announce_date = '$date' where announce_id = '$announce_id' ";
		$this->db->query($query,array($announce_id,$title,$body,$date));
		
		redirect('announcement/announcement_show/'.$announce_id,'refresh');
	}
	
	function count_posts_announcement_list()
	{
		$query = $this->db->query('SELECT * FROM announcement_tbl');
		return $query->num_rows();
	}	
		 	
		function get_posts_announcement_list($limit = NULL, $offset = NULL)
	{
		$this->db->limit($limit, $offset);	
		$this->db->select('*');
		$this->db->order_by("announce_id","desc"); 
		return $this->db->get('announcement_tbl ');
	}
	
}
	?>