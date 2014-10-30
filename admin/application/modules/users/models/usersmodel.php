<?php
class Usersmodel extends CI_Model
{
	private $_usersTable = 'users';
    private $_businessTable = 'business_details';
	private $_plansTable = 'plans';
    private $_dealsTable = 'deals';
    private $_waddressTable = 'waddresses';
	function __construct(){
		parent::__construct();
	}
	
	function get() {
        $aColumns = array("$this->_usersTable.id",
						  "$this->_usersTable.last_name",
						  "$this->_usersTable.plan_id",
						  "$this->_usersTable.w_address",
                          "$this->_usersTable.phone",
                          "$this->_usersTable.city",
                          "$this->_usersTable.state",
                          "$this->_usersTable.zipcode",
                          "$this->_usersTable.status");
        $aColumnsAlias = array('id', 'last_name', 'plan_id', 'w_address', 'phone', 'city', 'state', 'zipcode','status');
		
        /* Table*/
        $sTable = $this->_usersTable;
        
        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = $this->_usersTable . '.id';

        /* Where (don't include 'WHERE') */
        $qWhere = "$this->_usersTable.id != ".$this->session->userdata('user_id')."";
        
        /* Join */        
        //$sJoin = "$this->_usersTable.plan_id = $this->_plansTable.id";
         $sJoin = "";
         //$sJoin = "LEFT JOIN $this->_plansTable ON $this->_usersTable.plan_id = $this->_plansTable.id";
        /*
		
         /* Paging
         */
        $sLimit = "";
        if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
            $sLimit = "LIMIT " . intval($_GET['iDisplayStart']) . ", " .
                    intval($_GET['iDisplayLength']);
        }

