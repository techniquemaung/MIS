<head>
<style type="text/css">
table
{
width:690px;
border-right:1px solid #c8c8c8;
background:#fff url(<?php echo base_url();?>system/application/views/includes/images/table_header.png) no-repeat;
font-size:12px;
border-left:1px solid #c8c8c8;
-moz-border-radius: 8px 8px 0px 0px;
text-align:center;
color:#4a5c09;
text-shadow:0 1px 0 #f6ffd7;
margin-top:-10px;
border-right:1px solid #2b410c;
}
table tr td{
text-shadow:0 1px 0 #b4ddfe, 0 0 0 #000;
font-size:13px;
color:#4a5c09;
text-shadow:0 1px 0 #f6ffd7;
}
</style>
</head>

			<div class="span-18 last" id="content_area">				
				<div class="span-18">					
					<div id="vertical_container">
					<div class="span-14 push-2">
						<h3 style="color:#2b7108;">ပညာေရးဝန္ႀကီးဌာန</h3><span style="font-size:14px;color:#705a01;">ေန႔စဥ္စာ၀င္ျပဇယား</span>
					</div><br/>
					<div class="span-16 push-2">
						<form name='search' action=<?php echo site_url('letter/inbox/');?> method='post'>	
						<input type="hidden" name="hidden_u_id" value="<?php echo $u_id; ?>" />				
						
						<div class="span-4">
							<?php
								$this->db->select('u_id,u_name');
								$this->db->from('university_tbl');
								$this->db->where('u_id !=',$u_id);
								$query = $this->db->get();						
							?>
							<select class="unibox"  name="l_uni_out"  id="mycmb"  onchange="enabledisabletext()" >
								<option value="">--တကၠသိုလ္ေရြးရန္--</option>
								<?php foreach($query->result() as $row): ?>						
								<option value="<?php echo $row->u_id;?>" <?php //echo set_select('search_uni','$row->u_id');?>><?php echo $row->u_name;?></option>
								<?php endforeach;?>
							</select>
							<div style="color:#FCC100;"><?php //echo form_error('search_uni');?></div>	
						</div>
											
						<div class="span-3">					
							<select class="ddbox" name="l_day"  id="mycmb"  onchange="enabledisabletext()" >
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
							<div style="color:#FCC100;"><?php //echo form_error('search_month'); ?></div>
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
						<div class="span-2 last"><input type="submit" name="search" value="" class="search" style="margin-top:2px;" id="search_btn"   disabled="disabled"></div>
					</form>						
				</div>
									
			<!--Letter outbox query table Start-->				
				<div class="span-18" style="margin-left:4px;">
				</div>
				<?php echo $table; ?>
				<?php //echo $pagination; ?>
			<!--Letter outbox query table End-->	
				<div class="span-24 table-bg"></div>
				<!-- Pager Start -->
				<div class = "span-20 pull-1 last"><?php echo $pagination;//echo $this->pagination->create_links(); ?></div>
				<!-- Pager End -->
			</div>
		</div>
	</div>