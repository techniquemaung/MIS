			<?php 
					echo form_open('announcement/announcement_add_process');
					date_default_timezone_set('UTC');
					$datestring = "d/m/Y ";
					$date=date($datestring); 
			?>
			<input type="hidden" name="hidden_date" value="<?php echo $date; ?>" />
			<div class="span-18 last pull-1" style="margin-left:-50px;" id="jslide">
				<div class="span-16 push-1">
					<div class="span-4" style="color:#438422;padding-top:10px;">
						သတင္းေခါင္းစဥ္
					</div>
					<div class="span-10 last">
						<textarea style="width:550px; height:60px;" name="title"></textarea>
						<span style="color:#FCC100;margin-left:20px;"><?php echo form_error('title')?></span>
					</div>
					
				</div>
				<div class="span-16 push-1">
					<div class="span-4" style="color:#488827;padding-top:10px;">
						သတင္းစာမ်က္ႏွာ
					</div>
					<div class="span-10 last">
						<!--  <textarea style="width:600px; height:300px;"></textarea> -->
						<?php echo $this->fckeditor->Create()?>						
					</div>
					<div class="span-10 push-1 last" style="color:#FCC100;"><?php echo form_error('content')?></div>
				</div>
				
				<div class="span-16 push-4"><input type="submit" name="btn" value="" class="save_btn"></div>
			</div>
			
			<?php echo form_close(); ?>