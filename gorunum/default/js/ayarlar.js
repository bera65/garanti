function kategoriDuzenle(e) {
	var isim = $("#duzenle"+e+"").data('name');
	$("#yenikayit").slideToggle("slow");
	$("#urunler").slideToggle("slow");
	$("#yenikayitButton").html($('#yenikayitButton').text() == 'Yeni Kayıt Ekle' ? '<i class="fa fa-times" aria-hidden="true"></i> İptal' : 'Yeni Kayıt Ekle');
	$("input[name='numara']").val(e);
	$("input[name='kategoriad']").val(isim);
}
function kategoriSil(e)
{
	$.ajax({
		url: "",
		type: "post",
		data: "sil=" + e,
		success:function(data) {
			$('#ksonuc').html(data);
		}
	  });
}
function kullaniciSil(e)
{
	$.ajax({
		url: "",
		type: "post",
		data: "kulaniciSil=" + e,
		success:function(data) {
			$(document).ready(function() { $.ambiance({ message: "Kullanıcı Silindi",  title: "Başarılı!", type: "success", timeout: 3 }); });
			window.setTimeout(function(){ window.location.href = window.location.href; }, 3000);
		}
	  });
}