<?php
class Student_model extends Model
{
	private $tbl_parent= 'student_personal_tbl';
	function Student_model()
	{
		parent::Model();
	}
	
	function student_insert($s_u_id,$student_sno,$student_name,$photo)
	{
		$query_str="INSERT INTO student_personal_tbl(u_id,s_serial_no,s_name,s_photo_location) Value(?,?,?,?)";
		$this->db->query($query_str,array($s_u_id,$student_sno,$student_name,$photo));		
		$s_valid_id = $this->db->insert_id();
		redirect('std_biography/student_biography/'.$s_valid_id,'refresh');
	}
	
	public function check_student_no($student_sno)
	{
		$this -> db -> where("s_serial_no",$student_sno);
		$query = $this -> db -> get("student_personal_tbl");
		if($query -> num_rows() >0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function student_insert_detail(
	$user_id,$s_serial_no,$s_name,$s_alias_name, $s_other_name, $s_father_name,
	$s_age , $s_birth_day,$s_birth_month,$s_birth_year, $s_native_town,$s_gender, $s_religious,
	$s_race,$s_nrc,$s_father_nrc,$s_mother_nrc,$s_height,
	$s_weight, $s_hair_color, $s_eyes_color, $s_unique_sign, $s_major,
	$s_last_rollno, $s_current_rollno, $s_class,$s_schlarship1, $s_study_fund1,
	$s_fee_free1 , $s_hometown ,$s_current_address,$s_permanent_address)
	{
		$query_str="UPDATE student_personal_tbl SET
		s_name='$s_name',s_alias_name='$s_alias_name',s_other_name='$s_other_name',
		s_father_name='$s_father_name', s_age ='$s_age' ,
		s_birth_day='$s_birth_day',s_birth_month='$s_birth_month', s_birth_year='$s_birth_year',
		s_native_town='$s_native_town',s_gender='$s_gender',s_religious ='$s_religious',
		s_race='$s_race',s_nrc='$s_nrc',s_father_nrc ='$s_father_nrc',
		s_mother_nrc='$s_mother_nrc', s_height ='$s_height', s_weight='$s_weight',
		s_hair_color='$s_hair_color',s_eyes_color='$s_eyes_color',s_unique_sign='$s_unique_sign',
		s_major='$s_major', s_last_rollno='$s_last_rollno',s_current_rollno='$s_current_rollno',
		s_class ='$s_class',s_schlarship ='$s_schlarship1', s_study_fund ='$s_study_fund1',
		s_fee_free='$s_fee_free1',s_hometown ='$s_hometown',s_current_address='$s_current_address',
		s_permanent_address=' $s_permanent_address'
		where s_id='$user_id' ";
		$this->db->query($query_str,array(
		$user_id,$s_serial_no,$s_name,$s_alias_name, $s_other_name, $s_father_name,
		$s_age , $s_birth_day,$s_birth_month,$s_birth_year, $s_native_town,$s_gender, $s_religious,
		$s_race,$s_nrc,$s_father_nrc,$s_mother_nrc,$s_height,
		$s_weight,$s_hair_color, $s_eyes_color,$s_unique_sign, $s_major,
		$s_last_rollno,$s_current_rollno,$s_class,$s_schlarship1,$s_study_fund1,
		$s_fee_free1,$s_hometown,$s_current_address,$s_permanent_address));
		$back_to = 'std_biography/std_biography_show/'.$user_id;
		redirect($back_to,'refresh');		
	}
	
	function student_insert_detail_with_photo(
	$user_id,$s_serial_no,$s_name,$s_alias_name, $s_other_name, $s_father_name,
	$s_photo_location,$s_age , $s_birth_day,$s_birth_month,$s_birth_year, $s_native_town,$s_gender, $s_religious,
	$s_race,$s_nrc,$s_father_nrc,$s_mother_nrc,$s_height,
	$s_weight, $s_hair_color, $s_eyes_color, $s_unique_sign, $s_major,
	$s_last_rollno, $s_current_rollno, $s_class,$s_schlarship1, $s_study_fund1,
	$s_fee_free1 , $s_hometown ,$s_current_address,$s_permanent_address)
	{
		$query_str="UPDATE student_personal_tbl SET
		s_name='$s_name', s_alias_name='$s_alias_name',s_other_name='$s_other_name',
		s_father_name='$s_father_name',s_photo_location='$s_photo_location', s_age ='$s_age' ,
		s_birth_day='$s_birth_day',s_birth_month='$s_birth_month', s_birth_year='$s_birth_year',
		s_native_town='$s_native_town',s_gender='$s_gender',s_religious ='$s_religious',
		s_race=' $s_race',s_nrc='$s_nrc',s_father_nrc ='$s_father_nrc',
		s_mother_nrc='$s_mother_nrc', s_height ='$s_height', s_weight='$s_weight',
		s_hair_color='$s_hair_color',s_eyes_color='$s_eyes_color',s_unique_sign='$s_unique_sign',
		s_major='$s_major', s_last_rollno='$s_last_rollno',s_current_rollno='$s_current_rollno',
		s_class ='$s_class',s_schlarship ='$s_schlarship1', s_study_fund ='$s_study_fund1',
		s_fee_free='$s_fee_free1',s_hometown ='$s_hometown',s_current_address='$s_current_address',
		s_permanent_address='$s_permanent_address'
		where s_id='$user_id' ";
		$this->db->query($query_str,array(
		$user_id,$s_serial_no,$s_name,$s_alias_name, $s_other_name, $s_father_name,
		$s_photo_location,$s_age , $s_birth_day,$s_birth_month,$s_birth_year, $s_native_town,$s_gender, $s_religious,
		$s_race,$s_nrc,$s_father_nrc,$s_mother_nrc,$s_height,
		$s_weight,$s_hair_color, $s_eyes_color,$s_unique_sign, $s_major,
		$s_last_rollno,$s_current_rollno,$s_class,$s_schlarship1,$s_study_fund1,
		$s_fee_free1,$s_hometown,$s_current_address,$s_permanent_address));
		redirect('std_biography/std_biography_show/'.$user_id,'refresh');	
	}
	
	function pre_student_insert_with_photo($s_student_id,$s_student_sno,$s_student_name,$s_student_file)
	{
		$query_str="UPDATE student_personal_tbl SET
		s_serial_no='$s_student_sno',s_name='$s_student_name',s_photo_location='$s_student_file'
		where s_id='$s_student_id' ";
		$this->db->query($query_str,array($s_student_sno,$s_student_name,$s_student_file));		
		redirect('std_biography/student_biography/'.$s_student_id,'refresh');
		}
	
	function pre_student_insert_without_photo($s_student_id,$s_student_sno,$s_student_name)
	{
		$query_str="UPDATE student_personal_tbl SET
		s_serial_no='$s_student_sno',s_name='$s_student_name'
		where s_id='$s_student_id' ";
		$this->db->query($query_str,array($s_student_id,$s_student_sno,$s_student_name));
		redirect('std_biography/student_biography/'.$s_student_id,'refresh');
	}
	
	function pre_student_insert_again_with_photo($s_student_id,$s_student_sno,$s_student_name,$s_student_file)
	{
		$query_str="UPDATE student_personal_tbl SET
		s_serial_no='$s_student_sno',s_name='$s_student_name',s_photo_location='$s_student_file'
		where s_id='$s_student_id' ";
		$this->db->query($query_str,array($s_student_sno,$s_student_name,$s_student_file));		
		redirect('std_biography/edit_student_biography/'.$s_student_id,'refresh');
		}
	
	function pre_student_insert_again_without_photo($s_student_id,$s_student_sno,$s_student_name)
	{
		$query_str="UPDATE student_personal_tbl SET
		s_serial_no='$s_student_sno',s_name='$s_student_name'
		where s_id='$s_student_id' ";
		$this->db->query($query_str,array($s_student_id,$s_student_sno,$s_student_name));
		redirect('std_biography/edit_student_biography/'.$s_student_id,'refresh');
	}
	
	function student_delete($deleid3)
	{
		$query_str="DELETE from student_personal_tbl where s_id='$deleid3' ";
		$this->db->query($query_str,array($deleid3));
		redirect('_student/student_list/','refresh');
	}
	
	//for pagin start
	function count_all_query($u_id){				
		$this->db->where('u_id', $u_id);
		$this->db->from('student_personal_tbl');
		return $this->db->count_all_results();		
	}
	function get_paged_list($limit = 10, $offset = 0,$u_id){
		$this->db->where('u_id =',$u_id);
		$this->db->order_by('s_id 	','desc');
		return $this->db->get($this->tbl_parent, $limit, $offset);
	}
	
	function get_search_pagedlist($searchparams,$limit = 10, $offset = 0,$u_id){
 		$this->db->where('u_id =',$u_id);
		$this->db->like($searchparams,'','after');		
 			
		return $this->db->get($this->tbl_parent, $limit, $offset,$u_id);
	}
	function count_all_search($searchparams,$u_id){		
		$this->db->where('u_id =',$u_id);
		$this->db->like($searchparams,'','after');		
		$this->db->from($this->tbl_parent);		
		return $this->db->count_all_results();		
	}
	//for pagin end	
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