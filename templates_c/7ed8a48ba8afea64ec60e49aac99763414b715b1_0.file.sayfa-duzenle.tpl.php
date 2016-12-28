<?php
/* Smarty version 3.1.30, created on 2016-12-27 20:32:10
  from "C:\wamp64\www\garanti\gorunum\default\sayfa-duzenle.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5862b3aa97edb8_72368407',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ed8a48ba8afea64ec60e49aac99763414b715b1' => 
    array (
      0 => 'C:\\wamp64\\www\\garanti\\gorunum\\default\\sayfa-duzenle.tpl',
      1 => 1481984406,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5862b3aa97edb8_72368407 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\wamp64\\www\\garanti\\libs\\plugins\\modifier.date_format.php';
?>
<div class="kbaslik">Düzenle</div>
<form action="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
sayfa.php" method="post">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['urunler']->value, 'urun');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['urun']->value) {
?>
		<div class="col-sm-6">
			<div class="panel grub">
				<div><div class="col-sm-5 col-xs-12"><b>Müşteri</b></div><div class="col-sm-7 col-xs-12"><input type="text" name="musteri" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urun']->value['musteri_ad'], ENT_QUOTES, 'UTF-8', true);?>
"/></div></div>
			</div>
			<div class="panel grub">
				<div><div class="col-sm-5 col-xs-12"><b>Satış Tarihi</b></div><div class="col-sm-7 col-xs-12"><input type="text" name="satistahiri" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['urun']->value['satis_tarihi'],'%d.%m.%Y');?>
"/></div></div>
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
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['gruplar']->value, 'grup');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['grup']->value) {
?>
			<div class="panel grub">
				<div><div class="col-sm-7 col-xs-12"><input type="text" name="urun[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['grup']->value['urun_adi'], ENT_QUOTES, 'UTF-8', true);?>
"/></div><div class="col-sm-5 col-xs-12 serino"><input type="text" name="serino[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['grup']->value['urun_sn'], ENT_QUOTES, 'UTF-8', true);?>
"/></div></div>
				<a onClick="urunuDetaySil(<?php echo strtotime($_smarty_tpl->tpl_vars['grup']->value['duzenlenme_tarihi']);
echo htmlspecialchars($_smarty_tpl->tpl_vars['grup']->value['id_urun_detay'], ENT_QUOTES, 'UTF-8', true);?>
)" class="kapat"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
			</div>
			<input type="hidden" name="detay[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['grup']->value['id_urun_detay'], ENT_QUOTES, 'UTF-8', true);?>
"/>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			<div class="panel grub">
			<div>
				<h3 class="panelh3">Açıklama</h3>
				<div class="col-sm-12 col-xs-12"><textarea name="aciklama"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urun']->value['urun_aciklama'], ENT_QUOTES, 'UTF-8', true);?>
</textarea></div>
			</div>
			</div>
		</div>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	<div><input type="hidden" name="urunno" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['duzenle']->value, ENT_QUOTES, 'UTF-8', true);?>
"/><input type="hidden" name="kategori" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urun']->value['id_kategori'], ENT_QUOTES, 'UTF-8', true);?>
"/></div>
	<button class="btn btnTuruncu" name="urunduzenle" value="1">KAYDET</button>
</form><?php }
}
