<?php
class Education extends Controller{
	function Education()
	{
		parent::Controller();
		
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('encrypt');
		
		//$this->load->scaffolding('entries');
	}
	function index()
	{	
		$session_data = $this->session->userdata('logged_in');
		$data['u_id'] = $session_data['u_id'];	
		$data['title'] = "ပညာေရးဝန္ႀကီးဌာန - မူလစာမ်က္ႏွာ";
		$data['here24'] = "id='here'";	
			
		$this->load->model('account_model');		
		
		$session_data = $this->session->userdata('logged_in');
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = "ပညာေရးဝန္ႀကီးဌာန - သတင္းစစ္ေဆးရန္";
		$total = $this->account_model->count_posts_content_list();
		$config['total_rows'] = $total;
		$per_page = 2;		
		$config['per_page'] = $per_page;
		$data['posts'] = $this->account_model->get_posts_content_list($per_page, $this->uri->segment(3));
		$base_url = site_url('education/index/');
		$config['base_url'] = $base_url;
		$config['uri_segment'] = '3';
		
		$this->pagination->initialize($config);		
		$this->load->view('includes/header',$data);
		$this->load->view('index');
		$this->load->view('includes/footer');
	}
	function about()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = "ပညာေရးဝန္ႀကီးဌာန - အႏွစ္ခ်ဳပ္";
		$data['here25'] = "id='here'";	
		$this->load->view('includes/header',$data);
		$this->load->view('about');
		$this->load->view('includes/footer');		
	}
	function contact()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = "ပညာေရးဝန္ႀကီးဌာန - ဆက္သြယ္ရန္";
		$data['here26'] = "id='here'";			
		$this->load->view('includes/header',$data);
		$this->load->view('contact');
		$this->load->view('includes/footer');		
	}
	function uni_home()
	{	
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];			
		$data['title'] = " - မူလစာမ်က္ႏွာ";
		$data['here24'] = "id='here'";
		$data['id'] = "0";		
     	$this->load->view('includes/inner_header',$data);
		$this->load->view('uni_home');
		$this->load->view('includes/footer');	   
	}
	function contact_uni_home()
	{	
		$session_data = $this->session->userdata('logged_in');
		$data['u_id'] = $session_data['u_id'];			
		$data['title'] = " တကၠသိုလ္မ်ား - မူလစာမ်က္ႏွာ";
		$this->load->view('includes/header',$data);
		$this->load->view('contact_uni_home');
		$this->load->view('includes/footer');	   
	}	
	function admin_home()
	{	
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = "ပညာေရးဝန္ႀကီးဌာန - ပင္မစာမ်က္ႏွာ";
		$data['here24'] = "id='here'";			
		$this->load->view('includes/inner_header',$data);
		$this->load->view('admin_home');
		$this->load->view('includes/footer');		
	}
	function login_process()
	{
		$this->load->model('account_model','',TRUE);
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('login_password', 'Password', 'trim|required|xss_clean|callback_check_database');
			
		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$session_data = $this->session->userdata('logged_in');
			$_uid= $session_data['u_id'];
			if($_uid == 0)
			{
				$this->admin_home();					 			
			}
			else{
				$this->uni_home();
			}
		}		
	}
	
	 function check_database($password)
	 {
	   //Field validation succeeded.  Validate against database
	   $username = $this->input->post('username');		
	   //query the database
	  // $password='xfoTafhptZztSeUvpxJ3a7PzLoyiiwHQExTdJMkj3w1X6hlfBnTqvC0fgfQ0vTozJna9ZqPxQYx9J90baGztEg==';
	   $result = $this->account_model->login($username, $password);
	
	   if($result)
	   {
	     $sess_array = array();
	     foreach($result as $row)
	     {
	       $sess_array = array(
	         'u_id' => $row->u_id,
	         'user_name' => $row->user_name
	       );
	       $this->session->set_userdata('logged_in', $sess_array);
	     }
	     return TRUE;
	   }
	   else
	   {
	     $this->form_validation->set_message('check_database', 'username ႏွင့္ password မွန္ကန္စြာ ရုိက္ထည့္ပါ');
	     return false;
	   }
	 }
	function logout_process()
	 {
	   $this->session->unset_userdata('logged_in');
	   $this->session->sess_destroy();
	   redirect('education', 'refresh');
	 }
}
?>