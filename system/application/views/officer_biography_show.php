<?php
	$t_valid_id = $this->uri->segment(3);
	$this->db->select('*');
	$this->db->from('teacher_personal_tbl');
	$this->db->where('t_id',$t_valid_id);
	//$this->db->where('u_id',$u_id);
	$query = $this->db->get();
	foreach($query->result() as $row):
?>

<div class="span-24">
<h4
	style="color: #2b7108; margin-top: -10px; font-size: 14px; margin-left: -50px;">ဝန္ထမ္းမ်ား၏ ကုိယ္ေရးအခ်က္အလက္</h4>
<br />
<div id="vertical_container" style="margin-top: -18px;"><!-- 1 start-->
<h1 class="accordion_toggle accordion_toggle_active">ကုိယ္ေရးအခ်က္အလက္</h1>
<div class=" span-24 accordion_content"
	style="height: auto; display: block;">
<div class="span-13 push-1 prepend-top">

<div class="span-13">
<div class="span-1 personal-data">၁။</div>
<div class="span-4  personal-data">အမည္</div>
<div class="span-1 personal-data">-</div>
<div class="span-7 last personal-data"><?php echo $row->t_name; ?></div>
</div>

<div class="span-13">
<div class="span-1 personal-data">၂။</div>
<div class="span-4  personal-data">ငယ္အမည္</div>
<div class="span-1 personal-data">-</div>
<div class="span-7 last personal-data"><?php echo $row->t_alias_name; ?></div>
</div>

<div class="span-13">
<div class="span-1 personal-data">၃။</div>
<div class="span-4  personal-data">အျခားအမည္မ်ား (ရွိလွ်င္)</div>
<div class="span-1 personal-data">-</div>
<div class="span-7 last personal-data"><?php echo $row->t_other_name; ?></div>
</div>

<div class="span-13">
<div class="span-1 personal-data">၄။</div>
<div class="span-4  personal-data">အသက္ (ေမြးေန႔သကၠရာဇ္)</div>
<div class="span-1 personal-data">-</div>
<div class="span-7 personal-data last">
	<?php echo $row->t_age; ?>&nbsp;ႏွစ္&nbsp;&nbsp;
	(&nbsp;<?php echo $this->multi_function->myanmar_number($row->t_birth_day); ?>/
	<?php echo $this->multi_function->month_myanmar_number1($row->t_birth_month); ?>/
	<?php echo $this->multi_function->myanmar_number($row->t_birth_year); ?>&nbsp;)
</div>
</div>

<div class="span-13">
<div class="span-1 personal-data">၅။</div>
<div class="span-4  personal-data">ေမြးဖြားရာဇာတိ</div>
<div class="span-1 personal-data">-</div>
<div class="span-7 last personal-data"><?php echo $row->t_native_town; ?></div>
</div>

<div class="span-13">
<div class="span-1 personal-data">၆။</div>
<div class="span-4  personal-data">က်ား / မ</div>
<div class="span-1 personal-data">-</div>
<div class="span-7 last personal-data"><?php echo $row->t_gender; ?></div>
</div>

<div class="span-13">
<div class="span-1 personal-data">၇။</div>
<div class="span-4  personal-data">ကုိးကြယ္သည့္ဘာသာ</div>
<div class="span-1 personal-data">-</div>
<div class="span-7 personal-data last"><?php echo $row->t_religious; ?></div>
</div>

<div class="span-13">
<div class="span-1 personal-data">၈။</div>
<div class="span-4  personal-data">လူမ်ဴိး</div>
<div class="span-1 personal-data">-</div>
<div class="span-7 personal-data last"><?php echo $row->t_race; ?></div>
</div>

<div class="span-13">
<div class="span-1 personal-data">၉။</div>
<div class="span-4  personal-data">အမ်ိဳးသားမွတ္ပုံတင္အမွတ္</div>
<div class="span-1 personal-data">-</div>
<div class="span-7 personal-data last"><?php echo $row->t_nrc; ?></div>
</div>

<div class="span-13">
<div class="span-1 personal-data">၁၀။</div>
<div class="span-4  personal-data">အရပ္</div>
<div class="span-1 personal-data">-</div>
<div class="span-7 last personal-data"><?php echo $row->t_height; ?></div>
</div>

