<!DOCTYPE html>
<html lang="ru"><head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<meta name="robots" content="index, follow">
	<meta name="keywords" content="<?php echo $this->config->item('keywords'); ?>">
	<meta name="description" content="<?php echo $this->config->item('description'); ?>">
	<title><?php echo "Отзывы". ' - ' . strip_tags($this->config->item('site_title')); ?></title>
<?php require_once ('header.php'); ?>

<?php require_once 'sidebar.php'; ?>

<div class="right">
	
	
	<div id="goods">
		<div class="breadcrumb">
			<a href="/">Главная</a>
			<div class="crumb"></div>
			<a href="#">Отзывы</a>
		</div>
		<div class="teeeest"><br>
		<!-- Put this script tag to the <head> of your page -->
				
				<!-- Put this div tag to the place, where the Comments block will be -->
				<div id="vk_comments"></div>
				
				<script type="text/javascript">
					VK.init({apiId: <?=$this->config->item('vk_id_app')?>, onlyWidgets: true});
				</script>
				
				<script type="text/javascript">
					VK.Widgets.Comments("vk_comments", {limit: 5, width: "755", attach: false});
				</script>
		</div>
	</div>
	
</div>
<div class="clear"></div>
<br>

</div>
</section>

<?php require_once ('footer.php'); ?>