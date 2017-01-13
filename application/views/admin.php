<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		
		<title><?php  $seo_title = strip_tags($seo_title); echo  $seo_title. ' - ' . strip_tags($this->config->item('site_title')); ?></title>
		<link href="/css/bootstrap.css" rel="stylesheet">
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<script src="/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.validate.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.form.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.colorbox-min.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/ajax.js"></script>   

		<!--[if gte IE 9]>
			<style type="text/css">
			.gradient {
			filter: none;
			}
			</style>
		<![endif]-->
	</head>
	<body>
		
		<div class=".col-md-8 container" >
			
			<div class="page-header">
				
				<?php require_once 'admin-menu.php'; ?>
				
				<?php if(count($items)) : ?>
				<div class="alert alert-warning"><?php echo 'Товаров добавлено: '. count($items); ?></div>
				
				<table class="table table-bordered table-striped" id="dataTbl">
					<thead>
						<tr>
							<th>Название</th>
							<th>Категория</th>
							<th>Цена</th>
							<th>Действия</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($items as $m) : ?>
						
						<tr>
							<td><?=anchor('/goods/'.$m->digiseller_id, $m->goods_title, array('target' => '_blank')); ?> <?php if($m->offer_day == 'y') echo '<b class="glyphicon glyphicon-gift" title="Предложение дня"></b>';?> </td>
							<td><?php foreach(genres_home($m->goodsID) as $genre): ?><?php echo $genre->genreName; ?><?php endforeach; ?></td>
							<td>
								<?php if($m->in_stock == 'n'): ?>
								<font color="red" title="Нет в наличии"><?=($m->price)?></font>
								<?php else: ?>
								<?=($m->price)?>
								<?php endif; ?>
							<a href="/admin/price_create/<?=($m->digiseller_id)?>" title="Обновить цену"><span class="glyphicon glyphicon-refresh"></span></a></td>
							<td>
								<a href="/admin/update_item/<?=$m->goodsID;?>"><b class="glyphicon glyphicon-pencil"></b> Редактировать</a>
								&nbsp; 
								<a href="/admin/index/remove/<?=$m->goodsID;?>" onclick="return confirm('Удалить товар?')" ><b class="glyphicon glyphicon-remove"></b> Удалить</a>
							</td>
						</tr>
						
						<?php endforeach; ?>
					</tbody>
				</table>
				
				<?php endif; ?>
			</div>
			
		</div>
	</div>
	
	<center>
		<p>YT Shop Engine</p>
		<p>© <script type="text/javascript">var mdate = new Date(); document.write(mdate.getFullYear());</script> <a href="http://ytstyle.ru" target="_blank">YTstyle</a></p>
	</center>
	
</body>
</html>					