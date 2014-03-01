				<div class="span-18 last right_panel">

					<div class="span-14 subtable_title"><h5 style="color:#2b7108;margin-left:145px;">ပါရဂူသင္တန္းတတ္္ဆရာ/မမ်ားစာရင္း</h5></div><br/>
					<table class="staff_table">
						<tr class="staff_header">
							<td>စဥ္</td>
							<td>ဘာသာရပ္</td>
							<td>ႀကိဳ/သု</td>
							<td>၁ ပါ</td>
							<td>၂ ပါ</td>
							<td>၃ ပါ</td>
							<td>၄ ပါ</td>
							<td>စုစုေပါင္း</td>
						</tr>			
						<tr>
						
							<?php 
								 $this->db->select('Distinct(t_major)');
								//$this->db->select('count(t_gender) as c_gender');
								$this->db->from('teacher_personal_tbl');
								$this->db->where('u_id',$u_id);
								$this->db->where('t_phd_attend','ရိွ');
								$this->db->order_by("teacher_personal_tbl.t_id","desc"); 
								$query = $this->db->get();								
								$i=0;
								foreach ($query->result() as $row){
							?>
							<td><?php echo $this->multi_function->myanmar_number(++$i);?></td>						
							<td><?php echo $tt=$row->t_major; ?></td>
							
							<?php 		
								$this->db->select('count(t_gender) as c_gender');
								$this->db->from('teacher_personal_tbl');
								$this->db->where('u_id',$u_id);
								$this->db->where('t_phd_attend','ရိွ');
								$this->db->where('t_phd_attend','ႀကိဳ/သု');
								$this->db->where('t_major',$tt);
								$this->db->order_by("teacher_personal_tbl.t_id","desc"); 
								$query3 = $this->db->get();							
								foreach ($query3->result() as $row3){	
							?>
							
							<td><?php 	echo $this->multi_function->myanmar_number($row3->c_gender);	}?></td>
							
							<?php 		
								$this->db->select('count(t_gender) as c_gender');
								$this->db->from('teacher_personal_tbl');
								$this->db->where('u_id',$u_id);
								$this->db->where('t_phd_attend','ရိွ');
								$this->db->where('t_phd_attend','၁ ပါ');
								$this->db->where('t_major',$tt);
								$this->db->order_by("teacher_personal_tbl.t_id","desc"); 
								$query3 = $this->db->get();							
								foreach ($query3->result() as $row3){	
							?>
							
							<td><?php 	echo $this->multi_function->myanmar_number($row3->c_gender);	}?></td>
							
							<?php 		
								$this->db->select('count(t_gender) as c_gender');
								$this->db->from('teacher_personal_tbl');
								$this->db->where('u_id',$u_id);
								$this->db->where('t_phd_attend','ရိွ');
								$this->db->where('t_phd_attend','၂ ပါ');
								$this->db->where('t_major',$tt);
								$this->db->order_by("teacher_personal_tbl.t_id","desc"); 
								$query3 = $this->db->get();							
								foreach ($query3->result() as $row3){	
							?>
							
							<td><?php 	echo $this->multi_function->myanmar_number($row3->c_gender);	}?></td>
							
							<?php 		
								$this->db->select('count(t_gender) as c_gender');
								$this->db->from('teacher_personal_tbl');
								$this->db->where('u_id',$u_id);
								$this->db->where('t_phd_attend','ရိွ');
								$this->db->where('t_phd_attend','၃ ပါ');
								$this->db->where('t_major',$tt);
								$this->db->order_by("teacher_personal_tbl.t_id","desc"); 
								$query3 = $this->db->get();							
								foreach ($query3->result() as $row3){	
							?>
							
							<td><?php 	echo $this->multi_function->myanmar_number($row3->c_gender);	}?></td>
							
							<?php 		
								$this->db->select('count(t_gender) as c_gender');
								$this->db->from('teacher_personal_tbl');
								$this->db->where('u_id',$u_id);
								$this->db->where('t_phd_attend','ရိွ');
								$this->db->where('t_phd_attend','၄ ပါ');
								$this->db->where('t_major',$tt);
								$this->db->order_by("teacher_personal_tbl.t_id","desc"); 
								$query3 = $this->db->get();							
								foreach ($query3->result() as $row3){	
							?>
							<td><?php 	echo $this->multi_function->myanmar_number($row3->c_gender);	}?></td>	
							<?php 		
								$this->db->select('count(t_gender) as c_gender');
								$this->db->from('teacher_personal_tbl');
								$this->db->where('u_id',$u_id);
								$this->db->where('t_phd_attend','ရိွ');
								$this->db->where('t_major',$tt);
								$this->db->order_by("teacher_personal_tbl.t_id","desc"); 
								$query3 = $this->db->get();							
								foreach ($query3->result() as $row3){	
							?>
							<td>	<?php 	echo $this->multi_function->myanmar_number($row3->c_gender);	}?></td>
							
					</tr>
				<?php	}	?>
					</table>
	
				</div>

