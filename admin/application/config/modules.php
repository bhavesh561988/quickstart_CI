<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| List of all modules
|--------------------------------------------------------------------------
|
| List of all modules in array to loaded in front.
|
*/
$config['modules_list']	= array(
						'dashboard',
						'users',
                        'cms',
						/*'plantype',*/
						'settings'
						
			       );

/*
|--------------------------------------------------------------------------
| List of all modules icons which you need to display on menu
|--------------------------------------------------------------------------
|
| modulename[classname]
|
*/
$config['modules_menu_icon']	= array(
						'dashboard' => 'icon-home',
						'users' => 'icon-user',
                                                'orders' => 'icon-book',
                                                'subscriptions' => 'icon-book',
                                                'plans' => 'icon-plan',
						'plantype' => 'icon-plantype',
						'mobiappstore' => 'icon-shopping-cart',
						'settings' => 'icon-cog',
						'cms' => 'icon-book'						
					);

/* End of file modules.php */
/* Location: ./application/config/modules.php */
