			<head>
			<style>
			.tt1 table tr td{border:none;
			text-align:left;
			padding:0px 0px 0px 50px;
			width:350px;}
			.tt2 table tr td{border:none;
			text-align:left;
			padding:0px 0px 0px 60px;
			width:280px;}
			</style>
			</head>

					<div class="span-18 last">
						<div class="span-18 adminUnibg">
						<div class="span-7 push-6 admin_notic">
							<div class="admin_notic_text">အထက္ျမန္မာျပည္မွ တကၠသုိလ္မ်ား</div>
						</div>
						
							<div class="span-18 unitext">
							<div class="tt1">
							<?php
		//						$university_location = array('???????????????????','??????????????????????');
		//						foreach ($university_location as $location){
		//							$this->db->select('u_id,u_name');
		//							$this->db->from('university_tbl');
		//							$this->db->like('u_location',$location);
		//							$uni_location = $this->db->get();						
								$this->db->from('university_tbl');
								$this->db->where('u_location','မႏၲေလးတိုင္းေဒသႀကီး');
								$this->db->or_where('u_location','မေကြးတိုင္းေဒသႀကီး');
								$this->db->or_where('u_location','စစ္ကိုင္းတိုင္းေဒသႀကီး');
								$this->db->or_where('u_location','ကခ်င္ျပည္နယ္');
								$this->db->or_where('u_location','ကရင္ျပည္နယ္');
								$this->db->or_where('u_location','ရွမ္းျပည္နယ္');
								$this->db->or_where('u_location','ခ်င္းျပည္နယ္');
								
								$query = $this->db->get();	
								echo "<table ><tr>";
								$i = 0;
								foreach($query->result() as $row):	
								$i++;
//								echo "<td>"."<a href = 'uni_home/$row->u_name/$row->u_id'>$row->u_name</a></td>";	
								echo "<td>"."<a href='#'>$row->u_name</a></td>";
								if($i%2==0){
									echo "</tr><tr></tr>";
								}
								endforeach;
								echo "</table>";
								
							?>
							</div>							
							</div>
						</div>
						
						<div class="span-18 append-bottom adminUnibg">
						<div class="span-7 push-6 admin_notic" style="margin-top:7px;align:center;">
							<div class="admin_notic_text">ေအာက္ျမန္မာျပည္မွ တကၠသုိလ္မ်ား</div>
						</div>
						
							<div class="span-18 unitext last">
								<div class="tt2">
									<?php
										$this->db->from('university_tbl');
										$this->db->where('u_location','ဧ​ရာဝတီတိုင္းေဒသႀကီး');
										$this->db->or_where('u_location','ပဲခူးတိုင္းေဒသႀကီး');
										$this->db->or_where('u_location','တနသၤာရီတိုင္းေဒသႀကီး');
										$this->db->or_where('u_location','ရန္ကုန္တိုင္းေဒသႀကီး');
										$this->db->or_where('u_location','ကယားျပည္နယ္');
										$this->db->or_where('u_location','မြန္ျပည္နယ္');
										$this->db->or_where('u_location','ရခိုင္ျပည္နယ္');
										
										$query = $this->db->get();	
										echo "<table><tr>";
										$i = 0;
										foreach($query->result() as $row):	
										$i++;
//										echo "<td>"."<a href = 'uni_home/$row->u_name/$row->u_id'>$row->u_name</a></td>";	
										echo "<td>"."<a href='#'>$row->u_name</a></td>";
										if($i%2==0){
											echo "</tr><tr></tr>";
										}
										endforeach;
										echo "</table>";						
									?>
								</div>
							</div>
						</div>
					</div>

