<?php
/* Smarty version 3.1.30, created on 2016-12-27 17:29:37
  from "C:\wamp64\www\garanti\gorunum\default\ayarlar-kategoriler.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_586288e1931010_37029616',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1392980eb8ba39a641661f400fd29613c359b93e' => 
    array (
      0 => 'C:\\wamp64\\www\\garanti\\gorunum\\default\\ayarlar-kategoriler.tpl',
      1 => 1482846735,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_586288e1931010_37029616 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
		  <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['girisToken']->value;?>
">
		  <button type="submit" class="btn btnTuruncu" name="kategoriekle">Kaydet</button>
		</div>
	</form>
</div>
<ul id="urunler" class="urunler">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kategorilerGetir']->value, 'kategori');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['kategori']->value) {
?>
	<li class="panel">
		<div class="col-sm-10 col-xs-6 musteri"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kategori']->value['kategori_adi'], ENT_QUOTES, 'UTF-8', true);?>
</div>
		<div class="col-sm-2 col-xs-6 silDuzenle">
			<a  onClick="kategoriSil(<?php echo strtotime($_smarty_tpl->tpl_vars['kategori']->value['eklenme_tarihi']);
echo htmlspecialchars($_smarty_tpl->tpl_vars['kategori']->value['id_kategori'], ENT_QUOTES, 'UTF-8', true);?>
)"class="kirmiziButton" title="Sil"><i class="fa fa-trash-o" aria-hidden="true"></i></a> 
			<a onClick="kategoriDuzenle(<?php echo strtotime($_smarty_tpl->tpl_vars['kategori']->value['eklenme_tarihi']);
echo htmlspecialchars($_smarty_tpl->tpl_vars['kategori']->value['id_kategori'], ENT_QUOTES, 'UTF-8', true);?>
)" id="duzenle<?php echo strtotime($_smarty_tpl->tpl_vars['kategori']->value['eklenme_tarihi']);
echo htmlspecialchars($_smarty_tpl->tpl_vars['kategori']->value['id_kategori'], ENT_QUOTES, 'UTF-8', true);?>
" class="maviButton" title="Düzenle" data-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kategori']->value['kategori_adi'], ENT_QUOTES, 'UTF-8', true);?>
"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
		</div>
	</li>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</ul>
<div id="ksonuc"></div><?php }
}