<div class="span-13">
<div class="span-1 personal-data">၁၁။</div>
<div class="span-4  personal-data">ကုိယ္အေလးခ်ိန္</div>
<div class="span-1 personal-data">-</div>
<div class="span-7 personal-data last"><?php echo $row->t_weight; ?></div>
</div>

<div class="span-13">
<div class="span-1 personal-data">၁၂။</div>
<div class="span-4  personal-data">ဆံပင္အေရာင္</div>
<div class="span-1 personal-data">-</div>
<div class="span-7 personal-data last"><?php echo $row->t_hair_color; ?></div>
</div>

<div class="span-13">
<div class="span-1 personal-data">၁၃။</div>
<div class="span-4  personal-data">မ်က္စိအေရာင္</div>
<div class="span-1 personal-data">-</div>
<div class="span-7 personal-data last"><?php echo $row->t_eyes_color; ?></div>
</div>

<div class="span-13">
<div class="span-1 personal-data">၁၄။</div>
<div class="span-4  personal-data">ထင္ရွားသည့္အမွတ္အသား</div>
<div class="span-1 personal-data">-</div>
<div class="span-7 last personal-data"><?php echo $row->t_unique_sign; ?></div>
</div>

<div class="span-13">
<div class="span-1 personal-data">၁၅။</div>
<div class="span-4  personal-data">ပါရဂူသင္တန္း တက္ေရာက္ျခင္းရွိမရွိ</div>
<div class="span-1 personal-data">-</div>
<div class="span-7 personal-data last"><?php echo $row->t_phd_attend; ?>&nbsp;(&nbsp;အတန္း&nbsp;-&nbsp;<?php echo $row->t_phd_attend_level; ?>&nbsp;)</div>
</div>

<div class="span-13">
<div class="span-1 personal-data">၁၆။</div>
<div class="span-4  personal-data">ရာထူး</div>
<div class="span-1 personal-data">-</div>
<div class="span-7 personal-data last"><?php echo $row->t_nation_foreign; ?>&nbsp;&nbsp;<?php echo $row->t_promotion; ?></div>
</div>

<div class="span-13">
<div class="span-1 personal-data">၁၇။</div>
<div class="span-4  personal-data">ဌာန</div>
<div class="span-1 personal-data">-</div>
<div class="span-7 personal-data last"><?php echo $row->t_depeartment; ?></div>
</div>

<div class="span-13">
<div class="span-1 personal-data">၁၈။</div>
<div class="span-4  personal-data">ေနာက္ဆံုးရရွိခဲ့သည့္ဘြဲ႕</div>
<div class="span-1 personal-data">-</div>
<div class="span-7 personal-data last"><?php echo $row->t_degree; ?></div>
</div>

<div class="span-13">
<div class="span-1 personal-data">၁၉။</div>
<div class="span-4  personal-data">အထူးျပဳဘာသာရပ္</div>
<div class="span-1 personal-data">-</div>
<div class="span-7 personal-data last"><?php echo $row->t_major; ?></div>
</div>

<div class="span-13">
<div class="span-1 personal-data">၂၀။</div>
<div class="span-4  personal-data">အမႈထမ္းသက္ ၀င္ေရာက္သည့္ေန႔စြဲ</div>
<div class="span-1 personal-data">-</div>
<div class="span-4 personal-data last">
	<?php echo $this->multi_function->myanmar_number($row->personnel_day); ?>/
	<?php echo $this->multi_function->month_myanmar_number1($row->personnel_month); ?>/
	<?php echo $this->multi_function->myanmar_number($row->personnel_year); ?>
</div>
</div>

<div class="span-13">
<div class="span-1 personal-data">၂၁။</div>
<div class="span-4  personal-data">လက္ရွိေနရပ္လိပ္စာ</div>
<div class="span-1 personal-data">-</div>
<div class="span-4 personal-data last"><?php echo $row->t_current_address; ?></div>
</div>

<div class="span-13">
<div class="span-1 personal-data">၂၂။</div>
<div class="span-4  personal-data">အၿမဲတမ္းေနရပ္လိပ္စာ</div>
<div class="span-1 personal-data">-</div>
<div class="span-4 personal-data last"><?php echo $row->t_permanent_address; ?></div>
</div>
<hr class="space">
</div>
<?php endforeach;?>

