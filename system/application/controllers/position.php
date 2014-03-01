<?php
class Position extends Controller{
	function position()
	{
		parent::Controller();
		
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		//$this->load->scaffolding('entries');
	}
	function position_add()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - ရာထူးမ်ားစာရင္း ထည့္သြင္းရန္";
		$data['here36'] = "id='here'";
		$data['id1'] = "1";			
		$this->load->view('includes/inner_header',$data);
		$this->load->view('position_add');
		$this->load->view('includes/footer');
	}
	function edit_position_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - ရာထူးမ်ားစာရင္း ျပင္ဆင္ရန္";
		$data['here34'] = "id='here'";
		$data['id1'] = "1";			
		$this->load->view('includes/inner_header',$data);
		$this->load->view('edit_position_list');
		$this->load->view('includes/footer');
	}

	function position_list()
	{
		if( $this->session->userdata('logged_in')==FALSE)	{ redirect('education/index/','refresh');}	else{ $session_data = $this->session->userdata('logged_in');}
		$data['u_id'] = $session_data['u_id'];
		$data['title'] = " - ရာထူးမ်ားစာရင္း အေသးစိတ္ၾကည့္ရန္";
		$data['here35'] = "id='here'";
		$data['id1'] = "1";			
		$this->load->view('includes/inner_header',$data);
		$this->load->view('position_list');
		$this->load->view('includes/footer');
	}
	function position_add_process()
	{
		$this->form_validation->set_message('required',' *');
		$this->form_validation->set_rules('position_name', 'position_name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('position_count','position_count', 'trim|required|xss_clean');
			if ($this->form_validation->run()==FALSE)
		{
			
			$this->position_add();
			
		}
		else
		{		
				$data['u_id']= $this->input->post('hidden_uid');		
				$data['position_name']=$this->input->post('position_name');				
				$data['position_count']=$this->input->post('position_count');
				$this->db->insert('position_tbl', $data); 
				redirect('position/position_list','refresh');
		}
		
		
	}
	function position_edit_process()
	{ 		
		$data['u_id']= $this->input->post('hidden_uid');		
		echo $hidden_position= $this->input->post('hidden_position');
		$data['position_name']=$this->input->post('position_name');				
		$data['position_count']=$this->input->post('position_count');
		$this->db->where('position_id', $hidden_position);
		$this->db->update('position_tbl', $data); 
		redirect('position/position_list','refresh');
	}
	function position_delete()
	{
		$deleid3 = $this->uri->segment(3);		
		$this->db->where('position_id', $deleid3);
		$this->db->delete('position_tbl'); 
		redirect('position/position_list','refresh');
	}
}
?>