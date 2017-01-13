<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('genres_home')) {
	
	function genres_home($id)
	{
		$ci=& get_instance();
        $ci->load->database(); 

		$itemsRs = $ci->db->get_where("items", array("goodsID" => $id));
		$movieData = $itemsRs->result();
		$genresRs = $ci->db->where_in("genreID", $movieData[0]->genres);
		$genresRs = $genresRs->get("genres");
		$genresAll = $genresRs->result();
		return $genresAll;
	}
	
	
}

?>