<div class="span-3 prepend-top photo push-7 last">
<div class="span-3"><img	src="<?php echo base_url()?>system/application/teacher_photos/<?php echo $row->t_photo_location;?>" width="110px" height="120px""></div>
</div>
</div>
<hr class="space">
<!-- 1 End--> <!-- 2 start-->
<?php 
	$this->db->select('*');
	$this->db->from('teacher_qualify_tbl');
	$this->db->where('t_id',$t_valid_id);
	$this->db->where('u_id',$u_id);
	$query1 = $this->db->get();
	foreach($query1->result() as $row1):
?>

<h1 class=" personal_form_text accordion_toggle accordion_toggle_active" style="font-size: 1.2em;">ပညာအရည္အခ်င္း</h1>
<div class="accordion_content">
<div class="span-13 push-1 prepend-top">

<table class="staff_table">
	<tr class="staff_header">
		<td>ပညာအရည္အခ်င္း</td>
		<td>ဘြဲ႔အမည္</td>
		<td>အထူးျပဳဘာသာ</td>
		<td>ရရွိသည့္ခုႏွစ္</td>
		<td>ရရွိသည့္အဆင့္</td>
	</tr>
	<tr>
		<td>(က) ပထမဘြဲ႕</td>
		<td><?php echo $row1->t_degree1; ?></td>
		<td><?php echo $row1->t_major1; ?></td>
		<td><?php echo $row1->t_year1; ?></td>
		<td><?php echo $row1->t_grade1; ?></td>
	</tr>
	<tr>
		<td>(ခ) ဘြဲ႕လြန္ဘြဲ႕</td>
		<td><?php echo $row1->t_degree2; ?></td>
		<td><?php echo $row1->t_major2; ?></td>
		<td><?php echo $row1->t_year2; ?></td>
		<td><?php echo $row1->t_grade2; ?></td>
	</tr>
	<tr>
		<td>(ဂ) ဘြဲ႕လြန္ဒီပလုိမာ</td>
		<td><?php echo $row1->t_degree3; ?></td>
		<td><?php echo $row1->t_major3; ?></td>
		<td><?php echo $row1->t_year3; ?></td>
		<td><?php echo $row1->t_grade3; ?></td>
	</tr>
	<tr>
		<td>(ဃ) မဟာဘြဲ႕</td>
		<td><?php echo $row1->t_degree4; ?></td>
		<td><?php echo $row1->t_major4; ?></td>
		<td><?php echo $row1->t_year4; ?></td>
		<td><?php echo $row1->t_grade4; ?></td>
	</tr>
</table>
<?php endforeach;?>
<hr class="space">
</div>
</div>
<hr class="space">
<!-- 2 End--> <!-- Added jquery--> <!--3 start-->

<h1 class=" personal_form_text accordion_toggle accordion_toggle_active" style="font-size: 1.2em;">တက္္ေရာက္ခဲ့ဖူးေသာ ေက်ာင္း/ သင္တန္းမ်ား</h1>
<div class="accordion_content" id="horizontal_container">
<div class="span-13 push-1 prepend-top">
<table class="staff_table">
	<tr class="staff_header">
		<td>ကာလ (မွ-ထိ)</td>
		<td>ေက်ာင္း၊ တကၠသုိလ္ အလုပ္ဌာန၊ သင္တန္း</td>
		<td>တည္ရာအရပ္</td>
		<td>အဆင့္အတန္း</td>
	</tr>
	<?php 
		$this->db->select('*');
		$this->db->from('teacher_course_tbl');
		$this->db->where('t_id',$t_valid_id);
		$this->db->where('u_id',$u_id);
		$query2 = $this->db->get();
		foreach($query2->result() as $row2):
	?>
	<tr>
		<td><?php echo $row2->t_start_end_date; ?></td>
		<td><?php echo $row2->t_course; ?></td>
		<td><?php echo $row2->t_course_location; ?></td>
		<td><?php echo $row2->t_course_grade; ?></td>
	</tr>
	<?php endforeach;?>
</table>

<hr class="space">
</div>
</div>
<hr class="space">
<!-- 3 End--> <!-- 4 start-->

<h1 class=" personal_form_text accordion_toggle accordion_toggle_active" style="font-size: 1.2em;">ႏုိင္ငံျခားေရာက္ဖူးျခင္း ရွိ - မရွိ</h1>
<div class="accordion_content">
<div class="span-13 push-1 prepend-top">

