<?php
	$sayfa = 'girisyap';
	require_once(dirname(__FILE__).'/ayarlar/ayarlar.php');
	$sonuc = 0;
	if (Denetle::degerGetir('kullanici') AND Denetle::degerGetir('sifre') AND Denetle::degerGetir('token'))
	{
		$kullanici = Denetle::degerGetir('kullanici');
		$parola = md5(Denetle::degerGetir('sifre'));
		$token = Denetle::degerGetir('token');
		$sonuc = girisYap($kullanici,$parola,$token);
	}
	if (Denetle::degerGetir('eposta') AND Denetle::degerGetir('token'))
	{
		$eposta = Denetle::degerGetir('eposta');
		$token = Denetle::degerGetir('token');
		$sonuc = sifreHatirlat($eposta,$token);
		girisTokenOlustur();
	}
	$smarty->assign(array(
			'hata' => $sonuc,
	));
	$sayfa->yapi('girisyap', 'giris-yap.css', 'giris.js', $left = 0);