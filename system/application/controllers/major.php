<?php
class Major extends Controller{
	function major()
	{
		parent::Controller();
		
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		//$this->load->scaffolding('entries');
	}
	function major_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - အထူးျပဳသာသာရပ္မ်ား ျဖည့္သြင္းရန္";
		$data['here34'] = "id='here'";
		$data['id3'] = "3";			
		$this->load->view('includes/inner_header',$data);
		$this->load->view('major_list');
		$this->load->view('includes/footer');
	}
	function edit_major_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - အထူးျပဳသာသာရပ္မ်ား ျပင္ဆင္ရန္";
		$data['here34'] = "id='here'";
		$data['id3'] = "3";			
		$this->load->view('includes/inner_header',$data);
		$this->load->view('edit_major_list');
		$this->load->view('includes/footer');
	}
function major_list_view()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - အထူးျပဳသာသာရပ္မ်ား စာရင္း";
		$data['here35'] = "id='here'";
		$data['id3'] = "3";			
		$this->load->view('includes/inner_header',$data);
		$this->load->view('major_list_view');
		$this->load->view('includes/footer');
	}
	function major_add()
	{
		$this->form_validation->set_message('required',' *');
		$this->form_validation->set_rules('major', 'major', 'trim|required|xss_clean');
		$this->form_validation->set_rules('class_head', 'class_head', 'trim|required|xss_clean');
		$this->form_validation->set_rules('class_bachelar','class_bachelar','callback_select_validate');
		$this->form_validation->set_rules('class_honus','class_honus','callback_select_validate');
		$this->form_validation->set_rules('class_master','class_master','callback_select_validate');
		$this->form_validation->set_rules('class_phd','class_phd','callback_select_validate');
			if ($this->form_validation->run()==FALSE)
		{
			
			$this->major_list();
			
		}
		else
		{		$data['u_id']= $this->input->post('hidden_uid');		
				$data['major']=$this->input->post('major');				
				$data['class_bachelar']=$this->input->post('class_bachelar');
				$data['class_honus']=$this->input->post('class_honus');
				$data['class_master']=$this->input->post('class_master');
				$data['class_phd']=$this->input->post('class_phd');
				$data['class_head']=$this->input->post('class_head');
				$this->db->insert('major_tbl', $data); 
				redirect('major/major_list_view','refresh');
		}
		
		
	}
	function major_edit()
	{ 			$data['major_id']= $this->input->post('hidden_mid');		
				$data['u_id']= $this->input->post('hidden_uid');		
				$data['major']=$this->input->post('major');				
				$data['class_bachelar']=$this->input->post('class_bachelar');
				$data['class_honus']=$this->input->post('class_honus');
				$data['class_master']=$this->input->post('class_master');
				$data['class_phd']=$this->input->post('class_phd');
				$data['class_head']=$this->input->post('class_head');
				$this->db->where('major_id', $data['major_id']);
				$this->db->update('major_tbl', $data); 
				redirect('major/major_list_view','refresh');
		
	}
	function major_delete()
	{
		$this->load->model('letter_model','',TRUE);		
		$deleid3 = $this->uri->segment(3);		
		$this->db->where('major_id', $deleid3);
		$this->db->delete('major_tbl'); 
		redirect('major/major_list_view','refresh');
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
}
?>