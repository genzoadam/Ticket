$(document).ready(function(){
	$(document.body).on('submit', '.js-confirm', function(){
		var $el = $(this)
		var text = $el.data('confirm') ? $el.data('confirm') : 'Yakin ingin menghapus ?'
		var c = confirm(text);
		return c;
	});
		//tambahkan selectize untuk memilih element
	$('.js-selectize').selectize({
		sortField: 'text'
	});
});