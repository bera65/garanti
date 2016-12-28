<?php
/* Smarty version 3.1.30, created on 2016-12-27 16:57:04
  from "C:\wamp64\www\garanti\gorunum\default\musteriler.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5862814034add5_41400071',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c9dc49e94a86140b511194770cee747038bc0320' => 
    array (
      0 => 'C:\\wamp64\\www\\garanti\\gorunum\\default\\musteriler.tpl',
      1 => 1482658414,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5862814034add5_41400071 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['baslik']->value) {?><div class="kbaslik">Müşteriler</div><?php }?>
<div class="buttonlar">
	<span id="yenikayitButton" class="ekle btn yesilButton" onClick="yeniKayit()">Yeni Kayıt Ekle</span>
</div>
<div id="yenikayit">
	<form method="post" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
musteriler/">
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
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['musteriler']->value, 'musteri');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['musteri']->value) {
?>
	<li id="urun_<?php echo $_smarty_tpl->tpl_vars['musteri']->value['id_musteri'];?>
" class="panel urunlerdiv" data-kategori="musteri">
		<div class="col-sm-5 col-xs-6 musteri"><a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
musteri/<?php echo $_smarty_tpl->tpl_vars['musteri']->value['id_musteri'];?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['musteri']->value['musteri_ad'], ENT_QUOTES, 'UTF-8', true);?>
</a></div>
		<div class="col-sm-5 col-xs-6 musteri"><a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
musteri/<?php echo $_smarty_tpl->tpl_vars['musteri']->value['id_musteri'];?>
"><?php echo kacurunuvar($_smarty_tpl->tpl_vars['musteri']->value['id_musteri']);?>
</a></div>
		<div class="col-sm-2 col-xs-12 silDuzenle">
			<a  onClick="musteriSil(<?php echo strtotime($_smarty_tpl->tpl_vars['musteri']->value['kayit_tarihi']);
echo htmlspecialchars($_smarty_tpl->tpl_vars['musteri']->value['id_musteri'], ENT_QUOTES, 'UTF-8', true);?>
)"class="kirmiziButton" title="Sil"><i class="fa fa-trash-o" aria-hidden="true"></i></a> 
			<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
musteriDuzenle/<?php echo $_smarty_tpl->tpl_vars['musteri']->value['id_musteri'];?>
" class="maviButton" title="Düzenle"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
		</div>
	</li>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</ul>
<?php if ($_smarty_tpl->tpl_vars['baslik']->value) {?><div id="yukleniyor"><img src="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
img/yukleniyor.gif" alt="Yükleniyor" /></div><?php }
}
}
