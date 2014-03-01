			<?php
				 echo form_open('announcement/announcement_add_process'); 
				$announce_id = $this->uri->segment(3);
				$this->db->select('*');
				$this->db->from('announcement_tbl');
				$this->db->where('announce_id',$announce_id);
				$query = $this->db->get();
				foreach($query->result() as $row): 
			?>
			<div class="span-24">
				<div class="span-16 push-4 prepend-top">
						<label style="width:600px; height:60px;color:#E09100;font-size:16px;"><?php echo $row->announce_title; ?></label>
				</div>				
				<div class="span-22 push-1" style="text-align:justify;">
						<label style="width:600px; height:300px;color:#113300;line-height:24px;font-size:13px;">
							<?php echo $row->announce_body; ?>
						</label>
				</div>
			</div>
			<div class="span-24"  style="margin-left:380px;color:#E09100;font-size:14px;">Date&nbsp;:&nbsp;<?php echo $row->announce_date; ?></div>
			<?php 
				endforeach;
				echo form_close(); 
			?>