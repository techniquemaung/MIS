	<div class="span-18 last">
		<div class="span-18 adminUnibg">
		<div class="span-14 subtable_title push-6 prepend-top"><h5 style="color:#2b7108;">ဝန္ထမ္းမ်ားကုိယ္ေရးရာဇဝင္ျဖည့္ရန္</h5></div>
				<div class="prepend-top">
						<div class="span-8 last push-5 ">
							<?php echo form_open_multipart('off_biography/office_biography_process');?>
							<input type="hidden"  name="u_id"  value="<?php echo $u_id;?>">
							<div span="span-8 ">
								<div span="span-2 " style="text-align:left;margin-top:10px;font-size:1.2em;"><label for="cname">အမွတ္စဥ္</label></div>
								<div span="span-5 last" style="margin-top:-20px;text-align:left;margin-left:80px;"><input type="text"  name="teacher_sno" class="field1" width="150px;" required data-errormessage-value-missing="အမွတ္စဥ္ ရုိက္ထည့္ပါ" /></div>
								<div style="color:#FCC100;"><?php echo form_error('teacher_sno');?></div>
							</div><br/>
							<div span="span-8">
								<div span="span-2" style="text-align:left;margin-top:10px;font-size:1.2em;"><label for="cname">အမည္</label></div>
								<div span="span-5 last" style="margin-top:-20px;text-align:left;margin-left:80px;"><input type="text"  name="teacher_name" class="field1" width="150px;" required data-errormessage-value-missing="အမည္ ရုိက္ထည့္ပါ" /></div>
								<div style="color:#FCC100;"><?php echo form_error('teacher_name');?></div>
							</div><br/>
							<div span="span-8">
								<div span="span-2" style="text-align:left;margin-top:10px;font-size:1.2em;"><label for="ccomment">ဓါတ္ပုံ</label></div>
								<div span="span-5 last" style="margin-top:-20px;text-align:left;margin-left:80px;"><input type="file" id="ccomment" name="teacher_file" class="field1" width="150px;"style="text-align:left;padding:0;color:#000;"/></div>
								<div style="color:#FCC100;"><?php echo form_error('teacher_file');?></div>
							</div><br/>
							<div span="span-8" style="margin-left:130px;">
								<input type="submit" value="" class="save_btn"/>
							</div>
							<?php form_close();?>
						</div>				
					</div>	
		</div>
		</div>					