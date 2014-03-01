			<?php 
					$s_valid_id4 = $this->uri->segment(4);					
					$this->db->select('*');
					$this->db->from('student_personal_tbl');
					$this->db->where('s_id',$s_valid_id4);
					$query1 = $this->db->get();					 
					foreach($query1->result() as $row1):		 								
			?>			
<div class="span-18 last">
	<div class="span-18 adminUnibg">
		<div class="span-14 subtable_title push-6 prepend-top"><h5 style="color:#2b7108;">ေက်ာင္းသားမ်ားကုိယ္ေရးရာဇဝင္ျဖည့္ရန္</h5></div><br/><br/><br/>
					<div class="prepend-top" >
						<div class="span-8 last push-5 ">
							<?php echo form_open_multipart('_student/pre_edit_student_biography_again_process');?>
							<input type="hidden"  name="student_id"  value="<?php echo $s_valid_id4;?>">
							
						<div span="span-8 ">
								<div span="span-2 " style="text-align:left;margin-top:10px;font-size:1.2em;"><label for="cname">အမွတ္စဥ္</label></div>
								<div span="span-5 last" style="margin-top:-20px;text-align:left;margin-left:80px;">
									<input type="text" id="cname" name="student_sno"  value="<?php echo $row1->s_serial_no;?>" class="field1" width="150px;" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" />
								</div>
								<div style="color:#FCC100;"><?php echo form_error('student_sno');?></div>
							</div><br/>
							<div span="span-8">
								<div span="span-2" style="text-align:left;margin-top:10px;font-size:1.2em;"><label for="cname">အမည္</label></div>
								<div span="span-5 last" style="margin-top:-20px;text-align:left;margin-left:80px;">
									<input type="text" id="cname" name="student_name"  value="<?php echo $row1->s_name;?>" class="field1" width="150px;" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" />
								</div>
								<div style="color:#FCC100;"><?php echo form_error('student_name');?></div>
							</div><br/>
							<div span="span-15">
								<div span="span-2" style="text-align:left;margin-top:10px;font-size:1.2em;"><label for="ccomment">ဓါတ္ပုံ</label></div>
								<div span="span-5" style="margin-top:-20px;text-align:left;margin-left:80px;">
									<input type="file" id="ccomment" name="edit_student_file" class="required"  width="150px;"style="text-align:left;padding:0;color:#000;"/>
								<div span="span-8 last"><img src="<?php echo base_url();?>system/application/student_photos/<?php echo $row1->s_photo_location; ?>" width="50px" height="50px" ></div>	
								</div>
																
								<div style="color:#FCC100;"><?php echo form_error('student_file');?></div>
							</div><br/>
							<div span="span-8" style="margin-left:130px;"	>
								<input class="save_btn"  type="submit"  value="" >
							</div>
							<?php 
								endforeach;							
								form_close();								
							?>
						</div>				
					</div>	
		</div>
</div>