<?php

class Users extends CI_Controller {
	private $data 				= array();
	private $table 				= 'users';
	private $table_business 	= 'business_details';
	private $table_deals 		= 'deals';
	private $table_connected_to = 'socials';
	private $table_subscription = 'payments';
	private $table_waddress 	= 'waddresses';
	
	function __construct(){
		parent::__construct();

		#check if not logged in then redirect to login page
		if ($this->auth->logged_in() == FALSE) {
				$redirect_to = $this->config->item('base_url');
				redirect($redirect_to);
		}

		$this->template->set('controller', $this);
		$this->data['module_name'] = $this->router->fetch_module();
		$this->load->model('commonmodel');
		$this->load->model('usersmodel');
	}

    public function index($num = 0){
            $this->template->load_partial('admin/admin_master', 'users/index', $this->data);
    }

    public function get() {
        $result = $this->usersmodel->get();
        echo $result;
        exit;
    }
	
	public function create(){	
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		
		//Validation
		$this->form_validation->set_rules('email', 'Personal Details <b>Email</b>', 'required|valid_email');
		$this->form_validation->set_message('valid_email', 'The Personal Details <b>Email</b> field must contain a valid email address.');
		//$this->form_validation->set_rules('first_name', 'Personal Details <b>First Name</b>', 'trim|is_unique[users.last_name]');
		$this->form_validation->set_rules('last_name', 'Personal Details <b>Subscribers name</b>', 'trim|is_unique[users.last_name]');
		//$this->form_validation->set_rules('w_address', 'Personal Details <b>W address</b>', 'required|is_unique[users.w_address]');
		$this->form_validation->set_rules('intro_text', 'Personal Details <b>Intro text</b>', 'trim');
		$this->form_validation->set_rules('address', 'Personal Details <b>address</b>', 'trim');
		$this->form_validation->set_rules('phone', 'Personal Details <b>phone</b>', 'trim');
		$this->form_validation->set_rules('city', 'Personal Details <b>city</b>', 'trim');
		$this->form_validation->set_rules('state', 'Personal Details <b>state</b>', 'trim');
		$this->form_validation->set_rules('zipcode', 'Personal Details <b>zipcode</b>', 'trim');
		$this->form_validation->set_rules('plan_id', 'Personal Details <b>plan_id</b>', 'required|callback_check_default');
		$this->form_validation->set_message('check_default', 'You need to select <b>PlanType</b> other than the default');
		$this->form_validation->set_error_delimiters('<li>', '</li>');
        
        $this->data['confirm']=  $this->config->item('confirm');
        $this->data['status']=  $this->config->item('status');
        $this->data['plantype']=  $this->config->item('plantype');
                
		if ($this->form_validation->run() == FALSE){	
			$this->template->load_partial('admin/admin_master', 'users/form', $this->data);
		} else {
			if($_FILES['userfile']['tmp_name'] != ""){
    		    $return_data = $this->do_upload('userfile');
    				if($return_data != "error"){
    				$image_name = $return_data['upload_data']['file_name'];
			    	$_POST['profile_pic'] = $image_name;
				}
				else{
					$_POST['profile_pic'] = "";
				}
			}	 
			$this->usersmodel->save($id=0);

			/*Send Mail*/
			$query = $this->db->get_where('users', array(    'last_name' => $this->input->post('last_name'),
                                                             'role_id' => '2',
                                                         ), 1
                                        );
            if ($query->num_rows() === 1) {
		 		$row = $query->row();
		 		$data['row'] = $row;
		 		$this->load->library('email');
				$message = $this->load->view('conformation',$data,TRUE); 
				$this->email->initialize(array('mailtype' => 'html'));
				$this->email->to($row->email);
				$this->email->from($this->config->item('email_from'), 'Waddress');
				$this->email->subject('Waddress Team:Welcome to Our site - Mail Conformation');                
				$this->email->message($message);
				$this->email->send();
				//echo $this->email->print_debugger();
				//exit;
			}

			/*End send mail*/	
			$this->session->set_flashdata('info', $this->lang->line('success_insert'));
			redirect(base_url() . 'users');			
		}
	}

	public function check_default($post_string){
  		return $post_string == '0' ? FALSE : TRUE;
	}

