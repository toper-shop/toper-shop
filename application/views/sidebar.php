<div class="left">
	<div class="ttttttteees">
		<ul class="menu" style="/*position: fixed;*/">
			<a href="/main/allgoods"><li>Все игры</li></a>
			<!-- <a href="#"><li style="color: #f50062;">Как активировать?</li></a> -->
			<?php 
				if(count(genres_dropdown())) : 
				foreach(genres_dropdown() as $g) : 
				echo '<li> '. anchor('/genres/'.url_title($g->genre), $g->genreName) . '</li>' ;
				endforeach; 
				endif; 
			?>		

			<div class="special-today">
				<p class="text">Предложение дня</p>
				<?php if(count(featured_sidebar())) : foreach(featured_sidebar() as $ftv): ?>
			<?php $img_prop = array('src' => '/uploads/' . $ftv->thumbnail, 'width' => 155, 'height' => 72, 'alt' => htmlspecialchars($ftv->goods_title)); ?>
			
			<a href="<?php echo '/goods/'.$ftv->digiseller_id; ?>" >
				<div class="preview">
					<?php echo img($img_prop); ?>
				</div>
				
				<div class="name text"><?php echo $ftv->goods_title; ?></div>
				<div class="clear"></div>
				<div class="genre text"><?php foreach(genres_home($ftv->goodsID) as $genre): ?><?php echo $genre->genreName; ?><?php endforeach; ?></div>
				<div class="clear"></div>
				<div class="price-item text"><?php echo $ftv->price; ?> руб.</div>
			</a>
			<div class="clear"></div>
				<br>
			<?php endforeach; endif; ?>
				
			</div>

		</div>
	</div>	