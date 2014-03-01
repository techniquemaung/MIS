	<?php
		$attr='selected="selected"';
		$chk = 'checked="checked"';
		$user_id=$this->uri->segment(3);
		$this->db->select('*');
		$this->db->from('major_tbl');
		$this->db->where('major_id',$user_id);
		$query1 = $this->db->get();
		foreach($query1->result() as $row1): 
		$major=$row1->major;
		$class_bachelar=$row1->class_bachelar;
		$class_honus=$row1->class_honus;
		$class_master=$row1->class_master;
		$class_phd=$row1->class_phd;
		$class_head=$row1->	class_head;
		 endforeach;

	?>
		<div class="span-18 last right_panel">
			<div class="span-18 prepend-top">
			<div class="span-14 subtable_title"><h5 style="color:#2b7108;margin-left:145px;">အထူးျပဳ ဘာသာရပ္မ်ား</h5></div><br/>
				<div class="span-13 outbox_title">လူၾကီးမင္း၏ အထူးျပဳဘာသာရပ္မ်ားအား ဤေနရာမွတဆင့္ ထည့္သြင္းႏိုင္ပါသည္။</div>
			
				<?php echo form_open_multipart('major/major_edit');?>		
			<input type="hidden" name="hidden_uid" id="hidden_uid" value=" <?php echo $u_id ?>"  class="field1" />
				<input type="hidden" name="hidden_mid" id="hidden_mid" value=" <?php echo $user_id ?>"  class="field1" />
			</div><hr class="space">			
			<div class="span-20">			
				<div class="span-20">
					<div class="span-12 field1_text">
						<div class="span-14 push-1 field1_text">				
							<div class="span-8">အထူးျပဳဘာသာရပ္(အမည္)</div>
								<div class="span-4"><input type="text" name="major" id="major" value="<?php echo $major; ?>" class="field1" required data-errormessage-value-missing="စာအမွတ္ မွန္ကန္စြာရုိက္ထည့္ပါ"  /></div>
							<div style="margin-left: 80px;color:#FCC100;"><?php echo form_error('major');?></div>
						</div><br/>
					<div class="span-14 push-1 field1_text">		
							<div class="span-8">တက္ေရာက္ရမည္႔ ကာလအပိုင္းအျခား(ရိုးရိုးတန္း)</div>
							<div class="span-4">
								<select class="unibox" name="class_bachelar" >
									<option value="0">--ခုႏွစ္ေရြးရန္--</option>					
									<option value="၁"  <?php echo $class_bachelar == "၁"  ? $attr : ''; ?>>၁ ႏွစ္</option>
									<option value="၂"   <?php echo $class_bachelar == "၂"  ? $attr : ''; ?> >၂ ႏွစ္</option>
									<option value="၃"  <?php echo $class_bachelar == "၃"  ? $attr : ''; ?> >၃ ႏွစ္</option>
									<option value="၄"   <?php echo $class_bachelar == "၄"  ? $attr : ''; ?>>၄ ႏွစ္</option>				
								</select>
					
							</div>
							<div style="margin-left: 80px;color:#FCC100;"><?php echo form_error('class_bachelar');?></div>
						</div>
					<div class="span-14 push-1 field1_text">	
							<div class="span-8">တက္ေရာက္ရမည္႔ ကာလအပိုင္းအျခား(ဂုဏ္ထူးတန္း)</div>
							
								<select class="unibox" name="class_honus" >
									<option value="0">--ခုႏွစ္ေရြးရန္--</option>					
								<option value="၁"  <?php echo $class_honus == "၁"  ? $attr : ''; ?>>၁ ႏွစ္</option>
									<option value="၂"   <?php echo $class_honus == "၂"  ? $attr : ''; ?> >၂ ႏွစ္</option>
									<option value="၃"  <?php echo $class_honus == "၃"  ? $attr : ''; ?> >၃ ႏွစ္</option>
									<option value="၄"   <?php echo $class_honus == "၄"  ? $attr : ''; ?>>၄ ႏွစ္</option>				
								</select>
							
							</div>
							<div style="margin-left: 80px;color:#FCC100;"><?php echo form_error('class_honus');?></div>
						</div>
						<div class="span-14 push-1 field1_text">		
							<div class="span-8">တက္ေရာက္ရမည္႔ ကာလအပိုင္းအျခား(မဟာတန္း)</div>
							<div class="span-4">
							<select class="unibox" name="class_master" >
									<option value="0">--ခုႏွစ္ေရြးရန္--</option>					
									<option value="၁"  <?php echo $class_master == "၁"  ? $attr : ''; ?>>၁ ႏွစ္</option>
									<option value="၂"   <?php echo $class_master == "၂"  ? $attr : ''; ?> >၂ ႏွစ္</option>
									<option value="၃"  <?php echo $class_master == "၃"  ? $attr : ''; ?> >၃ ႏွစ္</option>
									<option value="၄"   <?php echo $class_master == "၄"  ? $attr : ''; ?>>၄ ႏွစ္</option>					
								</select>
							</div>
							<div style="margin-left: 80px;color:#FCC100;"><?php echo form_error('class_master');?></div>
						</div>
							<div class="span-14 push-1 field1_text">		
							<div class="span-8">တက္ေရာက္ရမည္႔ ကာလအပိုင္းအျခား(မဟာ သုေတသန)</div>
							<div class="span-4">
							<select class="unibox" name="class_phd" >
									<option value="0">--ခုႏွစ္ေရြးရန္--</option>					
								<option value="၁"  <?php echo $class_phd == "၁"  ? $attr : ''; ?>>၁ ႏွစ္</option>
									<option value="၂"   <?php echo $class_phd == "၂"  ? $attr : ''; ?> >၂ ႏွစ္</option>
									<option value="၃"  <?php echo $class_phd == "၃"  ? $attr : ''; ?> >၃ ႏွစ္</option>
									<option value="၄"   <?php echo $class_phd == "၄"  ? $attr : ''; ?>>၄ ႏွစ္</option>			
								</select>
							</div>
							<div style="margin-left: 80px;color:#FCC100;"><?php echo form_error('class_phd');?></div>
						</div>
							<div class="span-14 push-1 field1_text">		
							<div class="span-8">ဘာသာရပ္အလိုက္ ဌာနမွဴး(အမည္)</div>
							<div class="span-4"><input type="text" name="class_head"  id="class_head"  value="<?php echo $class_head; ?>" class="field1" required data-errormessage-value-missing="အေၾကာင္းအရာ မွန္ကန္စြာရုိက္ထည့္ပါ"  /></div>
							<div style="margin-left: 80px;color:#FCC100;"><?php echo form_error('class_head');?></div>
						</div>
					</div>
				
				</div><br/><br/><br/>
				<div class="span-14 push-2" style="margin-top:15px;"><input type="submit" name="save"   value="" class="save_btn"  required data-errormessage-value-missing="အမည္ ရုိက္ထည့္ပါ" /></div>				
	
				<?php echo form_close();?>
		
			</div>			
			
		</div>					
