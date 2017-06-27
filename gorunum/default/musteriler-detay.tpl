<div class="kbaslik">{$musteriAdi}</div>
{foreach $musteri as $ms}
	<div class="musteriBilgi">
		<div class="col-sm-2">
			<img src="{$base_dir}img/musteri/{if $ms.resim}{$ms.id_musteri}{else}kullanici-bos{/if}.jpg" alt="Müşteri Resmi" width="150px" height="150px"/>
		</div>
		<div class="col-sm-5">
		<div class="musteriadres">
			<h4>Müşteri : {$ms.musteri_ad|escape:'html':'UTF-8'}</h4>
			{if $ms.aciklama}
				{$ms.aciklama|escape:'html':'UTF-8'} <br/>
			{/if}
		</div>
			<p>Toplam Aldığı Ürün : <b>{$urunSayisi|escape:'html':'UTF-8'}</b> adet</p>
		</div>
		<div class="col-sm-5 butonkismi">
			<div class="musteriadres">
			{if $ms.adres}
				<a  href="http://maps.google.com/?q={$ms.adres}" onclick="window.open(this.href);return false;"><i class="fa fa-map-marker" aria-hidden="true"></i> {$ms.adres|escape:'html':'UTF-8'}</a> <br/>
			{/if}
			{if $ms.telefon}
				<i class="fa fa-phone" aria-hidden="true"></i> {$ms.telefon|escape:'html':'UTF-8'} <br/>
			{/if}
			{if $ms.eposta}
				<i class="fa fa-envelope-o" aria-hidden="true"></i> {$ms.eposta|escape:'html':'UTF-8'} <br/>
			{/if}
			</div>
			<div class="musteri_button">
				<a href="{$base_dir}musteriDuzenle/{$ms.id_musteri}" class="btn yesilButton">Müşteriyi Düzenle</a>
				<a onClick="musteriSil({strtotime($ms.kayit_tarihi)}{$ms.id_musteri})" class="btn btnTuruncu">Müşteriyi Sil</a>
			</div>
		</div>
	</div>
{/foreach}
<div class="clear"></div>
<ul id="urunler" class="urunler">
{foreach $urunler as $urun}
	<li id="urun_{$urun.id_urun}" class="panel {VT::garantiVarmi($urun.garanti_bitis)} urunlerdiv" data-baslik="{$musteriAdi}" data-kategori="musteriurun">
		<div onClick="urunGoster({$urun.id_urun})" data-toggle="modal" data-target="#pencereGoster" class="col-sm-3 col-xs-6 musteri">{$musteriAdi}</div>
		<div onClick="urunGoster({$urun.id_urun})" data-toggle="modal" data-target="#pencereGoster" class="col-sm-7 col-xs-6 urun">
			<b>{$urun.urun_adi}</b> <br/>
			<span>Garanti Bitiş: {$urun.garanti_bitis|date_format:"%d.%m.%Y"}</span>
		</div>
		<div class="col-sm-2 col-xs-12 silDuzenle">
			<a  onClick="urunuSil({strtotime($urun.satis_tarihi)}{$urun.id_urun|escape:'html':'UTF-8'})"class="kirmiziButton" title="Sil"><i class="fa fa-trash-o" aria-hidden="true"></i></a> 
			<a href="{LinkYapisi::sayfaDuzenle($urun.id_urun)}" class="maviButton" title="Düzenle"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
		</div>
	</li>
{/foreach}
</ul>
<div id="yukleniyor"><img src="{$base_dir}img/yukleniyor.gif" alt="Yükleniyor" /></div>
