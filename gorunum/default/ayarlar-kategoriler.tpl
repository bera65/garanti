<div class="kbaslik">Kategoriler</div>
<div class="buttonlar">
	<span id="yenikayitButton" class="ekle btn yesilButton" onClick="yeniKayit()">Yeni Kayıt Ekle</span>
</div>
<div id="yenikayit">
	<form method="post" action="">
		  <div class="form-group col-sm-6">
			<label>Kategori Adı</label>
			<input type="text" name="kategoriad" class="form-control"  placeholder="Kategori Adı" autocomplete="off">
		  </div>
		<div class="clear col-sm-6">
		  <input type="hidden" name="numara" value="">
		  <input type="hidden" name="token" value="{$girisToken}">
		  <button type="submit" class="btn btnTuruncu" name="kategoriekle">Kaydet</button>
		</div>
	</form>
</div>
<ul id="urunler" class="urunler">
{foreach $kategorilerGetir as $kategori}
	<li class="panel">
		<div class="col-sm-10 col-xs-6 musteri">{$kategori.kategori_adi|escape:'html':'UTF-8'}</div>
		<div class="col-sm-2 col-xs-6 silDuzenle">
			<a  onClick="kategoriSil({strtotime($kategori.eklenme_tarihi)}{$kategori.id_kategori|escape:'html':'UTF-8'})"class="kirmiziButton" title="Sil"><i class="fa fa-trash-o" aria-hidden="true"></i></a> 
			<a onClick="kategoriDuzenle({strtotime($kategori.eklenme_tarihi)}{$kategori.id_kategori|escape:'html':'UTF-8'})" id="duzenle{strtotime($kategori.eklenme_tarihi)}{$kategori.id_kategori|escape:'html':'UTF-8'}" class="maviButton" title="Düzenle" data-name="{$kategori.kategori_adi|escape:'html':'UTF-8'}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
		</div>
	</li>
{/foreach}
</ul>
<div id="ksonuc"></div>