	public function edit($id){
		$this->data['show_perosnalTab'] 	= TRUE;
		$this->data['show_businessTab'] 	= TRUE;
		$this->data['show_dealTab'] 		= TRUE;
		$this->data['show_connectedTab'] 	= TRUE;
		$this->data['show_subscriptionTab'] = TRUE;
        //Get data from database 
        $this->data['query'] = $this->commonmodel->get_item_by_id($this->table, $id);
		//$this->data['query_business'] = $this->commonmodel->get_business_by_userId($this->table_business, $id);
		//$this->data['query_social'] = $this->commonmodel->get_connected_to_by_userId($this->table_connected_to, $id);
		//$this->data['query_deal'] = $this->commonmodel->get_deal_by_userId($this->table_deals, $id);
		$this->data['query_subscription'] = $this->commonmodel->get_by_userId($this->table_subscription, $id);
		
		//Load lib for validation		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		//Validation
		$this->form_validation->set_rules('email', 'Personal Details <b>Email</b>', 'required|valid_email');
		$this->form_validation->set_message('valid_email', 'The Personal Details <b>Email</b> field must contain a valid email address.');
		//$this->form_validation->set_rules('first_name', 'Personal Details <b>First Name</b>', 'trim');
		//$this->form_validation->set_rules('last_name', 'Personal Details <b>Last Name</b>', 'required');
		$this->form_validation->set_rules('intro_text', 'Personal Details <b>Intro text</b>', 'trim');
		$this->form_validation->set_rules('address', 'Personal Details <b>address</b>', 'trim');
		$this->form_validation->set_rules('phone', 'Personal Details <b>phone</b>', 'trim');
		$this->form_validation->set_rules('city', 'Personal Details <b>city</b>', 'trim');
		$this->form_validation->set_rules('state', 'Personal Details <b>state</b>', 'trim');
		$this->form_validation->set_rules('zipcode', 'Personal Details <b>zipcode</b>', 'trim');
		
		//set validation element 
		$this->form_validation->set_error_delimiters('<li>', '</li>');	
                
        //Load Config items
        $this->data['confirm']  =  $this->config->item('confirm');
        $this->data['status']   =  $this->config->item('status');
        $this->data['plantype'] =  $this->config->item('plantype');
                
		
		if (!$this->input->post('submit')) {
				$this->template->load_partial('admin/admin_master', 'users/form', $this->data);
		} else {
	                if ($this->form_validation->run() == FALSE)
	                {	
	             	        $this->template->load_partial('admin/admin_master', 'users/form', $this->data);
	                }
	                else
	                {		
	                	if($_FILES['userfile']['tmp_name'] != ""){
	                		    $return_data = $this->do_upload('userfile');
	                			if($return_data != "error"){
	                				$image_name = $return_data['upload_data']['file_name'];
							    	$_POST['profile_pic'] = $image_name;
								}
								else{
									$_POST['profile_pic'] = "";
								}
						}	 	
							$this->usersmodel->save($id);
	                        $this->session->set_flashdata('info', $this->lang->line('success_personal_edit'));
	                        redirect(base_url() . "users/edit/$id");					
			   		}
				}			
	}


	public function _validate_phone_number( $string ) {
		if (!preg_match( '/^[+]?([\d]{0,3})?[\(\.\-\s]?([\d]{3})[\)\.\-\s]*([\d]{3})[\.\-\s]?([\d]{4})$/', $string ) ) {
				 $this->form_validation->set_message('_validate_phone_number', 'Please Enter valid phone number like (555) 555-5555');
			return FALSE;
		}
		return TRUE;
	}
	public function business_details(){
		@$id = $this->session->userdata('wid');
		//Get data from database 
    	$this->data['query_business'] = $this->commonmodel->get_business_by_wId($this->table_business, $id);
		$this->data['query_social']   = $this->commonmodel->get_connected_to_by_wId($this->table_connected_to, $id);
		$this->data['query_deal']     = $this->commonmodel->get_deal_by_wId($this->table_deals, $id);
	
		if(empty($this->data['query_business'])) 
			$action = "add";
		else
			$action = "update"; 

		//Load lib for validation		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		if($this->input->post('business_phone') != ''){
				$this->form_validation->set_rules('business_phone', 'phone', 'trim|xss_clean|callback__validate_phone_number');
		}

		if($this->input->post('business_web_address') != ''){
			$this->form_validation->set_rules('business_web_address', 'Web Address', 'trim|required|callback_url_checking');
		}	
		
