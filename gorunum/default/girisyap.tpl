<div class="giris_alani">
	<div class="girisResim col-sm-4"><img src="{$base_dir}img/musteri/kullanici-bos.jpg" alt="Kullanici Resmi" width="150px" height="150px"/></div>
	<div class="girisForm col-sm-8">
		<form action="{$base_dir}girisyap/" method="post" class="uyeform" id="girisForm">
			<div><h4>Üye Girişi</h4></div>
			{if $hata == 1}
				<div class="alert alert-danger" role="alert">Kullanici Bulunamadı</div>
			{/if}
			{if $hata == 2}
				<div class="alert alert-danger" role="alert">Yeni şifre için 1 dk geçmesi gerekir</div>
			{/if}
			{if $hata == 4}
				<div class="alert alert-success" role="alert">Mail Gönderildi</div>
			{/if}
			{if $hata == 5}
				<div class="alert alert-danger" role="alert">Mail Gönderilemedi Lütfen Gerekli Ayarları Kontrol Edin</div>
			{/if}
			<div class="input-group margin-bottom-sm">
			  <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
			  <input class="form-control" type="text" name="kullanici" placeholder="Kullanici Adı" autocomplete="off" autofocus>
			</div>
			<div class="input-group">
			  <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
			  <input class="form-control" type="password" name="sifre" placeholder="Şifre" autocomplete="off">
			</div>
			<div class="soldaKal">
			  <label>
				<input type="checkbox" value="">
				Beni Hatırla
			  </label>
			  <div>
				<div>
					<input class="form-control" type="hidden" name="token" value="{$girisToken}">
				</div>
			  </div>
			</div>
			<button type="submit" class="btn yesilButton">Giriş Yap</button>
		</form>
		<form action="{$base_dir}girisyap/" method="post" class="uyeform" id="sifreform">
			<div><h4>Şifre Hatırlat</h4></div>
			<div class="input-group margin-bottom-sm">
			  <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
			  <input class="form-control" type="text" name="eposta" placeholder="Kayıtlı Epostanız" autocomplete="off" autofocus>
			</div>
			<div class="soldaKal">
			  <div>
				<div>
					<input class="form-control" type="hidden" name="token" value="{$girisToken}">
				</div>
			  </div>
			</div>
			<button type="submit" class="btn btnTuruncu">Şifremi Gönder</button>
		</form>
		<p class="clear yaziOrtala" id="sifreHatirlatP"><br/> <a class="pointer" onClick="sifreHatirlat()">Şifremi Unuttum ve Giriş Yapamıyorum</a></p>
		<p class="clear"><br/></p>
	</div>
</div>