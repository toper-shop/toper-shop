<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		
		<title><?php if(isset($seo_title)) 
			{
				$seo_title = strip_tags($seo_title);
				echo $seo_title;
				}else{
				$ci = &get_instance();
				echo 'Жанры '.' - ' . strip_tags($ci->config->item('site_title'));
			} 
		?> 
		</title>
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
				
				<div class="panel panel-default">
					<div class="panel-heading">Добавление нового жанра</div>
					<div class="panel-body">
						<form method="post" action="" class="form-horizontal">
							URL жанра : <input type="text" class="form-control" name="genre" /><br>
							Название жанра : <input type="text" class="form-control" name="genreName" /><br>
							<input type="submit" name="sb" value="Добавить" class="btn"/>
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
						</form>
					</div></div>
					
					<?php if(count($comments)) : ?>
					<div class="alert alert-warning"><?php echo 'Всего жанров в базе: '.count($comments); ?></div>
					
					
					<?php if(isset($error)) print $error; ?>
					<table class="table table-bordered table-striped KeyTable" id="dataTbl">
						<thead>
							<tr>
								<th>ID</th>
								<th>URL жанра</th>
								<th>Название жанра</th>
								<th>Товаров в жанре</th>
								<th>Действия</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($comments as $m) : ?>
							
							<tr>
								<td><?=$m->genreID?></td>
								<td><?=$m->genre?></td>
								<td><?=$m->genreName?></td>
								<td><?=$m->titems?></td>
								<td><a href="/admin/genres/edit/<?=$m->genreID;?>"><b class="glyphicon glyphicon-pencil"></b> Редактировать</a> &nbsp; <a href="/admin/genres/remove/<?=$m->genreID;?>" onclick="return confirm('Удалить жанр?')" ><b class="glyphicon glyphicon-remove"></b>  Удалить</a></td>
							</tr>
							
							<?php endforeach; ?>
						</tbody>
					</table>
					
					<?php else: ?>
					
					- Нет жанров -
					
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