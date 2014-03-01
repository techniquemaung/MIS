<head>
<style type="text/css">
table
{
width:690px;
border-right:1px solid #c8c8c8;
background:#fff url(<?php echo base_url();?>system/application/views/includes/images/table_header.png) no-repeat;
font-size:12px;
-moz-border-radius: 8px 8px 0px 0px;
text-align:center;
color:#4a5c09;
text-shadow:0 1px 0 #f6ffd7;
margin-top:-10px;
border-right:1px solid gray;
border-left:1px solid #c8c8c8;
}
table tr td{
text-shadow:0 1px 0 #b4ddfe, 0 0 0 #000;
font-size:13px;
color:#4a5c09;
text-shadow:0 1px 0 #f6ffd7;
border-right:1px solid #2b410c;
}
</style>
</head>
	
		<div class="span-18 last right_panel">
			<div class="span-18 prepend-top">
				<div class="span-13 outbox_title">လူၾကီးမင္း၏ စာျဖည့္သြင္းမႈမ်ားအား ဤေနရာမွတဆင့္ ထည့္သြင္းႏိုင္ပါသည္။</div>
				<?php echo form_open_multipart('letter/letter_outbox_process');?>		
				<div class="span-4 last">
					<?php
						date_default_timezone_set('UTC');
						//$datestring = "%d/%m/%Y ";
						//$date=mdate($datestring);
						$day=date("d");
						$month=date("m");
						$year=date("Y"); 
					?>
					<input type="hidden" name="hidden_day" value="<?php  echo $day; ?>" />
					<input type="hidden" name="hidden_month" value="<?php  echo $month; ?>" />
					<input type="hidden" name="hidden_year" value="<?php  echo $year; ?>" />
					<?php
					
					
					
						$this->db->select('u_id,u_name');
						$this->db->from('university_tbl');
						$this->db->where('u_id!=',$u_id);
						$query = $this->db->get();						
					?>					
					<select class="unibox" name="box_to" >
						<option value="">--တကၠသိုလ္ေရြးရန္--</option>
						<option value="0">ပညာေရးဝန္ႀကီးဌာန</option>
						<?php foreach($query->result() as $row): ?>
						<option value="<?php echo $row->u_id;?>" <?php echo set_select('box_to','$row->u_id');?>><?php echo $row->u_name;?></option>
						<?php endforeach;?>
					</select>
					<div style="color:#FCC100;"><?php echo form_error('box_to');?></div>				
				</div>
			</div><hr class="space">			
			<div class="span-18">			
				<div class="span-17">
					<div class="span-7 field1_text">
						<div class="span-7 push-1 field1_text">					
							<div class="span-2">စာအမွတ္</div>
							<input type="hidden" name="hidden_u_id" value="<?php echo $u_id; ?>" />
							<div class="span-4"><input type="text" name="letter_no" id="letter_no" value="" class="field1" required data-errormessage-value-missing="စာအမွတ္ မွန္ကန္စြာရုိက္ထည့္ပါ"  /></div>
							<div style="margin-left: 80px;color:#FCC100;"><?php echo form_error('letter_no');?></div>
						</div><br/>
						<div class="span-7 push-1 field1_text">
							<div class="span-2">အေၾကာင္းအရာ</div>
							<div class="span-4"><input type="text" name="title"  id="title" value="" class="field1" required data-errormessage-value-missing="အေၾကာင္းအရာ မွန္ကန္စြာရုိက္ထည့္ပါ"  /></div>
							<div style="margin-left: 80px;color:#FCC100;"><?php echo form_error('title');?></div>
						</div>
						<div class="span-7 push-1 field1_text">
							<div class="span-2">မူရင္းဖုိင္ထည့္ရန္</div>
							<div class="span-4"><input type="file" name="out_box_file"  id="out_box_file" class="orgfile"  /></div>
							<div style="margin-left: 85px;color:#FCC100;"><?php echo form_error('out_box_file');?></div>
						</div><br/>
					</div>
					<div class="span-7 push-1 last field1_text">				
						<div class="span-2">စာအေသးစိတ္</div>
						<div class="span-4"><textarea class="area1" name="description" id="description" required data-errormessage-value-missing="စာအေသးစိတ္ ရုိက္ထည့္ပါ"  ></textarea></div>				
						<div style="margin-left: 80px;color:#FCC100;"><?php echo form_error('description');?></div>
					</div>
				</div><br/>
				<div class="span-14 push-2" style="margin-top:-15px;"><input type="submit" name="save" value="" class="save_btn"></div>				
				<div class="span-17 push-1 horz_line" style="margin-top:-15px;"></div>
				<?php echo form_close();?>
			</div>			
			<div class="span-18">
				<div class="span-14 push-2">
					<h3 style="color:#2b7108;">ပညာေရးဝန္ႀကီးဌာန</h3><span style="font-size:14px;color:#705a01;">ေန႔စဥ္စာထြက္ျပဇယား</span>
				</div><br/>
				
				<!-- Search form start -->
				<div class="span-16 push-1">
					<form name='search' action=<?php echo site_url('letter/outbox/');?> method="post" enctype="multipart/form-data">				
					<div class="span-4">
					<?php
						$this->db->select('u_id,u_name');
						$this->db->from('university_tbl');
						$this->db->where('u_id !=',$u_id);
						$query = $this->db->get();						
					?>
					<select class="unibox"  name="l_uni_in"  id="mycmb"  onchange="enabledisabletext()" >
						<option value="">--တကၠသိုလ္ေရြးရန္--</option>
						<option value="0">ပညာေရးဝန္ႀကီးဌာန</option>						
						<?php foreach($query->result() as $row): ?>						
						<option value="<?php echo $row->u_id;?>" <?php //echo set_select('l_uni_in','$row->u_id');?>><?php echo $row->u_name;?></option>
						<?php endforeach;?>
					</select>
					<div style="color:#FCC100;"><?php //echo form_error('search_uni');?></div>	
					</div>					
					<div class="span-3">					
					<select class="ddbox"  name="l_day"  id="mycmb"  onchange="enabledisabletext()" >
					<option value = "">- Day -</option>
					<?php for ($day=1;$day<=31;$day++){?>
					<option value="<?php echo $day;?>" <?php //echo set_select('search_day','$day');?>><?php echo $day;?></option>
					<?php }?>
					</select>
					<div style="color:#FCC100;"><?php //echo form_error('search_day');?></div>
					</div>
					<div class="span-3">
					<select class="ddbox"  name="l_month"  id="mycmb"  onchange="enabledisabletext()" >
					<option value = "">- Month -</option>
					<?php
						$month=array("January","February","March","April","May","June","July","Augest","September","October","November","December");
						foreach ($month as $value){					 
					 ?>
					<option value="<?php echo $this->multi_function->month_number($value);?>" <?php //echo set_select('search_month','$this->multi_function->month_number($value)');?>><?php echo $value;?></option>
					<?php }?>
					</select>
					<div style="color:#FCC100;"><?php //echo form_error('search_month');?></div>
					</div>
					<div class="span-3">
					<select class="ddbox"  name="l_year"  id="mycmb"  onchange="enabledisabletext()" >
					<option value = "">- Year -</option>
					<?php for ($year=1990;$year<=2025;$year++){?>
					<option value = "<?php echo $year;?>" <?php //echo set_select('search_year','$year');?>><?php echo $year;?></option>
					<?php }?>
					</select>
					<div style="color:#FCC100;"><?php //echo form_error('search_year');?></div>
					</div>					
					<div class="span-2 last"><input type="submit" name="search" value="" class="search" style="margin-top:2px; "  id="search_btn"  disabled="disabled"></div>
					</form>				
				</div>
			<!-- Search form end -->
			
			<!--Letter outbox query table Start-->				
				<div class="span-18" style="margin-left:4px;">
				</div>
				<?php echo $table; ?>
				<?php //echo $pagination; ?>
			<!--Letter outbox query table End-->	
				<div class="span-24 table-bg"></div>
				<!-- Pager Start -->
				<div class = "span-20 pull-1 last"><?php echo $pagination; ?></div>
				<!-- Pager End -->
			</div>
		</div>					
