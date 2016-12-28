{foreach $urunler as $urun}
<div class="musteriBilgi">
	<div class="col-sm-2">
		<img src="{$base_dir}img/musteri/{if $urun.resim}{$urun.id_musteri}{else}kullanici-bos{/if}.jpg" alt="Müşteri Resmi" width="150px" height="150px"/>
	</div>
	<div class="col-sm-5">
	<div class="musteriadres">
		<h4>Müşteri : {$urun.musteri_ad|escape:'html':'UTF-8'}</h4>
		{if $urun.aciklama}
			{$urun.aciklama|escape:'html':'UTF-8'} <br/>
		{/if}
	</div>
		<p>Toplam Aldığı Ürün : <b>{$urunSayisi|escape:'html':'UTF-8'}</b> adet</p>
	</div>
	<div class="col-sm-5 butonkismi">
		<div class="musteriadres">
		{if $urun.adres}
			<a  href="http://maps.google.com/?q={$urun.adres}" onclick="window.open(this.href);return false;"><i class="fa fa-map-marker" aria-hidden="true"></i> {$urun.adres|escape:'html':'UTF-8'}</a> <br/>
		{/if}
		{if $urun.telefon}
			<i class="fa fa-phone" aria-hidden="true"></i> {$urun.telefon|escape:'html':'UTF-8'} <br/>
		{/if}
		{if $urun.eposta}
			<i class="fa fa-envelope-o" aria-hidden="true"></i> {$urun.eposta|escape:'html':'UTF-8'} <br/>
		{/if}
		</div>
		<div class="musteri_button">
			<a href="{$base_dir}duzenle/{$urun.id_urun}" class="btn btn-default">Bu Sayfayı Düzenle</a>
			<a href="{$base_dir}musteri/{$urun.id_musteri}" class="btn btn-default">Müşterinin Tüm Ürünleri</a>
		</div>
	</div>
</div>
	<div class="col-sm-6">
		<div class="panel grub">
			<div><div class="col-sm-6 col-xs-6"><b>Satış Tarihi</b></div><div class="col-sm-6 col-xs-6">: {$urun.satis_tarihi|date_format:"%d.%m.%Y"}</div></div>
		</div>
		<div class="panel grub">
			<div><div class="col-sm-6 col-xs-6"><b>Garanti Bitiş</b></div><div class="col-sm-6 col-xs-6 {VT::garantiVarmi($urun.garanti_bitis)}">: <span>{$urun.garanti_bitis|date_format:"%d.%m.%Y"}</span></div></div>
		</div>
	</div>
	<div class="col-sm-6">
	{foreach $gruplar as $grup}
		<div class="panel grub">
			<div><div class="col-sm-6 col-xs-6">{$grup.urun_adi|escape:'html':'UTF-8'}</div><div class="col-sm-6 col-xs-6 serino">: {$grup.urun_sn|escape:'html':'UTF-8'}</div></div>
		</div>
	{/foreach}
		<div class="panel grub">
		<div>
			<h3 class="panelh3">Açıklama</h3>
			<div class="col-sm-12 col-xs-12">{$urun.urun_aciklama|escape:'html':'UTF-8'}</div>
		</div>
		</div>
	</div>
{/foreach}