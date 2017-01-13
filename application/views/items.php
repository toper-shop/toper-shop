<!DOCTYPE html>
<html lang="ru"><head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<meta name="robots" content="index, follow">
	<meta name="keywords" content="<?php echo $this->config->item('keywords'); ?>">
	<meta name="description" content="<?php echo $this->config->item('description'); ?>">
	<title><?php  $seo_title = strip_tags($seo_title); echo  $seo_title. ' - ' . strip_tags($this->config->item('site_title')); ?></title>
	<?php require_once 'header.php'; ?>
	
	<?php require_once 'sidebar.php';?>
	<?php if(count($movie_info)) : ?>	
	<div class="right" itemscope="" itemtype="http://schema.org/Offer">
		<!-- внутренка с описанием товара -->
		
		<div class="breadcrumb">
			<a href="<?php echo (base_url()); ?>">Главная</a>
			<div class="crumb"></div>
			<a href="<?php echo (base_url()); ?>main/allgoods">Все игры</a><div class="crumb"></div>
			<?php foreach($genres as $genre): ?><a href="/genres/<?php echo url_title($genre->genre); ?>"><?php echo $genre->genreName; ?></a><?php endforeach; ?>
		</a><div class="crumb"></div>
		<a href="#"><?php print $movie_info[0]->goods_title; ?></a>
	</div>
	
	<h1 style="text-align:left; color:black;" itemprop="name"><?php print $movie_info[0]->goods_title; ?></h1>
	
	
	<div class="big-info">
		<div class="inf-left">
			
			
			
			<div class="gallery-block-one">
				
				<div style="overflow: hidden; width: 475px; height: 272px;" class="gallery">
					
					<div class="video">
						<iframe height="267" width="475" src="https://www.youtube.com/embed/<?php print $movie_info[0]->video; ?>?rel=0&amp;iv_load_policy=3&amp;vq=hd720&amp;showinfo=0&amp;autohide=1" frameborder="0" allowfullscreen=""></iframe>
					</div>
				</div>
				
			</div>
			
			<div id="goods">
				<nav class="main-tabs" style="width: 475px;">
					<a href="javascript:;" id="tab1" class="tabs active">Описание</a>
					<a href="javascript:;" id="tab2" class="tabs">Системные требования</a>
				<a href="javascript:;" id="tab3" class="tabs">Инструкция</a></nav>
				
				<div class="teeeest">
					<div id="con_tab1" class="tabs active">
						<div class="info" itemprop="description">
							<?php print $movie_info[0]->description; ?>
						</div>
					</div>
					<div id="con_tab2" class="tabs">
						<div class="info"><?php print $movie_info[0]->systemreq; ?></div>
					</div>
					<div id="con_tab3" class="tabs">
						<div class="info">
							<?php if($movie_info[0]->activation == 'Steam'): ?>
							Покупая этот товар, вы мгновенно получаете лицензионный ключ <br> <b><?=$movie_info[0]->goods_title?></b>.
							<br><br>
							Чтобы начать играть в <b><?=$movie_info[0]->goods_title?></b>, вам необходимо:<br>
							1. Купить в нашем магазине ключ активации <b><?=$movie_info[0]->goods_title?></b>.<br>
							2. Скачать и установить программу - <b><?=$movie_info[0]->activation?></b> (если она ещё не установлена).<br>
							3. Войти в неё, используя логин и пароль, указанные при регистрации вашего аккаунта.<br>
							4. Перейти в закладку "Игры", выбрать "Активировать через Steam..." и ввести ключ.<br>
							5. После этого, вы сможете скачать <b><?=$movie_info[0]->goods_title?></b> и начать игру.
							<?php elseif($movie_info[0]->activation == 'Origin'): ?>	
							Покупая этот товар, вы мгновенно получаете лицензионный ключ <br> <b><?=$movie_info[0]->goods_title?></b>.
							<br><br>
							Чтобы начать играть в <b><?=$movie_info[0]->goods_title?></b>, вам необходимо:<br>
							1. Купить в нашем магазине ключ активации <b><?=$movie_info[0]->goods_title?></b>.<br>
							2. Скачать и установить программу - <b><?=$movie_info[0]->activation?></b> (если она ещё не установлена).<br>
							3. Войти в неё, используя логин и пароль, указанные при регистрации вашего аккаунта.<br>
							4. Нажимаем на иконку шестеренки в верхнем правом углу и выбираем пункт меню «Активировать код продукта».<br>
							5. После этого, вы сможете скачать <b><?=$movie_info[0]->goods_title?></b> и начать игру.
							<?php elseif($movie_info[0]->activation == 'Uplay'): ?>	
							Покупая этот товар, вы мгновенно получаете лицензионный ключ <br> <b><?=$movie_info[0]->goods_title?></b>.
							<br><br>
							Чтобы начать играть в <b><?=$movie_info[0]->goods_title?></b>, вам необходимо:<br>
							1. Купить в нашем магазине ключ активации <b><?=$movie_info[0]->goods_title?></b>.<br>
							2. Скачать и установить программу - <b><?=$movie_info[0]->activation?></b> (если она ещё не установлена).<br>
							3. Войти в неё, используя логин и пароль, указанные при регистрации вашего аккаунта.<br>
							4. Нажимаем на иконку шестеренки в верхнем правом углу и выбираем пункт меню «Активировать продукт».<br>
							5. После этого, вы сможете скачать <b><?=$movie_info[0]->goods_title?></b> и начать игру.
							<?php else: ?>
							<?php print $movie_info[0]->activation; ?>
							<?php endif; ?>	
						</div>
					</div>
					
				</div>
			</div>
			<div class="vk">
				<!-- Put this script tag to the <head> of your page -->
				
				<!-- Put this div tag to the place, where the Comments block will be -->
				<div id="vk_comments"></div>
				
				<script type="text/javascript">
					VK.init({apiId: <?=$this->config->item('vk_id_app')?>, onlyWidgets: true});
				</script>
				
				<script type="text/javascript">
					VK.Widgets.Comments("vk_comments", {limit: 5, width: "470", attach: false});
				</script>
			</div>
		</div>
		
	</div>
	
	
	<div class="inf-right">
		<meta itemprop="image" content="<?php echo '/uploads/' . $movie_info[0]->thumbnail; ?>">
		<div class="big-img" style="background-image: url(<?php echo '/uploads/' . $movie_info[0]->thumbnail; ?>); background-size: 100%;"></div>
		<div class="buy-block">
			<div class="big-price"><span itemprop="price"><?php print $movie_info[0]->price; ?></span> руб.</div>
			<meta itemprop="priceCurrency" content="RUR" />
			<?php $economy = ($movie_info[0]->real_price - $movie_info[0]->price); ?>
			<?php if($economy > 0): ?>
			<div class="safe">Вы экономите <?=$economy?> руб.</div>
			<?php else: ?>
			<div class="safe">&nbsp;</div>
			<?php endif; ?>	
			<?php if($movie_info[0]->in_stock == 'y'):?>
			<?php if($movie_info[0]->preorder_tab == '1'):?>
			<a href="/order/<?php print $movie_info[0]->digiseller_id; ?>"><div class="buy-button">Предзаказ</div></a>
			<?php else: ?>
			<a href="/order/<?php print $movie_info[0]->digiseller_id; ?>"><div class="buy-button">Купить</div></a>
			<?php endif; ?>	
			<?php else: ?>
			<div class="buy-button" style="background:#666;">Нет в наличии</div>
			<?php endif; ?>	
			
		</div>
		<div class="blooock">
			<ul class="left">
				<li>Жанр:</li>
				<li>Язык:</li>
				<li>Платформа:</li>
				<li>Активация:</li>
				<li>Дата выхода:</li>
				<li>Издатель:</li>
				
			</ul>
			<ul class="right">
				<li><?php echo $genre->genreName; ?></li>
				<?php if($movie_info[0]->lang != false): ?>
				<li><?php print $movie_info[0]->lang; ?></li>
				<?php else: ?>
				<li>—</li>
				<?php endif; ?>	
				<li><?php 
					$platform = rtrim($movie_info[0]->platform, ", "); 
					
					if(stristr($platform, ",")) {
						$platform = explode(",", $platform);
						array_walk($platform, 'add_url_on_tags', '/platform');
						echo ul($platform, array("class" => "null"));
						echo '<div style="clear:both;"></div>';
						}elseif(!empty($platform)) {
						echo'<a href="/platform/'.url_title($platform).'">'.$platform.'</a>'; 
						}else{
						echo 'Не указано';
					}
				?></li>
				<?php if($movie_info[0]->activation != false): ?>
				<li><?=$movie_info[0]->activation;?></li>
				<?php else: ?>
				<li>—</li>
				<?php endif; ?>	
				<?php if($movie_info[0]->release_date != false): ?>
				<li><?php print $movie_info[0]->release_date; ?></li>
				<?php else: ?>
				<li>—</li>
				<?php endif; ?>	
				<?php if($movie_info[0]->publisher != false): ?>
				<li><?php print $movie_info[0]->publisher; ?></li>
				<?php else: ?>
				<li>—</li>
				<?php endif; ?>	
			</ul>
			
			<div class="vk_group">
				<script type="text/javascript" src="//vk.com/js/api/openapi.js?105"></script>
				<!-- VK Widget -->
				<div id="vk_groups"></div>
				<script type="text/javascript">
					VK.Widgets.Group("vk_groups", {mode: 0, width: "292", height: "320", color1: 'FFFFFF', color2: '333', color3: '333'}, <?=$this->config->item('vk_id_group')?>);
				</script>
			</div>
		</div>
		
		
	</div>
	
