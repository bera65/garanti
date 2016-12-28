<?php
/* Smarty version 3.1.30, created on 2016-12-27 20:18:45
  from "C:\wamp64\www\garanti\gorunum\default\musteriler-detay.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5862b085d7c588_38726844',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79cca3f1c6edeba190528f6795552022482f3c58' => 
    array (
      0 => 'C:\\wamp64\\www\\garanti\\gorunum\\default\\musteriler-detay.tpl',
      1 => 1482675283,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5862b085d7c588_38726844 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\wamp64\\www\\garanti\\libs\\plugins\\modifier.date_format.php';
?>
<div class="kbaslik"><?php echo $_smarty_tpl->tpl_vars['musteriAdi']->value;?>
</div>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['musteri']->value, 'ms');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ms']->value) {
?>
	<div class="musteriBilgi">
		<div class="col-sm-2">
			<img src="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
img/musteri/<?php if ($_smarty_tpl->tpl_vars['ms']->value['resim']) {
echo $_smarty_tpl->tpl_vars['ms']->value['id_musteri'];
} else { ?>kullanici-bos<?php }?>.jpg" alt="Müşteri Resmi" width="150px" height="150px"/>
		</div>
		<div class="col-sm-5">
		<div class="musteriadres">
			<h4>Müşteri : <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ms']->value['musteri_ad'], ENT_QUOTES, 'UTF-8', true);?>
</h4>
			<?php if ($_smarty_tpl->tpl_vars['ms']->value['aciklama']) {?>
				<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ms']->value['aciklama'], ENT_QUOTES, 'UTF-8', true);?>
 <br/>
			<?php }?>
		</div>
			<p>Toplam Aldığı Ürün : <b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urunSayisi']->value, ENT_QUOTES, 'UTF-8', true);?>
</b> adet</p>
		</div>
		<div class="col-sm-5 butonkismi">
			<div class="musteriadres">
			<?php if ($_smarty_tpl->tpl_vars['ms']->value['adres']) {?>
				<a  href="http://maps.google.com/?q=<?php echo $_smarty_tpl->tpl_vars['ms']->value['adres'];?>
" onclick="window.open(this.href);return false;"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ms']->value['adres'], ENT_QUOTES, 'UTF-8', true);?>
</a> <br/>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['ms']->value['telefon']) {?>
				<i class="fa fa-phone" aria-hidden="true"></i> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ms']->value['telefon'], ENT_QUOTES, 'UTF-8', true);?>
 <br/>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['ms']->value['eposta']) {?>
				<i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ms']->value['eposta'], ENT_QUOTES, 'UTF-8', true);?>
 <br/>
			<?php }?>
			</div>
			<div class="musteri_button">
				<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
musteriDuzenle/<?php echo $_smarty_tpl->tpl_vars['ms']->value['id_musteri'];?>
" class="btn yesilButton">Müşteriyi Düzenle</a>
				<a onClick="musteriSil(<?php echo strtotime($_smarty_tpl->tpl_vars['ms']->value['kayit_tarihi']);
echo $_smarty_tpl->tpl_vars['ms']->value['id_musteri'];?>
)" class="btn btnTuruncu">Müşteriyi Sil</a>
			</div>
		</div>
	</div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<div class="clear"></div>
<ul id="urunler" class="urunler">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['urunler']->value, 'urun');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['urun']->value) {
?>
	<li id="urun_<?php echo $_smarty_tpl->tpl_vars['urun']->value['id_urun'];?>
" class="panel <?php echo VT::garantiVarmi($_smarty_tpl->tpl_vars['urun']->value['garanti_bitis']);?>
 urunlerdiv" data-baslik="<?php echo $_smarty_tpl->tpl_vars['musteriAdi']->value;?>
" data-kategori="musteriurun">
		<div onClick="urunGoster(<?php echo $_smarty_tpl->tpl_vars['urun']->value['id_urun'];?>
)" data-toggle="modal" data-target="#pencereGoster" class="col-sm-3 col-xs-6 musteri"><?php echo $_smarty_tpl->tpl_vars['musteriAdi']->value;?>
</div>
		<div onClick="urunGoster(<?php echo $_smarty_tpl->tpl_vars['urun']->value['id_urun'];?>
)" data-toggle="modal" data-target="#pencereGoster" class="col-sm-7 col-xs-6 urun">
			<b><?php echo $_smarty_tpl->tpl_vars['urun']->value['urun_adi'];?>
</b> <br/>
			<span>Garanti Bitiş: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['urun']->value['garanti_bitis'],"%d.%m.%Y");?>
</span>
		</div>
		<div class="col-sm-2 col-xs-12 silDuzenle">
			<a  onClick="urunuSil(<?php echo strtotime($_smarty_tpl->tpl_vars['urun']->value['satis_tarihi']);
echo htmlspecialchars($_smarty_tpl->tpl_vars['urun']->value['id_urun'], ENT_QUOTES, 'UTF-8', true);?>
)"class="kirmiziButton" title="Sil"><i class="fa fa-trash-o" aria-hidden="true"></i></a> 
			<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
duzenle/<?php echo $_smarty_tpl->tpl_vars['urun']->value['id_urun'];?>
" class="maviButton" title="Düzenle"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
		</div>
	</li>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</ul>
<div id="yukleniyor"><img src="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
img/yukleniyor.gif" alt="Yükleniyor" /></div><?php }
}
