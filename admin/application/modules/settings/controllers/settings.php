<?php

class Settings extends CI_Controller
{
	private $data = array();
	function __construct()
	{
		parent::__construct();
		
		#check if not logged in then redirect to login page
		if ($this->auth->logged_in() == FALSE) {
				$redirect_to = $this->config->item('base_url');
				redirect($redirect_to);

		}
		$this->template->set('controller', $this);
		$this->data['module_name'] = $this->router->fetch_module();
		$this->load->model('commonmodel');
		$this->load->model('settingmodel');
		//$this->output->enable_profiler(TRUE);
	}
	
	private $table = 'settings';	
	
	function index($num = 0)
	{
		//$this->auth->restrict(2);
		$this->load->library('form_validation');
		$this->data['query'] = $this->settingmodel->get_all();
		
		if (!$this->input->post('submit')) {				
			$this->template->load_partial('admin/admin_master', 'form', $this->data);
		} else {
			$settings = $this->input->post('settings');
			$this->settingmodel->save_configs($settings);
			$this->session->set_flashdata('info', $this->lang->line('success_edit'));
			redirect(base_url() . 'settings');
		}
		
	}
}