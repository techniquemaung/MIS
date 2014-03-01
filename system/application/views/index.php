<div class="span-24" id="jslide">
				<div class="column12container main_container">
					<div class="column12">
					<!-- carousel -->
					<div class="carousel"> <!-- BEGIN CONTAINER -->
						<div class="slides"> <!-- BEGIN CAROUSEL -->
							<div> <!-- SLIDE ITEM -->
								<a href="#">
								
									 <img src="<?php echo base_url()?>system/application/views/includes/images/uni_pic1.png" />
								 </a>     
							</div>
						   
							<div>
								<a href="#">
									 <img src="<?php echo base_url()?>system/application/views/includes/images/uni_pic2.png"/>
								</a>
							</div>
							
							<div>
								<a href="#">
									<img src="<?php echo base_url()?>system/application/views/includes/images/uni_pic3.png" />
								</a>
							</div>
							
							<div>
								<a href="#">
									<img src="<?php echo base_url()?>system/application/views/includes/images/uni_pic4.png" />
								</a>
							</div>
							
							<div>
								<a href="#">
									<img src="<?php echo base_url()?>system/application/views/includes/images/uni_pic5.png"/>
								</a>
							</div>
							
							<div>
								<a href="#">
									 <img src="<?php echo base_url()?>system/application/views/includes/images/uni_pic6.png"/>
								</a>
							</div>
							
							<div>            
									 <img src="<?php echo base_url()?>system/application/views/includes/images/uni_pic7.png"/>
							</div>
							
											
						</div> <!-- END SLIDES -->
						   
					</div> <!-- END CAROUSEL -->
						
					</div>
					<div class="clear"></div>
				</div> 
			</div>
			<div class="span-24" id="content_area">
				<div class="span-16">
					<div class="cont_leftheader"><h3><img src="<?php echo base_url()?>system/application/views/includes/images/trangle.png"/>&nbsp; Management Information System</h3></div>
					<div class="span-16 uline content_left">
					<p class="span-15">
						Management Information System သည္ ပညာေရး၀န္ႀကီးဌာန 
						အဆင့္ျမင့္ ပညာဦးစီးဌာန လက္ေအာက္ရွိ တကၠသိုလ္မ်ား ခ်ိတ္ဆက္၍ 
						e-Government လုပ္ငန္းမ်ား အေကာင္အထည္ ေဖာ္ရာတြင္ အေထာက္အကူ
						ျပဳႏုိင္ရန္အတြက္ သတင္းအခ်က္အလက္ ႏွင့္ နည္းပညာ၊ ဆက္သြယ္ေရး
						ကြန္ယက္ဆုိင္ရာ ၀န္ေဆာင္မႈမ်ား ေပးႏုိင္ရန္အတြက္ ရည္ရြယ္တည္ေဆာက္ ထားပါသည္။
					</p>
					</div>
				</div>
				
				<div class="span-8 last ">
					<div class="cont_rightheader"><h3><img src="<?php echo base_url()?>system/application/views/includes/images/trangle.png"/>&nbsp; Latest Announcement</h3></div>
					<div class="span-8 latest_bullet content_right"  frameborder="0">
						<?php 
						
							foreach ($posts->result() as $row):							
						?>
						<ul>
							<li>
							<a href="<?php if($this->session->userdata('logged_in')){echo base_url()."index.php/announcement/announcement_show/".$row->announce_id;}else{echo base_url()."index.php/announcement/announcement_show/".$row->announce_id;}?>"><?php echo $row->announce_title;?></a>
							</li>
							<a href="<?php echo base_url();?>index.php/announcement/announcement_show/<?php echo $row->announce_id; ?>" class="extend">ဆက္ရန္</a>
						</ul>
						<?php endforeach;?>
						<hr class="space">
						<div class="span-6 push-1" style="text-align:center;"><?php echo $this->pagination->create_links(); ?></div>
						
					</div>
				</div>
				
				<hr class="space">
				
			
			