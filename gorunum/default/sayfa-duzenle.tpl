<div class="kbaslik">Düzenle</div>
<form action="{$base_dir}sayfa.php" method="post">
	{foreach $urunler as $urun}
		<div class="col-sm-6">
			<div class="panel grub">
				<div><div class="col-sm-5 col-xs-12"><b>Müşteri</b></div><div class="col-sm-7 col-xs-12"><input type="text" name="musteri" value="{$urun.musteri_ad|escape:'html':'UTF-8'}"/></div></div>
			</div>
			<div class="panel grub">
				<div><div class="col-sm-5 col-xs-12"><b>Satış Tarihi</b></div><div class="col-sm-7 col-xs-12"><input type="text" name="satistahiri" value="{$urun.satis_tarihi|date_format:'%d.%m.%Y'}"/></div></div>
			</div>
			<div class="panel grub">
				<div><div class="col-sm-5 col-xs-12"><b>Garanti Bitiş</b></div><div class="col-sm-7 col-xs-12">
				<select name="garantisuresi" id="garantisuresi" class="form-control">
					<option value="6"> 6 Ay</option>
					<option value="12"> 1 Yıl</option>
					<option value="24" selected> 2 Yıl</option>
					<option value="36"> 3 Yıl</option>
					<option value="48"> 4 Yıl</option>
				</select>
				</div></div>
			</div>
		</div>
		<div class="col-sm-6">
		{foreach $gruplar as $grup}
			<div class="panel grub">
				<div><div class="col-sm-7 col-xs-12"><input type="text" name="urun[]" value="{$grup.urun_adi|escape:'html':'UTF-8'}"/></div><div class="col-sm-5 col-xs-12 serino"><input type="text" name="serino[]" value="{$grup.urun_sn|escape:'html':'UTF-8'}"/></div></div>
				<a onClick="urunuDetaySil({strtotime($grup.duzenlenme_tarihi)}{$grup.id_urun_detay|escape:'html':'UTF-8'})" class="kapat"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
			</div>
			<input type="hidden" name="detay[]" value="{$grup.id_urun_detay|escape:'html':'UTF-8'}"/>
		{/foreach}
			<div class="panel grub">
			<div>
				<h3 class="panelh3">Açıklama</h3>
				<div class="col-sm-12 col-xs-12"><textarea name="aciklama">{$urun.urun_aciklama|escape:'html':'UTF-8'}</textarea></div>
			</div>
			</div>
		</div>
	{/foreach}
	<div><input type="hidden" name="urunno" value="{$duzenle|escape:'html':'UTF-8'}"/><input type="hidden" name="kategori" value="{$urun.id_kategori|escape:'html':'UTF-8'}"/></div>
	<button class="btn btnTuruncu" name="urunduzenle" value="1">KAYDET</button>
</form>