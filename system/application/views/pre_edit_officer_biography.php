		<?php 
					$t_valid_id = $this->uri->segment(3);
					$this->db->select('*');
					$this->db->from('teacher_personal_tbl');
					$this->db->where('t_id',$t_valid_id);
					$query1 = $this->db->get(); 
					foreach($query1->result() as $row1):									
		?>
		<div class="span-18 last">
		<div class="span-18 adminUnibg">
		<div class="span-14 subtable_title push-6 prepend-top"><h5 style="color:#2b7108;">ဝန္ထမ္းမ်ားကုိယ္ေရးရာဇဝင္ျဖည့္ရန္</h5></div><br/><br/>
					<div class="prepend-top" >
						<div class="span-8 last push-5 ">
							<?php echo form_open_multipart('off_biography/pre_edit_officer_biography_process');?>
							<input type="hidden"  name="teacher_id"  value="<?php echo $t_valid_id;?>">
							<div span="span-8 ">
								<div span="span-2 " style="text-align:left;margin-top:10px;font-size:1.2em;"><label for="cname">အမွတ္စဥ္</label></div>
								<div span="span-5 last" style="margin-top:-20px;text-align:left;margin-left:80px;">
									<input type="text"  name="teacher_sno" class="field1"  value="<?php echo $row1->t_serial_no;?>" width="150px;" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" />
								</div>
								<div style="color:#FCC100;"><?php echo form_error('teacher_sno');?></div>
							</div><br/>
							<div span="span-8">
								<div span="span-2" style="text-align:left;margin-top:10px;font-size:1.2em;"><label for="cname">အမည္</label></div>
								<div span="span-5 last" style="margin-top:-20px;text-align:left;margin-left:80px;">
								<input type="text"  name="teacher_name" class="field1"  value="<?php echo $row1->t_name;?>" width="150px;" required data-errormessage-value-missing="ဤေနရာတြင္ ရုိက္ထည့္ရန္လိုပါသည္" /></div>
								<div style="color:#FCC100;"><?php echo form_error('teacher_name');?></div>
							</div><br/>
							<div span="span-8">
								<div span="span-2" style="text-align:left;margin-top:10px;font-size:1.2em;"><label for="ccomment">ဓါတ္ပုံ</label></div>
								<div span="span-5 last" style="margin-top:-20px;text-align:left;margin-left:80px;"><input type="file" id="ccomment" name="edit_teacher_file" class="required" width="150px;"style="text-align:left;padding:0;color:#000;"/></div>
								<div span="span-8 last"><img src="<?php echo base_url();?>system/application/teacher_photos/<?php echo $row1->t_photo_location; ?>" width="50px" height="50px" ></div>
								<div style="color:#FCC100;"><?php echo form_error('edit_teacher_file');?></div>
							</div><br/>
							<div span="span-8" style="margin-left:130px;">
								<input type="submit" value="" class="save_btn">
							</div>
							<?php 
								endforeach;
								form_close();
							?>
						</div>				
					</div>	
				</div>
			</div>