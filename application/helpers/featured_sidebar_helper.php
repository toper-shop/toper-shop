<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('featured_sidebar')) {
	function featured_sidebar()
	{
		$ci=& get_instance();
        $ci->load->database(); 
		
	    //Формируем блок "ПРЕДЛОЖЕНИЕ ДНЯ"
		$ci->db->order_by('goodsID', 'asc');
		$ftv = $ci->db->get_where("items", array("offer_day" => 'y'), 3);
		
		return $ftv->result();
	}
	
	
}

?>