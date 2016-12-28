<?php
/* Smarty version 3.1.30, created on 2016-12-27 20:30:07
  from "C:\wamp64\www\garanti\gorunum\default\ust.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5862b32f490fe7_99244492',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'db7aeb975c6a9d3a0712b503a6f0416e90709483' => 
    array (
      0 => 'C:\\wamp64\\www\\garanti\\gorunum\\default\\ust.tpl',
      1 => 1482863354,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5862b32f490fe7_99244492 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html itemscope="" itemtype="http://schema.org/WebPage" lang="tr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['metaAciklama']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['site_adi']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</title>
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;?>
bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;?>
font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;?>
style.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;?>
jquery.ambiance.css">
		<?php if ($_smarty_tpl->tpl_vars['css']->value) {?>
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;
echo $_smarty_tpl->tpl_vars['css']->value;?>
">
		<?php }?>
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;?>
animate.css">
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
jquery.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
owl.carousel.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
jquery.ambiance.js"><?php echo '</script'; ?>
>
		<?php if ($_smarty_tpl->tpl_vars['js']->value) {?>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;
echo $_smarty_tpl->tpl_vars['js']->value;?>
"><?php echo '</script'; ?>
>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['sayfaAdi']->value == 'musteriler') {?>
			<?php echo '<script'; ?>
 type="text/javascript" src="http://www.jquery-az.com/boots/js/bootstrap-filestyle.min.js"> <?php echo '</script'; ?>
>
		<?php }?>
	</head>
	<body id="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['sayfaAdi']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
		<header id="header">
			<div class="col-sm-9 hidden-xs">
				<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
" class="logo">Garanti Takip</a>
			</div>
		<?php if ($_smarty_tpl->tpl_vars['sayfaAdi']->value != 'girisyap') {?>
			<div class="ustMenuArama col-sm-3 col-xs-12">
				<div class="aramaBox sagaYasla">
					<form class="form-inline" action="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
ara/" method="post">
						  <div class="form-group">
							<input type="text" class="form-control" id="araKutu" name="kelime" placeholder="Arama yap.." autocomplete="off" autofocus>
						  </div>
						  <div class="aramabolum">
						  <div>
							<div></div>
						  </div>
						  <div><div><div><input type="hidden" name="aramatkn" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['aramaToken']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"/></div></div></div>
						  </div>
						  <button type="submit" class="btn btn-default sagaYasla" name="arama" value="1">Ara</button>
					</form>
				</div>
			</div>
		<?php }?>
		</header>
		<div id="site" class="container-fluid">
		<div id="ustmenu" class="col-sm-12">
			<div class="gizle">
				<a class="pointer" onClick="menuGoster()"><i class="fa fa-bars" aria-hidden="true"></i></a> <a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
">Garanti Takip</a>
			</div>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['left']->value != 0) {?>
			<div id="sol" class="col-sm-3">
				<div class="kullaniciBolumu">
					<div class="kullaciresmi">
							<img src="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
img/<?php if ($_smarty_tpl->tpl_vars['kullaniciResim']->value) {
echo $_smarty_tpl->tpl_vars['kullaniciID']->value;
} else { ?>/musteri/kullanici-bos<?php }?>.jpg" alt="" id="kullaniciResmi" width="150" height="150" />
						<div class="dropdown">
							  <button class="dropdown-toggle" type="button" id="statuDegistir" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								<?php echo $_smarty_tpl->tpl_vars['kullaniciBilgi']->value;?>

								<span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu" aria-labelledby="statuDegistir">
								<li><a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
profilim/">Profilim</a></li>
								<li><a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
ayarlar/">Ayarlar</a></li>
								<li><a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
ayarlar/cikis">Çıkış Yap</a></li>
							  </ul>
						</div>
					</div>
				</div>
				<div class="kategoriler">
					<h4 class="baslik">KATEGORİLER</h4>
					<ul>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> İstatistikler</a></li>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kategoriler']->value, 'kategori');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['kategori']->value) {
?>
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;
echo LinkYapisi::kategori($_smarty_tpl->tpl_vars['kategori']->value['id_kategori'],$_smarty_tpl->tpl_vars['kategori']->value['kategori_seo']);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kategori']->value['kategori_adi'], ENT_QUOTES, 'UTF-8', true);?>
"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kategori']->value['kategori_adi'], ENT_QUOTES, 'UTF-8', true);?>
</a></li>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					</ul>
					<h4 class="baslik">LINKLER</h4>
					<ul>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
musteriler/"><i class="fa fa-user" aria-hidden="true"></i> Müşeteriler</a></li>
					</ul>
				</div>
			</div>
			<?php }?>
			<div id="<?php if ($_smarty_tpl->tpl_vars['left']->value != 0) {?>sag<?php } else { ?>orta<?php }?>" class="col-sm-9">
			
			<?php }
}
