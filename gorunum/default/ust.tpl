<!DOCTYPE html>
<html itemscope="" itemtype="http://schema.org/WebPage" lang="tr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="{$metaAciklama|escape:'html':'UTF-8'}" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{$site_adi|escape:'htmlall':'UTF-8'}</title>
		<link rel="stylesheet" href="{$css_dir}bootstrap.min.css">
		<link rel="stylesheet" href="{$css_dir}font-awesome.min.css">
		<link rel="stylesheet" href="{$css_dir}style.css">
		<link rel="stylesheet" href="{$css_dir}jquery.ambiance.css">
		{if $css}
		<link rel="stylesheet" href="{$css_dir}{$css}">
		{/if}
		<link rel="stylesheet" href="{$css_dir}animate.css">
		<script src="{$js_dir}jquery.min.js"></script>
		<script src="{$js_dir}owl.carousel.min.js"></script>
		<script src="{$js_dir}jquery.ambiance.js"></script>
		{if $js}
		<script src="{$js_dir}{$js}"></script>
		{/if}
		{if $sayfaAdi == 'musteriler'}
			<script type="text/javascript" src="http://www.jquery-az.com/boots/js/bootstrap-filestyle.min.js"> </script>
		{/if}
	</head>
	<body id="{$sayfaAdi|escape:'htmlall':'UTF-8'}">
		<header id="header">
			<div class="col-sm-9 hidden-xs">
				<a href="{$base_dir}" class="logo">Garanti Takip</a>
			</div>
		{if $sayfaAdi != 'girisyap'}
			<div class="ustMenuArama col-sm-3 col-xs-12">
				<div class="aramaBox sagaYasla">
					<form class="form-inline" action="{$base_dir}ara/" method="post">
						  <div class="form-group">
							<input type="text" class="form-control" id="araKutu" name="kelime" placeholder="Arama yap.." autocomplete="off" autofocus>
						  </div>
						  <div class="aramabolum">
						  <div>
							<div></div>
						  </div>
						  <div><div><div><input type="hidden" name="aramatkn" value="{$aramaToken|escape:'htmlall':'UTF-8'}"/></div></div></div>
						  </div>
						  <button type="submit" class="btn btn-default sagaYasla" name="arama" value="1">Ara</button>
					</form>
				</div>
			</div>
		{/if}
		</header>
		<div id="site" class="container-fluid">
		<div id="ustmenu" class="col-sm-12">
			<div class="gizle">
				<a class="pointer" onClick="menuGoster()"><i class="fa fa-bars" aria-hidden="true"></i></a> <a href="{$base_dir}">Garanti Takip</a>
			</div>
		</div>
		{if $left != 0}
			<div id="sol" class="col-sm-3">
				<div class="kullaniciBolumu">
					<div class="kullaciresmi">
							<img src="{$base_dir}img/{if $kullaniciResim}{$kullaniciID}{else}/musteri/kullanici-bos{/if}.jpg" alt="" id="kullaniciResmi" width="150" height="150" />
						<div class="dropdown">
							  <button class="dropdown-toggle" type="button" id="statuDegistir" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								{$kullaniciBilgi}
								<span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu" aria-labelledby="statuDegistir">
								<li><a href="{$base_dir}profilim/">Profilim</a></li>
								<li><a href="{$base_dir}ayarlar/">Ayarlar</a></li>
								<li><a href="{$base_dir}ayarlar/cikis">Çıkış Yap</a></li>
							  </ul>
						</div>
					</div>
				</div>
				<div class="kategoriler">
					<h4 class="baslik">KATEGORİLER</h4>
					<ul>
						<li><a href="{$base_dir}"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> İstatistikler</a></li>
						{foreach $kategoriler as $kategori}
							<li><a href="{$base_dir}{LinkYapisi::kategori($kategori.id_kategori, $kategori.kategori_seo)}" title="{$kategori.kategori_adi|escape:'html':'UTF-8'}"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> {$kategori.kategori_adi|escape:'html':'UTF-8'}</a></li>
						{/foreach}
					</ul>
					<h4 class="baslik">LINKLER</h4>
					<ul>
						<li><a href="{$base_dir}musteriler/"><i class="fa fa-user" aria-hidden="true"></i> Müşeteriler</a></li>
					</ul>
				</div>
			</div>
			{/if}
			<div id="{if $left != 0}sag{else}orta{/if}" class="col-sm-9">
			
			