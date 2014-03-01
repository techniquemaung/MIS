			<div class="span-18 last" id="content_area">

				<div class="span-18 uni_bg">
				<?php echo form_open('administer/add_new_uni_process');?>							
						<div class="span-18 prepend-top">															
							
								<div class="span-7 newunitext">တကၠသုိလ္ အမည္</div>
								<div class="span-1" style="color:#FFFFF8">.</div>
								<div class="span-3"><input type="text" name="uni_name"  id="uni_name"  value="" class="field1"/></div><span id="uniname_verify" class="verify"></span>
										
								<div class="span-3 push-1 last" style="color:#FCC100;margin-top:-10px;"><?php echo form_error('uni_name')?></div>
							
						</div>		
				
					<div class="span-18 prepend-top">						
						
								<div class="span-7 newunitext">အမည္</div>
								<div class="span-1" style="color:#FFFFF8">.</div>
								<div class="span-3"><input type="text" name="username" id="username" value="" class="field1"/></div><span id="username_verify" class="verify"></span>
								<div class="span-3 push-1 last" style="color:#FCC100;"><?php echo form_error('username')?></div>
							
						</div>		

						<div class="span-18 prepend-top" style="color:#ED6402;">							
								*(ဤတကၠသုိလ္ စီမံဌာနမွ အသံုးျပဳမည့္ပုဂိဳလ္အတြက္ username(အမည္)တစ္ခု သတ္မွတ္ ရုိက္ထည့္ေပးရမည္ျဖစ္ပါသည္။)
						</div>	

						<div class="span-18 prepend-top">															
						
								<div class="span-7 newunitext">လွ်ိဳ႕ဝွက္ကုဒ္</div>
								<div class="span-1" style="color:#FFFFF8">.</div>
								<div class="span-3"><input type="password" name="password" value=""  id="password" class="field1"/></div><span id="password_verify" class="verify"></span>
								<div class="span-3 push-1 last" style="color:#FCC100;"><?php echo form_error('password')?></div>
						</div>
						
						<div class="span-18 prepend-top">															
							
								<div class="span-7 newunitext">လွ်ိဳ႕ဝွက္ကုဒ္ ထပ္မံ အတည္ျပဳ ရိုက္ထည့္ရန္</div>
								<div class="span-1" style="color:#FFFFF8">.</div>
								<div class="span-3"><input type="password" name="con_password" value="" id="con_password" class="field1"/></div><span id="confrimpwd_verify" class="verify"></span>
								<div class="span-3 push-1 last" style="color:#FCC100;"><?php echo form_error('con_password')?></div>
						</div>	

						<div class="span-18 prepend-top">															

								<div class="span-7 newunitext">ျပည္နယ္/တုိင္း</div>
								<div class="span-1" style="color:#FFFFF8">.</div>
								<div class="span-3 last">
									<select class="unibox2" name="uni_location" >
										<option value="0">--ျပည္နယ္/တိုင္း ေရြးရန္--</option>	 							
										<option value="ဧ​ရာဝတီတိုင္းေဒသႀကီး"   <?php echo set_select('uni_location','ဧ​ရာဝတီတိုင္းေဒသႀကီး');?>> ဧ​ရာဝတီတိုင္းေဒသႀကီး</option>
										<option value="ပဲခူးတိုင္းေဒသႀကီး"  <?php echo set_select('uni_location','ပဲခူးတိုင္းေဒသႀကီး');?>> ပဲခူးတိုင္းေဒသႀကီး</option>
										<option value="မေကြးတိုင္းေဒသႀကီး" <?php echo set_select('uni_location','မေကြးတိုင္းေဒသႀကီး');?>> မေကြးတိုင္းေဒသႀကီး</option>
										<option value="မႏၲေလးတိုင္းေဒသႀကီး"  <?php echo set_select('uni_location','မႏၲေလးတိုင္းေဒသႀကီး');?>> မႏၲေလးတိုင္းေဒသႀကီး</option>
										<option value="စစ္ကိုင္းတိုင္းေဒသႀကီး"  <?php echo set_select('uni_location','စစ္ကိုင္းတိုင္းေဒသႀကီး');?>> စစ္ကိုင္းတိုင္းေဒသႀကီး</option>
										<option value="တနသၤာရီတိုင္းေဒသႀကီး" <?php echo set_select('uni_location','တနသၤာရီတိုင္းေဒသႀကီး');?>> တနသၤာရီတိုင္းေဒသႀကီး</option>
										<option value="ရန္ကုန္တိုင္းေဒသႀကီး"  <?php echo set_select('uni_location','ရန္ကုန္တိုင္းေဒသႀကီး');?>> ရန္ကုန္တိုင္းေဒသႀကီး	</option>					
										<option value="ကခ်င္ျပည္နယ္"  <?php echo set_select('uni_location','ကခ်င္ျပည္နယ္');?>> ကခ်င္ျပည္နယ္</option>
										<option value="ကရင္ျပည္နယ္"  <?php echo set_select('uni_location','ကရင္ျပည္နယ္');?>> ကရင္ျပည္နယ္</option>
										<option value="ကယားျပည္နယ္"  <?php echo set_select('uni_location','ကယားျပည္နယ္');?>> ကယားျပည္နယ္</option>
										<option value="ခ်င္းျပည္နယ္"  <?php echo set_select('uni_location','ခ်င္းျပည္နယ္');?>> ခ်င္းျပည္နယ္</option>										
										<option value="မြန္ျပည္နယ္"  <?php echo set_select('uni_location','မြန္ျပည္နယ္');?>> မြန္ျပည္နယ္</option>
										<option value="ရခိုင္ျပည္နယ္"  <?php echo set_select('uni_location','ရခိုင္ျပည္နယ္');?>> ရခိုင္ျပည္နယ္</option>
										<option value="ရွမ္းျပည္နယ္"  <?php echo set_select('uni_location','ရွမ္းျပည္နယ္');?>> ရွမ္းျပည္နယ္</option>										
									</select>
									<div style="color:#FCC100;"><?php echo form_error('uni_location');?></div>
								</div>
								<div class="span-1" style="color:#FFFFF8">.</div>
							<!--	<div class="span-3 last" style="color:#ff0000;">*</div>-->
						
						</div>	

						<div class="span-18">															
								<div class="span-7 newunitext">တကၠသုိလ္ လိပ္စာ</div>
								<div class="span-1" style="color:#FFFFF8">.</div>
								<div class="span-3"><textarea class="p_area1" name="uni_address"> </textarea></div>
								<div class="span-3 last" style="color:#FCC100;margin-top:100px;"><?php echo form_error('uni_address')?></div>
						</div>

						<div class="span-17">															
					
								<div class="span-7 newunitext">ဤတကၠသုိလ္ႏွင့္ပတ္သက္ေသာ နိဒါန္းစာပုိဒ္ေရးရန္</div>
								<div class="span-1" style="color:#FFFFF8">.</div>
								<div class="span-3 last"><textarea class="p_area1" name="uni_intro"> </textarea></div>

						</div>
						
						<div class="span-18">															
					
								<div class="span-7 newunitext">ဤတကၠသုိလ္ႏွင့္ပတ္သက္ေသာ စာကုိယ္စာပုိဒ္ေရးရန္</div>
								<div class="span-1" style="color:#FFFFF8">.</div>
								<div class="span-3 last"><textarea class="p_area2" name="uni_body"> </textarea></div>

						</div>
						
						
						<div class="span-17">															
						
								<div class="span-7 newunitext">ဤတကၠသုိလ္ႏွင့္ပတ္သက္ေသာ နိဂုံးစာပုိဒ္ေရးရန္</div>
								<div class="span-1" style="color:#FFFFF8">.</div>
								<div class="span-3 last"><textarea class="p_area1" name="uni_conclusion"> </textarea></div>

						
						</div>				
						
						<div class="span-18 prepend-top append-bottom"><input type="submit" name="btn" value="" class="save_btn"></div>						
				<?php echo form_close();?>					
				</div>
			</div>
			
			
