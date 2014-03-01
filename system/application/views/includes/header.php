<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<title>
			<?php echo $title; ?>
		</title>
		<link rel="shortcut icon" href="<?php echo base_url()?>system/application/views/includes/images/edu_logo.png">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>system/application/views/includes/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>system/application/views/includes/blueprint/screen.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>system/application/views/includes/blueprint/ie.css">
		<script type="text/javascript" src="<?php echo base_url()?>system/application/views/includes/js/jquery.js"></script>
    <!-- Carousel Jquery Start-->
	<link rel="Stylesheet" type="text/css" href="<?php echo base_url()?>system/application/views/includes/css/carousel.css" />
    <script type="text/javascript" src="<?php echo base_url()?>system/application/views/includes/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>system/application/views/includes/js/jquery.carousel.min.js"></script>
     <script type="text/javascript">
        $(document).ready(function(){
        
            $('.carousel').carousel({carouselWidth:930, carouselHeight:330, directionNav:true, shadow:true});
        
        });
    </script>
	 <!-- Carousel Jquery End-->
	
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

	</head>
	<body>
		<div id="container">
			<div class="span-24" id="header">
				<div class="span-24 header_top">
				
					<a href="<?php echo base_url()?>"><div id="logo" class="span-3"></div></a>
					<div class="span-20">
						<div  class="span-7 edu_TText">
							<a href="<?php echo base_url()?>"><div class="span-7 edu_titleMM">ပညာေရး၀န္ႀကီးဌာန</div></a><br/>
						</div>	
						<div class="span-13 last" style="color:#ED6402;"><?php echo form_error('login_password')?></div>												
					</div>
					
					<div class="span-20">
					<div  class="span-7 edu_TText">
					<a href="<?php echo base_url()?>"><div class="span-7 edu_titleEng">Ministry Of Education</div></a>
					</div>
					<div class="span-13 push-1 last form_position">
						<?php if($this->session->userdata('logged_in')){?>
						<?php echo form_open('education/logout_process'); ?>
							<div class="span-10 speacer1">
											
							</div>
							<div class="span-3 last">
								<input type="submit" name="btn1" value="" class="logout_btn" style="text-decoration:none;">
							</div>
						<?php echo form_close();?> 
						<?php  }   else   {?>		
						<?php echo form_open('education/login_process'); ?>													
   									<div class="span-5">
											<input type="text" name="username" value=""  placeholder="Username"  class="username" required data-errormessage-value-missing="username မွန္ကန္စြာရုိက္ထည့္ပါ"  /> 
										</div>
										<div class="span-5">
											<input type="password" name="login_password" value=""  placeholder="Password"  class="password"  required data-errormessage-value-missing="password မွန္ကန္စြာရိုက္ထည့္္ပါ"  />
										</div>
										<div class="span-3 last">
											<input type="submit" name="btn1" value="" class="login_btn" style="text-decoration:none;" />
										</div>
						<?php echo form_close();?>
						<?php }?>
					</div>
					</div>
				</div>
				<div class="span-24" id="navi_bg">
					<ul id="nave">
						<li><a href="<?php	if($this->session->userdata('logged_in')){if ($u_id==0){echo base_url()."index.php/education/admin_home";}else{echo base_url()."index.php/education/uni_home";}	}else{echo base_url();}?>" <?php if (isset($here24)){print $here24;}?>>HOME</a></li>
						<li><a href="<?php	if($this->session->userdata('logged_in')){if ($u_id==0){echo base_url()."index.php/education/about";}else{echo base_url()."index.php/education/about";}	}else{echo base_url()."index.php/education/about";}?>" <?php if (isset($here25)){print $here25;}?>>ABOUT</a></li>
						<li><a href="<?php	if($this->session->userdata('logged_in')){if ($u_id==0){echo base_url()."index.php/education/contact";}else{echo base_url()."index.php/education/contact";}	}else{echo base_url()."index.php/education/contact";}?>" <?php if (isset($here26)){print $here26;}?>>CONTACT</a></li>
					</ul>
				</div>
			</div>