<?php
//Point to the assets folder
function admin_asset_url(){
   return base_url().'assets/admin/';
}


/**
 * @desc Make insert/update query fileds and respective value string from array.
 * @param array $data_array
 * @return boolean 
 * @author bhavesh khanpara
 */
function make_query_string($data_array) {
    if (is_array($data_array) && sizeof($data_array) > 1) {
        $query_string = $columns = $columnVal = "";
        $values = $fileds = array();
        foreach ($data_array as $key => $value) {
            $fileds[] = "`{$key}`";
            if (!is_numeric($value)) {
                $field_val = addslashes($value);
                if($field_val=="now()")
                    $values[] = "{$field_val}";
                else
                    $values[] = "'{$field_val}'";
            } else {
                $values[] = $value;
            }
        }
        $columns = implode(',', $fileds);
        $columnVal = implode(',', $values);
        $query_string = "({$columns}) VALUES ({$columnVal})";
        return $query_string;
    } else {
        return false;
    }
}


/**
 *@desc Conversion of any date into datetime format 
 *@param dateold  
 *@return New date in datetime format 
 *@author Bhavesh Khanpara
 */

function datetime($date){
    if($date=='0000-00-00' || $date=='')
        return '';
    else
        return date(DATE_FORMAT_DATEPICKER, strtotime($date));
}

function GetPlan(){

    $CI =& get_instance();
    $CI->db->select('id,name');
    $CI->db->order_by('id desc');


     $plans = $CI->db->get('plans')->result_array();

    
     return $plans;
 }   

