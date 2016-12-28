<?php
class Sayfa
{
	
	/** SAYFA YAPISI **/
	public static function yapi($sayfaAdi, $css = false, $js = false, $left = 1)
	{
	   global $smarty;
	   if ($css)
		   $css = $css;
	   if ($js)
		   $js = $js;
	   if ($left == 0)
		   $left = 0;
	   else
		   $left = 1;

	   $smarty->assign(array(
			'sayfaAdi' => $sayfaAdi,
			'css' => $css,
			'js' => $js,
			'left' => $left,
		));
		$smarty->display(_THEME_BASE_DIR_.'ust.tpl');
		$smarty->display(_THEME_BASE_DIR_.$sayfaAdi.'.tpl');
		$smarty->display(_THEME_BASE_DIR_.'alt.tpl');
	}
}
class LinkYapisi
{
	public static function sayfa($kategori, $id_sayfa, $sayfa_seo) {
		global $db;
		global $VT;
		$duzgunUrl= $VT->ayarlar('DuzgunUrl');
		if ($duzgunUrl == 1)
			return $kategori.'/'.$id_sayfa.'_'.$sayfa_seo.'.html';
		else
			return 'sayfa.php?sayfa='.$id_sayfa;
	}
	public static function kategori($id_kategori, $kategori_seo) {
		global $db;
		global $VT;
		$duzgunUrl= $VT->ayarlar('DuzgunUrl');
		if ($duzgunUrl == 1)
			return $id_kategori.'_'.$kategori_seo;
		else
			return 'kategoriler.php?kategori='.$id_kategori;
	}
}
?>