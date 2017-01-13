$(function() {

	$('#dataTbl').dataTable();
	
	$("#sbaddmov").click(function() {
		$("html,body").animate({scrollTop: $('.ajax-Item-out').offset().top - 30});
		$(".ajax-Item-out").html('<div class="alert alert-info" role="alert"><img src="/img/ajax-loader.gif" /> Пожалуйста подождите, идёт добавление товара в базу.</div>');
	});
	
	$("#ajax-Item-add").ajaxForm({target:".ajax-Item-out"});

});