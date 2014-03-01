<?php
class announcement extends Controller{
	function announcement()
	{
		parent::Controller();
		
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		//$this->load->scaffolding('entries');
	}
	
	function announcement_add()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = "ပညာေရးဝန္ႀကီးဌာန - ေၾကျငာခ်က္ထုတ္ရန္စာမ်က္ႏွာ";
		
		$this->load->library('fckeditor');

//		$this->load->view('fckeditorView');

		$this->load->view('includes/inner_header',$data);
		$this->load->view('announcement_add');
		$this->load->view('includes/footer');
	}
	
	function announcement_add_process()
	{
		$this->load->model('announcement_model');		
		$this->form_validation->set_message('required','ဤေနရာတြင္ ျဖည့္စြက္ပါ');
		$this->form_validation->set_rules('title', 'title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('content', 'content', 'trim|required|xss_clean');
		
		$date = $this->input->post('hidden_date');
		$title = $this->input->post('title');
		$body = $this->input->post('content');
		if ($this->form_validation->run()==FALSE)
		{
			$this->announcement_add();
		}
		else
		{
			$this->announcement_model->announce_insert($title,$body,$date);
		}				
	}
	
	function announcement_edit()
	{
		$this->load->model('announcement_model');
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = "ပညာေရးဝန္ႀကီးဌာန - ေၾကျငာခ်က္ထုတ္ရန္စာမ်က္ႏွာ";
		$data['announce_id'] = $this->uri->segment(3);
		$this->load->library('fckeditor');

//		$this->load->view('fckeditorView');

		$this->load->view('includes/inner_header',$data);
		$this->load->view('announcement_edit');
		$this->load->view('includes/footer');
	}
	
	function announcement_edit_reset($announce_id)
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['announce_id'] = $announce_id;
		$data['title'] = "ပညာေရးဝန္ႀကီးဌာန - ေၾကျငာခ်က္ထုတ္ရန္စာမ်က္ႏွာ";
		$this->load->library('fckeditor');

//		$this->load->view('fckeditorView');

		$this->load->view('includes/header',$data);
		$this->load->view('announcement_edit');
		$this->load->view('includes/footer');
	}
	
	function announcement_edit_process()
	{
		$this->load->model('announcement_model');
		$this->form_validation->set_message('required','ဤေနရာတြင္ ျပင္ဆင္ျဖည့္စြက္ပါ');
		$this->form_validation->set_rules('title', 'title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('content', 'content', 'trim|required|xss_clean');
		
		$announce_id = $this->input->post('hidden_announce_id');
		$date = $this->input->post('hidden_date');
		$title = $this->input->post('title');
		$body = $this->input->post('content');
		if ($this->form_validation->run()==FALSE)
		{
			$this->announcement_edit_reset($announce_id);
//			echo "Error appear";
//			$this->announcement_add();
		}
		else
		{
			$this->announcement_model->announce_update($announce_id,$title,$body,$date);	
		}	
	}
	
	function announcement_show()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = "ပညာေရးဝန္ႀကီးဌာန - ေၾကျငာခ်က္မ်ား";
		$this->load->view('includes/header',$data);
		$this->load->view('announcement_show');
		$this->load->view('includes/footer');
	}
	
	function announcement_list(){
		$this->load->model('announcement_model');		
		
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = "ပညာေရးဝန္ႀကီးဌာန - သတင္းစစ္ေဆးရန္";
		$total = $this->announcement_model->count_posts_announcement_list();
		$config['total_rows'] = $total;
		$per_page = 10;		
		$config['per_page'] = $per_page;
		$data['posts'] = $this->announcement_model->get_posts_announcement_list($per_page, $this->uri->segment(3));
		$base_url = site_url('announcement/announcement_list/');
		$config['base_url'] = $base_url;
		$config['uri_segment'] = '3';
		$this->pagination->initialize($config);	
		
		$this->load->view('includes/inner_header',$data);
		$this->load->view('announcement_list');
		$this->load->view('includes/footer');
	}
	
	function delete_announcement_post(){
		$deleid3= $this->uri->segment(3);
		$this->db->delete('announcement_tbl',array('announce_id'=>$deleid3));
		redirect('announcement/announcement_list/','refresh');
	}
}	
?>