		<?php 
			$teacher_id = $this->uri->segment(3);
			$this->db->select('*');
			$this->db->from('teacher_personal_tbl');
			$this->db->where('t_id',$teacher_id);
			$query = $this->db->get();				
			foreach($query->result() as $row):
		?>
		
		<div class="span-18 last right_panel">

			<div id="vertical_container">
										<!-- 1 start-->	

									<div  class=" span-18 accordion_content prepend-top append-bottom" style="display: block;margin-top:21px;">      
									
										<div class="span-14 push-2 prepend-top field1_text">
											<?php echo form_open_multipart('_teacher/officer_transfer_process');?>
												<input type="hidden" name="hidden_t_id" value="<?php echo $row->t_id;?>">
												
												<div class="span-8 append-bottom">
													<div class="span-4">
														အမည္
													</div>
													<div class="span-4 last">
														<label><?php echo $row->t_name;?></label>
													</div>
												</div>
												<div class="span-8 append-bottom">
													<div class="span-4" style="margin-top:8px;">
														ဌာန
													</div>
													<div class="span-4 last ">
														<label><?php echo $row->t_depeartment;?></label>
													</div>
												</div>
												<div class="span-8 append-bottom">
													<div class="span-4" style="margin-top:8px;">
														လက္ရိွ ရာထူး
													</div>
													<div class="span-4 last ">
														<label><?php echo $row->t_nation_foreign;?>&nbsp;<?php echo $promotion=$row->t_promotion;?></label>
														<input type="hidden" name="hidden_nation_foreign" value="<?php echo $row->t_nation_foreign;?>">
														<input type="hidden" name="hidden_promotion" value="<?php echo $row->t_promotion;?>">
														<input type="hidden" name="hidden_u_id" value="<?php echo $u_id;?>">
														<input type="hidden" name="hidden_t_depeartment"  value="<?php echo $row->t_depeartment;?>">
													
													</div>
												</div>
															<div class="span-16 append-bottom">
													<div class="span-4" style="margin-top:8px;">
														လက္ရိွ ရာထူး
													</div>
												မွ <select name="pre_start_date"  " >
													<option value = "0">- Year -</option>
													<?php for ($year=1990;$year<=2025;$year++){?>
													<option value = "<?php echo $year;?>" ><?php echo $year;?></option>
													<?php }?>
													</select>
													
														ထိ	<select name="pre_end_date"  " >
													<option value = "0">- Year -</option>
													<?php for ($year=1990;$year<=2025;$year++){?>
													<option value = "<?php echo $year;?>" ><?php echo $year;?></option>
													<?php }?>
													</select>
												</div>
												<div class="span-8 append-bottom">
													<div class="span-4" style="margin-top:8px;">
														ေျပာင္းေရြ႕မည့္ ရာထူး
													</div>
													<div class="span-4 last ">
														<select class="unibox" name="promotion">
														<option value="0">- ရာထူး ေရြးရန္ -</option>
														<option value="ပါေမာကၡ">ပါေမာကၡ</option>
														<option value ="တြဲဖက္ပါေမာကၡ">တြဲဖက္ပါေမာကၡ</option>
														<option value="ကထိက">ကထိက</option>
														<option value="လ/ထ ကထိက">လ/ထ ကထိက</option>
														<option value="နည္းျပ/သရုပ္ျပ">နည္းျပ/သရုပ္ျပ</option>
														<option value="စီမံဌာန အရာရိွ">စီမံဌာန အရာရိွ</option>
													</select>
													</div>
												</div>
												
													<div class="span-8 append-bottom">
													<div class="span-4" style="margin-top:8px;">
														ေျပာင္းေရႊ႕မည့္တကၠသုိလ္
													</div>
													<div class="span-4 last ">
														<?php
															$this->db->select('u_id,u_name');
															$this->db->from('university_tbl');
															$this->db->where('u_id !=',$u_id);
															$query = $this->db->get();						
														?>
														<select class="unibox"  name="uni_transfer" >
															<option value="">--တကၠသိုလ္ေရြးရန္--</option>
															<option value="0">ပညာေရးဝန္ႀကီးဌာန</option>						
															<?php foreach($query->result() as $row): ?>						
															<option value="<?php echo $row->u_id;?>"><?php echo $row->u_name;?></option>
															<?php endforeach;?>
														</select>
													</div>
												</div>
												<div class="span-8">
													<div class="span-3 speacerbtn">
														
													</div>		
												
													<div class="span-4">
														<a href="servicelist.htm"><input type="submit" name="save" value="" class="transferbtn"></a>
													</div>
												</div>
											<?php form_close();?>
												<?php endforeach;?>	
										</div>
								
								</div>			
							</div>
						</div>
	
