<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller

	{
	public $admin_loggedIn;

	/*
	* Check if logged in or not and assign it to all methods
	*/
	function __construct()
		{
		parent::__construct();
		$this->admin_loggedIn = $this->session->userdata('admin_loggedIn');
		}

	/*
	* Вход
	*/
	public

	function login()
		{
		if ($this->admin_loggedIn)
			{
			redirect('/admin');
			exit;
			}

		$data = array();
		$data['seo_title'] = 'Вход в админ-панель';
		if ($this->input->post('sbLogin'))
			{
			if (!$this->input->post('u') OR !$this->input->post('p'))
				{
				$data['form_message'] = div_class("Необходимо заполнить оба поля", 'alert alert-danger');
				}
			  else
				{
				if ($this->input->post('u', TRUE) == $this->config->item('admin_user') AND md5($this->input->post('p', TRUE)) == $this->config->item('admin_pass'))
					{
					$this->session->set_userdata("admin_loggedIn", TRUE);
					redirect('/admin');
					}
				  else
					{
					$data['form_message'] = div_class("Неверный логин или пароль.", 'alert alert-danger');
					}
				}
			}

		$this->load->view('admin-login', $data);
		}

	/*
	* Главная страница админки
	*/
	public

	function index()
		{
		if (!$this->admin_loggedIn)
			{
			redirect('/admin/login');
			exit;
			}

		$removeID = $this->uri->segment(4);
		$data['seo_title'] = 'Список товаров';
		if ($removeID)
			{
			$id = abs(intval($removeID));
			$this->db->delete("items", array(
				"goodsID" => $id
			));
			redirect('/admin');
			}

		$this->db->order_by("goodsID", "DESC");
		$items = $this->db->get("items");
		$data['items'] = $items->result();
		$this->load->view('admin', $data);
		}

	/*
	* Добавление товара
	*/
	public

	function addItem()
		{
		if (!$this->admin_loggedIn)
			{
			redirect('/admin/login');
			exit;
			}

		$data['seo_title'] = 'Добавление нового товара';
		$genres = $this->db->get("genres");
		$data['genres'] = $genres->result();
		$this->load->view('admin-addItem', $data);
		}

	/*
	* Обновление информации о товаре
	*/
	public

	function update_Item()
		{
		if (!$this->admin_loggedIn)
			{
			redirect('/admin/login');
			exit;
			}

		$genres = $this->db->get("genres");
		$data['genres'] = $genres->result();
		$data['seo_title'] = 'Обновление информации о товаре';
		$ItemID = $this->uri->segment(3);
		$query = $this->db->query("SELECT * FROM items WHERE goodsID = ?", array(
			$ItemID
		));
		if ($query->num_rows() > 0)
			{
			$row = $query->row();
			$data['Item_data'] = $row;
			}

		$this->load->view('admin-updateItem', $data);
		}

	/*
	* Выход
	*/
	public

	function logout()
		{
		$this->session->unset_userdata('admin_loggedIn');
		redirect('/admin/login');
		}

	/*
	* Добавление товара AJAX
	*/
	public

	function ajax_add_Item()
		{
		if (!$this->admin_loggedIn)
			{
			redirect('/admin/login');
			exit;
			}

		if ($this->input->post("sb"))
			{
			$title = $this->input->post('goods_title');
			$digiseller_id = $this->input->post('digiseller_id');
			$desc = $this->input->post('description');
			$picture_remove = $this->input->post('thumbnail_url');
			if (empty($title))
				{
				echo div_class("Название товара отсутствует", 'alert alert-danger');
				}
			elseif (empty($desc))
				{
				echo div_class("Описание товара отсутствует", 'alert alert-danger');
				}
			elseif (empty($digiseller_id))
				{
				echo div_class("ID товара отсутствует", 'alert alert-danger');
				}
			  else
				{
				if (isset($_FILES['thumbnail_file']))
					{
					$file = $_FILES['thumbnail_file'];
					$config['upload_path'] = getcwd() . '/uploads/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = '2048';
					$config['max_width'] = '1024';
					$config['max_height'] = '1024';
					$config['file_name'] = $digiseller_id;
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('thumbnail_file'))
						{
						$error = array(
							'error' => $this->upload->display_errors()
						);
						print $error['error'];
						}
					  else
						{
						$data = $this->upload->data();
						$_POST['thumbnail'] = $data['file_name'];
						}
					}
				elseif (!empty($picture_remove))
					{
					$ext = explode(".", $picture_remove);
					$ext = end($ext);
					$ch = curl_init($picture_remove);
					$ip = rand(0, 255) . '.' . rand(0, 255) . '.' . rand(0, 255) . '.' . rand(0, 255);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						"REMOTE_ADDR: $ip",
						"HTTP_X_FORWARDED_FOR: $ip"
					));
					curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/" . rand(3, 5) . "." . rand(0, 3) . " (Windows NT " . rand(3, 5) . "." . rand(0, 2) . "; rv:2.0.1) Gecko/20100101 Firefox/" . rand(3, 5) . ".0.1");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$data = curl_exec($ch);
					curl_close($ch);
					file_put_contents(getcwd() . '/uploads/' . $digiseller_id . '.' . $ext, $data);
					$_POST['thumbnail'] = $digiseller_id . '.' . $ext;
					}

				$_POST['genres'] = @implode(",", $_POST['genres']);
				$_POST['release_date'] = $_POST['release_date'];
				unset($_POST['thumbnail_url']);
				unset($_POST['thumbnail_file']);
				unset($_POST['sb']);
				$insert = $this->db->insert("items", $this->input->post());
				if ($this->db->insert_id())
					{
					echo div_class('Товар добавлен. <a href="/goods/' . $digiseller_id . '" target="_blank">Перейти</a>', "alert alert-success");
					}
				  else
					{
					echo div_class("Ошибка. " . $this->db->_error_message() , 'alert alert-error');
					}
				}
			}
		  else
			{
			echo div_class("Ошибка. Данные отсутствуют", 'alert alert-error');
			}
		}

	/*
	* Обновление информации о товаре AJAX
	*/
	public

	function ajax_update_Item()
		{
		if (!$this->admin_loggedIn)
			{
			redirect('/admin/login');
			exit;
			}

		if ($this->input->post("sb"))
			{
			$title = $this->input->post('goods_title');
			$digiseller_id = $this->input->post('digiseller_id');
			$desc = $this->input->post('description');
			$picture_remove = $this->input->post('thumbnail_url');
			if (empty($title))
				{
				echo div_class("Название товара отсутствует", 'alert alert-danger');
				}
			elseif (empty($desc))
				{
				echo div_class("Описание товара отсутствует", 'alert alert-danger');
				}
			elseif (empty($digiseller_id))
				{
				echo div_class("ID товара отсутствует", 'alert alert-danger');
				}
			  else
				{
				if (isset($_FILES['thumbnail_file']))
					{
					$file = $_FILES['thumbnail_file'];
					$config['upload_path'] = getcwd() . '/uploads/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = '2048';
					$config['max_width'] = '1024';
					$config['max_height'] = '1024';
					$config['file_name'] = $digiseller_id;

					// $this->upload->do_upload($digiseller_id)

					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('thumbnail_file'))
						{
						$error = array(
							'error' => $this->upload->display_errors()
						);
						print $error['error'];
						}
					  else
						{
						$data = $this->upload->data();
						$_POST['thumbnail'] = $data['file_name'];
						}
					}
				elseif (!empty($picture_remove))
					{
					$ext = explode(".", $picture_remove);
					$ext = end($ext);
					$ch = curl_init($picture_remove);
					$ip = rand(0, 255) . '.' . rand(0, 255) . '.' . rand(0, 255) . '.' . rand(0, 255);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						"REMOTE_ADDR: $ip",
						"HTTP_X_FORWARDED_FOR: $ip"
					));
					curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/" . rand(3, 5) . "." . rand(0, 3) . " (Windows NT " . rand(3, 5) . "." . rand(0, 2) . "; rv:2.0.1) Gecko/20100101 Firefox/" . rand(3, 5) . ".0.1");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$data = curl_exec($ch);
					curl_close($ch);
					file_put_contents(getcwd() . '/uploads/' . $digiseller_id . '.' . $ext, $data);
					$_POST['thumbnail'] = $digiseller_id . '.' . $ext;
					}

				$_POST['genres'] = @implode(",", $_POST['genres']);
				$_POST['release_date'] = $_POST['release_date'];
				unset($_POST['thumbnail_url']);
				unset($_POST['thumbnail_file']);
				unset($_POST['sb']);
				$ItemID = $_POST['Item_id'];
				unset($_POST['Item_id']);
				$insert = $this->db->update("items", $this->input->post() , "goodsID = " . $ItemID);
				if ($insert)
					{
					echo div_class('Товар обновлён. <a href="/goods/' . $digiseller_id . '" target="_blank">Перейти</a>', "alert alert-success");
					}
				  else
					{
					echo div_class("Ошибка. " . $this->db->_error_message() , 'alert alert-error');
					}
				}
			}
		  else
			{
			echo div_class("Ошибка. Данные отсутствуют", 'alert alert-error');
			}
		}

	/*
	* Жанры
	*/
	function genres()
		{
		if (!$this->admin_loggedIn)
			{
			redirect('/admin/login');
			exit;
			}

		if ($this->input->post('sb'))
			{
			$genre = $this->input->post('genre');
			$genreName = $this->input->post('genreName');
			if (!empty($genre) && !empty($genreName))
				{
				$exists = $this->db->get_where("genres", array(
					'genre' => $genre
				));
				if (count($exists->result()))
					{
					$data['error'] = div_class('Жанр ' . $genre . ' уже существует', 'alert alert-danger');
					}
				  else
					{
					$this->db->insert("genres", array(
						'genre' => $genre,
						'genreName' => $genreName
					));
					$data['error'] = div_class('Жанр успешно добавлен', 'alert alert-success');
					}
				}
			  else
				{
				$data['error'] = div_class('Необходимо заполнить оба поля', 'alert alert-danger');
				}
			}

		$removeID = $this->uri->segment(4);
		if ($removeID)
			{
			$id = abs(intval($removeID));
			$this->db->delete("genres", array(
				"genreID" => $id
			));
			redirect('/admin/genres');
			}

		$this->db->select("*, (SELECT COUNT(*) FROM items WHERE FIND_IN_SET(genreID, items.genres)) as titems", false);
		$this->db->from("genres");
		$this->db->order_by("genre", "ASC");
		$comments = $this->db->get();
		$data['comments'] = $comments->result();
		$this->load->view('admin-genres', $data);
		}

	/*
	* Жанры
	*/
	function genres_edit()
		{
		if (!$this->admin_loggedIn)
			{
			redirect('/admin/login');
			exit;
			}

		if ($this->input->post('sb'))
			{
			$id = $this->input->post('id');
			$genre = $this->input->post('genre');
			$genreName = $this->input->post('genreName');
			$data = array(
		     'genre' => $genre,
		     'genreName' => $genreName
		    );

			$this->db->where('genreID', $id);
			$this->db->update('genres', $data); 
			redirect('/admin/genres');
		}
		

		else {
			$id = $this->uri->segment(4);
			$query = $this->db->query("SELECT * FROM genres WHERE genreID = ?", array(
			$id
		));
			if ($query->num_rows() > 0)
			{
			$row = $query->row();
			$data['genres_data'] = $row;
			}
}



		$this->load->view('admin-genres-edit', $data);
		}

	/*
	* Обновление всех цен
	*/
	function price_update()
		{
		if (!$this->admin_loggedIn)
			{
			redirect('/admin/login');
			exit;
			}

		$query = $this->db->query('SELECT digiseller_id FROM `items`');
		foreach($query->result() as $row)
			{
			$id = $row->digiseller_id;

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,            "http://shop.digiseller.ru/xml/shop_product_info.asp" );
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt($ch, CURLOPT_POST,           1 );
			curl_setopt($ch, CURLOPT_POSTFIELDS,     "<digiseller.request><product><id>$id</id></product></digiseller.request>" ); 
			curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: text/plain')); 

			$result=curl_exec ($ch);
			$xml = simplexml_load_string($result);
			$price = '' . $xml->product->prices->wmr . '';
			if (!empty($price))
				{
				$this->db->query("UPDATE `items` SET `price`='$price' WHERE `digiseller_id`='$id'");
				$this->db->query("UPDATE `items` SET `in_stock`='y' WHERE `digiseller_id`='$id'");
				}
			  else
				{
				$this->db->query("UPDATE `items` SET `in_stock`='n' WHERE `digiseller_id`='$id'");
				}
			}

		redirect('admin/', 'refresh');
		}

	/*
	* Обновление определенного товара
	*/
	function price_create()
		{
		if (!$this->admin_loggedIn)
			{
			redirect('/admin/login');
			exit;
			}

		$id = $this->uri->segment(3);
		$query = $this->db->query("SELECT digiseller_id FROM items WHERE digiseller_id = ?", array(
			$id
		));
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,            "http://shop.digiseller.ru/xml/shop_product_info.asp" );
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt($ch, CURLOPT_POST,           1 );
			curl_setopt($ch, CURLOPT_POSTFIELDS,     "<digiseller.request><product><id>$id</id></product></digiseller.request>" ); 
			curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: text/plain')); 

			$result=curl_exec ($ch);
			$xml = simplexml_load_string($result);
			$price = '' . $xml->product->prices->wmr . '';
		if (!empty($price))
			{
			$this->db->query("UPDATE `items` SET `price`='$price' WHERE `digiseller_id`='$id'");
			$this->db->query("UPDATE `items` SET `in_stock`='y' WHERE `digiseller_id`='$id'");
			}
		  else
			{
			$this->db->query("UPDATE `items` SET `in_stock`='n' WHERE `digiseller_id`='$id'");
			}

		redirect('admin/', 'refresh');
		}

	/*
	* Редактор конфига
	*/
	function settings($id = 0)
		{
		if (!$this->admin_loggedIn)
			{
			redirect('/admin/login');
			exit;
			}

		$this->load->helper('admin');
		if (count($_POST))
			{

			// main

			change_config('config', 'agent_id', $_POST['agent_id']);
			change_config('config', 'wmid', $_POST['wmid']);

			// site info

			change_config('config', 'site_title', $_POST['site_title']);
			change_config('config', 'slogan', $_POST['slogan']);
			change_config('config', 'keywords', $_POST['keywords']);
			change_config('config', 'description', $_POST['description']);

			// percent

			change_config('config', 'discount_select', $_POST['discount_select']);
			change_config('config', 'pars_discount', $_POST['pars_discount']);

			// vk

			change_config('config', 'vk_id_group', $_POST['vk_id_group']);
			change_config('config', 'vk_id_app', $_POST['vk_id_app']);

			// silver

			change_config('config', 'silver_ico', $_POST['silver_ico']);
			change_config('config', 'silver_id', $_POST['silver_id']);
			change_config('config', 'silver_price', $_POST['silver_price']);
			change_config('config', 'silver_desc', $_POST['silver_desc']);

			// gold

			change_config('config', 'gold_ico', $_POST['gold_ico']);
			change_config('config', 'gold_id', $_POST['gold_id']);
			change_config('config', 'gold_price', $_POST['gold_price']);
			change_config('config', 'gold_desc', $_POST['gold_desc']);

			// platinum

			change_config('config', 'platinum_ico', $_POST['platinum_ico']);
			change_config('config', 'platinum_id', $_POST['platinum_id']);
			change_config('config', 'platinum_price', $_POST['platinum_price']);
			change_config('config', 'platinum_desc', $_POST['platinum_desc']);

			// elite

			change_config('config', 'elite_ico', $_POST['elite_ico']);
			change_config('config', 'elite_id', $_POST['elite_id']);
			change_config('config', 'elite_price', $_POST['elite_price']);
			change_config('config', 'elite_desc', $_POST['elite_desc']);
			redirect('/admin/settings');
			}

		echo $this->load->view('admin-config');
		}
	}