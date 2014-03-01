			
			<div class="span-18 last right_panel">

					<div class="span-14 subtable_title"><h5 style="color:#2b7108;margin-left:145px;">ေက်ာင္းသားစာရင္းေပါင္းခ်ဳပ္</h5></div><br/>
					<table class="span-17 staff_table">
					<tr class="staff_header">
							<td>စဥ္</td>
							<td>အထူးျပဳ</td>
								<td colspan="2">ရုိးရုိးဘြဲ႔</td>
								
							<td colspan="2">ဂုဏ္ထူးတန္း</td>
							<td colspan="2">မဟာဘြဲ႔</td>
							<td colspan="2">မဟာသုေတသန</td>
							<td colspan="3">စုစုေပါင္း</td>
						</tr>
				<tr>
							<td style="color:#E4E6CF;">.</td>
							<td style="color:#E4E6CF;">.</td>
							<td>က်ား</td>
							<td>မ</td>
							
							

							<td>က်ား</td>
							<td>မ</td>

							<td>က်ား</td>
							<td>မ</td>

							<td>က်ား</td>
							<td>မ</td>

							<td>က်ား</td>
							<td>မ</td>
							<td>ေပါင္း</td>
						</tr>
						<?php 
								 $this->db->select('*');
								$this->db->from('major_tbl');
								$this->db->where('u_id',1);
								$this->db->order_by("major_tbl.major_id","desc"); 
								$query = $this->db->get();
								$i=0;
								foreach ($query->result() as $row){?>
							<tr>
							
							<td><?php echo $this->multi_function->myanmar_number(++$i);?></td>
							<td><?php echo $row->major;?></td>
							<td>
							<?php 	$this->db->select('count(s_gender) as c_gender');
										$this->db->from('student_personal_tbl');
										$this->db->where('s_gender',"က်ား");
										$this->db->where('s_major',$row->major);
										$this->db->like('s_class',"ရိုးရိုးတန္း");									
										$this->db->order_by("student_personal_tbl.s_id","desc"); 
										$query2= $this->db->get();
										
										foreach ($query2->result() as $row2){	
										echo $this->multi_function->myanmar_number($row2->c_gender);	}?>
							</td>										
							<td>
								<?php 	$this->db->select('count(s_gender) as c_gender');
											$this->db->from('student_personal_tbl');
											$this->db->where('s_gender',"မ");
											$this->db->where('s_major',$row->major);
										$this->db->like('s_class',"ရိုးရိုးတန္း");		
											$this->db->order_by("student_personal_tbl.s_id","desc"); 
											$query3= $this->db->get();										
											foreach ($query3->result() as $row3){	
											echo $this->multi_function->myanmar_number($row3->c_gender);	}?>
							</td>
															
						
																	
						
									<td>
							<?php 	$this->db->select('count(s_gender) as c_gender');
										$this->db->from('student_personal_tbl');
										$this->db->where('s_gender',"က်ား");
										$this->db->where('s_major',$row->major);
										$this->db->like('s_class',"ဂုဏ္ထူးတန္း");
																				
										$this->db->order_by("student_personal_tbl.s_id","desc"); 
										$query4= $this->db->get();
										
										foreach ($query4->result() as $row4){	
										echo $this->multi_function->myanmar_number($row4->c_gender);	}?>
							</td>										
							<td>
								<?php 	$this->db->select('count(s_gender) as c_gender');
											$this->db->from('student_personal_tbl');
											$this->db->where('s_gender',"မ");
											$this->db->where('s_major',$row->major);
												$this->db->like('s_class',"ဂုဏ္ထူးတန္း");
											$this->db->order_by("student_personal_tbl.s_id","desc"); 
											$query5= $this->db->get();										
											foreach ($query5->result() as $row5){	
											echo $this->multi_function->myanmar_number($row5->c_gender);	}?>
							</td>
							<td>
							<?php 	$this->db->select('count(s_gender) as c_gender');
										$this->db->from('student_personal_tbl');
										$this->db->where('s_gender',"က်ား");
										$this->db->where('s_major',$row->major);
										$this->db->where('s_class',"မဟာဘြဲ႔");						
										$this->db->order_by("student_personal_tbl.s_id","desc"); 
										$query6= $this->db->get();
										
										foreach ($query6->result() as $row6){	
									echo $this->multi_function->myanmar_number($row6->c_gender);	}?>
							</td>										
							<td>
								<?php 	$this->db->select('count(s_gender) as c_gender');
											$this->db->from('student_personal_tbl');
											$this->db->where('s_gender',"မ");
											$this->db->where('s_major',$row->major);
												$this->db->where('s_class',"မဟာဘြဲ႔");
											$this->db->order_by("student_personal_tbl.s_id","desc"); 
											$query7= $this->db->get();										
											foreach ($query7->result() as $row7){	
											echo $this->multi_function->myanmar_number($row7->c_gender);	}?>
							</td>
								<td>
							<?php 	$this->db->select('count(s_gender) as c_gender');
										$this->db->from('student_personal_tbl');
										$this->db->where('s_gender',"က်ား");
										$this->db->where('s_major',$row->major);
										$this->db->where('s_class',"မဟာသုေတသန");
										$this->db->order_by("student_personal_tbl.s_id","desc"); 
										$query8= $this->db->get();
										
										foreach ($query8->result() as $row8){	
									echo $this->multi_function->myanmar_number($row8->c_gender);	}?>
							</td>										
							<td>
								<?php 	$this->db->select('count(s_gender) as c_gender');
											$this->db->from('student_personal_tbl');
											$this->db->where('s_gender',"မ");
											$this->db->where('s_major',$row->major);
												$this->db->where('s_class',"မဟာသုေတသန");
											$this->db->order_by("student_personal_tbl.s_id","desc"); 
											$query9= $this->db->get();										
											foreach ($query9->result() as $row9){	
										echo $this->multi_function->myanmar_number($row9->c_gender);	}?>
							</td>
						
							<td>
					<?php $male_total= $row2->c_gender+$row4->c_gender+$row6->c_gender+$row8->c_gender; 
					  echo $this->multi_function->myanmar_number($male_total); ?>
					</td>	
					<td>
						<?php $female_total= $row3->c_gender+$row5->c_gender+$row7->c_gender+$row9->c_gender; 
					  echo $this->multi_function->myanmar_number($female_total); ?>
						</td>	
						<td>
								<?php echo $this->multi_function->myanmar_number($female_total+$male_total); ?> </td>
							
								<?php 		echo "";		}	?>
									
						</tr>
						
					
					</table>

				</div>
			
