<?php
class _teacher extends Controller{
		private $limit =10; 
	var $terms     = array();		
	function _teacher()
	{
		parent::Controller();
		$this->load->model('teacher_model','',TRUE);
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
			
	
		//$this->load->scaffolding('entries');
	}
	function officer_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$u_id = $session_data['u_id'];
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - ဝန္ထမ္းစာရင္း";
		$data['here1'] = "id='here'";
		$data['id'] = "0";		
	
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment,'');	
		$this->form_validation->set_message('required',' *');
		
		$data['t_name'] = $this->input->post('t_name');
		$data['t_nrc'] = $this->input->post('t_nrc');
		$data['t_depeartment'] = $this->input->post('t_depeartment');
		$data['t_promotion'] = $this->input->post('t_promotion');
		$three="";
		if($data['t_name']!=""){$three="t_name";}
		if($data['t_nrc']!=""){$three="t_nrc";}
		if($data['t_depeartment']!=""){$three="t_depeartment";}
		if($data['t_promotion']!=""){$three="t_promotion";}
		
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
				$parentcars = $this->teacher_model->get_search_pagedlist($this->terms,$this->limit, $offset,$u_id)->result();
				$config['total_rows'] = $this->teacher_model->count_all_search($this->terms,$u_id);		
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
				$parentcars = $this->teacher_model->get_search_pagedlist($searchparams,$this->limit, $offset,$u_id)->result();
				$keys = $this->uri->assoc_to_uri($searchparams_uri);				 
				$config['total_rows'] = $this->teacher_model->count_all_search($searchparams,$u_id);
			}
		}
		else{
			
				$parentcars = $this->teacher_model->get_paged_list($this->limit, $offset,$u_id)->result();
			$config['total_rows'] = $this->teacher_model->count_all_query($u_id);
			$searchparams = "";
			$keys = "";
		
		}		
		
		$this->load->library('pagination');
		$config['base_url'] = site_url('_teacher/officer_list/').'/'.$keys.'/';
		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");
		$heading = array('စဥ္', 'အမည္', 'မွတ္ပုံတင္အမွတ္','ဌာန','ရာထူး','ေျပာင္းေရြ႕','ၾကည့္ရန္', 'ျပင္ရန္','ဖ်က္');				
		$this->table->set_heading($heading);
		$i = 0 + $offset;
		foreach ($parentcars as $parentcar){			
			$this->table->add_row( $this->multi_function->myanmar_number(++$i),  $parentcar->t_name, $parentcar->t_nrc, $parentcar->t_depeartment,$parentcar->t_promotion,
											anchor('_teacher/officer_transfer/'.$parentcar->t_id,'ေျပာင္းေရႊ႕'),
											anchor('off_biography/officer_biography_show/'.$parentcar->t_id,'ၾကည့္ရန္'),
											anchor('off_biography/edit_officer_biography/'.$parentcar->t_id,'ျပင္ရန္'),
											anchor('off_biography/delete_officer_biography/'.$parentcar->t_id,'ဖ်က္',
											array('onClick' => "return confirm('ဤဝန္ထမ္းစာရင္းအား ဖ်က္ရန္ ေသခ်ာပါသလား ?')"))
										);
		}
		$data['table'] = $this->table->generate();
		$this->load->view('includes/inner_header',$data);
		$this->load->view('officer_list');
		$this->load->view('includes/footer');
	}
