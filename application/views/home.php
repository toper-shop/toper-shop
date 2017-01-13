<!DOCTYPE html>
<html lang="ru"><head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<meta name="robots" content="index, follow">
	<meta name="keywords" content="<?php echo $this->config->item('keywords'); ?>">
	<meta name="description" content="<?php echo $this->config->item('description'); ?>">
	<title><?php echo "Главная страница". ' - ' . strip_tags($this->config->item('site_title')); ?></title>
	<?php require_once 'header.php'; ?>
	
	<div class="wrapper">
		<script>
$(function(){

	// default
	var def = 'Наведи курсор на товар, чтобы получить информацию о нём.';

	// silver
	$("#silver").hover(function(){
		$('#description').html('<?php echo $this->config->item('silver_desc'); ?>');
	},function(){$('#description').html(def);})

	// gold
	$("#gold").hover(function(){
		$('#description').html('<?php echo $this->config->item('gold_desc'); ?>');
	},function(){$('#description').html(def);})

	// platimun
	$("#platinum").hover(function(){
		$('#description').html('<?php echo $this->config->item('platinum_desc'); ?>');
	},function(){$('#description').html(def);})

	// elite
	$("#elite").hover(function(){
		$('#description').html('<?php echo $this->config->item('elite_desc'); ?>');
	},function(){$('#description').html(def);})
});
</script>

		
		<h1>Ключи «Испытай удачу!»</h1>
		
		<?php if ($_COOKIE["partner_id"]) $partner_id = $_COOKIE["partner_id"];
		else $partner_id = $this->config->item('agent_id');
		?>

		<div class="keys">
			<a href="https://www.oplata.info/asp/pay_wm.asp?id_d=<?=$this->config->item('silver_id')?>&agent=<?=$partner_id?>" target="_blank">
				<div class="key <?=$this->config->item('silver_ico')?>" id="silver">
					<div class="price">КУПИТЬ <br> <span style="color: #f70465"><?=$this->config->item('silver_price')?> руб</span></div>
				</div>
			</a>
			<a href="https://www.oplata.info/asp/pay_wm.asp?id_d=<?=$this->config->item('gold_id')?>&agent=<?=$partner_id?>" target="_blank">
				<div class="key <?=$this->config->item('gold_ico')?>" id="gold">
					<div class="price">КУПИТЬ <br> <span style="color: #f70465"><?=$this->config->item('gold_price')?> руб</span></div>
				</div>
			</a>
			<a href="https://www.oplata.info/asp/pay_wm.asp?id_d=<?=$this->config->item('platinum_id')?>&agent=<?=$partner_id?>" target="_blank">
				<div class="key <?=$this->config->item('platinum_ico')?>" id="platinum">
					<div class="price">КУПИТЬ <br> <span style="color: #f70465"><?=$this->config->item('platinum_price')?> руб</span></div>
				</div>
			</a>
			<a href="https://www.oplata.info/asp/pay_wm.asp?id_d=<?=$this->config->item('elite_id')?>&agent=<?=$partner_id?>" target="_blank">
				<div class="key <?=$this->config->item('elite_ico')?>" id="elite">
					<div class="price">КУПИТЬ <br> <span style="color: #f70465"><?=$this->config->item('elite_price')?> руб</span></div>
				</div>
			</a>
			<div class="clear"></div>
		</div>
		
		<div class="desclock">До конца скидок осталось:</div>
		<div id="clock" class="counter"></div>
		
		<script type="text/javascript">
			$('#clock').countdown('2025/10/30', function(event) {
				$(this).html(event.strftime('%H:%M:%S'));
			});
		</script>
		<div id="description" class="description">Наведи курсор на товар, чтобы получить информацию о нём.</div>
		
		<br>
	</div>
	
	
	
	<?php require_once 'sidebar.php'; ?>
	
	<div class="right">
		
		<div id="goods">
			<nav class="main-tabs">
				<a href="javascript:;" id="tab1" class="tabs">Новое</a>
				<a href="javascript:;" id="tab2" class="tabs active">Лидеры продаж</a>
				<a href="javascript:;" id="tab3" class="tabs">Предзаказ</a>
			</nav>
			<nav class="two-tabs">
				<a href="javascript:;" id="tab4" class="tabs">Игры ценой до 150 руб.</a>
				<a href="javascript:;" id="tab5" class="tabs">Игры ценой до 300 руб.</a>
				<a href="javascript:;" id="tab6" class="tabs">Игры ценой до 500 руб.</a>
			</nav>
			
			<div class="teeeest">
				<div id="con_tab1" class="tabs">
					<div class="rows">
						<?php if(count($featured_new_tab)) : ?>
						<?php $i=0; foreach($featured_new_tab as $Fitems): $i++; ?>
						<div class="row">
							<div class="img" onclick="location.href='<?php echo '/goods/'.$Fitems->digiseller_id; ?>'">
								<img class="lazy img" src="<?php echo '/uploads/' . $Fitems->thumbnail; ?>">
							</div>
							
							<div class="row-info">
								<div class="title"><a href="<?php echo '/goods/'.$Fitems->digiseller_id; ?>" title="<?php echo $Fitems->goods_title; ?>"><?php echo $Fitems->goods_title; ?></a></div>
								<div class="category"><?php foreach(genres_home($Fitems->goodsID) as $genre): ?><?php echo $genre->genreName; ?><?php endforeach; ?></div>
								<div class="price_item"><?php echo $Fitems->price; ?> руб.</div>
							</div>
						</div>
						<?php endforeach; ?>
						<div style="clear: both;"></div>
						<?php else: ?>
						<div class="info" itemprop="description" style="width:755px;text-align:center;">Товары не найдены</div>
						<?php endif; ?>					
					</div>
				</div>
				<div id="con_tab2" class="tabs active">
					<div class="rows">
						<?php if(count($featured_leader_tab)) : ?>
						<?php $i=0; foreach($featured_leader_tab as $Fitems): $i++; ?>
						<div class="row">
							<div class="img" onclick="location.href='<?php echo '/goods/'.$Fitems->digiseller_id; ?>'">
								<img class="lazy img" src="<?php echo '/uploads/' . $Fitems->thumbnail; ?>">
							</div>
							
							<div class="row-info">
								<div class="title"><a href="<?php echo '/goods/'.$Fitems->digiseller_id; ?>" title="<?php echo $Fitems->goods_title; ?>"><?php echo $Fitems->goods_title; ?></a></div>
								<div class="category"><?php foreach(genres_home($Fitems->goodsID) as $genre): ?><?php echo $genre->genreName; ?><?php endforeach; ?></div>
								<div class="price_item"><?php echo $Fitems->price; ?> руб.</div>
							</div>
						</div>
						<?php endforeach; ?>
						<div style="clear: both;"></div>
						<?php else: ?>
						<div class="info" itemprop="description" style="width:755px;text-align:center;">Товары не найдены</div>
						<?php endif; ?>
					</div>
				</div>
				<div id="con_tab3" class="tabs">
					<div class="rows">
						<?php if(count($featured_preorder_tab)) : ?>
						<?php $i=0; foreach($featured_preorder_tab as $Fitems): $i++; ?>
						<div class="row">
							<div class="img" onclick="location.href='<?php echo '/goods/'.$Fitems->digiseller_id; ?>'">
								<img class="lazy img" src="<?php echo '/uploads/' . $Fitems->thumbnail; ?>">
							</div>
							
							<div class="row-info">
								<div class="title"><a href="<?php echo '/goods/'.$Fitems->digiseller_id; ?>" title="<?php echo $Fitems->goods_title; ?>"><?php echo $Fitems->goods_title; ?></a></div>
								<div class="category"><?php foreach(genres_home($Fitems->goodsID) as $genre): ?><?php echo $genre->genreName; ?><?php endforeach; ?></div>
								<div class="price_item"><?php echo $Fitems->price; ?> руб.</div>
							</div>
						</div>
						<?php endforeach; ?>
						<div style="clear: both;"></div>
						<?php else: ?>
						<div class="info" itemprop="description" style="width:755px;text-align:center;">Товары не найдены</div>
						<?php endif; ?>
						
					</div>
				</div>						
				<div id="con_tab4" class="tabs">
					<div class="rows">
						<?php if(count($featured_items150)) : ?>
						<?php $i=0; foreach($featured_items150 as $Fitems): $i++; ?>
						<div class="row">
							<div class="img" onclick="location.href='<?php echo '/goods/'.$Fitems->digiseller_id; ?>'">
								<img class="lazy img" src="<?php echo '/uploads/' . $Fitems->thumbnail; ?>">
							</div>
							
							<div class="row-info">
								<div class="title"><a href="<?php echo '/goods/'.$Fitems->digiseller_id; ?>" title="<?php echo $Fitems->goods_title; ?>"><?php echo $Fitems->goods_title; ?></a></div>
								<div class="category"><?php foreach(genres_home($Fitems->goodsID) as $genre): ?><?php echo $genre->genreName; ?><?php endforeach; ?></div>
								<div class="price_item"><?php echo $Fitems->price; ?> руб.</div>
							</div>
						</div>
						<?php endforeach; ?>
						<div style="clear: both;"></div>
						<?php else: ?>
						<div class="info" itemprop="description" style="width:755px;text-align:center;">Товары не найдены</div>
						<?php endif; ?>
					</div>
				</div>
				<div id="con_tab5" class="tabs">
					<div class="rows">
						<?php if(count($featured_items300)) : ?>
						<?php $i=0; foreach($featured_items300 as $Fitems): $i++; ?>
						<div class="row">
							<div class="img" onclick="location.href='<?php echo '/goods/'.$Fitems->digiseller_id; ?>'">
								<img class="lazy img" src="<?php echo '/uploads/' . $Fitems->thumbnail; ?>">
							</div>
							
							<div class="row-info">
								<div class="title"><a href="<?php echo '/goods/'.$Fitems->digiseller_id; ?>" title="<?php echo $Fitems->goods_title; ?>"><?php echo $Fitems->goods_title; ?></a></div>
								<div class="category"><?php foreach(genres_home($Fitems->goodsID) as $genre): ?><?php echo $genre->genreName; ?><?php endforeach; ?></div>
								<div class="price_item"><?php echo $Fitems->price; ?> руб.</div>
							</div>
						</div>
						<?php endforeach; ?>
						<div style="clear: both;"></div>
					<?php else: ?>
					<div class="info" itemprop="description" style="width:755px;text-align:center;">Товары не найдены</div>
					<?php endif; ?>
					</div>
					</div>
					<div id="con_tab6" class="tabs">
					<div class="rows">
					<?php if(count($featured_items500)) : ?>
						<?php $i=0; foreach($featured_items500 as $Fitems): $i++; ?>
						<div class="row">
							<div class="img" onclick="location.href='<?php echo '/goods/'.$Fitems->digiseller_id; ?>'">
								<img class="lazy img" src="<?php echo '/uploads/' . $Fitems->thumbnail; ?>">
							</div>
							
							<div class="row-info">
								<div class="title"><a href="<?php echo '/goods/'.$Fitems->digiseller_id; ?>" title="<?php echo $Fitems->goods_title; ?>"><?php echo $Fitems->goods_title; ?></a></div>
								<div class="category"><?php foreach(genres_home($Fitems->goodsID) as $genre): ?><?php echo $genre->genreName; ?><?php endforeach; ?></div>
								<div class="price_item"><?php echo $Fitems->price; ?> руб.</div>
							</div>
						</div>
						<?php endforeach; ?>
					<div style="clear: both;"></div>
					<?php else: ?>
					<div class="info" itemprop="description" style="width:755px;text-align:center;">Товары не найдены</div>
					<?php endif; ?>
					</div>
					</div>
					</div>
					</div>
					</div>
					</div>
					</div>
					</div>
					<div class="clear"></div>
					<br>
					</div>
					</section>
				
					
					<?php require_once 'footer.php'; ?>																			