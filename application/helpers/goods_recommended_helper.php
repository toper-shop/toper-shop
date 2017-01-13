<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('goods_recommended')) {
	function goods_recommended($genre)
	{
		$ci=& get_instance();
        $ci->load->database(); 
		
		$ci->db->select("*");
		$ci->db->from("items");
		$ci->db->like("genres","$genre");
		$ci->db->order_by("goodsID", "random");
		$ci->db->limit(3); 
		$comments = $ci->db->get();
		$comments = $comments->result();
		
		return $comments;
	}	
}

?>