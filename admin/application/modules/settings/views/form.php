<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-edit"></i> <?php echo $this->lang->line('settings_menu');?></h2>
		</div>
		

		<div class="box-content">
			<?php echo form_open('','class="form-horizontal"'); ?>
				<fieldset>
					<?php if($this->session->flashdata('info')){?>
					<div class="alert alert-success">
						<?php echo $this->session->flashdata('info')?>
					</div>
					<?php } ?>
					<?php echo validation_errors(); ?>
					<?php foreach($query as $row): ?>
						<div class="control-group">
							<label class="control-label" for="<?php echo $row->key;?>"><?php echo $row->label;?></label>
							<div class="controls">						
								<input type="text" id="<?php echo $row->key;?>" name="settings[<?php echo $row->key;?>]" value="<?php echo (isset($row->value))?$row->value:'';?><?php echo set_value('settings['.$row->key.']'); ?>" class="input-xlarge">
							</div>
						</div>
					<?php endforeach; ?>
					<div class="form-actions">
						<input name="submit" class="btn btn-primary" type="submit" value="<?php echo $this->lang->line('save');?>">
					</div>
				</fieldset>
			<?php echo form_close(); ?>
		
		</div>
	</div><!--/span-->

</div><!--/row-->