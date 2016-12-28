localStorage['dataRequested']=0;
function loadData(){
 var sonId = $(".urunlerdiv:last").attr("id");
 var kategori = $(".urunlerdiv").data('kategori');
 $('#yukleniyor').show();
 resize();
 var params={};
 params["sonid"] = sonId;
 params["kategori"] = kategori;
 if(localStorage['dataRequested'] == 0){
  localStorage['dataRequested'] = 1;
  $.post(dizin +"musteriler.php", params, function(data){
   if(data!="bos"){
		$('#urunler').append(data);
   }
	$('#yukleniyor').hide();
	resize();
	localStorage['dataRequested']=0;
  });
 }
}
 $(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() == $(document).height() && $(".urunlerdiv").length!=0){
   loadData();
  }
});
function musteriSil(numara) {
	var form = document.getElementById('uyariform');
	$('#uyari').fadeIn();
	$('#uyari .baslik').html('Müşteri Sil !');
	$('#uyari .icerik').html('Bu müşteriye ait tüm ürünler silinecek');
	$('#urunsil').val(numara);
	form.action = dizin +'musteriler.php' ;
}