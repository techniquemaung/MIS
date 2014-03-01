<?php
class Scholarship_model extends Model
{
	private $tbl_parent= 'student_personal_tbl';
	function scholarship_model()
	{
		parent::Model();
	}
	
	/*
	 * Scholarship query model start
	 */
	function scholarship_count_all_query($u_id){				
		$this->db->where('u_id', $u_id);
		$this->db->where('s_schlarship','ရ');
		$this->db->from('student_personal_tbl');
		return $this->db->count_all_results();		
	}
	function scholarship_get_paged_list($limit = 10, $offset = 0,$u_id){
		$this->db->where('u_id =',$u_id);
		$this->db->where('s_schlarship',"ရ");
		$this->db->order_by('s_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	
	function scholarship_count_all_search_do_major($searchparams,$u_id){	
		$this->db->where('u_id =',$u_id);
		$this->db->where('s_schlarship',"ရ");
		//$this->db->like($searchparams,'','after');		
		$this->db->where('s_major',$searchparams['s_major']);
		$this->db->from($this->tbl_parent);		
		$this->db->order_by('s_id','desc');
		return $this->db->count_all_results();		
	} 
	
	function scholarship_get_search_pagedlist_do_major($searchparams,$limit = 10, $offset = 0,$u_id){
		$this->db->where('u_id =',$u_id);
		$this->db->where('s_schlarship',"ရ");
		//$this->db->like($searchparams,'','after');
		$this->db->where('s_major',$searchparams['s_major']);		
		$this->db->order_by('s_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	
	function scholarship_count_all_search_do_class($searchparams,$u_id){	
	$this->db->where('u_id =',$u_id);
		$this->db->where('s_schlarship',"ရ");
		//$this->db->like($searchparams,'','after');
		$this->db->where('s_class',$searchparams['s_class']);		
		$this->db->from($this->tbl_parent);		
		$this->db->order_by('s_id','desc');
		return $this->db->count_all_results();		
	} 
	
	function scholarship_get_search_pagedlist_do_class($searchparams,$limit = 10, $offset = 0,$u_id){
		$this->db->where('u_id =',$u_id);
		$this->db->where('s_schlarship',"ရ");
		//$this->db->like($searchparams,'','after');
		$this->db->where('s_class',$searchparams['s_class']);		
		$this->db->order_by('s_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	function scholarship_count_all_search_major_class($searchparams,$u_id){	
		$this->db->where('u_id =',$u_id);
		$this->db->where('s_schlarship',"ရ");
		$this-> db-> where('s_major',$searchparams['s_major']);
		$this-> db-> where('s_class',$searchparams['s_class']);
		$this->db->from($this->tbl_parent);	
		$this->db->order_by('s_id','desc');	
		return $this->db->count_all_results();		
	} 
	
	function scholarship_get_search_pagedlist_major_class($searchparams,$limit = 10, $offset = 0,$u_id){
		$this->db->where('u_id =',$u_id);
		$this->db->where('s_schlarship',"ရ");
		$this-> db-> where('s_major',$searchparams['s_major']);
		$this-> db-> where('s_class',$searchparams['s_class']);
		$this->db->order_by('s_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
		/*
	 * Scholarship query model end
	 */
		/*
	 * Study_fund query model start
	 */
	function fund_count_all_query($u_id){				
		$this->db->where('u_id', $u_id);
		$this->db->where('s_study_fund','ရ');
		$this->db->from('student_personal_tbl');
		return $this->db->count_all_results();		
	}
	function fund_get_paged_list($limit = 10, $offset = 0,$u_id){
		$this->db->where('u_id =',$u_id);
		$this->db->where('s_study_fund',"ရ");
		$this->db->order_by('s_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	
	function fund_count_all_search_do_major($searchparams,$u_id){	
		$this->db->where('u_id =',$u_id);
		$this->db->where('s_study_fund',"ရ");
		//$this->db->like($searchparams,'','after');		
		$this->db->where('s_major',$searchparams['s_major']);
		$this->db->from($this->tbl_parent);		
		$this->db->order_by('s_id','desc');
		return $this->db->count_all_results();		
	} 
	
	function fund_get_search_pagedlist_do_major($searchparams,$limit = 10, $offset = 0,$u_id){
		$this->db->where('u_id =',$u_id);
		$this->db->where('s_study_fund',"ရ");
		//$this->db->like($searchparams,'','after');
		$this->db->where('s_major',$searchparams['s_major']);		
		$this->db->order_by('s_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	
	function fund_count_all_search_do_class($searchparams,$u_id){	
	$this->db->where('u_id =',$u_id);
		$this->db->where('s_study_fund',"ရ");
		//$this->db->like($searchparams,'','after');
		$this->db->where('s_class',$searchparams['s_class']);		
		$this->db->from($this->tbl_parent);		
		$this->db->order_by('s_id','desc');
		return $this->db->count_all_results();		
	} 
	
	function fund_get_search_pagedlist_do_class($searchparams,$limit = 10, $offset = 0,$u_id){
		$this->db->where('u_id =',$u_id);
		$this->db->where('s_study_fund',"ရ");
		//$this->db->like($searchparams,'','after');
		$this->db->where('s_class',$searchparams['s_class']);		
		$this->db->order_by('s_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	function fund_count_all_search_major_class($searchparams,$u_id){	
		$this->db->where('u_id =',$u_id);
		$this->db->where('s_study_fund',"ရ");
		$this-> db-> where('s_major',$searchparams['s_major']);
		$this-> db-> where('s_class',$searchparams['s_class']);
		$this->db->from($this->tbl_parent);	
		$this->db->order_by('s_id','desc');	
		return $this->db->count_all_results();		
	} 
	
	function fund_get_search_pagedlist_major_class($searchparams,$limit = 10, $offset = 0,$u_id){
		$this->db->where('u_id =',$u_id);
		$this->db->where('s_study_fund',"ရ");
		$this-> db-> where('s_major',$searchparams['s_major']);
		$this-> db-> where('s_class',$searchparams['s_class']);
		$this->db->order_by('s_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
		/*
	 * Study fund query model end
	 */
		/*
	 * Fee free query model start
	 */
	function fee_free_count_all_query($u_id){				
		$this->db->where('u_id', $u_id);
		$this->db->where('s_fee_free','ရ');
		$this->db->from('student_personal_tbl');
		return $this->db->count_all_results();		
	}
	function fee_free_get_paged_list($limit = 10, $offset = 0,$u_id){
		$this->db->where('u_id =',$u_id);
		$this->db->where('s_fee_free',"ရ");
		$this->db->order_by('s_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	
	function fee_free_count_all_search_do_major($searchparams,$u_id){	
		$this->db->where('u_id =',$u_id);
		$this->db->where('s_fee_free',"ရ");
		//$this->db->like($searchparams,'','after');		
		$this->db->where('s_major',$searchparams['s_major']);
		$this->db->from($this->tbl_parent);		
		$this->db->order_by('s_id','desc');
		return $this->db->count_all_results();		
	} 
	
	function fee_free_get_search_pagedlist_do_major($searchparams,$limit = 10, $offset = 0,$u_id){
		$this->db->where('u_id =',$u_id);
		$this->db->where('s_fee_free',"ရ");
		//$this->db->like($searchparams,'','after');
		$this->db->where('s_major',$searchparams['s_major']);		
		$this->db->order_by('s_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	
	function fee_free_count_all_search_do_class($searchparams,$u_id){	
	$this->db->where('u_id =',$u_id);
		$this->db->where('s_fee_free',"ရ");
		//$this->db->like($searchparams,'','after');
		$this->db->where('s_class',$searchparams['s_class']);		
		$this->db->from($this->tbl_parent);		
		$this->db->order_by('s_id','desc');
		return $this->db->count_all_results();		
	} 
	
	function fee_free_get_search_pagedlist_do_class($searchparams,$limit = 10, $offset = 0,$u_id){
		$this->db->where('u_id =',$u_id);
		$this->db->where('s_fee_free',"ရ");
		//$this->db->like($searchparams,'','after');
		$this->db->where('s_class',$searchparams['s_class']);		
		$this->db->order_by('s_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	function fee_free_count_all_search_major_class($searchparams,$u_id){	
		$this->db->where('u_id =',$u_id);
		$this->db->where('s_fee_free',"ရ");
		$this-> db-> where('s_major',$searchparams['s_major']);
		$this-> db-> where('s_class',$searchparams['s_class']);
		$this->db->from($this->tbl_parent);	
		$this->db->order_by('s_id','desc');	
		return $this->db->count_all_results();		
	} 
	
	function fee_free_get_search_pagedlist_major_class($searchparams,$limit = 10, $offset = 0,$u_id){
		$this->db->where('u_id =',$u_id);
		$this->db->where('s_fee_free',"ရ");
		$this-> db-> where('s_major',$searchparams['s_major']);
		$this-> db-> where('s_class',$searchparams['s_class']);
		$this->db->order_by('s_id','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
		/*
	 * Fee free query model end
	 */
		/*
	* pagination start
	*/
	function get_posts($u_id,$limit = NULL, $offset = NULL)
	{
		$this->db->limit($limit, $offset);
		$this->db->distinct();	
		$this->db->select('s_hometown');
		$this->db->where('u_id',$u_id);
		
		return $this->db->get('student_personal_tbl');
	}
	
	function count_posts($u_id)
	{
		$query = $this->db->query('SELECT distinct(s_hometown) FROM student_personal_tbl where u_id ='. $u_id);
		return $query->num_rows();
//		$this->db->select('count(s_hometown) as c_hometown');
//		$this->db->where('u_id',$u_id);
//		$this->db->from('student_personal_tbl');
//		return $this->db->get();
		
//		return $this->db->select_count($query);
	}	
	/*
	* pagination end
	*/
}
?>