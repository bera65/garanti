<?php
	$sayfa = 'ayarlar';
	require_once(dirname(__FILE__).'/ayarlar/ayarlar.php');
	require_once(dirname(__FILE__).'/klaslar/ayarGuncelle.php');
	
		$sayfaGetir = Denetle::degerGetir('sayfa');

		if (Denetle::isimmi($sayfaGetir) AND Denetle::degerGetir('sayfa'))
		{
			if ($sayfaGetir == 'siteayarlari')
			{
				$ayarlariGetir = $VT->getir('ayarlar','deger <> ""');
				$smarty->assign(array('ayarlariGetir' => $ayarlariGetir));
			}
			else if ($sayfaGetir == 'kategoriler')
			{
				$kategorilerGetir = $VT->getir('kategoriler','aktif = 1');
				$smarty->assign(array('kategorilerGetir' => $kategorilerGetir));
			}
			else if ($sayfaGetir == 'kullanicilar')
			{
				$ekle = '';
				if (Denetle::degerGetir('kullaniciadi') AND Denetle::degerGetir('eposta') AND Denetle::degerGetir('sifre') AND Denetle::degerGetir('token'))
				{
					$kullanici = Denetle::degerGetir('kullaniciadi');
					$eposta = Denetle::degerGetir('eposta');
					$parola = md5(Denetle::degerGetir('sifre'));
					$token = Denetle::degerGetir('token');
					$admin = Denetle::degerGetir('admin');
					$resim = Denetle::degerGetir('resim');
					$ekle = kullaniciEkle($kullanici,$parola,$eposta,$token, $resim, $admin);
				}
				if (Denetle::degerGetir('kulaniciSil'))
				{
					$numara = Denetle::degerGetir('kulaniciSil');
					$ekle =kullaniciSil($numara);
				}
				$kullanicilarGetir = $VT->getir('kullanicilar','aktif = 1');
				$smarty->assign(array('ekle'=> $ekle, 'kullanicilarGetir'=> $kullanicilarGetir));
			}
			if ($sayfaGetir == 'cikis')
			{
				session_destroy();
				header('Location: '.$dizin.'girisyap/');
			}
			$sayfa->yapi('ayarlar-'.$sayfaGetir.'', NULL, 'ayarlar.js');
		}
		else
			$sayfa->yapi('ayarlar');