<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		
		<title><?php  $seo_title = strip_tags($seo_title); echo  $seo_title. ' - ' . strip_tags($this->config->item('site_title')); ?></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.validate.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.form.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.colorbox-min.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/ajax.js"></script>  
		<script type="text/javascript" src="<?php echo base_url(); ?>js/autocomplete.js"></script>
		<link href="/css/jquery-ui.css" rel="Stylesheet"></link>
		<script src="/js/jquery-ui.js"></script>
		<link rel="stylesheet" type="text/css" href="/editor/jquery.cleditor.css" />
		<script type="text/javascript" src="/editor/jquery.cleditor.js"></script>
		
		<script type="text/javascript">
			$(document).ready(function () { $("#description").cleditor(); });
			$(document).ready(function () { $("#systemreq").cleditor(); });
		</script>

		<style>
		.ui-autocomplete {
		    max-height: 200px;
		    overflow-y: auto;
		    overflow-x: hidden;
		}
		* html .ui-autocomplete {
		    height: 200px;
		}
	  	</style>
		
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
				
				<form method="post" action="/admin/ajax_add_Item" id="ajax-Item-add" enctype="multipart/form-data">
					
					<div class="panel panel-default">
						<div class="panel-heading">Название и описание</div>
						<div class="panel-body">
							<input type="text" class="form-control" name="goods_title" id="title" value=""/>
							<br>
							
							<textarea name="description" id="description" rows="15" ></textarea>
							<br/>
						</div></div>
						<div class="row">
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">Характеристики</div>
									<div class="panel-body">
										
										<label>Жанр</label>
										<select size="1" class="form-control" name="genres[]" aria-controls="dataTbl">
										<option  value="-" class="input-xxlarge" id="-"/>Выбрать жанр</option>
										<?php foreach($genres as $g) { ?>
										<option  name="genres[]" value="<?php echo $g->genreID; ?>" class="input-xxlarge" id="<?=$g->genre;?>"/> <?php echo $g->genreName;  ?></option>
									<?php } ?>
								</select>
								
								<label>Язык</label>
								<input name="lang" id="lang" rows="5" value="" class="form-control">
								
								<label>Платформа</label>
								<input name="platform" id="platform" rows="5" value="" class="form-control">
								
								<label>Активация</label>
								<input name="activation" id="activation" rows="5" value="" class="form-control">
								
								<label>Дата релиза</label>
								<input type="text" class="form-control" name="release_date" id="release_date" value="" />
								
								<label>Издатель</label>
								<input name="publisher" id="publisher" rows="5" value="" class="form-control">
								
								<label>Видео</label>
								<input name="video" id="video" rows="5" value="" class="form-control">
								
							</div>
						</div>
				</div>
				
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">Информация</div>
						<div class="panel-body">
							
							<label>Цена</label>
							<input name="price" id="price" rows="5" value="" class="form-control">
							<label>Розничная цена</label>
							<input name="real_price" id="real_price" rows="5" value="" class="form-control">
							<label>ID товара на digiseller</label>
							<input name="digiseller_id" id="digiseller_id" rows="5" value="" class="form-control">
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">Загрузка изображения</div>
						<div class="panel-body">
							<span class="muted">Укажите ссылку на изображение</span>
							<input type="text" name="thumbnail_url" id="thumb" class="form-control" placeholder="http://www."/>
							<br/><span class="muted">или загрузите с компьютера</span>
							<input type="file" name="thumbnail_file" class="btn btn-default" style="display:inline;"/>
						</div>
					</div>
				</div>
				
			</div>
			
			<br/>
			<div class="panel panel-default">
				<div class="panel-body" style="margin-bottom:-20px;">
					
					<div class="row">
						<div class="col-xs-12 col-md-2" style="width: 20%;">
							<center><div class="panel panel-default">
								<div class="panel-heading">Новое</div>
								<div class="panel-body">
									<div class="btn-group" data-toggle="buttons">
										<label class="btn btn-success">
											<input type="radio" name="new_tab" id="new_tab" value="1" autocomplete="off"> Да
										</label>
										<label class="btn btn-success">
											<input type="radio" name="new_tab" id="new_tab" value="0" autocomplete="off"> Нет
										</label>
									</div>
								</div></div></center>
						</div>
						<div class="col-xs-12 col-md-2" style="width: 20%;">
							<center><div class="panel panel-default">
								<div class="panel-heading">Лидеры продаж</div>
								<div class="panel-body">
									<div class="btn-group" data-toggle="buttons">
										<label class="btn btn-success">
											<input type="radio" name="leader_tab" id="leader_tab" value="1" autocomplete="off"> Да
										</label>
										<label class="btn btn-success">
											<input type="radio" name="leader_tab" id="leader_tab" value="0" autocomplete="off"> Нет
										</label>
									</div></div></center>
							</div>
							<div class="col-xs-12 col-md-2" style="width: 20%;">
								<center><div class="panel panel-default">
									<div class="panel-heading">Предзаказ</div>
									<div class="panel-body">
										<div class="btn-group" data-toggle="buttons">
											<label class="btn btn-success">
												<input type="radio" name="preorder_tab" id="preorder_tab" value="1" autocomplete="off"> Да
											</label>
											<label class="btn btn-success">
												<input type="radio" name="preorder_tab" id="preorder_tab" value="0" autocomplete="off"> Нет
											</label>
										</div></div></center>
								</div>
								<div class="col-xs-12 col-md-2" style="width: 20%;">
									<center><div class="panel panel-default">
										<div class="panel-heading">Предложение дня</div>
										<div class="panel-body">
											<div class="btn-group" data-toggle="buttons">
												<label class="btn btn-success">
													<input type="radio" name="offer_day" id="offer_day" value="y" autocomplete="off"> Да
												</label>
												<label class="btn btn-success">
													<input type="radio" name="offer_day" id="offer_day" value="n" autocomplete="off"> Нет
												</label>
											</div></div></center>
									</div>
									<div class="col-xs-12 col-md-2" style="width: 20%;">
										<center><div class="panel panel-default">
											<div class="panel-heading">Наличие</div>
											<div class="panel-body">
												<div class="btn-group" data-toggle="buttons">
													<label class="btn btn-success active">
														<input type="radio" name="in_stock" id="in_stock" value="y" autocomplete="off"> Да
													</label>
													<label class="btn btn-success">
														<input type="radio" name="in_stock" id="in_stock" value="n" autocomplete="off"> Нет
													</label>
												</div></div></center>
										</div>
									</div>
								</div>
							</div>
							<br/>
							<div class="panel panel-default" style="margin-bottom:-10px;">
								<div class="panel-heading">Системные требования</div>
								<div class="panel-body">
									<textarea name="systemreq" id="systemreq" rows="5"></textarea>
								</div></div>
								<br/>
								
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								<center><input type="submit" name="sb" id="sbaddmov" value="Сохранить" class="btn btn-large btn-info"/></center>
						</form>
						
						
						<div class="ajax-Item-out"></div>
						
						
					</div>
					
				</div>
				
				<link href="/css/bootstrap.css" rel="stylesheet">
				<link href="/css/bootstrap.min.css" rel="stylesheet">
				<script src="/js/bootstrap.min.js"></script>
			</div>
			
			<center>
				<p>YT Shop Engine</p>
				<p>© <script type="text/javascript">var mdate = new Date(); document.write(mdate.getFullYear());</script> <a href="http://ytstyle.ru" target="_blank">YTstyle</a></p>
			</center>
		</body>
	</html>														