<?php

/**
	 * @name: users/form.php
	 * 
	 * @desc: view/edit orders main listing view users for admin
	 * 
	 * @author: bhavesh khanpara
	 */
	@$query->status =  ($query->status == 1)? 'Active':'Inactive';
?>
<!--<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>
        tinymce.init({
            menubar : false,
            mode : "specific_textareas",
            editor_selector : "mceEditor",
            plugins: "image link preview code anchor paste spellchecker searchreplace insertdatetime ",
            toolbar: "undo redo | bold  italic | link  | anchor code | searchreplace | insertdate inserttime",
            insertdatetime_dateformat: "%Y-%m-%d",
            insertdatetime_timeformat: "%H:%M:%S",
            width:600,
            height: 200
            });
</script>-->
<?php if($this->uri->segment(4)){ ?>
<script type="text/javascript">
//after form submit select tab	
$(window).load(function() {
	$('#myTab a[href="#<?=$this->uri->segment(4);?>"]').tab('show');
});

</script>
<?php }?>
<div class="row-fluid">
	  <div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-edit"></i> <?php echo $this->lang->line('user_profile');?></h2>
			
		</div>
		<div class="box-content">
		<!-- Message box for success/warning/error-->
					<?php	if($this->session->flashdata('info')){?>
									<div class="alert alert-success">
							<?php echo $this->session->flashdata('info')?>
							</div>
							<?php } ?>
							

						<br/><?php if(validation_errors()){?>
						<div class="alert alert-error">
							<ul>
								<?php echo validation_errors(); ?>
							</ul>
						</div>
						<?php } ?>
			       <ul class="nav nav-tabs" id="myTab">
				<?php if($this->uri->segment(2) == "create" )
				{?>
					<li class="active"><a id="Personal_details_id" href="#Personal_details"><?php echo $this->lang->line('tab_personal_details');?></a></li>
				<?php } else { ?> 
					<li class="active"><a id="Personal_details_id" href="#Personal_details"><?php echo $this->lang->line('tab_personal_details');?></a></li>
				<?php /*?><?php //if($query->plan_id != 1):?>
					<li><a id="business_id" href="#business"><?php echo $this->lang->line('tab_business_details');?></a></li>
				<?php //endif;?>
					<li><a id="connected_to_id" href="#connected_to"><?php echo $this->lang->line('tab_connected_to');?></a></li>
				<?php //if($query->plan_id != 1):?>
					<li><a id="deal_id"  href="#deal"><?php echo $this->lang->line('tab_deal');?></a></li>
				<?php //endif;?>
				<?php */?>	<li style="display:none;"><a id="subscription_id" href="#subscription"><?php echo $this->lang->line('tab_subscription');?></a></li>
				<?php }?>
			</ul>
	<!-- Personal Deatails Tab -->		
			<div id="myTabContent" class="tab-content">
                    <div class="tab-pane active" id="Personal_details">
                                        <?php 
                                        $attributes = array('class' => 'form-horizontal', 'id' => 'frm_persona');
                                        echo form_open_multipart('',$attributes); ?>
                                        <fieldset>
                                        <!--Email Address of user -->
                                            <div class="control-group">
                                                    <label class="control-label" for="email"><?php echo $this->lang->line('email');?></label>
                                                    <div class="controls">						
                                                        <input type="text" id="email" name="email"  readonly="readonly"
                                                        value="<?php if(set_value('email') == ""){echo (isset($query->email))?$query->email:''; } else { echo set_value('email'); }?>" class="input-xlarge">
                                                    </div>
                    
                                            </div>
                                                     
                    
                                            <?php //if ($this->uri->segment(2) != 'profile'&&$this->uri->segment(2) != 'edit'):?>
                                                <?php if($this->uri->segment(2) == "create" ):?>
                                             <!--Password of user editable and in text form  -->
                                                <div class="control-group warning">
                                                    <label class="control-label" for="password"><?php echo $this->lang->line('password');?></label>
                                                    <div class="controls">
                                                        <input type="password" id="password" name="password" value="" class="input-xlarge">
                                                        <?php if ($this->uri->segment(2) != 'create'): ?>
                                                            <span class="help-inline"><?php echo $this->lang->line('leave_password');?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                    
                                        <!--User First Name -->
                                            <div class="control-group" style="display:none">
                                                <label class="control-label" for="first_name"><?php echo $this->lang->line('first_name');?></label>
                                                <div class="controls">						
                                                    <input type="text" id="first_name" name="first_name" 
                                                    value="<?php if(set_value('email') == ""){echo (isset($query->first_name))?$query->first_name:''; } else { echo set_value('first_name'); }?>" class="input-xlarge">
                                                </div>
                                            </div>
                                                                
                                        <!--User Last Name -->
                                            <div class="control-group" style="">
                                                <label class="control-label" for="last_name">Subscribers name<?php //echo $this->lang->line('last_name');?></label>
                                                <div class="controls">						
                                                    <input readonly="readonly" type="text" id="last_name" name="last_name" value="<?php if(set_value('last_name') == ""){ echo (isset($query->last_name))?$query->last_name:''; } else { echo set_value('last_name'); }?>" class="input-xlarge">
                                                </div>
                                            </div>
                    
                                            <?php if($this->uri->segment(2) != 'create'){ $readonly = "readonly = 'readonly'"; } else { $readonly = "";}?>
                                         <!--W-address -->
                                            <div class="control-group" style="display:none;">
                                                <label class="control-label" for="w_address"><?php echo $this->lang->line('w_address');?></label>
                                                <div class="controls">						
                                                    <input type="text" <?=$readonly?> id="w_address" name="w_address" value="<?php if(set_value('w_address') == ""){ echo (isset($query->w_address))?$query->w_address:''; } else { echo set_value('w_address'); }?>" class="input-xlarge">
                                                
                                                </div>
                                            </div>	
                                        <!--profile_pic  -->
                                            <div class="control-group" style="display:none;">
                                                <label class="control-label" for="userfile"><?php echo $this->lang->line('profile_pic');?></label>
                                                <div class="controls">						
                                                    <!-- <input type="text" id="profile_pic" name="profile_pic" value="<?php echo (isset($query->profile_pic))?$query->profile_pic :'';?><?php echo set_value('profile_pic'); ?>" class="input-xlarge"> -->
                                                    <?php 
                    
                                                    if(!isset($query->profile_pic)){ 	$image = 'add-img.png'; } else { $image = $query->profile_pic; } ?>
                                                    <span class="alignright add-img">
                                                    <img src="<?= $this->config->item('image_directory')?>user/<?=$image?>" width="136" height="136" class="preview" alt="add image" title="add image" />
                                                  </span>
                                                    <br/><input type="file" name="userfile" id="userfile" size="20" />
                                                
                                                </div>
                                                
                                            </div>	
                                        <!--Intro text  -->
                                            <div class="control-group" style="display:none">
                                                <label class="control-label" for="intro_text"><?php echo $this->lang->line('intro_text');?></label>
                                                <div class="controls ">						
                                                    <textarea name="intro_text" class="mceEditor"  id="intro_text"><?php if(set_value('intro_text') == ""){ echo (isset($query->intro_text))?$query->intro_text:''; } else { echo set_value('intro_text'); }?></textarea>
                                                    <!-- <input type="text" id="intro_text" name="intro_text" value="<?php echo (isset($query->intro_text))?$query->intro_text :'';?><?php echo set_value('intro_text'); ?>" class="input-xlarge"> -->
                                                </div>
                                            </div>	
                    
                                        <!-- area_code  -->
                                            <div class="control-group" style="display:none">
                                                <label class="control-label" for="Lable to display">Business name or Lable to display<?php //echo $this->lang->line('area_code');?></label>
                                                <div class="controls ">						
                                                    <input type="text" id="address" name="address" value="<?php if(set_value('address') == ""){ echo (isset($query->address))?$query->address:''; } else { echo set_value('address'); }?>" class="input-xlarge">
                                                </div>
                                            </div>			
                                        <!--Phone-->
                                            <div class="control-group" style="display:none;">
                                                <label class="control-label" for="phone"><?php echo $this->lang->line('phone');?></label>
                                                <div class="controls">						
                                                    <input type="text" id="phone" name="phone" value="<?php if(set_value('phone') == ""){ echo (isset($query->phone))?$query->phone:''; } else { echo set_value('phone'); }?>" class="input-xlarge">
                                                </div>
                                            </div>
                                        <!--City-->
                                            <div class="control-group" style="display:none">
                                                <label class="control-label" for="city"><?php echo $this->lang->line('city');?></label>
                                                <div class="controls">						
                                                    <input type="text" id="city" name="city" value="<?php echo (isset($query->city))?$query->city:'';?><?php //echo set_value('city'); ?>" class="input-xlarge">
                                                </div>
                                            </div>	
                                        <!--User State -->
                                            <div class="control-group" style="display:none">
                                                <label class="control-label" for="state" ><?php echo $this->lang->line('State');?></label>
                                                <div class="controls">						
                                                    <input type="text" id="state" name="state" value="<?php echo (isset($query->state))?$query->state:'';?><?php //echo set_value('state'); ?>" class="input-xlarge">
                                                </div>
                                            </div>	
                                        <!--User Zipcode Code  -->
                                            <div class="control-group" style="display:none">
                                                <label class="control-label" for="zipcode"><?php echo $this->lang->line('zipcode');?></label>
                                                <div class="controls">						
                                                    <input type="text" id="zipcode" name="zipcode" value="<?php echo (isset($query->zipcode))?$query->zipcode:'';?><?php //echo set_value('zipcode'); ?>" class="input-xlarge">
                                                </div>
                                            </div>
                                        <!--User status  -->
                                            <div class="control-group">
                                                <label class="control-label" for="status"><?php echo $this->lang->line('status');?></label>
                                                <div class="controls">
                                                    <select id="status" name="status" data-rel="chosen">
                                                        <?php foreach ($status as $row): ?>
                                                                <option value="<?php echo $row;?>" 
                                                                    <?php if(@$query->status==$row){echo 'selected="selected"';}else {echo '';}?>
                                                                    <?php echo set_select('status',$row); ?>><?php echo $row;?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                        <!--User plan_id  -->
                                            <div class="control-group">
                                                <label class="control-label" for="plan_id"><?php echo $this->lang->line('plan_type');?></label>
                                                 <?php if($this->uri->segment(2) != 'create'){ $disabled = "disabled";} else { $disabled = "";}?>
                                                <div class="controls">
                                                    <select id="plan_id" name="plan_id" data-rel="chosen" <?=$disabled?>>
                                                    <?php foreach ($plantype as $row_plan): ?>
                                                                <option value="<?php echo $row_plan;?>" 
                                                                    <?php if(@$query->plan_id==$row_plan){echo 'selected="selected"';}else {echo '';}?>
                                                                    <?php echo set_select('plan_id',$row_plan); ?>><?php echo $row_plan;?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                    
                                                </div>
                                            </div>
                                                
                                        <!--User subcription_date on -->
                                                <div class="control-group">
                                                <label class="control-label" for="subcription_date"><?php echo $this->lang->line('subcription_date');?></label>
                                                <div class="controls">						
                                                    
                                                    <input type="text" class="input-xlarge datepicker<?=$readonly;?>" id="subcription_date" name="subcription_date" <?=$readonly;?> value="<?php echo (isset($query->subcription_date))?$query->subcription_date:'';?><?php echo set_value('created'); ?>">
                                                </div>
                                            </div>	
                                        <!--User expiry_date on -->
                                                <div class="control-group">
                                                <label class="control-label" for="expiry_date"><?php echo $this->lang->line('expiry_date');?></label>
                                                <div class="controls">						
