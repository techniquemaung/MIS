		<div class="span-18 last right_panel">
			<div class="span-18 prepend-top">
				<div class="span-13 outbox_title">လူၾကီးမင္း၏ စာျဖည့္သြင္းမႈမ်ားအား ဤေနရာမွတဆင့္ ထည့္သြင္းႏိုင္ပါသည္။</div>		
				<?php echo form_open_multipart('letter/edit_letter_operation');?>
				<div class="span-4 last">
					<?php
						date_default_timezone_set('UTC');
						//$datestring = "%d/%m/%Y ";
						//	$date=mdate($datestring);
					 	$day=date("d");
					 $month=date("m");
						$year=date("Y");
					 ?>
					<input type="hidden" name="hidden_u_id" value="<?php echo $u_id; ?>" />
					<input type="hidden" name="hidden_day" value="<?php  echo $day; ?>" />
					<input type="hidden" name="hidden_month" value="<?php  echo $month; ?>" />
					<input type="hidden" name="hidden_year" value="<?php  echo $year; ?>" />	
					<select class="unibox" name="box_to">
					</select>
				</div>
			</div><hr class="space">
			
			<div class="span-18">			
				<div class="span-17">
					<div class="span-7 field1_text">
						<div class="span-7 push-1 field1_text">														
								<?php 
									$this->db->where('l_id', $this->uri->segment(3)); 
									$i=2;
									$query = $this->db->get('letter_tbl'); 
									foreach($query->result() as $row): 
									$l_title= $row->l_title;
									$l_no=$row->l_no;
									$file_source=$row->l_file_location;
									$l_description =$row->l_description;
									$letter_id=$row->l_id; 									
								?>
								<?php 
									endforeach;								
									if( $this->uri->segment(3)!="l_uni_in" ){
										$uri_current =  $this->uri->segment(4);	
									}
									if( $this->uri->segment(4)=="l_uni_in" ){
										$uri_current=$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.
										$this->uri->segment(6).'/'. $this->uri->segment(7).'/'.$this->uri->segment(8).'/'.
										$this->uri->segment(9).'/'.$this->uri->segment(10).'/'.$this->uri->segment(11).'/'.$this->uri->segment(12) ;
									}
								?>
							<div class="span-2">စာအမွတ္</div>
							<div class="span-4">
								<input type="hidden" name="hidden_id" value="<?php echo $letter_id; ?>" />
								<input type="hidden" name="hidden_file_source" value="<?php echo $file_source; ?>" />										
								<input type="hidden" name="hidden_l_no" value="<?php echo $l_no; ?>" />									
								<input type="hidden" name="hidden_uri_current" value="<?php echo $uri_current; ?>" />	
								<label style="color:green;font-size:14px;margin-top:15px;"><?php echo $l_no; ?></label>							
							</div>
						</div><br/>
						<div class="span-7 push-1 field1_text">
							<div class="span-2">အေၾကာင္းအရာ</div>
							<div class="span-4"><input type="text" name="title" value="<?php echo $l_title; ?>" class="field1" required data-errormessage-value-missing="အေၾကာင္းအရာ မွန္ကန္စြာရုိက္ထည့္ပါ" ></div>
							<div style="margin-left: 80px;color:#FCC100;"><?php echo form_error('letter_no');?></div>
						</div><br/>
						
						<div class="span-7 push-1 field1_text">
							<div class="span-2">မူရင္းဖုိင္ထည့္ရန္</div>
							<div class="span-4"><input type="file" name="edit_outbox_file" class="orgfile" >	</div>
						</div>
						
						<div class="span-7 push-1 field1_text">
							<div class="span-2" style="color:#fffff8">.</div>
							<div class="span-4" style="color:green"><?php echo $file_source;?>	</div>
						</div><br/>
						
					</div>
					<div class="span-7 push-1 last field1_text">					
						<div class="span-2">စာအေသးစိတ္</div>
						<div class="span-4"><textarea class="area1" name="description" id="description"  required data-errormessage-value-missing="စာအေသးစိတ္ ရုိက္ထည့္ပါ"  ><?php echo $l_description; ?></textarea></div>
					</div>
				</div><br/>
				
				<div class="span-14 push-2" style="margin-top:-15px;"><input type="submit" name="save" value="" class="save_btn"></div>				
								
				<?php echo form_close();?>
			</div>		
		</div>