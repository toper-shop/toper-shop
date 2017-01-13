<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mainitems extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	//single movie page
	public function index($param = null)
	{
		$this->load->helper("form");
		
		$uri_string = $this->uri->segment(2);
		$movie = explode("-", $uri_string);
		$movieID = $this->db->escape(abs(intval(end($movie))));
		
		//get movie data
		$itemsRs = $this->db->get_where("items", array("digiseller_id" => $movieID));
		$movieData = $itemsRs->result();
		
		$title = $movieData[0]->goods_title;
		
		//get genres
		$genresRs = $this->db->where_in("genreID", @explode(",", $movieData[0]->genres));
		$genresRs = $genresRs->get("genres");
		$genresAll = $genresRs->result();
		
		//build seo title
		$data['vid_type'] = 'main items Online';
		$data['seo_title'] = 'Купить ' . $title .'';
		

		//get related items : same genre
		$this->load->helper('related_sidebar');
		$data['related_items'] = related_sidebar($movieData[0]->genres, $movieID);
		
		$data['movie_info'] = $movieData;
	    $data['genres'] = $genresAll;
		
		$this->load->view('items', $data);
	}
	
	public function order()
	{
		$this->load->helper("form");
		
		$uri_string = $this->uri->segment(2);
		$movie = explode("-", $uri_string);
		$movieID = $this->db->escape(abs(intval(end($movie))));

		//get movie data
		$itemsRs = $this->db->get_where("items", array("digiseller_id" => $movieID));
		$movieData = $itemsRs->result();
	
			//get genres
		$genresRs = $this->db->where_in("genreID", @explode(",", $movieData[0]->genres));
		$genresRs = $genresRs->get("genres");
		$genresAll = $genresRs->result();
	
		//build seo title
		
		$data['seo_title'] = 'Оформление товара';
		

		//get related items : same genre
		$this->load->helper('related_sidebar');
		
		$data['movie_info'] = $movieData;
		$data['genres'] = $genresAll;
		
		$this->load->view('order', $data);
	} 
	
	//items page
	public function items($param = null) {
		
		$this->load->library('pagination');
		
		//pagination
		$config['base_url'] = '/main/items/page/';
		
		$this->db->where(array("goods_type" => 'items'));
		$this->db->from("items");
		$config['total_rows'] = $this->db->count_all_results();
		
		$config['per_page'] = 1000; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config); 
		$page = abs(intval($this->uri->segment(4)));
		$start = $page*$config['per_page']; 

		
		//estabilish vid type = items
		$data['vid_type'] = 'main items Online';
		$data['seo_title'] = 'Все товары';
		
		$this->db->order_by('goods_title', 'asc');
		$items = $this->db->get_where("items", array("goods_type" => 'item'), $config['per_page'], $page);
		$data['items'] = $items->result();
		$data['pagination'] = $this->pagination->create_links();
		
		$this->load->view('all-items', $data);
		
	}
	
	//main by genre
	public function by_genre() {

		$genre_name = trim(strip_tags($this->uri->segment(2)));
		
		if(empty($genre_name)) die("Empty genre");		

		//get genre id
		$genreQuery = $this->db->get_where("genres", array("genre" => $genre_name));
		$genre_name = $genreQuery->row();
			
		//estabilish vid type = items
		$data['vid_type'] = 'Товары по жанру '.mb_strtolower($genre_name->genreName).'';
		$data['seo_title'] = 'Товары по жанру '.mb_strtolower($genre_name->genreName).'';
		
		$this->load->library('pagination');

		if(!count($genre_name)) 
		{
			$data['error'] = '<div class="info" itemprop="description" style="width:755px;text-align:center;">Неизвестная категория <strong>'.trim(strip_tags($this->uri->segment(2))).'</strong></div><br/>';
			$this->load->view('all-items', $data);
		}else{
		
		$genreID = $genre_name->genreID;

		//pagination
		$config['base_url'] = '/genres/'.url_title($genre_name->genre).'/page/';
		
		$qt = $this->db->query("SELECT * FROM items WHERE FIND_IN_SET($genreID, genres)");
		#var_dump($qt);
		$config['total_rows'] = $qt->num_rows;
		
		
		
		$config['per_page'] = 1000; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config); 
		$page = abs(intval($this->uri->segment(4)));
		$start = abs(intval($page*$config['per_page'])); 
		
		#print_r($config);
		
		$items = $this->db->query("SELECT * FROM items WHERE FIND_IN_SET($genreID, genres) LIMIT $page, ".$config['per_page']."");
		$data['items'] = $items->result();
		$data['pagination'] = $this->pagination->create_links();
		
		$this->load->view('all-items', $data);
		
		}
	}

	
	//Поиск по платформе
	public function platform() {

		$genre_name = trim(strip_tags($this->uri->segment(2)));
		$genre_name = str_replace("-", " ", $genre_name);
		
		if(empty($genre_name)) die("Empty keyword");		
			
		//estabilish vid type = items
		$data['vid_type'] = 'Платформа '.$genre_name.'';
		$data['seo_title'] = 'Платформа '.$genre_name.'';
		$this->load->library('pagination');
		
		//pagination
		$config['base_url'] = '/platform/page/';
		
		
		$this->db->query("SELECT * FROM items WHERE FIND_IN_SET('$genre_name', platform) OR FIND_IN_SET(' $genre_name', platform)");
		$config['total_rows'] = $this->db->count_all_results();
		
		$config['per_page'] = 1000; 
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config); 
		$page = abs(intval($this->uri->segment(3)));
		$start = abs(intval($page*$config['per_page'])); 
		
		
		$items = $this->db->query("SELECT * FROM items WHERE FIND_IN_SET('$genre_name', platform) OR FIND_IN_SET(' $genre_name', platform) LIMIT $start, ".$config['per_page']."");
		$data['items'] = $items->result();
		$data['pagination'] = $this->pagination->create_links();
		
		$this->load->view('all-items', $data);
		
	}
	
	
	
}