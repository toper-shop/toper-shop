<!DOCTYPE html>
<html lang="ru"><head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<meta name="robots" content="index, follow">
	<meta name="keywords" content="<?php echo $this->config->item('keywords'); ?>">
	<meta name="description" content="<?php echo $this->config->item('description'); ?>">
	<title><?php echo "Накопительная скидка". ' - ' . strip_tags($this->config->item('site_title')); ?></title>
	<?php require_once ('header.php'); ?>
	
	<?php require_once 'sidebar.php'; ?>
	
	<div class="right">
		
		
		<div id="goods">
			<div class="breadcrumb">
				<a href="/">Главная</a>
				<div class="crumb"></div>
				<a href="#">
					Скидки
				</a>
			</div>
			<div class="teeeest">
						<br>

							<article class="single-article clearfix">
				<center><h>Накопительная скидка</h></center>			
				<p>
				В нашем магазине работает система накопительной скидки. Смысл этой системы показать Вам, насколько выгодно стабильно закупаться в одном магазине, накапливая скидку и экономя каждый раз всё больше! Сумма покупок и скидка привязываются <u>к вашей почте</u>. 
				
				Скидки активированы для большинства товаров, за редким исключением(акции, рекламные проекты), и возможны от 1% до 15%. 
				Ниже представлена таблица соответствия потраченной суммы и накопленной скидки. Магазин оставляет за собой право регулировать размеры скидок ежемесячно и убирать скидку для выборочных позиций.</p>					
				<hr class="discount-hr">
				<?php if($this->config->item('discount_select') == '0'): ?>
				<div class="discount-table">
				<center>
					<h3><span>Таблица скидок</span></h3>
					<img src="/img/discounts.png">
					</center>
				</div>
				<?php elseif($this->config->item('discount_select') == '1'): ?>
					<center>
					<br>
					<div class="disc-view d-tbl">
					<?php 
					$xml = simplexml_load_string($result);
					echo'<div class="capt"><ul class="disc-table">';
					foreach($xml->product->discounts->discount as $discounts){
					echo'<li><span class="money">'.$discounts->summa.' $</span><span class="percent">'.$discounts->percent.' %</span></li>';
					}
					echo'</ul></div>';
					 ?>
					 </div></center>
					 <?php endif; ?>	
			</article>

					</div>
				</div>
				
		</div>
		
	</div>
	<div class="clear"></div>
	<br>
	
</div>
</section>

<?php require_once ('footer.php'); ?>