<table class="staff_table">
	<tr class="staff_header">
		<td>ကာလ (မွ-ထိ)</td>
		<td>သြားေရာက္သည့္ ႏုိင္ငံမ်ား</td>
		<td>သြားေရာက္သည့္ ကိစၥ</td>
		<td>ႏုိင္ငံျခားေငြ မည္မွ်ထုတ္ယူခဲ့သည္</td>
	</tr>
	<?php 
		$this->db->select('*');
		$this->db->from('teacher_abroad_tbl');
		$this->db->where('t_id',$t_valid_id);
		$this->db->where('u_id',$u_id);
		$query3 = $this->db->get();
		foreach($query3->result() as $row3):
	?>
	<tr>
		<td><?php echo $row3->t_start_end_period; ?></td>
		<td><?php echo $row3->t_country; ?></td>
		<td><?php echo $row3->t_case; ?></td>
		<td><?php echo $row3->t_cost; ?></td>
	</tr>
	<?php endforeach;?>
</table>

<hr class="space">
</div>
</div>
<hr class="space">
<!-- 4 End--> <!-- 5 start -->

<h1 class=" personal_form_text accordion_toggle accordion_toggle_active" style="font-size: 1.2em;">ႏုိင္ငံျခားသုိ႔သြားေရာက္မည့္ ပုဂိၢဳလ္၏ အဘႏွင့္ အဘ၏ ေမာင္ႏွမအရင္းအခ်ာမ်ား</h1>
<div class="accordion_content">
<div class="span-13 push-1 prepend-top">

<table class="staff_table">
	<tr class="staff_header">
		<td>အမည္</td>
		<td>ေတာ္စပ္ပုံ</td>
		<td>က်ား/မ</td>
		<td>မည္သည့္ႏုိင္ငံသား</td>
		<td>အလုပ္အကုိင္</td>
		<td>ေနရပ္</td>
		<td>မွတ္ခ်က္</td>
	</tr>
	<?php 
		$this->db->select('*');
		$this->db->from('teacher_father_tbl');
		$this->db->where('t_id',$t_valid_id);
		$this->db->where('u_id',$u_id);
		$query4 = $this->db->get();
		foreach($query4->result() as $row4):
	?>
	<tr>
		<td><?php echo $row4->t_father_name; ?></td>
		<td><?php echo $row4->t_father_related; ?></td>
		<td><?php echo $row4->t_father_gender; ?></td>
		<td><?php echo $row4->t_father_citizen; ?></td>
		<td><?php echo $row4->t_father_job; ?></td>
		<td><?php echo $row4->t_father_address; ?></td>
		<td><?php echo $row4->t_father_remark; ?></td>
	</tr>
	<?php endforeach;?>
</table>

<hr class="space">

</div>
</div>
<hr class="space">
<!-- 5 End--> <!-- 6 start-->

<h1 class=" personal_form_text accordion_toggle accordion_toggle_active" style="font-size: 1.2em;">ႏုိင္ငံျခားသုိ႔သြားေရာက္မည့္ ပုဂၢိဳလ္၏ အမိႏွင့္ အမိ၏ ေမာင္ႏွမအရင္းအခ်ာမ်ား</h1>
<div class="accordion_content">
<div class="span-13 push-1 prepend-top">

<table class="staff_table">
	<tr class="staff_header">
		<td>အမည္</td>
		<td>ေတာ္စပ္ပုံ</td>
		<td>က်ား/မ</td>
		<td>မည္သည့္ႏုိင္ငံသား</td>
		<td>အလုပ္အကုိင္</td>
		<td>ေနရပ္</td>
		<td>မွတ္ခ်က္</td>
	</tr>
	<?php 
		$this->db->select('*');
		$this->db->from('teacher_mother_tbl');
		$this->db->where('t_id',$t_valid_id);
		$this->db->where('u_id',$u_id);
		$query5 = $this->db->get();
		foreach($query5->result() as $row5):
	?>
	<tr>
		<td><?php echo $row5->t_mother_name; ?></td>
		<td><?php echo $row5->t_mother_related; ?></td>
		<td><?php echo $row5->t_mother_gender; ?></td>
		<td><?php echo $row5->t_mother_citizen; ?></td>
		<td><?php echo $row5->t_mother_job; ?></td>
		<td><?php echo $row5->t_mother_address; ?></td>
		<td><?php echo $row5->t_mother_remark; ?></td>
	</tr>
	<?php endforeach;?>
