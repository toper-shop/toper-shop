<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Home extends CI_Controller {
		public function index($param = null)
		{
			
			//get items
			$this->db->order_by('goodsID', 'desc');
			$Fitems = $this->db->get_where("items", array("goods_type" => "Item"), 9);
			
			//Товары до 150 руб.
			$this->db->order_by('price', 'asc');
			$items_150 = $this->db->get_where("items", array("goods_type" => "Item", "price <= " => '150', "price > " => '0'), 15);
			
			//Товары до 300 руб.
			$this->db->order_by('price', 'asc');
			$items_300 = $this->db->get_where("items", array("goods_type" => "Item", "price <= " => '300', "price > " => '0'), 15);
			
			//Товары до 500 руб.
			$this->db->order_by('price', 'asc');
			$items_500 = $this->db->get_where("items", array("goods_type" => "Item", "price <= " => '500', "price > " => '0'), 15);
			
			//Новое
			$this->db->order_by('goodsID', 'desc');
			$new_tab = $this->db->get_where("items", array("goods_type" => "Item", "new_tab =" => '1'), 15);
			
			//Лидеры продаж
			$this->db->order_by('goodsID', 'desc');
			$leader_tab = $this->db->get_where("items", array("goods_type" => "Item", "leader_tab =" => '1'), 15);
			
			//Предзаказ
			$this->db->order_by('goodsID', 'desc');
			$preorder_tab = $this->db->get_where("items", array("goods_type" => "Item", "preorder_tab =" => '1'), 15);
			
			$data['featured_items'] = $Fitems->result();
			$data['featured_items150'] = $items_150->result();
			$data['featured_items300'] = $items_300->result();
			$data['featured_items500'] = $items_500->result();
			$data['featured_new_tab'] = $new_tab->result();
			$data['featured_leader_tab'] = $leader_tab->result();
			$data['featured_preorder_tab'] = $preorder_tab->result();
			
			//$data['seo_title'] = $this->config->item('site_title');
			$data['is_home'] = 'yep';
			
			
			$this->load->view('home', $data);
			
			
		}
		
		public function r() {
			$string = trim(strip_tags($this->input->get('id')));
			$agent_id = $string;
			$this->load->helper('cookie');
			$cookie = array(
			'name'   => 'id',
			'value'  => $agent_id,
			'expire' => '0',
			'domain' => '',
			'path'   => '/',
			'prefix' => 'partner_',
			);
			set_cookie($cookie);
			redirect('/');
		}
		
		public function search() {
			ob_start();
			
			$data['vid_type'] = 'Search items';
			
			$string = trim(strip_tags($this->input->get('q')));
			$db_string = '%'.$string.'%';
			
			if(empty($string)) {
				$data['error'] = '<div class="info" itemprop="description" style="width:755px;text-align:center;">Пустой поисковый запрос</div>';
				$this->load->view('all-items', $data);
				exit;
			}
			$genre_name = $string;
			
			//estabilish vid type = items
			$data['vid_type'] = 'Search '.$genre_name.' items' . PHP_EOL;
			
			$this->load->library('pagination');
			
			//pagination
			$config['base_url'] = '/search/page/';
			
			$this->db->query("SELECT * FROM items WHERE goods_title LIKE ?", array($db_string, $db_string));
			$config['total_rows'] = $this->db->count_all_results();
			
			$config['per_page'] = 1000; 
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config); 
			$page = abs(intval($this->uri->segment(4)));
			$start = abs(intval($page*$config['per_page'])); 
			
			
			$items = $this->db->query("SELECT * FROM items WHERE goods_title LIKE ? LIMIT $start, ".$config['per_page']."", array($db_string, $db_string));
			$data['items'] = $items->result();
			$data['pagination'] = $this->pagination->create_links();
			
			$data['seo_title'] = 'Поиск "'.$string.'"';
			
			$this->load->view('all-items', $data);
			
			ob_end_flush();
		}
		
		public function alphabet() {
			ob_start();
			
			$data['vid_type'] = 'alphabet items';
			
			$string = trim(strip_tags($this->uri->segment(2)));
			$db_string = ''.$string.'%';
			
			if(empty($string)) {
				$data['error'] = '<div class="info" itemprop="description" style="width:755px;text-align:center;">Пустой поисковый запрос</div>';
				$this->load->view('all-items', $data);
				exit;
			}
			
			$genre_name = $string;
			
			//estabilish vid type = items
			$data['vid_type'] = 'alphabet '.$genre_name.' items' . PHP_EOL;
			
			$this->load->library('pagination');
			
			//pagination
			$config['base_url'] = '/alphabet/page/';
			
			$this->db->query("SELECT * FROM items WHERE goods_title LIKE ?", array($db_string, $db_string));
			$config['total_rows'] = $this->db->count_all_results();
			
			$config['per_page'] = 1000; 
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config); 
			$page = abs(intval($this->uri->segment(4)));
			$start = abs(intval($page*$config['per_page'])); 
			
			
			$items = $this->db->query("SELECT * FROM items WHERE goods_title LIKE ? LIMIT $start, ".$config['per_page']."", array($db_string, $db_string));
			$data['items'] = $items->result();
			$data['pagination'] = $this->pagination->create_links();
			
			$data['seo_title'] = 'Товары на букву "'.$string.'"';
			
			$this->load->view('all-items', $data);
			
			ob_end_flush();
		}
		
		
		public function discounts() {

		ob_start();
			
		$id = $this->config->item('pars_discount');
		$headers = array('Content-type: text/html; charset=windows-1251');
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,            "http://shop.digiseller.ru/xml/shop_product_info.asp" );
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt($ch, CURLOPT_POST,           1 );
		curl_setopt($ch, CURLOPT_POSTFIELDS,     "<digiseller.request><product><id>$id</id></product><lang>en-US</lang></digiseller.request>" ); 
		curl_setopt($ch, CURLOPT_HTTPHEADER,     $headers); 

		$result = curl_exec ($ch);
		$data['result'] =curl_exec ($ch);

		$this->load->view('discounts', $data);
		ob_end_flush();
		}
		
		public function reviews() {
			
			$this->load->view('reviews');
		}
		
		public function warranty() {
			
			
			$this->load->view('warranty');
		}
		
		public function p() {
			
			
			$this->load->view('p');
		}
		
		public function copy() {
			
			print_r(base64_decode('Q3JlYXRlZCBieSBZVFN0eWxl'));
			
		}
		
	}											