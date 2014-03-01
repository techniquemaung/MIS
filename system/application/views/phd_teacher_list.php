				<div class="span-18 last right_panel">

					<div class="span-14 subtable_title"><h5 style="color:#2b7108;margin-left:145px;"> ပါရဂူဘြဲ႔ရ ဆရာ/မ မ်ားစာရင္း </h5></div><br/>
					<table class="span-17 staff_table">
						<tr class="staff_header">
							<td>စဥ္</td>
							<td>ဌာန</td>
							<td colspan="2">ပါေမာကၡ</td>
							<td colspan="2">တြဲဖက္<br/>ပါေမာကၡ</td>
							<td colspan="2">ကထိက</td>
							<td colspan="2">လက္ေထာက္ <br/>ကထိက</td>
							<td colspan="2">နည္းျပ</td>
							<td colspan="3">ေပါင္း</td>
						</tr>
						
						<tr>
							<td style="color:#E4E6CF;">.</td>
							<td style="color:#E4E6CF;">.</td>
							<td>ျပည္<br/>တြင္း</td>
							<td>ျပည္ပ</td>

							<td>ျပည္<br/>တြင္း</td>
							<td>ျပည္<br/>ပ</td>

							<td>ျပည္<br/>တြင္း</td>
							<td>ျပည္ပ</td>

							<td>ျပည္<br/>တြင္း</td>
							<td>ျပည္ပ</td>

							<td>ျပည္<br/>တြင္း</td>
							<td>ျပည္ပ</td>

							<td>ျပည္<br/>တြင္း</td>
							<td>ျပည္ပ</td>
							<td>ေပါင္း</td>
						</tr>
							<?php 
								 $this->db->select('*');
								$this->db->from('major_tbl');
								$this->db->where('u_id',1);
								$this->db->order_by("major_tbl.major_id","desc"); 
								$query1 = $this->db->get();
								
								$i=0;
								foreach($query1->result() as $row1){?>
						
						
							<tr>
						<td><?php echo $this->multi_function->myanmar_number(++$i);?></td>
							<td><?php echo $row1->major; ?></td>
							
								<td>
								<?php 	$this->db->select('count(t_gender) as c_gender');
											$this->db->from('teacher_personal_tbl');
										$this->db->where('t_promotion ',"ပါေမာကၡ");
										$this->db->where('t_depeartment',$row1->major." ဌာန");
									$this->db->where('t_nation_foreign','ျပည္တြင္း');						
										$this->db->order_by("teacher_personal_tbl.t_id","desc"); 
										$query2= $this->db->get();
										
										foreach ($query2->result() as $row2){	
										echo $this->multi_function->myanmar_number($row2->c_gender);	}?>
							</td>
							<td>
								<?php 							
								$this->db->select('count(t_promotion) as c_gender');
								$this->db->from('teacher_personal_tbl');						
									$this->db->where('t_promotion ',"ပါေမာကၡ");
								$this->db->where('t_nation_foreign','ျပည္ပ');
								$this->db->where('t_depeartment',$row1->major.' ဌာန');								
								$this->db->order_by("teacher_personal_tbl.t_id","desc"); 
								$query3 = $this->db->get();								
								foreach ($query3->result() as $row3){							
							 echo  $this->multi_function->myanmar_number($row3->c_gender);}	?>							
							</td>
										<td>
								<?php 							
								$this->db->select('count(t_promotion) as c_gender');
								$this->db->from('teacher_personal_tbl');						
									$this->db->where('t_promotion ','တြဲဖက္ ပါေမာကၡ');
								$this->db->where('t_nation_foreign','ျပည္တြင္း');
								$this->db->where('t_depeartment',$row1->major.' ဌာန');								
								$this->db->order_by("teacher_personal_tbl.t_id","desc"); 
								$query4 = $this->db->get();								
								foreach ($query4->result() as $row4){							
							 echo  $this->multi_function->myanmar_number($row4->c_gender);}	?>							
							</td>
										<td>
								<?php 							
								$this->db->select('count(t_promotion) as c_gender');
								$this->db->from('teacher_personal_tbl');						
								$this->db->where('t_promotion ','တြဲဖက္ ပါေမာကၡ');
								$this->db->where('t_nation_foreign','ျပည္ပ');
								$this->db->where('t_depeartment',$row1->major.' ဌာန');								
								$this->db->order_by("teacher_personal_tbl.t_id","desc"); 
								$query5 = $this->db->get();								
								foreach ($query5->result() as $row5){							
							 echo  $this->multi_function->myanmar_number($row5->c_gender);}	?>							
							</td>
							<td>
								<?php 							
								$this->db->select('count(t_promotion) as c_gender');
								$this->db->from('teacher_personal_tbl');						
									$this->db->where('t_promotion ','ကထိက');
								$this->db->where('t_nation_foreign','ျပည္တြင္း');
								$this->db->where('t_depeartment',$row1->major.' ဌာန');								
								$this->db->order_by("teacher_personal_tbl.t_id","desc"); 
								$query6 = $this->db->get();								
								foreach ($query6->result() as $row6){							
							 echo  $this->multi_function->myanmar_number($row6->c_gender);}	?>							
							</td>
											<td>
								<?php 							
								$this->db->select('count(t_promotion) as c_gender');
								$this->db->from('teacher_personal_tbl');						
									$this->db->where('t_promotion ','ကထိက');
									$this->db->where('t_nation_foreign','ျပည္ပ');
								$this->db->where('t_depeartment',$row1->major.' ဌာန');								
								$this->db->order_by("teacher_personal_tbl.t_id","desc"); 
								$query7 = $this->db->get();								
								foreach ($query7->result() as $row7){							
							 echo  $this->multi_function->myanmar_number($row7->c_gender);}	?>							
							</td>
										<td>
								<?php 							
								$this->db->select('count(t_promotion) as c_gender');
								$this->db->from('teacher_personal_tbl');						
											$this->db->where('t_promotion ','လ/ထ ကထိက');
								$this->db->where('t_nation_foreign','ျပည္တြင္း');
								$this->db->where('t_depeartment',$row1->major.' ဌာန');								
								$this->db->order_by("teacher_personal_tbl.t_id","desc"); 
								$query8 = $this->db->get();								
								foreach ($query8->result() as $row8){							
							 echo  $this->multi_function->myanmar_number($row8->c_gender);}	?>							
							</td>
										<td>
								<?php 							
								$this->db->select('count(t_promotion) as c_gender');
								$this->db->from('teacher_personal_tbl');						
							$this->db->where('t_promotion ','လ/ထ ကထိက');
									$this->db->where('t_nation_foreign','ျပည္ပ');
								$this->db->where('t_depeartment',$row1->major.' ဌာန');								
								$this->db->order_by("teacher_personal_tbl.t_id","desc"); 
								$query9 = $this->db->get();								
								foreach ($query9->result() as $row9){							
							 echo  $this->multi_function->myanmar_number($row9->c_gender);}	?>							
							</td>
											<td>
								<?php 							
								$this->db->select('count(t_promotion) as c_gender');
								$this->db->from('teacher_personal_tbl');						
						$this->db->where('t_promotion ','နည္းျပ');
								$this->db->where('t_nation_foreign','ျပည္တြင္း');
								$this->db->where('t_depeartment',$row1->major.' ဌာန');								
								$this->db->order_by("teacher_personal_tbl.t_id","desc"); 
								$query10 = $this->db->get();								
								foreach ($query10->result() as $row10){							
							 echo  $this->multi_function->myanmar_number($row10->c_gender);}	?>							
							</td>
											<td>
								<?php 							
								$this->db->select('count(t_promotion) as c_gender');
								$this->db->from('teacher_personal_tbl');						
							$this->db->where('t_promotion ','နည္းျပ');
									$this->db->where('t_nation_foreign','ျပည္ပ');
								$this->db->where('t_depeartment',$row1->major.' ဌာန');								
								$this->db->order_by("teacher_personal_tbl.t_id","desc"); 
								$query11 = $this->db->get();								
								foreach ($query11->result() as $row11){							
							 echo  $this->multi_function->myanmar_number($row11->c_gender);}	?>							
							</td>
														<td>
							<?php $local=$row2->c_gender+$row4->c_gender+$row6->c_gender+$row8->c_gender+$row10->c_gender;
							echo  $this->multi_function->myanmar_number($local);
							?>
							</td>
								<td>
								<?php  $inter= $row3->c_gender+$row5->c_gender+$row7->c_gender+$row9->c_gender+$row11->c_gender;
								echo  $this->multi_function->myanmar_number($inter);
								
								?>
								
							</td>
							<td>	<?php $t=$local+$inter; echo   $this->multi_function->myanmar_number($t); ?>	</td>
					</tr>
						
						
							
						<?php 								
								}								
					?>
					</table>

				</div>
			
