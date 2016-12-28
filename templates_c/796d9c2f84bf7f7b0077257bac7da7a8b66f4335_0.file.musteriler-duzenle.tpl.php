<?php
/* Smarty version 3.1.30, created on 2016-12-27 20:31:25
  from "C:\wamp64\www\garanti\gorunum\default\musteriler-duzenle.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5862b37d9b2c52_29454819',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '796d9c2f84bf7f7b0077257bac7da7a8b66f4335' => 
    array (
      0 => 'C:\\wamp64\\www\\garanti\\gorunum\\default\\musteriler-duzenle.tpl',
      1 => 1482743390,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5862b37d9b2c52_29454819 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="kbaslik"><?php echo $_smarty_tpl->tpl_vars['musteriAdi']->value;?>
 Düzenle</div>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['musteriBilgi']->value, 'musteri');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['musteri']->value) {
?>
		<form method="post" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
musteriler/">
			<div class="col-sm-6">
				  <div class="form-group">
					<label>Müşteri Adı</label>
					<input type="text" name="musteriad" class="form-control"  placeholder="Müşteri Adı" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['musteri']->value['musteri_ad'];?>
">
					<div id="sonuc"></div>
				  </div>
				  <div class="form-group">
					<label>Adres</label>
					<textarea name="adres" class="form-control" id="adres" cols="30" rows="3"><?php echo $_smarty_tpl->tpl_vars['musteri']->value['adres'];?>
</textarea>
				  </div>
				  <div class="form-group">
					<label>Telefon</label>
					<input type="text" class="form-control" name="telefon" placeholder="ör: 0123 456 78 90" autocomplete="off"  value="<?php echo $_smarty_tpl->tpl_vars['musteri']->value['telefon'];?>
">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Eposta</label>
					<input type="text" class="form-control" name="eposta" placeholder="ör: musteriadi@site.com" autocomplete="off"  value="<?php echo $_smarty_tpl->tpl_vars['musteri']->value['eposta'];?>
">
				</div>
				<div class="form-group">
					<label>Müşteri Resmi 200 X 200</label>
					<input type="file" class="filestyle" name="resim" data-icon="false" data-buttonText="Resim Seçin">
				</div>
				<div class="form-group"><img src="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
img/musteri/<?php echo $_smarty_tpl->tpl_vars['musteri']->value['id_musteri'];?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['musteri']->value['musteri_ad'];?>
" width="100" height="100"/></div>
				<div class="form-group">
				<br/>
					<label>Açıklama</label>
					<textarea name="aciklama" class="form-control" id="aciklama" cols="30" rows="3"><?php echo $_smarty_tpl->tpl_vars['musteri']->value['aciklama'];?>
</textarea>
				</div>
				<div><div></div></div>
				<div></div>
				<div><div><div><input type="hidden" name="musterino" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['musteri']->value['id_musteri'];?>
"></div></div></div>
			</div>
			<div class="col-sm-6 col-sm-offset-6">
			  <button type="submit" name="musteriekle" value="1" class="btn btnTuruncu sagaYasla">Kaydet</button>
			</div>
		</form>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
}
}
