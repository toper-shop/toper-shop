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
				echo 'Настройки '.' - ' . strip_tags($ci->config->item('site_title'));
			} 
		?> 
		</title>
		<link href="/css/bootstrap.css" rel="stylesheet">
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<script src="/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.validate.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.form.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.colorbox-min.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/ajax.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/config-data.js"></script>   

		<script type="text/javascript">
			var me_ver = "<?=YTSE_VERSION?>";
			var api_url = "//client.ytse.ru/api/";
		</script>
		
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
				
				<div class="padding">
					<form action="<?php echo base_url(); ?>admin/settings" method="post" accept-charset="utf-8">
						
						<div class="panel panel-default">
							<div class="panel-heading" style="text-align: center;">КЛЮЧИ «ИСПЫТАЙ УДАЧУ!»</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-xs-6 col-md-3"><div class="panel panel-default">
										<div class="panel-body">
											<div class="row">
												<div class="col-xs-6"><label>Цена</label><input type="text" class="form-control" name="silver_price" id="silver_price" value="<?=$this->config->item('silver_price')?>"></div>
												<div class="col-xs-6"><label>ID товара</label><input type="text" class="form-control" name="silver_id" id="silver_id" value="<?=$this->config->item('silver_id')?>"></div>
											</div><br><label>Тип</label>
											<select name="silver_ico" id="silver_ico" class="form-control">
												<option value="silver" <?php if($this->config->item('silver_ico') == 'silver') echo 'selected'; ?> >silver</option>
												<option value="gold" <?php if($this->config->item('silver_ico') == 'gold') echo 'selected'; ?> >gold</option>
												<option value="platinum" <?php if($this->config->item('silver_ico') == 'platinum') echo 'selected'; ?> >platinum</option>
												<option value="elite" <?php if($this->config->item('silver_ico') == 'elite') echo 'selected'; ?> >elite</option>
												<option value="gift-silver" <?php if($this->config->item('silver_ico') == 'gift-silver') echo 'selected'; ?> >gift-silver</option>
												<option value="gift-gold" <?php if($this->config->item('silver_ico') == 'gift-gold') echo 'selected'; ?> >gift-gold</option>
												<option value="gift-platinum" <?php if($this->config->item('silver_ico') == 'gift-platinum') echo 'selected'; ?> >gift-platinum</option>
												<option value="wot" <?php if($this->config->item('silver_ico') == 'wot') echo 'selected'; ?> >wot</option>
												<option value="steam" <?php if($this->config->item('silver_ico') == 'steam') echo 'selected'; ?> >steam</option>
												<option value="origin" <?php if($this->config->item('silver_ico') == 'origin') echo 'selected'; ?> >origin</option>
											</select>
											<br><label>Описание</label>
											<textarea class="form-control" name="silver_desc" ><?=$this->config->item('silver_desc')?></textarea>
										</div>
									</div></div>
									<div class="col-xs-6 col-md-3"><div class="panel panel-default">
										<div class="panel-body">
											<div class="row">
												<div class="col-xs-6"><label>Цена</label><input type="text" class="form-control" name="gold_price" value="<?=$this->config->item('gold_price')?>"></div>
												<div class="col-xs-6"><label>ID товара</label><input type="text" class="form-control" name="gold_id" value="<?=$this->config->item('gold_id')?>"></div>
											</div>
											<br><label>Тип</label>
											<select name="gold_ico" id="gold_ico" class="form-control">
												<option value="silver" <?php if($this->config->item('gold_ico') == 'silver') echo 'selected'; ?> >silver</option>
												<option value="gold" <?php if($this->config->item('gold_ico') == 'gold') echo 'selected'; ?> >gold</option>
												<option value="platinum" <?php if($this->config->item('gold_ico') == 'platinum') echo 'selected'; ?> >platinum</option>
												<option value="elite" <?php if($this->config->item('gold_ico') == 'elite') echo 'selected'; ?> >elite</option>
												<option value="gift-silver" <?php if($this->config->item('gold_ico') == 'gift-silver') echo 'selected'; ?> >gift-silver</option>
												<option value="gift-gold" <?php if($this->config->item('gold_ico') == 'gift-gold') echo 'selected'; ?> >gift-gold</option>
												<option value="gift-platinum" <?php if($this->config->item('gold_ico') == 'gift-platinum') echo 'selected'; ?> >gift-platinum</option>
												<option value="wot" <?php if($this->config->item('gold_ico') == 'wot') echo 'selected'; ?> >wot</option>
												<option value="steam" <?php if($this->config->item('gold_ico') == 'steam') echo 'selected'; ?> >steam</option>
												<option value="origin" <?php if($this->config->item('gold_ico') == 'origin') echo 'selected'; ?> >origin</option>
											</select>
											<br><label>Описание</label>
											<textarea class="form-control" name="gold_desc" ><?=$this->config->item('gold_desc')?></textarea>
										</div>
									</div></div>
									<div class="col-xs-6 col-md-3"><div class="panel panel-default">
										<div class="panel-body">
											<div class="row">
												<div class="col-xs-6"><label>Цена</label><input type="text" class="form-control" name="platinum_price" value="<?=$this->config->item('platinum_price')?>"></div>
												<div class="col-xs-6"><label>ID товара</label><input type="text" class="form-control" name="platinum_id" value="<?=$this->config->item('platinum_id')?>"></div>
											</div>
											<br><label>Тип</label>
											<select name="platinum_ico" id="platinum_ico" class="form-control">
												<option value="silver" <?php if($this->config->item('platinum_ico') == 'silver') echo 'selected'; ?> >silver</option>
												<option value="gold" <?php if($this->config->item('platinum_ico') == 'gold') echo 'selected'; ?> >gold</option>
												<option value="platinum" <?php if($this->config->item('platinum_ico') == 'platinum') echo 'selected'; ?> >platinum</option>
												<option value="elite" <?php if($this->config->item('platinum_ico') == 'elite') echo 'selected'; ?> >elite</option>
												<option value="gift-silver" <?php if($this->config->item('platinum_ico') == 'gift-silver') echo 'selected'; ?> >gift-silver</option>
												<option value="gift-gold" <?php if($this->config->item('platinum_ico') == 'gift-gold') echo 'selected'; ?> >gift-gold</option>
												<option value="gift-platinum" <?php if($this->config->item('platinum_ico') == 'gift-platinum') echo 'selected'; ?> >gift-platinum</option>
												<option value="wot" <?php if($this->config->item('platinum_ico') == 'wot') echo 'selected'; ?> >wot</option>
												<option value="steam" <?php if($this->config->item('platinum_ico') == 'steam') echo 'selected'; ?> >steam</option>
												<option value="origin" <?php if($this->config->item('platinum_ico') == 'origin') echo 'selected'; ?> >origin</option>
											</select>
											<br><label>Описание</label>
											<textarea class="form-control" name="platinum_desc" ><?=$this->config->item('platinum_desc')?></textarea>
										</div>
									</div></div>
									<div class="col-xs-6 col-md-3"><div class="panel panel-default">
										<div class="panel-body">
											<div class="row">
												<div class="col-xs-6"><label>Цена</label><input type="text" class="form-control" name="elite_price" value="<?=$this->config->item('elite_price')?>"></div>
												<div class="col-xs-6"><label>ID товара</label><input type="text" class="form-control" name="elite_id" value="<?=$this->config->item('elite_id')?>"></div>
											</div>
											<br><label>Тип</label>
											<select name="elite_ico" id="elite_ico" class="form-control">
												<option value="silver" <?php if($this->config->item('elite_ico') == 'silver') echo 'selected'; ?> >silver</option>
												<option value="gold" <?php if($this->config->item('elite_ico') == 'gold') echo 'selected'; ?> >gold</option>
												<option value="platinum" <?php if($this->config->item('elite_ico') == 'platinum') echo 'selected'; ?> >platinum</option>
												<option value="elite" <?php if($this->config->item('elite_ico') == 'elite') echo 'selected'; ?> >elite</option>
												<option value="gift-silver" <?php if($this->config->item('elite_ico') == 'gift-silver') echo 'selected'; ?> >gift-silver</option>
												<option value="gift-gold" <?php if($this->config->item('elite_ico') == 'gift-gold') echo 'selected'; ?> >gift-gold</option>
												<option value="gift-platinum" <?php if($this->config->item('elite_ico') == 'gift-platinum') echo 'selected'; ?> >gift-platinum</option>
												<option value="wot" <?php if($this->config->item('elite_ico') == 'wot') echo 'selected'; ?> >wot</option>
												<option value="steam" <?php if($this->config->item('elite_ico') == 'steam') echo 'selected'; ?> >steam</option>
												<option value="origin" <?php if($this->config->item('elite_ico') == 'origin') echo 'selected'; ?> >origin</option>
											</select>
											<br><label>Описание</label>
											<textarea class="form-control" name="elite_desc" ><?=$this->config->item('elite_desc')?></textarea>
										</div>
									</div></div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6"><div class="panel panel-default">
								<div class="panel-heading">Настройки сайта</div>
								<div class="panel-body">
									<label class="control-label" for="site_title">Название сайта<br></label>
									<input type="text" class="form-control" name="site_title" value="<?=$this->config->item('site_title')?>">
									<label class="control-label" for="slogan">Слоган<br></label>
									<input type="text" class="form-control" name="slogan" value="<?=$this->config->item('slogan')?>">
									<label class="control-label" for="keywords">Ключевые слова<br></label>
									<input type="text" class="form-control" name="keywords" value="<?=$this->config->item('keywords')?>">
									<label class="control-label" for="description">Описание сайта<br></label>
									<input type="text" class="form-control" name="description" value="<?=$this->config->item('description')?>">
									<hr>
									<label class="control-label" for="description">Вид скидки<br></label>
									<select name="discount_select" id="discount_select" class="form-control">
												<option value="0" <?php if($this->config->item('discount_select') == '0') echo 'selected';?> >Картинка</option>
												<option value="1" <?php if($this->config->item('discount_select') == '1') echo 'selected';?> >Digiseller</option>
									</select>
									<label class="control-label" for="pars_discount">Id товара для вычисления скидки<br></label>
									<input type="text" class="form-control" id="pars_discount" name="pars_discount" value="<?=$this->config->item('pars_discount')?>">
								</div>
							</div></div>
							<div class="col-md-6"><div class="panel panel-default">
								<div class="panel-heading">Настройки Вконтакте</div>
								<div class="panel-body">
									<label class="control-label" for="vk_id_group">ID группы вконтакте<br></label>
									<input type="text" class="form-control" name="vk_id_group" value="<?=$this->config->item('vk_id_group')?>">
									<label class="control-label" for="vk_id_app">ID приложения вконтакте<br></label>
									<input type="text" class="form-control" name="vk_id_app" value="<?=$this->config->item('vk_id_app')?>">
								</div>
							</div></div>
							<div class="col-md-6"><div class="panel panel-default">
								<div class="panel-heading">Личные настройки</div>
								<div class="panel-body">
									<label class="control-label" for="agent_id">Агентский ID<br></label>
									<input type="text" class="form-control" name="agent_id" value="<?=$this->config->item('agent_id')?>">
									<label class="control-label" for="wmid">WMID<br></label>
									<input type="text" class="form-control" name="wmid" value="<?=$this->config->item('wmid')?>">
								</div>
							</div>
							<center><span id="check"><button type="button" class="btn btn-primary">Проверить обновления</button></span></center>
							</div>
						</div>
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
						<input type="submit" name="submit" class="btn btn-success" value="Применить">
						
					</form>
				</div></div>
				
			<center>
				<p>YT Shop Engine</p>
				<p>© <script type="text/javascript">var mdate = new Date(); document.write(mdate.getFullYear());</script> <a href="http://ytstyle.ru" target="_blank">YTstyle</a></p>
			</center>
				
			</body>
		</html>																