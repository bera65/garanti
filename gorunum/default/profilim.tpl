<div class="kbaslik">Profilimi Düzenle</div>
{if $sonuc == 2}
<script type="text/javascript">
		$(document).ready(function() { 
			$.ambiance({
			message: "Şifre başarı ile değiştirildi", 
            title: "Başarılı!",
            type: "success",
			timeout: 5.71
			});
		});
	</script>
<script type="text/javascript">
window.setTimeout(function(){
        window.location.href = window.location.href;
 }, 5710);
</script>
{else if $sonuc == 3}
<script type="text/javascript">
	$(document).ready(function() { 
		$.ambiance({
		message: "Eski şifreniz hatalı", 
		title: "Hata!",
		type: "error",
		timeout: 7
		});
	});
</script>
<script type="text/javascript">
	window.setTimeout(function(){
			window.location.href = window.location.href;
	 }, 7000);
</script>
{else if $sonuc == 4}
<script type="text/javascript">
	$(document).ready(function() { 
		$.ambiance({
		message: "Şifreler Uyuşmuyor", 
		title: "Hata!",
		type: "error",
		timeout: 7
		});
	});
</script>
<script type="text/javascript">
	window.setTimeout(function(){
			window.location.href = window.location.href;
	 }, 7000);
</script>
{/if}
<form action="{$base_dir}profilim/" method="post" class="uyeform col-sm-6" enctype="multipart/form-data">
	<div><h4>Profili Düzenle</h4></div>
	<div class="form-group">
		<label>Kullanıcı Adı</label>
		<input type="text" class="form-control" name="kullaniciadiDuzenle" placeholder="Kullanıcı Adı" value="{$kullaniciBilgi}">
	</div>
	<div class="form-group">
		<label>Epostanız</label>
		<input type="text" class="form-control" name="epostaDuzenle" placeholder="Epostanız" value="{$kullaniciEposta}">
	</div>
	<div class="form-group">
		<label>Profil Resmi 200 x 200</label>
		<input type="file" name="resim">
	</div>
	<div class="soldaKal">
	  <div>
		<div>
			<input class="form-control" type="hidden" name="tokenDuzenle" value="{$girisToken}">
			<input class="form-control" type="hidden" name="eskikullanici" value="{$kullaniciBilgi}">
		</div>
	  </div>
	</div>
	<button type="submit" class="btn yesilButton">Güncelle</button>
</form>
<form action="{$base_dir}profilim/" method="post" class="uyeform col-sm-6">
	<div><h4>Yeni Şifre Oluştur</h4></div>
	<div class="form-group">
		<label>Eski şifreniz</label>
		<input type="password" class="form-control" name="eskisifre" placeholder="Şuan kullandığınız şifre">
	</div>
	<div class="form-group">
		<label>Yeni Şifreniz</label>
		<input type="password" class="form-control" name="yenisifre" placeholder="Yeni şifreniz">
	</div>
	<div class="form-group">
		<label>Yeni Şifreniz Tekrar</label>
		<input type="password" class="form-control" name="yenisifretekrar" placeholder="Yeni şifreniz tekrar">
	</div>
	<div class="soldaKal">
	  <div>
		<div>
			<input class="form-control" type="hidden" name="token" value="{$girisToken}">
			<input class="form-control" type="hidden" name="kullanici" value="{$kullaniciBilgi}">
		</div>
	  </div>
	</div>
	<button type="submit" class="btn btnTuruncu">Yeni Şifre Oluştur</button>
</form>
<p class="clear onbosluk"></p>