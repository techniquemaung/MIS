			<?php 					
					echo form_open('announcement/announcement_edit_process');					
					date_default_timezone_set('UTC');
					$datestring = "d/m/Y ";
					$date=date($datestring); 
					
					if ($this->uri->segment(3) != ''){
						$announce_id = $this->uri->segment(3);
					}
					else {
						$announce_id = $announce_id;
					}
					
					$this->db->select('*');
					$this->db->from('announcement_tbl');
					$this->db->where('announce_id',$announce_id);
					$query = $this->db->get();
					foreach($query->result() as $row): 
					$announce_body = $row->announce_body;
			?>
			<input type="hidden" name="hidden_date" value="<?php echo $date; ?>" />
			<input type="hidden" name="hidden_announce_id" value="<?php echo $announce_id; ?>" />
			<div class="span-18 last pull-1" style="margin-left:-50px;" id="jslide">
				<div class="span-16 push-1">
					<div class="span-4" style="color:#438422;padding-top:10px;">
						သတင္းေခါင္းစဥ္
					</div>
					<div class="span-10 last">
						<textarea style="width:550px; height:60px;" name="title"><?php echo $row->announce_title;?></textarea>
						<span style="color:#FCC100;margin-left:20px;"><?php echo form_error('title')?></span>
					</div>
				</div>
				<div class="span-16 push-1">
					<div class="span-4" style="color:#488827;padding-top:10px;">
						သတင္းစာပုိဒ္
					</div>
					<div class="span-10 last">
						<!--  <textarea style="width:600px; height:300px;"></textarea> -->
						<?php echo $this->fckeditor->CreateForEdit($announce_body);?>						
					</div>
					<div class="span-10 push-1 last" style="color:#FCC100;"><?php echo form_error('content')?></div>
				</div>
			</div>
			<div class="span-16 push-3"><input type="submit" name="btn" value="" class="save_btn"></div>
			<?php 
			endforeach;
			echo form_close();
			 ?>