<!DOCTYPE html>
<html lang="ru"><head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<meta name="robots" content="index, follow">
	<meta name="keywords" content="<?php echo $this->config->item('keywords'); ?>">
	<meta name="description" content="<?php echo $this->config->item('description'); ?>">
	<title><?php  $seo_title = strip_tags($seo_title); echo  $seo_title. ' - ' . strip_tags($this->config->item('site_title')); ?></title>
	<?php require_once 'header.php'; ?>
	
	<?php require_once 'sidebar.php';?>
	<?php if(count($movie_info)) : ?>	

	<?php if ($_COOKIE["partner_id"]) $partner_id = $_COOKIE["partner_id"];
		else $partner_id = $this->config->item('agent_id');
	?>
	<div class="right">
		<div id="goods">
			
			<div class="row2">
				<div class="img2" onclick="location.href='<?php echo '/goods/'.$movie_info[0]->digiseller_id; ?>'">
					<img class="lazy2 img2" src="<?php echo '/uploads/' . $movie_info[0]->thumbnail; ?>">
					</div>
				
				<div class="row-info2">
					<div class="title2">
						<a href="<?php echo '/goods/'.$movie_info[0]->digiseller_id; ?>" title="<?php print $movie_info[0]->goods_title; ?>"><?php print $movie_info[0]->goods_title; ?></a>
						<div class="category2"><?php foreach($genres as $genre): ?><?php echo $genre->genreName; ?><?php endforeach; ?></div>
					</div></div>
					<div class="coast"><p><?php print $movie_info[0]->price; ?> <b>руб.</b></p></div>
					
			</div>
			
			<h3 class="h3s"><span>Выберите способ оплаты</span></h3>
			
			<form id="payment-method-form" action="#">
				<div class="order-view">
					<div class="input">
						<input name="curr" type="radio" value="WMR">
					</div>
					<div class="icon">
						<b class="wm"></b>
					</div>
					<div class="text">
						<b>Webmoney.</b> Оплата через стандартный Webmoney Transfer или выписку счёта на ваш WMID. Учитывайте комиссию Webmoney за перевод - 0.8%.
					</div>
				</div>
				<div class="order-view">
					<div class="input">
						<input name="curr" type="radio" value="QSR">
					</div>
					<div class="icon">
						<b class="qiwi"></b>
					</div>
					<div class="text">
						<b>QIWI.</b> Через платёжный сервис Robokassa на ваш номер в системе QIWI будет выписан счёт, который будет необходимо оплатить в Личном Кабинете QIWI.
					</div>
				</div>
				<div class="order-view">
					<div class="input">
						<input name="curr" type="radio" value="PCR">
					</div>
					<div class="icon">
						<b class="yd"></b>
					</div>
					<div class="text">
						<b>Яндекс.Деньги.</b> Оплата через платёжный сервис Robokassa вы будете перенаправлены на оплату на сайте Яндекс.деньги.
					</div>
				</div>
				<div class="order-view">
					<div class="input">
						<input name="curr" type="radio" value="MRR">
					</div>
					<div class="icon">
						<b class="mail"></b>
					</div>
					<div class="text">
						<b>Деньги Mail.ru.</b> В процессе оплаты вам будут предоставлены все необходимые инструкции.
					</div>
				</div>
				<div class="order-view">
					<div class="input">
						<input name="curr" type="radio" value="ATM">
					</div>
					<div class="icon">
						<b class="term"></b>
					</div>
					<div class="text">
						<b>Терминал.</b> Оплата через терминал доступна жителям России и Украины.
						В процессе оплаты вам будут предоставлены все необходимые инструкции.
					</div>
				</div>
				<div class="order-view">
					<div class="input">
						<input name="curr" type="radio" value="MTS">
					</div>
					<div class="icon">
						<b class="mts"></b>
					</div>
					<div class="text">
						<b>МТС.</b> В процессе оплаты вам будут предоставлены все необходимые инструкции.
					</div>
				</div>
				<div class="order-view">
					<div class="input">
						<input name="curr" type="radio" value="MGF">
					</div>
					<div class="icon">
						<b class="mgfn"></b>
					</div>
					<div class="text">
						<b>Мегафон.</b> В процессе оплаты вам будут предоставлены все необходимые инструкции.
					</div>
				</div>
				<div class="order-view">
					<div class="input">
						<input name="curr" type="radio" value="BLN">
					</div>
					<div class="icon">
						<b class="bln"></b>
					</div>
					<div class="text">
						<b>Beeline.</b> В процессе оплаты вам будут предоставлены все необходимые инструкции.
					</div>
				</div>
				<div class="order-view">
					<div class="input">
						<input name="curr" type="radio" value="TL2">
					</div>
					<div class="icon">
						<b class="t2"></b>
					</div>
					<div class="text">
						<b>Tele 2.</b> В процессе оплаты вам будут предоставлены все необходимые инструкции.
					</div>
				</div>
				<div class="order-view">
					<div class="input">
						<input name="curr" type="radio" value="RCC">
					</div>
					<div class="icon">
						<b class="visa"></b>
					</div>
					<div class="text">
						<b>VISA.</b> Оплата банковскими картами осуществляется на стороне платёжного сервиса Robokassa и Платёж.ру.
					</div>
				</div>
				<div class="order-view">
					<div class="input">
						<input name="curr" type="radio" value="RCC">
					</div>
					<div class="icon">
						<b class="mcard"></b>
					</div>
					<div class="text">
						<b>MasterCard.</b> Оплата банковскими картами осуществляется на стороне платёжного сервиса Robokassa и Платёж.ру.
					</div>
				</div>
				<div class="order-view">
					<div class="input">
						<input name="curr" type="radio" value="ALF">
					</div>
					<div class="icon">
						<b class="aclk"></b>
					</div>
					<div class="text">
						<b>Альфа-клик.</b> Оплата доступна для всех клиентов интернет-банка Альфа-Клик. Платёж будет проведён через Webmoney Transfer и Альфа-Клик.
					</div>
				</div>
				<div class="order-view">
					<div class="input">
						<input name="curr" type="radio" value="PRR">
					</div>
					<div class="icon">
						<b class="post"></b>
					</div>
					<div class="text">
						<b>Почта России.</b> Оплата доступна через почтовое отделение на территории России.
					</div>
				</div>
				<div class="order-view">
					<div class="input">
						<input name="curr" type="radio" value="PPR">
					</div>
					<div class="icon">
						<b class="wmcard"></b>
					</div>
					<div class="text">
						<b>WM-карта.</b> В процессе оплаты вам будут предоставлены все необходимые инструкции.
					</div>
				</div>
				<div class="order-view">
					<div class="input">
						<input name="curr" type="radio" value="GFT">
					</div>
					<div class="icon">
						<b class="gift"></b>
					</div>
					<div class="text">
						<b>Подарочный сертификат.</b> В процессе оплаты вам будут предоставлены все необходимые инструкции.
					</div>
				</div>
				<div class="order-view">
					<div class="input">
						<input name="curr" type="radio" value="RBX">
					</div>
					<div class="icon">
						<b class="othr"></b>
					</div>
					<div class="text">
						<b>Другие способы.</b> Если вы не нашли нужного способа оплаты, то выберите этот пункт, чтобы посмотреть остальные варианты покупки.
					</div>
				</div>
			</form>
			
			<center style="margin-top: 20px;font-size: 14px;"><input type="checkbox" class="ch_agreement1" style="height: 15px;width: 15px;display: initial;margin-bottom: 0px;">&nbsp;Уведомлён, что Интернет-магазин и все его товары <b>СТРОГО</b> для <b><font color="blue">России и стран СНГ</font></b>. В описании каждого товара могут быть внесены дополнительные региональные ограничения.</center>
			<center style="margin-top: 10px;margin-bottom: 20px;font-size: 14px;"><input type="checkbox" class="ch_agreement2" style="height: 15px;width: 15px;display: initial;margin-bottom: 0px;">&nbsp;Я согласен с <a href="/soglashenie.docx">Договором-оферты.</a></center>
			
			<form id="oplata" action="http://www.oplata.info/asp/pay.asp" method="POST">
				<input type="hidden" value="<?php print $movie_info[0]->digiseller_id; ?>" name="id_goods">
				<input type="hidden" value="WMR" name="type_curr">
				<input type="hidden" value="<?=$partner_id?>" name="id_agent">
				<input type="hidden" value="<?php echo base_url(); ?>" name="failpage">
				<center><button type="submit" class="buy-button"><b>Далее</b></button></center>
			</form>
			
			<div class="error_agreements_text" style="display:none;"><center><b>Вы не согласились с условиями</b></center></div>
			<script>
				var checkbox_agree=[];
				checkbox_agree[0]='ch_agreement1';
				checkbox_agree[1]='ch_agreement2';
				var checkbox_agree_count=0;
				$( document ).ready(function() {
					$( "#oplata" ).bind( "submit", function() {
						
						
						
						checkbox_agree_count=0;
						$(".error_agreements_text").hide();
						for(i=0;i<checkbox_agree.length;i++)
						{
							if ($("."+checkbox_agree[i]).prop("checked"))
							checkbox_agree_count++;
						}
						if (checkbox_agree_count!=checkbox_agree.length)
						{
							$(".error_agreements_text").show();
							return false;
						}
					});
				});
			</script>
		</div>
	</div>
	<div class="clear"></div>
</section>
<?php else: ?>
<div class="right" itemscope="" itemtype="http://schema.org/Offer">
	
	<div class="info" itemprop="description" style="width:755px;text-align:center;">Товар не найден</div>
</div>
<div class="clear"></div>
<br>

</section>
<?php endif; ?>


<?php require_once 'footer.php'; ?>