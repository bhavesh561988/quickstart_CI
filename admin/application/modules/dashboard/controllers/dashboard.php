<?php
class Dashboard extends CI_Controller
{
	private $data = array();

	function __construct()
	{
		parent::__construct();

			
			if ($this->auth->logged_in() == FALSE) {
				$redirect_to = $this->config->item('base_url');
				redirect($redirect_to);

			}
			
			$this->template->set('controller', $this);
			$this->data['module_name'] = $this->router->fetch_module();
			$this->load->model('commonmodel');
	}
	
	function index()
	{
        $dashboard=$this->commonmodel->dashborad_details();
		$this->data['stats']['totalUsers'] = $dashboard['totalUsers'];
		//$this->data['stats']['totalPlans'] = $dashboard['totalPlans'];
		$this->data['stats']['totalCmsPages'] = $dashboard['totalCmsPages'];
		$this->data['stats']['totalSocialsettings'] = $dashboard['totalSocialsettings'];
        $this->template->load_partial('admin/admin_master', 'index', $this->data);
	}
}