<script type="text/javascript">
$(document).ready(function(){
	$("#uni_name").keyup(function(){		
        if($("#uni_name").val().length >= 4)
        { 
            $("#uniname_verify").css({ "background-image": "url('<?php echo base_url();?>system/application/views/includes/images/yes.png')" });
  		}
        else 
		{
        	  $("#uniname_verify").css({ "background-image": "url('<?php echo base_url();?>system/application/views/includes/images/no.png')" });
        }
    });
	$("#username").keyup(function(){        
        if($("#username").val().length >= 4)
        {
           $("#username_verify").css({ "background-image": "url('<?php echo base_url();?>system/application/views/includes/images/yes.png')" });
         }
         else{
            $("#username_verify").css({ "background-image": "url('<?php echo base_url();?>system/application/views/includes/images/no.png')" });                
          }        
    });
	$("#password").keyup(function(){
        
        if($("#con_password").val().length >= 4)
        {
            if($("#con_password").val()!=$("#password").val())
            {
                $("#confrimpwd_verify").css({ "background-image": "url('<?php echo base_url();?>system/application/views/includes/images/no.png')" }); 
                $("#password_verify").css({ "background-image": "url('<?php echo base_url();?>system/application/views/includes/images/no.png')" });
 //               pwd=false;
 //               register_show();
            }
            else{
                $("#confrimpwd_verify").css({ "background-image": "url('<?php echo base_url();?>system/application/views/includes/images/yes.png')" }); 
                $("#password_verify").css({ "background-image": "url('<?php echo base_url();?>system/application/views/includes/images/yes.png')" });
            }
        }
    });
    
    $("#con_password").keyup(function(){
        
        if($("#password").val().length >=4)
        {
            if($("#con_password").val()!=$("#password").val())
            {
                $("#confrimpwd_verify").css({ "background-image": "url('<?php echo base_url();?>system/application/views/includes/images/no.png')" }); 
                $("#password_verify").css({ "background-image": "url('<?php echo base_url();?>system/application/views/includes/images/no.png')" });
  //              pwd=false;
  //             register_show();
            }
            else{
                $("#confrimpwd_verify").css({ "background-image": "url('<?php echo base_url();?>system/application/views/includes/images/yes.png')" }); 
                $("#password_verify").css({ "background-image": "url('<?php echo base_url();?>system/application/views/includes/images/yes.png')" });

            }
        }
    });
});

</script>		