<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<title>
			<?php
					$query = $this->db->getwhere('university_tbl', array('u_id'=>$u_id));
					foreach ($query->result() as $row)
					{	
						echo $row->u_name.$title;
					}					
				?>
		</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>system/application/views/includes/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>system/application/views/includes/blueprint/screen.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>system/application/views/includes/blueprint/ie.css">
		
		<!-- accordian jquery start -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>system/application/views/includes/css/biography.css"/>
		<script type="text/javascript" src="<?php echo base_url()?>system/application/views/includes/js/prototype.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>system/application/views/includes/js/effects.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>system/application/views/includes/js/accordion.js"></script>
			<script type="text/javascript">
				
				//
			//  In my case I want to load them onload, this is how you do it!
			// 
			Event.observe(window, 'load', loadAccordions, false);
		
			//
			//	Set up all accordions
			//
			function loadAccordions() {
				var topAccordion = new accordion('horizontal_container', {
					classNames : {
						toggle : 'horizontal_accordion_toggle',
						toggleActive : 'horizontal_accordion_toggle_active',
						content : 'horizontal_accordion_content'
					},
					defaultSize : {
						width : 525
					},
					direction : 'horizontal'
				});
				
				var bottomAccordion = new accordion('vertical_container');
				
				var nestedVerticalAccordion = new accordion('vertical_nested_container', {
				  classNames : {
						toggle : 'vertical_accordion_toggle',
						toggleActive : 'vertical_accordion_toggle_active',
						content : 'vertical_accordion_content'
					}
				});
				
				// Open first one
				bottomAccordion.activate($$('#vertical_container .accordion_toggle')[0]);
				
				// Open second one
				topAccordion.activate($$('#horizontal_container .horizontal_accordion_toggle')[2]);
			}
			
		</script>

	</head>
	<body>
		<div id="container">
			<div class="span-24" id="header">
				<div class="span-24 header_top">
					<a href="<?php echo base_url()?>"><div id="logo" class="span-3"></div></a>
					<div  class="span-7 edu_TText">
						<a href="<?php echo base_url()?>"><div class="span-7 edu_titleMM">ပညာေရး၀န္ႀကီးဌာန</div></a><br/>
						<a href="<?php echo base_url()?>"><div class="span-7 edu_titleEng">Ministry Of Education</div></a>
					</div>
					<div class="span-13 last form_position">
						<?php echo form_open('education/logout_process'); ?>
										<div class="span-10 speacer1">
											
										</div><br/>
										<div class="span-3 last" style="margin-top:3px;">
											<input type="submit" name="btn1" value="" class="logout_btn" style="text-decoration:none;margin-left:3px;">
										</div>
						<?php echo form_close();?>
					</div>
				</div>
				<div class="span-24" id="navi_bg">
					<ul id="nave">
						<li><a href="<?php echo base_url()?>index.php/education/uni_home" <?php if (isset($here24)){print $here24;}?>>HOME</a></li>	
						<li><a href="<?php echo base_url()?>index.php/education/about">ABOUT</a></li>
						<li><a href="<?php echo base_url()?>index.php/education/contact">CONTACT</a></li>					 
					</ul>
				</div>
			</div>
					
			<div class="span-24">
				<div class="span-22 prepend-top"><h3> <span style="color:#FCC100; margin-left:15px;">
				<?php
					$query = $this->db->getwhere('university_tbl', array('u_id'=>$u_id));
					foreach ($query->result() as $row)
					{	
						echo $row->u_name;
					}					
				?>
				</span></h3></div>

