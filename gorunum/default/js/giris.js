function sifreHatirlat() {
	$('#girisForm').slideToggle();
	$('#sifreform').slideToggle();
	$('#sifreHatirlatP > a').html($('#sifreHatirlatP > a').text() == 'Giriş Sayfasına Dön' ? 'Şifremi Unuttum ve Giriş Yapamıyorum' : 'Giriş Sayfasına Dön');
}