		
			<div class="span-18 last">
				<div class="span-18" style="color:#E09100;font-size:14px;text-align:left;">(ဤေနရာတြင္ သတင္းမ်ားကုိ အေသးစိတ္ ၾကည့္ရႈျပင္ဆင္ႏုိင္ပါသည္။)</div>
				<hr class="space">
			<table border="1">
				<tr>
					<td>စဥ္</td>
					<td>ေခါင္းစဥ္</td>
					<td></td>
					<td></td>
				</tr>
						<?php 						
							if($this->uri->segment(3)==""){$i=0;}
							if($this->uri->segment(3)!=""){$i=$this->uri->segment(3);}
							foreach($posts->result() as $row):							
						?>
				<tr>
					<td><?php echo $this->multi_function->myanmar_number(++$i);?></td>
					<td><?php echo anchor('announcement/announcement_show/'.$row->announce_id,$row->announce_title);?></td>
					<td><?php echo anchor('announcement/announcement_edit/'.$row->announce_id,'ျပင္ရန္');?></td>
					<td><?php echo anchor('announcement/delete_announcement_post/'.$row->announce_id.'/','ဖ်က္ရန္',
												array('onClick' => "return confirm('ယခု သတင္းစာမ်က္ႏွာအား ဖ်က္ရန္ ေသခ်ာပါသလား ?')")); ?></td>
				</tr>
				<?php
					//$i++;
					endforeach;
				?>
			</table>
			<div class="span-18" style="text-align:center;"><?php echo $this->pagination->create_links(); ?> </div>
			</div>
			