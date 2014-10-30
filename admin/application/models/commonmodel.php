<?php
class Commonmodel extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	
	function get($table, $per_page = '', $segment = ''){
		$this->db->order_by('id desc');
		if($per_page && $segment) $this->db->limit($per_page, $segment);
		return $this->db->get($table)->result();
	}
	
	function get_items_by_language($table){
		$this->db->order_by('id', 'desc');
		return $this->db->get_where($table, array('lang' => $this->config->item('language_abbr')))->result();		
	}
	
	function check_slug($table, $slug, $lang){
		$this->db->select('slug');
		return $this->db->get_where($table, array('slug' => $slug, 'lang' => $lang))->num_rows();
	}
	
	function get_slug_by_id($table, $id) {
		$this->db->select('slug');
		return $this->db->get_where($table, array('id' => $id))->row()->slug;
	}	
	
	function get_item_by_id($table, $id) {               
		return $this->db->get_where($table, array('id' => $id))->row();
    }
	
	function get_item_by_title($table, $title) {
		return $this->db->get_where($table, array('title' => $title))->row();
	}	
	
	function get_item_by_slug($table, $slug) {
		return $this->db->get_where($table, array('slug' => $slug))->row();
	}	
	
	function insert($table, $data) {
		$this->db->set($data);
		$this->db->insert($table);
	}
	
	function update($table, $id, $data) {
		$this->db->update($table, $data, array('id'=>$id));
	}
	
	function delete($table, $id, $module = FALSE, $module_id = FALSE){
		$this->db->where('id', $id)->delete($table);
	}
	
	function delete_business_by_id($table, $id, $module = FALSE, $module_id = FALSE){
		$this->db->where('user_id', $id)->delete($table);
	}
	
	function delete_by_uid($table, $id, $module = FALSE, $module_id = FALSE){
		$this->db->where('user_id', $id)->delete($table);
	}

	function get_images($id, $module, $limit = 999, $offset = 0){
		$this->db->select('id, name, date, time, title, text, position');
		$this->db->order_by('position', 'asc');
		$this->db->order_by('date', 'desc');
		return $this->db->get_where('images', array('item_id' => $id, 'module' => $module), $limit, $offset)->result();
	}
	
	function save_image($image, $item_id, $module, $title = '', $text = '', $description = '', $status = 1, $date, $time){
		$this->db->select_max('position');
		$position = $this->db->get_where('images', array('item_id' => $item_id, 'module' => $module))->row()->position;
		$data = array(
					  'module' => $module,
					  'item_id' => $item_id,
					  'name' => $image,
					  'date' => date('Y-m-d'),
					  'time' => date('H:i:s'),
					  'title' => $title,
					  'text' => $text,
					  'status' => $status,
					  'position' => $position + 1
					  );
		$this->db->insert('images', $data);
	}
	
	function delete_images($item_id, $module){
		$this->db->where(array('item_id' => $item_id, 'module' => $module))->delete('images');
	}
	
	function delete_image($id, $module){
		$this->db->where('id', $id)->delete('images');
	}
	
	function encrypt($data){
		 return sha1($this->config->item('encryption_key').$data);
	}	

	function dashborad_details(){
        $dashborad=array();
       	$dashboard['totalUsers']=$this->db->where('status','1')->count_all_results('users') - 1;
    	//$dashboard['totalPlans']=$this->db->where('status','1')->count_all_results('plans');
        $dashboard['totalCmsPages']=$this->db->where('status','1')->count_all_results('cms');
        $dashboard['totalSocialsettings']=$this->db->count_all_results('settings');
        return $dashboard;
	}
	
	function get_business_by_userId($table, $user_id){
    	return $this->db->get_where($table, array('user_id' => $user_id))->row();
    }

	function get_business_by_wId($table, $wid){
    	return $this->db->get_where($table, array('waddress_id' => $wid))->row();
    }

	function get_deal_by_userId($table, $user_id){
    	return $this->db->get_where($table, array('user_id' => $user_id))->row();
    }

	function get_deal_by_wId($table, $user_id){
    	return $this->db->get_where($table, array('waddress_id' => $user_id))->row();
    }

	function get_connected_to_by_userId($table, $user_id){
    	return $this->db->get_where($table, array('user_id' => $user_id))->result();
    }

	function get_connected_to_by_wId($table, $wid){
     	return $this->db->get_where($table, array('waddress_id' => $wid))->result();
    }

	function get_by_userId($table, $user_id){
    	return $this->db->get_where($table, array('user_id' => $user_id))->row();
    }

    function get_by_wId($table, $id){
    	return $this->db->get_where($table, array('waddress_id' => $id))->row();
    }

	function getwaddress_by_userId($table, $user_id){
        return $this->db->get_where($table, array('user_id' => $user_id))->result();
    }
        
}
?>