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
	public static function php($sayfa, $onek = false, $uzanti = false)
	{
		global $dizin;
		if ($uzanti)
			$uzanti = $uzanti;
		if ($onek)
			$onek = $onek;
		
		if (VT::ayarlar('DuzgunUrl') == 1)
			return $dizin.$sayfa.'/'.$uzanti;
		else
		{
			if ($uzanti != false)
			{
				$uzanti = '?'.$onek.'='.$uzanti;
			}
				return $dizin.$sayfa.'.php'.$uzanti;
		}
	}
	public static function sayfa($kategori, $id_sayfa, $sayfa_seo) {
		global $db;
		global $VT;
		$duzgunUrl= $VT->ayarlar('DuzgunUrl');
		if ($duzgunUrl == 1)
			return $kategori.'/'.$id_sayfa.'_'.$sayfa_seo.'.html';
		else
			return 'sayfa.php?sayfa='.$id_sayfa;
	}
	public static function sayfaDuzenle($id_sayfa) {
		global $dizin;
		$duzgunUrl= VT::ayarlar('DuzgunUrl');
		if ($duzgunUrl == 1)
			return $dizin.'duzenle/'.$id_sayfa;
		else
			return $dizin.'sayfa.php?duzenle='.$id_sayfa;
	}
	public static function musteriDuzenle($id_musteri) {
		global $dizin;
		$duzgunUrl= VT::ayarlar('DuzgunUrl');
		if ($duzgunUrl == 1)
			return $dizin.'musteri/'.$id_musteri;
		else
			return $dizin.'musteriler.php?idmusteri='.$id_musteri;
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