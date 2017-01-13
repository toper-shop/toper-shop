$(function() {
	$('#goods a.tabs').click(function() {
		var tab_id=$(this).attr('id');
		tabClick(tab_id)
	});
	function tabClick(tab_id) {
		if (tab_id != $('#goods a.active').attr('id') ) {
			$('#goods .tabs').removeClass('active');
			$('#'+tab_id).addClass('active');
			$('#con_' + tab_id).addClass('active');
		}    
		}
	
	    // Order
    $('.order-view input:radio').bind('change', 'click', function() {
        var height = $('body').height() * 2;
        $('html, body').animate({
            scrollTop: height
        });
        $('input[name="type_curr"]').val($(this).attr('value'));
    });
});

// Ограмная просьба не удалять код ниже :)
$(document).ready(function(){
$('body').after('<!--\nДизайн был разработан студией YTStyle\nАдрес студии: http://ytstyle.ru/\nСайт управляется системой YT Shop Engine v1.3\n-->');
});
