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
		<link rel="shortcut icon" href="<?php echo base_url()?>system/application/views/includes/images/edu_logo.png">		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>system/application/views/includes/css/style.css" media="screen, projection">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>system/application/views/includes/blueprint/screen.css" media="screen, projection">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>system/application/views/includes/blueprint/ie.css">
	
		<!-- Left Menu accordian start -->
		 <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>system/application/views/includes/css/biography.css">
		<link rel="stylesheet" href="<?php echo base_url()?>system/application/views/includes/css/LeftMenustyle.css" type="text/css" />		
		<script type="text/javascript" src="<?php echo base_url()?>system/application/views/includes/js/script.js"></script>		
		<!-- Left Menu accordian end-->
		
		<!-- Light Box Start -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>system/application/views/includes/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
		<script type="text/javascript" src="<?php echo base_url()?>system/application/views/includes/fancybox/jquery-1.4.3.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>system/application/views/includes/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>system/application/views/includes/fancybox/daily_inbox.js"></script>
		<!-- Light Box End -->		

			<!-- Add Row Start (5cols)-->
	<script language="javascript">
		function addRow(tableID) {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
			var colCount = table.rows[0].cells.length;
			for(var i=0; i<colCount; i++) {
				var newcell = row.insertCell(i);
				newcell.innerHTML = table.rows[0].cells[i].innerHTML;
				//alert(newcell.childNodes);
				switch(newcell.childNodes[0].type) {
					case "text":
					newcell.childNodes[0].value = "";
					break;
					case "checkbox":
					newcell.childNodes[0].checked = false;
					break;
//					case "select-one":
//					newcell.childNodes[0].selectedIndex = 0;
//					break;
				}
			}
		}

		function deleteRow(tableID) {
			try {
				var table = document.getElementById(tableID);
				var rowCount = table.rows.length;

				for(var i=0; i<rowCount; i++) {
					var row = table.rows[i];
					var chkbox = row.cells[0].childNodes[0];
					if(null != chkbox && true == chkbox.checked) {
						if(rowCount <= 1) {
							alert("Cannot delete all the rows.");
							break;
						}
						table.deleteRow(i);
						rowCount--;
						i--;
					}
				}
			}catch(e) {
				alert(e);
			}
		}

	</script>
		<!-- Function addRow1 Start (8cols)-->
	<script language="javascript">
		function addRow1(tableID) {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
			var colCount = table.rows[0].cells.length;
			for(var i=0; i<colCount; i++) {
				var newcell = row.insertCell(i);
				newcell.innerHTML = table.rows[0].cells[i].innerHTML;
				//alert(newcell.childNodes);
				switch(newcell.childNodes[0].type) {
					case "text":
					newcell.childNodes[0].value = "";
					break;
					case "checkbox":
					newcell.childNodes[0].checked = false;
					break;
	//				case "select-one":
	//				newcell.childNodes[0].selectedIndex = 0;
	//				break;
				}
			}
		}
	
		function deleteRow1(tableID) {
			try {
				var table = document.getElementById(tableID);
				var rowCount = table.rows.length;
	
				for(var i=0; i<rowCount; i++) {
					var row = table.rows[i];
					var chkbox = row.cells[0].childNodes[0];
					if(null != chkbox && true == chkbox.checked) {
						if(rowCount <= 1) {
							alert("Cannot delete all the rows.");
							break;
						}
						table.deleteRow(i);
						rowCount--;
						i--;
					}
				}
			}catch(e) {
				alert(e);
			}
		}

	</script>
	<!-- Function addRow2 Start (4cols)-->
	<script language="javascript">
		function addRow2(tableID) {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
			var colCount = table.rows[0].cells.length;
			for(var i=0; i<colCount; i++) {
				var newcell = row.insertCell(i);
				newcell.innerHTML = table.rows[0].cells[i].innerHTML;
				//alert(newcell.childNodes);
				switch(newcell.childNodes[0].type) {
					case "text":
					newcell.childNodes[0].value = "";
					break;
					case "checkbox":
					newcell.childNodes[0].checked = false;
					break;
	//				case "select-one":
	//				newcell.childNodes[0].selectedIndex = 0;
	//				break;
				}
			}
		}
	
		function deleteRow2(tableID) {
			try {
				var table = document.getElementById(tableID);
				var rowCount = table.rows.length;
	
				for(var i=0; i<rowCount; i++) {
					var row = table.rows[i];
					var chkbox = row.cells[0].childNodes[0];
					if(null != chkbox && true == chkbox.checked) {
						if(rowCount <= 1) {
							alert("Cannot delete all the rows.");
							break;
						}
						table.deleteRow(i);
						rowCount--;
						i--;
					}
				}
			}catch(e) {
				alert(e);
			}
		}

	</script>
	
		<!-- Function addRow3 Start (6cols)-->
	<script language="javascript">
	function addRow3(tableID) {
		var table = document.getElementById(tableID);
		var rowCount = table.rows.length;
		var row = table.insertRow(rowCount);
		var colCount = table.rows[0].cells.length;
		for(var i=0; i<colCount; i++) {
			var newcell = row.insertCell(i);
			newcell.innerHTML = table.rows[0].cells[i].innerHTML;
			//alert(newcell.childNodes);
			switch(newcell.childNodes[0].type) {
				case "text":
				newcell.childNodes[0].value = "";
				break;
				case "checkbox":
				newcell.childNodes[0].checked = false;
				break;
//				case "select-one":
//				newcell.childNodes[0].selectedIndex = 0;
//				break;
			}
		}
	}

	function deleteRow3(tableID) {
		try {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;

			for(var i=0; i<rowCount; i++) {
				var row = table.rows[i];
				var chkbox = row.cells[0].childNodes[0];
				if(null != chkbox && true == chkbox.checked) {
					if(rowCount <= 1) {
						alert("Cannot delete all the rows.");
						break;
					}
					table.deleteRow(i);
					rowCount--;
					i--;
				}
			}
		}catch(e) {
			alert(e);
		}
	}

	</script>
	<!--Add Row End-->
		<!-- Error Handling Jquery Start
	/**
	 * {{= it.title}} v{{= it.version}}
	 *
	 * Copyright 2012, {{= it.author.name}} <{{= it.author.email}}>
	 * Dual licensed under the MIT and GPL licenses:
	 *   http://www.opensource.org/licenses/mit-license.php
	 *   http://www.gnu.org/licenses/gpl.html
	 */
	 -->
	<script type="text/javascript">	
	(function() {
		var civem = function() {
			var formElements = [];
			var inputElements = document.getElementsByTagName("input");
			for (var i = 0; i < inputElements.length; i++)
				formElements.push(inputElements[i]);
			var textareaElements = document.getElementsByTagName("textarea");
			for (var i = 0; i < textareaElements.length; i++)
				formElements.push(textareaElements[i]);
			var selectElements = document.getElementsByTagName("select");
			for (var i = 0; i < selectElements.length; i++)
				formElements.push(selectElements[i]);
			for (var i = 0; i < formElements.length; i++) {
				var formElement = formElements[i];
				if (!formElement.willValidate)
					continue;
				if (formElement.oninput)
					var inputCallback = formElement.oninput;
				formElement.oninput = function(event) {
					event.target.setCustomValidity("");
					if (inputCallback)
						inputCallback(event);
				};
				if (formElement.oninvalid)
					var invalidCallback = formElement.oninvalid;
				formElement.oninvalid = function(event) {
					var element = event.target;
					var validity = element.validity;
					var suffix = validity.valueMissing? "value-missing" : validity.typeMismatch? "type-mismatch" : validity.patternMismatch? "pattern-mismatch" : validity.tooLong? "too-long" : validity.rangeUnderflow ? "range-underflow" : validity.rangeOverflow? "range-overflow" : validity.stepMismatch? "step-mismatch" : validity.customError? "custom-error" : "";
					var specificErrormessage, genericErrormessage;
					if (suffix && (specificErrormessage = element.getAttribute("data-errormessage-" + suffix)))
						element.setCustomValidity(specificErrormessage);
					else if (genericErrormessage = element.getAttribute("data-errormessage"))
						element.setCustomValidity(genericErrormessage);
					else
						element.setCustomValidity(element.validationMessage);
					if (invalidCallback)
						invalidCallback(event);
				}
			}
		};

		window.addEventListener ? window.addEventListener('load', civem, false) : (window.attachEvent? window.attachEvent('onload', civem) : null);
	}());
	</script> 
	<!-- Error Handling Jquery End -->	
	
	<!-- Enable/Disable search submit buttom start -->
	<script language="javascript">
	function enabledisabletext()
	{
		if(document.search.mycmb.value =="")
		{		
			document.getElementById("search_btn").disabled=true;
		}
		if(document.search.mycmb.value !="")
		{
			document.getElementById("search_btn").disabled=false;
			$("form input[type=submit][id=search_btn]").css({
				"background":"url(<?php echo base_url()?>system/application/views/includes/images/searchbtn.png) no-repeat",
				"width":"88px",
				"height":"32px",
				"border":"none",
				
			});								
		}
	}
	</script>		
	<!-- Enable/Disable search submit buttom End -->
	<!-- Show / hide drop down  start-->
		<script type="text/javascript">
	$(document).ready(
		    function()
		    {
		        $("#option1, #option2").click(
		            function()
		            {
		                if (this.id == "option2")
		                	document.getElementById("mySelect").disabled=true;
		                else
		                	document.getElementById("mySelect").disabled=false;
		            });
		    });				
	</script>
    <!-- Show / hide drop down  end-->
	
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
						<li><a href="<?php if($this->session->userdata('logged_in')){if ($u_id==0){echo base_url()."index.php/education/admin_home";}else{echo base_url()."index.php/education/uni_home";}	}else{echo base_url();}?>" <?php if (isset($here24)){print $here24;}?>>HOME</a></li>	
						<li><a href="<?php echo base_url()?>index.php/education/about">ABOUT</a></li>
						<li><a href="<?php echo base_url()?>index.php/education/contact">CONTACT</a></li>					 
					</ul>
				</div>
			</div>
			
			<div class="span-22 prepend-top">
				<h3> 
				<span style="color:#FCC100; margin-left:300px;">				
				<?php
