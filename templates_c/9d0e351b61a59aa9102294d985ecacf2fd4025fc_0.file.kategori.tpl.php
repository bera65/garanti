<?php
/* Smarty version 3.1.30, created on 2016-12-27 16:57:00
  from "C:\wamp64\www\garanti\gorunum\default\kategori.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5862813c0c6750_09876049',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d0e351b61a59aa9102294d985ecacf2fd4025fc' => 
    array (
      0 => 'C:\\wamp64\\www\\garanti\\gorunum\\default\\kategori.tpl',
      1 => 1482000419,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5862813c0c6750_09876049 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\wamp64\\www\\garanti\\libs\\plugins\\modifier.date_format.php';
?>
<div class="kbaslik"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['kategoriAdi']->value, ENT_QUOTES, 'UTF-8', true);?>
</div>
<?php if ($_smarty_tpl->tpl_vars['hata']->value) {?>
	<?php echo '<script'; ?>
 type="text/javascript">
		$(document).ready(function() { 
			$.ambiance({
			message: "<?php echo $_smarty_tpl->tpl_vars['hata']->value;?>
", 
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
<?php } elseif ($_smarty_tpl->tpl_vars['basarili']->value) {?>
	<?php echo '<script'; ?>
 type="text/javascript">
		$(document).ready(function() { 
			$.ambiance({
			message: "Kayıt başarı ile eklendi", 
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
<?php }?>

<div class="buttonlar">
	<span id="yenikayitButton" class="ekle btn yesilButton" onClick="yeniKayit()">Yeni Kayıt Ekle</span>
</div>
<div id="yenikayit">
	<form method="post" action="">
		<div class="col-sm-6">
			  <div class="form-group">
				<label>Müşteri Adı</label>
				<input type="text" name="musteriad" class="form-control"  placeholder="Müşteri Adı" autocomplete="off" onkeyup="musterigetir()">
				<div id="sonuc"></div>
			  </div>
			  <div class="form-group">
				<label>Satış Tarihi</label>
				<input type="text" class="form-control" name="satistarihi" placeholder="Satış Tarihi" value="<?php echo smarty_modifier_date_format(time(),'%d.%m.%Y');?>
" autocomplete="off">
			  </div>
			  <div class="form-group">
				<label>Garanti Süresi</label>
				<select name="garantisuresi" id="garantisuresi" class="form-control">
					<option value="6"> 6 Ay</option>
					<option value="12"> 1 Yıl</option>
					<option value="24" selected> 2 Yıl</option>
					<option value="36"> 3 Yıl</option>
					<option value="48"> 4 Yıl</option>
				</select>
			  </div>
		</div>
		<div class="col-sm-6">
			<div id="urunEklemeDivi">
				<div id="cogalt1">
					  <div class="form-group inputalani">
						<label>Ürün Adı</label>
						<input type="text" id="urun1" class="form-control" name="urun[]" placeholder="ör: Lenovo I5 Bilgisayar" autocomplete="off" onkeyup="urungetir(this.value, this.id)">
						<div id="usonuc" class="urun1"></div>
					  </div>
					  <div class="form-group">
						<label>Ürün Seri No</label>
						<input type="text" class="form-control" name="serino[]" placeholder="Seri No" autocomplete="off">
					  </div>
				</div>
			</div>
			<div class="ekleme">
				<a class="ekleme btn btn-default" onClick="baskaUrunEkle()"><i class="fa fa-plus" aria-hidden="true"></i> Başka Ürünler Ekle</a>
				<a class="cikarma btn btn-default" onClick="baskaUrunCikar()"><i class="fa fa-minus" aria-hidden="true"></i> Son Ürünü Çıkar</a>
			</div>
			<div class="form-group">
			<br/>
				<label>Açıklama</label>
				<textarea name="aciklama" class="form-control" id="aciklama" cols="30" rows="3"></textarea>
			</div>
		</div>
		<div class="col-sm-6 col-sm-offset-6">
		  <button type="submit" class="btn btnTuruncu sagaYasla">Kaydet</button>
		</div>
	</form>
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

</ul><?php }
}
