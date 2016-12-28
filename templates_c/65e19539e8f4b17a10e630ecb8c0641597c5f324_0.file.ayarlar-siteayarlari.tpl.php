<?php
/* Smarty version 3.1.30, created on 2016-12-27 18:54:52
  from "C:\wamp64\www\garanti\gorunum\default\ayarlar-siteayarlari.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58629cdc1dd266_29103902',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '65e19539e8f4b17a10e630ecb8c0641597c5f324' => 
    array (
      0 => 'C:\\wamp64\\www\\garanti\\gorunum\\default\\ayarlar-siteayarlari.tpl',
      1 => 1482829760,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58629cdc1dd266_29103902 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="kbaslik">Site Genel Ayarları</div>
<form action="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
ayarlar/siteayarlari" method="post" class="uyeform" id="girisForm">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ayarlariGetir']->value, 'ayar');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ayar']->value) {
?>
		<div class="form-group col-sm-6">
			<label><?php echo $_smarty_tpl->tpl_vars['ayar']->value['veri'];?>
</label>
			<input type="text" class="form-control" name="<?php echo $_smarty_tpl->tpl_vars['ayar']->value['veri'];?>
" placeholder="Kullanıcı Adı" value="<?php echo $_smarty_tpl->tpl_vars['ayar']->value['deger'];?>
">
		</div>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	<input class="form-control" type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['girisToken']->value;?>
">
	<button type="submit" class="btn yesilButton" name="ayarlariGuncelle" value="1">Güncelle</button>
</form><?php }
}
