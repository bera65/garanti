<?php
/* Smarty version 3.1.30, created on 2016-12-28 09:45:53
  from "C:\wamp64\www\garanti\gorunum\default\anasayfa.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58636db13861b5_96011649',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '21b7204b68029764e19ffad8c55ee97485e898c7' => 
    array (
      0 => 'C:\\wamp64\\www\\garanti\\gorunum\\default\\anasayfa.tpl',
      1 => 1482911138,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58636db13861b5_96011649 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\wamp64\\www\\garanti\\libs\\plugins\\modifier.date_format.php';
?>
<div class="kbaslik">İstatistikler</div>
<div class="row">
	<div class="bir col-sm-4 uclukutu">
		<div class="ickisim panel">
			<div class="ust_kisim">
				<div class="col-sm-8 col-xs-8 sayi"><span class="count"><?php echo $_smarty_tpl->tpl_vars['toplamMusteri']->value;?>
</span><br />Müşteri</div>
				<div class="col-sm-4 col-xs-4 icon"><i class="fa fa-users"></i></div>
			</div>
			<div class="alt_kisim">
				<div class="col-sm-8 col-xs-8">Bir Önceki Yıla Göre</div>
				<div class="col-sm-4 col-xs-4 solayasla"><i class="fa fa-arrow-up"></i></div>
			</div>
		</div>
	</div>
	<div class="iki col-sm-4 uclukutu">
		<div class="ickisim panel">
			<div class="ust_kisim">
				<div class="col-sm-8 col-xs-8 sayi"><span class="count2"><?php echo $_smarty_tpl->tpl_vars['toplamUrun']->value;?>
</span><br />Ürün</div>
				<div class="col-sm-4 col-xs-4 icon"><i class="fa fa-file-text-o"></i></div>
			</div>
			<div class="alt_kisim">
				<div class="col-sm-8 col-xs-8">Bir Önceki Yıla Göre</div>
				<div class="col-sm-4 col-xs-4 solayasla"><i class="fa fa-arrow-up"></i></div>
			</div>
		</div>
	</div>
	<div class="uc col-sm-4 uclukutu">
		<div class="ickisim panel">
			<div class="ust_kisim">
				<div class="col-sm-8 col-xs-8 sayi"><span class="count3"><?php echo $_smarty_tpl->tpl_vars['toplamKullanici']->value;?>
</span><br />Kullanıcı</div>
				<div class="col-sm-4 col-xs-4 icon"><i class="fa fa-user"></i></div>
			</div>
			<div class="alt_kisim">
				<div class="col-sm-8 col-xs-8">Bir Önceki Yıla Göre</div>
				<div class="col-sm-4 col-xs-4 solayasla"><i class="fa fa-arrow-up"></i></div>
			</div>
		</div>
	</div>
</div>
<div class="clear"></div>
<section class="panel ana_istatistik">
	<header class="panel-heading">
	Ençok Satılan Ürünler <span class="sagaYasla"><span class="siyah">Müşeriler</span> <span class="kirmizi">Ürünler</span></span>
	</header>
	<div class="panel-body">
	<canvas id="linechart" ></canvas>
	</div>
</section>
<?php echo '<script'; ?>
 type="text/javascript">
    $(function() {
                "use strict";
                //BAR CHART
                var data = {
                    labels: ["Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül","Ekim", "Kasım", "Aralık"],
                    datasets: [
                        {
                            label: "Müşteriler",
                            fillColor: "rgba(220,220,220,0.2)",
                            strokeColor: "rgba(0,0,0,0.5)",
                            pointColor: "rgba(0,0,0,0.5)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(0,0,0,0.5)",
                            data: [<?php echo $_smarty_tpl->tpl_vars['musteriOcak']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['musteriSubat']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['musteriMart']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['musteriNisan']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['musteriMayis']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['musteriHaziran']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['musteriTemmuz']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['musteriAgustos']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['musteriEylul']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['musteriEkim']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['musteriKasim']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['musteriAralik']->value;?>
]
                        },
                        {
                            label: "Ürünler",
                            fillColor: "rgba(219,0,40,0.2)",
                            strokeColor: "rgba(219,0,40,1)",
                            pointColor: "rgba(219,0,40,0.5)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(219,0,40,1)",
                            data: [<?php echo $_smarty_tpl->tpl_vars['urunOcak']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['urunSubat']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['urunMart']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['urunNisan']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['urunMayis']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['urunHaziran']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['urunTemmuz']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['urunAgustos']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['urunEylul']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['urunEkim']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['urunKasim']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['urunAralik']->value;?>
]
                        }
                    ]
                };
            new Chart(document.getElementById("linechart").getContext("2d")).Line(data,{
                responsive : true,
                maintainAspectRatio: false,
            });

            });
            // Chart.defaults.global.responsive = true;
<?php echo '</script'; ?>
>
<div class="row">
	<div class="col-sm-6">
		<div class="panel">
			<div class="panel-heading">Son Müşteriler</div>
			<div class="panel-body">
				<ul>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['musteriler']->value, 'musteri', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['musteri']->value) {
?>
						<li class="urun<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
musteri/<?php echo $_smarty_tpl->tpl_vars['musteri']->value['id_musteri'];?>
"><?php echo $_smarty_tpl->tpl_vars['musteri']->value['musteri_ad'];?>
</a></li>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				</ul>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="panel">
			<div class="panel-heading">Son Ürünler</div>
			<div class="panel-body">
				<ul>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['urunler']->value, 'urun', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['urun']->value) {
?>
						<li class="urun<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" data-baslik="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urun']->value['musteri_ad'], ENT_QUOTES, 'UTF-8', true);?>
"><a onClick="urunGoster(<?php echo $_smarty_tpl->tpl_vars['urun']->value['id_urun'];?>
)" data-toggle="modal" data-target="#pencereGoster"><?php echo $_smarty_tpl->tpl_vars['urun']->value['urun_adi'];?>
 <span class="sagaYasla"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['urun']->value['garanti_bitis'],"%d.%m.%Y");?>
</span></a></li>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				</ul>
			</div>
		</div>
	</div>
</div><?php }
}