<input type="text" class="input-xlarge datepicker<?=$readonly;?>" id="expiry_date"   <?=$readonly;?> name="expiry_date" 
                                                    value="<?php echo (isset($query->expiry_date))?$query->expiry_date:'';?><?php echo set_value('created'); ?>" >
                                                </div>
                                            </div>	
                                        <!--User created on -->
                                                <div class="control-group" style="display:none;">
                                                <label class="control-label" for="created"><?php echo $this->lang->line('created');?></label>
                                                <div class="controls">						
                                                    <input type="text"  <?=$readonly;?> class="input-xlarge datepicker<?=$readonly;?>" id="created" name="created" value="<?php echo (isset($query->created))?$query->created:'';?><?php echo set_value('created'); ?>">
                                                </div>
                                            </div> 

                                             <!--Phone published or nt -->
                                                <div class="control-group" style="display:none;">
                                                <label class="control-label" for="created">phone publicize</label>
                                                <div class="controls"> 
                                                    <input type="checkbox" name="phone_publish" 

                                                        <?php  if(@$query->phone_publish == '1'){ 
                                                              echo "checked=checked";
                                                            }
                                                        ?> 
                                                    /> </div>
                                                </div>    		
                                          
                    
                                          <div class="form-actions">
                                                <input name="submit" class="btn btn-primary" type="submit" value="<?php echo $this->lang->line('save');?>">
                                                <a href="<?php echo base_url(); ?>users" class="btn">Cancel</a>
                                            </div>
                                        </fieldset>
                    
                                    <?php 
                                        
                                    echo form_close(); ?>
                                </div>
                <!-- Business Deatails  -->
                	<div class="tab-pane" id="business">
                                            <?php
                                            $attributes = array('class' => 'form-horizontal', 'id' => 'frm_business','name' =>'frm_business');
                                            echo form_open_multipart('users/business_details',$attributes); ?>
                                            <fieldset>
                                               
                                            <!--company_name -->
                                                <div class="control-group">
                                                        <label class="control-label" for="company_name"><?php echo $this->lang->line('company');?></label>
                                                        <div class="controls">						
                                                            <input type="text" id="business_company_name" name="business_company_name" value="<?php echo (isset($query_business->company_name))?$query_business->company_name:'';?><?php echo set_value('business_company_name'); ?>" class="input-xlarge">
                                                        </div>
                                                </div>
                                            <!--business_image  -->
                                            <div class="control-group">
                                                <label class="control-label" for="userfile"><?php echo $this->lang->line('business_pic');?></label>
                                                
                    
                                                <div class="controls">						
                                                    <!-- <input type="text" id="profile_pic" name="profile_pic" value="<?php echo (isset($query->profile_pic))?$query->profile_pic :'';?><?php echo set_value('profile_pic'); ?>" class="input-xlarge"> -->
                                                    <?php 
                    
                                                    if(!isset($query_business->business_pic) || $query_business->business_pic == "" ){ 	$image = 'add-img.png'; } else { $image = $query_business->business_pic; } ?>
                                                    <span class="alignright add-img">
                                                    <img src="<?= $this->config->item('image_directory')?>user/<?=$image?>" width="500" height="136" class="preview" alt="add image" title="add image" />
                                                  </span>
                                                    <br/><input type="file" name="userfile" id="userfile" size="20" />
                                                
                                                </div>
                                                
                                            </div>		
                                            <!--Logo_image  -->
                                            <div class="control-group">
                                                <label class="control-label" for="brand_logo"><?php echo $this->lang->line('logo_pic');?></label>
                                                
                    
                                                <div class="controls">						
                                                    <?php 
                    
                                                    if(!isset($query_business->brand_logo) || $query_business->brand_logo == "" ){ 	$image = 'add-img.png'; } else { $image = $query_business->brand_logo; } ?>
                                                    <span class="alignright add-img">
                                                    <img src="<?= $this->config->item('image_directory')?>user/<?=$image?>" width="136" height="136" class="preview" alt="add image" title="add image" />
                                                  </span>
                                                    <br/><input type="file" name="brand_logo" id="brand_logo" size="20" />
                                                
                                                </div>
                                                
                                            </div>		
                                            <!-- address_1 of user -->
                                                <div class="control-group">
                                                        <label class="control-label" for="address_1"><?php echo $this->lang->line('address1');?></label>
                                                        <div class="controls">						
                                                            <input type="text" id="business_address_1" name="business_address_1" value="<?php echo (isset($query_business->address_1))?$query_business->address_1:'';?><?php echo set_value('business_address_1'); ?>" class="input-xlarge">
                                                        </div>
                                                </div>
                                                <!-- city -->
                                                <div class="control-group">
                                                        <label class="control-label" for="city"><?php echo $this->lang->line('city');?></label>
                                                        <div class="controls">						
                                                            <input type="text" id="business_city" name="business_city" value="<?php echo (isset($query_business->city))?$query_business->city:'';?><?php echo set_value('business_city'); ?>" class="input-xlarge">
                                                        </div>
                                                </div>
                                                <!-- state -->
                                                <div class="control-group">
                                                        <label class="control-label" for="state"><?php echo $this->lang->line('state');?></label>
                                                        <div class="controls">						
                                                            <input type="text" id="business_state" name="business_state" value="<?php echo (isset($query_business->state))?$query_business->state:'';?><?php echo set_value('business_state'); ?>" class="input-xlarge">
                                                        </div>
                                                </div>
                                                <!-- country -->
                                                <div class="control-group">
                                                        <label class="control-label" for="country"><?php echo $this->lang->line('country');?></label>
                                                        <div class="controls">						
                                                            <input type="text" id="business_country" name="business_country" value="<?php echo (isset($query_business->country))?$query_business->country:'';?><?php echo set_value('business_country'); ?>" class="input-xlarge">
                                                        </div>
                                                </div>
                                                <!-- Zipcode -->
                                                <div class="control-group">
                                                        <label class="control-label" for="zipcode"><?php echo $this->lang->line('zipcode');?></label>
                                                        <div class="controls">						
                                                            <input type="text" id="business_zipcode" name="business_zipcode" value="<?php echo (isset($query_business->zipcode))?$query_business->zipcode:'';?><?php echo set_value('business_zipcode'); ?>" class="input-xlarge">
                                                        </div>
                                                </div>
                                                <!-- area_code -->
                                                <div class="control-group">
                                                        <label class="control-label" for="area_code"><?php echo $this->lang->line('area_code');?></label>
                                                        <div class="controls">						
                                                            <input type="text" id="business_area_code" name="business_area_code" value="<?php echo (isset($query_business->area_code))?$query_business->area_code:'';?><?php echo set_value('business_area_code'); ?>" class="input-xlarge">
                                                        </div>
                                                </div>
                                                <!-- phone -->
                                                <div class="control-group">
                                                        <label class="control-label" for="phone"><?php echo $this->lang->line('phone');?></label>
                                                        <div class="controls">						
                                                            <input type="text" id="business_phone" name="business_phone" value="<?php echo (isset($query_business->phone))?$query_business->phone:'';?><?php echo set_value('business_phone'); ?>" class="input-xlarge">
                                                        </div>
                                                </div>
                    
                                                <!-- email -->
                                                <div class="control-group">
                                                        <label class="control-label" for="business_email"><?php echo $this->lang->line('email');?></label>
                                                        <div class="controls">						
                                                            <input type="text" id="business_email" name="business_email" value="<?php if(set_value('business_email') == ""){echo (isset($query_business->email))?$query_business->email:''; } else { echo set_value('business_email'); }?>" class="input-xlarge">
                                                        </div>
                                                </div>
                    
                                                <!-- web_address -->
                                                <div class="control-group">
                                                        <label class="control-label" for="web_address"><?php echo $this->lang->line('web_address');?></label>
                                                        <div class="controls">						
                                                            <input type="text" id="business_web_address" name="business_web_address" value="<?php echo (isset($query_business->web_address))?$query_business->web_address:'';?><?php echo set_value('business_web_address'); ?>" class="input-xlarge">
                                                        </div>
                                                </div>
                                                <!-- intro_text -->
                                                <div class="control-group">
                                                        <label class="control-label" for="intro_text"><?php echo $this->lang->line('intro_text');?></label>
                                                        <div class="controls">						
                                                            <input type="text" id="business_intro_text" name="business_intro_text" value="<?php echo (isset($query_business->intro_text))?$query_business->intro_text:'';?><?php echo set_value('business_intro_text'); ?>" class="input-xlarge">
                                                        </div>
                                                </div>
                                               
                    
                                               <div class="form-actions">
                                                    <input name="submit" class="btn btn-primary" type="submit" value="<?php echo $this->lang->line('save');?>">
                                                    <a href="<?php echo base_url(); ?>users" class="btn">Cancel</a>
                                                </div>
                                            <input type="hidden" name="user_id" value="<?php echo @$query->id;?>">	
                                            </fieldset>
                    
                                        <?php 
                                        echo form_close(); ?>
                                    </div>
                <!-- connected_to Deatails  -->			
                    <div class="tab-pane" id="connected_to">
                                            <?php
                                            $attributes = array('class' => 'form-horizontal', 'id' => 'connected_to','name' =>'connected_to');
                                            echo form_open_multipart('users/connected_to',$attributes); ?>
                                            <fieldset>
                                               
                                            <!--connected to -->
                                                <div class="control-group">
                                                        <label class="control-label" for="connected_to"></label>
                                                        <div class="controls">						
                                                            <?php //echo '<pre>'; print_r($query_social);?>
                                                            <?php 
                                                            if(!empty($query_social))
                                                                { 
                                                                    foreach($query_social as $key=>$value)
                                                                        { ?>
                                                                        
                                                                            <!-- <div><?=$value->id?></div>
                                                                            <div><?=$value->user_id?></div> -->
                                                                            <div><?=$value->social_type?> :-  <?=$value->profile_address?> </div>
                                                                            
                                                                            <!-- <div><?=$value->status?></div>
                                                                            <div><?=$value->created?></div>
                     -->
                                                                  <?php }
                                                                }
                                                                else
                                                                { }
                    
                    
                                                            ?>
                    
                                                        </div>
                                                </div>
                                               
                                                <div class="form-actions">
                                                    <input name="submit" class="btn btn-primary" type="submit" value="<?php echo $this->lang->line('save');?>">
                                                    <a href="<?php echo base_url(); ?>users" class="btn">Cancel</a>
                                                </div>
                                            <input type="hidden" name="user_id" value="<?php echo @$query->id;?>">	
                                            </fieldset>
                    
                                        <?php 
                                        echo form_close(); ?>
                                    </div>
                <!-- Deal Deatails  -->			
                    <div class="tab-pane" id="deal">
                                        <?php
                                            $attributes = array('class' => 'form-horizontal', 'id' => 'frm_deal','name' =>'frm_deal');
                                            echo form_open_multipart('users/deals',$attributes); ?>
                                            <fieldset>
                                               
                                            <!--company_name -->
                                                <div class="control-group">
                                                        <label class="control-label" for="deal"><?php echo $this->lang->line('describe_deal');?></label>
                                                        <div class="controls">	
                                                                <textarea id="deal" name="deal" class="input-xlarge"><?php echo (isset($query_deal->description))?$query_deal->description:'';?><?php echo set_value('deal'); ?></textarea>			
                                                            
                                                        </div>
                                                </div>
                                               <div class="form-actions">
                                                    <input name="submit" class="btn btn-primary" type="submit" value="<?php echo $this->lang->line('save');?>">
                                                    <a href="<?php echo base_url(); ?>users" class="btn">Cancel</a>
                                                </div>
                                            <input type="hidden" name="user_id" value="<?php echo @$query->id;?>">	
                                            </fieldset>
                                            <?php 
                                        echo form_close(); ?>
                                    </div>
                <!-- subscription  Deatails  -->			
			   		<div class="tab-pane" id="subscription">
					<div class="row-fluid sortable ui-sortable">	
                                            <div class="">
					<div class="tab-pane" id="business">
						<?php
						$attributes = array('class' => 'form-horizontal', 'id' => 'frm_subscription','name' =>'frm_business');
						echo form_open('users/extendsExpiryDate',$attributes); ?>
					<div class="box-content">
						<table class="table table-bordered">
							  <tbody>
								<tr>
									<td>Subscription Date</td>
									<td class="center"><?=$query->subcription_date;?></td>
									                                      
								</tr>

								<tr>
									<td>Expiry Date</td>
									<td class="center"><?=$query->expiry_date;?></td>
									                                     
								</tr><tr>
									<td>Extend Expiry Date</td>
									<td class="center"><input type="text" class="input-xlarge datepicker" id="special_date" name="special_date" value="<?=@$query->expiry_date;?><?php echo set_value('created'); ?>">
