				<div class="span-18 last right_panel">
					<div class="span-14 subtable_title"><h5 style="color:#2b7108;margin-left:145px;">  ပါေမာကၡ ဌာနမွဴးစာရင္း </h5></div><br/>					
					<table class="staff_table">
						<tr class="staff_header">
							<td>စဥ္</td>
							<td>ဌာန</td>
							<td>အမည္</td>
							<td>ရာထူး</td>
							<td>မွတ္ခ်က္</td>
							
						</tr>
						<?php 
							$this->load->library('multi_function');							
							if($this->uri->segment(3)==""){$i=0;}
							if($this->uri->segment(3)!=""){$i=$this->uri->segment(3);}																													
							 foreach ($posts->result() as $row)
							{
						?>
								<tr>
							<td><?php echo $this->multi_function->myanmar_number(++$i)."။"; ?></td>
							<td><?php   echo $row->major; ?></td>	
								<td><?php   echo $row->class_head; ?></td>		
									<td><?php   echo $row->class_head; ?></td>	
										<td>-</td>						
							
						</tr>
						<?php						
						 	//	$i++;
							}
						 ?>				
				
				
					
	
					</table>

				<?php echo $this->pagination->create_links(); ?> 
				</div>
			<div class='span-24 pull-4' > 
		</div>					

