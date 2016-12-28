<?php
	$sayfa = 'sayfa';
	require_once(dirname(__FILE__).'/ayarlar/ayarlar.php');
	
	if (Denetle::taglarisil(Denetle::degerGetir('sayfabos')))
	{
		$urunid = Denetle::taglarisil(Denetle::degerGetir('sayfabos'));
		if (Denetle::sayisal($urunid))
		{
			if ($VT->varmi('urunler', 'id_urun = '.$urunid.''))
			{
				$urunler = $VT->ucluGetir('urun_detay', 'urunler', 'musteriler', 'id_urun',  'id_urun', 'id_musteri', 'id_musteri', 'urunler.id_urun = '.$urunid.' LIMIT 1');
				$gruplar = $VT->getir('urun_detay', 'id_urun = '.$urunid.' ORDER BY id_urun_detay');
				$musteri = $VT->tekSatirGetir('urunler',' id_urun = '.$urunid.'', 'id_musteri');
				$kacUrunuVar = $db->query('
					SELECT COUNT(urun_detay.urun_adi) AS toplam FROM urun_detay 
					INNER JOIN urunler ON urun_detay.id_urun = urunler.id_urun
					WHERE  urunler.id_musteri = "'.$musteri.'"', PDO::FETCH_ASSOC);
				foreach ($kacUrunuVar as $deger)
				{
					$urunSayisi = $deger['toplam'];
				}
				
				$smarty->assign(array('urunler' => $urunler, 'gruplar' => $gruplar, 'urunSayisi' => $urunSayisi));
				$smarty->display(_THEME_BASE_DIR_.'sayfa.tpl');
			}
		}
		else
			header('Location: '.$dizin.'sayfa-bulunamadi.php');
	}
	else if (Denetle::taglarisil(Denetle::degerGetir('duzenle')))
	{
		$duzenle = Denetle::degerGetir('duzenle');
		if (Denetle::sayisal(Denetle::degerGetir('duzenle')) AND $VT->varmi('urunler', 'id_urun = '.$duzenle.''))
		{
			$urunler = $VT->ucluGetir('urun_detay', 'urunler', 'musteriler', 'id_urun',  'id_urun', 'id_musteri', 'id_musteri', 'urunler.id_urun = '.$duzenle.' LIMIT 1');
			$gruplar = $VT->getir('urun_detay', 'id_urun = '.$duzenle.' ORDER BY id_urun_detay');
			$smarty->assign(array('urunler' => $urunler, 'gruplar' => $gruplar, 'duzenle' => $duzenle));
			$sayfa->yapi('sayfa-duzenle', 'sayfa.css', 'sayfa.js');
		}
		else
			header('Location: '.$dizin.'sayfa-bulunamadi.php');
	}
	else if (Denetle::taglarisil(Denetle::degerGetir('urunduzenle')))
	{
		if (Denetle::sayisal(Denetle::degerGetir('urunduzenle')) AND Denetle::sayisal(Denetle::degerGetir('urunno')) AND Denetle::sayisal(Denetle::degerGetir('kategori')))
		{
			$musteriad = Denetle::taglarisil(Denetle::degerGetir('musteri'));
			$kategori =Denetle::degerGetir('kategori');
			$satistarihi =Denetle::degerGetir('satistahiri');
			$garantisuresi = Denetle::degerGetir('garantisuresi');
			$urunler = Denetle::degerGetir('urun');
			$serinolar = Denetle::degerGetir('serino');
			$aciklama = Denetle::degerGetir('aciklama');
			$urunno = Denetle::degerGetir('urunno');
			$detay = Denetle::degerGetir('detay');
			
			$duzenle = urunsat($musteriad, $kategori, $satistarihi,  $garantisuresi, $urunler, $serinolar, $aciklama, $urunno, $detay);
			$musteriID = $VT->tekSatirGetir('musteriler',   'musteri_ad = "'.$musteriad.'"', 'id_musteri');
				header('Location: '.$dizin.'musteriler/'.$musteriID.'');
		}
		else
			header('Location: '.$dizin.'sayfa-bulunamadi.php');
	}
	else if (Denetle::sayisal(Denetle::degerGetir('urunsil')) AND Denetle::strlen(Denetle::degerGetir('numara')) > 10)
	{
		$numara = Denetle::degerGetir('numara');
		$tarih =  Denetle::tarihiCikar($numara);
		$id = (int)Denetle::idCikar($numara);
		if ($VT->varmi('urun_detay', 'id_urun_detay = '.$id.' AND duzenlenme_tarihi = "'.$tarih.'"'))
		{
			$anaUrun = $VT->tekSatirGetir('urun_detay', 'id_urun_detay = '.$id.' AND duzenlenme_tarihi = "'.$tarih.'"', 'id_urun');
			$sil = $VT->sil('urun_detay', 'id_urun_detay = '.$id.' AND duzenlenme_tarihi = "'.$tarih.'"');
			$urun_kaldimi = $VT->varmi('urun_detay', 'id_urun = '.$anaUrun.'');
			if ($urun_kaldimi)
				header('Location: '.$dizin.'duzenle/'.$anaUrun.'');
			else
			{
				$kategori = $VT->tekSatirGetir('urunler', 'id_urun = '.$anaUrun.'', 'id_kategori');
				$kategoriSeo = $VT->tekSatirGetir('kategoriler', 'id_kategori = '.$kategori.'', 'kategori_seo');
				
				$sil = $VT->sil('urunler', 'id_urun = '.$anaUrun.'');
				header('Location: '.$dizin.''.$kategori.'_'.$kategoriSeo.'');
			}
		}
		else if ($VT->varmi('urunler', 'id_urun = '.$id.' AND satis_tarihi = "'.$tarih.'"'))
		{
			$kategori = $VT->tekSatirGetir('urunler', 'id_urun = '.$id.'', 'id_kategori');
			$kategoriSeo = $VT->tekSatirGetir('kategoriler', 'id_kategori = '.$kategori.'', 'kategori_seo');
			
			$sil = $VT->sil('urunler', 'id_urun = '.$id.'');
			$sil = $VT->sil('urun_detay', 'id_urun = '.$id.'');
			header('Location: '.$dizin.''.$kategori.'_'.$kategoriSeo.'');
		}
		else
			header('Location: '.$dizin.'sayfa-bulunamadi.php');
	}
	else
		header('Location: '.$dizin.'sayfa-bulunamadi.php');