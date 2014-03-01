<?php
class Letter extends Controller{
	private $limit = 10; 
	var $terms = array();		
	function Letter()
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
	function outbox()
	{		
		
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$u_id = $session_data['u_id'];
		$data['title'] = " - စာထြက္ျပဇယား";
		$data['here23'] = "id='here'";
		$data['id4'] = "4";			
		
		$this->load->model('letter_model','',TRUE); 
		$this->load->helper('url');
		$uri_segment =3;
		$offset = $this->uri->segment($uri_segment,'');		
		$data['l_uni_in']= $this->input->post('l_uni_in');
		//	$u_id= $this->input->post('hidden_u_id');
		$data['l_day']= $this->input->post('l_day');
		$data['l_month']= $this->input->post('l_month');
		$data['l_year']= $this->input->post('l_year');			
		
		$total_seg = $this->uri->total_segments();			 
 		if(isset($_POST['search'])|| $total_seg>3 )
		{
			$default = array('l_uni_in','l_day','l_month','l_year');				 
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
					$letterdata = $this->letter_model->get_search_pagedlist_do_uni($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->letter_model->count_all_search_do_uni($this->terms,$u_id);		
				}
				if($this->terms_uri[$default[1]]   != 'unset'){	
					$letterdata = $this->letter_model->get_search_pagedlist_do_day($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->letter_model->count_all_search_do_day($this->terms,$u_id);		
				}
				if($this->terms_uri[$default[2]]   != 'unset'){	
					$letterdata = $this->letter_model->get_search_pagedlist_do_month($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->letter_model->count_all_search_do_month($this->terms,$u_id);		
				}
				if($this->terms_uri[$default[3]]   != 'unset'){	
					$letterdata = $this->letter_model->get_search_pagedlist_do_year($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->letter_model->count_all_search_do_year($this->terms,$u_id);		
				}
				if($this->terms_uri[$default[0]]   != 'unset' && $this->terms_uri[$default[1]]   != 'unset'){	
					$letterdata = $this->letter_model->get_search_pagedlist_uni_day($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->letter_model->count_all_search_uni_day($this->terms,$u_id);		
				}
				if($this->terms_uri[$default[0]]   != 'unset' && $this->terms_uri[$default[2]]   != 'unset'){	
					$letterdata = $this->letter_model->get_search_pagedlist_do_month($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->letter_model->count_all_search_do_month($this->terms,$u_id);		
				}
				if($this->terms_uri[$default[0]]   != 'unset' && $this->terms_uri[$default[3]]   != 'unset'){	
					$letterdata = $this->letter_model->get_search_pagedlist_uni_year($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->letter_model->count_all_search_uni_year($this->terms,$u_id);		
				}
				if($this->terms_uri[$default[1]]  != 'unset' && $this->terms_uri[$default[2]]  != 'unset' && $this->terms_uri[$default[3]]   != 'unset'){	
					$letterdata = $this->letter_model->get_search_pagedlist_day_month_year($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->letter_model->count_all_search_day_month_year($this->terms,$u_id);		
				}
				if($this->terms_uri[$default[0]]   != 'unset' && $this->terms_uri[$default[1]]   != 'unset' && $this->terms_uri[$default[2]]   != 'unset' && $this->terms_uri[$default[3]]   != 'unset'){	
					$letterdata = $this->letter_model->get_search_pagedlist_uni_day_moth_year($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->letter_model->count_all_search_uni_day_moth_year($this->terms,$u_id);		
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
					$letterdata = $this->letter_model->get_search_pagedlist_do_uni($searchparams,$this->limit, $offset,$u_id)->result();
					$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->letter_model->count_all_search_do_uni($searchparams,$u_id);
				}
				if($searchparams_uri[$default[1]] != 'unset'){	
					$letterdata = $this->letter_model->get_search_pagedlist_do_day($searchparams,$this->limit, $offset,$u_id)->result();
					$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->letter_model->count_all_search_do_day($searchparams,$u_id);
				}
				if(	$searchparams_uri[$default[2]] != 'unset'){	
					$letterdata = $this->letter_model->get_search_pagedlist_do_month($searchparams,$this->limit, $offset,$u_id)->result();
					$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->letter_model->count_all_search_do_month($searchparams,$u_id);
				}
				 if($searchparams_uri[$default[3]] !='unset'){	
					$letterdata = $this->letter_model->get_search_pagedlist_do_year($searchparams,$this->limit, $offset,$u_id)->result();
					 $keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->letter_model->count_all_search_do_year($searchparams,$u_id);
				}
				if($searchparams_uri[$default[0]] != 'unset' && $searchparams_uri[$default[1]] !='unset'){	
					$letterdata = $this->letter_model->get_search_pagedlist_uni_day($searchparams,$this->limit, $offset,$u_id)->result();
					$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->letter_model->count_all_search_uni_day($searchparams,$u_id);
				}
				 if($searchparams_uri[$default[0]] != 'unset' && $searchparams_uri[$default[2]] != 'unset'){	
					$letterdata = $this->letter_model->get_search_pagedlist_uni_month($searchparams,$this->limit, $offset,$u_id)->result();
					$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->letter_model->count_all_search_uni_month($searchparams,$u_id);
				}
				if(	$searchparams_uri[$default[0]] !=  'unset' && $searchparams_uri[$default[3]] !=  'unset'){	
					$letterdata = $this->letter_model->get_search_pagedlist_uni_year($searchparams,$this->limit, $offset,$u_id)->result();
					$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->letter_model->count_all_search_uni_year($searchparams,$u_id);
				}
				if($searchparams_uri[$default[1]] !=  'unset' && $searchparams_uri[$default[2]] !=  'unset' && $searchparams_uri[$default[3]] !=  'unset'){	
					$letterdata = $this->letter_model->get_search_pagedlist_day_month_year($searchparams,$this->limit, $offset,$u_id)->result();
					$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->letter_model->count_all_search_day_month_year($searchparams,$u_id);
				}
				if(	$searchparams_uri[$default[0]] !=  'unset' && $searchparams_uri[$default[1]] !=  'unset' && $searchparams_uri[$default[2]] !=  'unset' && $searchparams_uri[$default[3]] !=  'unset'){	
					$letterdata = $this->letter_model->get_search_pagedlist_uni_day_moth_year($searchparams,$this->limit, $offset,$u_id)->result();
					$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->letter_model->count_all_search_uni_day_moth_year($searchparams,$u_id);
				}
			}	
		}
		else{
			$letterdata = $this->letter_model->get_paged_list($this->limit, $offset,$u_id)->result();
			$config['total_rows'] = $this->letter_model->count_all_query($u_id);
			$searchparams = "";
			$keys = "";
		}			
		
		$this->load->library('pagination');		
		$config['base_url'] = site_url('letter/outbox/').'/'.$keys.'/';
		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");				 
		$heading = array('စဥ္ ', 'စာအမွတ္', 'အေၾကာင္းအရာ','စာ(အေသးစိတ္)','စာမူရင္း','ရက္စြဲ','ျပင္ရန္','ဖ်က္ရန္');				
		$this->table->set_heading($heading);
		$i = 0 + $offset;
		if( $this->uri->segment(3)!="l_uni_in"){
			foreach ($letterdata  as $letterdata1){			
				$current_page =  $this->uri->segment(3);	
				$this->table->add_row(	$this->multi_function->myanmar_number(++$i), $letterdata1->l_no, $letterdata1->l_title,
												anchor('letter/outbox'.'/'.$current_page.'/','ဖတ္ရန္',
												array('onClick' => "return alert('$letterdata1->l_description')")),				    
												anchor('letter/download_letter_outbox/'.$letterdata1->l_id,'Download'),
												$letterdata1->l_day.'/'. $letterdata1->	l_month.'/'. $letterdata1->l_year,
												anchor('letter/edit_letter_outbox/'.$letterdata1->l_id.'/'.$current_page,'Edit'),
												anchor('letter/delete_letter_outbox/'.$letterdata1->l_id.'/'.$current_page,'Delete',
												array('onClick' => "return confirm('ယခု ရံုးစာအား ဖ်က္ရန္ ေသခ်ာပါသလား ?')"))
											);
			}
		}
		if( $this->uri->segment(3)=="l_uni_in"){
			foreach ($letterdata  as $letterdata1){			
				$current_page=$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.
				$this->uri->segment(6).'/'. $this->uri->segment(7).'/'.$this->uri->segment(8).'/'.
				$this->uri->segment(9).'/'.$this->uri->segment(10).'/'.$this->uri->segment(11).'/'.$this->uri->segment(12) ;
				$this->table->add_row( $this->multi_function->myanmar_number(++$i), $letterdata1->l_no, $letterdata1->l_title,
												anchor('letter/outbox'.'/'.$current_page.'/','ဖတ္ရန္',
												array('onClick' => "return alert('$letterdata1->l_description')")),				    
												anchor('letter/download_letter_outbox/'.$letterdata1->l_id,'Download'),
												$letterdata1->l_day.'/'. $letterdata1->	l_month.'/'. $letterdata1->l_year,
												anchor('letter/edit_letter_outbox/'.$letterdata1->l_id.'/'.$current_page,'Edit'),
												anchor('letter/delete_letter_outbox/'.$letterdata1->l_id.'/'.$current_page,'Delete',
												array('onClick' => "return confirm('ယခု ရံုးစာအား ဖ်က္ရန္ ေသခ်ာပါသလား ?')"))
											);
			}
		}
		
		$data['table'] = $this->table->generate();						 		
		$this->load->view('includes/inner_header',$data);
		if ($u_id == 0){$this->load->view('admin_outbox',$data);}else{$this->load->view('outbox',$data);};
		$this->load->view('includes/footer');	
	}

/*
 * Letter inbox/outbox joining view functions Start
 */
	function inbox()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$u_id = $session_data['u_id'];
		$data['title'] = " - စာဝင္ျပဇယား";
		$data['here22'] = "id='here'";
		$data['id4'] = "4";		
		$this->load->model('letter_model','',TRUE); 
		$this->load->helper('url');
		$uri_segment =3;
		$offset = $this->uri->segment($uri_segment,'');		
		$data['l_uni_in']= $this->input->post('l_uni_out');	
		$data['l_day']= $this->input->post('l_day');
		$data['l_month']= $this->input->post('l_month');
		$data['l_year']= $this->input->post('l_year');			
		
		$total_seg = $this->uri->total_segments();			 
 		if(isset($_POST['search'])|| $total_seg>3 )
		{
			$default = array('l_uni_out','l_day','l_month','l_year');				 
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
					$letterdata = $this->letter_model->inbox_get_search_pagedlist_do_uni($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->letter_model->inbox_count_all_search_do_uni($this->terms,$u_id);		
				}
				if($this->terms_uri[$default[1]]   != 'unset'){	
					$letterdata = $this->letter_model->inbox_get_search_pagedlist_do_day($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->letter_model->inbox_count_all_search_do_day($this->terms,$u_id);		
				}
				if($this->terms_uri[$default[2]]   != 'unset'){	
					$letterdata = $this->letter_model->inbox_get_search_pagedlist_do_month($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->letter_model->inbox_count_all_search_do_month($this->terms,$u_id);		
				}
				if($this->terms_uri[$default[3]]   != 'unset'){	
					$letterdata = $this->letter_model->inbox_get_search_pagedlist_do_year($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->letter_model->inbox_count_all_search_do_year($this->terms,$u_id);		
				}
				if($this->terms_uri[$default[0]]   != 'unset' && $this->terms_uri[$default[1]]   != 'unset'){	
					$letterdata = $this->letter_model->inbox_get_search_pagedlist_uni_day($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->letter_model->inbox_count_all_search_uni_day($this->terms,$u_id);		
				}
				if($this->terms_uri[$default[0]]   != 'unset' && $this->terms_uri[$default[2]]   != 'unset'){	
					$letterdata = $this->letter_model->inbox_get_search_pagedlist_do_month($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->letter_model->inbox_count_all_search_do_month($this->terms,$u_id);		
				}
				if($this->terms_uri[$default[0]]   != 'unset' && $this->terms_uri[$default[3]]   != 'unset'){	
					$letterdata = $this->letter_model->inbox_get_search_pagedlist_uni_year($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->letter_model->inbox_count_all_search_uni_year($this->terms,$u_id);		
				}
				if($this->terms_uri[$default[1]]  != 'unset' && $this->terms_uri[$default[2]]  != 'unset' && $this->terms_uri[$default[3]]   != 'unset'){	
					$letterdata = $this->letter_model->inbox_get_search_pagedlist_day_month_year($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->letter_model->inbox_count_all_search_day_month_year($this->terms,$u_id);		
				}
				if($this->terms_uri[$default[0]]   != 'unset' && $this->terms_uri[$default[1]]   != 'unset' && $this->terms_uri[$default[2]]   != 'unset' && $this->terms_uri[$default[3]]   != 'unset'){	
					$letterdata = $this->letter_model->inbox_get_search_pagedlist_uni_day_moth_year($this->terms,$this->limit, $offset,$u_id)->result();
					$config['total_rows'] = $this->letter_model->inbox_count_all_search_uni_day_moth_year($this->terms,$u_id);		
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
				if(	$searchparams_uri[$default[0]] !=  'unset'){	
					$letterdata = $this->letter_model->inbox_get_search_pagedlist_do_uni($searchparams,$this->limit, $offset,$u_id)->result();
					 $keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->letter_model->inbox_count_all_search_do_uni($searchparams,$u_id);
				}
				 if	($searchparams_uri[$default[1]] !=  'unset'){	
					$letterdata = $this->letter_model->inbox_get_search_pagedlist_do_day($searchparams,$this->limit, $offset,$u_id)->result();
					$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->letter_model->inbox_count_all_search_do_day($searchparams,$u_id);
				}
				 if($searchparams_uri[$default[2]] !=  'unset'){	
					$letterdata = $this->letter_model->inbox_get_search_pagedlist_do_month($searchparams,$this->limit, $offset,$u_id)->result();
					$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->letter_model->inbox_count_all_search_do_month($searchparams,$u_id);
				}
				 if($searchparams_uri[$default[3]] !=  'unset'){	
					$letterdata = $this->letter_model->inbox_get_search_pagedlist_do_year($searchparams,$this->limit, $offset,$u_id)->result();
					 $keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->letter_model->inbox_count_all_search_do_year($searchparams,$u_id);
				}
				 if($searchparams_uri[$default[0]] !=  'unset' && $searchparams_uri[$default[1]] !=  'unset'){	
					$letterdata = $this->letter_model->inbox_get_search_pagedlist_uni_day($searchparams,$this->limit, $offset,$u_id)->result();
					$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->letter_model->inbox_count_all_search_uni_day($searchparams,$u_id);
				}
				if($searchparams_uri[$default[0]] !=  'unset' && $searchparams_uri[$default[2]] !=  'unset'){	
					$letterdata = $this->letter_model->inbox_get_search_pagedlist_uni_month($searchparams,$this->limit, $offset,$u_id)->result();
					$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->letter_model->inbox_count_all_search_uni_month($searchparams,$u_id);
				}
				if($searchparams_uri[$default[0]] !=  'unset' && $searchparams_uri[$default[3]] !=  'unset'){	
					$letterdata = $this->letter_model->inbox_get_search_pagedlist_uni_year($searchparams,$this->limit, $offset,$u_id)->result();
					$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->letter_model->inbox_count_all_search_uni_year($searchparams,$u_id);
				}
				if($searchparams_uri[$default[1]] !=  'unset' && $searchparams_uri[$default[2]] !=  'unset' && $searchparams_uri[$default[3]] !=  'unset'){	
					$letterdata = $this->letter_model->inbox_get_search_pagedlist_day_month_year($searchparams,$this->limit, $offset,$u_id)->result();
					$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->letter_model->inbox_count_all_search_day_month_year($searchparams,$u_id);
				}
				if($searchparams_uri[$default[0]] !=  'unset' && $searchparams_uri[$default[1]] !=  'unset' && $searchparams_uri[$default[2]] !=  'unset' && $searchparams_uri[$default[3]] !=  'unset'){	
					$letterdata = $this->letter_model->inbox_get_search_pagedlist_uni_day_moth_year($searchparams,$this->limit, $offset,$u_id)->result();
					$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
					$config['total_rows'] = $this->letter_model->inbox_count_all_search_uni_day_moth_year($searchparams,$u_id);
				}
			}	
		}
		else{
			$letterdata = $this->letter_model->inbox_get_paged_list($this->limit, $offset,$u_id)->result();
			$config['total_rows'] = $this->letter_model->inbox_count_all_query($u_id);
			$searchparams = "";
			$keys = "";
		}			
	
		$this->load->library('pagination');		
		$config['base_url'] = site_url('letter/inbox/').'/'.$keys.'/';
		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");				 
		$heading = array('စဥ္ ', 'စာအမွတ္', 'အေၾကာင္းအရာ','စာ(အေသးစိတ္)','စာမူရင္း','ရက္စြဲ');				
		$this->table->set_heading($heading);
		$i = 0 + $offset;
						
		if( $this->uri->segment(3)!="l_uni_out"){
			foreach ($letterdata  as $letterdata1){			
				$current_page =  $this->uri->segment(3);	
				$this->table->add_row(	$this->multi_function->myanmar_number(++$i), $letterdata1->l_no, $letterdata1->l_title,
												anchor('letter/inbox'.'/'.$current_page.'/','  ဖတ္ရန္',
												array('onClick' => "return alert('$letterdata1->l_description')")),				    
												anchor('letter/download_letter_outbox/'.$letterdata1->l_id,'Download'),
												$letterdata1->l_day.'/'. $letterdata1->	l_month.'/'. $letterdata1->l_year
											);
			}
		}
		if( $this->uri->segment(3)=="l_uni_out"){
			foreach ($letterdata  as $letterdata1){			
				$current_page=$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.
				$this->uri->segment(6).'/'. $this->uri->segment(7).'/'.$this->uri->segment(8).'/'.
				$this->uri->segment(9).'/'.$this->uri->segment(10).'/'.$this->uri->segment(11).'/'.$this->uri->segment(12) ;
				$this->table->add_row(	$this->multi_function->myanmar_number(++$i), $letterdata1->l_no, $letterdata1->l_title,
												anchor('letter/inbox'.'/'.$current_page.'/','ဖတ္ရန္',
												array('onClick' => "return alert('$letterdata1->l_description')")),				    
												anchor('letter/download_letter_outbox/'.$letterdata1->l_id,'Download'),
												$letterdata1->l_day.'/'. $letterdata1->	l_month.'/'. $letterdata1->l_year);
			}
		}
		
		$data['table'] = $this->table->generate();
		$this->load->view('includes/inner_header',$data);
		if ($u_id == 0){$this->load->view('admin_inbox');}else{$this->load->view('inbox');}
		$this->load->view('includes/footer');
	}

	function edit_letter_outbox()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$u_id = $session_data['u_id'];
		$data['title'] = " - စာထြက္ျပဇယား";
		$data['here23'] = "id='here'";
		$data['id4'] = "4";		
				
		$this->load->view('includes/inner_header',$data);
		if ($u_id == 0){$this->load->view('admin_edit_letter_out_form');}else{$this->load->view('edit_letter_out_form');}
		$this->load->view('includes/footer');		
	}

/*
 * Letter inbox/outbox joining view functions End
 */
/*
 * Outbox edit/delete/search and validation functions Start
 */
	function letter_outbox_process()
	{				
		$this->load->model('letter_model','',TRUE);
		$this->form_validation->set_message('required','ဤေနရာတြင္ ျဖည့္စြက္ပါ');
		$this->form_validation->set_rules('box_to','box_to','callback_select_validate');			
		$this->form_validation->set_rules('letter_no','letter_no','trim|required|xss_clean|callback_check_letterno');
		$this->form_validation->set_rules('out_box_file','out_box_file','trim|xss_clean|callback_check_upload');
		$this->form_validation->set_rules('title','title','trim|required|xss_clean');
		$this->form_validation->set_rules('description','description','trim|required|xss_clean');
		$config['upload_path'] =APPPATH .'uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|docx|doc';
		$config['max_size'] = '1000000';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$this->load->library('upload', $config);
		if ($this->form_validation->run()==FALSE)
		{			
			$this->check_upload();	
			$this->outbox();		
		}
		else
		{
			$letter_no=$this->input->post('letter_no');
			$title=$this->input->post('title');			
			$description=$this->input->post('description');
			$l_day=$this->input->post('hidden_day');
			$l_month=$this->input->post('hidden_month');
			$l_year=$this->input->post('hidden_year');
			$box_to=$this->input->post('box_to');
			$box_from=$this->input->post('hidden_u_id');
			$upload_data = $this->upload->data();
			$data= $upload_data['file_name'];			
			$this->letter_model->letter_insert($letter_no,$title,$data,$description,$l_day,$l_month,$l_year,$box_to,$box_from);
		}
	}
	
	function check_upload()
	{
		if (!$this->upload->do_upload('out_box_file'))
		{
			$this->form_validation->set_message('check_upload','ဤေနရာတြင္ ဖိုင္မ်ား upload လုပ္ပါ');
			return false;
		}
		else 
		{
			return true;
		}
	}
	
	function edit_letter_operation()
	{
		$this->load->model('letter_model','',TRUE);	
		$config['upload_path'] =APPPATH .'uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|docx|doc';
		$config['max_size'] = '1000000';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload('edit_outbox_file') )
		{		
			$letter_no=$this->input->post('hidden_l_no');
			$title=$this->input->post('title');
			$description=$this->input->post('description');
			$l_day=$this->input->post('hidden_day');
			$l_month=$this->input->post('hidden_month');
			$l_year=$this->input->post('hidden_year');												
			$box_from=$this->input->post('hidden_u_id');														
			$letter_id=$this->input->post('hidden_id');		
			$uri_current=$this->input->post('hidden_uri_current');														
			$this->letter_model->letter_edit_no_upload($letter_id,$letter_no,$title,$description,$l_day,$l_month,$l_year,$box_from,$uri_current);				
		}
		else
		{
			$letter_no=$this->input->post('hidden_l_no');
			$title=$this->input->post('title');
			$description=$this->input->post('description');
			$l_day=$this->input->post('hidden_day');
			$l_month=$this->input->post('hidden_month');
			$l_year=$this->input->post('hidden_year');										
			$box_from=$this->input->post('hidden_u_id');
			$upload_data1 = $this->upload->data();
			$data1= $upload_data1['file_name'];			
			$letter_id=$this->input->post('hidden_id');	
			$uri_current=$this->input->post('hidden_uri_current');															
			$this->letter_model->letter_edit_yes_upload($letter_id,$letter_no,$title,$data1,$description,$l_day,$l_month,$l_year,$box_from,$uri_current);
		}		
	}
	
	function delete_letter_outbox()
	{
		$deleid4= $this->uri->segment(4);
		
		$this->load->model('letter_model','',TRUE);		
		$deleid3 = $this->uri->segment(3);
		
		$this->letter_model->letter_delete($deleid3,$deleid4);	
	}
	
	function download_letter_outbox()
	{
		$requested_file = $this->uri->segment(3);
		$query = $this->db->getwhere('letter_tbl', array('l_id'=>$requested_file));
		foreach ($query->result() as $row)
		{
			$source= $row->l_file_location;
			$path = $_SERVER['DOCUMENT_ROOT'];
			$data = file_get_contents($path."/ytp-edu/system/application/uploads/".$source);
			$file_name = $source;
			force_download($file_name, $data);
		}	
	}
	
	function check_letterno($letter_no){			
		$letter_no = $this->input->post('letter_no');
		$result = $this->letter_model->check_letter($letter_no);
		if ($result) 
		{
			$this->form_validation->set_message('check_letterno','ဤစာအမွတ္ ရိွႏွင့္ၿပီးျဖစ္ပါသည္ ');
			return false;			
		}
		else 
		{
			return true;
		}
	}
	/****************Outbox search start****************/	

	function select_validate($selectValue)
	{		
		if($selectValue == '')
		{
		$this->form_validation->set_message('select_validate', 'ေရြးခ်ယ္ေပးပါ');
		return false;
		}
		else 
		{
		return true;
		}
	}
	/****************Outbox search end****************/	
}
?>