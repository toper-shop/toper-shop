<!DOCTYPE html>
<html lang="ru"><head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<meta name="robots" content="index, follow">
	<meta name="keywords" content="<?php echo $this->config->item('keywords'); ?>">
	<meta name="description" content="<?php echo $this->config->item('description'); ?>">
	<title><?php echo "Гарантии". ' - ' . strip_tags($this->config->item('site_title')); ?></title>
<?php require_once ('header.php'); ?>

<?php require_once 'sidebar.php'; ?>

<div class="right">
	
	
	<div id="goods">
		<div class="breadcrumb">
			<a href="/">Главная</a>
			<div class="crumb"></div>
			<a href="#">Гарантии</a>
		</div>
		<div class="teeeest">
			
			
			<a href="http://oplata.info" target="_blank"><img src="/img/oplata-info.png" alt=""></a>
			<br>
			<a href="http://passport.webmoney.ru/asp/certview.asp?wmid=<?=$this->config->item('wmid')?>" target="_blank"><div class="example2">
    <img src="/img/wm.png" class="example_beauty">
    <span><?=$this->config->item('wmid')?></span></div></a>
			
			<br><br><br><br><br><br><br><br>
		</div>
	</div>
	
</div>
<div class="clear"></div>
<br>

</div>
</section>

<?php require_once ('footer.php'); ?>