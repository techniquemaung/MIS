			<?php 
//				$s_valid_id = $this->uri->segment(3);
				if($this->uri->segment(3)){
					$s_valid_id = $this->uri->segment(3);}
				else {
					$s_valid_id =$user_id;
				}
			?>
			<div class="span-18 last">
				
				<!-- start-->
				<div id="vertical_container">				
					<h4 style="color:#2b7108;margin-top:-10px;font-size:14px;">ေက်ာင္းသားမ်ား၏ ကုိယ္ေရးအခ်က္အလက္</h4><br/>
					<div class=" span-18 accordion_content" style="display: block;height:630px;overflow:scroll;margin-top:-20px;">
					<div class="span-13 push-1 prepend-top">
						<?php echo form_open_multipart('std_biography/student_biography_show_process');?>
						<div class="span-13">
							<?php						
//								$this->db->select('s_id');
//								$this->db->select('s_name');
//								$this->db->where('s_id',$s_valid_id);
//								$query = $this->db->get('student_personal_tbl');								
							?>
							<div class="span-1 personal-data">၁။</div>
							<div class="span-4 personal-data">အမည္</div>
							<div class="span-1 personal-data">-</div>
													
							<?php //foreach($query->result() as $row): ?>
							<div class="span-7 last personal-data" >
							<?php 
								$this->db->select('*');
								$this->db->from('student_personal_tbl');
								$this->db->where('s_id',$s_valid_id);
								$query1 = $this->db->get(); 
								foreach($query1->result() as $row1):
									echo "<label >".$row1->s_name."</label>";
									$name=$row1->s_name;
									$s_sno=$row1->s_serial_no;
							?>				
							</div>
						</div>
						<input type="hidden" name="hidden_user_id" value="<?php echo $s_valid_id; ?>" class="fieldstyle">
	
						<input type="hidden" name="hidden_name" value=" <?php echo $name; ?>" class="fieldstyle">
						<input type="hidden" name="hidden_s_serial_no" value=" <?php echo $s_sno; ?>" class="fieldstyle">
						<?php endforeach; ?>
						<div class="span-13">
							<div class="span-1 personal-data">၂။</div>
							<div class="span-4 personal-data">ငယ္အမည္</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-7 last personal-data"><input type="text" name="young_name" value="" class="fieldstyle" ></div>
						</div>
						
						<div class="span-13">
							<div class="span-1 personal-data">၃။</div>
							<div class="span-4 personal-data">အျခားအမည္မ်ား (ရွိလွ်င္)</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-7 last personal-data"><input type="text" name="other_name" value="" class="fieldstyle" ></div>
						</div>
						
						<div class="span-13">
							<div class="span-1 personal-data">၄။</div>
							<div class="span-4 personal-data">အဘအမည္</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-7 last personal-data"><input type="field" name="father_name" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" ></div>					
							<?php echo form_error('father_name');?>
						</div>
						<div class="span-13">							
							<div class="span-1 personal-data">၅။</div>
							<div class="span-4 personal-data">အသက္ (ေမြးေန႔သကၠရာဇ္)</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-7 personal-data last" >
								(<input type="field" name="age" value="" class="fieldstylesmall">)
								ႏွစ္&nbsp;  ၊ &nbsp;&nbsp;
								<?php echo form_error('age');?>	
								<select class="option_text" name="birthday">
									<option value = "0">ရက္</option>
									<?php for ($day=1;$day<=31;$day++){?>
									<option value="<?php echo $day;?>" <?php echo set_select('birthday','$day');?>>
									<?php echo $this->multi_function->myanmar_number($day);?>
									</option>
									<?php }?>
								</select>
								<?php echo form_error('birthday');?>
								<select class="option_text" name="birthmonth" >
									<option value = "0">လ</option>
									<?php
									$month=array('ဇန္န၀ါရီ','ေဖေဖာ္၀ါရီ','မတ္','ဧၿပီ','ေမ','ဇြန္','ဇူလိုင္','ၾသဂုတ္','စက္တင္ဘာ','ေအာက္တိုဘာ','ႏို၀င္ဘာ','ဒီဇင္ဘာ');
									foreach ($month as $value){
									?>
									<option value="<?php echo $this->multi_function->month_myanmar_number2($value);?>" <?php echo set_select('birthmonth','$this->multi_function->month_number($value)');?>>
									<?php echo $value;?>
									</option>
									<?php }?>							
								</select>
								<?php echo form_error('birthmonth');?>
								<select class="option_text" name="birthyear" >
									<option value = "0">ႏွစ္</option>
									<?php for ($year=1970;$year<=2050;$year++){?>
									<option value = "<?php echo $year;?>" <?php echo set_select('birthyear','$year');?>>
									<?php echo $this->multi_function->year_myanmar_number($year);?>
									</option>
									<?php }?>
								</select>
								<?php echo form_error('birthyear');?>
							</div>					
						</div>	
						<div class="span-13">
							<div class="span-1 personal-data">၆။</div>
							<div class="span-4 personal-data">ေမြးဖြားရာဇာတိ</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-7 last personal-data"><input type="field" name="native_town" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" ></div>
							<?php echo form_error('native_town');?>
						</div>
						
						<div class="span-13">
							<div class="span-1 personal-data">၇။</div>
							<div class="span-4 personal-data">က်ား / မ</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-7 last personal-data">
								က်ား&nbsp;<input type="radio" name="gender" value="က်ား"   checked="checked">&nbsp;&nbsp;&nbsp;
								မ &nbsp;<input type="radio" name="gender" value="မ" >
							</div>
							<?php echo form_error('gender');?>
						</div>
						
						<div class="span-13">
							<div class="span-1 personal-data">၈။</div>
							<div class="span-4 personal-data">ကုိးကြယ္သည့္ဘာသာ</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-7 personal-data last">
							<select class="option_text" name="relegion">
							<option value="0" >ဘာသာေရြးပါ</option>
							<option value="ဗုဒၶဘာသာ" >ဗုဒၶဘာသာ</option>
							<option value="အစၥလာမ္" >အစၥလာမ္</option>
							<option value="ခရစၥယာန္" >ခရစၥယာန္</option>
							<option value="ဟိႏၵဴ" >ဟိႏၵဴ</option>
							</select>
							<?php echo form_error('relegion');?>
							</div>
						</div>
						
						<div class="span-13">
							<div class="span-1 personal-data">၉။</div>
							<div class="span-4 personal-data">လူမ်ဴိး</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-7 personal-data last">
							<input type="text" name="race" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" >
							<?php echo form_error('native_town');?>
							</div>
						</div>
						
						<div class="span-13">
							<div class="span-1 personal-data">၁၀။</div>
							<div class="span-4 personal-data">အမ်ိဳးသားမွတ္ပုံတင္အမွတ္</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-7 personal-data last">
							<input type="text" name="s_nrc" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" >
							<?php echo form_error('s_nrc');?>
							</div>
						</div>
						
						<div class="span-13">
							<div class="span-1 personal-data">၁၁။</div>
							<div class="span-4 personal-data">အဘ၏ အမ်ိဳးသားမွတ္ပုံတင္အမွတ္</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-7 personal-data last">
							<input type="text" name="s_father_nrc" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" ></div>
							<?php echo form_error('s_father_nrc');?>
						</div>
						
						<div class="span-13">
							<div class="span-1 personal-data">၁၂။</div>
							<div class="span-4 personal-data">အမိ၏ အမ်ိဳးသားမွတ္ပုံတင္အမွတ္</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-7 personal-data last">
							<input type="text" name="s_mother_nrc" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" ></div>
							<?php echo form_error('s_mother_nrc');?>
						</div>
						
						<div class="span-13">
							<div class="span-1 personal-data">၁၃။</div>
							<div class="span-4 personal-data">အရပ္</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-7 last personal-data">
							<input type="text" name="height" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" ></div>
							<?php echo form_error('height');?>
						</div>
						
						<div class="span-13">
							<div class="span-1 personal-data">၁၄။</div>
							<div class="span-4 personal-data">ကုိယ္အေလးခ်ိန္</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-7 personal-data last">
							<input type="text" name="weight" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" ></div>
							<?php echo form_error('weight');?>
						</div>
						
						<div class="span-13">
							<div class="span-1 personal-data">၁၅။</div>
							<div class="span-4 personal-data">ဆံပင္အေရာင္</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-7 personal-data last">
							<input type="text" name="hair_color" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" ></div>
							<?php echo form_error('hair_color');?>						
						</div>
						
						<div class="span-13">
							<div class="span-1 personal-data">၁၆။</div>
							<div class="span-4 personal-data">မ်က္စိအေရာင္</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-7 personal-data last">
							<input type="text" name="eye_color" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" ></div>
							<?php echo form_error('eye_color');?>						
						</div>
						
						<div class="span-13">
							<div class="span-1 personal-data">၁၇။</div>
							<div class="span-4 personal-data">ထင္ရွားသည့္အမွတ္အသား</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-7 last personal-data">
							<input type="text" name="siganificant_mark" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည" ></div>
							<?php echo form_error('siganificant_mark');?>						
						</div>
											
						<div class="span-13">
							<div class="span-1 personal-data">၁၈။</div>
							<div class="span-4 personal-data">အထူးျပဳဘာသာရပ္</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-7 personal-data last">
								<select class="option_text" name="sepcialized_subject">
									<option value="0" >ဘာသာရပ္ေရြးပါ</option>
									<?php 
										$this->db->select('*');
										$this->db->from('major_tbl');
										$this->db->where('u_id',$u_id);
										$query1 = $this->db->get();
										foreach($query1->result() as $row1):
										$major=$row1->major;
									 ?>
									<option value="<?php echo $major; ?>" ><?php echo $major; ?></option>
									<?php endforeach; ?>
								
								</select>							
							</div>
							<?php echo form_error('sepcialized_subject');?>
						</div>
						
						<div class="span-13">
							<div class="span-1 personal-data">၁၉။</div>
							<div class="span-4 personal-data">ယခင္ပညာသင္ႏွစ္ ခုံအမွတ္</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-7 personal-data last">
							<input type="text" name="last_year_roll_no" value="" class="fieldstyle" required data-errormessage-value-missing="ငယ္အမည္ ရုိက္ထည့္ပါ" ></div>
							<?php echo form_error('last_year_roll_no');?>
						</div>
						
						<div class="span-13">
							<div class="span-1 personal-data">၂၀။</div>
							<div class="span-4 personal-data">ယခုပညာသင္ႏွစ္ ခုံအမွတ္</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-7 personal-data last">
							<input type="text" name="current_year_roll_no" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" ></div>
							<?php echo form_error('current_year_roll_no');?>						
						</div>
						
						<div class="span-13">
							<div class="span-1 personal-data">၂၁။</div>
							<div class="span-4 personal-data">တက္ေရာက္မည့္ အတန္း</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-7 personal-data last">						
							<select class="option_text" name="attending_year">								
								<option value = "">အတန္းေရြးပါ</option>
								<option value="ရိုးရိုးတန္း(ပ)" >ရိုးရိုးတန္း(ပ)</option>
								<option value="ရိုးရိုးတန္း(ဒု)" >ရိုးရိုးတန္း(ဒု)</option>
								<option value="ရိုးရိုးတန္း(တ)" >ရိုးရိုးတန္း(တ)</option>
								<option value="ရိုးရိုးတန္း(စ)" >ရိုးရိုးတန္း(စ)</option>
								<option value="ဂုဏ္ထူးတန္း(ပ)" >ဂုဏ္ထူးတန္း(ပ)</option>
								<option value="ဂုဏ္ထူးတန္း(ဒု)" >ဂုဏ္ထူးတန္း(ဒု)</option>
								<option value="မဟာဘြဲ႔" >မဟာဘြဲ႔</option>
								<option value="မဟာသုေတသန" >မဟာသုေတသန</option>
							</select>
							</div>
							<?php echo form_error('attending_year');?>						
						</div>
						
						<div class="span-13">
							<div class="span-1 personal-data">၂၂။</div>
							<div class="span-4 personal-data">ပညာသင္ဆု</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-4 personal-data last">
							 ရ &nbsp;<input type="radio" name="scholar" value="ရ" >&nbsp;&nbsp;&nbsp; 
							 မရ &nbsp;<input type="radio" name="scholar" value="မရ"  checked="checked">
							<?php echo form_error('scholar');?> </div>
						</div>
						
						
						<div class="span-13">
							<div class="span-1 personal-data">၂၃။</div>
							<div class="span-4 personal-data">ပညာသင္ေထာက္ပံ့ေၾကး</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-4 personal-data last">
								 ရ &nbsp;<input type="radio" name="fund" value="ရ" >&nbsp;&nbsp;&nbsp;
								  မရ &nbsp;<input type="radio" name="fund" value="မရ"    checked="checked">
							</div>
							<?php echo form_error('fund');?>
						</div>
						
						<div class="span-13">
							<div class="span-1 personal-data">၂၄။</div>
							<div class="span-4 personal-data">ေက်ာင္းလခလြတ္ၿငိမ္းခြင့္</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-4 personal-data last">
								 ရ &nbsp;<input type="radio" name="fee_free" value="ရ" >&nbsp;&nbsp;&nbsp;
								  မရ &nbsp;<input type="radio" name="fee_free" value="မရ"    checked="checked">
							  </div>
							<?php echo form_error('fee_free');?>
						</div>
						
						
						<div class="span-13">
							<div class="span-1 personal-data">၂၅။</div>
							<div class="span-4 personal-data">ေနထုိင္သည့္ၿမိဳ႕</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-7 personal-data last">
							<input type="text" name="home_town" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည" ></div>
							<?php echo form_error('home_town');?>						
						</div>
						
						<div class="span-13">
							<div class="span-1 personal-data">၂၆။</div>
							<div class="span-4 personal-data">လက္ရွိေနရပ္လိပ္စာ</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-4 personal-data last" >
							<input type="text" name="current_address" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည" ></div>
							<?php echo form_error('current_address');?>
						</div>					
						
						<div class="span-13">
							<div class="span-1 personal-data">၂၇။</div>
							<div class="span-4 personal-data">အၿမဲတမ္းေနရပ္လိပ္စာ</div>
							<div class="span-1 personal-data">-</div>
							<div class="span-4 personal-data last">
							<input type="text" name="permanent_address" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" ></div>
							<?php echo form_error('permanent_address');?>					
						</div>				
						<hr class="space">				
					</div> 
					<?php 
						$this->db->select('*');
						$this->db->from('student_personal_tbl');
						$this->db->where('s_id',$s_valid_id);
						$query1 = $this->db->get(); 
						foreach($query1->result() as $row1):
					?>
					<div class="span-3 prepend-top photo push-1 last">
						<div class="span-3" >
							<img src="<?php echo base_url()?>system/application/student_photos/<?php echo $row1->s_photo_location;?>" width="110px" height="120px"/>
						</div>					
					</div>
					<?php endforeach;?>
					<div class="span-12 push-5">					
						<div class="span-6 push-1">
							<input type="submit" name="Add_Student_Data" value="" class="save_btn" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="<?php echo base_url()?>index.php/_student/pre_edit_student_biography/<?php echo $s_valid_id?>"><input type="button"  value=""  name="btn1" class="reset_btn"></a>
						</div>
					</div>
					<hr class="space">					
				</div> 					
				<?php echo form_close();?>
					
			<hr class="space">				
		</div>				
		<!-- End-->				
	</div>
