				<div class="span-18 last right_panel">

					<div class="span-14 subtable_title"><h5 style="color:#2b7108;margin-left:145px;">ၿမိဳ႕အလိုက္ ေက်ာင္းသားဦးေရ</h5></div><br/>
					<table class="span-17 staff_table">
						<tr class="staff_header">
							<td>စဥ္</td>
							<td>ၿမိဳ႕</td>
							<td>ဦးေရ</td>
						</tr>
						<?php 
							$this->load->library('multi_function');
						if($this->uri->segment(3)==""){$i=0;}
						if($this->uri->segment(3)!=""){$i=$this->uri->segment(3);}
//							$this->db->distinct();	
//							$this->db->select('s_hometown');
//							$this->db->where('u_id',$u_id);
//							$this->db->from('student_personal_tbl');
//							$query = $this->db->get();	
																														
							 foreach ($posts->result() as $row)
							{
						?>
						<tr>
							<td><?php echo $this->multi_function->myanmar_number(++$i)."။"; ?></td>
							<td><?php   echo $row->s_hometown; ?></td>							
							<td>
								<?php 
									$this->db->where('u_id',$u_id);
									$this->db->where('s_hometown', $row->s_hometown);
									$this->db->from('student_personal_tbl');
									echo $this->multi_function->myanmar_number($this->db->count_all_results())." ဦး";									
								?>
							</td>
						</tr>
						<?php						
						 		//$i++;
							}
						 ?>
					</table>
					<div class='span-24 pull-4' > <?php echo $this->pagination->create_links(); ?> </div>				
				</div>	
			