<div class="kbaslik">Site Genel Ayarları</div>
<form action="{$base_dir}ayarlar/siteayarlari" method="post" class="uyeform" id="girisForm">
	{foreach $ayarlariGetir as $ayar}
		<div class="form-group col-sm-6">
			<label>{$ayar.veri}</label>
			<input type="text" class="form-control" name="{$ayar.veri}" placeholder="Kullanıcı Adı" value="{$ayar.deger}">
		</div>
	{/foreach}
	<input class="form-control" type="hidden" name="token" value="{$girisToken}">
	<button type="submit" class="btn yesilButton" name="ayarlariGuncelle" value="1">Güncelle</button>
</form>