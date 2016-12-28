<?php
require_once(dirname(__FILE__).'/veritabani.php');
require_once(dirname(__FILE__).'/fonksiyonlar.php');
require_once(dirname(__FILE__).'/veritabaniIslemleri.php');
require_once(dirname(__FILE__).'/smtp.php');
$tema = VT::ayarlar('Tema');
$siteAd = VT::ayarlar('SiteAd');
$SiteAciklama = VT::ayarlar('SiteAciklama');
$dizin = VT::ayarlar('Dizin');

/** Site Dizinler **/
$DOCUMENT_ROOT ='';
$PHP_SELF ='';
define('_THEME_REEL_DIR_', $dizin.'gorunum/'.$tema.'/');
define('_BASE_DIR_', str_replace($DOCUMENT_ROOT, "", dirname($PHP_SELF)));
define('_BASE_IMG_DIR_', _BASE_DIR_.'img/');
define('_BASE_JS_DIR_', _BASE_DIR_.'js/');
define('_THEME_DIR_', _BASE_DIR_.'gorunum/');
define('_THEME_BASE_DIR_', _THEME_DIR_.$tema.'/');
//define('_THEME_CSS_DIR_', _THEME_BASE_DIR_.'css/');
define('_THEME_CSS_DIR_', _THEME_REEL_DIR_.'css/');
define('_THEME_JS_DIR_', _THEME_REEL_DIR_.'js/');
define('_THEME_IMG_DIR_', _THEME_BASE_DIR_.'img/');


/** Haydi Bismillah **/
date_default_timezone_set('Europe/Istanbul');
$betik_zd = date_default_timezone_get();
require_once(dirname(__FILE__).'/../libs/Smarty.class.php');

$smarty = new Smarty;
//$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = false;
$smarty->cache_lifetime = 0;


$VT = new VT();
require_once(dirname(__FILE__).'/sayfa.php');
require_once(dirname(__FILE__).'/../klaslar/kategori.php');
require_once(dirname(__FILE__).'/saat.php');
require_once(dirname(__FILE__).'/kullanici.php');
$sayfa = new Sayfa();


/** Dizinleri Kullan **/
$leftGoster = 1;
$smarty->assign(array(
	'base_dir' => $dizin,
	'base_img' => _BASE_IMG_DIR_,
	'base_js' => _BASE_JS_DIR_,
	'tpl_dir' =>  _THEME_BASE_DIR_,
	'css_dir' =>  _THEME_CSS_DIR_,
	'js_dir' =>  _THEME_JS_DIR_,
	'img_dir' =>  _THEME_IMG_DIR_,
	'site_adi' =>  $siteAd,
	'sayfa_adi' =>  '',
	'leftGoster' =>  $leftGoster,
	'rightGoster' =>  1,
	'css' =>  '',
	'metaAciklama' => $SiteAciklama,
));
