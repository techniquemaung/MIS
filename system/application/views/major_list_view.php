				<div class="span-18 last right_panel">

					<div class="span-14 subtable_title"><h5 style="color:#2b7108;margin-left:145px;">အထူးျပဳဘာသာရပ္ ေပါင္းခ်ဳပ္</h5></div><br/>
					<table class="span-17 staff_table">
						<tr class="staff_header">
							<td>စဥ္</td>
							<td>အထူးျပဳ</td>
							<td colspan="2">ရုိးရုိးဘြဲ႔</td>
							<td colspan="2">ဂုဏ္ထူးတန္း</td>
							<td colspan="2">မဟာဘြဲ႔</td>
							<td colspan="2">မဟာသုေတသန</td>
							<td colspan="2">ဌာနမွဴး</td>
								<td colspan="2">ျပင္ရန္</td>
									<td colspan="2">ဖ်က္ရန္</td>
						</tr>
						<?php 
							$this->db->select('*');
							$this->db->from('major_tbl');
							$this->db->where('u_id',$u_id);
							$query = $this->db->get(); 	
							$a=0;
							foreach($query->result() as $row):			?>
						<tr>
							<td><?php echo $this->multi_function->myanmar_number(++$a); ?></td>
							<td><?php echo $row->major; ?></td>
					
							<td colspan="2"><?php echo $row->class_bachelar; ?> ႏွစ္</td>
							<td colspan="2"><?php echo $row->class_honus; ?> ႏွစ္</td>
							<td colspan="2"><?php echo $row->class_master; ?> ႏွစ္</td>
							<td colspan="2"><?php echo $row->class_phd; ?> ႏွစ္</td>
							<td colspan="2"><?php echo $row->class_head; ?> </td>
							<td colspan="2">
						<?php echo anchor('major/edit_major_list'.'/'. $row->major_id.'/','	ျပင္ရန္');?>	
						</td>
							<td colspan="2">
						<?php echo	anchor('major/major_delete/'.$row->major_id,'ဖ်က္ရန္',
							array('onClick' => "return confirm('ဤအထူးျပဳဘာသာရပ္အား ဖ်က္ရန္ ေသခ်ာပါသလား ?')"))	;?>	
						</td>
						</tr>
				
			<?php endforeach; ?>
					
					
					</table>
			</div>