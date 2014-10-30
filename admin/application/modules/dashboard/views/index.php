<?php
/**
	 * @name: index.php
	 * 
	 * @desc: Dashborad page main listing of all modules for admin
	 * 
	 * @author: Ravindra Shekhawat
	 */
?>

<div class="sortable row-fluid">
    <a data-rel="tooltip" class="well span3 top-block" style="width: 30%" href="<?php echo base_url(); ?>users">
                <span class="icon32 icon-blue icon-users"></span>
                <div>Total Active Users</div>
                <div><?php echo ($stats['totalUsers'])?$stats['totalUsers']:0;?></div>
        </a>
        
    <a data-rel="tooltip" class="well span3 top-block" style="width: 30%" href="<?php echo base_url(); ?>cms">
                <span class="icon32 icon-blue icon-book-empty"></span>
                <div>CMS Pages</div>
                <div><?php echo ($stats['totalCmsPages'])?$stats['totalCmsPages']:0;?></div>
        </a>
    <a data-rel="tooltip" class="well span3 top-block" style="width: 30%" href="<?php echo base_url(); ?>settings">
                <span class="icon32 icon-blue icon-gear"></span>
                <div>Settings</div>
                <div><?php echo ($stats['totalSocialsettings'])?$stats['totalSocialsettings']:0;?></div>
    </a>
        
</div>    
