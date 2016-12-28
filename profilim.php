<?php
	$sayfa = 'profilim';
	require_once(dirname(__FILE__).'/ayarlar/ayarlar.php');
	$sonuc = 0;
	
	if (Denetle::degerGetir('eskikullanici') AND Denetle::degerGetir('kullaniciadiDuzenle') AND Denetle::degerGetir('epostaDuzenle') AND Denetle::degerGetir('tokenDuzenle'))
	{
		$eskikullanici = Denetle::degerGetir('eskikullanici');
		$kullanici = Denetle::degerGetir('kullaniciadiDuzenle');
		$eposta = Denetle::degerGetir('epostaDuzenle');
		$token = Denetle::degerGetir('tokenDuzenle');
		$duzenle = profilDuzenle($eskikullanici, $kullanici,$eposta, $token);
	}
	if (Denetle::degerGetir('eskisifre') AND Denetle::degerGetir('yenisifre') AND Denetle::degerGetir('yenisifretekrar') AND Denetle::degerGetir('token') AND Denetle::degerGetir('kullanici'))
	{
		$eskisifre = md5(Denetle::degerGetir('eskisifre'));
		$yenisifre = md5(Denetle::degerGetir('yenisifre'));
		$yenisifretekrar = md5(Denetle::degerGetir('yenisifretekrar'));
		$token = Denetle::degerGetir('token');
		$kullanici = Denetle::degerGetir('kullanici');
		$sonuc = sifreDegistir($kullanici, $eskisifre, $yenisifre,$yenisifretekrar, $token);
	}
	$smarty->assign(array('sonuc'=> $sonuc));
	/** SAYFA OLUŞTUR **/
	$sayfa->yapi('profilim', 'giris-yap.css', 'giris.js');
