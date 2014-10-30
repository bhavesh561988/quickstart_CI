<?php

class Admin extends CI_Controller
{
	function __construct(){	
		

		parent::__construct();

		
			$this->lang->load($this->config->item('admin_language'), $this->config->item('admin_language'));
	}
	
		private $rules = array(
                                array(
                                        'field'   => 'email',
                                        'label'   => 'lang:email',
                                        'rules'   => 'trim|required|valid_email',
                                ),
                                array(
                                        'field'   => 'password',
                                        'label'   => 'lang:password',
                                        'rules'   => 'trim|required|min_length[2]',
                                )
				      );
	
	function index()
	{
		$this->load->library('form_validation');
		$redirect_to = '/dashboard';
		if ($this->auth->logged_in() == FALSE) {
			$data['error'] = FALSE;
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules($this->rules);
			$this->form_validation->set_error_delimiters('<li>', '</li>');
			
			if ($this->form_validation->run() == FALSE)	{
				$this->load->view('admin/login', $data);
			} 	else  {	
				$this->auth->login($this->input->post('email'), $this->input->post('password'), $redirect_to, 'admin/login');
			}	
		}
		else {
			redirect($redirect_to);
		}
	}
        
    function forgotpassword()  {
        
        $this->load->library('form_validation');
        $redirect_to = '/forgotpassword';
        
        if ($this->auth->logged_in() == FALSE)   {
                $data['error'] = FALSE;
                $this->form_validation->set_rules(array(
						'field'   => 'email',
						'label'   => 'lang:email',
						'rules'   => 'trim|required|valid_email|email_exists',
					));
                $this->form_validation->set_error_delimiters('<li>', '</li>');

                if ($this->form_validation->run() == FALSE)  {
                        $this->load->view('admin/forgotpassword', $data);
                }  else  {	
                        $this->auth->forgot_password($this->input->post('email'),$redirect_to, 'forgotpassword');
                }	
        }
        else {
           redirect($redirect_to);
        }
	}
	
	function logout(){
		$this->auth->logout('/admin');
	}
}

?>