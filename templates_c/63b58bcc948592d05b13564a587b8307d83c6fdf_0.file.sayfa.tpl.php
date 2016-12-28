<?php
/* Smarty version 3.1.30, created on 2016-12-27 19:14:21
  from "C:\wamp64\www\garanti\gorunum\default\sayfa.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5862a16de7d933_23165061',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '63b58bcc948592d05b13564a587b8307d83c6fdf' => 
    array (
      0 => 'C:\\wamp64\\www\\garanti\\gorunum\\default\\sayfa.tpl',
      1 => 1482657593,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5862a16de7d933_23165061 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\wamp64\\www\\garanti\\libs\\plugins\\modifier.date_format.php';
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['urunler']->value, 'urun');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['urun']->value) {
?>
<div class="musteriBilgi">
	<div class="col-sm-2">
		<img src="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
img/musteri/<?php if ($_smarty_tpl->tpl_vars['urun']->value['resim']) {
echo $_smarty_tpl->tpl_vars['urun']->value['id_musteri'];
} else { ?>kullanici-bos<?php }?>.jpg" alt="Müşteri Resmi" width="150px" height="150px"/>
	</div>
	<div class="col-sm-5">
	<div class="musteriadres">
		<h4>Müşteri : <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urun']->value['musteri_ad'], ENT_QUOTES, 'UTF-8', true);?>
</h4>
		<?php if ($_smarty_tpl->tpl_vars['urun']->value['aciklama']) {?>
			<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urun']->value['aciklama'], ENT_QUOTES, 'UTF-8', true);?>
 <br/>
		<?php }?>
	</div>
		<p>Toplam Aldığı Ürün : <b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urunSayisi']->value, ENT_QUOTES, 'UTF-8', true);?>
</b> adet</p>
	</div>
	<div class="col-sm-5 butonkismi">
		<div class="musteriadres">
		<?php if ($_smarty_tpl->tpl_vars['urun']->value['adres']) {?>
			<a  href="http://maps.google.com/?q=<?php echo $_smarty_tpl->tpl_vars['urun']->value['adres'];?>
" onclick="window.open(this.href);return false;"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urun']->value['adres'], ENT_QUOTES, 'UTF-8', true);?>
</a> <br/>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['urun']->value['telefon']) {?>
			<i class="fa fa-phone" aria-hidden="true"></i> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urun']->value['telefon'], ENT_QUOTES, 'UTF-8', true);?>
 <br/>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['urun']->value['eposta']) {?>
			<i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urun']->value['eposta'], ENT_QUOTES, 'UTF-8', true);?>
 <br/>
		<?php }?>
		</div>
		<div class="musteri_button">
			<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
duzenle/<?php echo $_smarty_tpl->tpl_vars['urun']->value['id_urun'];?>
" class="btn btn-default">Bu Sayfayı Düzenle</a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
musteri/<?php echo $_smarty_tpl->tpl_vars['urun']->value['id_musteri'];?>
" class="btn btn-default">Müşterinin Tüm Ürünleri</a>
		</div>
	</div>
</div>
	<div class="col-sm-6">
		<div class="panel grub">
			<div><div class="col-sm-6 col-xs-6"><b>Satış Tarihi</b></div><div class="col-sm-6 col-xs-6">: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['urun']->value['satis_tarihi'],"%d.%m.%Y");?>
</div></div>
		</div>
		<div class="panel grub">
			<div><div class="col-sm-6 col-xs-6"><b>Garanti Bitiş</b></div><div class="col-sm-6 col-xs-6 <?php echo VT::garantiVarmi($_smarty_tpl->tpl_vars['urun']->value['garanti_bitis']);?>
">: <span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['urun']->value['garanti_bitis'],"%d.%m.%Y");?>
</span></div></div>
		</div>
	</div>
	<div class="col-sm-6">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['gruplar']->value, 'grup');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['grup']->value) {
?>
		<div class="panel grub">
			<div><div class="col-sm-6 col-xs-6"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['grup']->value['urun_adi'], ENT_QUOTES, 'UTF-8', true);?>
</div><div class="col-sm-6 col-xs-6 serino">: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['grup']->value['urun_sn'], ENT_QUOTES, 'UTF-8', true);?>
</div></div>
		</div>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		<div class="panel grub">
		<div>
			<h3 class="panelh3">Açıklama</h3>
			<div class="col-sm-12 col-xs-12"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urun']->value['urun_aciklama'], ENT_QUOTES, 'UTF-8', true);?>
</div>
		</div>
		</div>
	</div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
}
}