<div><span class="help-inline">Leave blank if you don't extend<br/>Special privilage - Set User Expiry Date form here </span></div>
									<input name="submit" class="btn btn-primary" type="submit" value="<?php echo $this->lang->line('save');?>"></td>
									                                     
								</tr>

								   <input type="hidden" name="user_id" value="<?php echo @$query->id;?>">                         
							  </tbody>
						 </table>  
						 
					</div>
					<?php echo form_close();?>
				</div><!--/span-->
				
				
			</div>
					
                                            <div class="box">
					<div class="box-content">
						<table class="table">
						  <thead>
							  <tr>
								  <th>Subscription ID</th>
                                   <th>Transaction ID</th>
								  <th>Paypal Email</th>
								  <th>Status</th>
								  <th>Created</th>
								  <th>Modified</th>
								 </tr>
						  </thead>   
						  <tbody>
                         
							<?php 
							
							if(!empty($query_subscription)){?>
                            <tr>
								<td><?php echo (@$query_subscription->subscription_id != '') ? $query_subscription->subscription_id : '---';?></td>
                                <td><?php echo (@$query_subscription->transaction_token != '')? $query_subscription->transaction_token: '---';?></td>
								<td class="center"><?=@$query_subscription->paypal_email;?></span></td>
								<td class="center"><span class="label label-success"><?=ucfirst(@$query_subscription->payment_status);?></span></td>
								<td class="center"><?=@$query_subscription->created;?></span></td>
								<td class="center"><?=@$query_subscription->modified;?></span></td>
								
								
							</tr>
                            <?php } else {?>
                            <tr>
                            	<td colspan="5" align="center">Subscription Details is not found for this User</td>
                            </tr>
                            <?php }?>
                            
						  </tbody>
					  </table>            
					</div>
				</div>
                                        </div>

							
                                        </div>
			</div>
                <div class="box-content" style="display: none;">
                    
                </div>
		
	</div>
</div>
<!-- End Personal Tab -->


