
		<div class="span-18 last right_panel">
			<div class="span-18 prepend-top">
			<div class="span-14 subtable_title"><h5 style="color:#2b7108;margin-left:145px;">ဝန္ထမ္းမ်ား၏ ရာထူးမ်ား</h5></div><br/>
				<div class="span-13 outbox_title">ဝန္ထမ္းမ်ား၏ ရာထူးမ်ားအား ဤေနရာမွတဆင့္ ထည့္သြင္းႏိုင္ပါသည္။</div>
			
				<?php echo form_open_multipart('position/position_add_process');?>		
			<input type="hidden" name="hidden_uid" id="hidden_uid" value=" <?php echo $u_id ?>"  class="field1" />
			</div><hr class="space">			
			<div class="span-20">			
				<div class="span-20">
					<div class="span-12 field1_text">
						<div class="span-14 push-1 field1_text">				
							<div class="span-8">ရာထူး (အမည္)</div>
								<div class="span-4"><input type="text" name="position_name" value="" class="field1" required data-errormessage-value-missing="စာအမွတ္ မွန္ကန္စြာရုိက္ထည့္ပါ"  /></div>
							<div style="margin-left: 80px;color:#FCC100;"><?php echo form_error('position_name');?></div>
						</div><br/>
							<div class="span-14 push-1 field1_text">		
							<div class="span-8">ရာထူးအလိုက္ ဝန္ထမ္းအင္အား</div>
							<div class="span-4"><input type="text" name="position_count" class="field1" required data-errormessage-value-missing="အေၾကာင္းအရာ မွန္ကန္စြာရုိက္ထည့္ပါ"  /></div>
							<div style="margin-left: 80px;color:#FCC100;"><?php echo form_error('position_count');?></div>
						</div>
					</div>
				
				</div><br/><br/><br/>
				<div class="span-14 push-2" style="margin-top:15px;"><input type="submit" name="save"   value="" class="save_btn"  required data-errormessage-value-missing="အမည္ ရုိက္ထည့္ပါ" /></div>				
	
				<?php echo form_close();?>
		
			</div>			
			
		</div>					
