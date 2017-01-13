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
				echo 'Редактирование жанра '.' - ' . strip_tags($ci->config->item('site_title'));
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
				<?php if(isset($genres_data->genreID)) : ?> 
					<div class="panel-heading">Редактирование жанра "<?=stripslashes($genres_data->genreName) ?>"</div>
					<div class="panel-body">
						<form method="post" action="" class="form-horizontal">
							URL жанра : <input type="text" class="form-control" name="genre" value="<?=stripslashes($genres_data->genre) ?>" /><br>
							Название жанра : <input type="text" class="form-control" name="genreName" value="<?=stripslashes($genres_data->genreName) ?>" /><br>
							<input type="hidden" name="id" value="<?=stripslashes($genres_data->genreID) ?>"/>
							<input type="submit" name="sb" value="Изменить" class="btn"/>
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
						</form>
					</div>
					<?php else: ?>
						<p class="bg-danger" style="text-align: center;font-weight: bold;">Жанр не существует.</p>
					<?php endif; ?>
					</div>
					
			</div>
			
		</div>
	</div>
	
	<center>
		<p>YT Shop Engine</p>
		<p>© <script type="text/javascript">var mdate = new Date(); document.write(mdate.getFullYear());</script> <a href="http://ytstyle.ru" target="_blank">YTstyle</a></p>
	</center>
</body>
</html>							