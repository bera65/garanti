<?php
	$hata = '';
	$basarili = 0;
	function  urunsat($musteriad, $kategori, $satistarihi,  $garantisuresi, $urunler, $serinolar, $aciklama, $urunno = false, $detay = false)
	{
		
		global $VT;
		$musteriad = Denetle::taglarisil($musteriad);
		$kategori = (int)Denetle::taglarisil($kategori);
		$satistarihi = Denetle::taglarisil($satistarihi);
		$garantisuresi = (int)Denetle::taglarisil($garantisuresi);
		$urunler = Denetle::taglarisil( $urunler);
		$detay = Denetle::taglarisil( $urunler);
		$serinolar = Denetle::taglarisil($serinolar);
		$aciklama = Denetle::taglarisil($aciklama);
		$urunsayisi = count($urunler);
	//echo $musteriad.' - '.$kategori.' - '.$satistarihi.' - '.$garantisuresi.' - '.$aciklama;
		$tarih = date('Y-m-d',strtotime($satistarihi) );
		$garantibitis = date('Y-m-d', strtotime("+".$garantisuresi." months", strtotime($satistarihi)));
		$simdi =  date('Y-m-d H:i:s');
		
		
/*** BU MÜŞTERİ VARMI ***/
		$varmi = $VT->varmi('musteriler',  'musteri_ad = "'.$musteriad.'"');
		if ($varmi)
		{
			$musteriID = $VT->tekSatirGetir('musteriler',   'musteri_ad = "'.$musteriad.'"', 'id_musteri');
		}
		else
		{
			$deger = array(
				'musteri_ad' => $musteriad,
			);
			$musteriID = $VT->yaz('musteriler', $deger );
		}
		
	/**** URUN EKLE ***/
		$degerler = array(
			'id_musteri' => $musteriID,
			'satis_tarihi' => $tarih,
			'garanti_bitis' => $garantibitis,
			'urun_aciklama' => $aciklama,
			'id_kategori' => $kategori
		);
		if ($urunno)
		{
			$sonId = $VT->duzenle('urunler', $degerler, 'id_urun = '.$urunno.'' );
			$urunnoo = $urunno;
		}
		else
			$urunnoo = $VT->yaz('urunler', $degerler );
	/*** URUN DETAY ***/
		for($a=0; $a < $urunsayisi; $a++)
		{
			$degerler = array(
				'id_urun' => $urunnoo,
				'urun_adi' => $urunler[$a],
				'urun_sn' => $serinolar[$a]
			);
			$urunVarmi =  $VT->varmi('urun_detay',  'urun_adi = "'.$urunler[$a].'" AND urun_sn = "'.$serinolar[$a].'"');
			if ($urunVarmi)
			{
				$hata = 'Bu ürün daha önceden eklenmiş <br/> Ürün:'.$urunler[$a].' <br/> SN: '.$serinolar[$a].'';
				return $hata;
			}
			else
			{
				if ($urunno)
				{
					$sonId = $VT->duzenle('urun_detay', $degerler, 'id_urun_detay = '.$detay[$a].' ' );
				}
				else
					$sonUrunid = $VT->yaz('urun_detay', $degerler );
			}
			$basarili = 1;
		}
		return $basarili;
	}
	$kategoriler = $VT->getir('kategoriler','aktif = 1');
	$smarty->assign(array('kategoriler' => $kategoriler, 'basarili' => $basarili, 'hata' => $hata));