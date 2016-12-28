<div class="kbaslik">Kullanıcılar</div>
<div class="buttonlar">
	<span id="yenikayitButton" class="ekle btn yesilButton" onClick="yeniKayit()">Yeni Kayıt Ekle</span>
</div>
<div id="yenikayit">
<form action="{$base_dir}ayarlar/kullanicilar" id="yeniKullanici" enctype="multipart/form-data" method="post" class="uyeform col-sm-12">
	<div class="form-group col-sm-6">
		<label>Kullanıcı Adı</label>
		<input type="text" class="form-control" name="kullaniciadi" placeholder="Kullanıcı Adı">
	</div>
	<div class="form-group col-sm-6">
		<label>Epostanız</label>
		<input type="text" class="form-control" name="eposta" placeholder="Epostanız">
	</div>
	<div class="form-group col-sm-6">
		<label>Profil Resmi 200 x 200</label>
		<input type="file" name="resim">
	</div>
	<div class="form-group col-sm-6">
		<label>Şifre</label>
		<input type="password" class="form-control" name="sifre">
	</div>
	<div class="form-group col-sm-6">
		<label>Admin</label>
		<select name="admin" class="form-control">
			<option value="0">Hayır</option>
			<option value="1">Evet</option>
		</select>
	</div>
	<div class="soldaKal">
	  <div>
		<div>
			<input class="form-control" type="hidden" name="token" value="{$girisToken}">
		</div>
	  </div>
	</div>
	<div class="clear">
		<button type="submit" class="btn yesilButton">Yeni Kullanıcı Ekle</button>
	</div>
</form>
</div>
<ul id="urunler" class="urunler">
{foreach $kullanicilarGetir as $kullanici}
	<li class="panel">
		<div class="col-sm-10 col-xs-6 musteri">{$kullanici.kullanici_adi|escape:'html':'UTF-8'} ({if $kullanici.admin == 1}Admin{else}Normal Kullanıcı{/if})</div>
		<div class="col-sm-2 col-xs-6 silDuzenle">
		{if $kullaniciID != $kullanici.id_kullanici}
			<a  onClick="kullaniciSil({strtotime($kullanici.kayit_tarihi)}{$kullanici.id_kullanici|escape:'html':'UTF-8'})"class="kirmiziButton" title="Sil">Sil</a> 
		{/if}
		</div>
	</li>
{/foreach}
</ul>
<div id="ksonuc">{$ekle}</div>