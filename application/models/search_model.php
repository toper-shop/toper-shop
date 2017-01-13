<?php

class Search_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_autocomplete($search_data)
    {
        $this->db->select('goods_title');
		$this->db->select('goodsID');
		$this->db->select('thumbnail');
		$this->db->select('price');
		$this->db->select('digiseller_id');
		$this->db->order_by('goods_title','desc');
        $this->db->like('goods_title', $search_data);
        return $this->db->get('items', 10);
    }
}

?>