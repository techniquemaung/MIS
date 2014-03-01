				<div class="span-18 last right_panel">

					<div class="span-14 subtable_title"><h5 style="color:#2b7108;margin-left:145px;">ဝန္ထမ္းမ်ား၏ ရာထူးမ်ား ေပါင္းခ်ဳပ္</h5></div><br/>
					<table class="span-17 staff_table">
						<tr class="staff_header">
							<td>စဥ္</td>
							<td>ရာထူးအမည္</td>
							<td colspan="2">ဝန္ထမ္းဦးေရ</td>
							<td colspan="2">ျပင္ရန္</td>
							<td colspan="2">ဖ်က္ရန္</td>
						</tr>
						<?php 
							$this->db->select('*');
							$this->db->from('position_tbl');
							$this->db->where('u_id',$u_id);
							$query = $this->db->get(); 	
							$a=0;
							foreach($query->result() as $row):			
					?>
						<tr>
							<td><?php echo $this->multi_function->myanmar_number(++$a); ?></td>
							<td><?php echo $row->position_name; ?></td>
							<td colspan="2"><?php echo $row->position_count; ?> </td>
							<td colspan="2">
						<?php echo anchor('position/edit_position_list'.'/'. $row->position_id.'/','	ျပင္ရန္');?>	
						</td>
							<td colspan="2">
						<?php echo	anchor('position/position_delete/'.$row->position_id,'ဖ်က္ရန္',
							array('onClick' => "return confirm('ဤ ရာထူးအမည္အား ဖ်က္ရန္ ေသခ်ာပါသလား ?')"))	;?>	
						</td>
						</tr>
				
			<?php endforeach; ?>
					
					
					</table>		
				</div>		
	