</table>

<hr class="space">
</div>
</div>
<hr class="space">
<!-- 6 End--> <!-- 7 start-->

<h1 class=" personal_form_text accordion_toggle accordion_toggle_active"	style="font-size: 1.2em;">ႏုိင္ငံျခားသုိ႔သြားေရာက္မည့္ ပုဂိၢဳလ္၏ေမာင္ႏွမအရင္းအခ်ာမ်ား</h1>
<div class="accordion_content">
<div class="span-13 push-1 prepend-top">

<table class="staff_table">
	<tr class="staff_header">
		<td>အမည္</td>
		<td>ေတာ္စပ္ပုံ</td>
		<td>က်ား/မ</td>
		<td>မည္သည့္ႏုိင္ငံသား</td>
		<td>အလုပ္အကုိင္</td>
		<td>ေနရပ္</td>
		<td>မွတ္ခ်က္</td>
	</tr>
	<?php 
		$this->db->select('*');
		$this->db->from('teacher_cousin_tbl');
		$this->db->where('t_id',$t_valid_id);
		$this->db->where('u_id',$u_id);
		$query6 = $this->db->get();
		foreach($query6->result() as $row6):
	?>
	<tr>
		<td><?php echo $row6->t_cousin_name; ?></td>
		<td><?php echo $row6->t_cousin_related; ?></td>
		<td><?php echo $row6->t_cousin_gender; ?></td>
		<td><?php echo $row6->t_cousin_citizen; ?></td>
		<td><?php echo $row6->t_cousin_job; ?></td>
		<td><?php echo $row6->t_cousin_address; ?></td>
		<td><?php echo $row6->t_cousin_remark; ?></td>
	</tr>
	<?php endforeach;?>
</table>

<hr class="space">

</div>
</div>
<hr class="space">
<!--7  End--> <!-- 8 start-->

<h1 class=" personal_form_text accordion_toggle accordion_toggle_active"	style="font-size: 1.2em;">ဇနီး / ခင္ပြန္းႏွင့္ ၎၏ ေမာင္ႏွမအရင္းအခ်ာမ်ား</h1>
<div class="accordion_content">
<div class="span-13 push-1 prepend-top">

<table class="staff_table">
	<tr class="staff_header">
		<td>အမည္</td>
		<td>ေတာ္စပ္ပုံ</td>
		<td>က်ား/မ</td>
		<td>မည္သည့္ႏုိင္ငံသား</td>
		<td>အလုပ္အကုိင္</td>
		<td>ေနရပ္</td>
		<td>မွတ္ခ်က္</td>
	</tr>
	<?php 
		$this->db->select('*');
		$this->db->from('teacher_partner_tbl');
		$this->db->where('t_id',$t_valid_id);
		$this->db->where('u_id',$u_id);
		$query7 = $this->db->get();
		foreach($query7->result() as $row7):
	?>
	<tr>
		<td><?php echo $row7->t_partner_name; ?></td>
		<td><?php echo $row7->t_partner_related; ?></td>
		<td><?php echo $row7->t_partner_gender; ?></td>
		<td><?php echo $row7->t_partner_citizen; ?></td>
		<td><?php echo $row7->t_partner_job; ?></td>
		<td><?php echo $row7->t_partner_address; ?></td>
		<td><?php echo $row7->t_partner_remark; ?></td>
	</tr>
	<?php endforeach;?>
</table>

<hr class="space">

</div>
</div>
<hr class="space">
<!-- 8 End--> <!-- 9 start-->

<h1 class=" personal_form_text accordion_toggle accordion_toggle_active" style="font-size: 1.2em;">ဇနီး / ခင္ပြန္း၏ အဘႏွင့္ ေမာင္ႏွမအရင္းအခ်ာမ်ား</h1>
<div class="accordion_content">
<div class="span-13 push-1 prepend-top">

