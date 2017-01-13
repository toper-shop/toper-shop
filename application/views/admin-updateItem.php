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
		<link rel="stylesheet" type="text/css" href="/editor/jquery.cleditor.css" />
		<script type="text/javascript" src="/editor/jquery.cleditor.js"></script>
		<link href="/css/jquery-ui.css" rel="Stylesheet"></link>
		<script src="/js/jquery-ui.js"></script>
		
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
			
			<div class="page-header" style="margin: 20px 0 20px;">
				
				<?php require_once 'admin-menu.php'; ?>
				
				<form method="post" action="/admin/ajax_update_Item" id="ajax-Item-add" enctype="multipart/form-data">
					
					<input type="hidden" name="Item_id" value="<?=$Item_data->goodsID;?>" />
					<input type="hidden" name="goods_type" value="Item" />
					
					
					<div class="panel panel-default">
						<div class="panel-heading">Название и описание</div>
						<div class="panel-body">
							<input type="text" class="form-control" name="goods_title" id="title" value="<?=$Item_data->goods_title ?>"/>
							<br>
							
							<textarea name="description" id="description" rows="15" ><?=stripslashes($Item_data->description) ?></textarea>
							<br/>
						</div></div>
						<div class="row">
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">Характеристики</div>
									<div class="panel-body">
										
										<label>Жанр</label>
										<select size="1" class="form-control" name="genres[]" aria-controls="dataTbl">
											<?php $current_genres = explode(",", $Item_data->genres); ?>
											<?php foreach($genres as $g) { ?>
											<option <?php if(in_array($g->genreID, $current_genres)) echo 'selected'; ?> name="genres[]" value="<?php echo $g->genreID; ?>" class="input-xxlarge" id="<?=$g->genre;?>"/> <?php echo $g->genreName;  ?></option>
										<?php } ?>
									</select>
									
									<label>Язык</label>
									<input name="lang" id="lang" rows="5" value="<?=stripslashes($Item_data->lang) ?>" class="form-control">
									
									<label>Платформа</label>
									<input name="platform" id="platform" rows="5" value="<?=stripslashes($Item_data->platform) ?>" class="form-control">
									
									<label>Активация</label>
									<input name="activation" id="activation" rows="5" value="<?=stripslashes($Item_data->activation) ?>" class="form-control">
									
									<label>Дата релиза</label>
									<input type="text" class="form-control" name="release_date" id="release_date" value="<?=$Item_data->release_date ?>" />
									
									<label>Издатель</label>
									<input name="publisher" id="publisher" rows="5" value="<?=stripslashes($Item_data->publisher) ?>" class="form-control">
									
									<label>Видео</label>
									<input name="video" id="video" rows="5" value="<?=stripslashes($Item_data->video) ?>" class="form-control">
									
								</div>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">Информация</div>
								<div class="panel-body">
									
									<label>Цена</label>
									<input name="price" id="price" rows="5" value="<?=stripslashes($Item_data->price) ?>" class="form-control">
									<label>Розничная цена</label>
									<input name="real_price" id="real_price" rows="5" value="<?=stripslashes($Item_data->real_price) ?>" class="form-control">
									<label>ID товара на digiseller</label>
									<input name="digiseller_id" id="digiseller_id" rows="5" value="<?=stripslashes($Item_data->digiseller_id) ?>" class="form-control">
								</div>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">Загрузка изображения</div>
								<div class="panel-body">
									
									<?php $img_prop = array('src' => '/uploads/' . $Item_data->thumbnail, 
									'width' => 292, 'height' => 136, 'alt' => htmlspecialchars($Item_data->goods_title)); ?>
									<center>
										<?php echo img($img_prop); ?>
									</center>
									<hr/>
									
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
											<label class="btn btn-success <?php if($Item_data->new_tab == '1') echo 'active'; ?>">
												<input type="radio" name="new_tab" id="new_tab" value="1" autocomplete="off"> Да
											</label>
											<label class="btn btn-success <?php if($Item_data->new_tab == '0') echo 'active'; ?>">
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
											<label class="btn btn-success <?php if($Item_data->leader_tab == '1') echo 'active'; ?>">
												<input type="radio" name="leader_tab" id="leader_tab" value="1" autocomplete="off"> Да
											</label>
											<label class="btn btn-success <?php if($Item_data->leader_tab == '0') echo 'active'; ?>">
												<input type="radio" name="leader_tab" id="leader_tab" value="0" autocomplete="off"> Нет
											</label>
										</div></div></center>
								</div>
								<div class="col-xs-12 col-md-2" style="width: 20%;">
									<center><div class="panel panel-default">
										<div class="panel-heading">Предзаказ</div>
										<div class="panel-body">
											<div class="btn-group" data-toggle="buttons">
												<label class="btn btn-success <?php if($Item_data->preorder_tab == '1') echo 'active'; ?>">
													<input type="radio" name="preorder_tab" id="preorder_tab" value="1" autocomplete="off"> Да
												</label>
												<label class="btn btn-success <?php if($Item_data->preorder_tab == '0') echo 'active'; ?>">
													<input type="radio" name="preorder_tab" id="preorder_tab" value="0" autocomplete="off"> Нет
												</label>
											</div></div></center>
									</div>
									<div class="col-xs-12 col-md-2" style="width: 20%;">
										<center><div class="panel panel-default">
											<div class="panel-heading">Предложение дня</div>
											<div class="panel-body">
												<div class="btn-group" data-toggle="buttons">
													<label class="btn btn-success <?php if($Item_data->offer_day == 'y') echo 'active'; ?>">
														<input type="radio" name="offer_day" id="offer_day" value="y" autocomplete="off"> Да
													</label>
													<label class="btn btn-success <?php if($Item_data->offer_day == 'n') echo 'active'; ?>">
														<input type="radio" name="offer_day" id="offer_day" value="n" autocomplete="off"> Нет
													</label>
												</div></div></center>
										</div>
										<div class="col-xs-12 col-md-2" style="width: 20%;">
											<center><div class="panel panel-default">
												<div class="panel-heading">Наличие</div>
												<div class="panel-body">
													<div class="btn-group" data-toggle="buttons">
														<label class="btn btn-success <?php if($Item_data->in_stock == 'y') echo 'active'; ?>">
															<input type="radio" name="in_stock" id="in_stock" value="y" autocomplete="off"> Да
														</label>
														<label class="btn btn-success <?php if($Item_data->in_stock == 'n') echo 'active'; ?>">
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
										<textarea name="systemreq" id="systemreq" rows="5"><?=stripslashes($Item_data->systemreq) ?></textarea>
									</div></div>
									<br/>
									
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
									<center><input type="submit" name="sb" id="sbaddmov" value="Сохранить" class="btn btn-large btn-info"/></center>
							</form>
							
							<div class="ajax-Item-out"></div>
							
							
						</div>
						
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