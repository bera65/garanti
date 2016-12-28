{if $baslik}<div class="kbaslik">Müşteriler</div>{/if}
<div class="buttonlar">
	<span id="yenikayitButton" class="ekle btn yesilButton" onClick="yeniKayit()">Yeni Kayıt Ekle</span>
</div>
<div id="yenikayit">
	<form method="post" enctype="multipart/form-data" action="{$base_dir}musteriler/">
		<div class="col-sm-6">
			  <div class="form-group">
				<label>Müşteri Adı</label>
				<input type="text" name="musteriad" class="form-control"  placeholder="Müşteri Adı" autocomplete="off">
				<div id="sonuc"></div>
			  </div>
			  <div class="form-group">
				<label>Adres</label>
				<textarea name="adres" class="form-control" id="adres" cols="30" rows="3"></textarea>
			  </div>
			  <div class="form-group">
				<label>Telefon</label>
				<input type="text" class="form-control" name="telefon" placeholder="ör: 0123 456 78 90" autocomplete="off">
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label>Eposta</label>
				<input type="text" class="form-control" name="eposta" placeholder="ör: musteriadi@site.com" autocomplete="off">
			</div>
			<div class="form-group">
				<label>Müşteri Resmi 200 X 200</label>
				<input type="file" class="filestyle" name="resim" data-icon="false" data-buttonText="Resim Seçin">
			</div>
			<div class="form-group">
			<br/>
				<label>Açıklama</label>
				<textarea name="aciklama" class="form-control" id="aciklama" cols="30" rows="3"></textarea>
			</div>
		</div>
		<div class="col-sm-6 col-sm-offset-6">
		  <button type="submit" name="musteriekle" value="1" class="btn btnTuruncu sagaYasla">Kaydet</button>
		</div>
	</form>
</div>
<ul id="urunler" class="urunler">
{foreach $musteriler as $musteri}
	<li id="urun_{$musteri.id_musteri}" class="panel urunlerdiv" data-kategori="musteri">
		<div class="col-sm-5 col-xs-6 musteri"><a href="{$base_dir}musteri/{$musteri.id_musteri}">{$musteri.musteri_ad|escape:'html':'UTF-8'}</a></div>
		<div class="col-sm-5 col-xs-6 musteri"><a href="{$base_dir}musteri/{$musteri.id_musteri}">{kacurunuvar($musteri.id_musteri)}</a></div>
		<div class="col-sm-2 col-xs-12 silDuzenle">
			<a  onClick="musteriSil({strtotime($musteri.kayit_tarihi)}{$musteri.id_musteri|escape:'html':'UTF-8'})"class="kirmiziButton" title="Sil"><i class="fa fa-trash-o" aria-hidden="true"></i></a> 
			<a href="{$base_dir}musteriDuzenle/{$musteri.id_musteri}" class="maviButton" title="Düzenle"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
		</div>
	</li>
{/foreach}
</ul>
{if $baslik}<div id="yukleniyor"><img src="{$base_dir}img/yukleniyor.gif" alt="Yükleniyor" /></div>{/if}