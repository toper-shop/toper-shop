<!DOCTYPE html>
<html lang="ru"><head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<meta name="robots" content="index, follow">
	<meta name="keywords" content="<?php echo $this->config->item('keywords'); ?>">
	<meta name="description" content="<?php echo $this->config->item('description'); ?>">
	<title><?php echo "Перенаправление". ' - ' . strip_tags($this->config->item('site_title')); ?></title>
<?php require_once 'header.php'; ?>

<div class="wrapper">
	
	<h1>Ключи «Испытай удачу!»</h1>
	<div class="keys">
		<a href="https://www.oplata.info/asp/pay_wm.asp?id_d=1708757&agent=396233" target="_blank">
			<div class="key silver" id="silver">
				<div class="price"><s>65 руб</s> <br> <span style="color: #f70465">35 руб</span></div>
			</div>
		</a>
		<a href="https://www.oplata.info/asp/pay_wm.asp?id_d=1708756&agent=396233" target="_blank">
			<div class="key gold" id="gold">
				<div class="price"><s>85 руб</s> <br> <span style="color: #f70465">45 руб</span></div>
			</div>
		</a>
		<a href="https://www.oplata.info/asp/pay_wm.asp?id_d=1708759&agent=396233" target="_blank">
			<div class="key platinum" id="platinum">
				<div class="price"><s>115 руб</s> <br> <span style="color: #f70465">60 руб</span></div>
			</div>
		</a>
		<a href="https://www.oplata.info/asp/pay_wm.asp?id_d=1708761&agent=396233" target="_blank">
			<div class="key elite" id="elite">
				<div class="price"><s>180 руб</s> <br> <span style="color: #f70465">100 руб</span></div>
			</div>
		</a>
		<div class="clear"></div>
	</div>
	
	<div class="desclock">До конца скидок осталось:</div>
	<div id="clock" class="counter"></div>
	
	<script type="text/javascript">
		$('#clock').countdown('2015/10/30', function(event) {
			$(this).html(event.strftime('%H:%M:%S'));
		});
	</script>
	<div id="description" class="description">Наведи курсор на товар, чтобы получить информацию о нём.</div>
	
	<br>
</div>
<div class="page-header">
	<?php $redi = (base_url()) .'search?q='. trim($_SERVER['REQUEST_URI'], "/"); 
		header('Location:'.$redi.'');
	?> 
	
</div>

</div>

<?php require_once ('footer.php'); ?>