
		<div class="span-18 last right_panel">
			<div class="span-18 prepend-top">
			<div class="span-14 subtable_title"><h5 style="color:#2b7108;margin-left:145px;">အထူးျပဳ ဘာသာရပ္မ်ား</h5></div><br/>
				<div class="span-13 outbox_title">လူၾကီးမင္း၏ အထူးျပဳဘာသာရပ္မ်ားအား ဤေနရာမွတဆင့္ ထည့္သြင္းႏိုင္ပါသည္။</div>
			
				<?php echo form_open_multipart('major/major_add');?>		
			<input type="hidden" name="hidden_uid" id="hidden_uid" value=" <?php echo $u_id ?>"  class="field1" />
			</div><hr class="space">			
			<div class="span-20">			
				<div class="span-20">
					<div class="span-12 field1_text">
						<div class="span-14 push-1 field1_text">				
							<div class="span-8">အထူးျပဳဘာသာရပ္(အမည္)</div>
								<div class="span-4"><input type="text" name="major" id="major" value="" class="field1" required data-errormessage-value-missing="စာအမွတ္ မွန္ကန္စြာရုိက္ထည့္ပါ"  /></div>
							<div style="margin-left: 80px;color:#FCC100;"><?php echo form_error('major');?></div>
						</div><br/>
					<div class="span-14 push-1 field1_text">		
							<div class="span-8">တက္ေရာက္ရမည္႔ ကာလအပိုင္းအျခား(ရိုးရိုးတန္း)</div>
							<div class="span-4">
								<select class="unibox" name="class_bachelar" >
									<option value="0">--ခုႏွစ္ေရြးရန္--</option>					
									<option value="၁" >၁ ႏွစ္</option>
									<option value="၂" >၂ ႏွစ္</option>
									<option value="၃" >၃ ႏွစ္</option>
									<option value="၄" >၄ ႏွစ္</option>				
								</select>
					
							</div>
							<div style="margin-left: 80px;color:#FCC100;"><?php echo form_error('class_bachelar');?></div>
						</div>
					<div class="span-14 push-1 field1_text">	
							<div class="span-8">တက္ေရာက္ရမည္႔ ကာလအပိုင္းအျခား(ဂုဏ္ထူးတန္း)</div>
							
								<select class="unibox" name="class_honus" >
									<option value="0">--ခုႏွစ္ေရြးရန္--</option>					
								<option value="၁" >၁ ႏွစ္</option>
									<option value="၂" >၂ ႏွစ္</option>
									<option value="၃" >၃ ႏွစ္</option>
									<option value="၄" >၄ ႏွစ္</option>						
								</select>
							
							</div>
							<div style="margin-left: 80px;color:#FCC100;"><?php echo form_error('class_honus');?></div>
						</div>
						<div class="span-14 push-1 field1_text">		
							<div class="span-8">တက္ေရာက္ရမည္႔ ကာလအပိုင္းအျခား(မဟာတန္း)</div>
							<div class="span-4">
							<select class="unibox" name="class_master" >
									<option value="0">--ခုႏွစ္ေရြးရန္--</option>					
									<option value="၁" >၁ ႏွစ္</option>
									<option value="၂" >၂ ႏွစ္</option>
									<option value="၃" >၃ ႏွစ္</option>
									<option value="၄" >၄ ႏွစ္</option>						
								</select>
							</div>
							<div style="margin-left: 80px;color:#FCC100;"><?php echo form_error('class_master');?></div>
						</div>
							<div class="span-14 push-1 field1_text">		
							<div class="span-8">တက္ေရာက္ရမည္႔ ကာလအပိုင္းအျခား(မဟာ သုေတသန)</div>
							<div class="span-4">
							<select class="unibox" name="class_phd" >
									<option value="0">--ခုႏွစ္ေရြးရန္--</option>					
									<option value="၁" >၁ ႏွစ္</option>
									<option value="၂" >၂ ႏွစ္</option>
									<option value="၃" >၃ ႏွစ္</option>
									<option value="၄" >၄ ႏွစ္</option>					
								</select>
							</div>
							<div style="margin-left: 80px;color:#FCC100;"><?php echo form_error('class_phd');?></div>
						</div>
							<div class="span-14 push-1 field1_text">		
							<div class="span-8">ဘာသာရပ္အလိုက္ ဌာနမွဴး(အမည္)</div>
							<div class="span-4"><input type="text" name="class_head"  id="class_head"  class="field1" required data-errormessage-value-missing="အေၾကာင္းအရာ မွန္ကန္စြာရုိက္ထည့္ပါ"  /></div>
							<div style="margin-left: 80px;color:#FCC100;"><?php echo form_error('class_head');?></div>
						</div>
					</div>
				
				</div><br/><br/><br/>
				<div class="span-14 push-2" style="margin-top:15px;"><input type="submit" name="save"   value="" class="save_btn"  required data-errormessage-value-missing="အမည္ ရုိက္ထည့္ပါ" /></div>				
	
				<?php echo form_close();?>
		
			</div>			
	
