<?php
class Teacher_model extends Model
{
	private $tbl_parent= 'teacher_personal_tbl';
	function teacher_model()
	{
		parent::Model();
	}
	
	function teacher_insert($t_u_id,$teacher_sno,$teacher_name,$photo)
	{
		$query_str="INSERT INTO teacher_personal_tbl(u_id,t_serial_no,t_name,t_photo_location) Value(?,?,?,?)";
		$this->db->query($query_str,array($t_u_id,$teacher_sno,$teacher_name,$photo));		
		$s_valid_id = $this->db->insert_id();
		redirect('off_biography/officer_biography/'.$s_valid_id,'refresh');
	}
	
	public function check_teacher_no($teacher_sno)
	{
		$this -> db -> where("t_serial_no",$teacher_sno);
		$query = $this -> db -> get("teacher_personal_tbl");
		if($query -> num_rows() >0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	function teacher_insert_detail(
			$u_id,$teacher_id,$t_alias_name,$t_other_name,$t_age,$t_birth_day,$t_birth_month,$t_birth_year,
			$t_native_town,$t_gender,$t_religious,$t_race,$t_nrc,$t_height,$t_weight,$t_hair_color,$t_eyes_color,
			$t_unique_sign,$t_phd_course,$t_phd_course_box,$t_nation_foreign,$t_post,$t_department,$t_last_degree,$t_major,
			$t_personnel_day,$t_personnel_month,$t_personnel_year,$t_current_address,$t_permanent_address,
			$t_degree1,$t_major1,$t_year1,$t_grade1,$t_degree2,$t_major2,$t_year2,$t_grade2,
			$t_degree3,$t_major3,$t_year3,$t_grade3,$t_degree4,$t_major4,$t_year4,$t_grade4)
	{
		$query_str="UPDATE teacher_personal_tbl SET
		t_alias_name='$t_alias_name',t_other_name='$t_other_name',t_age='$t_age',t_birth_day='$t_birth_day',
		t_birth_month='$t_birth_month',t_birth_year='$t_birth_year',t_native_town='$t_native_town',
		t_gender='$t_gender',t_religious='$t_religious',	t_race='$t_race',t_nrc='$t_nrc',t_height='$t_height',
		t_weight='$t_weight',t_hair_color='$t_hair_color',	t_eyes_color='$t_eyes_color',t_unique_sign='$t_unique_sign',
		t_phd_attend='$t_phd_course',t_phd_attend_level ='$t_phd_course_box',t_nation_foreign='$t_nation_foreign',t_promotion='$t_post',
		t_depeartment='$t_department',t_degree='$t_last_degree',t_major='$t_major',personnel_day='$t_personnel_day',
		personnel_month='$t_personnel_month',personnel_year='$t_personnel_year',t_current_address='$t_current_address',
		t_permanent_address='$t_permanent_address'
		where t_id='$teacher_id' ";
		$this->db->query($query_str,array(
			$teacher_id,$t_alias_name,$t_other_name,$t_age,$t_birth_day,$t_birth_month,$t_birth_year,
			$t_native_town,$t_gender,$t_religious,$t_race,$t_nrc,$t_height,$t_weight,$t_hair_color,$t_eyes_color,
			$t_unique_sign,$t_phd_course,$t_phd_course_box,$t_nation_foreign,$t_post,$t_department,$t_last_degree,$t_major,
			$t_personnel_day,$t_personnel_month,$t_personnel_year,$t_current_address,$t_permanent_address));
			
//		$t_id = $this->db->insert_id();
		
		$query_str="INSERT INTO teacher_qualify_tbl 
		(t_id,u_id,t_degree1,t_major1,t_year1,t_grade1,t_degree2,t_major2,t_year2,t_grade2,t_degree3,t_major3,t_year3,t_grade3,t_degree4,t_major4,t_year4,t_grade4)
		Value(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$this->db->query($query_str,array(	$teacher_id,$u_id,$t_degree1,$t_major1,$t_year1,$t_grade1,
															$t_degree2,$t_major2,$t_year2,$t_grade2,
															$t_degree3,$t_major3,$t_year3,$t_grade3,
															$t_degree4,$t_major4,$t_year4,$t_grade4));
		
																	
		$back_to = 'off_biography/officer_biography_show/'.$teacher_id;
		redirect($back_to,'refresh');		
	}
	
	function teacher_update_detail(
			$u_id,$teacher_id,$t_alias_name,$t_other_name,$t_age,$t_birth_day,$t_birth_month,$t_birth_year,
			$t_native_town,$t_gender,$t_religious,$t_race,$t_nrc,$t_height,$t_weight,$t_hair_color,$t_eyes_color,
			$t_unique_sign,$t_phd_course,$t_phd_course_box,$t_nation_foreign,$t_post,$t_department,$t_last_degree,$t_major,
			$t_personnel_day,$t_personnel_month,$t_personnel_year,$t_current_address,$t_permanent_address,
			$t_degree1,$t_major1,$t_year1,$t_grade1,$t_degree2,$t_major2,$t_year2,$t_grade2,
			$t_degree3,$t_major3,$t_year3,$t_grade3,$t_degree4,$t_major4,$t_year4,$t_grade4)
	{
		$query_str="UPDATE teacher_personal_tbl SET
		t_alias_name='$t_alias_name',t_other_name='$t_other_name',t_age='$t_age',t_birth_day='$t_birth_day',
		t_birth_month='$t_birth_month',t_birth_year='$t_birth_year',t_native_town='$t_native_town',
		t_gender='$t_gender',t_religious='$t_religious',	t_race='$t_race',t_nrc='$t_nrc',t_height='$t_height',
		t_weight='$t_weight',t_hair_color='$t_hair_color',	t_eyes_color='$t_eyes_color',t_unique_sign='$t_unique_sign',
		t_phd_attend='$t_phd_course',t_phd_attend_level ='$t_phd_course_box',t_nation_foreign='$t_nation_foreign',t_promotion='$t_post',
		t_depeartment='$t_department',t_degree='$t_last_degree',t_major='$t_major',personnel_day='$t_personnel_day',
		personnel_month='$t_personnel_month',personnel_year='$t_personnel_year',t_current_address='$t_current_address',
		t_permanent_address='$t_permanent_address'
		where t_id='$teacher_id' ";
		$this->db->query($query_str,array(
			$teacher_id,$t_alias_name,$t_other_name,$t_age,$t_birth_day,$t_birth_month,$t_birth_year,
			$t_native_town,$t_gender,$t_religious,$t_race,$t_nrc,$t_height,$t_weight,$t_hair_color,$t_eyes_color,
			$t_unique_sign,$t_phd_course,$t_phd_course_box,$t_nation_foreign,$t_post,$t_department,$t_last_degree,$t_major,
			$t_personnel_day,$t_personnel_month,$t_personnel_year,$t_current_address,$t_permanent_address));
			
//		$t_id = $this->db->insert_id();
		
		$query_str="UPDATE teacher_qualify_tbl SET
							t_degree1='$t_degree1',t_major1='$t_major1',t_year1='$t_year1',t_grade1='$t_grade1',
							t_degree2='$t_degree2',t_major2='$t_major2',t_year2='$t_year2',t_grade2='$t_grade2',
							t_degree3='$t_degree3',	t_major3='$t_major3',t_year3='$t_year3',t_grade3='$t_grade3',	
							t_degree4='$t_degree4',	t_major4='$t_major4',t_year4='$t_year4',t_grade4='$t_grade4'
						where t_id='$teacher_id' ";
		$this->db->query($query_str,array($t_degree1,$t_major1,$t_year1,$t_grade1,
															$t_degree2,$t_major2,$t_year2,$t_grade2,
															$t_degree3,$t_major3,$t_year3,$t_grade3,
															$t_degree4,$t_major4,$t_year4,$t_grade4));
		
																	
		$back_to = 'off_biography/officer_biography_show/'.$teacher_id;
		redirect($back_to,'refresh');		
	}
		
	function pre_teacher_insert_with_photo($t_teacher_id,$t_teacher_sno,$t_teacher_name,$t_photo_location)
	{
		$query_str="UPDATE teacher_personal_tbl SET
		t_serial_no='$t_teacher_sno',t_name='$t_teacher_name',t_photo_location='$t_photo_location'
		where t_id='$t_teacher_id' ";
		$this->db->query($query_str,array($t_teacher_id,$t_teacher_sno,$t_teacher_name,$t_photo_location));
		redirect('off_biography/officer_biography/'.$t_teacher_id,'refresh');
	}
	
	function pre_teacher_insert_without_photo($t_teacher_id,$t_teacher_sno,$t_teacher_name)
	{
		$query_str="UPDATE teacher_personal_tbl SET
		t_serial_no='$t_teacher_sno',t_name='$t_teacher_name'
		where t_id='$t_teacher_id' ";
		$this->db->query($query_str,array($t_teacher_id,$t_teacher_sno,$t_teacher_name));
		redirect('off_biography/officer_biography/'.$t_teacher_id,'refresh');
	}	
	
	function pre_teacher_insert_again_with_photo($t_teacher_id,$t_teacher_sno,$t_teacher_name,$t_photo_location)
	{
		$query_str="UPDATE teacher_personal_tbl SET
		t_serial_no='$t_teacher_sno',t_name='$t_teacher_name',t_photo_location='$t_photo_location'
		where t_id='$t_teacher_id' ";
		$this->db->query($query_str,array($t_teacher_id,$t_teacher_sno,$t_teacher_name,$t_photo_location));
		redirect('off_biography/edit_officer_biography/'.$t_teacher_id,'refresh');
	}
	
	function pre_teacher_insert_again_without_photo($t_teacher_id,$t_teacher_sno,$t_teacher_name)
	{
		$query_str="UPDATE teacher_personal_tbl SET
		t_serial_no='$t_teacher_sno',t_name='$t_teacher_name'
		where t_id='$t_teacher_id' ";
		$this->db->query($query_str,array($t_teacher_id,$t_teacher_sno,$t_teacher_name));
		redirect('off_biography/edit_officer_biography/'.$t_teacher_id,'refresh');
	}	
	
	function check_pre_teacher_no($t_teacher_sno,$t_teacher_id)
	{
		$this -> db -> where("t_serial_no",$t_teacher_sno);
		$this -> db -> where("t_id !=",$t_teacher_id);
		$query = $this -> db -> get("teacher_personal_tbl");
		if($query -> num_rows() >0)
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	
	function count_all_query($u_id){				
		$this->db->where('u_id', $u_id);
		$this->db->from('teacher_personal_tbl');
		return $this->db->count_all_results();		
	}
	function get_paged_list($limit = 10, $offset = 0,$u_id){
		$this->db->where('u_id =',$u_id);
		$this->db->order_by('t_id','desc');
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

	 	
		function get_posts_professor_list($u_id,$limit = NULL, $offset = NULL)
	{
		$this->db->limit($limit, $offset);
		$this->db->distinct();	
		$this->db->select('major,class_head');
		$this->db->where('u_id',$u_id);
		
		return $this->db->get('major_tbl');
	}
	
	function count_posts_professor_list($u_id)
	{
		$query = $this->db->query('SELECT * FROM major_tbl where u_id ='. $u_id);
		return $query->num_rows();

	}	
		 	
		function get_posts_national_phd_demonstrator_list($u_id,$limit = NULL, $offset = NULL)
	{
		$this->db->limit($limit, $offset);	
		$this->db->select('*');
		$this->db->where('u_id',$u_id);
		$this->db->where('t_promotion','နည္းျပ');
		$this->db->where('t_nation_foreign','ျပည္တြင္း');	
			$this->db->like('t_degree','Phd');	
		return $this->db->get('teacher_personal_tbl ');
	}
	
	function count_posts_national_phd_demonstrator_list($u_id)
	{
		$this->db->where('u_id', $u_id);
		$this->db->where('t_promotion','နည္းျပ');
		$this->db->where('t_nation_foreign','ျပည္တြင္း');	
		$this->db->like('t_degree','Phd');	
		$this->db->from('teacher_personal_tbl');
		return $this->db->count_all_results();		

	}	
	
		function get_posts_national_phd_colecturer_list($u_id,$limit = NULL, $offset = NULL)
	{
		$this->db->limit($limit, $offset);	
		$this->db->select('*');
		$this->db->where('u_id',$u_id);
		$this->db->where('t_promotion','လ/ထ ကထိက');
		$this->db->where('t_nation_foreign','ျပည္တြင္း');	
	$this->db->like('t_degree','Phd');	
		return $this->db->get('teacher_personal_tbl ');
	}
	
	function count_posts_national_phd_colecturer_list($u_id)
	{
		$this->db->where('u_id', $u_id);
			$this->db->where('t_promotion','လ/ထ ကထိက');
		$this->db->where('t_nation_foreign','ျပည္တြင္း');	
	$this->db->like('t_degree','Phd');	
		$this->db->from('teacher_personal_tbl');
		return $this->db->count_all_results();		

	}	
			function get_posts_national_phd_lecturer_list($u_id,$limit = NULL, $offset = NULL)
	{
		$this->db->limit($limit, $offset);	
		$this->db->select('*');
		$this->db->where('u_id',$u_id);
		$this->db->where('t_promotion','ကထိက');
		$this->db->where('t_nation_foreign','ျပည္တြင္း');	
		$this->db->like('t_degree','Phd');	
		return $this->db->get('teacher_personal_tbl ');
	
	}
	
	function count_posts_national_phd_lecturer_list($u_id)
	{
		$this->db->where('u_id', $u_id);
			$this->db->where('t_promotion','ကထိက');
		$this->db->where('t_nation_foreign','ျပည္တြင္း');	
	$this->db->like('t_degree','Phd');	
		$this->db->from('teacher_personal_tbl');
		return $this->db->count_all_results();		

	}	
				function get_posts_national_phd_coprofessor_list($u_id,$limit = NULL, $offset = NULL)
	{
		$this->db->limit($limit, $offset);	
		$this->db->select('*');
		$this->db->where('u_id',$u_id);
		$this->db->where('t_promotion','တြဲဖက္ ပါေမာကၡ');
		$this->db->where('t_nation_foreign','ျပည္တြင္း');	
		$this->db->like('t_degree','Phd');	
		return $this->db->get('teacher_personal_tbl ');
	
	
	}
	
	function count_posts_national_phd_coprofessor_list($u_id)
	{
		$this->db->where('u_id', $u_id);
		$this->db->where('t_promotion','တြဲဖက္ ပါေမာကၡ');
		$this->db->where('t_nation_foreign','ျပည္တြင္း');	
		$this->db->like('t_degree','Phd');	
		$this->db->from('teacher_personal_tbl');
		return $this->db->count_all_results();		

	}	
				function get_posts_foreign_phd_professor_list($u_id,$limit = NULL, $offset = NULL)
	{
		$this->db->limit($limit, $offset);	
		$this->db->select('*');
		$this->db->where('u_id',$u_id);
		$this->db->where('t_promotion','ပါေမာကၡ');
		$this->db->where('t_nation_foreign','ျပည္ပ');	
	$this->db->like('t_degree','Phd');	
		return $this->db->get('teacher_personal_tbl ');
	
	
	}
	
	function count_posts_foreign_phd_professor_list($u_id)
	{
		$this->db->where('u_id', $u_id);
		$this->db->where('t_promotion','ပါေမာကၡ');
		$this->db->where('t_nation_foreign','ျပည္ပ');	
		$this->db->like('t_degree','Phd');	
		$this->db->from('teacher_personal_tbl');
		return $this->db->count_all_results();		

	}	
		function get_posts_national_phd_professor_list($u_id,$limit = NULL, $offset = NULL)
	{
		$this->db->limit($limit, $offset);	
		$this->db->select('*');
		$this->db->where('u_id',$u_id);
		$this->db->where('t_promotion','ပါေမာကၡ');
			$this->db->where('t_nation_foreign','ျပည္တြင္း');	
	$this->db->like('t_degree','Phd');	
		return $this->db->get('teacher_personal_tbl ');
	
	
	}
	
	function count_posts_national_phd_professor_list($u_id)
	{
		$this->db->where('u_id', $u_id);
		$this->db->where('t_promotion','ပါေမာကၡ');
			$this->db->where('t_nation_foreign','ျပည္တြင္း');	
		$this->db->like('t_degree','Phd');	
		$this->db->from('teacher_personal_tbl');
		return $this->db->count_all_results();		

	}
	
	function teacher_delete($deleid3)
	{
		$query_str="DELETE from teacher_personal_tbl where t_id='$deleid3' ";
		$this->db->query($query_str,array($deleid3));
		$query_str1="DELETE from teacher_qualify_tbl where t_id='$deleid3' ";
		$this->db->query($query_str1,array($deleid3));
		$query_str2="DELETE from teacher_course_tbl where t_id='$deleid3' ";
		$this->db->query($query_str2,array($deleid3));
		$query_str3="DELETE from teacher_abroad_tbl where t_id='$deleid3' ";
		$this->db->query($query_str3,array($deleid3));
		$query_str4="DELETE from teacher_father_tbl where t_id='$deleid3' ";
		$this->db->query($query_str4,array($deleid3));
		$query_str5="DELETE from teacher_mother_tbl where t_id='$deleid3' ";
		$this->db->query($query_str5,array($deleid3));
		$query_str6="DELETE from teacher_partner_tbl where t_id='$deleid3' ";
		$this->db->query($query_str6,array($deleid3));
		$query_str7="DELETE from teacher_partner_father_tbl where t_id='$deleid3' ";
		$this->db->query($query_str7,array($deleid3));
		$query_str8="DELETE from teacher_partner_mother_tbl where t_id='$deleid3' ";
		$this->db->query($query_str8,array($deleid3));
		$query_str9="DELETE from teacher_cousin_tbl where t_id='$deleid3' ";
		$this->db->query($query_str9,array($deleid3));
		$query_str10="DELETE from teacher_punish_tbl where t_id='$deleid3' ";
		$this->db->query($query_str10,array($deleid3));
		$query_str13="DELETE from teacher_lawsuit_tbl where t_id='$deleid3' ";
		$this->db->query($query_str13,array($deleid3));
		$query_str11="DELETE from teacher_honor_tbl where t_id='$deleid3' ";
		$this->db->query($query_str11,array($deleid3));
		$query_str12="DELETE from teacher_abroad_case_tbl where t_id='$deleid3' ";
		$this->db->query($query_str12,array($deleid3));
		$query_str14="DELETE from teacher_child_tbl where t_id='$deleid3' ";
		$this->db->query($query_str14,array($deleid3));
		$query_str15="DELETE from teacher_abroad_family_tbl where t_id='$deleid3' ";
		$this->db->query($query_str15,array($deleid3));
		redirect('_teacher/officer_list/','refresh');
	}
	
	function get_posts_officer_transfer_list($u_id,$limit = NULL, $offset = NULL)
	{
		$this->db->limit($limit, $offset);
		$this->db->distinct();	
		$this->db->select('t_id,pre_department,prev_promotion,tran_u_id');
		$this->db->where('prev_u_id',$u_id);		
		return $this->db->get('transfer_teacher_tbl');
	}
	
	function count_posts_officer_transfer_list($u_id)
	{
		$query = $this->db->query('SELECT * FROM transfer_teacher_tbl where prev_u_id ='. $u_id);
		return $query->num_rows();
	}	
} ?>