<table class="staff_table">
	<tr class="staff_header">
		<td>အမည္</td>
		<td>ေတာ္စပ္ပုံ</td>
		<td>က်ား/မ</td>
		<td>မည္သည့္ႏုိင္ငံသား</td>
		<td>အလုပ္အကုိင္</td>
		<td>ေနရပ္</td>
		<td>မွတ္ခ်က္</td>
	</tr>
	<?php 
		$this->db->select('*');
		$this->db->from('teacher_partner_father_tbl');
		$this->db->where('t_id',$t_valid_id);
		$this->db->where('u_id',$u_id);
		$query8 = $this->db->get();
		foreach($query8->result() as $row8):
	?>
	<tr>
		<td><?php echo $row8->t_partner_father_name; ?></td>
		<td><?php echo $row8->t_partner_father_related; ?></td>
		<td><?php echo $row8->t_partner_father_gender; ?></td>
		<td><?php echo $row8->t_partner_father_citizen; ?></td>
		<td><?php echo $row8->t_partner_father_job; ?></td>
		<td><?php echo $row8->t_partner_father_address; ?></td>
		<td><?php echo $row8->t_partner_father_remark; ?></td>
	</tr>
	<?php endforeach;?>
</table>

<hr class="space">

</div>
</div>
<hr class="space">
<!--9 End--> <!-- 10 start -->

<h1 class=" personal_form_text accordion_toggle accordion_toggle_active" style="font-size: 1.2em;">ဇနီး / ခင္ပြန္း၏ အမိႏွင့္ ေမာင္ႏွမအရင္းအခ်ာမ်ား</h1>
<div class="accordion_content">
<div class="span-13 push-1 prepend-top">

<table class="staff_table">
	<tr class="staff_header">
		<td>အမည္</td>
		<td>ေတာ္စပ္ပုံ</td>
		<td>က်ား/မ</td>
		<td>မည္သည့္ႏုိင္ငံသား</td>
		<td>အလုပ္အကုိင္</td>
		<td>ေနရပ္</td>
		<td>မွတ္ခ်က္</td>
	</tr>
	<?php 
		$this->db->select('*');
		$this->db->from('teacher_partner_mother_tbl');
		$this->db->where('t_id',$t_valid_id);
		$this->db->where('u_id',$u_id);
		$query9 = $this->db->get();
		foreach($query9->result() as $row9):
	?>
	<tr>
		<td><?php echo $row9->t_partner_mother_name; ?></td>
		<td><?php echo $row9->t_partner_mother_related; ?></td>
		<td><?php echo $row9->t_partner_mother_gender; ?></td>
		<td><?php echo $row9->t_partner_mother_citizen; ?></td>
		<td><?php echo $row9->t_partner_mother_job; ?></td>
		<td><?php echo $row9->t_partner_mother_address; ?></td>
		<td><?php echo $row9->t_partner_mother_remark; ?></td>
	</tr>
	<?php endforeach;?>
</table>

<hr class="space">

</div>
</div>
<hr class="space">
<!-- 10 End--> <!-- Added jquery--> <!-- 11 start -->
<h1 class=" personal_form_text accordion_toggle accordion_toggle_active" style="font-size: 1.2em;">သား/ သမီးႏွင့္ ၎တုိ႔၏ ဇနီး / ခင္ပြန္း</h1>
<div class="accordion_content">
<div class="span-13 push-1 prepend-top">

<table class="staff_table">
	<tr class="staff_header">
		<td>အမည္</td>
		<td>ေတာ္စပ္ပုံ</td>
		<td>က်ား/မ</td>
		<td>မည္သည့္ႏုိင္ငံသား</td>
		<td>အလုပ္အကုိင္</td>
		<td>ေနရပ္</td>
		<td>မွတ္ခ်က္</td>
	</tr>
	<?php 
		$this->db->select('*');
		$this->db->from('teacher_child_tbl');
		$this->db->where('t_id',$t_valid_id);
		$this->db->where('u_id',$u_id);
		$query10 = $this->db->get();
		foreach($query10->result() as $row10):
	?>
	<tr>
		<td><?php echo $row10->t_child_name; ?></td>
		<td><?php echo $row10->t_child_related; ?></td>
		<td><?php echo $row10->t_child_gender; ?></td>
		<td><?php echo $row10->t_child_citizen; ?></td>
		<td><?php echo $row10->t_child_job; ?></td>
		<td><?php echo $row10->t_child_address; ?></td>
		<td><?php echo $row10->t_child_remark; ?></td>
	</tr>
	<?php endforeach;?>
</table>

<hr class="space">
</div>
</div>
<hr class="space">
<!-- 11 End--> <!-- 12 start-->


