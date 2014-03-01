				<div class="span-17 prepend-top push-1 last right_panel ">
					<div id="vertical_container" >								
								<?php 
									$this->load->helper();	
									$uni_segment = $this->uri->segment(4);
									$this->db->from('university_tbl');
									$this->db->where('u_id',$u_id);
									$this->db->or_where('u_id',$uni_segment);
									$query = $this->db->get();
//									$query = $this->db->getwhere('university_tbl', array('u_id'=>$u_id));
									foreach ($query->result() as $row)
									{									
								 ?>
							<p>	<?php echo $row->u_introduction;?> </p><br/>
							<p>	<?php echo $row->u_body;?> </p><br/>
							<p>	<?php echo $row->u_conclusion;?>	</p>
							<?php }?>							
					</div>		
					
				</div>			
