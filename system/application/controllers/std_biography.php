<?php
class std_biography extends Controller{
	function std_biography()
	{
		parent::Controller();
		
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		//$this->load->scaffolding('entries');
	}
	
	function student_biography()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - ေက်ာင္းသားကုိယ္ေရးအခ်က္အလက္ ျဖည့္ရန္";
		$data['here14'] = "id='here'";		
		$data['id2'] = "2";	
		$this->load->view('includes/inner_header',$data);
		$this->load->view('student_biography');
		$this->load->view('includes/footer');
	}	
	
	function student_biography_validation($user_id)
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['user_id'] = $user_id;
		$data['title'] = " - ေက်ာင္းသားကုိယ္ေရးအခ်က္အလက္ ျဖည့္ရန္";
		$data['here14'] = "id='here'";		
		$data['id2'] = "2";	
		$this->load->view('includes/inner_header',$data);
		$this->load->view('student_biography');
		$this->load->view('includes/footer');
	}
	
	function std_biography_show()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - ေက်ာင္းသားကုိယ္ေရးအခ်က္အလက္ စစ္ေဆးရန္";
		$data['here'] = "id='here'";		
		$data['id'] = "2";	
		$this->load->view('includes/biography_header',$data);
		$this->load->view('std_biography_show');
		$this->load->view('includes/footer');
	}	
	
	function pre_student_biography()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - ေက်ာင္းသားကုိယ္ေရးအခ်က္အလက္ အႀကိဳျဖည့္ရန္";
		$data['here104'] = "id='here'";
		$data['id2'] = "2";
		$this->load->view('includes/inner_header',$data);
		$this->load->view('pre_student_biography');
		$this->load->view('includes/footer');
	}

	function edit_student_biography()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - ေက်ာင္းသားကုိယ္ေရးအခ်က္အလက္ ျပင္ရန္";
		$data['here14'] = "id='here'";
		$data['id2'] = "2";
		$this->load->view('includes/inner_header',$data);
		$this->load->view('edit_student_biography');
		$this->load->view('includes/footer');
	}
	
	
	function student_biography_process()
	{
		$this->load->model('student_model','',TRUE);
		$this->form_validation->set_message('required','ဤေနရာတြင္ ျဖည့္စြက္ပါ');
		$this->form_validation->set_rules('student_name', 'student_name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('student_file','student_file','trim|xss_clean|callback_check_upload_photo');
		$this->form_validation->set_rules('student_sno','student_sno','trim|required|min_length[4]|xss_clean|callback_check_student_sno');
		$config['upload_path'] =APPPATH .'student_photos/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '9000000';
		$config['max_width'] = '9024';
		$config['max_height'] = '768';
		$this->load->library('upload', $config);
		
		if ($this->form_validation->run()==FALSE)
		{
			$this->check_upload_photo();
			$this->pre_student_biography();
		}
		else
		{
			$s_u_id=$this->input->post('u_id');		
			$student_name=$this->input->post('student_name');
			$student_sno=$this->input->post('student_sno');
			$upload_data= $this->upload->data();
			$photo= $upload_data['file_name'];
			$this->student_model->student_insert($s_u_id,$student_sno,$student_name,$photo);
		}	
	}
	
	function student_biography_show_process()
	{
		$this->load->model('student_model','',TRUE);
		$this->load->library('session');
		$this->form_validation->set_message('required',' *');
		$this->form_validation->set_rules('father_name', 'father_name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('s_nrc', 's_nrc', 'trim|required|xss_clean');
		$this->form_validation->set_rules('s_father_nrc', 's_father_nrc', 'trim|required|xss_clean');
		$this->form_validation->set_rules('s_mother_nrc', 's_mother_nrc', 'trim|required|xss_clean');
		$this->form_validation->set_rules('age', 's_nrc', 'trim|required|xss_clean');
		$this->form_validation->set_rules('native_town', 'native_town', 'trim|required|xss_clean');
		$this->form_validation->set_rules('race', 'race', 'trim|required|xss_clean');
		$this->form_validation->set_rules('height', 'height', 'trim|required|xss_clean');
		$this->form_validation->set_rules('weight', 'weight', 'trim|required|xss_clean');
		$this->form_validation->set_rules('hair_color', 'hair_color', 'trim|required|xss_clean');
		$this->form_validation->set_rules('eye_color', 'eye_color', 'trim|required|xss_clean');
		$this->form_validation->set_rules('siganificant_mark', 'siganificant_mark', 'trim|required|xss_clean');
		$this->form_validation->set_rules('last_year_roll_no', 'last_year_roll_no', 'trim|required|xss_clean');
		$this->form_validation->set_rules('current_year_roll_no', 'current_year_roll_no', 'trim|required|xss_clean');
		$this->form_validation->set_rules('home_town', 'home_town', 'trim|required|xss_clean');
		$this->form_validation->set_rules('current_address', 'current_address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('permanent_address', 'permanent_address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('birthday','birthday','callback_select_validate');
		$this->form_validation->set_rules('birthmonth','birthmonth','callback_select_validate');
		$this->form_validation->set_rules('birthyear','birthyear','callback_select_validate');
		$this->form_validation->set_rules('relegion','relegion','callback_select_validate');
		$this->form_validation->set_rules('sepcialized_subject','sepcialized_subject','callback_select_validate');
		$this->form_validation->set_rules('attending_year','attending_year','callback_select_validate');
		
		$user_id=$this->input->post('hidden_user_id');
		$s_birth_day=ltrim($this->input->post('birthday'));
		$s_birth_month=ltrim($this->input->post('birthmonth'));
		$s_birth_year=ltrim($this->input->post('birthyear'));
		$s_nrc=ltrim($this->input->post('s_nrc'));
		$s_father_nrc=ltrim($this->input->post('s_father_nrc'));
		$s_mother_nrc=ltrim($this->input->post('s_mother_nrc'));
		$s_name=ltrim($this->input->post('hidden_name'));
		$s_serial_no=ltrim($this->input->post('hidden_s_serial_no'));
		$s_alias_name=ltrim($this->input->post('young_name'));
		$s_other_name=ltrim($this->input->post('other_name'));
		$s_father_name=ltrim($this->input->post('father_name'));
		$s_age=ltrim($this->input->post('age'));
		$s_native_town=ltrim($this->input->post('native_town'));
		$s_gender=ltrim($this->input->post('gender'));
		$s_religious=ltrim($this->input->post('relegion'));
		$s_race=ltrim($this->input->post('race'));
		$s_height=ltrim($this->input->post('height'));
		$s_weight=ltrim($this->input->post('weight'));
		$s_hair_color=ltrim($this->input->post('hair_color'));
		$s_eyes_color=ltrim($this->input->post('eye_color'));
		$s_unique_sign=ltrim($this->input->post('siganificant_mark'));
		$s_major=ltrim($this->input->post('sepcialized_subject'));
		$s_last_rollno=ltrim($this->input->post('last_year_roll_no'));
		$s_current_rollno=ltrim($this->input->post('current_year_roll_no'));
		$s_class=ltrim($this->input->post('attending_year'));
		$s_schlarship=ltrim($this->input->post('scholar'));
		$s_study_fund=ltrim($this->input->post('fund'));
		$s_fee_free=ltrim($this->input->post('fee_free'));
		$s_hometown=ltrim($this->input->post('home_town'));
		$s_current_address=ltrim($this->input->post('current_address'));
		$s_permanent_address=ltrim($this->input->post('permanent_address'));
		
		if ($this->form_validation->run()==FALSE)
		{
			
			$this->student_biography_validation($user_id);
			
		}
		else
		{
			$this->student_model->student_insert_detail(
			$user_id,$s_serial_no,$s_name,$s_alias_name, $s_other_name, $s_father_name,
			$s_age , $s_birth_day,$s_birth_month,$s_birth_year, $s_native_town,$s_gender, $s_religious,
			$s_race,$s_nrc,$s_father_nrc,$s_mother_nrc,$s_height,
			$s_weight, $s_hair_color, $s_eyes_color, $s_unique_sign, $s_major,
			$s_last_rollno, $s_current_rollno, $s_class,$s_schlarship, $s_study_fund,
			$s_fee_free , $s_hometown ,$s_current_address,$s_permanent_address);
		}	
	}
	
	function student_biography_show_process_edit()
	{ 
		$config['upload_path'] =APPPATH .'student_photos/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|GIF|PNG';
		$config['max_size'] = '9000000';
		$config['max_width'] = '9024';
		$config['max_height'] = '7680';
		$this->load->library('upload', $config);
		$this->form_validation->set_message('required',' *');
		$this->form_validation->set_rules('father_name', 'father_name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('s_nrc', 's_nrc', 'trim|required|xss_clean');
		$this->form_validation->set_rules('s_father_nrc', 's_father_nrc', 'trim|required|xss_clean');
		$this->form_validation->set_rules('s_mother_nrc', 's_mother_nrc', 'trim|required|xss_clean');
		$this->form_validation->set_rules('age', 's_nrc', 'trim|required|xss_clean');
		$this->form_validation->set_rules('native_town', 'native_town', 'trim|required|xss_clean');
		$this->form_validation->set_rules('race', 'race', 'trim|required|xss_clean');
		$this->form_validation->set_rules('height', 'height', 'trim|required|xss_clean');
		$this->form_validation->set_rules('weight', 'weight', 'trim|required|xss_clean');
		$this->form_validation->set_rules('hair_color', 'hair_color', 'trim|required|xss_clean');
		$this->form_validation->set_rules('eye_color', 'eye_color', 'trim|required|xss_clean');
		$this->form_validation->set_rules('siganificant_mark', 'siganificant_mark', 'trim|required|xss_clean');
		$this->form_validation->set_rules('last_year_roll_no', 'last_year_roll_no', 'trim|required|xss_clean');
		$this->form_validation->set_rules('current_year_roll_no', 'current_year_roll_no', 'trim|required|xss_clean');
		$this->form_validation->set_rules('home_town', 'home_town', 'trim|required|xss_clean');
		$this->form_validation->set_rules('current_address', 'current_address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('permanent_address', 'permanent_address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('birthday','birthday','trim|callback_select_validate|xss_clean');
		$this->form_validation->set_rules('birthmonth','birthmonth','trim|callback_select_validate|xss_clean');
		$this->form_validation->set_rules('birthyear','birthyear','trim|callback_select_validate|xss_clean');
		$this->form_validation->set_rules('relegion','relegion','trim|callback_select_validate|xss_clean');
		$this->form_validation->set_rules('sepcialized_subject','sepcialized_subject','trim|callback_select_validate|xss_clean');
		$this->form_validation->set_rules('attending_year','attending_year','trim|callback_select_validate|xss_clean');
			
		$this->load->model('student_model','',TRUE);
		$this->load->library('session');$s_birth_day=$this->input->post('birthday');
		$s_birth_month=$this->input->post('birthmonth');
		$s_birth_year=$this->input->post('birthyear');
		$s_nrc=ltrim($this->input->post('s_nrc'));
		$s_father_nrc=ltrim($this->input->post('s_father_nrc'));
		$s_mother_nrc=ltrim($this->input->post('s_mother_nrc'));
		
		$user_id=$this->input->post('hidden_user_id');
		$s_serial_no=ltrim($this->input->post('hidden_s_serial_no'));
		$s_name=ltrim($this->input->post('std_name'));		
		$s_alias_name=ltrim($this->input->post('young_name'));
		$s_other_name=ltrim($this->input->post('other_name'));
		$s_father_name=ltrim($this->input->post('father_name'));
		$s_age=ltrim($this->input->post('age'));
		$s_native_town=ltrim($this->input->post('native_town'));
		$s_gender=ltrim($this->input->post('gender'));
		$s_religious=ltrim($this->input->post('relegion'));
		$s_race=ltrim($this->input->post('race'));
		$s_height=ltrim($this->input->post('height'));
		$s_weight=ltrim($this->input->post('weight'));
		$s_hair_color=ltrim($this->input->post('hair_color'));
		$s_eyes_color=ltrim($this->input->post('eye_color'));
		$s_unique_sign=ltrim($this->input->post('siganificant_mark'));
		$s_major=ltrim($this->input->post('sepcialized_subject'));
		$s_last_rollno=ltrim($this->input->post('last_year_roll_no'));
		$s_current_rollno=ltrim($this->input->post('current_year_roll_no'));
		$s_class=ltrim($this->input->post('attending_year'));
		$s_schlarship=ltrim($this->input->post('scholar'));
		$s_study_fund=ltrim($this->input->post('fund'));
		$s_fee_free=ltrim($this->input->post('fee_free'));
		$s_hometown=ltrim($this->input->post('home_town'));
		$s_current_address=ltrim($this->input->post('current_address'));
		$s_permanent_address=ltrim($this->input->post('permanent_address'));
		
		if ($this->form_validation->run()==FALSE){			
			$this->edit_student_biography();
		}
		else{
			if($this->upload->do_upload('student_file_edit'))
			{
				$upload_data= $this->upload->data();
				$s_photo_location= $upload_data['file_name'];
				
				$this->student_model->student_insert_detail_with_photo(
				$user_id,$s_serial_no,$s_name,$s_alias_name, $s_other_name, $s_father_name,
				$s_photo_location,$s_age , $s_birth_day,$s_birth_month,$s_birth_year, $s_native_town,$s_gender, $s_religious,
				$s_race,$s_nrc,$s_father_nrc,$s_mother_nrc,$s_height,
				$s_weight, $s_hair_color, $s_eyes_color, $s_unique_sign, $s_major,
				$s_last_rollno, $s_current_rollno, $s_class,$s_schlarship, $s_study_fund,
				$s_fee_free , $s_hometown ,$s_current_address,$s_permanent_address);
			}
			else{
				$this->student_model->student_insert_detail(
				$user_id,$s_serial_no,$s_name,$s_alias_name, $s_other_name, $s_father_name,
				$s_age , $s_birth_day,$s_birth_month,$s_birth_year, $s_native_town,$s_gender, $s_religious,
				$s_race,$s_nrc,$s_father_nrc,$s_mother_nrc,$s_height,
				$s_weight, $s_hair_color, $s_eyes_color, $s_unique_sign, $s_major,
				$s_last_rollno, $s_current_rollno, $s_class,$s_schlarship, $s_study_fund,
				$s_fee_free , $s_hometown ,$s_current_address,$s_permanent_address);			
			}	
		}
	}	
	
	function delete_student_biography()
	{
		$this->load->model('student_model','',TRUE);		
		$deleid3 = $this->uri->segment(3);
		
		$this->student_model->student_delete($deleid3);
	}
	
	function check_upload_photo()
	{
		if (!$this->upload->do_upload('student_file')){
			$this->form_validation->set_message('check_upload_photo','ဤေနရာတြင္ ဖိုင္မ်ား upload လုပ္ပါ');
			return false;
		}
		else{
			return true;
		}
	}
	
	function check_student_sno($student_sno){
		$this->load->model('student_model','',TRUE);		
		$student_sno = $this->input->post('student_sno');
		$result = $this->student_model->check_student_no($student_sno);
		if ($result){
			$this->form_validation->set_message('check_student_sno','ဤအမွတ္ ရိွႏွင့္ၿပီးျဖစ္ပါသည္ ');
			return false;
		}
		else{
			return true;
		}
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
}
?>