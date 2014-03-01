<?php
class Letter_model extends Model
{
	private $tbl_parent= 'letter_tbl';
	
	function Letter_model()
	{
		parent::Model();
	}
		
	function letter_insert($letter_no,$title,$data,$description,$l_day,$l_month,$l_year,$box_to,$box_from)
	{		
		$query_str="INSERT INTO letter_tbl (l_no,l_title,l_file_location,l_description,l_day,l_month,l_year,l_uni_in,l_uni_out) Value(?,?,?,?,?,?,?,?,?)";
		$this->db->query($query_str,array($letter_no,$title,$data,$description,$l_day,$l_month,$l_year,$box_to,$box_from));
		redirect('letter/outbox','refresh');		
	}
		
	function letter_edit($letter_id,$letter_no,$title,$data1,$description,$date,$box_from)
	{
		$query_str="UPDATE letter_tbl SET l_no='$letter_no',l_title='$title',l_file_location='$data1',l_description='$description',l_outbox_date='$date', l_uni_out='$box_from' where l_id='$letter_id' ";
		$this->db->query($query_str,array($letter_id,$letter_no,$title,$data1,$description,$date,$box_to,$box_from));
		redirect('letter/outbox','refresh');
	}
		
	function letter_edit_no_upload($letter_id,$letter_no,$title,$description,$l_day,$l_month,$l_year,$box_from,$uri_current)
	{	
		$query_str="UPDATE letter_tbl SET l_no='$letter_no',l_title='$title',l_description='$description',l_day='$l_day',l_month='$l_month',l_year='$l_year', l_uni_out='$box_from' where l_id='$letter_id' ";
		$this->db->query($query_str,array($letter_id,$letter_no,$title,$description,$l_day,$l_month,$l_year,$box_from,$uri_current));
		redirect('letter/outbox/'.$uri_current,'refresh');
	}
		
	function letter_edit_yes_upload($letter_id,$letter_no,$title,$data1,$description,$l_day,$l_month,$l_year,$box_from,$uri_current)
	{
		$query_str="UPDATE letter_tbl SET l_no='$letter_no',l_title='$title',l_file_location='$data1',l_description='$description',l_day='$l_day',l_month='$l_month',l_year='$l_year', l_uni_out='$box_from' where l_id='$letter_id' ";
		$this->db->query($query_str,array($letter_id,$letter_no,$title,$data1,$description,$l_day,$l_month,$l_year,$box_from,$uri_current));
		redirect('letter/outbox/'.$uri_current,'refresh');
	}
		
	function letter_delete($deleid3,$deleid4)
	{
		$query_str="DELETE from letter_tbl where l_id='$deleid3' ";
		$this->db->query($query_str,array($deleid3));
		redirect('letter/outbox/'.$deleid4,'refresh');
	}
		
	public function check_letter($letter_no)
	{		
		$this -> db -> where("l_no",$letter_no);			
		$query = $this -> db -> get("letter_tbl");			
		if($query -> num_rows() >0){
			return true;
		}
		else{
			return false;
		}			
	}
		
	//pagin query start for outbox
 	function count_all_query($u_id){				
		$this->db->where('l_uni_out', $u_id);
		$this->db->from('letter_tbl');
		return $this->db->count_all_results();
	}
	
