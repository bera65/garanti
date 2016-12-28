<?php
/* Smarty version 3.1.30, created on 2016-12-27 16:45:25
  from "C:\wamp64\www\garanti\gorunum\default\alt.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58627e85a9f1d4_61209678',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f8a7a60cf2da3f701427bba1b1e8533ad475a428' => 
    array (
      0 => 'C:\\wamp64\\www\\garanti\\gorunum\\default\\alt.tpl',
      1 => 1482820913,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58627e85a9f1d4_61209678 (Smarty_Internal_Template $_smarty_tpl) {
?>
				</div>
			</div>
			<div id="alt" class="container-fluid">
				<div class="container">
				</div>
			</div>
			<div id="uyari">
				<div class="uyariPencere">
					<div class="baslik">Ürün Sil ! <a class="pencerekapat" onClick="pencerekapat()"><i class="fa fa-times" aria-hidden="true"></i></a></div>
					<div class="icerik">Bu ürün kalıcı olarak silinsin mi ?</div>
					<div class="buttonlar">
						<form id="uyariform" action="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
sayfa.php" method="POST">
							<input type="hidden" id="urunsil" name="numara"/>
							<button class="btn btnTuruncu" type="submit" name="urunsil" value="1">Evet</button>
							<button class="btn yesilButton" type="button" onClick="pencerekapat()" value="1">Hayır</button>
						</form>
					</div>
				</div>
			</div>
			<div class="modal fade" id="pencereGoster" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"></h4>
				  </div>
				  <div class="modal-body">
					
				  </div>
				</div>
			  </div>
			</div>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
bootstrap.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
style.js"><?php echo '</script'; ?>
>
			<?php if ($_smarty_tpl->tpl_vars['sayfaAdi']->value == 'anasayfa') {?>
				<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
count.js"><?php echo '</script'; ?>
>
				<?php echo '<script'; ?>
 type="text/javascript">
					countUp(<?php echo $_smarty_tpl->tpl_vars['toplamMusteri']->value;?>
);
					countUp2(<?php echo $_smarty_tpl->tpl_vars['toplamUrun']->value;?>
);
					countUp3(<?php echo $_smarty_tpl->tpl_vars['toplamKullanici']->value;?>
);
				<?php echo '</script'; ?>
>
			<?php }?>
	</body>
</html><?php }
}