<h1 class=" personal_form_text accordion_toggle accordion_toggle_active"  style="font-size: 1.2em;">ႏုိင္ငံျခားတြင္ ေရာက္ရွိေနၾကသည့္ ေဆြမ်ိဳးမ်ား</h1>
<div class="accordion_content" id="horizontal_container">
<div class="span-13 push-1 prepend-top">

<table class="staff_table">
	<tr class="staff_header">
		<td>အမည္</td>
		<td>ေတာ္စပ္ပုံ</td>
		<td>က်ား/မ</td>
		<td>မည္သည့္ႏုိင္ငံသား</td>
		<td>အလုပ္အကုိင္</td>
		<td>ေနရပ္</td>
		<td>မွတ္ခ်က္</td>
	</tr>
	<?php 
		$this->db->select('*');
		$this->db->from('teacher_abroad_family_tbl');
		$this->db->where('t_id',$t_valid_id);
		$this->db->where('u_id',$u_id);
		$query11 = $this->db->get();
		foreach($query11->result() as $row11):
	?>
	<tr>
		<td><?php echo $row11->t_abroad_family_name; ?></td>
		<td><?php echo $row11->t_abroad_family_related; ?></td>
		<td><?php echo $row11->t_abroad_family_citizen; ?></td>
		<td><?php echo $row11->t_abroad_family_job; ?></td>
		<td><?php echo $row11->t_abroad_family_country; ?></td>
		<td><?php echo $row11->t_abroad_family_case; ?></td>
		<td><?php echo $row11->t_abroad_family_coming; ?></td>
	</tr>
	<?php endforeach;?>
</table>

<hr class="space">
</div>
</div>
<hr class="space">
<!-- 12 End--> <!-- 13 start -->
<h1 class=" personal_form_text accordion_toggle accordion_toggle_active" style="font-size: 1.2em;">ဌာနဆုိင္ရာ အေရးယူခံရျခင္း ရွိ / မရွိ</h1>
<div class="accordion_content">
<div class="span-13 push-1 prepend-top">
<table class="staff_table">
	<tr class="staff_header">
		<td>အေရးယူခံရသည့္ကာလ</td>
		<td>အေရးယူခံရသည့္ အေၾကာင္းကိစၥ</td>
		<td>ခ်မွတ္ခံရသည့္ျပစ္ဒဏ္</td>
		<td>မွတ္ခ်က္</td>
	</tr>
	<?php 
		$this->db->select('*');
		$this->db->from('teacher_punish_tbl');
		$this->db->where('t_id',$t_valid_id);
		$this->db->where('u_id',$u_id);
		$query12 = $this->db->get();
		foreach($query12->result() as $row12):
	?>	
	<tr>
		<td><?php echo $row12->t_punish_period; ?></td>
		<td><?php echo $row12->t_punish_case; ?></td>
		<td><?php echo $row12->t_punish_sentence; ?></td>
		<td><?php echo $row12->t_punish_remark; ?></td>
	</tr>
	<?php endforeach;?>
</table>

<hr class="space">
</div>
</div>
<hr class="space">
<!-- 13 End--> <!-- 14 start -->
<h1 class=" personal_form_text accordion_toggle accordion_toggle_active" style="font-size: 1.2em;">တရားရုံးတြင္ တရားစြဲ ခံရဖူးျခင္း ရွိ / မရွိ</h1>
<div class="accordion_content">
<div class="span-13 push-1 prepend-top">

<table class="staff_table">
	<tr class="staff_header">
		<td>တရားစြဲဆုိျခင္း ခံရသည့္ကာလ</td>
		<td>တရားစြဲဆုိျခင္းခံရသည့္ အေၾကာင္းကိစၥႏွင့္ စြဲဆုိခံရသည့္ ဥပေဒပုဒ္မ</td>
		<td>ခ်မွတ္ခံရသည့္ျပစ္ဒဏ္</td>
		<td>မွတ္ခ်က္</td>
	</tr>
<?php 
	$this->db->select('*');
	$this->db->from('teacher_lawsuit_tbl');
	$this->db->where('t_id',$t_valid_id);
	$this->db->where('u_id',$u_id);
	$query13 = $this->db->get();
	foreach($query13->result() as $row13):
?>
	<tr>
		<td><?php echo $row13->t_lawsuit_preiod; ?></td>
		<td><?php echo $row13->t_lawsuit_case; ?></td>
		<td><?php echo $row13->t_lawsuit_sentense; ?></td>
		<td><?php echo $row13->t_lawsuit_remark; ?></td>
	</tr>
