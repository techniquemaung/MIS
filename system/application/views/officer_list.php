<head>
<style type="text/css">
.hiddenField
{
 display: none;
}
table
{
width:690px;
margin-left:10px;
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
border-right:1px solid #2b410c;
}
</style>

  	<!-- Show/Hide search textbox Start -->
	<script language="javascript">
		$(document).ready(function(){
		    $('#mycmb').change(function(){
		       //$(this).val() == "Option 2" ? $('#myTextBox').show() : $('#myTextBox').hide();
		        if($(this).val() == "t_name" ) { $('#t_name').show() ; $('#t_nrc').hide(); $('#t_promotion').hide(); $('#t_depeartment').hide(); document.getElementById("search_btn").disabled = true;}
		        if($(this).val() == "t_nrc" ) { $('#t_nrc').show() ; $('#t_name').hide(); $('#t_promotion').hide(); $('#t_depeartment').hide(); document.getElementById("search_btn").disabled = true;}
		        if($(this).val() == "t_promotion" ) { $('#t_promotion').show() ; $('#t_nrc').hide(); $('#t_name').hide(); $('#t_depeartment').hide(); document.getElementById("search_btn").disabled = true;}
		        if($(this).val() == "t_depeartment" ) { $('#t_depeartment').show() ; $('#t_nrc').hide();$('#t_name').hide(); $('#t_promotion').hide(); document.getElementById("search_btn").disabled = true;}
		    });
		});
		
		$(document).ready(function(){
		    $('input[type="submit"][id=search_btn]').attr('disabled','disabled');
		    $('input[type="text"]').keypress(function() {
		       if($(this).val() != ''){
		          $('input[type="submit"]').removeAttr('disabled');
		          $("form input[type=submit][id=search_btn]").css({
		        	"background":"url(<?php echo base_url()?>system/application/views/includes/images/searchbtn.png) no-repeat",
		         	 "width":"88px",
		          	"height":"32px",
		         	 "border":"none",
		          	"margin-top":"4px",		            	    
		        	});
		       }
		    });		    
		});
	</script>
	<!-- Show/Hide search textbox End -->
 </head>
 
		<div class="span-18 last right_panel">
			<div class="span-14 subtable_title"><h5 style="color:#2b7108;margin-left:145px;">ေက်ာင္းသားမ်ားစာရင္း</h5></div><br/>
			<div id="vertical_container">
				<!-- 1 start-->	
				<div  class=" span-18 append-bottom" style="display: block;">      
					<div class="span-2 light_box1" style="text-align:left;">
						<a href="<?php echo base_url(); ?>index.php/off_biography/pre_officer_biography"><img src="<?php echo base_url()?>system/application/views/includes/images/addbtn.png" style="margin-left:15px;margin-top:3px;"></a>
					</div>			
					<div class="span-16 last">
						<form name='search' action=<?php echo site_url('_teacher/officer_list/');?> method='post'>
							<div class="span-1" style="color:#EEF4D8;">.</div>
							<div class="span-1 hr_searchby" style="margin-top:5px;">ရွာရန္</div>
							<div class="span-5">
								<select class="searchbox1"   id="mycmb"  onchange="enabledisabletext(this)" name="search_type">
									<option value=" ">ရွာလုိေသာအမ်ိဳးအစားေရြးရန္</option>
									<option value="t_name">အမည္</option>
									<option value="t_nrc">မွတ္ပုံတင္အမွတ္</option>
									<option value="t_depeartment">ဌာန</option>
									<option value="t_promotion">ရာထူး</option>
								</select>
							</div>
							<div class="span-6 last">
								<div class="span-4">
									<input type="text"  name="t_name"  class="hiddenField searchbox1"  id="t_name"   placeholder="အမည္ ရုိက္ထည့္ပါ။" style="margin-top:6px;margin-left:-15px;" >
									<input type="text"  name="t_nrc"  class="hiddenField searchbox1"  id="t_nrc"  placeholder="မွတ္ပံုတင္အမွတ္ ရုိက္ထည့္ပါ။"   style="margin-top:6px;margin-left:-15px;">
									<input type="text"  name="t_depeartment"  class="hiddenField searchbox1"  id="t_depeartment" placeholder="ဌာန ရုိက္ထည့္ပါ။"   style="margin-top:6px;margin-left:-15px;">
									<input type="text"  name="t_promotion"  class="hiddenField searchbox1"  id="t_promotion" placeholder="ရာထူး ရုိက္ထည့္ပါ။"   style="margin-top:6px;margin-left:-15px;">
								</div>
								<div class="span-1 last" style="margin-top:4px;"><input type="submit" name="search"  class="search" value=""  id="search_btn"   disabled="disabled "></div>
							</div>
						</form>
					</div>
					<br/><br/><br/>
					<div class="span-18 prepend-top">
						<?php echo $table; ?>
					</div>
					
					<div class="span-24 table-bg" style="margin-left:8px;"></div>
					<!-- Pager Start -->
					<div class = "span-20 pull-1 last"></div>	
					<div><?php echo $pagination; ?></div>
					<!-- Pager End -->				
				</div>
			</div>
		</div>