<?php
/**
	 * @name: index.php
	 * 
	 * @desc: Mobi App Store   main listing view file for admin
	 * 
	 * @author: Pratyush Dimiri
	 */
if($this->session->flashdata('info')){?>
<div class="alert alert-success">
<?php echo $this->session->flashdata('info')?>
</div>
<?php } ?>
<?php if($this->session->flashdata('error')){?>
<div class="alert alert-error">
<?php echo $this->session->flashdata('error')?>
</div>
<?php } ?>
<link href="<?php echo admin_asset_url();?>css/datatable.css" rel="stylesheet">
<div class="row-fluid">		
	<div class="box-header well" data-original-title>
			<h2><i class="icon-shopping-cart"></i> <?php echo $this->lang->line('cms'); ?></h2>
			<div class="box-icon" style="display:none;">
				<a href="<?php echo base_url(); ?>cms/create" class="btn btn-primary"><i class="icon-plus icon-white"></i></a>
			</div>
		</div>
	<div id="container">				
		<div id="dynamic">
		<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered table-striped table-condensed" id="example">
			<thead>
				<tr>
				<th width="0%">id</th>
				<th  width="35%"><?php echo $this->lang->line('title');?></th>
				<th width="20%"><?php echo $this->lang->line('url');?></th>
				<th width="35%"><?php echo $this->lang->line('language');?></th>
				<th width="10%">Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="4" class="dataTables_empty">Loading data from server</td>
				</tr>
			</tbody>			
		</table>       
		</div>
		
	</div><!--/span-->

</div><!--/row-->
<script type="text/javascript">
	

$(document).ready(function () {
	
	var lang= <?php echo json_encode($this->config->item('lang_desc'));?>;
	$('#example').dataTable( {
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "<?php echo base_url('cms/get');?>",
		"aoColumns": [
            {"bVisible":false},
            null,
            null,
            {"fnRender": function(aoData) {
   			return aoData.aData[3]+' ('+lang[aoData.aData[3]]+')';
   			}},
            { "mDataProp": function( data, type, val ) {
            	return '<a class="btn btn-mini btn-info" href="<?php echo base_url(); ?>cms/edit/'+data[0]+'"><i class="icon-edit icon-white"></i></a>';
            },"bSortable":false }
        ]
	} );
	/*<a class="btn btn-mini btn-danger" href="<?php echo base_url(); ?>cms/delete/'+data[0]+'"><i class="icon-trash icon-white"></i></a>*/
	$(".btn-danger").live('click',function(){
		if(confirm("Are you sure you want to delete this data?"))
		location.href = "<?php echo base_url(); ?>cms/delete/"+this.id;
		else
		return false;
	});	
});
</script>