<?php endforeach;?>
</table>

<hr class="space">
</div>
</div>
<hr class="space">
<!-- 14 End--> <!-- 15 start -->
<h1 class=" personal_form_text accordion_toggle accordion_toggle_active" style="font-size: 1.2em;">ဘြဲ႔တံဆိပ္ ခ်ီးျမွင့္ခံရျခင္း ရွိ / မရွိ</h1>
<div class="accordion_content">
<div class="span-13 push-1 prepend-top">

<table class="staff_table">
	<tr class="staff_header">
		<td>ခ်ီးျမွင့္ ခံရသည့္ကာလ</td>
		<td>ခ်ီးျမွင့္ခံရသည့္ဘြဲ႔/ တံဆိပ္အမ်ိဳးအစား</td>
		<td>မွတ္ခ်က္</td>
	</tr>
	<?php 
		$this->db->select('*');
		$this->db->from('teacher_honor_tbl');
		$this->db->where('t_id',$t_valid_id);
		$this->db->where('u_id',$u_id);
		$query13 = $this->db->get();
		foreach($query13->result() as $row13):
	?>
	<tr>
		<td><?php echo $row13->t_honor_period; ?></td>
		<td><?php echo $row13->t_honor_degree; ?></td>
		<td><?php echo $row13->t_honor_remark; ?></td>
	</tr>
	<?php endforeach;?>
</table>
<hr class="space">

</div>
</div>
<hr class="space">
<!--15 End--> <!-- 16 start -->
<h1 class=" personal_form_text accordion_toggle accordion_toggle_active"
	style="font-size: 1.2em;">ႏုိင္ငံျခားသုိ႔ သြားေရာက္မည့္ ကိစၥ</h1>
<div class="accordion_content" id="vertical_nested_container">
<div class="span-13 push-1 prepend-top">

<table class="staff_table">
	<tr class="staff_header">
		<td>သင္ၾကားမည့္ ဘာသာရပ္ႏွင့္ အဆင့္/ တက္ေရာက္မည့္ သင္တန္း/ သုိ႔မဟုတ္ အျခားကိစၥ</td>
		<td>ေစလြတ္သည့္ႏုိင္ငံ</td>
		<td>အခ်ိန္ကာလ</td>
		<td>ႏုိင္ငံျခားသုိ႔ ေရာက္ရမည့္ေန႔</td>
		<td>မည္သည့္အစုိးရအဖြဲ႔အစည္း အေထာက္အပံ့</td>
		<td>ျပန္လည္ ေရာက္ရွိလွ်င္ အမႈထမ္းမည့္ ဌာန/ တာ၀န္</td>
	</tr>
	<?php 
	$this->db->select('*');
	$this->db->from('teacher_abroad_case_tbl');
	$this->db->where('t_id',$t_valid_id);
	$this->db->where('u_id',$u_id);
	$query14 = $this->db->get();
	foreach($query14->result() as $row14):
?>
	<tr>
		<td><?php echo $row14->t_abroad_course; ?></td>
		<td><?php echo $row14->t_country; ?></td>
		<td><?php echo $row14->t_period; ?></td>
		<td><?php echo $row14->t_arrive_date; ?></td>
		<td><?php echo $row14->t_gov_grant; ?></td>
		<td><?php echo $row14->t_re_department; ?></td>
	</tr>
<?php endforeach;?>
</table>
<hr class="space">

</div>
</div>
<hr class="space">
<!-- 16 End--></div>

	<div class="span-4 push-5"><a href="<?=base_url()?>index.php/off_biography/edit_officer_biography/<?php echo $t_valid_id;?>"><input type="submit" name="Add" value="ျပင္မည့္စာမ်က္ႏွာသုိ႔" class="btn_3" ></a></div>
	<div class="span-4 push-6"><a href="<?php echo base_url()?>index.php/_teacher/officer_list "><input type="submit" name="Add" value="ဝန္ထမ္းမ်ားစာရင္းသို႔" class="btn_3" ></a></div>
	<div class="span-3 push-7"><a href="<?php echo base_url()?>index.php/off_biography/pre_officer_biography "><input type="submit" name="Add" value="ကုိယ္ေရးရာဇဝင္ျဖည့္ရန္" class="btn_3"style="margin-left:14px;" ></a></div>


<!-- accoridian jquery end--></div>
