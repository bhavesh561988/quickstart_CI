<?php 
//echo '<pre>';
//print_r($waddresses);

?>

<div class="row-fluid">		
				<div class="box span12">
					<div data-original-title="" class="box-header well">
						<h2><i class="icon-user"></i> List Of W-Addresses</h2>
					</div>
					<div class="box-content">
						<div role="grid" class="dataTables_wrapper" id="DataTables_Table_0_wrapper"><div class="row-fluid"><div class="span6"><div id="DataTables_Table_0_length" class="dataTables_length"></div></div></div>
						<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
						 
						<thead>
							  <tr role="row">
							  <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="" aria-sort="ascending" aria-label="Username: activate to sort column descending">W-Address</th>
							  <th class="" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="" aria-label="Date registered: activate to sort column ascending">Created Date</th>
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="" aria-label="Role: activate to sort column ascending">No of Authorized Social</th>
							  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="" aria-label="Status: activate to sort column ascending">Status</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 350px;" aria-label="Actions: activate to sort column ascending">Actions</th></tr>
						</thead>
						 <tbody role="alert" aria-live="polite" aria-relevant="all">

				 <?php foreach ($waddresses as $waddress){ ?>
					  <tr>
					  		<td class=""><?=$waddress->w_address;?></td>
							<td class="center "><?=$waddress->created;?></td>
							<td class="center "><?=$waddress->social_count;?></td>
							<td class="center ">
								<span class=""><?php echo $status = ($waddress->status == '1') ? 'Active' : 'Deactive';?></span>							</td>
							<td class="center ">
								<?php  /*if($query_userinfo->plan_id == 'commercial'){*/ ?>
								<a href='<?=base_url()?>users/editwaddress/<?=$waddress->id?>'class="btn btn-success">
									<i class="icon-zoom-in icon-white"></i>  
									View/Edit                                            
								</a>
								<?php /* } else {*/ ?>
									<!-- <a href='<?=base_url()?>users/edit/<?=$user_Id?>'class="btn btn-success">
									<i class="icon-zoom-in icon-white"></i>  
									View/Edit                                            
								</a> -->
								<?php /*}*/?> 
							</td>
					</tr>
			    <?php }?>
						</tbody>
						</table>
					</div>
				</div><!--/span-->
			
			</div>
			