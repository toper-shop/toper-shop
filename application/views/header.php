<link rel="icon" type="image/png" href="/img/favicon.png" />
	<link rel="stylesheet" href="/css/new.css">
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
	<script src="//code.jquery.com/jquery-latest.min.js"></script>
	<script src="/js/jquery.countdown.min.js"></script>
	<script src="/js/tabs.js"></script>
	<script src="/js/jquery.lazyload.min.js"></script>
	<script src="/js/script-lazy.js"></script>
	<script type="text/javascript" src="//vk.com/js/api/openapi.js?115"></script>
	<script type="text/javascript">
		var me_ver = "<?=YTSE_VERSION?>";
		var <?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>";
	</script>
</head>
	<body>
	<header>
		<div class="header-nav">
			<nav>
				<a href="/">Главная</a>
				<a href="/discounts">Скидки</a>
				<a href="/warranty">Гарантии</a>
				<a href="/reviews">Отзывы</a>
				<a href="/p">Как заработать?</a>
				
				<a href="https://www.oplata.info/delivery/delivery.asp" target="_blank" style="margin-left: 350px;">Мои покупки</a>
				<img onclick="location.href='//vk.com/public<?=$this->config->item('vk_id_group')?>'" style="margin-top: 8px; position: absolute; float:right; cursor: pointer;" src="/img/vk-button.png">
			</nav>
			
		</div>
		
		<div class="header-line">
			<div class="container">
				<div class="header-wrapper">
					<div class="logo-wrapper">
						<a href="<?php echo (base_url()); ?>"><div class="logo"></div></a>
						<span><?php echo $this->config->item('slogan'); ?></span>
					</div>
					
					<form action="<?php echo base_url(); ?>search" method="get" class="search-wrapper">
						<input value="" type="submit">
						<input type="text" name="q" id="search_data" placeholder="Что ищем?" onkeyup="ajaxSearch();" autocomplete="off" value="<?=$_GET['q'];?>">
						<div class="list-search" style="display: none;">
							<div class="list-games"></div>
						</div>
					</form>
					
					<div id="update"></div>
					
					<ul class="alphabet-letters">
						<a href="/alphabet/a"><li>A</li></a>
						<a href="/alphabet/b"><li>B</li></a>
						<a href="/alphabet/c"><li>C</li></a>
						<a href="/alphabet/d"><li>D</li></a>
						<a href="/alphabet/e"><li>E</li></a>
						<a href="/alphabet/f"><li>F</li></a>
						<a href="/alphabet/g"><li>G</li></a>
						<a href="/alphabet/h"><li>H</li></a>
						<a href="/alphabet/i"><li>I</li></a>
						<a href="/alphabet/j"><li>J</li></a>
						<a href="/alphabet/k"><li>K</li></a>
						<a href="/alphabet/l"><li>L</li></a>
						<a href="/alphabet/m"><li>M</li></a>
						<a href="/alphabet/n"><li>N</li></a>
						<a href="/alphabet/o"><li>O</li></a>
						<a href="/alphabet/p"><li>P</li></a>
						<a href="/alphabet/q"><li>Q</li></a>
						<a href="/alphabet/r"><li>R</li></a>
						<a href="/alphabet/s"><li>S</li></a>
						<a href="/alphabet/t"><li>T</li></a>
						<a href="/alphabet/u"><li>U</li></a>
						<a href="/alphabet/v"><li>V</li></a>
						<a href="/alphabet/w"><li>W</li></a>
						<a href="/alphabet/x"><li>X</li></a>
						<a href="/alphabet/y"><li>Y</li></a>
						<a href="/alphabet/z"><li>Z</li></a>
					</ul>
					
					<ul class="benefits">
						<li class="delivery-icon">Моментальная доставка</li>
						<li class="best-prices-icon">Лучшие цены</li>
						<li class="convenient-payment-methods">Удобные способы оплаты</li>
					</ul>
					
				</div>
			</div>
		</div>
		
	</header> 
	<section>
		<div class="wrapper">
			
				