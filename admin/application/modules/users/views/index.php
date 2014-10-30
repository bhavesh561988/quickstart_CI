
<?php
/**
	 * @name: index.php
	 * 
	 * @desc: User main listing view file for admin
	 * 
	 * @author: Ravindra Shekhawat
	 */
?>
<!-- User Listing  Management -->
<?php
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
			<h2><i class="icon-shopping-cart"></i> <?php echo $this->lang->line('users'); ?></h2>
			<div class="box-icon" style="display:none;">
				<a href="<?php echo base_url(); ?>users/create" class="btn btn-primary"><i class="icon-plus icon-white"></i></a>
				
			</div>
		</div>
	<div id="container">				
		<div id="dynamic" class="display table table-striped table-condensed display table table-bordered table-striped table-condensed dataTable">
		<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered table-striped table-condensed dataTable " id="example">
			<thead>
				<tr>
				<th>Id</th>
				<th>Subscriber / User Name</th>
				<th>Plan Type</th>
				<th> W-Address </th> 
				<th>Phone</th>
				<th>City</th>
				<th>State</th>
				<th>Zipcode</th>
				<th>Status</th>				
				<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="7" class="dataTables_empty">Loading data from server</td>
				</tr>
			</tbody>			
		</table>       
		</div>
		
	</div><!--#container-->

</div><!--/row-->
<script type="text/javascript">
$(document).ready(function () {
	
	$('#example').dataTable( {
		
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "<?php echo base_url('users/get');?>",
		"aaSorting": [[ 0, "desc" ]],
		"aoColumns": [
            {"bVisible":false},
            null,
            null,
            {"fnRender": function(aoData) {
            	return '<a href="<?=base_url()?>users/listwaddress/'+aoData.aData[0]+'" class="" title="Click here to see all W-address of '+aoData.aData[1]+'" data-rel="tooltip">click for list</a>';
   			}},
             {"bVisible":false},
             {"bVisible":false},
             {"bVisible":false},
             {"bVisible":false},           
            {"fnRender": function(aoData) {
            	var status = (aoData.aData[8] == 1)? 'active':'inactive';
            	var statusClass = (aoData.aData[8] == 1)? 'active':'important'
   			return '<span class="label label-'+statusClass+' ">'+status+'</span>';
   			}},
            { "mDataProp": function( data, type, val ) {
            	return '<a class="btn btn-mini btn-info" href="<?php echo base_url(); ?>users/edit/'+data[0]+'"><i class="icon-edit icon-white"></i></a> <a class="btn btn-mini btn-danger" href="<?php echo base_url(); ?>users/delete/'+data[0]+'"><i class="icon-trash icon-white"></i></a>';
            },"bSortable":false}
        ]
	} );
	
	$(".btn-danger").live('click',function(){
		if(confirm("Are you sure you want to delete this data?"))
		location.href = "<?php echo base_url(); ?>users/delete/"+this.id;
		else
		return false;
	});	
});
</script>