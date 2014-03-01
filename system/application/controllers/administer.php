<?php
class Administer extends Controller{
	function Administer()
	{
		parent::Controller();
		
		
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');			
		$this->load->library('encrypt');
		
		$this->load->scaffolding('university_tbl');
	}
	
	function add_new_university()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = "ပညာေရးဝန္ႀကီးဌာန - တကၠသိုလ္အသစ္ထည့္ရန္";					
		$this->load->view('includes/inner_header',$data);
		$this->load->view('add_new_university');
		$this->load->view('includes/footer');		
	}	
	
	function show_university()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = "ပညာေရးဝန္ႀကီးဌာန - တကၠသိုလ္စာရင္းၾကည့္ရန္";		
		$this->load->model('university_model');		
		$total = $this->university_model->count_posts_university_list();
		$config['total_rows'] = $total;
		$per_page = 15;		
		$config['per_page'] = $per_page;
		$data['posts'] = $this->university_model->get_posts_university_list($per_page, $this->uri->segment(3));
		$base_url = site_url('administer/show_university/');
		$config['base_url'] = $base_url;
		$config['uri_segment'] = '3';
		$this->pagination->initialize($config);	

		$this->load->view('includes/inner_header',$data);
		$this->load->view('show_university');
		$this->load->view('includes/footer');		
	}
	
	function edit_university()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = "ပညာေရးဝန္ႀကီးဌာန - တကၠသိုလ္အခ်က္အလက္ေျပာင္းရန္";					
		$this->load->view('includes/header',$data);
		$this->load->view('edit_university');
		$this->load->view('includes/footer');		
	}
	function edit_university_reset($uni_id)
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['uni_id'] = $uni_id;
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = "ပညာေရးဝန္ႀကီးဌာန - တကၠသိုလ္အခ်က္အလက္ေျပာင္းရန္";					
		$this->load->view('includes/header',$data);
		$this->load->view('edit_university');
		$this->load->view('includes/footer');		
	}
	/*
	 * This is the process function for( add_new_university linking views function)
	 */	
	function add_new_uni_process()
	{	
		$this->load->model('university_model');	
		
		$this->form_validation->set_message('required', 'ဤေနရာတြင္ ျဖည့္စြက္ေပးပါ');
		$this->form_validation->set_message('min_length', 'ဤေနရာတြင္ character ၄ခု အနည္းဆံုး ျဖည့္စြက္ေပးပါ');
		$this->form_validation->set_message('max_length', 'ဤေနရာတြင္character ၃၂ခု အမ်ားဆံုး ျဖည့္စြက္ေပးပါ');
		$this->form_validation->set_message('matches', 'လွ်ိ႕ဝွက္ကုဒ္ တူညီစြာ ျဖည့္စြက္ေပးပါ');		
		$this->form_validation->set_rules('uni_name', 'University Name', 'trim|required|min_length[4]|xss_clean|callback_check_university_ci');
		$this->form_validation->set_rules('username', 'User Name', 'trim|required|min_length[4]|xss_clean');		
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]|md5');
		$this->form_validation->set_rules('uni_location','uni_location','callback_select_validate');
		$this->form_validation->set_rules('uni_address','uni_address','trim|required|min_length[4]|xss_clean');		
		
		if($this->form_validation->run() == FALSE)
		{
		$this->add_new_university();
		}
		else
		{
			$uni_name=$this->input->post('uni_name');
			$uni_location=$this->input->post('uni_location');
			$uni_address=$this->input->post('uni_address');
			$username=$this->input->post('username');
			$password1= $this->input->post('password');		
			$uni_intro=$this->input->post('uni_intro');
			$uni_body=$this->input->post('uni_body');
			$uni_conclusion=$this->input->post('uni_conclusion');	
			$key = 'ministry-of-education';
			$password = $this->encrypt->encode($password1, $key);			
			$this->university_model->uni_insert($uni_name,$uni_location,$uni_address,$username,$password,$uni_intro,$uni_body,$uni_conclusion);
		}			
	}
	
	/*
	 * This is update university process
	 */
	function update_university_process()
	{
		$this->load->model('university_model');	
		
		$this->form_validation->set_message('required', 'ဤေနရာတြင္ ျပင္ဆင္ျဖည့္စြက္ေပးပါ');
		$this->form_validation->set_message('min_length', 'ဤေနရာတြင္ character ၄ခု အနည္းဆံုး ျဖည့္စြက္ေပးပါ');
		$this->form_validation->set_message('max_length', 'ဤေနရာတြင္character ၃၂ခု အမ်ားဆံုး ျဖည့္စြက္ေပးပါ');
		$this->form_validation->set_message('matches', 'လွ်ိ႕ဝွက္ကုဒ္ တူညီစြာ ျပင္ဆင္ျဖည့္စြက္ေပးပါ');		
		$this->form_validation->set_rules('uni_name', 'University Name', 'trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('username', 'User Name', 'trim|required|min_length[4]|xss_clean');		
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_rules('uni_location','uni_location','callback_select_validate');
		$this->form_validation->set_rules('uni_address','uni_address','trim|required|min_length[4]|xss_clean');		
		
		if($this->form_validation->run() == FALSE)
		{
			$uni_id = $this->input->post('uni_id');
			$this->edit_university_reset($uni_id);
		}
		else
		{
			$uni_id = $this->input->post('uni_id');
			$uni_name=$this->input->post('uni_name');
			$uni_location=$this->input->post('uni_location');
			$uni_address=$this->input->post('uni_address');
			$username=$this->input->post('username');
			$password1= $this->input->post('password');		
			$uni_intro=$this->input->post('uni_intro');
			$uni_body=$this->input->post('uni_body');
			$uni_conclusion=$this->input->post('uni_conclusion');
			$key = 'ministry-of-education';
			$password = $this->encrypt->encode($password1, $key);				
			$this->university_model->uni_update($uni_id,$uni_name,$uni_location,$uni_address,$username,$password,$uni_intro,$uni_body,$uni_conclusion);
		}		
	}
	
	public function check_university_ci()
	{
		$uni=$this->input->post('uni_name');
        $result=$this->university_model->check_university_exist($uni);
        if($result)
		{
			$this->form_validation->set_message('check_university_ci', 'ဤတကၠသုိလ္အမည္ ရိွႏွင့္ၿပီး ျဖစ္ပါသည္');
			return false;
		}
		else
		{
			return true;
		}
	}
	
	public function check_university()
	{
		$uni=$this->input->post('name');
		//$uni="aaaa";
        $result=$this->university_model->check_university_exist($uni);
        if($result)
        {
			echo "false";
			
        }
        else{
			
			echo "true";
        }
	}
	
	 function select_validate($selectValue)
	{		
		if($selectValue == '0')
		{
		$this->form_validation->set_message('select_validate', 'ေရြးခ်ယ္ေပးပါ');
		return false;
		}
		else 
		{
		return true;
		}
	}
	
	function delete_university()
	{
		$this->load->model('university_model','',TRUE);		
		$deleid = $this->uri->segment(3);
		$this->university_model->delete_university($deleid);	
	}
}
?>