<?php
/* Smarty version 3.1.30, created on 2016-12-27 19:37:20
  from "C:\wamp64\www\garanti\gorunum\default\profilim.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5862a6d0d8a143_56619333',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e651bdf8d48047751aba6719ba89d8f5a048b7d8' => 
    array (
      0 => 'C:\\wamp64\\www\\garanti\\gorunum\\default\\profilim.tpl',
      1 => 1482845583,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5862a6d0d8a143_56619333 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="kbaslik">Profilimi Düzenle</div>
<?php if ($_smarty_tpl->tpl_vars['sonuc']->value == 2) {
echo '<script'; ?>
 type="text/javascript">
		$(document).ready(function() { 
			$.ambiance({
			message: "Şifre başarı ile değiştirildi", 
            title: "Başarılı!",
            type: "success",
			timeout: 5.71
			});
		});
	<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
window.setTimeout(function(){
        window.location.href = window.location.href;
 }, 5710);
<?php echo '</script'; ?>
>
<?php } elseif ($_smarty_tpl->tpl_vars['sonuc']->value == 3) {
echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function() { 
		$.ambiance({
		message: "Eski şifreniz hatalı", 
		title: "Hata!",
		type: "error",
		timeout: 7
		});
	});
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
	window.setTimeout(function(){
			window.location.href = window.location.href;
	 }, 7000);
<?php echo '</script'; ?>
>
<?php } elseif ($_smarty_tpl->tpl_vars['sonuc']->value == 4) {
echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function() { 
		$.ambiance({
		message: "Şifreler Uyuşmuyor", 
		title: "Hata!",
		type: "error",
		timeout: 7
		});
	});
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
	window.setTimeout(function(){
			window.location.href = window.location.href;
	 }, 7000);
<?php echo '</script'; ?>
>
<?php }?>
<form action="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
profilim/" method="post" class="uyeform col-sm-6" enctype="multipart/form-data">
	<div><h4>Profili Düzenle</h4></div>
	<div class="form-group">
		<label>Kullanıcı Adı</label>
		<input type="text" class="form-control" name="kullaniciadiDuzenle" placeholder="Kullanıcı Adı" value="<?php echo $_smarty_tpl->tpl_vars['kullaniciBilgi']->value;?>
">
	</div>
	<div class="form-group">
		<label>Epostanız</label>
		<input type="text" class="form-control" name="epostaDuzenle" placeholder="Epostanız" value="<?php echo $_smarty_tpl->tpl_vars['kullaniciEposta']->value;?>
">
	</div>
	<div class="form-group">
		<label>Profil Resmi 200 x 200</label>
		<input type="file" name="resim">
	</div>
	<div class="soldaKal">
	  <div>
		<div>
			<input class="form-control" type="hidden" name="tokenDuzenle" value="<?php echo $_smarty_tpl->tpl_vars['girisToken']->value;?>
">
			<input class="form-control" type="hidden" name="eskikullanici" value="<?php echo $_smarty_tpl->tpl_vars['kullaniciBilgi']->value;?>
">
		</div>
	  </div>
	</div>
	<button type="submit" class="btn yesilButton">Güncelle</button>
</form>
<form action="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
profilim/" method="post" class="uyeform col-sm-6">
	<div><h4>Yeni Şifre Oluştur</h4></div>
	<div class="form-group">
		<label>Eski şifreniz</label>
		<input type="password" class="form-control" name="eskisifre" placeholder="Şuan kullandığınız şifre">
	</div>
	<div class="form-group">
		<label>Yeni Şifreniz</label>
		<input type="password" class="form-control" name="yenisifre" placeholder="Yeni şifreniz">
	</div>
	<div class="form-group">
		<label>Yeni Şifreniz Tekrar</label>
		<input type="password" class="form-control" name="yenisifretekrar" placeholder="Yeni şifreniz tekrar">
	</div>
	<div class="soldaKal">
	  <div>
		<div>
			<input class="form-control" type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['girisToken']->value;?>
">
			<input class="form-control" type="hidden" name="kullanici" value="<?php echo $_smarty_tpl->tpl_vars['kullaniciBilgi']->value;?>
">
		</div>
	  </div>
	</div>
	<button type="submit" class="btn btnTuruncu">Yeni Şifre Oluştur</button>
</form>
<p class="clear onbosluk"></p><?php }
}
