<head>
<style type="text/css">
table
{
width:690px;
background:#fff url(<?php echo base_url();?>system/application/views/includes/images/table_header.png) no-repeat;
font-size:12px;
border-left:1px solid #c8c8c8;
-moz-border-radius: 8px 8px 0px 0px;
text-align:center;
color:#4a5c09;
text-shadow:0 1px 0 #f6ffd7;
margin-top:-10px;
border-right:1px solid gray;
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
					<div class="span-14 subtable_title">
						<h5 style="color:#2b7108;margin-left:145px;">ပညာသင္ေထာက္ပံေၾကးရေက်ာင္းသားစာရင္း</h5>
					</div><br/>
				<!-- Search form start -->
				<div class="span-16 push-7">
					<form name='search' action=<?php echo site_url('std_scholarship/study_fund_student_list/');?> method='post'>	
					<input type="hidden" name="hidden_u_id" value="<?php echo $u_id; ?>" />
									
					<div class="span-4">
					<?php
						$this->db->select('major');
						$this->db->from('major_tbl');
						$this->db->where('u_id',$u_id);
						$query = $this->db->get();						
					?>
					<select class="unibox"  name="s_major"  id="mycmb"  onchange="enabledisabletext()" >
						<option value="">--အထူးျပဳဘာသာေရြးရန္--</option>
						<?php foreach($query->result() as $row): ?>						
						<option value="<?php echo $row->major;?>"><?php echo $row->major;?></option>
						<?php endforeach;?>
					</select>
						
					</div>
										
					<div class="span-3">					
							<select class="unibox" name="s_class"  id="mycmb"  onchange="enabledisabletext()" >
								<option value="" >--အတန္းေရြးရန္--</option>
								<option value="ရိုးရိုးတန္း(ပ)" >ရိုးရိုးတန္း(ပ)</option>
								<option value="ရိုးရိုးတန္း(ဒု)" >ရိုးရိုးတန္း(ဒု)</option>
								<option value="ရိုးရိုးတန္း(တ)" >ရိုးရိုးတန္း(တ)</option>
								<option value="ရိုးရိုးတန္း(စ)" >ရိုးရိုးတန္း(စ)</option>
								<option value="ဂုဏ္ထူးတန္း(ပ)" >ဂုဏ္ထူးတန္း(ပ)</option>
								<option value="ဂုဏ္ထူးတန္း(ဒု)" >ဂုဏ္ထူးတန္း(ဒု)</option>
								<option value="မဟာဘြဲ႔" >မဟာဘြဲ႔</option>
								<option value="မဟာသုေတသန" >မဟာသုေတသန</option>
							</select>				
					</div>
					
					<div class="span-2 last"><input type="submit" name="search" value="" class="search" style="margin-top:2px;margin-left:40px" id="search_btn"   disabled="disabled"></div>
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
				<div class = "span-20 pull-1 last"><?php echo $pagination;//echo $this->pagination->create_links(); ?></div>
				<!-- Pager End -->
			</div>

