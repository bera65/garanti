{if $kelime == 'bos'}
	<div class="kbaslik">Uygun sonuç bulunamadı</div>
	<script type="text/javascript">
		$(document).ready(function() { 
			$.ambiance({
			message: "{$hata}", 
            title: "Üzgünüz!",
            type: "default",
			timeout: 3
			});
		});
	</script>
{else}
	<div class="kbaslik">Kelime : {$kelime|escape:'html':'UTF-8'}</div>
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
{/if}