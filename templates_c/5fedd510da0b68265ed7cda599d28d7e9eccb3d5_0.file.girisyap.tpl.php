<?php
/* Smarty version 3.1.30, created on 2016-12-27 16:56:38
  from "C:\wamp64\www\garanti\gorunum\default\girisyap.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58628126361d12_47208627',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5fedd510da0b68265ed7cda599d28d7e9eccb3d5' => 
    array (
      0 => 'C:\\wamp64\\www\\garanti\\gorunum\\default\\girisyap.tpl',
      1 => 1482742180,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58628126361d12_47208627 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="giris_alani">
	<div class="girisResim col-sm-4"><img src="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
img/musteri/kullanici-bos.jpg" alt="Kullanici Resmi" width="150px" height="150px"/></div>
	<div class="girisForm col-sm-8">
		<form action="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
girisyap/" method="post" class="uyeform" id="girisForm">
			<div><h4>Üye Girişi</h4></div>
			<?php if ($_smarty_tpl->tpl_vars['hata']->value == 1) {?>
				<div class="alert alert-danger" role="alert">Kullanici Bulunamadı</div>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['hata']->value == 2) {?>
				<div class="alert alert-danger" role="alert">Yeni şifre için 1 dk geçmesi gerekir</div>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['hata']->value == 4) {?>
				<div class="alert alert-success" role="alert">Mail Gönderildi</div>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['hata']->value == 5) {?>
				<div class="alert alert-danger" role="alert">Mail Gönderilemedi Lütfen Gerekli Ayarları Kontrol Edin</div>
			<?php }?>
			<div class="input-group margin-bottom-sm">
			  <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
			  <input class="form-control" type="text" name="kullanici" placeholder="Kullanici Adı" autocomplete="off" autofocus>
			</div>
			<div class="input-group">
			  <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
			  <input class="form-control" type="password" name="sifre" placeholder="Şifre" autocomplete="off">
			</div>
			<div class="soldaKal">
			  <label>
				<input type="checkbox" value="">
				Beni Hatırla
			  </label>
			  <div>
				<div>
					<input class="form-control" type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['girisToken']->value;?>
">
				</div>
			  </div>
			</div>
			<button type="submit" class="btn yesilButton">Giriş Yap</button>
		</form>
		<form action="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
girisyap/" method="post" class="uyeform" id="sifreform">
			<div><h4>Şifre Hatırlat</h4></div>
			<div class="input-group margin-bottom-sm">
			  <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
			  <input class="form-control" type="text" name="eposta" placeholder="Kayıtlı Epostanız" autocomplete="off" autofocus>
			</div>
			<div class="soldaKal">
			  <div>
				<div>
					<input class="form-control" type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['girisToken']->value;?>
">
				</div>
			  </div>
			</div>
			<button type="submit" class="btn btnTuruncu">Şifremi Gönder</button>
		</form>
		<p class="clear yaziOrtala" id="sifreHatirlatP"><br/> <a class="pointer" onClick="sifreHatirlat()">Şifremi Unuttum ve Giriş Yapamıyorum</a></p>
		<p class="clear"><br/></p>
	</div>
</div><?php }
}
