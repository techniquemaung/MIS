<?php
class _student extends Controller{
	private $limit =10; 
	var $terms     = array();		
	
	function _student()
	{
		parent::Controller();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('date');		
		$this->load->helper('download');		
		$this->view_data['base_url']=base_url();		
	
		//$this->load->scaffolding('entries');
	}
	function student_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}		
		$u_id = $session_data['u_id'];
		//$u_id = $this->uri->segment(4);
		//$data['u_id'] = $this->uri->segment(4);
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - ေက်ာင္းသားမ်ားစာရင္း";
		$data['here15'] = "id='here'";	
		$data['id2'] = "2";		
		$this->load->model('student_model','',TRUE);
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment,'');	
		$this->form_validation->set_message('required',' *');
		
		$data['s_name'] = $this->input->post('s_name');
		$data['s_nrc'] = $this->input->post('s_nrc');
		$data['s_hometown'] = $this->input->post('s_hometown');
		$data['s_major'] = $this->input->post('s_major');
		$three="";
		if($data['s_name']!=""){$three="s_name";}
		if($data['s_nrc']!=""){$three="s_nrc";}
		if($data['s_hometown']!=""){$three="s_hometown";}
		if($data['s_major']!=""){$three="s_major";}
		
		$total_seg = $this->uri->total_segments();			 
		if(isset($_POST['search']) || $total_seg>3)
		{
			$default =	array($three); 		 
			if($total_seg > 3)
			{
				$this->terms = $this->uri->uri_to_assoc(3,$default); 				 				 
				for($i=0;$i<count($default);$i++){										
					if($this->terms[$default[$i]] == 'unset'){
						$this->terms[$default[$i]] = '0';						
						$this->terms_uri[$default[$i]] = 'unset';				 
					}
					else{
						$this->terms_uri[$default[$i]] = $this->terms[$default[$i]];		
					}									
				}				
				if(($total_seg % 2) > 0){					 		 
					$this->terms = array_slice($this->terms, 0 , (floor($total_seg/2)-1));					
					$offset = $this->uri->segment($total_seg, '');		
					$uri_segment = $total_seg;
				}							
				$keys = $this->uri->assoc_to_uri($this->terms_uri);	
				$parentcars = $this->student_model->get_search_pagedlist($this->terms,$this->limit, $offset,$u_id)->result();
				$config['total_rows'] = $this->student_model->count_all_search($this->terms,$u_id);		
				$this->terms = array();							
				$this->terms_uri = array();		
			}
			else{
				$searchparams_uri = array();				 
				for($i=0;$i<count($default);$i++){
					if($this->input->post($default[$i]) != ''){						
						$searchparams_uri[$default[$i]] = $this->input->post($default[$i]);
						$data[$default[$i]] = $this->input->post($default[$i]);						
					}else{										
						$searchparams_uri[$default[$i]] = 'unset';
						$data[$default[$i]] = '';						
					}
				}			
				foreach($searchparams_uri as $k=>$v){
					if($v!= 'unset'){
						$searchparams[$k]=$v;
					}
					else{
						$searchparams[$k]='';
					}	
				}		
				$parentcars = $this->student_model->get_search_pagedlist($searchparams,$this->limit, $offset,$u_id)->result();
				$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
				$config['total_rows'] = $this->student_model->count_all_search($searchparams,$u_id);
			}
		}
		else{
			$parentcars = $this->student_model->get_paged_list($this->limit, $offset,$u_id)->result();
			$config['total_rows'] = $this->student_model->count_all_query($u_id);
			$searchparams = "";
			$keys = "";
		}		
		
		$this->load->library('pagination');
		$config['base_url'] = site_url('_student/student_list/').'/'.$keys.'/';
		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");
		$heading = array('စဥ္', 'အမည္', 'မွတ္ပုံတင္အမွတ္','အထူးျပဳဘာသာ', 'အေသးစိတ္ၾကည့္ရန္', 'ျပင္ရန္','ဖ်က္ရန္');				
		$this->table->set_heading($heading);
		$i = 0 + $offset;
		foreach ($parentcars as $parentcar){			
			$this->table->add_row( $this->multi_function->myanmar_number(++$i),  $parentcar->s_name, $parentcar->s_nrc, $parentcar->	s_major,
											anchor('std_biography/std_biography_show/'.$parentcar->s_id,'အေသးစိတ္ၾကည့္ရန္'),
											anchor('std_biography/edit_student_biography/'.$parentcar->s_id,'ျပင္ရန္'),
											anchor('std_biography/delete_student_biography/'.$parentcar->s_id,'ဖ်က္ရန္',
											array('onClick' => "return confirm('ဤေက်ာင္းသားစာရင္းအား ဖ်က္ရန္ ေသခ်ာပါသလား ?')"))
										);
		}
		$data['table'] = $this->table->generate();
		$this->load->view('includes/inner_header',$data);
		$this->load->view('student_list',$data);
		$this->load->view('includes/footer');
	}
	function student_summary()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - ေက်ာင္းသားစာရင္းေပါင္းခ်ဳပ္";
		$data['here16'] = "id='here'";	
		$data['id2'] = "2";		
		$this->load->view('includes/inner_header',$data);
		$this->load->view('student_summary');
		$this->load->view('includes/footer');
	}		
	function regular_degree_student_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - ရုိးရုိးဘြဲ႕ေက်ာင္းသားစာရင္း";
		$data['here17'] = "id='here'";			
		$data['id2'] = "2";
		$this->load->view('includes/inner_header',$data);
		$this->load->view('regular_degree_student_list');
		$this->load->view('includes/footer');
	}		
	function hons_degree_student_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - ဂုဏ္ထူးတန္း ေက်ာင္းသားစာရင္းေပါင္းခ်ဳပ္";
		$data['here18'] = "id='here'";	
		$data['id2'] = "2";		
		$this->load->view('includes/inner_header',$data);
		$this->load->view('hons_degree_student_list');
		$this->load->view('includes/footer');
	}		
	function master_degree_student_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - မဟာအရည္အခ်င္းစစ္ ေက်ာင္းသားစာရင္း";
		$data['here19'] = "id='here'";	
		$data['id2'] = "2";		
		$this->load->view('includes/inner_header',$data);
		$this->load->view('master_degree_student_list');
		$this->load->view('includes/footer');
	}	
	function masterinfo_degree_student_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - မဟာသုေတသနေက်ာင္းသားစာရင္း";
		$data['here20'] = "id='here'";	
		$data['id2'] = "2";		
		$this->load->view('includes/inner_header',$data);
		$this->load->view('masterinfo_degree_student_list');
		$this->load->view('includes/footer');
	}	
	function township_student_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$u_id = $session_data['u_id'];
		$data['title'] = " - ၿမိဳ႕အလိုက္ ေက်ာင္းသားဦးေရ";
		$data['here21'] = "id='here'";	
		$data['id2'] = "2";				
		$this->load->model('student_model');
		$per_page = 5;
		$total = $this->student_model->count_posts($u_id);
		$data['posts'] = $this->student_model->get_posts($u_id,$per_page, $this->uri->segment(3));
		$base_url = site_url('_student/township_student_list/');
		$config['base_url'] = $base_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = '3';
		$this->pagination->initialize($config);	
		$this->load->view('includes/inner_header',$data);
		$this->load->view('township_student_list');
		$this->load->view('includes/footer');							
	}	

	function pre_student_biography()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - ေက်ာင္းသားကိုယ္ေရးရာဇဝင္ျဖည့္ရန္";
		$data['here14'] = "id='here'";		
		$data['id2'] = "2";
		$this->load->view('includes/inner_header',$data);
		$this->load->view('pre_student_biography');
		$this->load->view('includes/footer');
	 }
	 
	function pre_edit_student_biography()
	{
	if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
	$data['u_id'] = $session_data['u_id'];
	$data['title'] = " - ေက်ာင္းသားကိုယ္ေရးရာဇဝင္ျဖည့္ရန္";
	$data['here14'] = "id='here'";
	$data['id2'] = "2";
	$this->load->view('includes/inner_header',$data);
	$this->load->view('pre_edit_student_biography');
	$this->load->view('includes/footer');
	}
	
	function pre_edit_student_biography_process()
	{
		$config['upload_path'] =APPPATH .'student_photos/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|GIF|PNG';
		$config['max_size'] = '9000000';
		$config['max_width'] = '9024';
		$config['max_height'] = '7680';
		$this->load->library('upload', $config);
		
/*		$this->form_validation->set_message('required','ဤေနရာတြင္ ျဖည့္စြက္ပါ');
		$this->form_validation->set_rules('student_name', 'student_name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('edit_student_file','edit_student_file','trim|xss_clean|callback_check_upload_photo');
		$this->form_validation->set_rules('student_sno','student_sno','trim|required|min_length[4]|xss_clean|callback_check_student_sno');
*/		
		$this->load->model('student_model','',TRUE);
		$s_student_sno=ltrim($this->input->post('student_sno'));
		$s_student_name=ltrim($this->input->post('student_name'));
		$s_student_id=ltrim($this->input->post('student_id'));
		
/*		if ($this->form_validation->run()==FALSE){
			$this->pre_student_biography();
		}
		else{	*/
			if($this->upload->do_upload('edit_student_file'))
			{
			$upload_data= $this->upload->data();
			$s_photo_location= $upload_data['file_name'];
			
			$this->student_model->pre_student_insert_with_photo($s_student_id,$s_student_sno,$s_student_name,$s_photo_location);
			}
			else{
			$this->student_model->pre_student_insert_without_photo($s_student_id,$s_student_sno,$s_student_name);
			}
//		}
	}
	
	function pre_edit_student_biography_again()
	{
	if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
	$data['u_id'] = $session_data['u_id'];
	$data['title'] = " - ေက်ာင္းသားကိုယ္ေရးရာဇဝင္ျပင္ရန္";
	$data['here14'] = "id='here'";
	$data['id2'] = "2";
	$this->load->view('includes/inner_header',$data);
	$this->load->view('pre_edit_student_biography_again');
	$this->load->view('includes/footer');
	}
	function pre_edit_student_biography_again_process()
	{
		$config['upload_path'] =APPPATH .'student_photos/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|GIF|PNG';
		$config['max_size'] = '9000000';
		$config['max_width'] = '9024';
		$config['max_height'] = '7680';
		$this->load->library('upload', $config);
		
/*		$this->form_validation->set_message('required','ဤေနရာတြင္ ျဖည့္စြက္ပါ');
		$this->form_validation->set_rules('student_name', 'student_name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('edit_student_file','edit_student_file','trim|xss_clean|callback_check_upload_photo');
		$this->form_validation->set_rules('student_sno','student_sno','trim|required|min_length[4]|xss_clean|callback_check_student_sno');
*/		
		$this->load->model('student_model','',TRUE);
		$s_student_sno=ltrim($this->input->post('student_sno'));
		$s_student_name=ltrim($this->input->post('student_name'));
		$s_student_id=ltrim($this->input->post('student_id'));
		
/*		if ($this->form_validation->run()==FALSE){
			$this->pre_student_biography();
		}
		else{	*/
			if($this->upload->do_upload('edit_student_file'))
			{
			$upload_data= $this->upload->data();
			$s_photo_location= $upload_data['file_name'];
			
			$this->student_model->pre_student_insert_again_with_photo($s_student_id,$s_student_sno,$s_student_name,$s_photo_location);
			}
			else{
			$this->student_model->pre_student_insert_again_without_photo($s_student_id,$s_student_sno,$s_student_name);
			}
//		}
	}
	
	function check_student_sno(){
		$this->load->model('student_model','',TRUE);
		$s_student_sno = $this->input->post('student_sno');
		$s_student_id = $this->input->post('student_id');
		$result = $this->student_model->check_pre_student_no($s_student_sno,$s_student_id);
		if ($result){
			$this->form_validation->set_message('check_student_sno','ဤအမွတ္ ရိွႏွင့္ၿပီးျဖစ္ပါသည္ ');
			return false;
		}
		else{
			return true;
		}
	}		 
}
?>