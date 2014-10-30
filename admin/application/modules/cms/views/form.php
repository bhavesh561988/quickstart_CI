<?php
/**
	 * @name: form.php
	 * 
	 * @desc: CMS pages  view file and edit  for admin
	 * 
	 * @author: Ravindra Shekhawat
	 */
?>
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-book"></i> <?php echo $this->lang->line('add_page'); ?></h2>
		</div>
		<div class="box-content">
			<?php echo form_open('','class="form-horizontal"'); ?>
			<input type="hidden" name="action" id="action" value="<?php echo $this->uri->segment(3); ?>" />
			<fieldset>
            <?php if(validation_errors()){?>
                <div class="alert alert-error">
                    <ul>
                        <?php echo validation_errors(); ?>
                    </ul>
                </div>
            <?php } ?>
			<div class="accordion" id="accordion2">
				<div class="accordion-group">
					<div class="accordion-heading">
					  <!-- <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
					    <?php echo $this->lang->line('page_options'); ?>
					  </a> -->
					</div>
					<div id="collapseOne" class="accordion123-body collapse in">
					  <div class="accordion-inner">
                      	<div class="control-group" style="display:none;">
                        	<label class="control-label" for="lang"><?php echo $this->lang->line('language');?></label>	
                            <div class="controls">	
                            	<select id="lang" name="lang" data-rel="chosen">
									<?php foreach ($this->config->item('lang_uri_abbr') as $key => $value): ?>
                                    <option<?php if (isset($query->lang) && $query->lang == $key):?> selected="selected"<?php endif; ?> value="<?php echo $key;?>"<?php echo set_select('lang',$key); ?>><?php echo $value;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                        	<label class="control-label" for="title"><?php echo $this->lang->line('title');?></label>
                            <div class="controls">	
                            	<input type="text" name="title" id="title" value="<?php echo (isset($query->title))?$query->title:'';?><?php echo set_value('title'); ?>"  class="input-xlarge">
                            </div>
                        </div>
                        <?php if($this->uri->segment(2) == "create" ):?>
                        <div class="control-group">
                        	<label class="control-label" for="slug"><?php echo $this->lang->line('url');?></label>
                            <div class="controls">	
                            	<input type="text" name="slug" id="slug" value="<?php echo (isset($query->slug))?$query->slug:'';?><?php echo set_value('slug'); ?>"  class="input-xlarge">
                            </div>
                        <?php  endif;?>   
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="text"><?php echo $this->lang->line('content');?></label>
                          <div class="controls">
                          	<textarea class="cleditor" name="text" cols="" id="editor" cols="50" rows="10"><?php echo (isset($query->text))?$query->text:'';?><?php echo set_value('text'); ?></textarea>
                          </div>
                        </div>
					  </div>
					</div>
				</div>
				<div class="accordion-group" style="display:none;">
					<div class="accordion-heading">
					  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
					    <?php echo $this->lang->line('seo_panel_link');?>
					  </a>
					</div>
					<div id="collapseTwo" class="accordion-body collapse">
					  <div class="accordion-inner">
                     	<div class="control-group">
                        	<label class="control-label" for="seo_page_title"><?php echo $this->lang->line('seo_browser_title');?></label>
			
                            <div class="controls">	
                                <input type="text" id="seo_page_title" name="seo_page_title" value="<?php echo (isset($query->seo_page_title))?$query->seo_page_title:'';?><?php echo set_value('seo_page_title'); ?>" class="input-xlarge">
                            </div>
                        </div>
					    <div class="control-group">
                        	<label class="control-label" for="meta_keywords"><?php echo $this->lang->line('meta_keywords');?></label>
			
                            <div class="controls">	
                                <input type="text" id="meta_keywords" name="meta_keywords" value="<?php echo (isset($query->meta_keywords))?$query->meta_keywords:'';?><?php echo set_value('meta_keywords'); ?>" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                        	<label class="control-label" for="meta_description"><?php echo $this->lang->line('meta_description');?></label>
			
                            <div class="controls">
                            	<input type="text" id="meta_description" name="meta_description" value="<?php echo (isset($query->meta_description))?$query->meta_description:'';?><?php echo set_value('meta_description'); ?>" class="input-xlarge">
                            </div>
                        </div>                        
					  </div>
					</div>
				</div>
			</div>
            <div class="form-actions">
                <input name="submit" class="btn btn-primary" type="submit" value="<?php echo $this->lang->line('save');?>">
                <a href="<?php echo base_url(); ?>/cms/" class="btn">Cancel</a>
            </div>
            </fieldset>		
			<?php echo form_close(); ?>
		
		</div>
	</div><!--/span-->

</div><!--/row-->