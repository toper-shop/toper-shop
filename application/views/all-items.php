<!DOCTYPE html>
<html lang="ru"><head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<meta name="robots" content="index, follow">
	<meta name="keywords" content="<?php echo $this->config->item('keywords'); ?>">
	<meta name="description" content="<?php echo $this->config->item('description'); ?>">
	<title><?php  $seo_title = strip_tags($seo_title); echo  $seo_title. ' - ' . strip_tags($this->config->item('site_title')); ?></title>
<?php require_once 'header.php'; ?>

<?php require_once 'sidebar.php'; ?>

<div class="right">
	
	
	
	<div id="goods">
		
		
		<div class="teeeest">
			<div >
				<div class="rows">
					<?php if(isset($error)) print $error; ?>
					
					<?php if(!isset($items) OR !count($items)) : ?>
					
					<?php else: ?>
					
					
					
					<?php $i=0; foreach($items as $FMovie): $i++; ?>
					<div class="row">
						<div class="img" onclick="location.href='<?php echo '/goods/'.$FMovie->digiseller_id; ?>'">
							<img class="lazy img" data-original="<?php echo '/uploads/' . $FMovie->thumbnail; ?>">
						</div>
						
						<div class="row-info">
							<div class="title"><a href="<?php echo '/goods/'.$FMovie->digiseller_id; ?>" title="<?php echo $FMovie->goods_title; ?>"><?php echo $FMovie->goods_title; ?></a></div>
							<div class="category"><?php foreach(genres_home($FMovie->goodsID) as $genre): ?><?php echo $genre->genreName; ?><?php endforeach; ?></div>
							<div class="price_item"><?php echo $FMovie->price; ?> руб.</div>
						</div>
					</div>
					<?php endforeach; ?>
					<div style="clear: both;"></div>
				
					
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