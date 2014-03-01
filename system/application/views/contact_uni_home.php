				
				<div class="span-22 prepend-top last">
				<h3> 
				<span style="color:#FCC100; margin-left:40px;">				
				<?php
					$this->load->helper();	
					$uni_segment = $this->uri->segment(3);
					$this->db->from('university_tbl');
//					$this->db->where('u_id',$u_id);
					$this->db->where('u_id',$uni_segment);
					$query = $this->db->get();
					foreach ($query->result() as $row)
					{	
						echo $row->u_name;								
				?>
				</span>
				</h3>
			</div>				
				<div class="span-22 prepend-top push-1 last right_panel ">
					<div id="vertical_container" >								
						<p><?php echo $row->u_introduction;?></p><br/>
						<p><?php echo $row->u_body;?></p><br/>
						<p><?php echo $row->u_conclusion;?></p>
				<?php } ?>							
					</div>					
				</div>			
			
