<head>
<style>
table tr td{border:0px solid #fff;
text-align:left;
padding:10px 20px 10px 100px;
font-size:12px;
}
</style>
</head>

					<div class="span-24 par_backg">						
						<?php 
							$this->db->select('*');	
							$this->db->from('university_tbl');														
							$query = $this->db->get();	
							echo "<table ><tr>";
							$i = 0;
							foreach($query->result() as $row):	
							$i++;
							echo "<td width='250px' style='background:#e2f4b9;border:1px solid #fffff8;-moz-border-radius: 7px;'><a href = 'contact_uni_home/$row->u_id'>$row->u_name</a><br/><br/>$row->u_address</td>";	
							if($i%2==0){
								echo "</tr><tr></tr>";
							}
							endforeach;
							echo "<br/>";
							echo "</table>";
						?>				
					</div>