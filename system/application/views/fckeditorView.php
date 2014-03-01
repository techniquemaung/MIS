<?php 

	$this->load->helper('form');
	echo 'FckEditor';
	echo form_open('editor/fckeditorshowpost');
	echo $this->fckeditor->Create() ;
	echo form_submit(array('value'=>'submit'));
	echo form_close();

?>
