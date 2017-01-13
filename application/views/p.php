<!DOCTYPE html>
<html lang="ru"><head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<meta name="robots" content="index, follow">
	<meta name="keywords" content="<?php echo $this->config->item('keywords'); ?>">
	<meta name="description" content="<?php echo $this->config->item('description'); ?>">
	<title><?php echo "Как заработать". ' - ' . strip_tags($this->config->item('site_title')); ?></title>
<?php require_once ('header.php'); ?>

<?php require_once 'sidebar.php'; ?>

<div class="right">
	
	
	<div id="goods">
				<div class="breadcrumb">
				<a href="/">Главная</a>
					<div class="crumb"></div>
					<a href="#">
						Как заработать
						</a>
					</div>
					<br><br>

					
						<center>
						<p>Для того чтобы стать нашим партнёром и получать <b>30%</b> с каждой агентской продажи ключа <br> "Испытай Удачу" и от 5% до 15% за обычные игры<br>Вам потребуется зарегистрироваться в системе <a href="http://digiseller.ru/outside/check.asp" target="_blank">DigiSeller.ru</a>
						<br>Ниже описаны 3 простых шага.</p><br>
						<img src="/img/p/1.png" width="700">
						<img src="/img/p/2.png" width="700">
						<img src="/img/p/3.png" width="700">
						<br>
						<p>После регистрации авторизуйтесь в <a href="https://my.digiseller.ru/inside/ad.asp" target="_blank">личном кабинете</a>.</p><br>
						<img src="/img/p/4.png">
						<p>Обратите внимание на идентификатор (ID) - данный номер уникален и он лично ваш.<br>
						Теперь вы можете использовать ссылку партнёра подставив свой ID:<br><span style="background:#000; color:#fff;"><?php echo base_url(); ?>r?id=ВАШID</span></p>
						<br>
						</center>

				</div>
	
</div>
<div class="clear"></div>
<br>

</div>
</section>

<?php require_once ('footer.php'); ?>