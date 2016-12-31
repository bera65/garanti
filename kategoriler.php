<?php
	$sayfa = 'kategori';
	require_once(dirname(__FILE__).'/ayarlar/ayarlar.php');
	if (Denetle::sayisal(Denetle::degerGetir('kategori')))
	{
		$bukategori = Denetle::taglarisil(Denetle::degerGetir('kategori'));
		if ($VT->varmi('kategoriler', 'id_kategori = '.$bukategori.''))
		{
			$kategoriAdi = $VT->tekSatirGetir('kategoriler','id_kategori = '.$bukategori.'', 'kategori_adi');
			$urunlerGetir = $VT->ucluGetir('urun_detay', 'urunler', 'musteriler', 'id_urun',  'id_urun', 'id_musteri', 'id_musteri', ' id_kategori = '.$bukategori.' ORDER BY urunler.id_urun DESC');
			if (Denetle::degerGetir('musteriad') AND Denetle::degerGetir('urun') AND Denetle::degerGetir('serino'))
			{
				$musteriad = Denetle::degerGetir('musteriad');
				$kategori =Denetle::degerGetir('kategori');
				$satistarihi =Denetle::degerGetir('satistarihi');
				$garantisuresi = Denetle::degerGetir('garantisuresi');
				$urunler = Denetle::degerGetir('urun');
				$serinolar = Denetle::degerGetir('serino');
				$aciklama = Denetle::degerGetir('aciklama');
			
				$sonuc = urunsat($musteriad, $kategori, $satistarihi,  $garantisuresi, $urunler, $serinolar, $aciklama);

				if ($sonuc == 1)
					$smarty->assign(array('basarili' => $sonuc));
				else
					$smarty->assign(array('hata' => $sonuc));
			}
			$smarty->assign(array(
				'urunler' => $urunlerGetir,
				'kategoriAdi' => $kategoriAdi,
				));
			/** SAYFA OLUŞTUR **/
			$sayfa->yapi('kategori');
		}
		else
			header('Location: '.LinkYapisi::php('sayfa-bulunamadi'));
	}
	else
		header('Location: '.LinkYapisi::php('sayfa-bulunamadi'));