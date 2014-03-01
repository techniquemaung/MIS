<?php
class Std_scholarship extends Controller{
	private $limit =5; 
	var $terms     = array();		
	
	function std_scholarship()
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
	function schlarship_student_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$u_id = $session_data['u_id'];
		$data['title'] = " - ပညာသင္ဆုရေက်ာင္းသားစာရင္း";
		$data['here36'] = "id='here'";		
		$data['id2'] = "2";
		$this->load->model('scholarship_model','',TRUE);
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment,'');	
//		$this->form_validation->set_message('required',' *');
		
		$data['s_class'] = $this->input->post('s_class');
		$data['s_major'] = $this->input->post('s_major');
		
		$total_seg = $this->uri->total_segments();			 
		if(isset($_POST['search']) || $total_seg>3)
		{
			$default = array('s_major','s_class');				 
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
				if($this->terms_uri[$default[0]]  != 'unset' ){	
					$letterdata = $this->scholarship_model->scholarship_get_search_pagedlist_do_major($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->scholarship_model->scholarship_count_all_search_do_major($this->terms,$u_id);		
				}
				if($this->terms_uri[$default[1]]   != 'unset'){	
					$letterdata = $this->scholarship_model->scholarship_get_search_pagedlist_do_class($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->scholarship_model->scholarship_count_all_search_do_class($this->terms,$u_id);		
				}
				if($this->terms_uri[$default[0]]   != 'unset' && $this->terms_uri[$default[1]]   != 'unset'){	
					$letterdata = $this->scholarship_model->scholarship_get_search_pagedlist_major_class($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->scholarship_model->scholarship_count_all_search_major_class($this->terms,$u_id);		
				}
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
					if($v != 'unset'){
						$searchparams[$k] = $v;
					}
					else{
						$searchparams[$k] = '';
					}	
				}		
				if(	$searchparams_uri[$default[0]] != 'unset'){	
					$letterdata = $this->scholarship_model->scholarship_get_search_pagedlist_do_major($searchparams,$this->limit, $offset,$u_id)->result();
					$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->scholarship_model->scholarship_count_all_search_do_major($searchparams,$u_id);
				}
				if($searchparams_uri[$default[1]] != 'unset'){	
					$letterdata = $this->scholarship_model->scholarship_get_search_pagedlist_do_class($searchparams,$this->limit, $offset,$u_id)->result();
					$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->scholarship_model->scholarship_count_all_search_do_class($searchparams,$u_id);
				}
				if($searchparams_uri[$default[0]] != 'unset' && $searchparams_uri[$default[1]] !='unset'){	
					$letterdata = $this->scholarship_model->scholarship_get_search_pagedlist_major_class($searchparams,$this->limit, $offset,$u_id)->result();
					$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->scholarship_model->scholarship_count_all_search_major_class($searchparams,$u_id);
				}
			}	
		}
		else{
			$letterdata = $this->scholarship_model->scholarship_get_paged_list($this->limit, $offset,$u_id)->result();
			$config['total_rows'] = $this->scholarship_model->scholarship_count_all_query($u_id);
			$searchparams = "";
			$keys = "";
		}		
		
		$this->load->library('pagination');
		$config['base_url'] = site_url('std_scholarship/schlarship_student_list').'/'.$keys.'/';
		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");
		$heading = array('စဥ္', 'အမည္', 'အတန္း','အထူးျပဳဘာသာ', 'ခံုအမွတ္','အေသးစိတ္ၾကည့္ရန္', 'ျပင္ရန္');				
		$this->table->set_heading($heading);
		$i = 0 + $offset;
		foreach ($letterdata as $parentcar){			
			$this->table->add_row( $this->multi_function->myanmar_number(++$i),  $parentcar->s_name, $parentcar->s_class, $parentcar->	s_major,$parentcar->	s_current_rollno,
												anchor('std_biography/std_biography_show/'.$parentcar->s_id,'Detail'),
												anchor('std_biography/edit_student_biography/'.$parentcar->s_id,'Edit')
											);
		}
		$data['table'] = $this->table->generate();
		$this->load->view('includes/inner_header',$data);
		$this->load->view('schlarship_student_list');
		$this->load->view('includes/footer');
	 }
	 
	function study_fund_student_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$u_id = $session_data['u_id'];
		$data['title'] = " - ပညာသင္ေထာက္ပံေၾကးရေက်ာင္းသားစာရင္း";
		$data['here37'] = "id='here'";		
		$data['id2'] = "2";
				$this->load->model('scholarship_model','',TRUE);
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment,'');	
//		$this->form_validation->set_message('required',' *');
		
		$data['s_class'] = $this->input->post('s_class');
		$data['s_major'] = $this->input->post('s_major');
		
		$total_seg = $this->uri->total_segments();			 
		if(isset($_POST['search']) || $total_seg>3)
		{
			$default = array('s_major','s_class');				 
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
				if($this->terms_uri[$default[0]]  != 'unset' ){	
					$letterdata = $this->scholarship_model->fund_get_search_pagedlist_do_major($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->scholarship_model->fund_count_all_search_do_major($this->terms,$u_id);		
				}
				if($this->terms_uri[$default[1]]   != 'unset'){	
					$letterdata = $this->scholarship_model->fund_get_search_pagedlist_do_class($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->scholarship_model->fund_count_all_search_do_class($this->terms,$u_id);		
				}
				if($this->terms_uri[$default[0]]   != 'unset' && $this->terms_uri[$default[1]]   != 'unset'){	
					$letterdata = $this->scholarship_model->fund_get_search_pagedlist_major_class($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->scholarship_model->fund_count_all_search_major_class($this->terms,$u_id);		
				}
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
					if($v != 'unset'){
						$searchparams[$k] = $v;
					}
					else{
						$searchparams[$k] = '';
					}	
				}		
				if(	$searchparams_uri[$default[0]] != 'unset'){	
					$letterdata = $this->scholarship_model->fund_get_search_pagedlist_do_major($searchparams,$this->limit, $offset,$u_id)->result();
					$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->scholarship_model->fund_count_all_search_do_major($searchparams,$u_id);
				}
				if($searchparams_uri[$default[1]] != 'unset'){	
					$letterdata = $this->scholarship_model->fund_get_search_pagedlist_do_class($searchparams,$this->limit, $offset,$u_id)->result();
					$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->scholarship_model->fund_count_all_search_do_class($searchparams,$u_id);
				}
				if($searchparams_uri[$default[0]] != 'unset' && $searchparams_uri[$default[1]] !='unset'){	
					$letterdata = $this->scholarship_model->fund_get_search_pagedlist_major_class($searchparams,$this->limit, $offset,$u_id)->result();
					$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->scholarship_model->fund_count_all_search_major_class($searchparams,$u_id);
				}
			}	
		}
		else{
			$letterdata = $this->scholarship_model->fund_get_paged_list($this->limit, $offset,$u_id)->result();
			$config['total_rows'] = $this->scholarship_model->fund_count_all_query($u_id);
			$searchparams = "";
			$keys = "";
		}		
		
		$this->load->library('pagination');
		$config['base_url'] = site_url('std_scholarship/study_fund_student_list').'/'.$keys.'/';
		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");
		$heading = array('စဥ္', 'အမည္', 'အတန္း','အထူးျပဳဘာသာ', 'ခံုအမွတ္','အေသးစိတ္ၾကည့္ရန္', 'ျပင္ရန္');				
		$this->table->set_heading($heading);
		$i = 0 + $offset;
		foreach ($letterdata as $parentcar){			
			$this->table->add_row( $this->multi_function->myanmar_number(++$i),  $parentcar->s_name, $parentcar->s_class, $parentcar->	s_major,$parentcar->	s_current_rollno,
												anchor('std_biography/std_biography_show/'.$parentcar->s_id,'Detail'),
												anchor('std_biography/edit_student_biography/'.$parentcar->s_id,'Edit')
											);
		}
		$data['table'] = $this->table->generate();
		$this->load->view('includes/inner_header',$data);
		$this->load->view('study_fund_student_list');
		$this->load->view('includes/footer');
	 }
	 
	function fee_free_student_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$u_id = $session_data['u_id'];
		$data['title'] = " - ေက်ာင္းလခလြတ္ၿငိမ္းခြင့္ရေက်ာင္းသားစာရင္း";
		$data['here38'] = "id='here'";		
		$data['id2'] = "2";
				$this->load->model('scholarship_model','',TRUE);
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment,'');	
//		$this->form_validation->set_message('required',' *');
		
		$data['s_class'] = $this->input->post('s_class');
		$data['s_major'] = $this->input->post('s_major');
		
		$total_seg = $this->uri->total_segments();			 
		if(isset($_POST['search']) || $total_seg>3)
		{
			$default = array('s_major','s_class');				 
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
				if($this->terms_uri[$default[0]]  != 'unset' ){	
					$letterdata = $this->scholarship_model->fee_free_get_search_pagedlist_do_major($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->scholarship_model->fee_free_count_all_search_do_major($this->terms,$u_id);		
				}
				if($this->terms_uri[$default[1]]   != 'unset'){	
					$letterdata = $this->scholarship_model->fee_free_get_search_pagedlist_do_class($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->scholarship_model->fee_free_count_all_search_do_class($this->terms,$u_id);		
				}
				if($this->terms_uri[$default[0]]   != 'unset' && $this->terms_uri[$default[1]]   != 'unset'){	
					$letterdata = $this->scholarship_model->fee_free_get_search_pagedlist_major_class($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->scholarship_model->fee_free_count_all_search_major_class($this->terms,$u_id);		
				}
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
					if($v != 'unset'){
						$searchparams[$k] = $v;
					}
					else{
						$searchparams[$k] = '';
					}	
				}		
				if(	$searchparams_uri[$default[0]] != 'unset'){	
					$letterdata = $this->scholarship_model->fee_free_get_search_pagedlist_do_major($searchparams,$this->limit, $offset,$u_id)->result();
					$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->scholarship_model->fee_free_count_all_search_do_major($searchparams,$u_id);
				}
				if($searchparams_uri[$default[1]] != 'unset'){	
					$letterdata = $this->scholarship_model->fee_free_get_search_pagedlist_do_class($searchparams,$this->limit, $offset,$u_id)->result();
					$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->scholarship_model->fee_free_count_all_search_do_class($searchparams,$u_id);
				}
				if($searchparams_uri[$default[0]] != 'unset' && $searchparams_uri[$default[1]] !='unset'){	
					$letterdata = $this->scholarship_model->fee_free_get_search_pagedlist_major_class($searchparams,$this->limit, $offset,$u_id)->result();
					$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->scholarship_model->fee_free_count_all_search_major_class($searchparams,$u_id);
				}
			}	
		}
		else{
			$letterdata = $this->scholarship_model->fee_free_get_paged_list($this->limit, $offset,$u_id)->result();
			$config['total_rows'] = $this->scholarship_model->fee_free_count_all_query($u_id);
			$searchparams = "";
			$keys = "";
		}		
		
		$this->load->library('pagination');
		$config['base_url'] = site_url('std_scholarship/fee_free_student_list').'/'.$keys.'/';
		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");
		$heading = array('စဥ္', 'အမည္', 'အတန္း','အထူးျပဳဘာသာ', 'ခံုအမွတ္','အေသးစိတ္ၾကည့္ရန္', 'ျပင္ရန္');				
		$this->table->set_heading($heading);
		$i = 0 + $offset;
		foreach ($letterdata as $parentcar){			
			$this->table->add_row( $this->multi_function->myanmar_number(++$i),  $parentcar->s_name, $parentcar->s_class, $parentcar->	s_major,$parentcar->	s_current_rollno,
												anchor('std_biography/std_biography_show/'.$parentcar->s_id,'Detail'),
												anchor('std_biography/edit_student_biography/'.$parentcar->s_id,'Edit')
											);
		}
		$data['table'] = $this->table->generate();
		$this->load->view('includes/inner_header',$data);
		$this->load->view('fee_free_student_list');
		$this->load->view('includes/footer');
	 }
}
?>