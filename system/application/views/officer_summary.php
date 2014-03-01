				<div class="span-18 last right_panel">

					<div class="span-14 subtable_title"><h5 style="color:#2b7108;margin-left:145px;">  ဖြဲ႔စည္းပုံအရ ၀န္ထမ္းခန္႔ထားမႈအေျခအေန</h5></div><br/>
					<table class="staff_table">
						<tr class="staff_header">
							<td>စဥ္</td>
							<td>ရာထူးအမည္</td>
							<td colspan="3">ခန္႔ထားဦးေရ</td>
							<td>မွတ္ခ်က္</td>
						</tr>
						<tr>
							<td style="color:#E4E6CF;"> .</td>
							<td style="color:#E4E6CF;"> .</td>
							<td>က်ား</td>
							<td>မ</td>
							<td>ေပါင္း</td>
							<td>-</td>
						</tr>
				
						
							<?php 
								 $this->db->select('Distinct(t_promotion)');
								// $aa= $this->db->select('Count(Distinct(t_depeartment)');
								$this->db->from('teacher_personal_tbl');
								$this->db->where('u_id',$u_id);
								
								$this->db->order_by("teacher_personal_tbl.t_id","desc"); 
								$query1 = $this->db->get();
								
								$i=0;
								foreach($query1->result() as $row1){?>
						
						
							<tr>
							<td><?php echo $this->multi_function->myanmar_number(++$i);?></td>
							<td><?php echo $row1->t_promotion; ?></td>
							<td>
								<?php 							
								$this->db->select('count(t_promotion) as c_gender');
								$this->db->from('teacher_personal_tbl');
								$this->db->where('t_gender','က်ား');
								$this->db->where('t_promotion',$row1->t_promotion);
								$query2 = $this->db->get();	
								foreach ($query2->result() as $row2){?>
							
							<?php echo  $this->multi_function->myanmar_number($row2->c_gender); } ?>
							
							
							</td>	
							<td>
							<?php 							
								$this->db->select('count(t_promotion) as c_gender');
								$this->db->from('teacher_personal_tbl');
								$this->db->where('t_gender','မ');
							$this->db->where('t_promotion',$row1->t_promotion);
							$query3 = $this->db->get();								
							foreach ($query3->result() as $row3){?>
							
							<?php echo  $this->multi_function->myanmar_number($row3->c_gender); } ?>		
								</td>
								
								<td> 	<?php echo  $this->multi_function->myanmar_number($row2->c_gender+$row3->c_gender); ?>	</td>
								<td>-</td>	
						</tr>
						
							<?php 
								
								}
					?>
						
						</table>

					
				</div>
			