</div>

<div class="rows recomended">
<?php 			
				$this->load->helper('goods_recommended');
				if(count(goods_recommended($genre->genreID) > 2)) : 
				echo "<h3>Также рекомендуем:</h3><br>";
				foreach(goods_recommended($genre->genreID) as $g) : 
				echo '<div class="row">
				<div class="img" onclick="location.href=\'/goods/'.$g->digiseller_id.'\'">
				<img class="img" src="/uploads/'.$g->thumbnail.'">
				</div>
				<div class="row-info">
				<div class="title"><a href="/goods/'.$g->digiseller_id.'" title="'.$g->goods_title.'">'.$g->goods_title.'</a></div>
				<div class="category">'; foreach(genres_home($g->goodsID) as $genre): echo $genre->genreName; endforeach; echo'</div>
				<div class="price_item">'.$g->price.' руб.</div>
				</div>
				</div>';
				endforeach; 
				endif; 
			?>
</div>

<div class="clear"></div>
<br>

</section>

<?php else: ?>
<div class="right" itemscope="" itemtype="http://schema.org/Offer">

<div class="info" itemprop="description" style="width:755px;text-align:center;">Товар не найден</div>
</div>
<div class="clear"></div>
<br>

</section>
<?php endif; ?>


<?php require_once 'footer.php'; ?>				