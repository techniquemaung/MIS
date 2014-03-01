	
			<?php 
				if($this->uri->segment(3)){
					$t_valid_id = $this->uri->segment(3);}
				else {
					$t_valid_id =$user_id;
				}
			?>
				<div class="span-18 last">					
								<div id="vertical_container">
										<!-- 1 start-->	
									<h4 style="color:#2b7108;margin-top:-10px;font-size:14px;">ဝန္ထမ္းမ်ား၏ ကုိယ္ေရးအခ်က္အလက္</h4><br/>
									<div  class=" span-18 accordion_content" style="display: block;height:630px;overflow:scroll;margin-top:-20px;">      
										<div class="span-13 push-1 prepend-top">	
										<?php echo form_open_multipart('off_biography/teacher_biography_show_process');?>														
											
											<input type="hidden" name="hidden_teacher_id" value="<?php echo $t_valid_id;?>">
											<input type="hidden" name="hidden_u_id" value="<?php echo $u_id;?>">
											<div class="span-13">
												<div class="span-1 personal-data">၁။</div>
												<div class="span-4  personal-data">အမည္</div>
												<div class="span-1 personal-data">-</div>
												<div class="span-7 last personal-data" >
													<?php 
														$this->db->select('*');
														$this->db->from('teacher_personal_tbl');
														$this->db->where('t_id',$t_valid_id);
														$query1 = $this->db->get(); 
														foreach($query1->result() as $row1):
															echo "<label >".$row1->t_name."</label>";	
														endforeach;														
													?>
												</div>
											</div>
											
											<div class="span-13">
												<div class="span-1 personal-data">၂။</div>
												<div class="span-4  personal-data">ငယ္အမည္</div>
												<div class="span-1 personal-data">-</div>
												<div class="span-7 last personal-data"><input type="text" name="young_name" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" ></div>
											</div>
											
											<div class="span-13">
												<div class="span-1 personal-data">၃။</div>
												<div class="span-4  personal-data">အျခားအမည္မ်ား (ရွိလွ်င္)</div>
												<div class="span-1 personal-data">-</div>
												<div class="span-7 last personal-data"><input type="text" name="other_name" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" ></div>
											</div>
										
											<div class="span-13">
												<div class="span-1 personal-data">၄။</div>
												<div class="span-4  personal-data">အသက္ (ေမြးေန႔သကၠရာဇ္)</div>
												<div class="span-1 personal-data">-</div>
												<div class="span-7 personal-data last" >
													(<input type="text" name="age" value="" class="fieldstylesmall">)	ႏွစ္&nbsp;၊ &nbsp;&nbsp;
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
													<select class="option_text" name="birthmonth">
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
													<select class="option_text" name="birthyear">
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
												<div class="span-1 personal-data">၅။</div>
												<div class="span-4  personal-data">ေမြးဖြားရာဇာတိ</div>
												<div class="span-1 personal-data">-</div>
												<div class="span-7 last personal-data"><input type="text" name="native_town" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" ></div>
												<?php echo form_error('native_town');?>
											</div>
											
											<div class="span-13">
												<div class="span-1 personal-data">၆။</div>
												<div class="span-4  personal-data">က်ား / မ</div>
												<div class="span-1 personal-data">-</div>
												<div class="span-7 last personal-data">													
													က်ား&nbsp;<input type="radio" name="gender" value="က်ား" checked="checked">&nbsp;&nbsp;&nbsp;
													မ &nbsp;<input type="radio" name="gender" value="မ" >
												</div>
											</div>											
											<div class="span-13">
												<div class="span-1 personal-data">၇။</div>
												<div class="span-4  personal-data">ကုိးကြယ္သည့္ဘာသာ</div>
												<div class="span-1 personal-data">-</div>
												<div class="span-7 personal-data last">
													<select class="option_text" name="relegion">
														<option value="0" >ကုိးကြယ္သည့္ဘာသာေရြးပါ</option>
														<option value="ဗုဒၶဘာသာ" >ဗုဒၶဘာသာ</option>
														<option value="အစၥလာမ္" >အစၥလာမ္</option>
														<option value="ခရစၥယာန္" >ခရစၥယာန္</option>
														<option value="ဟိႏၵဴ" >ဟိႏၵဴ</option>														
													</select>
												</div>
												<?php echo form_error('relegion');?>
											</div>
											
											<div class="span-13">
												<div class="span-1 personal-data">၈။</div>
												<div class="span-4  personal-data">လူမ်ဴိး</div>
												<div class="span-1 personal-data">-</div>
												<div class="span-7 personal-data last">
													<input type="text" name="race" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" >
												</div>
												<?php echo form_error('race');?>
											</div>
											
											<div class="span-13">
												<div class="span-1 personal-data">၉။</div>
												<div class="span-4  personal-data">အမ်ိဳးသားမွတ္ပုံတင္အမွတ္</div>
												<div class="span-1 personal-data">-</div>
												<div class="span-7 personal-data last">
													<div class="span-7 NRC_text"><input type="text" name="s_nrc" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" ></div>
												</div>
												<?php echo form_error('s_nrc');?>
											</div>
											
											<div class="span-13">
												<div class="span-1 personal-data">၁၀။</div>
												<div class="span-4  personal-data">အရပ္</div>
												<div class="span-1 personal-data">-</div>
												<div class="span-7 last personal-data">
													<input type="text" name="height" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" >
												</div>
												<?php echo form_error('height');?>
											</div>
											
											<div class="span-13">
												<div class="span-1 personal-data">၁၁။</div>
												<div class="span-4  personal-data">ကုိယ္အေလးခ်ိန္</div>
												<div class="span-1 personal-data">-</div>
												<div class="span-7 personal-data last">
													<input type="text" name="weight" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" >
												</div>
												<?php echo form_error('weight');?>
											</div>
											
											<div class="span-13">
												<div class="span-1 personal-data">၁၂။</div>
												<div class="span-4  personal-data">ဆံပင္အေရာင္</div>
												<div class="span-1 personal-data">-</div>
												<div class="span-7 personal-data last">
													<input type="text" name="hair_color" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" >
												</div>
												<?php echo form_error('hair_color');?>
											</div>
											
											<div class="span-13">
												<div class="span-1 personal-data">၁၃။</div>
												<div class="span-4  personal-data">မ်က္စိအေရာင္</div>
												<div class="span-1 personal-data">-</div>
												<div class="span-7 personal-data last">
													<input type="text" name="eye_color" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" >
												</div>
												<?php echo form_error('eye_color');?>
											</div>
						
											<div class="span-13">
												<div class="span-1 personal-data">၁၄။</div>
												<div class="span-4  personal-data">ထင္ရွားသည့္အမွတ္အသား</div>
												<div class="span-1 personal-data">-</div>
												<div class="span-7 last personal-data"><input type="text" name="siganificant_mark" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" ></div>
												<?php echo form_error('siganificant_mark');?>
											</div>
											
											<div class="span-13">
												<div class="span-1 personal-data">၁၅။</div>
												<div class="span-4  personal-data">ပါရဂူသင္တန္း တက္ေရာက္ျခင္း</div>
												<div class="span-1 personal-data">-</div>
												<div class="span-3 personal-data last">
													ရွိ&nbsp;<input type="radio" name="phd_course" value="ရိွ" id="option1" >&nbsp;&nbsp;&nbsp;
													မရွိ&nbsp;<input type="radio" name="phd_course" value="မရိွ" id="option2" checked="checked">
												</div>
												<div class="span-3 personal-data last" >													
													<select class="option_text" name="phd_course_box" id="mySelect" disabled="disabled">
														<option value="0" >အတန္းေရြးခ်ယ္ပါ</option>
														<option value="ႀကိဳ/သု">ႀကိဳ/သု</option>
														<option value="၁ ပါ">၁ ပါ</option>
														<option value="၂ ပါ">၂ ပါ</option>
														<option value="၃ ပါ">၃ ပါ</option>
														<option value="၄ ပါ">၄ ပါ</option>
													</select>
													<?php echo form_error('phd_course_box');?>														
												</div>
											</div>
											
											<div class="span-13">
												<div class="span-1 personal-data">၁၆။</div>
												<div class="span-4  personal-data">ရာထူး</div>
												<div class="span-1 personal-data">-</div>
												<div class="span-3 personal-data">
													<select class="option_text" name="nation_foreign">
														<option value="0">ေရြးခ်ယ္ေပးပါ</option>
														<option value="ျပည္တြင္း">ျပည္တြင္း</option>
														<option value ="ျပည္ပ">ျပည္ပ</option>
													</select>
													<?php echo form_error('nation_foreign');?>
												</div>
												<div class="span-4 personal-data last">													
													<!--<select class="option_text" name="post">
														<option value="0">ရာထူးေရြးပါ</option>
														<?php 
															/*$this->db->select('*');
															$this->db->from('position_tbl');
															$this->db->where('u_id',$u_id);
															$query = $this->db->get();
															foreach($query->result() as $row):
															$position_name=$row->position_name;	*/	
												 	?>
														<option value="<?php //echo $position_name; ?>"><?php //echo $position_name; ?></option>
														<?php //endforeach;?>
													</select>													
													-->
													<select class="option_text" name="post">
														<option value="0">ရာထူး ေရြးခ်ယ္ပါ</option>
														<option value="ပါေမာကၡ">ပါေမာကၡ</option>
														<option value ="တြဲဖက္ပါေမာကၡ">တြဲဖက္ပါေမာကၡ</option>
														<option value="ကထိက">ကထိက</option>
														<option value="လ/ထ ကထိက">လ/ထ ကထိက</option>
														<option value="နည္းျပ/သရုပ္ျပ">နည္းျပ/သရုပ္ျပ</option>
														<option value="စီမံဌာန အရာရိွ">စီမံဌာန အရာရိွ</option>
													</select>
														<?php echo form_error('post');?>
												</div>
											</div>
											
											<div class="span-13">
												<div class="span-1 personal-data">၁၇။</div>
												<div class="span-4  personal-data">ဌာန</div>
												<div class="span-1 personal-data">-</div>
												<div class="span-7 personal-data last">
													<select class="option_text" name="department">
													<option value="0" >ဌာနေရြးပါ</option>
													<?php 
														$this->db->select('DISTINCT(major)');
														$this->db->from('major_tbl');
														$query1 = $this->db->get();
														foreach($query1->result() as $row1):
														$major=$row1->major;
													 ?>
													<option value="<?php echo $major." ဌာန"; ?>" ><?php echo $major."ဌာန"; ?></option>
													<?php endforeach; ?>
													</select>
													<?php echo form_error('department');?>
												</div>
											</div>
											
											<div class="span-13">
												<div class="span-1 personal-data">၁၈။</div>
												<div class="span-4  personal-data">ေနာက္ဆံုးရရွိခဲ့သည့္ဘြဲ႕</div>
												<div class="span-1 personal-data">-</div>
												<div class="span-7 personal-data last">
													<select class="option_text" name="last_degree">
														<option value="0">ဘြဲ႕ေရြးခ်ယ္ပါ</option>
														<option value="B.A">B.A</option>
														<option value="B.Sc">B.Sc</option>
														<option value="B.A(Hons)">B.A(Hons)</option>
														<option value="B.Sc(Hons)">B.Sc(Hons)</option>
														<option value="M.A">M.A</option>
														<option value="M.Sc">M.Sc</option>
														<option value="Phd(Art)">Phd(Art)</option>
														<option value="Phd(Science)">Phd(Science)</option>
													</select>
													<?php echo form_error('last_degree');?>
												</div>												
											</div>
											
											<div class="span-13">
												<div class="span-1 personal-data">၁၉။</div>
												<div class="span-4  personal-data">အထူးျပဳဘာသာရပ္</div>
												<div class="span-1 personal-data">-</div>
												<div class="span-7 personal-data last">
													<select class="option_text" name="sepcialized_subject">
														<option value="0" >အထူးျပဳဘာသာေရြးပါ</option>
														<?php 
															$this->db->select('DISTINCT(major)');
															$this->db->from('major_tbl');
															$query1 = $this->db->get();
															foreach($query1->result() as $row1):
															$major=$row1->major;
														 ?>
														<option value="<?php echo $major; ?>" ><?php echo $major; ?></option>
														<?php endforeach; ?>
													</select>
													<?php echo form_error('sepcialized_subject');?>
												</div>												
											</div>
											
											<div class="span-13">
												<div class="span-1 personal-data">၂၀။</div>
												<div class="span-4  personal-data">အမႈထမ္းသက္ ၀င္ေရာက္သည့္ေန႔စြဲ</div>
												<div class="span-1 personal-data">-</div>
													<div class="span-7 personal-data last">
														<select class="option_text" name="personnel_day">
														<option value = "0">ရက္</option>
														<?php for ($day=1;$day<=31;$day++){?>
														<option value="<?php echo $day;?>" <?php echo set_select('personnel_day','$day');?>>
														<?php echo $this->multi_function->myanmar_number($day);?>
														</option>
														<?php }?>
													</select>
													<?php echo form_error('personnel_day');?>
													<select class="option_text" name="personnel_month">
														<option value = "0">လ</option>
														<?php
														$month=array('ဇန္န၀ါရီ','ေဖေဖာ္၀ါရီ','မတ္','ဧၿပီ','ေမ','ဇြန္','ဇူလိုင္','ၾသဂုတ္','စက္တင္ဘာ','ေအာက္တိုဘာ','ႏို၀င္ဘာ','ဒီဇင္ဘာ');
														foreach ($month as $value){
														?>
														<option value="<?php echo $this->multi_function->month_myanmar_number2($value);?>" <?php echo set_select('personnel_month','$this->multi_function->month_number($value)');?>>
														<?php echo $value;?>
														</option>
														<?php }?>
													</select>
													<?php echo form_error('personnel_month');?>
													<select class="option_text" name="personnel_year">
														<option value = "0">ႏွစ္</option>
														<?php for ($year=1970;$year<=2050;$year++){?>
														<option value = "<?php echo $year;?>" <?php echo set_select('personnel_year','$year');?>>
														<?php echo $this->multi_function->year_myanmar_number($year);?>
														</option>
														<?php }?>
													</select>
													<?php echo form_error('personnel_year');?>
													</div>
											</div>
											
											<div class="span-13">
												<div class="span-1 personal-data">၂၁။</div>
												<div class="span-4  personal-data">လက္ရွိေနရပ္လိပ္စာ</div>
												<div class="span-1 personal-data">-</div>
												<div class="span-4 personal-data last" >
													<input type="text" name="current_address" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" >
												</div>
												<?php echo form_error('current_address');?>
											</div>
											
											<div class="span-13">
												<div class="span-1 personal-data">၂၂။</div>
												<div class="span-4  personal-data">အၿမဲတမ္းေနရပ္လိပ္စာ</div>
												<div class="span-1 personal-data">-</div>
												<div class="span-4 personal-data last">
													<input type="text" name="permanent_address" value="" class="fieldstyle" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" >
												</div>
												<?php echo form_error('permanent_address');?>
											</div>
											
											<hr class="space">
											<div class="span-13">
												<div class="span-1 personal-data">၂၃။</div>
												<div class="span-12 last personal-data">ပညာအရည္အခ်င္းျဖည့္ရန္</div>
											</div>
											<div class="span-13 prepend-top">
													<table class="Tborder">
														<tr>
															<td align="center">ပညာအရည္အခ်င္း</td>
															<td align="center">ဘြဲ႕အမည္</td>
															<td align="center">အထူးျပဳဘာသာ</td>
															<td align="center">ရရွိသည့္ခုႏွစ္</td>
															<td class="border-right">အဆင့္</td>
														</tr>
														<tr class="Ttext">
															<td>(က) ပထမဘြဲ႕</td>
															<td><input type="text" name="degree1" class="tablefield"></td>
															<td>
															<select class="option_text" name="major1">
																<option value="-" >အထူးျပဳဘာသာေရြးပါ</option>
																<?php 
																	$this->db->select('*');
																	$this->db->from('major_tbl');
																	$query1 = $this->db->get();
																	foreach($query1->result() as $row1):
																	$major=$row1->major;
																 ?>
																<option value="<?php echo $major; ?>" ><?php echo $major; ?></option>
																<?php endforeach; ?>
															</select>
															</td>
															<td>
															<select name="year1" class="option_text" >
																<option value = "-">ခုႏွစ္ေရြးရန္</option>
																<?php for ($year=1970;$year<=2050;$year++){?>
																<option value = "<?php echo $year;?>" <?php echo set_select('personnel_year','$year');?>>
																<?php echo $this->multi_function->year_myanmar_number($year);?>
																</option>
																<?php }?>
															</select>
															</td>
															<td><input type="text" name="grade1" class="tablefield"></td>
														</tr>
														<tr class="Ttext">
															<td>(ခ) ဘြဲ႕လြန္ဘြဲ႕</td>
															<td><input type="text" name="degree2" class="tablefield"></td>
															<td>
															<select class="option_text" name="major2">
																<option value="-" >အထူးျပဳဘာသာေရြးပါ</option>
																<?php 
																	$this->db->select('*');
																	$this->db->from('major_tbl');
																	$query1 = $this->db->get();
																	foreach($query1->result() as $row1):
																	$major=$row1->major;
																 ?>
																<option value="<?php echo $major; ?>" ><?php echo $major; ?></option>
																<?php endforeach; ?>
															</select>
															</td>
															<td>
															<select name="year2" class="option_text" >
																<option value = "-">ခုႏွစ္ေရြးရန္</option>
																<?php for ($year=1970;$year<=2050;$year++){?>
																<option value = "<?php echo $year;?>" <?php echo set_select('personnel_year','$year');?>>
																<?php echo $this->multi_function->year_myanmar_number($year);?>
																</option>
																<?php }?>
															</select>
															</td>
															<td><input type="text" name="grade2" class="tablefield"></td>
														</tr>
														<tr class="Ttext">
															<td>(ဂ) ဘြဲ႕လြန္ဒီပလုိမာ</td>
															<td><input type="text" name="degree3" class="tablefield"></td>
															<td>
															<select class="option_text" name="major3">
																<option value="-" >အထူးျပဳဘာသာေရြးပါ</option>
																<?php 
																	$this->db->select('*');
																	$this->db->from('major_tbl');
																	$query1 = $this->db->get();
																	foreach($query1->result() as $row1):
																	$major=$row1->major;
																 ?>
																<option value="<?php echo $major; ?>" ><?php echo $major; ?></option>
																<?php endforeach; ?>
															</select>
															</td>
															<td>
															<select name="year3" class="option_text" >
																<option value = "-">ခုႏွစ္ေရြးရန္</option>
																<?php for ($year=1970;$year<=2050;$year++){?>
																<option value = "<?php echo $year;?>" <?php echo set_select('personnel_year','$year');?>>
																<?php echo $this->multi_function->year_myanmar_number($year);?>
																</option>
																<?php }?>
															</select>
															</td>
															<td><input type="text" name="grade3" class="tablefield"></td>
														</tr>
														<tr class="Ttext">
															<td>(ဃ) မဟာဘြဲ႕</td>
															<td><input type="text" name="degree4" class="tablefield"></td>
															<td>
															<select class="option_text" name="major4">
																<option value="-" >အထူးျပဳဘာသာေရြးပါ</option>
																<?php 
																	$this->db->select('*');
																	$this->db->from('major_tbl');
																	$query1 = $this->db->get();
																	foreach($query1->result() as $row1):
																	$major=$row1->major;
																 ?>
																<option value="<?php echo $major; ?>" ><?php echo $major; ?></option>
																<?php endforeach; ?>
															</select>
															</td>
															<td>
															<select name="year4" class="option_text" >
																<option value = "-">ခုႏွစ္ေရြးရန္</option>
																<?php for ($year=1970;$year<=2050;$year++){?>
																<option value = "<?php echo $year;?>" <?php echo set_select('personnel_year','$year');?>>
																<?php echo $this->multi_function->year_myanmar_number($year);?>
																</option>
																<?php }?>
															</select>
															</td>
															<td><input type="text" name="grade4" class="tablefield"></td>
														</tr>
													</table>
											</div>
											
											
											<div class="span-13">
												<div class="span-1 personal-data">၂၄။</div>
												<div class="span-12 last personal-data">ပညာဆည္းပူးခဲ့ေသာ/ သင္တန္းတက္ခဲ့ေသာေက်ာင္း၊ ေကာလိပ္၊ တကၠသုိလ္ အလုပ္ဌာန၊ သင္တန္း စသည္မ်ား။</div>
											</div>
											
											
											<div class="span-13 prepend-top">
												<div class="span-3">
												<input type="button" value="" onclick="addRow('dataTable')" class="addrowbtn" />
												</div>
												<div class="span-3 last">
												<input type="button" value="" onclick="deleteRow('dataTable')" class="deleterowbtn" />
												</div>
											</div>
											
											<div class="span-13">
													<table class="Tborder" >
														<tr>
															<td width="15px"></td>
															<td width="155px" align="center">ကာလ (မွ-ထိ)</td>
															<td width="152px" align="center">ေက်ာင္း၊ တကၠသုိလ္ အလုပ္ဌာန၊ သင္တန္း</td>
															<td width="152px" align="center">တည္ရာအရပ္</td>
															<td width="150px" class="border-right">အဆင့္အတန္း</td>
														</tr>
													</table>
													<table class="Tbordersmall"  id="dataTable">																				
														<tr class="Ttext">
															<td><input type="checkbox" name="chk[]"></td>
															<td><input type="text" name="course_period[]"></td>
															<td><input type="text" name="course_name[]"></td>
															<td><input type="text" name="course_location[]"></td>
															<td><input type="text" name="course_grade[]"></td>
														</tr>
													</table>
											</div>
											<div class="span-13 remark">* ပညာစတင္ဆည္းပူးခဲ့ေသာႏွစ္မွစ၍ ယေန႔ အထိထမ္းေဆာင္ေနေသာ အလုပ္ဌာနအပါအဝင္ ခုႏွစ္သကၠရာဇ္ 
											အဆက္ျပတ္မႈမရွိေစဘဲ ျဖည့္သြင္းရန္။ အမႈထမ္းသက္ျဖည့္စြက္ရာတြင္ ရက္၊ လ၊ ခုႏွစ္ကုိပါေဖာ္ျပရန္။</div>
											
											
											<div class="span-13">
												<div class="span-1 personal-data">၂၅။</div>
												<div class="span-12 last personal-data">ႏုိင္ငံျခား ေရာက္ဘူးျခင္း ရွိ-မရွိ။</div>
											</div>
											
											<div class="span-13 prepend-top">
												<div class="span-3">
												<input type="button" value="" onclick="addRow('dataTable1')" class="addrowbtn" />
												</div>
												<div class="span-3 last">
												<input type="button" value="" onclick="deleteRow('dataTable1')" class="deleterowbtn" />
												</div>
											</div>
											
											<div class="span-13">
													<table class="Tborder" >
														<tr>
															<td width="15px"></td>
															<td width="156px" align="center">ကာလ (မွ-ထိ)</td>
															<td width="144px" align="center">သြားေရာက္သည့္ ႏုိင္ငံမ်ား</td>
															<td width="149px" align="center">သြားေရာက္သည့္ ကိစၥ</td>
															<td width="147px" class="border-right">ႏုိင္ငံျခားေငြ မည္မွ်ထုတ္ယူခဲ့သည္</td>
														</tr>
													</table>											
													<table class="Tbordersmall"  id="dataTable1">
														<tr class="Ttext">
															<td><input type="checkbox" name="chk[]"></td>
															<td><input type="text" name="abroad_period[]"></td>
															<td><input type="text" name="abroad_country[]"></td>
															<td><input type="text" name="abroad_case[]"></td>
															<td><input type="text" name="abroad_cost[]"></td>															
														</tr>
														
													</table>
											</div>
											
											<div class="span-13">
												<div class="span-1 personal-data">၂၆။</div>
												<div class="span-12 last personal-data">ႏုိင္ငံျခားသုိ႔သြားေရာက္မည့္ ပုဂိၢဳလ္၏ အဘႏွင့္ အဘ၏ ေမာင္ႏွမအရင္းအခ်ာမ်ား။</div>
											</div>
											
											<div class="span-13 prepend-top">
												<div class="span-3">
												<input type="button" value="" onclick="addRow1('dataTable2')" class="addrowbtn" />
												</div>
												<div class="span-3 last">
												<input type="button" value="" onclick="deleteRow1('dataTable2')" class="deleterowbtn"/>
												</div>
											</div>
											
											
											<div class="span-13">
													<table class="Tborder_1">
														<tr>
															<td width="15px"></td>
															<td width="150px" align="center">အမည္</td>
															<td width="150px" align="center">ေတာ္စပ္ပုံ</td>
															<td width="150px" align="center">က်ား/မ</td>
															<td width="146px" align="center">မည္သည့္ႏုိင္ငံသား</td>
															<td width="149px" class="border-right">အလုပ္အကုိင္</td>
															<td width="151px" align="center">ေနရပ္</td>
															<td width="149px" align="center" class="border-right">မွတ္ခ်က္</td>
														</tr>
														</table>
													<table class="Tbordersmall" id="dataTable2">
														<tr class="Ttext">
															<td><input type="checkbox" name="chk[]"></td>
															<td><input type="text" name="t_father_name[]"></td>
															<td><input type="text" name="t_father_related[]"></td>
															<td><input type="text" name="t_father_gender[]"></td>
															<td><input type="text" name="t_father_citizen[]"></td>
															<td><input type="text" name="t_father_job[]"></td>
															<td><input type="text" name="t_father_address[]"></td>
															<td><input type="text" name="t_father_remark[]"></td>
														</tr>
														
													</table>
											</div>
											
											
											<div class="span-13">
												<div class="span-1 personal-data">၂၇။</div>
												<div class="span-12 last personal-data">ႏုိင္ငံျခားသုိ႔သြားေရာက္မည့္ ပုဂိၢဳလ္၏ အမိႏွင့္ အမိ၏ ေမာင္ႏွမအရင္းအခ်ာမ်ား။</div>
											</div>
											<div class="span-13 prepend-top">
												<div class="span-3">
												<input type="button" value="" onclick="addRow1('dataTable3')" class="addrowbtn" />
												</div>
												<div class="span-3 last">
												<input type="button" value="" onclick="deleteRow1('dataTable3')" class="deleterowbtn"/>
												</div>
											</div>
											
											
											<div class="span-13">
													<table class="Tborder_1">
														<tr>
															<td width="15px"></td>
															<td width="150px" align="center">အမည္</td>
															<td width="150px" align="center">ေတာ္စပ္ပုံ</td>
															<td width="150px" align="center">က်ား/မ</td>
															<td width="146px" align="center">မည္သည့္ႏုိင္ငံသား</td>
															<td width="149px" class="border-right">အလုပ္အကုိင္</td>
															<td width="151px" align="center">ေနရပ္</td>
															<td width="149px" align="center" class="border-right">မွတ္ခ်က္</td>
														</tr>
													</table>
													<table class="Tbordersmall" id="dataTable3">
														<tr class="Ttext">
															<td><input type="checkbox" name="chk[]"></td>
															<td><input type="text" name="t_mother_name[]"></td>
															<td><input type="text" name="t_mother_related[]"></td>
															<td><input type="text" name="t_mother_gender[]"></td>
															<td><input type="text" name="t_mother_citizen[]"></td>
															<td><input type="text" name="t_mother_job[]"></td>
															<td><input type="text" name="t_mother_address[]"></td>
															<td><input type="text" name="t_mother_remark[]"></td>
														</tr>
														
													</table>
											</div>
											<div  class="span-13 remark">* အလုပ္အကုိင္ေဖာ္ျပရတြင္ လက္ရွိႏွင့္ အၿငိမ္းစားယူၿပီးျဖစ္လွ်င္ အၿငိမ္းစားမယူမီ ေနာက္ဆုံးရာထူးႏွင့္ ဌာနကုိ ေဖာ္ျပရန္၊ ကုန္သည္ျဖစ္ပါက မည္သည့္ ကုန္ပစၥည္းျဖစ္ေၾကာင္း ေဖာ္ျပရန္။</div>
											<div class="span-13 remark">** ကြယ္လြန္ၿပီးလွ်င္ မကြယ္လြန္မီ ေနာက္ဆုံးလုပ္ကုိင္ခဲ့ေသာ အလုပ္အကုိင္၊ ေနာက္ဆုံးေနခဲ့ေသာ လိပ္စာအျပည့္အစုံကုိ ေဖာ္ျပရန္ႏွင့္ မွတ္ခ်က္ဇယားတြင္ ကြယ္လြန္ေသာ ခုႏွစ္သကၠရာဇ္ကုိ ေဖာ္ျပရန္။</div>
											
											
											<div class="span-13">
												<div class="span-1 personal-data">၂၈။</div>
												<div class="span-12 last personal-data">ႏုိင္ငံျခားသုိ႔သြားေရာက္မည့္ ပုဂိၢဳလ္၏ ေမာင္ႏွမအရင္းအခ်ာမ်ား။</div>
											</div>
											<div class="span-13 prepend-top">
												<div class="span-3">
												<input type="button" value="" onclick="addRow1('dataTable4')" class="addrowbtn" />
												</div>
												<div class="span-3 last">
												<input type="button" value="" onclick="deleteRow1('dataTable4')" class="deleterowbtn"/>
												</div>
											</div>
											
											
											<div class="span-13">
													<table class="Tborder_1">
														<tr>
															<td width="15px"></td>
															<td width="150px" align="center">အမည္</td>
															<td width="150px" align="center">ေတာ္စပ္ပုံ</td>
															<td width="150px" align="center">က်ား/မ</td>
															<td width="150px" align="center">မည္သည့္ႏုိင္ငံသား</td>
															<td width="150px" class="border-right">အလုပ္အကုိင္</td>
															<td width="150px" align="center">ေနရပ္</td>
															<td width="150px" align="center" class="border-right">မွတ္ခ်က္</td>
														</tr>
													</table>
													<table class="Tbordersmall" id="dataTable4">
														<tr class="Ttext">
															<td><input type="checkbox" name="chk[]"></td>
															<td><input type="text" name="t_cousin_name[]"></td>
															<td><input type="text" name="t_cousin_related[]"></td>
															<td><input type="text" name="t_cousin_gender[]"></td>
															<td><input type="text" name="t_cousin_citizen[]"></td>
															<td><input type="text" name="t_cousin_job[]"></td>
															<td><input type="text" name="t_cousin_address[]"></td>
															<td><input type="text" name="t_cousin_remark[]"></td>
														</tr>
														
													</table>
											</div>
											
											
											<div class="span-13">
												<div class="span-1 personal-data">၂၉။</div>
												<div class="span-12 last personal-data">ဇနီး/ ခင္ပြန္းႏွင့္   ၎၏ ေမာင္ႏွမအရင္းအခ်ာမ်ား။</div>
											</div>
											<div class="span-13 prepend-top">
												<div class="span-3">
												<input type="button" value="" onclick="addRow1('dataTable5')" class="addrowbtn" />
												</div>
												<div class="span-3 last">
												<input type="button" value="" onclick="deleteRow1('dataTable5')" class="deleterowbtn"/>
												</div>
											</div>
											
											
											<div class="span-13">
													<table class="Tborder_1">
														<tr>
															<td width="15px"></td>
															<td width="150px" align="center">အမည္</td>
															<td width="150px" align="center">ေတာ္စပ္ပုံ</td>
															<td width="150px" align="center">က်ား/မ</td>
															<td width="150px" align="center">မည္သည့္ႏုိင္ငံသား</td>
															<td width="150px" class="border-right">အလုပ္အကုိင္</td>
															<td width="150px" align="center">ေနရပ္</td>
															<td width="150px" align="center" class="border-right">မွတ္ခ်က္</td>
														</tr>
													</table>
													<table class="Tbordersmall" id="dataTable5">
														<tr class="Ttext">
															<td><input type="checkbox" name="chk[]"></td>
															<td><input type="text" name="t_partner_name[]"></td>
															<td><input type="text" name="t_partner_related[]"></td>
															<td><input type="text" name="t_partner_gender[]"></td>
															<td><input type="text" name="t_partner_citizen[]"></td>
															<td><input type="text" name="t_partner_job[]"></td>
															<td><input type="text" name="t_partner_address[]"></td>
															<td><input type="text" name="t_partner_remark[]"></td>
														</tr>
														
													</table>
											</div>
											
											
											<div class="span-13">
												<div class="span-1 personal-data">၃၀။</div>
												<div class="span-12 last personal-data">ဇနီး/ ခင္ပြန္း၏ အဘႏွင့္ ေမာင္ႏွမအရင္းအခ်ာမ်ား။</div>
											</div>
											<div class="span-13 prepend-top">
												<div class="span-3">
												<input type="button" value="" onclick="addRow1('dataTable6')" class="addrowbtn" />
												</div>
												<div class="span-3 last">
												<input type="button" value="" onclick="deleteRow1('dataTable6')" class="deleterowbtn"/>
												</div>
											</div>
											
											
											<div class="span-13">
													<table class="Tborder_1">
														<tr>
															<td width="15px"></td>
															<td width="150px" align="center">အမည္</td>
															<td width="150px" align="center">ေတာ္စပ္ပုံ</td>
															<td width="150px" align="center">က်ား/မ</td>
															<td width="150px" align="center">မည္သည့္ႏုိင္ငံသား</td>
															<td width="150px" class="border-right">အလုပ္အကုိင္</td>
															<td width="150px" align="center">ေနရပ္</td>
															<td width="150px" align="center" class="border-right">မွတ္ခ်က္</td>
														</tr>
													</table>
													<table class="Tbordersmall" id="dataTable6">
														<tr class="Ttext">
															<td><input type="checkbox" name="chk[]"></td>
															<td><input type="text" name="t_partner_father_name[]"></td>
															<td><input type="text" name="t_partner_father_related[]"></td>
															<td><input type="text" name="t_partner_father_gender[]"></td>
															<td><input type="text" name="t_partner_father_citizen[]"></td>
															<td><input type="text" name="t_partner_father_job[]"></td>
															<td><input type="text" name="t_partner_father_address[]"></td>
															<td><input type="text" name="t_partner_father_remark[]"></td>
														</tr>
														
													</table>
											</div>
											<div  class="span-13 remark">* အလုပ္အကုိင္ေဖာ္ျပရတြင္ လက္ရွိႏွင့္ အၿငိမ္းစားယူၿပီးျဖစ္လွ်င္ အၿငိမ္းစားမယူမီ ေနာက္ဆုံးရာထူးႏွင့္ ဌာနကုိ ေဖာ္ျပရန္၊ ကုန္သည္ျဖစ္ပါက မည္သည့္ ကုန္ပစၥည္းျဖစ္ေၾကာင္း ေဖာ္ျပရန္။</div>
											<div class="span-13 remark">** ကြယ္လြန္ၿပီးလွ်င္ မကြယ္လြန္မီ ေနာက္ဆုံးလုပ္ကုိင္ခဲ့ေသာ အလုပ္အကုိင္၊ ေနာက္ဆုံးေနခဲ့ေသာ လိပ္စာအျပည့္အစုံကုိ ေဖာ္ျပရန္ႏွင့္ မွတ္ခ်က္ဇယားတြင္ ကြယ္လြန္ေသာ ခုႏွစ္သကၠရာဇ္ကုိ ေဖာ္ျပရန္။</div>
											
											
											
											<div class="span-13">
												<div class="span-1 personal-data">၃၁။</div>
												<div class="span-12 last personal-data">ဇနီး/ ခင္ပြန္း၏ အမိႏွင့္ ေမာင္ႏွမအရင္းအခ်ာမ်ား။</div>
											</div>
											<div class="span-13 prepend-top">
												<div class="span-3">
												<input type="button" value="" onclick="addRow1('dataTable7')" class="addrowbtn" />
												</div>
												<div class="span-3 last">
												<input type="button" value="" onclick="deleteRow1('dataTable7')" class="deleterowbtn"/>
												</div>
											</div>
											
											
											<div class="span-13">
													<table class="Tborder_1">
														<tr>
															<td width="15px"></td>
															<td width="150px" align="center">အမည္</td>
															<td width="150px" align="center">ေတာ္စပ္ပုံ</td>
															<td width="150px" align="center">က်ား/မ</td>
															<td width="150px" align="center">မည္သည့္ႏုိင္ငံသား</td>
															<td width="150px" class="border-right">အလုပ္အကုိင္</td>
															<td width="150px" align="center">ေနရပ္</td>
															<td width="150px" align="center" class="border-right">မွတ္ခ်က္</td>
														</tr>
													</table>
													<table class="Tbordersmall" id="dataTable7">
														<tr class="Ttext">
															<td><input type="checkbox" name="chk[]"></td>
															<td><input type="text" name="t_partner_mother_name[]"></td>
															<td><input type="text" name="t_partner_mother_related[]"></td>
															<td><input type="text" name="t_partner_mother_gender[]"></td>
															<td><input type="text" name="t_partner_mother_citizen[]"></td>
															<td><input type="text" name="t_partner_mother_job[]"></td>
															<td><input type="text" name="t_partner_mother_address[]"></td>
															<td><input type="text" name="t_partner_mother_remark[]"></td>
														</tr>
														
													</table>
											</div>
											
											
											
											<div class="span-13">
												<div class="span-1 personal-data">၃၂။</div>
												<div class="span-12 last personal-data">သား/ သမီးမ်ားႏွင့္ ၎တုိ႔၏ ဇနီး/ ခင္ပြန္း</div>
											</div>
											<div class="span-13 prepend-top">
												<div class="span-3">
												<input type="button" value="" onclick="addRow1('dataTable8')" class="addrowbtn" />
												</div>
												<div class="span-3 last">
												<input type="button" value="" onclick="deleteRow1('dataTable8')" class="deleterowbtn"/>
												</div>
											</div>
											
											
											<div class="span-13">
													<table class="Tborder_1">
														<tr>
															<td width="15px"></td>
															<td width="150px" align="center">အမည္</td>
															<td width="150px" align="center">ေတာ္စပ္ပုံ</td>
															<td width="150px" align="center">က်ား/မ</td>
															<td width="150px" align="center">မည္သည့္ႏုိင္ငံသား</td>
															<td width="150px" class="border-right">အလုပ္အကုိင္</td>
															<td width="150px" align="center">ေနရပ္</td>
															<td width="150px" align="center" class="border-right">မွတ္ခ်က္</td>
														</tr>
													</table>
													<table class="Tbordersmall" id="dataTable8">
														<tr class="Ttext">
															<td><input type="checkbox" name="chk[]"></td>
															<td><input type="text" name="t_child_name[]"></td>
															<td><input type="text" name="t_child_related[]"></td>
															<td><input type="text" name="t_child_gender[]"></td>
															<td><input type="text" name="t_child_citizen[]"></td>
															<td><input type="text" name="t_child_job[]"></td>
															<td><input type="text" name="t_child_address[]"></td>
															<td><input type="text" name="t_child_remark[]"></td>
														</tr>
														
													</table>
											</div>
											
											
											
											<div class="span-13">
												<div class="span-1 personal-data">၃၃။</div>
												<div class="span-12 last personal-data">ႏုိင္ငံျခားတြင္ ေရာက္ရွိေနၾကသည္ ေဆြမ်ိဳးမ်ား။</div>
											</div>
											<div class="span-13 prepend-top">
												<div class="span-3">
												<input type="button" value="" onclick="addRow1('dataTable9')" class="addrowbtn" />
												</div>
												<div class="span-3 last">
												<input type="button" value="" onclick="deleteRow1('dataTable9')" class="deleterowbtn"/>
												</div>
											</div>
											<div class="span-13">
													<table class="Tborder_1">
														<tr>
															<td width="15px"></td>
															<td width="150px" align="center">အမည္</td>
															<td width="150px" align="center">ေတာ္စပ္ပုံ</td>
															<td width="150px" align="center">မည္သည့္<br/>ႏုိင္ငံသား</td>
															<td width="150px" class="border-right">အလုပ္အကုိင္</td>
															<td width="150px" align="center">ေရာက္ရွိေနသည့္ <br/>ႏုိင္ငံ</td>
															<td width="150px" align="center">သြားေရာက္သည့္ ကိစၥ</td>
															<td width="150px" align="center" class="border-right">ျပန္လည္ေရာက္<br/>ရွိမည့္ကာလ</td>
														</tr>
													</table>
													<table class="Tbordersmall" id="dataTable9">
														<tr class="Ttext">
															<td><input type="checkbox" name="chk[]"></td>
															<td><input type="text" name="t_abroad_family_name[]"></td>
															<td><input type="text" name="t_abroad_family_related[]"></td>
															<td><input type="text" name="t_abroad_family_citizen[]"></td>
															<td><input type="text" name="t_abroad_family_job[]"></td>
															<td><input type="text" name="t_abroad_family_country[]"></td>
															<td><input type="text" name="t_abroad_family_case[]"></td>
															<td><input type="text" name="t_abroad_family_coming[]"></td>
														</tr>
													</table>
											</div>
											
											
											<div class="span-13">
												<div class="span-1 personal-data">၃၄။</div>
												<div class="span-12 last personal-data">ဌာနဆုိင္ရာ အေရးယူခံရျခင္း ရွိ-မရွိ။</div>
											</div>
											
											<div class="span-13 prepend-top">
												<div class="span-3">
												<input type="button" value="" onclick="addRow('dataTable10')" class="addrowbtn" />
												</div>
												<div class="span-3 last">
												<input type="button" value="" onclick="deleteRow('dataTable10')" class="deleterowbtn" />
												</div>
											</div>
											
											<div class="span-13">
													<table class="Tborder">
														<tr>
															<td width="15px"></td>
															<td width="150px" align="center">အေရးယူခံရသည့္ <br/> ကာလ</td>
															<td width="150px" align="center">အေရးယူခံရသည့္ <br/> အေၾကာင္းကိစၥ</td>
															<td width="150px" align="center">ခ်မွတ္ခံရသည့္ျပစ္ဒဏ္</td>
															<td width="150px" align="center" class="border-right">မွတ္ခ်က္</td>
														</tr>
													</table>
													<table class="Tbordersmall"  id="dataTable10">
														<tr class="Ttext">
															<td><input type="checkbox" name="chk[]"></td>
															<td><input type="text" name="t_punish_period[]" ></td>
															<td><input type="text" name="t_punish_case[]"></td>
															<td><input type="text" name="t_punish_sentence[]"></td>
															<td><input type="text" name="t_punish_remark[]"></td>
														</tr>
														
													</table>
											</div>
											
											
											<div class="span-13">
												<div class="span-1 personal-data">၃၅။</div>
												<div class="span-12 last personal-data">တရားရုံးတြင္ တရားစြဲခံရဖူးျခင္း ရွိ-မရွိ။</div>
											</div>
											<div class="span-13 prepend-top">
												<div class="span-3">
												<input type="button" value="" onclick="addRow('dataTable11')" class="addrowbtn" />
												</div>
												<div class="span-3 last">
												<input type="button" value="" onclick="deleteRow('dataTable11')" class="deleterowbtn" />
												</div>
											</div>
											
											<div class="span-13">
													<table class="Tborder">
														<tr>
															<td width="15px"></td>
															<td width="150px" align="center">တရားစြဲဆုိျခင္းခံရသည့္ <br/> ကာလ</td>
															<td width="150px" align="center">တရားစြဲဆုိျခင္းခံရသည့္ အေၾကာင္းကိစၥႏွင့္<br/> စြဲဆိုခံရသည့္ ဥပေဒပုဒ္မ</td>
															<td width="150px" align="center">ခ်မွတ္ခံရသည့္ျပစ္ဒဏ္</td>
															<td width="150px" align="center" class="border-right">မွတ္ခ်က္</td>
														</tr>
													</table>
													<table class="Tbordersmall"  id="dataTable11">
														<tr class="Ttext">
															<td><input type="checkbox" name="chk[]"></td>
															<td><input type="text" name="t_lawsuit_preiod[]" ></td>
															<td><input type="text" name="t_lawsuit_case[]"></td>
															<td><input type="text" name="t_lawsuit_sentense[]"></td>
															<td><input type="text" name="t_lawsuit_remark[]"></td>
														</tr>
													
													</table>
											</div>
											
												<div class="span-13">
												<div class="span-1 personal-data">၃၆။</div>
												<div class="span-12 last personal-data">ဘြဲ႕တံဆိပ္ခ်ီးျမွင့္ခံရျခင္း ရွိ-မရွိ။</div>
											</div>
											<div class="span-13 prepend-top">
												<div class="span-3">
												<input type="button" value="" onclick="addRow2('dataTable12')" class="addrowbtn" />
												</div>
												<div class="span-3 last">
												<input type="button" value="" onclick="deleteRow2('dataTable12')" class="deleterowbtn" />
												</div>
											</div>
											
											<div class="span-13">
													<table class="Tborder">
														<tr>
															<td width="15px"></td>
															<td width="150px" align="center">ခ်ီးျမင့္ခံရသည့္ကာလ</td>
															<td width="150px" align="center">ခ်ီျမင့္ခံရသည့္ ဘြဲ႕တံဆိပ္ အမ်ိဳးအစား</td>
															<td width="150px" class="border-right">မွတ္ခ်က္</td>
														</tr>
													</table>
													<table class="Tbordersmall"  id="dataTable12">
														<tr class="Ttext">
															<td><input type="checkbox" name="chk[]"></td>
															<td><input type="text" name="t_honor_period[]" ></td>
															<td><input type="text" name="t_honor_degree[]"></td>
															<td><input type="text" name="t_honor_remark[]"></td>

														</tr>
													
													</table>
											</div>
											
											
											
											<div class="span-13">
												<div class="span-1 personal-data">၃၇။</div>
												<div class="span-12 last personal-data">ႏုိင္ငံျခားသုိ႔ သြားေရာက္မည့္ကိစၥ</div>
											</div>
											<div class="span-13 prepend-top">
												<div class="span-3">
												<input type="button" value="" onclick="addRow3('dataTable13')" class="addrowbtn" />
												</div>
												<div class="span-3 last">
												<input type="button" value="" onclick="deleteRow3('dataTable13')" class="deleterowbtn" />
												</div>
											</div>
											
											<div class="span-13">
													<table class="Tborder_2">
														<tr>
															<td width="15px"></td>
															<td width="150px" align="center">သင္ၾကားမည့္ဘာသာရပ္ႏွင့္<br/>အဆင့္/ တက္ေရာက္မည့္ <br/> သင္တန္း/သုိ႔မဟုတ္အျခားကိစၥ</td>
															<td width="150px" align="center">ေစလြတ္ သည့္ ႏုိင္ငံ</td>
															<td width="150px" align="center">အခ်ိန္ကာလ</td>
															<td width="150px" align="center">ႏုိင္ငံျခားသုိ႔ေရာက္ရမည့္ေန႔</td>
															<td width="150px" align="center">မည္သည့္အစုိးရအဖြဲ႔အစည္း အေထာက္အပံ့</td>
															<td width="150px" align="center" class="border-right">ျပန္လည္ေရာက္ရွိလွ်င္<br/>အမႈထမ္းမည့္<br/>ဌာန/တာဝန္</td>
														</tr>
													</table>
													<table class="Tbordersmall""  id="dataTable13">
														<tr class="Ttext">
															<td><input type="checkbox" name="chk[]"></td>
															<td><input type="text" name="t_abroad_course[]" ></td>
															<td><input type="text" name="t_country[]"></td>
															<td><input type="text" name="t_period[]"></td>
															<td><input type="text" name="t_arrive_date[]" ></td>
															<td><input type="text" name="t_gov_grant[]" ></td>
															<td><input type="text" name="t_re_department[]"></td>
														</tr>
														
													</table>
											</div>									
											</div>
											<?php 
												$this->db->select('*');
												$this->db->from('teacher_personal_tbl');
												$this->db->where('t_id',$t_valid_id);
												$query1 = $this->db->get(); 
												foreach($query1->result() as $row1):
											?>
											<div class="span-3 prepend-top photo push-1 last">	
											<div class="span-3" >
												<img src ="<?php echo base_url()?>system/application/teacher_photos/<?php echo $row1->t_photo_location;?>" width="110px" height="120px"/>
											</div>
											</div>
											<?php endforeach;?>
											<div class="span-12 push-5">
													<div class="span-6 push-1"><input type="submit" name="Add" value="" class="save_btn" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url()?>index.php/off_biography/pre_edit_officer_biography/<?php echo $t_valid_id?>"><input type="button"  value=""  name="btn1" class="reset_btn"></a></div>
											</div>
											<hr class="space">
																					
								</div>
										
									
										
								
								<hr class="space">
								<!-- 1 End-->
																
				</div>
									
									<!-- accoridian jquery end-->
					
				
					
				</div>
			
