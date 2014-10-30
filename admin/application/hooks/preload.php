<?php

class Preload {
	function checkModule()
	{
		$CI =& get_instance();
		$module_name = $CI->router->fetch_module();
		$list_of_modules = $CI->config->item('modules_list');
		$CI->load->language($CI->config->item('admin_language'), $CI->config->item('admin_language'));		

		if($module_name && isset($list_of_modules) && !in_array($module_name, $list_of_modules)) show_error("Please declare you module name in config/modules.php file.");
	}

	function loadSettings()
	{
		
		$CI =& get_instance();
		foreach($CI->Commonmodel->get('settings') as $site_config_db)
		{
			$CI->config->set_item($site_config_db->key,$site_config_db->value);
			//$CI->config->set_item('bhavesh','loadseettnfg');
		}
		
	}
	
}