        /*
         * Ordering
         */
        $sOrder = "";
        if (isset($_GET['iSortCol_0'])) {
            $sOrder = "ORDER BY  ";
            for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
                if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
                    $sOrder .= "" . $aColumns[intval($_GET['iSortCol_' . $i])] . " " .
                            ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
                }
            }

            $sOrder = substr_replace($sOrder, "", -2);
            if ($sOrder == "ORDER BY") {
                $sOrder = "";
            }
        }

        /*
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */
        $sWhere = "";
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {        	
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++) {
                if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true") {
                    $sWhere .= "" . $aColumns[$i] . " LIKE '%" . mysql_real_escape_string($_GET['sSearch']) . "%' OR ";
                }
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';            
        }               

        /* Individual column filtering */
        for ($i = 0; $i < count($aColumns); $i++) {
            if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
                if ($sWhere == "") {
                    $sWhere = "WHERE ";
                } else {
                    $sWhere .= " AND ";
                }
                $sWhere .= "" . $aColumns[$i] . " LIKE '%" . mysql_real_escape_string($_GET['sSearch_' . $i]) . "%' ";
            }
        }
        
        /* Include query condition*/
        if($qWhere != '' && $sWhere != '')
        $sWhere = $sWhere." AND ".$qWhere;
        elseif ($qWhere != '' && $sWhere == '')
        $sWhere = 'WHERE '.$qWhere; 
		
        /* Final columns with alias */
        foreach ($aColumns as $key => $value) {
            $fColumns[] = $value . ' AS ' . $aColumnsAlias[$key];
        }

        /*
         * SQL queries
         * Get data to display
         */
        $sQuery = "
		SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $fColumns)) . "
		FROM   $sTable
		$sJoin
		$sWhere
		$sOrder
		$sLimit
		";
        $qResult = $this->db->query($sQuery)->result_array();

        /* Data set length after filtering */
        $sQuery = "SELECT FOUND_ROWS() AS tot_rows";
        $aResultFilterTotal = $this->db->query($sQuery)->row_array();
        $iFilteredTotal = $aResultFilterTotal['tot_rows'];

        /* Total data set length */
        $sQuery = "SELECT COUNT(" . $sIndexColumn . ") AS tot FROM  $sTable";
        $aResultTotal = $this->db->query($sQuery)->row_array();
        $iTotal = $aResultTotal['tot'];

        /*
         * Output
         */
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );

        foreach ($qResult as $aRow) {
            $row = array();
            for ($i = 0; $i < count($aColumnsAlias); $i++) {
                if ($aColumnsAlias[$i] == "version") {
                    /* Special output formatting for 'version' column */
                    $row[] = ($aRow[$aColumnsAlias[$i]] == "0") ? '-' : $aRow[$aColumnsAlias[$i]];
                } else if ($aColumnsAlias[$i] != ' ') {
                    /* General output */
                    $row[] = $aRow[$aColumnsAlias[$i]];
                }
            }
            $output['aaData'][] = $row;
        }

        return json_encode($output);
    }
	
	function get_groups($role = 0){
		//select groups without developer
		$this->db->select('id, title, description');
		$role = $this->session->userdata('group_id');
		if ($role == 4) {
			return $this->db->get_where($this->_roleTable, array('id >' => 2))->result();	
		} else {
			return $this->db->get_where($this->_roleTable, array('id' => 3))->result();	
		}
	}

	function get_all_groups(){
		//select groups without developer
		$this->db->select('id, title, description');
		return $this->db->get($this->_roleTable)->result();
	}
	
	function check_username($username){
		$this->db->select('username');
		return $this->db->get_where($this->_usersTable, array('username' => $username))->num_rows();
	}
	
	function encrypt_password($data){
		 return sha1($this->config->item('encryption_key').$data);
	}
	
	function get_user_password_by_id($id){
		$this->db->select('password');
		return $this->db->get_where($this->_usersTable, array('id' => $id))->row()->password;
	}
	
	function get_item_by_username($username){
		$this->db->select('id, username, name');
		return $this->db->get_where($this->_usersTable, array('username' => $username))->row();
	}
	
	function get_item_by_id($id){
		$this->db->select('id, username, name');
		return $this->db->get_where($this->_usersTable, array('id' => $id))->row();
	}	
	
	function save($id) {
            
            /*Phone published here*/
                if(@$this->input->post('phone_publish') == 'on'){
                    $phone_publish = '1';
                }else{
                    $phone_publish = '0';   
                }

            $data = array(
                        'email'         =>  $this->input->post('email'),
                        //'first_name'    =>  $this->input->post('first_name'),
                        'intro_text'    =>  $this->input->post('intro_text'),
                        'zipcode'     =>  $this->input->post('zipcode'),
                        'phone'         =>  $this->input->post('phone'),
                        'phone_publish' =>  $phone_publish,
                        'city'          =>  $this->input->post('city'),
                        'state'         =>  $this->input->post('state'),
                        'address'       =>  $this->input->post('address'), 
                        'status'        =>  $this->input->post('status'), 
                        'subcription_date' =>   $this->input->post('subcription_date'), 
                        'expiry_date'   =>  $this->input->post('expiry_date'),
                        'role_id'       => '2',
                       // 'status'        =>  $this->input->post('status'),
            );
       

        //echo "<pre>"; print_r($this->input->post('profile_pic'));exit;

        if($this->input->post('profile_pic') != "")  {
             $data['profile_pic']   =  $this->input->post('profile_pic');
        }
		
        if (@$id == FALSE) {
            $data['last_name']   =  $this->input->post('last_name');
            $data['w_address']   =  $this->input->post('w_address');
            $data['password']    =  $this->encrypt_password($this->input->post('password'));
            $data['plan_id']     =  $this->input->post('plan_id');
			$data['status']      =  '0';
            $data['created']     =  date('Y-m-d');
            $this->db->set($data);
			$this->db->insert($this->_usersTable);
		} else {
            //  $data['plan_id']     =  $this->input->post('plan_id');
            $data['status'] =  ($data['status'] == 'Active')? '1':'0';
            // $data['status']     =  $this->input->post('status');
			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update($this->_usersTable);
		}
    }

    function save_business_details($action){
            $data = array(
                        'company_name'    =>  $this->input->post('business_company_name'),
                        'address_1'       =>  $this->input->post('business_address_1'),
                        'city'            =>  $this->input->post('business_city'),
                        'state'           =>  $this->input->post('business_state'),
                        'country'         =>  $this->input->post('business_country'),
                        'zipcode'         =>  $this->input->post('business_zipcode'), 
                        'area_code'       =>  $this->input->post('business_area_code'),
                        'phone'           =>  $this->input->post('business_phone'),
                        'email'           =>  $this->input->post('business_email'),
                        'web_address'     =>  $this->input->post('business_web_address'),
                        'intro_text'      =>  $this->input->post('business_intro_text'),
            );
            
            //business Image
            if($this->input->post('business_pic') != "")  {
                 $data['business_pic']   =  $this->input->post('business_pic');
            }
            //brand or logo  
            if($this->input->post('brand_pic') != "")  {
                 $data['brand_logo']   =  $this->input->post('brand_pic');
            }

            $id = $this->session->userdata('wid');
            $data['waddress_id'] = $id;
            $data['created'] = date('Y-m-d H:i:s');

            if($action == 'add'){
                $this->db->set($data);
                $this->db->insert($this->_businessTable);
            }else {
                $this->db->set($data);
                $this->db->where('waddress_id', $id);
                $this->db->update($this->_businessTable);
            }
    }

    function save_deals($action){
            $data = array('description'    =>  $this->input->post('deal'));
            $id = $this->session->userdata('wid');
            $data['waddress_id'] = $id;
            $data['created'] = date('Y-m-d H:i:s');
            
            if($action == 'add'){
                $this->db->set($data);
                $this->db->insert($this->_dealsTable);
            } else {
                $this->db->set($data);
                $this->db->where('waddress_id', $id);
                $this->db->update($this->_dealsTable);
            }
    }

    function save_extendsExpiryDate(){
        $id = $this->input->post('w_id');
        $special_date = $this->input->post('special_date');
        $data['expiry_date'] = $special_date;
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update($this->_waddressTable);
    }


    function profile(){   
        $this->db->select('id');
        $this->db->where('email',$this->session->userdata('username'));
        $this->db->where('password',$this->encrypt_password($this->input->post('old_password')));
        $query=$this->db->get('users');   
        if ($query->num_rows() > 0){
                $row = $query->row();
                if($row->id === $this->session->userdata('user_id')){
                    $data = array(
                      'password' => $this->encrypt_password($this->input->post('new_password'))
                     );
                $this->db->where('email',$this->session->userdata('username'));
                $this->db->where('password',$this->encrypt_password($this->input->post('old_password')));
                       if($this->db->update('users', $data)) {
                            return "done";
                       } else {
                            return "not_changed";
                       }
                } else {
                        return "not_changed";
                }

        } else {
            return "Wrong_Old_Password";
        }
    }  


}
?>