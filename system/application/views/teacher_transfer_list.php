
				<div class="span-18 last right_panel">
					<div class="span-14 subtable_title"><h5 style="color:#2b7108;margin-left:145px;">ေျပာင္းေရြ႕ ၀န္ထမ္းမ်ားစာရင္း </h5></div><br/>					
					<table class="staff_table">
						<tr class="staff_header">
							<th>စဥ္</th>
												<th>အမည္</th>
												<th>ဌာန</th>
												<th>ေျပာင္းေရႊ႕ ရာထူး</th>
												<th>ေျပာင္းေရႊ႕ တကၠသိုလ္</th>
												<th>အေသးစိတ္ၾကည့္ရန္</th>
												<th>ေျပာင္းေရႊ႕ရန္</th>
												<th  class="border-right">ျပင္ရန္</th>
						</tr>
							<?php 
							$this->load->library('multi_function');
									if($this->uri->segment(3)==""){$i=0;}
						if($this->uri->segment(3)!=""){$i=$this->uri->segment(3);}
																														
							 foreach ($officer->result() as $row)
							{
						?>
								<tr>
							<td><?php echo $this->multi_function->myanmar_number(++$i)."။"; ?></td>
							<td><?php 		$tid=$row->t_id; 		?>
							<?php					$this->db->select('*');
								$this->db->from('transfer_teacher_tbl');
								$this->db->join('teacher_personal_tbl', 'transfer_teacher_tbl.t_id= teacher_personal_tbl.t_id');
								$this->db->where('transfer_teacher_tbl.t_id', $tid);
								$q = $this->db->get();
								 if ($q->num_rows() !="") {
								 	$row = $q->row();
								 	echo $row->t_name;
								 }				 ?>
							
					</td>	
								<td><?php   echo $row->pre_department; ?></td>		
								<td><?php   echo $row->prev_promotion; ?></td>	
								<td><?php   $tra_u_id= $row->tran_u_id; 
								
									$this->db->select('*');
								$this->db->from('transfer_teacher_tbl');
								$this->db->join('university_tbl', 'transfer_teacher_tbl.tran_u_id=university_tbl.u_id');
								$this->db->where('university_tbl.u_id', $tra_u_id);
								$q = $this->db->get();
								 if ($q->num_rows() !="") {
								 	$row = $q->row();
								 	echo $row->u_name;
								 }	
								
								
								
								
								?></td>	
								
								
										
									
											
											
								
								<td><?php echo anchor('off_biography/officer_biography_show/'.$row->t_id,'အေသးစိတ္ၾကည့္ရန္'); ?></td>	
								<td><?php echo  	anchor('_teacher/officer_transfer/'.$row->t_id,'ေျပာင္းေရႊ႕ရန္'); ?></td>	
								<td><?php echo 	anchor('off_biography/edit_officer_biography/'.$row->t_id,'ျပင္ရန္');  ?></td>	
									
													
							
						</tr>
						<?php						
						 		//$i++;
							}
						 ?>				
				
					
	
					</table>

				<?php echo $this->pagination->create_links(); ?> 
				</div>
			<div class='span-24 pull-4' > 
		</div>					

