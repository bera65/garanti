<?php
	$sayfa = 'anasayfa';
	require_once(dirname(__FILE__).'/ayarlar/ayarlar.php');
	require_once(dirname(__FILE__).'/klaslar/analiz.php');
	
	/** SAYFA OLUŞTUR **/
	$sayfa->yapi('anasayfa', 'anasayfa.css', 'chart.js');