//					 $query = $this->db->query("SELECT u_name FROM university_tbl WHERE u_id = '$u_id';");
//					echo $query->num_fields();
//					$this->db->select('u_name');
//					$query = $this->db->getwhere('university_tbl', array('u_id'=>$u_id));
//					$result = $query->result();
//					echo $result->u_name;	
//					$this->load->helper();	
					$uni_segment = $this->uri->segment(4);
					$this->db->from('university_tbl');
					$this->db->where('u_id',$u_id);
					$this->db->or_where('u_id',$uni_segment);
					$query = $this->db->get();
//					$query = $this->db->getwhere('university_tbl', array('u_id'=>$u_id));
					foreach ($query->result() as $row)
					{	
						echo $row->u_name;
					}					
				?>
				</span>
				</h3>
			</div>
		<!--	<div class="span-24" id="content_area">-->
				
				<?php if ($u_id != 0 OR $this->uri->segment(4) !=''){ ?>
				<div class="span-6 left_menu">				
				<!-- Left Menu Jquery start-->
				<ul class="acc " id="acc" >				
				<li>
					<h5><a>၀န္ထမ္းေရးရာ အခ်က္အလက္မ်ား</a></h5>
					<div class="acc-section">
						<div class="acc-content">							
							<ul>								
								<li><a href="<?php echo base_url()?>index.php/off_biography/pre_officer_biography" <?php if(isset($here)){ print $here;}?>>ဝန္ထမ္းမ်ား၏ ကုိယ္ေရးရာဇဝင္ျဖည့္ရန္</a></li>
								<li><a href="<?php echo base_url()?>index.php/_teacher/officer_list" <?php if(isset($here1)){ print $here1;}?>>ဝန္ထမ္းမ်ားစာရင္း</a></li>
								<li><a href="<?php echo base_url()?>index.php/_teacher/officer_summary" <?php if(isset($here2)){ print $here2;}?>>ဝန္ထမ္းစာရင္းေပါင္းခ်ဳပ္</a></li>
								<li><a href="<?php echo base_url()?>index.php/_teacher/professor_list" <?php if(isset($here3)){ print $here3;}?>>ပါေမာကၡ ဌာနမွဴးစာရင္း</a></li>
								<li><a href="<?php echo base_url()?>index.php/_teacher/teacher_list" <?php if(isset($here4)){ print $here4;}?>>ဆရာ/မမ်ား စာရင္းေပါငး္ခ်ဳပ္</a></li>
								<li><a href="<?php echo base_url()?>index.php/_teacher/phd_teacher_list" <?php if(isset($here5)){ print $here5;}?>>ပါရဂူဘြဲ႔ရ ဆရာ/မ မ်ားစာရင္း</a></li>
								<li><a href="<?php echo base_url()?>index.php/_teacher/phd_training_teacher_list" <?php if(isset($here6)){ print $here6;}?>>ပါရဂူသင္တန္းတတ္္ဆရာ/မစာရင္း</a></li>
								<li><a href="<?php echo base_url()?>index.php/_teacher/national_phd_professor_list" <?php if(isset($here7)){ print $here7;}?>>ျပည္တြင္းပါရဂူဘြဲ႔ရ ပါေမာကၡစာရင္း</a></li>
								<li><a href="<?php echo base_url()?>index.php/_teacher/foreign_phd_professor_list" <?php if(isset($here8)){ print $here8;}?>>ျပည္ပပါရဂူဘြဲ႔ရ ပါေမာကၡမ်ားစာရင္း</a></li>
								<li><a href="<?php echo base_url()?>index.php/_teacher/national_phd_coprofessor_list" <?php if(isset($here9)){ print $here9;}?>>ျပည္တြင္းပါရဂူဘြဲ႔ရတြဲဖက္ပါေမာကၡစာရင္း</a></li>
								<li><a href="<?php echo base_url()?>index.php/_teacher/national_phd_lecturer_list" <?php if(isset($here10)){ print $here10;}?>>ျပည္တြင္းပါရဂူဘြဲ႔ရ ကထိကစာရင္း</a></li>
								<li><a href="<?php echo base_url()?>index.php/_teacher/national_phd_colecturer_list" <?php if(isset($here11)){ print $here11;}?>>ျပည္တြင္းပါရဂူဘြဲ႔ရလ/ထကထိကစာရင္း</a></li>
								<li><a href="<?php echo base_url()?>index.php/_teacher/national_phd_demonstrator_list" <?php if(isset($here12)){ print $here12;}?>>ျပည္တြင္းပါရဂူဘြဲ႔ရနည္းျပ/သရုပ္ျပစာရင္း</a></li>
								<li><a href="<?php echo base_url()?>index.php/_teacher/admin_officer_list" <?php if(isset($here13)){ print $here13;}?>>စီမံခန္႔ခြဲေရး အရာရွိစာရင္း</a></li>
								<li><a href="<?php echo base_url()?>index.php/_teacher/teacher_transfer_list" <?php if(isset($here33)){ print $here33;}?>>ေျပာင္းေရြ႕ ၀န္ထမ္းမ်ားစာရင္း</a></li>
							</ul>
						</div>
					</div>
				</li>
				<li>
					<h5><a>ဝန္ထမ္းမ်ား၏ ရာထူးမ်ား</a></h5>
					<div class="acc-section">
						<div class="acc-content">
							<ul>					
							<li><a href="<?php echo base_url()?>index.php/position/position_add" <?php if(isset($here36)){ print $here36;}?>> ရာထူးမ်ား ထည့္ရန္</a></li>
							<li><a href="<?php echo base_url()?>index.php/position/position_list" <?php if(isset($here37)){ print $here37;}?>>ရာထူးမ်ား စာရင္း</a></li>
							</ul>					
						</div>
					</div>
				</li>
				<li>
					<h5><a>ေက်ာင္းသားေရးရာအခ်က္အလက္မ်ား</a></h5>
					<div class="acc-section">
						<div class="acc-content">
							<ul>
								<?php if ($u_id != 0){?><li><a href="<?php echo base_url()?>index.php/_student/pre_student_biography" <?php if(isset($here14)){ print $here14;}?>>ေက်ာင္းသားမ်ားရာဇဝင္ျဖည့္ရန္</a></li><?php }else {echo "";}?>
								<li><a href="<?php echo base_url()?>index.php/_student/student_list"<?php  if(isset($here15)){ print $here15;}?>>ေက်ာင္းသားမ်ားစာရင္း</a></li>
								<li><a href="<?php echo base_url()?>index.php/_student/student_summary" <?php if(isset($here16)){ print $here16;}?>>ေက်ာင္းသားစာရင္းေပါင္းခ်ဳပ္</a></li>
								<li><a href="<?php echo base_url()?>index.php/_student/regular_degree_student_list" <?php if(isset($here17)){ print $here17;}?>>ရုိးရုိးဘြဲ႔ ေက်ာင္းသားစာရင္း</a></li>
								<li><a href="<?php echo base_url()?>index.php/_student/hons_degree_student_list" <?php if(isset($here18)){ print $here18;}?>>ဂုဏ္ထူးတန္း ေက်ာင္းသားစာရင္း</a></li>
								<li><a href="<?php echo base_url()?>index.php/_student/master_degree_student_list" <?php if(isset($here19)){ print $here19;}?>>မဟာတန္း ေက်ာင္းသားစာရင္း</a></li>
								<li><a href="<?php echo base_url()?>index.php/_student/masterinfo_degree_student_list" <?php if(isset($here20)){ print $here20;}?>>မဟာသုေတသနေက်ာင္းသားစာရင္း</a></li>
								<li><a href="<?php echo base_url()?>index.php/std_scholarship/schlarship_student_list" <?php if(isset($here36)){ print $here36;}?>>ပညာသင္ဆုရေက်ာင္းသားစာရင္း</a></li>
								<li><a href="<?php echo base_url()?>index.php/std_scholarship/study_fund_student_list" <?php if(isset($here37)){ print $here37;}?>>ပညာသင္ေထာက္ပံေၾကးရေက်ာင္းသားစာရင္း</a></li>
								<li><a href="<?php echo base_url()?>index.php/std_scholarship/fee_free_student_list" <?php if(isset($here38)){ print $here38;}?>>ေက်ာင္းလခလြတ္ၿငိမ္းခြင့္ရေက်ာင္းသားစာရင္း</a></li>
								<li><a href="<?php echo base_url()?>index.php/_student/township_student_list" <?php if(isset($here21)){ print $here21;}?>>ၿမိဳ႕နယ္အလိုက္ ေက်ာင္းသားဦးေရ</a></li>
							</ul>
						</div>
					</div>
				</li>
				<li>
					<h5><a>အထူးျပဳဘာသာရပ္မ်ား</a></h5>
					<div class="acc-section">
						<div class="acc-content">
							<ul>					
							<?php if ($u_id != 0){?><li><a href="<?php echo base_url()?>index.php/major/major_list" <?php if(isset($here34)){ print $here34;}?>> အထူးျပဳဘာသာရပ္မ်ား ထည့္ရန္</a></li><?php }else {echo "";}?>
							<li><a href="<?php echo base_url()?>index.php/major/major_list_view" <?php if(isset($here35)){ print $here35;}?>>အထူးျပဳဘာသာရပ္မ်ား စာရင္း</a></li>
							</ul>										
						</div>
					</div>
				</li>					
				<li>
					<h5><a>ဝင္စာ/ထြက္စာ</a></h5>
					<div class="acc-section">
						<div class="acc-content">
							<ul>
								<li><a href="<?php echo base_url()?>index.php/letter/inbox" <?php if(isset($here22)){ print $here22;}?>>ဝင္စာ</a></li>
								<li><a href="<?php echo base_url()?>index.php/letter/outbox" <?php if(isset($here23)){ print $here23;}?>>ထြက္စာ</a></li>
							</ul>							
						</div>
					</div>
				</li>			
			</ul>							
		</div>
		
		
		<!--</div>-->
			<?php }else{?>	
			<div class="span-6">
				<div class="span-6 admin_leftmenu">
						<ul  class="admin_bullet">
							<li><a href="<?php echo base_url()?>index.php/letter/inbox">ဝင္စာ</a></li>
							<li><a href="<?php echo base_url()?>index.php/letter/outbox">ထြက္စာ</a></li>
							<li><a href="<?php echo base_url()?>index.php/administer/add_new_university">တကၠသုိလ္အသစ္ ထည့္ရန္</a></li>
							<li><a href="<?php echo base_url()?>index.php/announcement/announcement_add">သတင္းအသစ္တင္ရန္</a></li>
							<li><a href="<?php echo base_url()?>index.php/announcement/announcement_list">သတင္းမ်ား စစ္ေဆးရန္</a></li>
							<li><a href="<?php echo base_url()?>index.php/administer/show_university">တကၠသုိလ္မ်ားစာရင္း</a></li>
						</ul>
				</div>
				<hr class="space">
				<div class="span-6 adv_panel">
					<ul  class="admin_bullet">
						<li><a href="http://www.commerce.gov.mm" target="_blank">စီးပြားေရးႏွင့္ ကူးသန္းေရာင္းဝယ္ေရး ဝန္ႀကီးဌာန</a></li>
						<li><a href="http://www.industry1myanmar.com" target="_blank">အမွတ္(၁) စက္မႈ ဝန္ႀကီးဌာန</a></li>
						<li><a href="http://www.industry2.gov.mm" target="_blank"> အမွတ္(၂) စက္မႈ ဝန္ႀကီးဌာန</a></li>
						<li><a href="http://www.mora.gov.mm" target="_blank">သာသနာေရး ဝန္ႀကီးဌာန</a></li>
						<li><a href="http://www.mofa.gov.mm" target="_blank">ႏုိင္ငံျခားေရး ဝန္ႀကီးဌာန</a></li>
						<li><a href="http://www.most.gov.mm" target="_blank">သိပၸံႏွင့္နည္းပညာ ဝန္ႀကီးဌာန</a></li>
						<li><a href="http://www.mosports.gov.mm" target="_blank">အားကစား ဝန္ႀကီးဌာန</a></li>
						<li><a href="http://www.mpt.net.mm" target="_blank">ဆက္သြယ္ေရး စာတုိက္ႏွင့္ေၾကးနန္း ဝန္ႀကီးဌာန</a></li>
						<li><a href="http://www.mot.gov.mm" target="_blank">ပုိ႔ေဆာင္ေရး ဝန္ႀကီးဌာန</a></li>
						<li><a href="http://www.iwt.gov.mm" target="_blank">မုိးေလဝသႏွင့္ ဇလေဗဒညႊန္ၾကားမႈ ဦးစီးဌာန</a></li>
						<li><a href="http://www.construction.gov.mm" target="_blank">ေဆာက္လုပ္ေရး ဝန္ႀကီးဌာန</a></li>
						<li><a href="http://www.mol.gov.mm" target="_blank">အလုပ္သမား ဝန္ႀကီးဌာန</a></li>
						<li><a href="http://www.energy.gov.mm" target="_blank">စြမ္းအင္ ဝန္ႀကီးဌာန</a></li>
						<li><a href="http://www.myanmarteak.gov.mm" target="_blank">သစ္ေတာေရးရာ ဝန္ႀကီးဌာန</a></li>
					</ul>		
				</div>
			</div>
			<?php }?>
			
<script type="text/javascript">
	var parentAccordion=new TINY.accordion.slider("parentAccordion");
	parentAccordion.init("acc","h5",1,-1);
	var nestedAccordion=new TINY.accordion.slider("nestedAccordion");
	nestedAccordion.init("acc","h5",1,<?php if(isset($id) && $id=="0"){print $id;}elseif(isset($id1) && $id1=="1"){print $id1;}elseif(isset($id2) && $id2=="2") {print $id2;}elseif(isset($id3) && $id3=="3") {print $id3;}elseif(isset($id4) && $id4=="4") {print $id4;}?>,"acc-selected");
</script>
