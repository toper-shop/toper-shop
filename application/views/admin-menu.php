<?php
$ci = & get_instance();
?>

<script>
$(document).ready(function() {
    $("#update").click(function() {
        $('#update').html('<a href="#"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Обновление...</a>');
        $.post("/admin/price_update",
         {
          '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
        }, function(data) {
            console.log("Успешно обновлено");
            $('#update').html('<a href="#"><span class="glyphicon glyphicon-ok"></span> Цены обновлены</a>');
        })
    })
})
</script>

<style>
.glyphicon-refresh-animate{-animation:spin .7s infinite linear;-ms-animation:spin .7s infinite linear;-webkit-animation:spinw .7s infinite linear;-moz-animation:spinm .7s infinite linear}@keyframes spin{from{transform:scale(1) rotate(0deg)}to{transform:scale(1) rotate(360deg)}}@-webkit-keyframes spinw{from{-webkit-transform:rotate(0deg)}to{-webkit-transform:rotate(360deg)}}@-moz-keyframes spinm{from{-moz-transform:rotate(0deg)}to{-moz-transform:rotate(360deg)}}
</style>

<nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <div class="navbar-brand" title="YT Shop Engine v<?=YTSE_VERSION?>">YTStyle</div>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
          <ul class="nav navbar-nav">
          <li<?php if($ci->router->fetch_method() == 'index') print ' class="active"'; ?>><a href="/admin"><span class="glyphicon glyphicon-list-alt"></span> Товары</a></li>
          <li<?php if($ci->router->fetch_method() == 'additem') print ' class="active"'; ?>><a href="/admin/additem"><span class="glyphicon glyphicon-plus-sign"></span> Добавить товар</a></li>
    			<li<?php if($ci->router->fetch_method() == 'settings') print ' class="active"'; ?>><a href="/admin/settings"><span class="glyphicon glyphicon-wrench"></span> Настройки</a></li>
    			<li<?php if($ci->router->fetch_method() == 'genres') print ' class="active"'; ?>><a href="/admin/genres"><span class="glyphicon glyphicon-align-left"></span> Жанры</a></li>
    			<li id="update"><a href="javascript:void(0)"><span class="glyphicon glyphicon-refresh"></span> Обновить цены</a></li>
    			<li><a href="<?php echo base_url(); ?>" target="_blank"><span class="glyphicon glyphicon-share-alt"></span> Перейти на сайт</a></li>
    			<li><a href="/admin/logout"><span class="glyphicon glyphicon-log-out"></span> Выйти</a></li>
          </ul>
        </div>
      </div>
    </nav>