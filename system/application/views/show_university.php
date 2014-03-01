			<div class="span-18 last pull-3" id="content_area">				
				<div class="span-18 push-3">					
					<div id="vertical_container">
					<div class="span-14 push-2">
						<h3 style="color:#2b7108;">ပညာေရးဝန္ႀကီးဌာန</h3><span style="font-size:14px;color:#705a01;">တကၠသိုလ္မ်ား စာရင္းျပဇယား</span>
					</div><br/>
					<!-- Table Start-->
					<div class="span-18" style="margin-left:4px;">
							<table class="hr_table">

									<tr class="hr_table_header" >
										<th>စဥ္</th>
										<th>တကၠသိုလ္ အမည္</th>
										<th>Username</th>
										<th>Password</th>
										<th>ျပင္ရန္</th>
										<th class="border-right">ဖ်က္ရန္</th>
									
									</tr>	
									<tr>								
										<?php
											 if($this->uri->segment(3)==""){$i=0;}
											if($this->uri->segment(3)!=""){$i=$this->uri->segment(3);}
											foreach ($posts->result() as $row){
										?>									
										<td><?php echo $this->multi_function->myanmar_number(++$i);?></td>
										<td><?php echo $row->u_name;?> </td>
										<td>
										<?php
											 $u_id=$row->u_id;									
											$this->db->select('*');
											$this->db->from('university_tbl');
											$this->db->join('user_tbl', 'university_tbl.u_id= user_tbl.u_id');
											$this->db->where('university_tbl.u_id', $u_id);
											$q = $this->db->get();
											 if ($q->num_rows() !="") {
											 	$row = $q->row();
											 	echo $row->user_name;
										?>
									</td>
									<td>
										<?php 
												$key = 'ministry-of-education';
												echo $this->encrypt->decode($row->user_password,$key);	
											}	
										 ?>							
									</td>	
									<td><?php echo anchor('administer/edit_university/'.$row->u_id,'ျပင္ရန္');?></td>
									<td><?php echo anchor('administer/delete_university/'.$row->u_id,'ဖ်က္ရန္', array('onClick' => "return confirm('ဤတကၠသိုလ္အား ဖ်က္ရန္ ေသခ်ာပါသလား ?')"));?></td>
								</tr>
								<?php
									//$i++;
									 }
								?>													
							</table>
						</div>
						<div class="span-24 table-bg" style="margin-left:3px;"></div>
						<div class="span-18" style="text-align:center;"><?php echo $this->pagination->create_links(); ?> </div>					
				</div>			
			</div>
		</div>