function officer_summary()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - ဝန္ထမ္းစာရင္းေပါင္းခ်ဳပ္";
		$data['here2'] = "id='here'";	
		$data['id'] = "0";		
		$this->load->view('includes/inner_header',$data);
		$this->load->view('officer_summary');
		$this->load->view('includes/footer');
	}
	function professor_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$u_id = $session_data['u_id'];
		$data['title'] = " - ပါေမာကၡ ဌာနမွဴးစာရင္း";
		$data['here3'] = "id='here'";	
		$data['id'] = "0";		
		$total = $this->teacher_model->count_posts_professor_list($u_id);
		$config['total_rows'] = $total;
		$per_page = 10;		
		$config['per_page'] = $per_page;
		$data['posts'] = $this->teacher_model->get_posts_professor_list($u_id,$per_page, $this->uri->segment(3));
		$base_url = site_url('_teacher/professor_list/');
		$config['base_url'] = $base_url;
			$config['uri_segment'] = '3';
		$this->pagination->initialize($config);	
		$this->load->view('includes/inner_header',$data);
		$this->load->view('professor_list');
		$this->load->view('includes/footer');
	}
	function teacher_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$u_id = $session_data['u_id'];
		$data['title'] = " - ဆရာ/မမ်ား စာရင္းေပါငး္ခ်ဳပ္";
		$data['here4'] = "id='here'";
		$data['id'] = "0";	
		
		$this->load->view('includes/inner_header',$data);
		$this->load->view('teacher_list');
		$this->load->view('includes/footer');
	}
	function phd_teacher_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$u_id = $session_data['u_id'];
		$data['title'] = " - ပါရဂူဘြဲ႔ရ ဆရာ/မ မ်ားစာရင္း";
		$data['here5'] = "id='here'";
		$data['id'] = "0";		
		$this->load->view('includes/inner_header',$data);
		$this->load->view('phd_teacher_list');
		$this->load->view('includes/footer');
	}	
	function phd_training_teacher_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$u_id = $session_data['u_id'];
		$data['title'] = " - ပါရဂူသင္တန္းတတ္္ဆရာ/မမ်ားစာရင္း";
		$data['here6'] = "id='here'";	
		$data['id'] = "0";	

		
		
		$this->load->view('includes/inner_header',$data);
		$this->load->view('phd_training_teacher_list');
		$this->load->view('includes/footer');
	}
	function national_phd_professor_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$u_id = $session_data['u_id'];
		$data['title'] = " - ျပည္တြင္းပါရဂူဘြဲ႕ရ ပါေမာကၡစာရင္း";
		$data['here7'] = "id='here'";	
		$data['id'] = "0";	
		$total = $this->teacher_model->count_posts_national_phd_professor_list($u_id);
		$config['total_rows'] = $total;
		$per_page = 10;		
		$config['per_page'] = $per_page;
		$data['posts'] = $this->teacher_model->get_posts_national_phd_professor_list($u_id,$per_page, $this->uri->segment(3));
		$base_url = site_url('_teacher/national_phd_professor_list/');
		$config['base_url'] = $base_url;
			$config['uri_segment'] = '3';
		$this->pagination->initialize($config);
		
		$this->load->view('includes/inner_header',$data);
		$this->load->view('national_phd_professor_list');
		$this->load->view('includes/footer');
	}	
	function foreign_phd_professor_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$u_id = $session_data['u_id'];
		$data['title'] = " - ျပည္ပပါရဂူဘြဲ႕ရ ပါေမာကၡစာရင္း";
		$data['here8'] = "id='here'";
		$data['id'] = "0";	
		
		$total = $this->teacher_model->count_posts_foreign_phd_professor_list($u_id);
		$config['total_rows'] = $total;
		$per_page = 10;		
		$config['per_page'] = $per_page;
		$data['posts'] = $this->teacher_model->get_posts_foreign_phd_professor_list($u_id,$per_page, $this->uri->segment(3));
		$base_url = site_url('_teacher/foreign_phd_professor_list/');
		$config['base_url'] = $base_url;
			$config['uri_segment'] = '3';
		$this->pagination->initialize($config);	
		
		
		$this->load->view('includes/inner_header',$data);
		$this->load->view('foreign_phd_professor_list');
		$this->load->view('includes/footer');
	}
	function national_phd_coprofessor_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$u_id = $session_data['u_id'];
		$data['title'] = " - ျပည္တြင္းပါရဂူဘြဲ႕ရ တြဲဖက္ပါေမာကၡစာရင္း";
		$data['here9'] = "id='here'";	
		$data['id'] = "0";		
		$total = $this->teacher_model->count_posts_national_phd_coprofessor_list($u_id);
		$config['total_rows'] = $total;
		$per_page = 10;		
		$config['per_page'] = $per_page;
		$data['posts'] = $this->teacher_model->get_posts_national_phd_coprofessor_list($u_id,$per_page, $this->uri->segment(3));
		$base_url = site_url('_teacher/national_phd_coprofessor_list/');
		$config['base_url'] = $base_url;
			$config['uri_segment'] = '3';
		$this->pagination->initialize($config);	
		
		$this->load->view('includes/inner_header',$data);
		$this->load->view('national_phd_coprofessor_list');
		$this->load->view('includes/footer');
	}	
	function national_phd_lecturer_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$u_id = $session_data['u_id'];
		$data['title'] = " - ျပည္တြင္းပါရဂူဘြဲ႕ရ ကထိက စာရင္း";
		$data['here10'] = "id='here'";	
		$data['id'] = "0";	
		
		$total = $this->teacher_model->count_posts_national_phd_lecturer_list($u_id);
		$config['total_rows'] = $total;
		$per_page = 10;		
		$config['per_page'] = $per_page;
		$data['posts'] = $this->teacher_model->get_posts_national_phd_lecturer_list($u_id,$per_page, $this->uri->segment(3));
		$base_url = site_url('_teacher/national_phd_lecturer_list/');
		$config['base_url'] = $base_url;
			$config['uri_segment'] = '3';
		$this->pagination->initialize($config);	
		
		$this->load->view('includes/inner_header',$data);
		$this->load->view('national_phd_lecturer_list');
		$this->load->view('includes/footer');
	}
	function national_phd_colecturer_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$u_id = $session_data['u_id'];
		$data['title'] = " - ျပည္တြင္းပါရဂူဘြဲ႕ရ လ/ထ ကထိက စာရင္း";
		$data['here11'] = "id='here'";	
		$data['id'] = "0";	
		
					$total = $this->teacher_model->count_posts_national_phd_colecturer_list($u_id);
					$config['total_rows'] = $total;
					$per_page = 1;		
					$config['per_page'] = $per_page;
					$data['posts'] = $this->teacher_model->get_posts_national_phd_colecturer_list($u_id,$per_page, $this->uri->segment(3));
					$base_url = site_url('_teacher/national_phd_colecturer_list/');
					$config['base_url'] = $base_url;
						$config['uri_segment'] = '3';
					$this->pagination->initialize($config);	
		
		
		
		$this->load->view('includes/inner_header',$data);
		$this->load->view('national_phd_colecturer_list');
		$this->load->view('includes/footer');
	}
	function national_phd_demonstrator_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$u_id = $session_data['u_id'];
		$data['title'] = " - ျပည္တြင္းပါရဂူဘြဲ႔ရ နည္းျပ/ သရုပ္ျပစာရင္း";
		$data['here12'] = "id='here'";	
		$data['id'] = "0";		
		
		$total = $this->teacher_model->count_posts_national_phd_demonstrator_list($u_id);
		$config['total_rows'] = $total;
		$per_page = 1;		
		$config['per_page'] = $per_page;
		$data['posts'] = $this->teacher_model->get_posts_national_phd_demonstrator_list($u_id,$per_page, $this->uri->segment(3));
		$base_url = site_url('_teacher/national_phd_demonstrator_list/');
		$config['base_url'] = $base_url;
			$config['uri_segment'] = '3';
		$this->pagination->initialize($config);	
		
		
		$this->load->view('includes/inner_header',$data);
		$this->load->view('national_phd_demonstrator_list');
		$this->load->view('includes/footer');
	}	
	function admin_officer_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$u_id = $session_data['u_id'];
		$data['title'] = " - စီမံခန္႔ခြဲေရး အရာရွိစာရင္း";
		$data['here13'] = "id='here'";
		$data['id'] = "0";			
		$this->load->view('includes/inner_header',$data);
		$this->load->view('admin_officer_list');
		$this->load->view('includes/footer');
	}	
	
	function officer_transfer()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$u_id = $session_data['u_id'];
		$data['title'] = " - ေျပာင္းေရြ႕ စာရင္း";
		$data['id'] = "0";			
		$this->load->view('includes/inner_header',$data);
		$this->load->view('officer_transfer');
		$this->load->view('includes/footer');
	}
	
	function teacher_transfer_list(){		
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$u_id = $session_data['u_id'];
		$data['title'] = " - ေျပာင္းေရြ႕ စာရင္း";
		$data['id'] = "0";	
		$data['here33'] = "id='here'";	
		$data['id'] = "0";		
		$total = $this->teacher_model->count_posts_officer_transfer_list($u_id);
		$config['total_rows'] = $total;
		$per_page = 4;		
		$config['per_page'] = $per_page;
		$data['officer'] = $this->teacher_model->get_posts_officer_transfer_list($u_id,$per_page, $this->uri->segment(3));
		$base_url = site_url('_teacher/teacher_transfer_list/');
		$config['base_url'] = $base_url;
		$config['uri_segment'] = '3';
		$this->pagination->initialize($config);				
		
		$this->load->view('includes/inner_header',$data);
		$this->load->view('teacher_transfer_list');
		$this->load->view('includes/footer');		
	}
	
	function officer_transfer_process(){
		$transfer_u_id=ltrim($this->input->post('uni_transfer'));
		$t_id=ltrim($this->input->post('hidden_t_id'));
		$pre_start_date=ltrim($this->input->post('pre_start_date'));
		$pre_end_date=ltrim($this->input->post('pre_end_date'));
		$t_promotion=ltrim($this->input->post('promotion'));
		$old_u_id=ltrim($this->input->post('hidden_u_id'));
		$old_nation_foreign=ltrim($this->input->post('hidden_nation_foreign'));
		$old_t_depeartment=ltrim($this->input->post('hidden_t_depeartment'));
		$old_promotion=ltrim($this->input->post('hidden_promotion'));
		
		$query_insert="INSERT INTO transfer_teacher_tbl (t_id,prev_u_id,tran_u_id,pre_department,prev_promotion,tran_promotion,pre_start_date,pre_end_date) Value(?,?,?,?,?,?,?,?)";
		$this->db->query($query_insert,array($t_id,$old_u_id,$transfer_u_id,$old_t_depeartment,$old_promotion,$t_promotion,$pre_start_date,$pre_end_date));
		
		$query_str1="UPDATE teacher_abroad_case_tbl SET u_id='$transfer_u_id' where t_id='$t_id' ";
		$this->db->query($query_str1,array($transfer_u_id));
		$query_str2="UPDATE teacher_abroad_family_tbl SET u_id='$transfer_u_id' where t_id='$t_id' ";
		$this->db->query($query_str2,array($transfer_u_id));
		
		$query_str3="UPDATE teacher_abroad_tbl SET u_id='$transfer_u_id' where t_id='$t_id' ";
		$this->db->query($query_str3,array($transfer_u_id));
		
		$query_str4="UPDATE teacher_child_tbl SET u_id='$transfer_u_id' where t_id='$t_id' ";
		$this->db->query($query_str4,array($transfer_u_id));
		
		$query_str5="UPDATE teacher_course_tbl SET u_id='$transfer_u_id' where t_id='$t_id' ";
		$this->db->query($query_str5,array($transfer_u_id));
		
		$query_str6="UPDATE teacher_cousin_tbl SET u_id='$transfer_u_id' where t_id='$t_id' ";
		$this->db->query($query_str6,array($transfer_u_id));
		
			$query_str7="UPDATE teacher_father_tbl SET u_id='$transfer_u_id' where t_id='$t_id' ";
		$this->db->query($query_str7,array($transfer_u_id));
		
		$query_str8="UPDATE teacher_honor_tbl SET u_id='$transfer_u_id' where t_id='$t_id' ";
		$this->db->query($query_str8,array($transfer_u_id));
		
		$query_str9="UPDATE teacher_lawsuit_tbl SET u_id='$transfer_u_id' where t_id='$t_id' ";
		$this->db->query($query_str9,array($transfer_u_id));
		
		$query_str10="UPDATE teacher_mother_tbl SET u_id='$transfer_u_id' where t_id='$t_id' ";
		$this->db->query($query_str10,array($transfer_u_id));
		
		$query_str11="UPDATE teacher_partner_father_tbl SET u_id='$transfer_u_id' where t_id='$t_id' ";
		$this->db->query($query_str11,array($transfer_u_id));
		
		$query_str12="UPDATE  teacher_partner_mother_tbl SET u_id='$transfer_u_id' where t_id='$t_id' ";
		$this->db->query($query_str12,array($transfer_u_id));
		
		$query_str13="UPDATE teacher_partner_tbl SET u_id='$transfer_u_id' where t_id='$t_id' ";
		$this->db->query($query_str13,array($transfer_u_id));
		
		$query_str14="UPDATE  teacher_punish_tbl SET u_id='$transfer_u_id' where t_id='$t_id' ";
		$this->db->query($query_str14,array($transfer_u_id));
		
		$query_str15="UPDATE  teacher_qualify_tbl SET u_id='$transfer_u_id' where t_id='$t_id' ";
		$this->db->query($query_str15,array($transfer_u_id));	
		
		$query_str="UPDATE teacher_personal_tbl SET u_id='$transfer_u_id',t_promotion='$t_promotion'	where t_id='$t_id' ";
		$this->db->query($query_str,array($transfer_u_id,$t_promotion));
		redirect('_teacher/officer_list/','refresh');
	}
}
?>