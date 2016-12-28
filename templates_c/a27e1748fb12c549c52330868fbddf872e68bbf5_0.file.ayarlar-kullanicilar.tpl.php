<?php
/* Smarty version 3.1.30, created on 2016-12-27 19:41:06
  from "C:\wamp64\www\garanti\gorunum\default\ayarlar-kullanicilar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5862a7b20f8873_06576785',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a27e1748fb12c549c52330868fbddf872e68bbf5' => 
    array (
      0 => 'C:\\wamp64\\www\\garanti\\gorunum\\default\\ayarlar-kullanicilar.tpl',
      1 => 1482860462,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5862a7b20f8873_06576785 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="kbaslik">Kullanıcılar</div>
<div class="buttonlar">
	<span id="yenikayitButton" class="ekle btn yesilButton" onClick="yeniKayit()">Yeni Kayıt Ekle</span>
</div>
<div id="yenikayit">
<form action="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
ayarlar/kullanicilar" id="yeniKullanici" enctype="multipart/form-data" method="post" class="uyeform col-sm-12">
	<div class="form-group col-sm-6">
		<label>Kullanıcı Adı</label>
		<input type="text" class="form-control" name="kullaniciadi" placeholder="Kullanıcı Adı">
	</div>
	<div class="form-group col-sm-6">
		<label>Epostanız</label>
		<input type="text" class="form-control" name="eposta" placeholder="Epostanız">
	</div>
	<div class="form-group col-sm-6">
		<label>Profil Resmi 200 x 200</label>
		<input type="file" name="resim">
	</div>
	<div class="form-group col-sm-6">
		<label>Şifre</label>
		<input type="password" class="form-control" name="sifre">
	</div>
	<div class="form-group col-sm-6">
		<label>Admin</label>
		<select name="admin" class="form-control">
			<option value="0">Hayır</option>
			<option value="1">Evet</option>
		</select>
	</div>
	<div class="soldaKal">
	  <div>
		<div>
			<input class="form-control" type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['girisToken']->value;?>
">
		</div>
	  </div>
	</div>
	<div class="clear">
		<button type="submit" class="btn yesilButton">Yeni Kullanıcı Ekle</button>
	</div>
</form>
</div>
<ul id="urunler" class="urunler">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kullanicilarGetir']->value, 'kullanici');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['kullanici']->value) {
?>
	<li class="panel">
		<div class="col-sm-10 col-xs-6 musteri"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kullanici']->value['kullanici_adi'], ENT_QUOTES, 'UTF-8', true);?>
 (<?php if ($_smarty_tpl->tpl_vars['kullanici']->value['admin'] == 1) {?>Admin<?php } else { ?>Normal Kullanıcı<?php }?>)</div>
		<div class="col-sm-2 col-xs-6 silDuzenle">
		<?php if ($_smarty_tpl->tpl_vars['kullaniciID']->value != $_smarty_tpl->tpl_vars['kullanici']->value['id_kullanici']) {?>
			<a  onClick="kullaniciSil(<?php echo strtotime($_smarty_tpl->tpl_vars['kullanici']->value['kayit_tarihi']);
echo htmlspecialchars($_smarty_tpl->tpl_vars['kullanici']->value['id_kullanici'], ENT_QUOTES, 'UTF-8', true);?>
)"class="kirmiziButton" title="Sil">Sil</a> 
		<?php }?>
		</div>
	</li>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</ul>
<div id="ksonuc"><?php echo $_smarty_tpl->tpl_vars['ekle']->value;?>
</div><?php }
}
