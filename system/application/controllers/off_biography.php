<?php 
ob_start(); 
class off_biography extends Controller{
	function off_biography()
	{
		parent::Controller();
		
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		//$this->load->scaffolding('entries');
	}
	
	function pre_officer_biography()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - ဝန္ထမ္းကိုယ္ေရးရာဇဝင္ျဖည့္ရန္";
		$data['here'] = "id='here'";
		$data['id'] = "0";			
		$this->load->view('includes/inner_header',$data);
		$this->load->view('pre_officer_biography');
		$this->load->view('includes/footer');
	}
	
	function pre_edit_officer_biography()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - ေက်ာင္းသားကိုယ္ေရးရာဇဝင္ျဖည့္ရန္";
		$data['here14'] = "id='here'";		
		$data['id'] = "0";
		$this->load->view('includes/inner_header',$data);
		$this->load->view('pre_edit_officer_biography');
		$this->load->view('includes/footer');
	 }
	
	
	function pre_edit_officer_biography_process()
	{
		$config['upload_path'] =APPPATH .'teacher_photos/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|GIF|PNG';
		$config['max_size'] = '9000000';
		$config['max_width'] = '9024';
		$config['max_height'] = '7680';
		$this->load->library('upload', $config);

/*		$this->form_validation->set_message('required','ဤေနရာတြင္ ျဖည့္စြက္ပါ');
		$this->form_validation->set_rules('teacher_name', 'teacher_name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('edit_teacher_file','edit_teacher_file','trim|xss_clean|callback_check_upload_photo');
		$this->form_validation->set_rules('teacher_sno','teacher_sno','trim|required|min_length[4]|xss_clean|callback_check_pre_teacher_sno');
*/		
		$this->load->model('teacher_model','',TRUE);
		$t_teacher_sno=ltrim($this->input->post('teacher_sno'));
		$t_teacher_name=ltrim($this->input->post('teacher_name'));
		$t_teacher_id=ltrim($this->input->post('teacher_id'));
			
/*		if ($this->form_validation->run()==FALSE){			
			$this->pre_officer_biography();
			//echo "not successfull";
		}
		else{  */ 
			if($this->upload->do_upload('edit_teacher_file'))
			{
				$upload_data= $this->upload->data();
				$t_photo_location= $upload_data['file_name'];
				
				$this->teacher_model->pre_teacher_insert_with_photo($t_teacher_id,$t_teacher_sno,$t_teacher_name,$t_photo_location);
			}
			else{
				$this->teacher_model->pre_teacher_insert_without_photo($t_teacher_id,$t_teacher_sno,$t_teacher_name);			
			}
//		}	
	}
	
	function pre_edit_officer_biography_again()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - ေက်ာင္းသားကိုယ္ေရးရာဇဝင္ျပင္ရန္";
		$data['here14'] = "id='here'";		
		$data['id'] = "0";
		$this->load->view('includes/inner_header',$data);
		$this->load->view('pre_edit_officer_biography_again');
		$this->load->view('includes/footer');
	 }
	
	
	function pre_edit_officer_biography_process_again()
	{
		$config['upload_path'] =APPPATH .'teacher_photos/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|GIF|PNG';
		$config['max_size'] = '9000000';
		$config['max_width'] = '9024';
		$config['max_height'] = '7680';
		$this->load->library('upload', $config);

/*		$this->form_validation->set_message('required','ဤေနရာတြင္ ျဖည့္စြက္ပါ');
		$this->form_validation->set_rules('teacher_name', 'teacher_name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('edit_teacher_file','edit_teacher_file','trim|xss_clean|callback_check_upload_photo');
		$this->form_validation->set_rules('teacher_sno','teacher_sno','trim|required|min_length[4]|xss_clean|callback_check_pre_teacher_sno');
*/		
		$this->load->model('teacher_model','',TRUE);
		$t_teacher_sno=ltrim($this->input->post('teacher_sno'));
		$t_teacher_name=ltrim($this->input->post('teacher_name'));
		$t_teacher_id=ltrim($this->input->post('teacher_id'));
			
/*		if ($this->form_validation->run()==FALSE){			
			$this->pre_officer_biography();
			//echo "not successfull";
		}
		else{  */ 
			if($this->upload->do_upload('edit_teacher_file'))
			{
				$upload_data= $this->upload->data();
				$t_photo_location= $upload_data['file_name'];
				
				$this->teacher_model->pre_teacher_insert_again_with_photo($t_teacher_id,$t_teacher_sno,$t_teacher_name,$t_photo_location);
			}
			else{
				$this->teacher_model->pre_teacher_insert_again_without_photo($t_teacher_id,$t_teacher_sno,$t_teacher_name);			
			}
//		}	
	}
	
	function check_pre_teacher_sno(){
		$this->load->model('teacher_model','',TRUE);		
		$t_teacher_sno = $this->input->post('teacher_sno');
		$t_teacher_id = $this->input->post('teacher_id');
		$result = $this->teacher_model->check_pre_teacher_no($t_teacher_sno,$t_teacher_id);
		if ($result){
			$this->form_validation->set_message('check_pre_teacher_sno','ဤဝန္ထမ္းအမွတ္စဥ္ ရိွႏွင့္ၿပီးျဖစ္ပါသည္ ');
			return false;
		}
		else{
			return true;
		}
	}
	
	function officer_biography()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - ဝန္ထမ္းကုိယ္ေရးအခ်က္အလက္";
		$data['here'] = "id='here'";		
		$data['id'] = "0";	
		$this->load->view('includes/inner_header',$data);
		$this->load->view('officer_biography');
		$this->load->view('includes/footer');
	}	
	function officer_biography_show()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - ဝန္ထမ္းကုိယ္ေရးအခ်က္အလက္ အေသးစိတ္";
		$data['here'] = "id='here'";		
		$data['id'] = "0";	
		$this->load->view('includes/biography_header',$data);
		$this->load->view('officer_biography_show');
		$this->load->view('includes/footer');
	}
	function office_biography_process()
	{
		$this->load->model('teacher_model','',TRUE);
		$this->form_validation->set_message('required','ဤေနရာတြင္ ျဖည့္စြက္ပါ');
		$this->form_validation->set_rules('teacher_name', 'teacher_name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('teacher_file','teacher_file','trim|xss_clean|callback_check_upload_photo');
		$this->form_validation->set_rules('teacher_sno','teacher_sno','trim|required|min_length[4]|xss_clean|callback_check_teacher_sno');
		$config['upload_path'] =APPPATH .'teacher_photos/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '9000000';
		$config['max_width'] = '9024';
		$config['max_height'] = '768';
		$this->load->library('upload', $config);
		if ($this->form_validation->run()==FALSE)
		{
			$this->check_upload_photo();
			$this->pre_officer_biography();
//			echo "Not successful!";
		}
		else
		{
			$t_u_id=$this->input->post('u_id');		
			$teacher_name =$this->input->post('teacher_name');
			$teacher_sno =$this->input->post('teacher_sno');
			$upload_data= $this->upload->data();
			$photo= $upload_data['file_name'];
//			echo "Successful!";
			$this->teacher_model->teacher_insert($t_u_id,$teacher_sno,$teacher_name,$photo);
		}	
	}
	
	function check_upload_photo()
	{
		if (!$this->upload->do_upload('teacher_file')){
			$this->form_validation->set_message('check_upload_photo','ဤေနရာတြင္ ဖိုင္မ်ား upload လုပ္ပါ');
			return false;
		}
		else{
			return true;
		}
	}

	function check_teacher_sno($teacher_sno){
		$this->load->model('teacher_model','',TRUE);		
		$teacher_sno = $this->input->post('teacher_sno');
		$result = $this->teacher_model->check_teacher_no($teacher_sno);
		if ($result){
			$this->form_validation->set_message('check_teacher_sno','ဤဝန္ထမ္းအမွတ္စဥ္ ရိွႏွင့္ၿပီးျဖစ္ပါသည္ ');
			return false;
		}
		else{
			return true;
		}
	}

	function teacher_biography_show_process(){
		$this->load->model('teacher_model','',TRUE);
		$this->load->library('session');
		$this->form_validation->set_message('required',' *');
		
		$this->form_validation->set_rules('age', 'age', 'trim|required|xss_clean');
		$this->form_validation->set_rules('birthday','birthday','callback_select_validate');
		$this->form_validation->set_rules('birthmonth','birthmonth','callback_select_validate');
		$this->form_validation->set_rules('birthyear','birthyear','callback_select_validate');
		$this->form_validation->set_rules('s_nrc', 's_nrc', 'trim|required|xss_clean');
		$this->form_validation->set_rules('native_town', 'native_town', 'trim|required|xss_clean');
		$this->form_validation->set_rules('relegion','relegion','callback_select_validate');
		$this->form_validation->set_rules('race', 'race', 'trim|required|xss_clean');
		$this->form_validation->set_rules('height', 'height', 'trim|required|xss_clean');
		$this->form_validation->set_rules('weight', 'weight', 'trim|required|xss_clean');
		$this->form_validation->set_rules('hair_color', 'hair_color', 'trim|required|xss_clean');
		$this->form_validation->set_rules('eye_color', 'eye_color', 'trim|required|xss_clean');
		$this->form_validation->set_rules('siganificant_mark', 'siganificant_mark', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('phd_course_box', 'phd_course_box', 'trim|required|xss_clean');
		$this->form_validation->set_rules('nation_foreign','nation_foreign','callback_select_validate');
		$this->form_validation->set_rules('post','post','callback_select_validate');
		$this->form_validation->set_rules('department','department','callback_select_validate');
		$this->form_validation->set_rules('last_degree','last_degree','callback_select_validate');
		$this->form_validation->set_rules('sepcialized_subject','sepcialized_subject','callback_select_validate');
		$this->form_validation->set_rules('personnel_day','personnel_day','callback_select_validate');
		$this->form_validation->set_rules('personnel_month','personnel_month','callback_select_validate');
		$this->form_validation->set_rules('personnel_year','personnel_year','callback_select_validate');
		$this->form_validation->set_rules('current_address', 'current_address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('permanent_address', 'permanent_address', 'trim|required|xss_clean');
				
		$teacher_id=$this->input->post('hidden_teacher_id');
		$u_id=$this->input->post('hidden_u_id');
		$t_alias_name=ltrim($this->input->post('young_name'));
		$t_other_name=ltrim($this->input->post('other_name'));
		$t_age=ltrim($this->input->post('age'));
		$t_birth_day=ltrim($this->input->post('birthday'));
		$t_birth_month=ltrim($this->input->post('birthmonth'));
		$t_birth_year=ltrim($this->input->post('birthyear'));
		$t_native_town=ltrim($this->input->post('native_town'));
		$t_gender=ltrim($this->input->post('gender'));
		$t_religious=ltrim($this->input->post('relegion'));
		$t_race=ltrim($this->input->post('race'));
		$t_nrc=ltrim($this->input->post('s_nrc'));
		$t_height=ltrim($this->input->post('height'));
		$t_weight=ltrim($this->input->post('weight'));
		$t_hair_color=ltrim($this->input->post('hair_color'));
		$t_eyes_color=ltrim($this->input->post('eye_color'));
		$t_unique_sign=ltrim($this->input->post('siganificant_mark'));
		$t_phd_course=ltrim($this->input->post('phd_course'));
		$t_nation_foreign=ltrim($this->input->post('nation_foreign'));
		$t_phd_course_box=ltrim($this->input->post('phd_course_box'));
		$t_post=ltrim($this->input->post('post'));
		$t_department=ltrim($this->input->post('department'));
		$t_last_degree=ltrim($this->input->post('last_degree'));
		$t_major=ltrim($this->input->post('sepcialized_subject'));
		$t_personnel_day=ltrim($this->input->post('personnel_day'));
		$t_personnel_month=ltrim($this->input->post('personnel_month'));
		$t_personnel_year=ltrim($this->input->post('personnel_year'));
		$t_current_address=ltrim($this->input->post('current_address'));
		$t_permanent_address=ltrim($this->input->post('permanent_address'));

		$t_degree1=ltrim($this->input->post('degree1'));
		$t_major1=ltrim($this->input->post('major1'));
		$t_year1=ltrim($this->input->post('year1'));
		$t_grade1=ltrim($this->input->post('grade1'));
		$t_degree2=ltrim($this->input->post('degree2'));
		$t_major2=ltrim($this->input->post('major2'));
		$t_year2=ltrim($this->input->post('year2'));
		$t_grade2=ltrim($this->input->post('grade2'));
		$t_degree3=ltrim($this->input->post('degree3'));
		$t_major3=ltrim($this->input->post('major3'));
		$t_year3=ltrim($this->input->post('year3'));
		$t_grade3=ltrim($this->input->post('grade3'));
		$t_degree4=ltrim($this->input->post('degree4'));
		$t_major4=ltrim($this->input->post('major4'));
		$t_year4=ltrim($this->input->post('year4'));
		$t_grade4=ltrim($this->input->post('grade4'));
				
		if ($this->form_validation->run()==FALSE)
		{			
			$this->teacher_biography_validation($teacher_id);			
		}
		else
		{		
			$data['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data['u_id']=ltrim($this->input->post('hidden_u_id'));
			$course = $_POST['course_period'];
			$course1 = $_POST['course_name'];
			$course2 = $_POST['course_location'];
			$course3 = $_POST['course_grade'];
			foreach ($course as $a=>$b1)
			{
				$data["t_start_end_date"] = $course[$a];
				$data["t_course"] = $course1[$a];
				$data["t_course_location"] = $course2[$a];
				$data["t_course_grade"] = $course3[$a];		
				$this->db->insert('teacher_course_tbl', $data);	
			}
			
			$data1['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data1['u_id']=ltrim($this->input->post('hidden_u_id'));
			$abroad = $_POST['abroad_period'];
			$abroad1 = $_POST['abroad_country'];
			$abroad2 = $_POST['abroad_case'];
			$abroad3 = $_POST['abroad_cost'];
			foreach ($abroad as $c=>$b2)
			{
				$data1["t_start_end_period"] = $abroad[$c];
				$data1["t_country"] = $abroad1[$c];
				$data1["t_case"] = $abroad2[$c];
				$data1["t_cost"] = $abroad3[$c];		
				$this->db->insert('teacher_abroad_tbl', $data1);	
			}
			
			$data2['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data2['u_id']=ltrim($this->input->post('hidden_u_id'));
			$t_father = $_POST['t_father_name'];
			$t_father1 = $_POST['t_father_related'];
			$t_father2= $_POST['t_father_gender'];
			$t_father3 = $_POST['t_father_citizen'];
			$t_father4 = $_POST['t_father_job'];
			$t_father5 = $_POST['t_father_address'];
			$t_father6 = $_POST['t_father_remark'];
			
			foreach ($t_father	 as $c=>$b3)
			{
				$data2["t_father_name"] = $t_father[$c];
				$data2["t_father_related"] = $t_father1[$c];
				$data2["t_father_gender"] = $t_father2[$c];
				$data2["t_father_citizen"] = $t_father3[$c];
				$data2["t_father_job"] = $t_father4[$c];
				$data2["t_father_address"] = $t_father5[$c];
				$data2["t_father_remark"] = $t_father6[$c];
						
				$this->db->insert('teacher_father_tbl', $data2);	
			}
			
			$data3['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data3['u_id']=ltrim($this->input->post('hidden_u_id'));
			$t_mother = $_POST['t_mother_name'];
			$t_mother1 = $_POST['t_mother_related'];
			$t_mother2 = $_POST['t_mother_gender'];
			$t_mother3 = $_POST['t_mother_citizen'];
			$t_mother4= $_POST['t_mother_job'];
			$t_mother5= $_POST['t_mother_address'];
			$t_mother6= $_POST['t_mother_remark'];
			
			foreach ($t_mother as $d=>$b4)
			{
				$data3["t_mother_name"] = $t_mother[$d];
				$data3["t_mother_related"] = $t_mother1[$d];
				$data3["t_mother_gender"] = $t_mother2[$d];
				$data3["t_mother_citizen"] = $t_mother3[$d];
				$data3["t_mother_job"] = $t_mother4[$d];
				$data3["t_mother_address"] = $t_mother5[$d];
				$data3["t_mother_remark"] = $t_mother6[$d];		
						
				$this->db->insert('teacher_mother_tbl', $data3);	
			}
			
			$data4['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data4['u_id']=ltrim($this->input->post('hidden_u_id'));
			$t_cousin = $_POST['t_cousin_name'];
			$t_cousin1= $_POST['t_cousin_related'];
			$t_cousin2= $_POST['t_cousin_gender'];
			$t_cousin3 = $_POST['t_cousin_citizen'];
			$t_cousin4= $_POST['t_cousin_job'];
			$t_cousin5= $_POST['t_cousin_address'];
			$t_cousin6= $_POST['t_cousin_remark'];
			
			foreach ($t_cousin	 as $e=>$b5)
			{
				$data4["t_cousin_name"] = $t_cousin[$e];
				$data4["t_cousin_related"] = $t_cousin1[$e];
				$data4["t_cousin_gender"] = $t_cousin2[$e];
				$data4["t_cousin_citizen"] = $t_cousin3[$e];
				$data4["t_cousin_job"] = $t_cousin4[$e];
				$data4["t_cousin_address"] = $t_cousin5[$e];
				$data4["t_cousin_remark"] = $t_cousin6[$e];		
					
				$this->db->insert('teacher_cousin_tbl', $data4);	
			}
	
			$data5['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data5['u_id']=ltrim($this->input->post('hidden_u_id'));
			$t_partner = $_POST['t_partner_name'];
			$t_partner1= $_POST['t_partner_related'];
			$t_partner2= $_POST['t_partner_gender'];
			$t_partner3 = $_POST['t_partner_citizen'];
			$t_partner4= $_POST['t_partner_job'];
			$t_partner5= $_POST['t_partner_address'];
			$t_partner6= $_POST['t_partner_remark'];
			
			foreach ($t_partner as $f=>$b7)
			{
				$data5["t_partner_name"] = $t_partner[$f];
				$data5["t_partner_related"] = $t_partner1[$f];
				$data5["t_partner_gender"] = $t_partner2[$f];
				$data5["t_partner_citizen"] = $t_partner3[$f];
				$data5["t_partner_job"] = $t_partner4[$f];
				$data5["t_partner_address"] = $t_partner5[$f];
				$data5["t_partner_remark"] = $t_partner6[$f];		
					
				$this->db->insert('teacher_partner_tbl', $data5);	
			}
			
			$data6['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data6['u_id']=ltrim($this->input->post('hidden_u_id'));
			$t_partner_father = $_POST['t_partner_father_name'];
			$t_partner_father1= $_POST['t_partner_father_related'];
			$t_partner_father2= $_POST['t_partner_father_gender'];
			$t_partner_father3 = $_POST['t_partner_father_citizen'];
			$t_partner_father4= $_POST['t_partner_father_job'];
			$t_partner_father5= $_POST['t_partner_father_address'];
			$t_partner_father6= $_POST['t_partner_father_remark'];
			
			foreach ($t_partner_father as $g=>$b8)
			{
				$data6["t_partner_father_name"] = $t_partner_father[$g];
				$data6["t_partner_father_related"] = $t_partner_father1[$g];
				$data6["t_partner_father_gender"] = $t_partner_father2[$g];
				$data6["t_partner_father_citizen"] = $t_partner_father3[$g];
				$data6["t_partner_father_job"] = $t_partner_father4[$g];
				$data6["t_partner_father_address"] = $t_partner_father5[$g];
				$data6["t_partner_father_remark"] = $t_partner_father6[$g];		
					
				$this->db->insert('teacher_partner_father_tbl', $data6);	
			}
			
			$data7['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data7['u_id']=ltrim($this->input->post('hidden_u_id'));
			$t_partner_mother = $_POST['t_partner_mother_name'];
			$t_partner_mother1= $_POST['t_partner_mother_related'];
			$t_partner_mother2= $_POST['t_partner_mother_gender'];
			$t_partner_mother3 = $_POST['t_partner_mother_citizen'];
			$t_partner_mother4= $_POST['t_partner_mother_job'];
			$t_partner_mother5= $_POST['t_partner_mother_address'];
			$t_partner_mother6= $_POST['t_partner_mother_remark'];
			
			foreach ($t_partner_mother as $h=>$b9)
			{
				$data7["t_partner_mother_name"] = $t_partner_mother[$h];
				$data7["t_partner_mother_related"] = $t_partner_mother1[$h];
				$data7["t_partner_mother_gender"] = $t_partner_mother2[$h];
				$data7["t_partner_mother_citizen"] = $t_partner_mother3[$h];
				$data7["t_partner_mother_job"] = $t_partner_mother4[$h];
				$data7["t_partner_mother_address"] = $t_partner_mother5[$h];
				$data7["t_partner_mother_remark"] = $t_partner_mother6[$h];		
				
				$this->db->insert('teacher_partner_mother_tbl', $data7);	
			}
			
			$data8['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data8['u_id']=ltrim($this->input->post('hidden_u_id'));
			$t_child = $_POST['t_child_name'];
			$t_child1= $_POST['t_child_related'];
			$t_child2= $_POST['t_child_gender'];
			$t_child3 = $_POST['t_child_citizen'];
			$t_child4= $_POST['t_child_job'];
			$t_child5= $_POST['t_child_address'];
			$t_child6= $_POST['t_child_remark'];
			
			foreach ($t_child	 as $i=>$b10)
			{
				$data8["t_child_name"] = $t_child[$i];
				$data8["t_child_related"] = $t_child1[$i];
				$data8["t_child_gender"] = $t_child2[$i];
				$data8["t_child_citizen"] = $t_child3[$i];
				$data8["t_child_job"] = $t_child4[$i];
				$data8["t_child_address"] = $t_child5[$i];
				$data8["t_child_remark"] = $t_child6[$i];		
					
				$this->db->insert('teacher_child_tbl', $data8);	
			}
			
			$data9['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data9['u_id']=ltrim($this->input->post('hidden_u_id'));
			$t_abroad_family = $_POST['t_abroad_family_name'];
			$t_abroad_family1= $_POST['t_abroad_family_related'];
			$t_abroad_family2= $_POST['t_abroad_family_citizen'];
			$t_abroad_family3 = $_POST['t_abroad_family_job'];
			$t_abroad_family4= $_POST['t_abroad_family_country'];
			$t_abroad_family5= $_POST['t_abroad_family_case'];
			$t_abroad_family6= $_POST['t_abroad_family_coming'];
			
			foreach ($t_abroad_family as $j=>$b11)
			{
				$data9["t_abroad_family_name"] = $t_abroad_family[$j];
				$data9["t_abroad_family_related"] = $t_abroad_family1[$j];
				$data9["t_abroad_family_citizen"] = $t_abroad_family2[$j];
				$data9["t_abroad_family_job"] = $t_abroad_family3[$j];
				$data9["t_abroad_family_country"] = $t_abroad_family4[$j];
				$data9["t_abroad_family_case"] = $t_abroad_family5[$j];
				$data9["t_abroad_family_coming"] = $t_abroad_family6[$j];		
					
				$this->db->insert('teacher_abroad_family_tbl', $data9);	
			}
			
			$data10['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data10['u_id']=ltrim($this->input->post('hidden_u_id'));
			$t_punish = $_POST['t_punish_period'];
			$t_punish1= $_POST['t_punish_case'];
			$t_punish2= $_POST['t_punish_sentence'];
			$t_punish3 = $_POST['t_punish_remark'];
			
			foreach ($t_punish as $k=>$b12)
			{
				$data10["t_punish_period"] = $t_punish[$k];
				$data10["t_punish_case"] = $t_punish1[$k];
				$data10["t_punish_sentence"] = $t_punish2[$k];
				$data10["t_punish_remark"] = $t_punish3[$k];
					
				$this->db->insert('teacher_punish_tbl', $data10);	
			}
			
			$data11['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data11['u_id']=ltrim($this->input->post('hidden_u_id'));
			$t_lawsuit = $_POST['t_lawsuit_preiod'];
			$t_lawsuit1= $_POST['t_lawsuit_case'];
			$t_lawsuit2= $_POST['t_lawsuit_sentense'];
			$t_lawsuit3 = $_POST['t_lawsuit_remark'];
			
			foreach ($t_lawsuit as $l=>$b13)
			{
				$data11["t_lawsuit_preiod"] = $t_lawsuit[$l];
				$data11["t_lawsuit_case"] = $t_lawsuit1[$l];
				$data11["t_lawsuit_sentense"] = $t_lawsuit2[$l];
				$data11["t_lawsuit_remark"] = $t_lawsuit3[$l];
					
				$this->db->insert('teacher_lawsuit_tbl', $data11);	
			}
			
			$data12['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data12['u_id']=ltrim($this->input->post('hidden_u_id'));
			$t_honor = $_POST['t_honor_period'];
			$t_honor1= $_POST['t_honor_degree'];
			$t_honor2= $_POST['t_honor_remark'];
			
			foreach ($t_honor as $m=>$b14)
			{
				$data12["t_honor_period"] = $t_honor[$m];
				$data12["t_honor_degree"] = $t_honor1[$m];
				$data12["t_honor_remark"] = $t_honor2[$m];
					
				$this->db->insert('teacher_honor_tbl', $data12);	
			}
			
			$data13['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data13['u_id']=ltrim($this->input->post('hidden_u_id'));
			$t_abroad_case = $_POST['t_abroad_course'];
			$t_abroad_case1 = $_POST['t_country'];
			$t_abroad_case2 = $_POST['t_period'];
			$t_abroad_case3 = $_POST['t_arrive_date'];
			$t_abroad_case4 = $_POST['t_re_department'];
			
			foreach ($t_abroad_case as $o=>$b15)
			{
				$data13["t_abroad_course"] = $t_abroad_case[$o];
				$data13["t_country"] = $t_abroad_case1[$o];
				$data13["t_period"] = $t_abroad_case2[$o];
				$data13["t_arrive_date"] = $t_abroad_case3[$o];
				$data13["t_gov_grant"] = $t_abroad_case4[$o];
				$data13["t_re_department"] = $t_abroad_case4[$o];
					
				$this->db->insert('teacher_abroad_case_tbl', $data13);	
			}
			
			$this->teacher_model->teacher_insert_detail(
			$u_id,$teacher_id,$t_alias_name,$t_other_name,$t_age,$t_birth_day,$t_birth_month,$t_birth_year,
			$t_native_town,$t_gender,$t_religious,$t_race,$t_nrc,$t_height,$t_weight,$t_hair_color,$t_eyes_color,
			$t_unique_sign,$t_phd_course,$t_phd_course_box,$t_nation_foreign,$t_post,$t_department,$t_last_degree,$t_major,
			$t_personnel_day,$t_personnel_month,$t_personnel_year,$t_current_address,$t_permanent_address,
			$t_degree1,$t_major1,$t_year1,$t_grade1,$t_degree2,$t_major2,$t_year2,$t_grade2,
			$t_degree3,$t_major3,$t_year3,$t_grade3,$t_degree4,$t_major4,$t_year4,$t_grade4);
		}		
		/*echo $data['t_id']=ltrim($this->input->post('hidden_teacher_id'));
		echo $data['t_start_end_date']=ltrim($this->input->post('course_period'));
		echo $data['t_course']=ltrim($this->input->post('course_name'));
		echo $data['t_course_location']=ltrim($this->input->post('course_location'));
		echo $data['t_course_grade']=ltrim($this->input->post('course_grade'));
		$this->db->insert('teacher_course_tbl', $data);	
		
		for($j=3;$j<=4;$j++){
			echo $data['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			echo $data['t_start_end_date']=$this->input->post('textbox_course1'.$j);
			echo $data['t_course']=$this->input->post('textbox_course2'.$j);
			echo $data['t_course_location']=$this->input->post('textbox_course3'.$j);
			echo $data['t_course_grade']=$this->input->post('textbox_course4'.$j);
			$this->db->insert('teacher_course_tbl', $data);			
		}*/
		
			}
			
	function edit_officer_biography()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - ဝန္ထမ္းကုိယ္ေရးအခ်က္အလက္ ျပင္ဆင္ရန္";
		$data['here'] = "id='here'";		
		$data['id'] = "0";	
		$this->load->view('includes/inner_header',$data);
		$this->load->view('edit_officer_biography');
		$this->load->view('includes/footer');
	}	
			
 	function edit_teacher_biography_show_process(){
 		$this->load->model('teacher_model','',TRUE);
		$this->load->library('session');
		$this->form_validation->set_message('required',' *');
		
		$this->form_validation->set_rules('age', 'age', 'trim|required|xss_clean');
		$this->form_validation->set_rules('birthday','birthday','callback_select_validate');
		$this->form_validation->set_rules('birthmonth','birthmonth','callback_select_validate');
		$this->form_validation->set_rules('birthyear','birthyear','callback_select_validate');
		$this->form_validation->set_rules('s_nrc', 's_nrc', 'trim|required|xss_clean');
		$this->form_validation->set_rules('native_town', 'native_town', 'trim|required|xss_clean');
		$this->form_validation->set_rules('relegion','relegion','callback_select_validate');
		$this->form_validation->set_rules('race', 'race', 'trim|required|xss_clean');
		$this->form_validation->set_rules('height', 'height', 'trim|required|xss_clean');
		$this->form_validation->set_rules('weight', 'weight', 'trim|required|xss_clean');
		$this->form_validation->set_rules('hair_color', 'hair_color', 'trim|required|xss_clean');
		$this->form_validation->set_rules('eye_color', 'eye_color', 'trim|required|xss_clean');
		$this->form_validation->set_rules('siganificant_mark', 'siganificant_mark', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('phd_course_box', 'phd_course_box', 'trim|required|xss_clean');
		$this->form_validation->set_rules('nation_foreign','nation_foreign','callback_select_validate');
		$this->form_validation->set_rules('post','post','callback_select_validate');
		$this->form_validation->set_rules('department','department','callback_select_validate');
		$this->form_validation->set_rules('last_degree','last_degree','callback_select_validate');
		$this->form_validation->set_rules('sepcialized_subject','sepcialized_subject','callback_select_validate');
		$this->form_validation->set_rules('personnel_day','personnel_day','callback_select_validate');
		$this->form_validation->set_rules('personnel_month','personnel_month','callback_select_validate');
		$this->form_validation->set_rules('personnel_year','personnel_year','callback_select_validate');
		$this->form_validation->set_rules('current_address', 'current_address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('permanent_address', 'permanent_address', 'trim|required|xss_clean');
		 		
		$teacher_id=$this->input->post('hidden_teacher_id');
		$u_id=$this->input->post('hidden_u_id');
		$t_alias_name=ltrim($this->input->post('young_name'));
		$t_other_name=ltrim($this->input->post('other_name'));
		$t_age=ltrim($this->input->post('age'));
		$t_birth_day=ltrim($this->input->post('birthday'));
		$t_birth_month=ltrim($this->input->post('birthmonth'));
		$t_birth_year=ltrim($this->input->post('birthyear'));
		$t_native_town=ltrim($this->input->post('native_town'));
		$t_gender=ltrim($this->input->post('gender'));
		$t_religious=ltrim($this->input->post('relegion'));
		$t_race=ltrim($this->input->post('race'));
		$t_nrc=ltrim($this->input->post('s_nrc'));
		$t_height=ltrim($this->input->post('height'));
		$t_weight=ltrim($this->input->post('weight'));
		$t_hair_color=ltrim($this->input->post('hair_color'));
		$t_eyes_color=ltrim($this->input->post('eye_color'));
		$t_unique_sign=ltrim($this->input->post('siganificant_mark'));
		$t_phd_course=ltrim($this->input->post('phd_course'));
		$t_phd_course_box=ltrim($this->input->post('phd_course_box'));
		$t_nation_foreign=ltrim($this->input->post('nation_foreign'));
		$t_post=ltrim($this->input->post('post'));
		$t_department=ltrim($this->input->post('department'));
		$t_last_degree=ltrim($this->input->post('last_degree'));
		$t_major=ltrim($this->input->post('sepcialized_subject'));
		$t_personnel_day=ltrim($this->input->post('personnel_day'));
		$t_personnel_month=ltrim($this->input->post('personnel_month'));
		$t_personnel_year=ltrim($this->input->post('personnel_year'));
		$t_current_address=ltrim($this->input->post('current_address'));
		$t_permanent_address=ltrim($this->input->post('permanent_address'));

		$t_degree1=ltrim($this->input->post('degree1'));
		$t_major1=ltrim($this->input->post('major1'));
		$t_year1=ltrim($this->input->post('year1'));
		$t_grade1=ltrim($this->input->post('grade1'));
		$t_degree2=ltrim($this->input->post('degree2'));
		$t_major2=ltrim($this->input->post('major2'));
		$t_year2=ltrim($this->input->post('year2'));
		$t_grade2=ltrim($this->input->post('grade2'));
		$t_degree3=ltrim($this->input->post('degree3'));
		$t_major3=ltrim($this->input->post('major3'));
		$t_year3=ltrim($this->input->post('year3'));
		$t_grade3=ltrim($this->input->post('grade3'));
		$t_degree4=ltrim($this->input->post('degree4'));
		$t_major4=ltrim($this->input->post('major4'));
		$t_year4=ltrim($this->input->post('year4'));
		$t_grade4=ltrim($this->input->post('grade4'));
				
	/*	if ($this->form_validation->run()==FALSE)
		{			
			$this->teacher_biography_validation($teacher_id);			
		}
		else
		{*/
			$this->db->delete('teacher_course_tbl',array('t_id'=>$teacher_id));
			$t_id = ltrim($this->input->post('hidden_teacher_id'));		
			$data['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data['u_id']=ltrim($this->input->post('hidden_u_id'));
			$course = $_POST['course_period'];
			$course1 = $_POST['course_name'];
			$course2 = $_POST['course_location'];
			$course3 = $_POST['course_grade'];
			foreach ($course as $a=>$b1)
			{
				$data["t_start_end_date"] = $course[$a];
				$data["t_course"] = $course1[$a];
				$data["t_course_location"] = $course2[$a];
				$data["t_course_grade"] = $course3[$a];		
				$this->db->insert('teacher_course_tbl', $data);
				$this->db->where('t_id',$t_id);
			}
			
			$this->db->delete('teacher_abroad_tbl',array('t_id'=>$teacher_id));
			$t_id = ltrim($this->input->post('hidden_teacher_id'));
			$data1['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data1['u_id']=ltrim($this->input->post('hidden_u_id'));
			$abroad = $_POST['abroad_period'];
			$abroad1 = $_POST['abroad_country'];
			$abroad2 = $_POST['abroad_case'];
			$abroad3 = $_POST['abroad_cost'];
			foreach ($abroad as $c=>$b2)
			{
				$data1["t_start_end_period"] = $abroad[$c];
				$data1["t_country"] = $abroad1[$c];
				$data1["t_case"] = $abroad2[$c];
				$data1["t_cost"] = $abroad3[$c];		
				$this->db->insert('teacher_abroad_tbl', $data1);	
				$this->db->where('t_id',$t_id);
			}
			
			$this->db->delete('teacher_father_tbl',array('t_id'=>$teacher_id));
			$t_id = ltrim($this->input->post('hidden_teacher_id'));
			$data2['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data2['u_id']=ltrim($this->input->post('hidden_u_id'));
			$t_father = $_POST['t_father_name'];
			$t_father1 = $_POST['t_father_related'];
			$t_father2= $_POST['t_father_gender'];
			$t_father3 = $_POST['t_father_citizen'];
			$t_father4 = $_POST['t_father_job'];
			$t_father5 = $_POST['t_father_address'];
			$t_father6 = $_POST['t_father_remark'];
			
			foreach ($t_father	 as $c=>$b3)
			{
				$data2["t_father_name"] = $t_father[$c];
				$data2["t_father_related"] = $t_father1[$c];
				$data2["t_father_gender"] = $t_father2[$c];
				$data2["t_father_citizen"] = $t_father3[$c];
				$data2["t_father_job"] = $t_father4[$c];
				$data2["t_father_address"] = $t_father5[$c];
				$data2["t_father_remark"] = $t_father6[$c];
						
				$this->db->insert('teacher_father_tbl', $data2);	
				$this->db->where('t_id',$t_id);
			}
			
			$this->db->delete('teacher_mother_tbl',array('t_id'=>$teacher_id));
			$t_id = ltrim($this->input->post('hidden_teacher_id'));
			$data3['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data3['u_id']=ltrim($this->input->post('hidden_u_id'));
			$t_mother = $_POST['t_mother_name'];
			$t_mother1 = $_POST['t_mother_related'];
			$t_mother2 = $_POST['t_mother_gender'];
			$t_mother3 = $_POST['t_mother_citizen'];
			$t_mother4= $_POST['t_mother_job'];
			$t_mother5= $_POST['t_mother_address'];
			$t_mother6= $_POST['t_mother_remark'];
			
			foreach ($t_mother as $d=>$b4)
			{
				$data3["t_mother_name"] = $t_mother[$d];
				$data3["t_mother_related"] = $t_mother1[$d];
				$data3["t_mother_gender"] = $t_mother2[$d];
				$data3["t_mother_citizen"] = $t_mother3[$d];
				$data3["t_mother_job"] = $t_mother4[$d];
				$data3["t_mother_address"] = $t_mother5[$d];
				$data3["t_mother_remark"] = $t_mother6[$d];		
						
				$this->db->insert('teacher_mother_tbl', $data3);	
				$this->db->where('t_id',$t_id);
			}
			
			$this->db->delete('teacher_cousin_tbl',array('t_id'=>$teacher_id));
			$t_id = ltrim($this->input->post('hidden_teacher_id'));
			$data4['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data4['u_id']=ltrim($this->input->post('hidden_u_id'));
			$t_cousin = $_POST['t_cousin_name'];
			$t_cousin1= $_POST['t_cousin_related'];
			$t_cousin2= $_POST['t_cousin_gender'];
			$t_cousin3 = $_POST['t_cousin_citizen'];
			$t_cousin4= $_POST['t_cousin_job'];
			$t_cousin5= $_POST['t_cousin_address'];
			$t_cousin6= $_POST['t_cousin_remark'];
			
			foreach ($t_cousin	 as $e=>$b5)
			{
				$data4["t_cousin_name"] = $t_cousin[$e];
				$data4["t_cousin_related"] = $t_cousin1[$e];
				$data4["t_cousin_gender"] = $t_cousin2[$e];
				$data4["t_cousin_citizen"] = $t_cousin3[$e];
				$data4["t_cousin_job"] = $t_cousin4[$e];
				$data4["t_cousin_address"] = $t_cousin5[$e];
				$data4["t_cousin_remark"] = $t_cousin6[$e];		
					
				$this->db->insert('teacher_cousin_tbl', $data4);	
				$this->db->where('t_id',$t_id);
			}
			
			$this->db->delete('teacher_partner_tbl',array('t_id'=>$teacher_id));
			$t_id = ltrim($this->input->post('hidden_teacher_id'));
			$data5['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data5['u_id']=ltrim($this->input->post('hidden_u_id'));
			$t_partner = $_POST['t_partner_name'];
			$t_partner1= $_POST['t_partner_related'];
			$t_partner2= $_POST['t_partner_gender'];
			$t_partner3 = $_POST['t_partner_citizen'];
			$t_partner4= $_POST['t_partner_job'];
			$t_partner5= $_POST['t_partner_address'];
			$t_partner6= $_POST['t_partner_remark'];
			
			foreach ($t_partner as $f=>$b7)
			{
				$data5["t_partner_name"] = $t_partner[$f];
				$data5["t_partner_related"] = $t_partner1[$f];
				$data5["t_partner_gender"] = $t_partner2[$f];
				$data5["t_partner_citizen"] = $t_partner3[$f];
				$data5["t_partner_job"] = $t_partner4[$f];
				$data5["t_partner_address"] = $t_partner5[$f];
				$data5["t_partner_remark"] = $t_partner6[$f];		
					
				$this->db->insert('teacher_partner_tbl', $data5);	
				$this->db->where('t_id',$t_id);
			}
			
			$this->db->delete('teacher_partner_father_tbl',array('t_id'=>$teacher_id));
			$t_id = ltrim($this->input->post('hidden_teacher_id'));
			$data6['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data6['u_id']=ltrim($this->input->post('hidden_u_id'));
			$t_partner_father = $_POST['t_partner_father_name'];
			$t_partner_father1= $_POST['t_partner_father_related'];
			$t_partner_father2= $_POST['t_partner_father_gender'];
			$t_partner_father3 = $_POST['t_partner_father_citizen'];
			$t_partner_father4= $_POST['t_partner_father_job'];
			$t_partner_father5= $_POST['t_partner_father_address'];
			$t_partner_father6= $_POST['t_partner_father_remark'];
			
			foreach ($t_partner_father as $g=>$b8)
			{
				$data6["t_partner_father_name"] = $t_partner_father[$g];
				$data6["t_partner_father_related"] = $t_partner_father1[$g];
				$data6["t_partner_father_gender"] = $t_partner_father2[$g];
				$data6["t_partner_father_citizen"] = $t_partner_father3[$g];
				$data6["t_partner_father_job"] = $t_partner_father4[$g];
				$data6["t_partner_father_address"] = $t_partner_father5[$g];
				$data6["t_partner_father_remark"] = $t_partner_father6[$g];		
					
				$this->db->insert('teacher_partner_father_tbl', $data6);	
				$this->db->where('t_id',$t_id);
			}
			
			$this->db->delete('teacher_partner_mother_tbl',array('t_id'=>$teacher_id));
			$t_id = ltrim($this->input->post('hidden_teacher_id'));
			$data7['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data7['u_id']=ltrim($this->input->post('hidden_u_id'));
			$t_partner_mother = $_POST['t_partner_mother_name'];
			$t_partner_mother1= $_POST['t_partner_mother_related'];
			$t_partner_mother2= $_POST['t_partner_mother_gender'];
			$t_partner_mother3 = $_POST['t_partner_mother_citizen'];
			$t_partner_mother4= $_POST['t_partner_mother_job'];
			$t_partner_mother5= $_POST['t_partner_mother_address'];
			$t_partner_mother6= $_POST['t_partner_mother_remark'];
			
			foreach ($t_partner_mother as $h=>$b9)
			{
				$data7["t_partner_mother_name"] = $t_partner_mother[$h];
				$data7["t_partner_mother_related"] = $t_partner_mother1[$h];
				$data7["t_partner_mother_gender"] = $t_partner_mother2[$h];
				$data7["t_partner_mother_citizen"] = $t_partner_mother3[$h];
				$data7["t_partner_mother_job"] = $t_partner_mother4[$h];
				$data7["t_partner_mother_address"] = $t_partner_mother5[$h];
				$data7["t_partner_mother_remark"] = $t_partner_mother6[$h];		
				
				$this->db->insert('teacher_partner_mother_tbl', $data7);	
				$this->db->where('t_id',$t_id);
			}
			
			$this->db->delete('teacher_child_tbl',array('t_id'=>$teacher_id));
			$t_id = ltrim($this->input->post('hidden_teacher_id'));
			$data8['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data8['u_id']=ltrim($this->input->post('hidden_u_id'));
			$t_child = $_POST['t_child_name'];
			$t_child1= $_POST['t_child_related'];
			$t_child2= $_POST['t_child_gender'];
			$t_child3 = $_POST['t_child_citizen'];
			$t_child4= $_POST['t_child_job'];
			$t_child5= $_POST['t_child_address'];
			$t_child6= $_POST['t_child_remark'];
			
			foreach ($t_child	 as $i=>$b10)
			{
				$data8["t_child_name"] = $t_child[$i];
				$data8["t_child_related"] = $t_child1[$i];
				$data8["t_child_gender"] = $t_child2[$i];
				$data8["t_child_citizen"] = $t_child3[$i];
				$data8["t_child_job"] = $t_child4[$i];
				$data8["t_child_address"] = $t_child5[$i];
				$data8["t_child_remark"] = $t_child6[$i];		
					
				$this->db->insert('teacher_child_tbl', $data8);	
				$this->db->where('t_id',$t_id);
			}
			
			$this->db->delete('teacher_abroad_family_tbl',array('t_id'=>$teacher_id));
			$t_id = ltrim($this->input->post('hidden_teacher_id'));
			$data9['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data9['u_id']=ltrim($this->input->post('hidden_u_id'));
			$t_abroad_family = $_POST['t_abroad_family_name'];
			$t_abroad_family1= $_POST['t_abroad_family_related'];
			$t_abroad_family2= $_POST['t_abroad_family_citizen'];
			$t_abroad_family3 = $_POST['t_abroad_family_job'];
			$t_abroad_family4= $_POST['t_abroad_family_country'];
			$t_abroad_family5= $_POST['t_abroad_family_case'];
			$t_abroad_family6= $_POST['t_abroad_family_coming'];
			
			foreach ($t_abroad_family as $j=>$b11)
			{
				$data9["t_abroad_family_name"] = $t_abroad_family[$j];
				$data9["t_abroad_family_related"] = $t_abroad_family1[$j];
				$data9["t_abroad_family_citizen"] = $t_abroad_family2[$j];
				$data9["t_abroad_family_job"] = $t_abroad_family3[$j];
				$data9["t_abroad_family_country"] = $t_abroad_family4[$j];
				$data9["t_abroad_family_case"] = $t_abroad_family5[$j];
				$data9["t_abroad_family_coming"] = $t_abroad_family6[$j];		
					
				$this->db->insert('teacher_abroad_family_tbl', $data9);	
				$this->db->where('t_id',$t_id);
			}
			
			$this->db->delete('teacher_punish_tbl',array('t_id'=>$teacher_id));
			$t_id = ltrim($this->input->post('hidden_teacher_id'));
			$data10['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data10['u_id']=ltrim($this->input->post('hidden_u_id'));
			$t_punish = $_POST['t_punish_period'];
			$t_punish1= $_POST['t_punish_case'];
			$t_punish2= $_POST['t_punish_sentence'];
			$t_punish3 = $_POST['t_punish_remark'];
			
			foreach ($t_punish as $k=>$b12)
			{
				$data10["t_punish_period"] = $t_punish[$k];
				$data10["t_punish_case"] = $t_punish1[$k];
				$data10["t_punish_sentence"] = $t_punish2[$k];
				$data10["t_punish_remark"] = $t_punish3[$k];
					
				$this->db->insert('teacher_punish_tbl', $data10);	
				$this->db->where('t_id',$t_id);
			}
			
			$this->db->delete('teacher_lawsuit_tbl',array('t_id'=>$teacher_id));
			$t_id = ltrim($this->input->post('hidden_teacher_id'));
			$data11['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data11['u_id']=ltrim($this->input->post('hidden_u_id'));
			$t_lawsuit = $_POST['t_lawsuit_preiod'];
			$t_lawsuit1= $_POST['t_lawsuit_case'];
			$t_lawsuit2= $_POST['t_lawsuit_sentense'];
			$t_lawsuit3 = $_POST['t_lawsuit_remark'];
			
			foreach ($t_lawsuit as $l=>$b13)
			{
				$data11["t_lawsuit_preiod"] = $t_lawsuit[$l];
				$data11["t_lawsuit_case"] = $t_lawsuit1[$l];
				$data11["t_lawsuit_sentense"] = $t_lawsuit2[$l];
				$data11["t_lawsuit_remark"] = $t_lawsuit3[$l];
					
				$this->db->insert('teacher_lawsuit_tbl', $data11);	
				$this->db->where('t_id',$t_id);
			}
			
			$this->db->delete('teacher_honor_tbl',array('t_id'=>$teacher_id));
			$t_id = ltrim($this->input->post('hidden_teacher_id'));
			$data12['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data12['u_id']=ltrim($this->input->post('hidden_u_id'));
			$t_honor = $_POST['t_honor_period'];
			$t_honor1= $_POST['t_honor_degree'];
			$t_honor2= $_POST['t_honor_remark'];
			
			foreach ($t_honor as $m=>$b14)
			{
				$data12["t_honor_period"] = $t_honor[$m];
				$data12["t_honor_degree"] = $t_honor1[$m];
				$data12["t_honor_remark"] = $t_honor2[$m];
					
				$this->db->insert('teacher_honor_tbl', $data12);
				$this->db->where('t_id',$t_id);	
			}
			
			$this->db->delete('teacher_abroad_case_tbl',array('t_id'=>$teacher_id));
			$t_id = ltrim($this->input->post('hidden_teacher_id'));
			$data13['t_id']=ltrim($this->input->post('hidden_teacher_id'));
			$data13['u_id']=ltrim($this->input->post('hidden_u_id'));
			$t_abroad_case = $_POST['t_abroad_course'];
			$t_abroad_case1 = $_POST['t_country'];
			$t_abroad_case2 = $_POST['t_period'];
			$t_abroad_case3 = $_POST['t_arrive_date'];
			$t_abroad_case4 = $_POST['t_re_department'];
			
			foreach ($t_abroad_case as $o=>$b15)
			{
				$data13["t_abroad_course"] = $t_abroad_case[$o];
				$data13["t_country"] = $t_abroad_case1[$o];
				$data13["t_period"] = $t_abroad_case2[$o];
				$data13["t_arrive_date"] = $t_abroad_case3[$o];
				$data13["t_gov_grant"] = $t_abroad_case4[$o];
				$data13["t_re_department"] = $t_abroad_case4[$o];
					
				$this->db->insert('teacher_abroad_case_tbl', $data13);
				$this->db->where('t_id',$t_id);	
			}
			
			$this->teacher_model->teacher_update_detail(
			$u_id,$teacher_id,$t_alias_name,$t_other_name,$t_age,$t_birth_day,$t_birth_month,$t_birth_year,
			$t_native_town,$t_gender,$t_religious,$t_race,$t_nrc,$t_height,$t_weight,$t_hair_color,$t_eyes_color,
			$t_unique_sign,$t_phd_course,$t_phd_course_box,$t_nation_foreign,$t_post,$t_department,$t_last_degree,$t_major,
			$t_personnel_day,$t_personnel_month,$t_personnel_year,$t_current_address,$t_permanent_address,
			$t_degree1,$t_major1,$t_year1,$t_grade1,$t_degree2,$t_major2,$t_year2,$t_grade2,
			$t_degree3,$t_major3,$t_year3,$t_grade3,$t_degree4,$t_major4,$t_year4,$t_grade4);
//		}		
 		
 	}
	
	function teacher_biography_validation($teacher_id)
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['user_id'] = $teacher_id;
		$data['title'] = " - ဝန္ထမ္းကုိယ္ေရးအခ်က္အလက္ ျဖည့္ရန္";
		$data['here'] = "id='here'";		
		$data['id'] = "0";	
		$this->load->view('includes/inner_header',$data);
		$this->load->view('officer_biography');
		$this->load->view('includes/footer');
	}
	
	function select_validate($selectValue)
	{		
		if($selectValue == '0'){
		$this->form_validation->set_message('select_validate', '*');
		return false;
		}
		else {
		return true;
		}
	}	
	function delete_officer_biography(){
		$this->load->model('teacher_model','',TRUE);	
		$deleid3= $this->uri->segment(3);	
		$this->teacher_model->teacher_delete($deleid3);
	}
} 
ob_flush(); ?>