		$this->form_validation->set_rules('business_company_name', 'business company name', 'trim');
		//$this->form_validation->set_rules('business_email', 'Business Email', 'trim');
		//$this->form_validation->set_message('valid_email', 'The Business Email field must contain a valid email address.');
		$this->form_validation->set_error_delimiters('<li>', '</li>');	
		$this->data['confirm']	=  $this->config->item('confirm');
        $this->data['status']	=  $this->config->item('status');
        if (!$this->input->post('submit')) {
			 $this->template->load_partial('admin/admin_master', 'users/editwaddress', $this->data);
		}else{
		 
	        if ($this->form_validation->run() == FALSE){
	           $this->template->load_partial('admin/admin_master', 'users/editwaddress', $this->data);
	        }
	        else {	
	        	//brand or logo image upload
				if($_FILES['brand_logo']['tmp_name'] != ""){
	            		    $return_data_brand = $this->do_upload('brand_logo');
	            			
	            		   	if($return_data_brand != "error"){
	            				$image_name_brand 		= $return_data_brand['upload_data']['file_name'];
						    	$_POST['brand_pic'] 	= $image_name_brand;
							}
							else{
								$_POST['brand_pic'] 	= "";
							}
					}	 	
	           //bsiness pic upload
			  	if($_FILES['userfile']['tmp_name'] != ""){
	            		    $return_data = $this->do_upload('userfile');
	            			
	            		   	if($return_data != "error"){
	            				$image_name 			= $return_data['upload_data']['file_name'];
						    	$_POST['business_pic']  = $image_name;
							}
							else{
								$_POST['business_pic']  = "";
							}
					}	 	
	    		$this->usersmodel->save_business_details($action);
	            $this->session->set_flashdata('info', $this->lang->line('success_business_edit'));
	            redirect(base_url() . "users/editwaddress/$id/business");				
	        }
		}

	}
	public function deals()
	{

		@$id = $this->session->userdata('wid');
		$this->data['query_business'] = $this->commonmodel->get_business_by_wId($this->table_business, $id);
		$this->data['query_social']   = $this->commonmodel->get_connected_to_by_wId($this->table_connected_to, $id);
		$this->data['query_deal'] 	  = $this->commonmodel->get_deal_by_wId($this->table_deals, $id);
		
		if(empty($this->data['query_deal'])) 
			$action = "add";
		else
			$action = "update"; 
		
		//Load lib for validation		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('deal', '<b>Deal</b>', 'required|max_length[150]');
		$this->form_validation->set_message('max_length', 'The <b>Deal</b> field Maximum 150 character allow');
		$this->form_validation->set_error_delimiters('<li>', '</li>');	
		$this->data['confirm'] =  $this->config->item('confirm');
        $this->data['status']  =  $this->config->item('status');
         
        if ($this->form_validation->run() == FALSE){
           $this->template->load_partial('admin/admin_master', 'users/editwaddress', $this->data);
        }
        else {	
        	
        		$this->usersmodel->save_deals($action);
                $this->session->set_flashdata('info', $this->lang->line('success_deals_edit'));
               redirect(base_url() . "users/editwaddress/$id/deal");				
        }
	}

	public function extendsExpiryDate()
	{
		@$id = $_POST['w_id'];
		//Get data from database 
        $this->data['query'] = $this->commonmodel->get_item_by_id($this->table_waddress, $id);
		$this->data['query_business'] = $this->commonmodel->get_business_by_wId($this->table_business, $id);
		$this->data['query_social'] = $this->commonmodel->get_connected_to_by_wId($this->table_connected_to, $id);
		$this->data['query_deal'] = $this->commonmodel->get_deal_by_wId($this->table_deals, $id);
		$this->data['query_subscription'] = $this->commonmodel->get_by_wId($this->table_subscription, $id);

		//Load lib for validation		
			
				if($this->input->post('special_date') != ''){
        			$this->usersmodel->save_extendsExpiryDate();
                	$this->session->set_flashdata('info', $this->lang->line('success_edit'));
                }
                redirect(base_url() . "users/editwaddress/$id");				
        }
	

	public function profile()
	{
		//$this->auth->restrict(2);
		$id = $this->session->userdata('user_id');
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('old_password', 'lang:old_password', 'required');
		$this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[8]|max_length[15]');
		//$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[new_password]');
		//$this->form_validation->set_rules($rules);
		$this->form_validation->set_error_delimiters('<div class="alert-error">
			<button type="button" class="close" data-dismiss="alert">×</button>', '</div>');		
                
		if (!$this->input->post('submit')) {
				$this->data['query'] = $this->commonmodel->get_item_by_id($this->table, $id);
				$this->template->load_partial('admin/admin_master', 'users/profile', $this->data);
		}
		else 
		{
			if ($this->form_validation->run() == FALSE){
				$this->template->load_partial('admin/admin_master', 'users/profile', $this->data);
			}
			else{
				$profile_res = $this->usersmodel->profile();
				if($profile_res=="done"){
					$this->session->set_flashdata('info', $this->lang->line('success_edit'));
				}else if($profile_res == "not_changed")	{
					$this->session->set_flashdata('error', "Something Went Wrong, Password Not Changed");
				}else{
					$this->session->set_flashdata('error', "Wrong Old Password");
				}
				redirect(base_url() . '/users');					
			}
		}
	}	
	
	public function delete($id)
	{
		//$this->auth->restrict(2);
		$this->commonmodel->delete($this->table, $id);
		$this->commonmodel->delete_business_by_id($this->table_business, $id);
		$this->commonmodel->delete_by_uid($this->table_deals, $id);
		$this->commonmodel->delete_by_uid($this->table_waddress, $id);
		$this->commonmodel->delete_by_uid($this->table_connected_to, $id);
		$this->commonmodel->delete_by_uid($this->table_subscription, $id);
		$this->session->set_flashdata('info', $this->lang->line('success_delete'));
		redirect(base_url() . 'users');	
	}	
	
	public function check_password($str){
		$id = ($this->uri->segment(3) == 'profile') ? $this->session->userdata('id') : $this->uri->segment(4);
		if ($id == FALSE) {
			if ($this->usersmodel->check_password($str) == 0) {
				return true;
			} else {
				$this->form_validation->set_message('_check_password', $this->lang->line('incorrect_password'));
				return false;
			}		
		}
	}

	/*Method for Check Web Address is start with Http or https*/
	public function url_checking($str){
     	$pattern = "/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i";
        if (!preg_match($pattern, $str)){
               $this->form_validation->set_message('url_checking', 'Please Enter Web Address with http or https like (http://www.yoursite.com)');
               return FALSE;
        }
        return TRUE;
	}

	public function do_upload($newname){
		$config['upload_path'] 		= UPLOAD_DIR.'user/';
	    $config['allowed_types'] 	= '*';
	    $config['max_size']			= '6000000';
	    $config['remove_spaces'] 	= TRUE;
	    $config['encrypt_name'] 	= TRUE;
	    $this->load->library('upload', $config);
		 if ( ! $this->upload->do_upload($newname)){
	        $error = array('error' => $this->upload->display_errors());
	       print_r($error);
	       exit;
	        return 'error';
	    } else  { 
	    	return $Image_data = array('upload_data' => $this->upload->data());
	    }
	}

	public function listwaddress($id){
		$this->data['user_Id'] = $id;
		$this->data['query_userinfo'] = $this->commonmodel->get_item_by_id($this->table, $id);
		$this->data['waddresses'] = $this->commonmodel->getwaddress_by_userId($this->table_waddress,$id);
		$this->template->load_partial('admin/admin_master', 'users/waddresslist', $this->data);
	}

	public function editwaddress($id){
		$this->session->set_userdata('wid',$id);
		//Get data from database 
        $this->data['query'] = $this->commonmodel->get_item_by_id($this->table_waddress, $id);
        $this->data['query_business'] = $this->commonmodel->get_business_by_wId($this->table_business, $id);
		$this->data['query_social'] = $this->commonmodel->get_connected_to_by_wId($this->table_connected_to, $id);
		$this->data['query_deal'] = $this->commonmodel->get_deal_by_wId($this->table_deals, $id);
		$this->data['query_subscription'] = $this->commonmodel->get_by_wId($this->table_subscription, $id);
		//Load lib for validation		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		//Validation
		$this->form_validation->set_rules('email', 'Personal Details <b>Email</b>', 'required|valid_email');
		$this->form_validation->set_message('valid_email', 'The Personal Details <b>Email</b> field must contain a valid email address.');
		$this->form_validation->set_rules('first_name', 'Personal Details <b>First Name</b>', 'required');
		$this->form_validation->set_rules('last_name', 'Personal Details <b>Last Name</b>', 'required');
		$this->form_validation->set_rules('intro_text', 'Personal Details <b>Intro text</b>', 'required');
		$this->form_validation->set_rules('area_code', 'Personal Details <b>Area code</b>', 'required');
		$this->form_validation->set_rules('phone', 'Personal Details <b>phone</b>', 'required');
		$this->form_validation->set_rules('city', 'Personal Details <b>city</b>', 'required');
		$this->form_validation->set_rules('state', 'Personal Details <b>state</b>', 'required');
		$this->form_validation->set_rules('zipcode', 'Personal Details <b>zipcode</b>', 'required');
		//set validation element 
		$this->form_validation->set_error_delimiters('<li>', '</li>');	
        //Load Config items
        $this->data['confirm']=  $this->config->item('confirm');
        $this->data['status']=  $this->config->item('status');
        $this->data['plantype']=  $this->config->item('plantype');
        if (!$this->input->post('submit')) {
				$this->template->load_partial('admin/admin_master', 'users/editwaddress', $this->data);
		} else {
                if ($this->form_validation->run() == FALSE){	
             	        $this->template->load_partial('admin/admin_master', 'users/editwaddress', $this->data);
                } else {		
                	if($_FILES['userfile']['tmp_name'] != ""){
                		    $return_data = $this->do_upload('userfile');
                			
                		   	if($return_data != "error"){
                				$image_name = $return_data['upload_data']['file_name'];
						    	$_POST['profile_pic'] = $image_name;
							}
							else{
								$_POST['profile_pic'] = "";
							}
					}	 	
            		$this->usersmodel->save($id);
                    $this->session->set_flashdata('info', $this->lang->line('success_personal_edit'));
                    redirect(base_url() . "users/edit/$id");					
             }
		}			
	}
}