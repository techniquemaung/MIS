<?php
	$user_id = $this->uri->segment(3);
//	$this->db->select_max('s_id');
//	$this->db->select('s_name,s_id');
//	$query = $this->db->get('student_personal_tbl');		 

//	foreach($query->result() as $row):							
//		$s_id=$row->s_id;
//		$this->db->select('*');
//		$this->db->from('student_personal_tbl');
//		$this->db->where('s_id',$user_id);
//		$query1 = $this->db->get();	
		$this->db->select('*');
		$this->db->from('student_personal_tbl');
		$this->db->where('s_id',$user_id);
		$query1 = $this->db->get();
		foreach($query1->result() as $row1): 
?>								
			<div class="span-24">
				<br/><h4 style="color:#2b7108;margin-top:-10px;font-size:14px;margin-left:-50px;">ေက်ာင္းသားမ်ား၏ ကုိယ္ေရးအခ်က္အလက္္</h4><br/>
				<div id="vertical_container" style="margin-top:-18px;">
				<!-- 1 start-->	
					<h1 class="accordion_toggle accordion_toggle_active">ကုိယ္ေရးအခ်က္အလက္</h1>
					<div  class=" span-24 accordion_content" style="height: auto; display: block;">      
						<div class="span-13 push-1 prepend-top">															
							<div class="span-13">
								<div class="span-1 personal-data">၁။</div>
								<div class="span-4  personal-data">အမည္</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-7 last personal-data" >
									<?php echo $row1->s_name; ?>												
								</div>
							</div>															
							<div class="span-13">
								<div class="span-1 personal-data">၂။</div>
								<div class="span-4  personal-data">ငယ္အမည္</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-7 last personal-data">
									<?php echo $row1->s_alias_name; ?>
								</div>
							</div>											
							<div class="span-13">
								<div class="span-1 personal-data">၃။</div>
								<div class="span-4  personal-data">အျခားအမည္မ်ား (ရွိလွ်င္)</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-7 last personal-data">
									<?php echo $row1->s_other_name; ?>
								</div>
							</div>
							<div class="span-13">
								<div class="span-1 personal-data">၄။</div>
								<div class="span-4  personal-data">အဘအမည္</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-7 last personal-data">
									<?php echo $row1->s_father_name; ?>
								</div>
							</div>
							<div class="span-13">
								<div class="span-1 personal-data">၅။</div>
								<div class="span-4  personal-data">အသက္ (ေမြးေန႔သကၠရာဇ္)</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-7 personal-data last" >
									<?php echo $row1->s_age; ?> ႏွစ္(
										<?php echo $this->multi_function->myanmar_number($row1->s_birth_day); ?>/
										<?php echo $this->multi_function->month_myanmar_number1($row1->s_birth_month); ?>/
										<?php echo $this->multi_function->myanmar_number( $row1->s_birth_year); ?> 	)
								</div>
							</div>
							<div class="span-13">
								<div class="span-1 personal-data">၆။</div>
								<div class="span-4  personal-data">ေမြးဖြားရာဇာတိ</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-7 last personal-data">
									<?php echo $s_id=$row1->s_native_town; ?>
								</div>
							</div>
							<div class="span-13">
								<div class="span-1 personal-data">၇။</div>
								<div class="span-4  personal-data">က်ား / မ</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-7 last personal-data">
							 		<?php echo $s_id=$row1->s_gender; ?>
								</div>
							</div>
							<div class="span-13">
								<div class="span-1 personal-data">၈။</div>
								<div class="span-4  personal-data">ကုိးကြယ္သည့္ဘာသာ</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-7 personal-data last">
									<?php echo $s_id=$row1->s_religious; ?>
								</div>
							</div>
							<div class="span-13">
								<div class="span-1 personal-data">၉။</div>
								<div class="span-4  personal-data">လူမ်ဴိး</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-7 personal-data last">
									<?php echo $s_id=$row1->	s_race; ?>
								</div>
							</div>
							<div class="span-13">
								<div class="span-1 personal-data">၁၀။</div>
								<div class="span-4  personal-data">အမ်ိဳးသားမွတ္ပုံတင္အမွတ္</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-7 personal-data last">
									<?php echo $s_id=$row1->s_nrc; ?>
								</div>
							</div>
							<div class="span-13">
								<div class="span-1 personal-data">၁၁။</div>
								<div class="span-4  personal-data">အဘ၏ အမ်ိဳးသားမွတ္ပုံတင္အမွတ္</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-7 personal-data last">
									<?php echo $s_id=$row1->s_father_nrc; ?>
								</div>
							</div>
							<div class="span-13">
								<div class="span-1 personal-data">၁၂။</div>
								<div class="span-4  personal-data">အမိ၏ အမ်ိဳးသားမွတ္ပုံတင္အမွတ္</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-7 personal-data last">
									<?php echo $s_id=$row1->s_mother_nrc; ?>
								</div>
							</div>
							<div class="span-13">
								<div class="span-1 personal-data">၁၃။</div>
								<div class="span-4  personal-data">အရပ္</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-7 last personal-data">
									<?php echo $s_id=$row1->s_height; ?>
								</div>
							</div>
							<div class="span-13">
								<div class="span-1 personal-data">၁၄။</div>
								<div class="span-4  personal-data">ကုိယ္အေလးခ်ိန္</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-7 personal-data last">
									<?php echo $s_id=$row1->s_weight; ?>္
								</div>
							</div>
							<div class="span-13">
								<div class="span-1 personal-data">၁၅။</div>
								<div class="span-4  personal-data">ဆံပင္အေရာင္</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-7 personal-data last">
									<?php echo $s_id=$row1->s_hair_color; ?>
								</div>
							</div>
							<div class="span-13">
								<div class="span-1 personal-data">၁၆။</div>
								<div class="span-4  personal-data">မ်က္စိအေရာင္</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-7 personal-data last">
									<?php echo $s_id=$row1->s_eyes_color; ?>
								</div>
							</div>
							<div class="span-13">
								<div class="span-1 personal-data">၁၇။</div>
								<div class="span-4  personal-data">ထင္ရွားသည့္အမွတ္အသား</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-7 last personal-data">
									<?php echo $s_id=$row1->s_unique_sign; ?>
								</div>
							</div>
							<div class="span-13">
								<div class="span-1 personal-data">၁၈။</div>
								<div class="span-4  personal-data">အထူးျပဳဘာသာရပ္</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-7 personal-data last">
									<?php echo $s_id=$row1->s_major; ?>
								</div>
							</div>
							<div class="span-13">
								<div class="span-1 personal-data">၁၉။</div>
								<div class="span-4  personal-data">ယခင္ပညာသင္ႏွစ္ ခုံအမွတ္</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-7 personal-data last">
									<?php echo $s_id=$row1->s_last_rollno; ?>
								</div>
							</div>
							<div class="span-13">
								<div class="span-1 personal-data">၂၀။</div>
								<div class="span-4  personal-data">ယခုပညာသင္ႏွစ္ ခုံအမွတ္</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-7 personal-data last">
									<?php echo $s_id=$row1->s_current_rollno	; ?>
								</div>
							</div>
							<div class="span-13">
								<div class="span-1 personal-data">၂၁။</div>
								<div class="span-4  personal-data">တက္ေရာက္မည့္အတန္း</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-7 personal-data last">
									<?php echo $s_id=$row1->	s_class; ?>
								</div>
							</div>
							<div class="span-13">
								<div class="span-1 personal-data">၂၂။</div>
								<div class="span-4  personal-data">ပညာသင္ဆု</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-7 personal-data last">
									<?php echo $s_id=$row1->s_schlarship; ?>
								</div>
							</div>
							<div class="span-13">
								<div class="span-1 personal-data">၂၃။</div>
								<div class="span-4  personal-data">ပညာသင္ေထာက္ပံ့ေၾကး</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-7 personal-data last">
									<?php echo $s_id=$row1->s_study_fund; ?>
								</div>
							</div>
							<div class="span-13">
								<div class="span-1 personal-data">၂၄။</div>
								<div class="span-4  personal-data">ေက်ာင္းလခလြတ္ၿငိမ္းခြင့္</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-4 personal-data last">
									<?php echo $s_id=$row1->	s_fee_free; ?>
								</div>
							</div>
							<div class="span-13">
								<div class="span-1 personal-data">၂၅။</div>
								<div class="span-4  personal-data">ေနထုိင္သည့္ၿမိဳ႕</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-4 personal-data last">
									<?php echo $s_id=$row1->s_hometown; ?>
								</div>
							</div>
							<div class="span-13">
								<div class="span-1 personal-data">၂၆။</div>
								<div class="span-4  personal-data">လက္ရွိေနရပ္လိပ္စာ</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-4 personal-data last" >
									<?php echo $s_id=$row1->s_current_address; ?>
								</div>
							</div>
							<div class="span-13">
								<div class="span-1 personal-data">၂၇။</div>
								<div class="span-4  personal-data">အၿမဲတမ္းေနရပ္လိပ္စာ</div>
								<div class="span-1 personal-data">-</div>
								<div class="span-4 personal-data last">
									<?php echo $s_id=$row1->s_permanent_address; ?>
								</div>
							</div>
							<hr class="space">
						</div>
										
						<div class="span-3 prepend-top photo push-7 last">	
							<div class="span-3" width="110px" height="120px">
								<img src="<?php echo base_url()?>system/application/student_photos/<?php echo $row1->s_photo_location;?>" width="110px" height="120px"/>
							</div>
						</div>
				</div>
						<hr class="space">
							<!-- 1 End-->
							<hr class="space">
							<div class="span-4 push-5"><a href="<?php echo base_url()?>index.php/std_biography/edit_student_biography/<?php echo $user_id;?>"><input type="submit" name="Add" value="ျပင္မည့္စာမ်က္ႏွာသုိ႔" class="btn_3" ></a></div>
							<div class="span-4 push-6"><a href="<?php echo base_url()?>index.php/_student/student_list "><input type="submit" name="Add" value="ေက်ာင္းသားမ်ားစာရင္းသို႔" class="btn_3" ></a></div>
							<div class="span-3 push-7"><a href="<?php echo base_url()?>index.php/_student/pre_student_biography "><input type="submit" name="Add" value="ကုိယ္ေရးရာဇဝင္ျဖည့္ရန္" class="btn_3"style="margin-left:14px;" ></a></div>
							
			 </div>
		</div>
			<hr class="space">
			<!-- 16 End-->	
 </div>
			<?php endforeach;?>
		<!-- accoridian jquery end-->
