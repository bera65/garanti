var ekranboyutu = $(window).width();
if (ekranboyutu > 767)
{
	function resize()
	{
		var offsetHeight = document.getElementById('sag').offsetHeight;
		document.getElementById("sol").style.height = offsetHeight + "px";
	}
	resize();
	window.onresize = function() {
		resize();
	};
}
(function($) {
$.fn.menumaker = function(options) {  
 var cssmenu = $(this), settings = $.extend({
   format: "dropdown",
   sticky: false
 }, options);
 return this.each(function() {
   $(this).find(".button").on('click', function(){
     $(this).toggleClass('menu-opened');
     var mainmenu = $(this).next('ul');
     if (mainmenu.hasClass('open')) { 
       mainmenu.slideToggle().removeClass('open');
     }
     else {
       mainmenu.slideToggle().addClass('open');
       if (settings.format === "dropdown") {
         mainmenu.find('ul').show();
       }
     }
   });
   cssmenu.find('li ul').parent().addClass('has-sub');
multiTg = function() {
     cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
     cssmenu.find('.submenu-button').on('click', function() {
       $(this).toggleClass('submenu-opened');
       if ($(this).siblings('ul').hasClass('open')) {
         $(this).siblings('ul').removeClass('open').slideToggle();
       }
       else {
         $(this).siblings('ul').addClass('open').slideToggle();
       }
     });
   };
   if (settings.format === 'multitoggle') multiTg();
   else cssmenu.addClass('dropdown');
   if (settings.sticky === true) cssmenu.css('position', 'fixed');
resizeFix = function() {
  var mediasize = 700;
     if ($( window ).width() > mediasize) {
       cssmenu.find('ul').show();
     }
     if ($(window).width() <= mediasize) {
       cssmenu.find('ul').hide().removeClass('open');
     }
   };
   resizeFix();
   return $(window).on('resize', resizeFix);
 });
  };
})(jQuery);

(function($){
$(document).ready(function(){
$("#cssmenu").menumaker({
   format: "multitoggle"
});
});
})(jQuery);
var dizin = "/garanti/";
function urunGoster(numara) {
	var baslik = $('li#urun_' + numara + '').data('baslik');
	$.ajax({
		url: dizin +"sayfa.php",
		type: "post",
		data: "sayfabos=" + numara,
		success:function(data) {
			$('#pencereGoster h4').html(baslik);
			$('#pencereGoster .modal-body').html(data);
		}
	  });
	
}
function yeniKayit () {
	$("#yenikayit").slideToggle("slow");
	$("#urunler").slideToggle("slow");
	$("#yenikayitButton").html($('#yenikayitButton').text() == 'Yeni Kayıt Ekle' ? '<i class="fa fa-times" aria-hidden="true"></i> İptal' : 'Yeni Kayıt Ekle');
}
function saybakalim () {
	var count = $("#urunEklemeDivi").children().length;
	if (count > 1)
	{
		$(".cikarma").show();
		$('#urunEklemeDivi').children().last().attr("id","cogalt"+ count +"");
		$('#urunEklemeDivi .inputalani').last().find('input').attr("id","urun"+ count +"");
		$('#urunEklemeDivi .inputalani').last().find('div').attr("class","urun"+ count +"");
	}
	else
	{
		$(".cikarma").hide();
	}
}
function baskaUrunEkle () {
	var itm = document.getElementById("cogalt1");
    var cln = itm.cloneNode(true);
	$('#urunEklemeDivi').children().last().after(cln);
	saybakalim();
	resize();
}
function baskaUrunCikar () {
	$('#urunEklemeDivi').children().last().remove();
	saybakalim();
	resize();
}

function musterigetir() {
	var musteriisim =  $('input[name=musteriad]').val();
	if (musteriisim.length >= 3) {
		$.ajax({
			url: 'ara.php',
			type: 'POST',
			data: { musteriisim:musteriisim },
			success:function(data){
				$('#sonuc').show();
				$('#sonuc').html(data);
			}
		});
	} else {
		$('#sonuc').hide();
	}
}
function urungetir(urun, id) {
	if (urun.length >= 3) {
		$.ajax({
			url: 'ara.php',
			type: 'POST',
			data: {"urun": urun, "inputid": id},
			success:function(data){
				$('div.'+ id +'').show();
				$('div.'+ id +'').html(data);
			}
		});
	} else {
		$('div.'+ id +'').hide();
	}
}
function yapistir(item) {
	$('input[name=musteriad]').val(item);
	$('#sonuc').hide();
}
function uyapistir(item, id) {
	$('input#'+ id +'').val(item);
	$('div.'+ id +'').hide();
}
function urunuSil(numara) {
	$('#uyari').fadeIn();
	$('#urunsil').val(numara);
}
function pencerekapat() {
	$('#uyari').fadeOut();
}
function menuGoster () {
	$("#sol").slideToggle("slow");
}