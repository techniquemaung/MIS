				<div class="span-18 last right_panel">

					<div class="span-14 subtable_title"><h5 style="color:#2b7108;margin-left:145px;">ျပည္ပပါရဂူဘြဲ႕ရ ပါေမာကၡမ်ားစာရင္း</h5></div><br/>
					<!--
					<div class="span-5">
						<form>
							<div class="span-2">
								<a href="clickaddbtn_foreignphdprofessorlist.htm"><input type="submit" name="add" value="Add"></a>
							</div>
							<div class="span-2">
								<a href="foreignprofessor_transfer.htm"><input type="submit" name="save" value="Transfer" ></a>
							</div>
						</form>
					</div>
					<hr class="space">
					-->
					<table class="staff_table">
						<tr class="staff_header">
							<td>စဥ္</td>
							<td>အမည္</td>
							<td>ရာထူး</td>
							<td>ဌာန</td>
							<td>ဘြဲ႕ရယူခဲ့ေသာ ႏုိင္ငံ</td>
							<td>မွတ္ခ်က္</td>

						</tr>
							<?php 
							$this->load->library('multi_function');
							$i = 1;
																														
							 foreach ($posts->result() as $row)
							{
						?>
						<tr>
							<td><?php echo $this->multi_function->myanmar_number($i)."။"; ?></td>
							<td><?php   echo $row->t_name; ?></td>
						<td><?php   echo $row->t_promotion; ?></td>
							<td><?php   echo $row->t_depeartment; ?></td>							
							<td><?php   echo $row->t_nation_foreign; ?></td>
							<td><?php   echo $row->t_degree; ?></td>
						
						</tr>
						<?php						
						 		$i++;
							}
						 ?>	
						
					</table>
	
				</div>
			
