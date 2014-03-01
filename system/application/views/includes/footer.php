			<div class="span-24 footer">
				<div class="span-15 footer_nave push-4 prepend-top">
					<ul>
						<li><a href="<?php	if($this->session->userdata('logged_in')){if ($u_id==0){echo base_url()."index.php/education/admin_home";}else{echo base_url()."index.php/education/uni_home";}	}else{echo base_url();}?>" >HOME</a></li>
						<li><a href="<?php	if($this->session->userdata('logged_in')){if ($u_id==0){echo base_url()."index.php/education/about";}else{echo base_url()."index.php/education/about";}	}else{echo base_url()."index.php/education/about";}?>">ABOUT</a></li>
						<li><a href="<?php	if($this->session->userdata('logged_in')){if ($u_id==0){echo base_url()."index.php/education/contact";}else{echo base_url()."index.php/education/contact";}	}else{echo base_url()."index.php/education/contact";}?>">CONTACT</a></li>
					</ul>
				</div><hr class="space" >
				<div class="span-20 copyright">copyright &copy; 2011 . Developed by Yatanarpon Web Portal.</div>
			</div>
		</div>
		
		
	</body>
</html>