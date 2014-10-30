<?php
/**
	 * @name: users/form.php
	 * 
	 * @desc: view/edit orders main listing view users for admin
	 * 
	 * @author: Bhavesh Khanpara
	 */
?>
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-edit"></i> <?php echo $this->lang->line('user_profile');?></h2>
		</div>
		

		<div class="box-content">
			<?php echo form_open('users/profile','class="form-horizontal"'); ?>
				<fieldset>
					<legend>
						<?php echo $this->lang->line('edit_profile'); ?>
					</legend>
                                    
                                        <!-- Message box for success/warning/error-->
					<?php if(validation_errors()){?>
					<div class="alert alert-error">
						<ul>
							<?php echo validation_errors(); ?>
						</ul>
					</div>
					<?php } ?>
                                       
                 <!--Email Address of user -->
                    <div class="control-group">
						<label class="control-label" for="email"><?php echo $this->lang->line('email');?></label>
						<div class="controls">						
							<input type="text" id="email" name="email" value="<?php echo (isset($query->email))?$query->email:'';?><?php echo set_value('email'); ?>" class="input-xlarge">
						</div>
					</div>
                                        
                <!--Username will be used as nick_name 
					<div class="control-group">
						<label class="control-label" for="firstnam"><?php echo $this->lang->line('first_name');?></label>
						<div class="controls">						
							<input type="text" id="" name="username" value="<?php echo (isset($query->first_name))?$query->first_name:'';?><?php echo set_value('first_name'); ?>" class="input-xlarge">
						</div>
					</div> -->
					
                <!-- Old Password -->
					<div class="control-group">
						<label class="control-label" for="old_password"><?php echo $this->lang->line('old_password');?></label>
						<div class="controls">						
							<input type="text" id="old_password" name="old_password" value="" class="input-xlarge">
						</div>
					</div>
                <!--New Password  -->
					<div class="control-group">
						<label class="control-label" for="new_password"><?php echo $this->lang->line('new_password');?></label>
						<div class="controls">						
							<input type="text" id="" name="new_password" value="" class="input-xlarge">
						</div>
					</div>
				<!--cong Password 
					<div class="control-group">
						<label class="control-label" for="passconf"><?php echo $this->lang->line('passconf');?></label>
						<div class="controls">						
							<input type="text" id="" name="passconf" value="" class="input-xlarge">
						</div>
					</div>	 -->

					<div class="form-actions">
						<input name="submit" class="btn btn-primary" type="submit" value="<?php echo $this->lang->line('save');?>">
						<a href="<?php echo base_url(); ?>users/" class="btn">Cancel</a>
					</div>
				</fieldset>
			<?php echo form_close(); ?>
		
		</div>
	</div><!--/span-->

</div><!--/row-->