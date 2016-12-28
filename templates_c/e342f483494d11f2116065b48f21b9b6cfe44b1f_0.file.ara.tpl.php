<?php
/* Smarty version 3.1.30, created on 2016-12-28 09:51:10
  from "C:\wamp64\www\garanti\gorunum\default\ara.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58636eeed91911_43127955',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e342f483494d11f2116065b48f21b9b6cfe44b1f' => 
    array (
      0 => 'C:\\wamp64\\www\\garanti\\gorunum\\default\\ara.tpl',
      1 => 1482911464,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58636eeed91911_43127955 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\wamp64\\www\\garanti\\libs\\plugins\\modifier.date_format.php';
if ($_smarty_tpl->tpl_vars['kelime']->value == 'bos') {?>
	<div class="kbaslik">Uygun sonuç bulunamadı</div>
	<?php echo '<script'; ?>
 type="text/javascript">
		$(document).ready(function() { 
			$.ambiance({
			message: "<?php echo $_smarty_tpl->tpl_vars['hata']->value;?>
", 
            title: "Üzgünüz!",
            type: "default",
			timeout: 3
			});
		});
	<?php echo '</script'; ?>
>
<?php } else { ?>
	<div class="kbaslik">Kelime : <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kelime']->value, ENT_QUOTES, 'UTF-8', true);?>
</div>
	<ul id="urunler" class="urunler">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['urunler']->value, 'urun');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['urun']->value) {
?>
			<li id="urun_<?php echo $_smarty_tpl->tpl_vars['urun']->value['id_urun'];?>
" class="panel <?php echo VT::garantiVarmi($_smarty_tpl->tpl_vars['urun']->value['garanti_bitis']);?>
" data-baslik="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urun']->value['musteri_ad'], ENT_QUOTES, 'UTF-8', true);?>
">
				<div onClick="urunGoster(<?php echo $_smarty_tpl->tpl_vars['urun']->value['id_urun'];?>
)" data-toggle="modal" data-target="#pencereGoster" class="col-sm-3 col-xs-6 musteri"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urun']->value['musteri_ad'], ENT_QUOTES, 'UTF-8', true);?>
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
<?php }
}
}
