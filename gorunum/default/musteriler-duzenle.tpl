<div class="kbaslik">{$musteriAdi} Düzenle</div>
	{foreach $musteriBilgi as $musteri}
		<form method="post" enctype="multipart/form-data" action="{$base_dir}musteriler/">
			<div class="col-sm-6">
				  <div class="form-group">
					<label>Müşteri Adı</label>
					<input type="text" name="musteriad" class="form-control"  placeholder="Müşteri Adı" autocomplete="off" value="{$musteri.musteri_ad}">
					<div id="sonuc"></div>
				  </div>
				  <div class="form-group">
					<label>Adres</label>
					<textarea name="adres" class="form-control" id="adres" cols="30" rows="3">{$musteri.adres}</textarea>
				  </div>
				  <div class="form-group">
					<label>Telefon</label>
					<input type="text" class="form-control" name="telefon" placeholder="ör: 0123 456 78 90" autocomplete="off"  value="{$musteri.telefon}">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Eposta</label>
					<input type="text" class="form-control" name="eposta" placeholder="ör: musteriadi@site.com" autocomplete="off"  value="{$musteri.eposta}">
				</div>
				<div class="form-group">
					<label>Müşteri Resmi 200 X 200</label>
					<input type="file" class="filestyle" name="resim" data-icon="false" data-buttonText="Resim Seçin">
				</div>
				<div class="form-group"><img src="{$base_dir}img/musteri/{$musteri.id_musteri}.jpg" alt="{$musteri.musteri_ad}" width="100" height="100"/></div>
				<div class="form-group">
				<br/>
					<label>Açıklama</label>
					<textarea name="aciklama" class="form-control" id="aciklama" cols="30" rows="3">{$musteri.aciklama}</textarea>
				</div>
				<div><div></div></div>
				<div></div>
				<div><div><div><input type="hidden" name="musterino" autocomplete="off" value="{$musteri.id_musteri}"></div></div></div>
			</div>
			<div class="col-sm-6 col-sm-offset-6">
			  <button type="submit" name="musteriekle" value="1" class="btn btnTuruncu sagaYasla">Kaydet</button>
			</div>
		</form>
	{/foreach}