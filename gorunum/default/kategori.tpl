<div class="kbaslik">{$kategoriAdi|escape:'html':'UTF-8'}</div>
{if $hata}
	<script type="text/javascript">
		$(document).ready(function() { 
			$.ambiance({
			message: "{$hata}", 
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
{else if $basarili}
	<script type="text/javascript">
		$(document).ready(function() { 
			$.ambiance({
			message: "Kayıt başarı ile eklendi", 
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
{/if}

<div class="buttonlar">
	<span id="yenikayitButton" class="ekle btn yesilButton" onClick="yeniKayit()">Yeni Kayıt Ekle</span>
</div>
<div id="yenikayit">
	<form method="post" action="">
		<div class="col-sm-6">
			  <div class="form-group">
				<label>Müşteri Adı</label>
				<input type="text" name="musteriad" class="form-control"  placeholder="Müşteri Adı" autocomplete="off" onkeyup="musterigetir()">
				<div id="sonuc"></div>
			  </div>
			  <div class="form-group">
				<label>Satış Tarihi</label>
				<input type="text" class="form-control" name="satistarihi" placeholder="Satış Tarihi" value="{$smarty.now|date_format:'%d.%m.%Y'}" autocomplete="off">
			  </div>
			  <div class="form-group">
				<label>Garanti Süresi</label>
				<select name="garantisuresi" id="garantisuresi" class="form-control">
					<option value="6"> 6 Ay</option>
					<option value="12"> 1 Yıl</option>
					<option value="24" selected> 2 Yıl</option>
					<option value="36"> 3 Yıl</option>
					<option value="48"> 4 Yıl</option>
				</select>
			  </div>
		</div>
		<div class="col-sm-6">
			<div id="urunEklemeDivi">
				<div id="cogalt1">
					  <div class="form-group inputalani">
						<label>Ürün Adı</label>
						<input type="text" id="urun1" class="form-control" name="urun[]" placeholder="ör: Lenovo I5 Bilgisayar" autocomplete="off" onkeyup="urungetir(this.value, this.id)">
						<div id="usonuc" class="urun1"></div>
					  </div>
					  <div class="form-group">
						<label>Ürün Seri No</label>
						<input type="text" class="form-control" name="serino[]" placeholder="Seri No" autocomplete="off">
					  </div>
				</div>
			</div>
			<div class="ekleme">
				<a class="ekleme btn btn-default" onClick="baskaUrunEkle()"><i class="fa fa-plus" aria-hidden="true"></i> Başka Ürünler Ekle</a>
				<a class="cikarma btn btn-default" onClick="baskaUrunCikar()"><i class="fa fa-minus" aria-hidden="true"></i> Son Ürünü Çıkar</a>
			</div>
			<div class="form-group">
			<br/>
				<label>Açıklama</label>
				<textarea name="aciklama" class="form-control" id="aciklama" cols="30" rows="3"></textarea>
			</div>
		</div>
		<div class="col-sm-6 col-sm-offset-6">
		  <button type="submit" class="btn btnTuruncu sagaYasla">Kaydet</button>
		</div>
	</form>
</div>
<ul id="urunler" class="urunler">
{foreach $urunler as $urun}
	<li id="urun_{$urun.id_urun}" class="panel {VT::garantiVarmi($urun.garanti_bitis)}" data-baslik="{$urun.musteri_ad|escape:'html':'UTF-8'}">
		<div onClick="urunGoster({$urun.id_urun})" data-toggle="modal" data-target="#pencereGoster" class="col-sm-3 col-xs-6 musteri">{$urun.musteri_ad|escape:'html':'UTF-8'}</div>
		<div onClick="urunGoster({$urun.id_urun})" data-toggle="modal" data-target="#pencereGoster" class="col-sm-7 col-xs-6 urun">
			<b>{$urun.urun_adi}</b> <br/>
			<span>Garanti Bitiş: {$urun.garanti_bitis|date_format:"%d.%m.%Y"}</span>
		</div>
		<div class="col-sm-2 col-xs-12 silDuzenle">
			<a  onClick="urunuSil({strtotime($urun.satis_tarihi)}{$urun.id_urun|escape:'html':'UTF-8'})"class="kirmiziButton" title="Sil"><i class="fa fa-trash-o" aria-hidden="true"></i></a> 
			<a href="{$base_dir}duzenle/{$urun.id_urun}" class="maviButton" title="Düzenle"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
		</div>
	</li>
{/foreach}
</ul>