	function get_paged_list($limit = 10, $offset = 0,$u_id){
		$this->db->where('l_uni_out =',$u_id);
		$this->db->order_by('l_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	 
	function count_all_searcho($searchparams,$u_id){	
		//$this-> db-> where(array('l_uni_out'=> $u_id ,  'l_uni_in' =>$searchparams['l_uni_in'], 'l_day' =>$searchparams['l_day'], 'l_month' =>$searchparams['l_month'], 'l_year' =>$searchparams['l_year']));
		$this-> db-> where('l_uni_out', $u_id);
		$this-> db-> where('l_uni_in',$searchparams['l_uni_in']);
		$this-> db-> or_where('l_day',$searchparams['l_day']);
		$this-> db->where('l_month',$searchparams['l_month']);
		$this-> db->where('l_year',$searchparams['l_year']);
		
		//$this-> db-> where(array('l_uni_in' =>$searchparams['l_uni_in'], 'l_day' =>$searchparams['l_day'], 'l_month' =>$searchparams['l_month'], 'l_year' =>$searchparams['l_year']));
		$this->db->from($this->tbl_parent);		
		return $this->db->count_all_results();		
	}
 
	function get_search_pagedlisto($searchparams,$limit = 10, $offset = 0,$u_id){
		//$this-> db-> where(array('l_uni_out'=> $u_id ,  'l_uni_in' =>$searchparams['l_uni_in'], 'l_day' =>$searchparams['l_day'], 'l_month' =>$searchparams['l_month'], 'l_year' =>$searchparams['l_year']));
		$this-> db-> where('l_uni_out', $u_id);
		$this-> db-> where('l_uni_in',$searchparams['l_uni_in']);
		$this-> db-> or_where('l_day',$searchparams['l_day']);
		$this-> db->where('l_month',$searchparams['l_month']);
		$this-> db->where('l_year',$searchparams['l_year']);
		//	$this-> db-> where(array('l_uni_in' =>$searchparams['l_uni_in'], 'l_day' =>$searchparams['l_day'], 'l_month' =>$searchparams['l_month'], 'l_year' =>$searchparams['l_year']));
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	
	function count_all_search_do_uni($searchparams,$u_id){	
		$this-> db-> where('l_uni_out', $u_id);
		$this-> db-> where('l_uni_in',$searchparams['l_uni_in']);		
		$this->db->from($this->tbl_parent);		
		$this->db->order_by('l_id','desc');
		return $this->db->count_all_results();		
	} 
	
	function get_search_pagedlist_do_uni($searchparams,$limit = 10, $offset = 0,$u_id){
		$this-> db-> where('l_uni_out', $u_id);
		$this-> db-> where('l_uni_in',$searchparams['l_uni_in']);	
		$this->db->order_by('l_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	
	function count_all_search_do_day($searchparams,$u_id){	
		$this-> db-> where('l_uni_out', $u_id);
		$this-> db-> where('l_day',$searchparams['l_day']);
		$this->db->from($this->tbl_parent);	
		$this->db->order_by('l_id','desc');	
		return $this->db->count_all_results();		
	} 
	
	function get_search_pagedlist_do_day($searchparams,$limit = 10, $offset = 0,$u_id){
		$this-> db-> where('l_uni_out', $u_id);
		$this-> db-> where('l_day',$searchparams['l_day']);	
		$this->db->order_by('l_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	
	function count_all_search_do_month($searchparams,$u_id){	
		$this-> db-> where('l_uni_out', $u_id);
		$this-> db-> where('l_month',$searchparams['l_month']);
		$this->db->from($this->tbl_parent);		
		$this->db->order_by('l_id','desc');
		return $this->db->count_all_results();		
	} 
	
	function get_search_pagedlist_do_month($searchparams,$limit = 10, $offset = 0,$u_id){
		$this-> db-> where('l_uni_out', $u_id);
		$this-> db-> where('l_month',$searchparams['l_month']);	
		$this->db->order_by('l_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	
	function count_all_search_do_year($searchparams,$u_id){	
		$this-> db-> where('l_uni_out', $u_id);
		$this-> db-> where('l_year',$searchparams['l_year']);
		$this->db->from($this->tbl_parent);		
		$this->db->order_by('l_id','desc');
		return $this->db->count_all_results();		
	} 
	
	function get_search_pagedlist_do_year($searchparams,$limit = 10, $offset = 0,$u_id){
		$this-> db-> where('l_uni_out', $u_id);
		$this-> db-> where('l_year',$searchparams['l_year']);	
		$this->db->order_by('l_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	
	function count_all_search_uni_day($searchparams,$u_id){	
		$this-> db-> where('l_uni_out', $u_id);
		$this-> db-> where('l_day',$searchparams['l_day']);
		$this-> db-> where('l_uni_in',$searchparams['l_uni_in']);
		$this->db->from($this->tbl_parent);	
		$this->db->order_by('l_id','desc');	
		return $this->db->count_all_results();		
	} 
	
	function get_search_pagedlist_uni_day($searchparams,$limit = 10, $offset = 0,$u_id){
		$this-> db-> where('l_uni_out', $u_id);
		$this-> db-> where('l_day',$searchparams['l_day']);
		$this-> db-> where('l_uni_in',$searchparams['l_uni_in']);
		$this->db->order_by('l_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	
	function count_all_search_uni_month($searchparams,$u_id){	
		$this-> db-> where('l_uni_out', $u_id);
		$this-> db-> where('l_month',$searchparams['l_month']);
			$this-> db-> where('l_uni_in',$searchparams['l_uni_in']);
		$this->db->from($this->tbl_parent);		
		$this->db->order_by('l_id','desc');
		return $this->db->count_all_results();		
	} 
	
	function get_search_pagedlist_uni_month($searchparams,$limit = 10, $offset = 0,$u_id){
		$this-> db-> where('l_uni_out', $u_id);
		$this-> db-> where('l_month',$searchparams['l_month']);
		$this-> db-> where('l_uni_in',$searchparams['l_uni_in']);
		$this->db->order_by('l_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	
	function count_all_search_uni_year($searchparams,$u_id){	
		$this-> db-> where('l_uni_out', $u_id);
		$this-> db-> where('l_year',$searchparams['l_year']);
		$this-> db-> where('l_uni_in',$searchparams['l_uni_in']);
		$this->db->from($this->tbl_parent);	
		$this->db->order_by('l_id','desc');	
		return $this->db->count_all_results();		
	} 
	function get_search_pagedlist_uni_year($searchparams,$limit = 10, $offset = 0,$u_id){
		$this-> db-> where('l_uni_out', $u_id);
		$this-> db-> where('l_year',$searchparams['l_year']);
		$this-> db-> where('l_uni_in',$searchparams['l_uni_in']);
		$this->db->order_by('l_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	
	function count_all_search2($searchparams,$u_id){	
		$this-> db-> where('l_uni_out', $u_id);
		$this-> db-> where(array('l_uni_in' =>3, 'l_day' =>16));
		$this->db->from($this->tbl_parent);	
		$this->db->order_by('l_id','desc');	
		return $this->db->count_all_results();		
	} 
	
	function get_search_pagedlist2($searchparams,$limit = 10, $offset = 0,$u_id){
		$this-> db-> where('l_uni_out', $u_id);
		$this-> db-> where(array('l_uni_in' =>3, 'l_day' =>16));
		$this->db->order_by('l_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}	
	
	function count_all_search_day_month_year($searchparams,$u_id){	
		$this-> db-> where('l_uni_out', $u_id);
		$this-> db-> where('l_day',$searchparams['l_day']);
		$this-> db->where('l_month',$searchparams['l_month']);
		$this-> db->where('l_year',$searchparams['l_year']);
		$this->db->from($this->tbl_parent);
		$this->db->order_by('l_id','desc');		
		return $this->db->count_all_results();		
	}
  
	function get_search_pagedlist_day_month_year($searchparams,$limit = 10, $offset = 0,$u_id){
		$this-> db-> where('l_uni_out', $u_id);
		$this-> db-> where('l_day',$searchparams['l_day']);
		$this-> db->where('l_month',$searchparams['l_month']);
		$this-> db->where('l_year',$searchparams['l_year']);
		$this->db->order_by('l_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}	
	
	function count_all_search_uni_day_moth_year($searchparams,$u_id){	
		$this-> db-> where('l_uni_out', $u_id);
		$this-> db-> where('l_uni_in',$searchparams['l_uni_in']);
		$this-> db-> where('l_day',$searchparams['l_day']);
		$this-> db->where('l_month',$searchparams['l_month']);
		$this-> db->where('l_year',$searchparams['l_year']);
		$this->db->from($this->tbl_parent);		
		$this->db->order_by('l_id','desc');
		return $this->db->count_all_results();		
	}
  
	function get_search_pagedlist_uni_day_moth_year($searchparams,$limit = 10, $offset = 0,$u_id){
		$this-> db-> where('l_uni_out', $u_id);
		$this-> db-> where('l_uni_in',$searchparams['l_uni_in']);
		$this-> db-> where('l_day',$searchparams['l_day']);
		$this-> db->where('l_month',$searchparams['l_month']);
		$this-> db->where('l_year',$searchparams['l_year']);
		$this->db->order_by('l_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	//pagin query end outbox
	
	//pagin query start for inbox
 	function inbox_count_all_query($u_id){				
		$this->db->where('l_uni_in', $u_id);
		$this->db->from('letter_tbl');
		 return $this->db->count_all_results();
	}
	
	function inbox_get_paged_list($limit = 10, $offset = 0,$u_id){
		$this->db->where('l_uni_in =',$u_id);
		$this->db->order_by('l_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	
	function inbox_count_all_search_do_uni($searchparams,$u_id){	
		$this-> db-> where('l_uni_in', $u_id);
		$this-> db-> where('l_uni_out',$searchparams['l_uni_out']);
		$this->db->from($this->tbl_parent);		
		$this->db->order_by('l_id','desc');
		return $this->db->count_all_results();		
	} 
	function inbox_get_search_pagedlist_do_uni($searchparams,$limit = 10, $offset = 0,$u_id){
		$this-> db-> where('l_uni_in', $u_id);
		$this-> db-> where('l_uni_out',$searchparams['l_uni_out']);	
		$this->db->order_by('l_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	function inbox_count_all_search_do_day($searchparams,$u_id){	
		$this-> db-> where('l_uni_in', $u_id);
		$this-> db-> where('l_day',$searchparams['l_day']);
		$this->db->from($this->tbl_parent);	
		$this->db->order_by('l_id','desc');	
		return $this->db->count_all_results();		
	} 
	function inbox_get_search_pagedlist_do_day($searchparams,$limit = 10, $offset = 0,$u_id){
		$this-> db-> where('l_uni_in', $u_id);
		$this-> db-> where('l_day',$searchparams['l_day']);	
		$this->db->order_by('l_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	function inbox_count_all_search_do_month($searchparams,$u_id){	
		$this-> db-> where('l_uni_in', $u_id);
		$this-> db-> where('l_month',$searchparams['l_month']);
		$this->db->from($this->tbl_parent);		
		$this->db->order_by('l_id','desc');
		return $this->db->count_all_results();		
	} 
	function inbox_get_search_pagedlist_do_month($searchparams,$limit = 10, $offset = 0,$u_id){
		$this-> db-> where('l_uni_in', $u_id);
		$this-> db-> where('l_month',$searchparams['l_month']);	
		$this->db->order_by('l_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	function inbox_count_all_search_do_year($searchparams,$u_id){	
		$this-> db-> where('l_uni_in', $u_id);
		$this-> db-> where('l_year',$searchparams['l_year']);
		$this->db->from($this->tbl_parent);		
		$this->db->order_by('l_id','desc');
		return $this->db->count_all_results();		
	} 
	function inbox_get_search_pagedlist_do_year($searchparams,$limit = 10, $offset = 0,$u_id){
		$this-> db-> where('l_uni_in', $u_id);
		$this-> db-> where('l_year',$searchparams['l_year']);	
		$this->db->order_by('l_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	function inbox_count_all_search_uni_day($searchparams,$u_id){	
		$this-> db-> where('l_uni_in', $u_id);
		$this-> db-> where('l_day',$searchparams['l_day']);
		$this-> db-> where('l_uni_out',$searchparams['l_uni_out']);
		$this->db->from($this->tbl_parent);	
		$this->db->order_by('l_id','desc');	
		return $this->db->count_all_results();		
	} 
	function inbox_get_search_pagedlist_uni_day($searchparams,$limit = 10, $offset = 0,$u_id){
		$this-> db-> where('l_uni_in', $u_id);
		$this-> db-> where('l_day',$searchparams['l_day']);
		$this-> db-> where('l_uni_out',$searchparams['l_uni_out']);
		$this->db->order_by('l_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	function inbox_count_all_search_uni_month($searchparams,$u_id){	
		$this-> db-> where('l_uni_in', $u_id);
		$this-> db-> where('l_month',$searchparams['l_month']);
		$this-> db-> where('l_uni_out',$searchparams['l_uni_out']);
		$this->db->from($this->tbl_parent);		
		$this->db->order_by('l_id','desc');
		return $this->db->count_all_results();		
	} 
	function inbox_get_search_pagedlist_uni_month($searchparams,$limit = 10, $offset = 0,$u_id){
		$this-> db-> where('l_uni_in', $u_id);
		$this-> db-> where('l_month',$searchparams['l_month']);
		$this-> db-> where('l_uni_out',$searchparams['l_uni_out']);
		$this->db->order_by('l_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	function inbox_count_all_search_uni_year($searchparams,$u_id){	
		$this-> db-> where('l_uni_in', $u_id);
		$this-> db-> where('l_year',$searchparams['l_year']);
		$this-> db-> where('l_uni_out',$searchparams['l_uni_out']);
		$this->db->from($this->tbl_parent);	
		$this->db->order_by('l_id','desc');	
		return $this->db->count_all_results();		
	} 
	function inbox_get_search_pagedlist_uni_year($searchparams,$limit = 10, $offset = 0,$u_id){
		$this-> db-> where('l_uni_in', $u_id);
		$this-> db-> where('l_year',$searchparams['l_year']);
		$this-> db-> where('l_uni_out',$searchparams['l_uni_out']);
		$this->db->order_by('l_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	

	
	function inbox_count_all_search_day_month_year($searchparams,$u_id){	
		$this-> db-> where('l_uni_in', $u_id);
		$this-> db-> where('l_day',$searchparams['l_day']);
		$this-> db->where('l_month',$searchparams['l_month']);
		$this-> db->where('l_year',$searchparams['l_year']);
		$this->db->from($this->tbl_parent);
		$this->db->order_by('l_id','desc');		
		return $this->db->count_all_results();		
	}
  
	function inbox_get_search_pagedlist_day_month_year($searchparams,$limit = 10, $offset = 0,$u_id){
		$this-> db-> where('l_uni_in', $u_id);
		$this-> db-> where('l_day',$searchparams['l_day']);
		$this-> db->where('l_month',$searchparams['l_month']);
		$this-> db->where('l_year',$searchparams['l_year']);
		$this->db->order_by('l_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}	
	function inbox_count_all_search_uni_day_moth_year($searchparams,$u_id){	
		$this-> db-> where('l_uni_in', $u_id);
		$this-> db-> where('l_uni_out',$searchparams['l_uni_out']);
		$this-> db-> where('l_day',$searchparams['l_day']);
		$this-> db->where('l_month',$searchparams['l_month']);
		$this-> db->where('l_year',$searchparams['l_year']);
		$this->db->from($this->tbl_parent);		
		$this->db->order_by('l_id','desc');
		return $this->db->count_all_results();		
	}
  
	function inbox_get_search_pagedlist_uni_day_moth_year($searchparams,$limit = 10, $offset = 0,$u_id){
		$this-> db-> where('l_uni_in', $u_id);
		$this-> db-> where('l_uni_out',$searchparams['l_uni_out']);
		$this-> db-> where('l_day',$searchparams['l_day']);
		$this-> db->where('l_month',$searchparams['l_month']);
		$this-> db->where('l_year',$searchparams['l_year']);
		$this->db->order_by('l_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	//pagin query end inbox
}
?>