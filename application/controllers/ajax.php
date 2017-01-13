<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function search()
    {
        if(!isset($_POST['search_data'])) exit('access denied');
		$this->load->model('search_model');
        $search_data = $this->input->post('search_data');
        $query = $this->search_model->get_autocomplete($search_data);
		
		$kq = "'";
		
        foreach ($query->result() as $row):
            echo '<li onclick="location.href='.$kq.''.base_url().'goods/' . $row->digiseller_id . ''.$kq.'">
			<img class="search-list img" src="'.base_url().'uploads/' . $row->thumbnail . '"></img>
			<div class="search-list name">' . $row->goods_title . '</div>
			<div class="search-list pricee">' . $row->price . ' руб.</div>
			</li>';
        endforeach;
    }
}




/* End of file ajax.php */
/* File location: application/controllers */