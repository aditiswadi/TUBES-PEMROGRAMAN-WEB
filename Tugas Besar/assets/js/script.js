$('#tombolCari').hide();
$('#keyword').on('keyup', function(){
	$('.loader').show();
	// $('#tempat').load('admin/indexAjaxUser.php?keyword=' +$('#keyword').val());
	$.get('assets/ajax/searchUser.php?keyword=' +$('#keyword').val(), function(data) {
		$('#tempat').html(data);
		$('.loader').hide();
	});
});

$('#urut').hide();

$('#sort').on('click', function() {
	$('#tempat').load('assets/ajax/ajaxUrut.php?sort=' + $('#sort').val())
});

var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombolCari');
var tempat = document.getElementById('tempat');
$('#tombolCari').hide();

keyword.addEventListener('keyup', function() {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			tempat.innerHTML = xhr.responseText;
		}
	}
	xhr.open('GET', '../assets/ajax/searchAdmin.php?keyword=' + keyword.value, true);
	xhr.send();
});

$('#urut').hide();

$('#sort').on('click', function() {
	$('#tempat').load('../assets/ajax/ajaxUrutAdmin.php?sort=' + $('#sort').val())
});
