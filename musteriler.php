<?php
	$sayfa = 'musteriler';
	require_once(dirname(__FILE__).'/ayarlar/ayarlar.php');
	function kacurunuvar($musteri)
	{
		global $db;
		$kacUrunuVar = $db->query('
		SELECT COUNT(urun_detay.urun_adi) AS toplam FROM urun_detay 
		INNER JOIN urunler ON urun_detay.id_urun = urunler.id_urun
		WHERE urunler.id_musteri = '.$musteri.' ', PDO::FETCH_ASSOC);

		foreach ($kacUrunuVar as $kv)
		{
			return '<b>'.$kv['toplam'].'</b> adet ürün almış';
		}
	}
	if(Denetle::degerGetir('sonid'))
	{
		$sonid = Denetle::kodlarisil(Denetle::degerGetir('sonid'));
		if (Denetle::kullanici($sonid))
		{
			sleep(1);
			$sonidBul = explode('_' , $sonid, 2);
			$basla = $sonidBul[1];
			$kosul = 'id_musteri = '.Denetle::taglarisil($basla-1);
			if(Denetle::sayisal($basla) AND VT::varmi('musteriler', $kosul))
			{
				$musteriler = $VT->getir('musteriler', ' aktif = 1 AND id_musteri < '.$basla.' ORDER BY id_musteri DESC LIMIT 20');
				$smarty->assign(array(
					'musteriler' => $musteriler,
					'baslik' => 0,
				));
				$smarty->display(_THEME_BASE_DIR_.'musteriler.tpl');
			}
		}
	}
	else if(Denetle::degerGetir('idmusteri'))
	{
		if (Denetle::sayisal(Denetle::degerGetir('idmusteri')))
		{
			$musteriID = (int)Denetle::taglarisil(Denetle::degerGetir('idmusteri'));
			if (VT::varmi('musteriler', 'id_musteri = '.$musteriID.'') AND $musteriID > 0)
			{
				$urunler = $VT->ikiliGetir('urunler', 'urun_detay', 'id_urun', 'id_urun', 'id_musteri = '.$musteriID.'', 'aktif = 1');
				$musteriAdi = $VT->tekSatirGetir('musteriler',  'id_musteri = '.$musteriID.'', 'musteri_ad');
				$urunSayisi = $VT->tekSatirTopla('urunler',  'id_musteri = '.$musteriID.'', 'id_urun');
				$musteri = $VT->getir('musteriler',  'id_musteri = '.$musteriID.'');
				$smarty->assign(array('urunler' => $urunler, 'musteriAdi' => $musteriAdi, 'musteri' => $musteri, 'urunSayisi' => $urunSayisi ));
				$sayfa->yapi('musteriler-detay', 'musteri.css', 'musteri.js');
			}
		}
		else
			header('Location: '.$dizin.'sayfa-bulunamadi.php');
	}
	else if(Denetle::degerGetir('duzenle'))
	{
		if (Denetle::sayisal(Denetle::degerGetir('duzenle')))
		{
			$musteriID = (int)Denetle::taglarisil(Denetle::degerGetir('duzenle'));
			if (VT::varmi('musteriler', 'id_musteri = '.$musteriID.'') AND $musteriID > 0)
			{
				$musteriAdi = $VT->tekSatirGetir('musteriler',  'id_musteri = '.$musteriID.'', 'musteri_ad');
				$musteriBilgi = $VT->getir('musteriler',  'id_musteri = '.$musteriID.' LIMIT 1');
				$smarty->assign(array( 'musteriAdi' => $musteriAdi, 'musteriBilgi' => $musteriBilgi));
				$sayfa->yapi('musteriler-duzenle', 'musteri.css', 'musteri.js');
			}
		}
		else
			header('Location: '.$dizin.'sayfa-bulunamadi.php');
	}
	else if (Denetle::sayisal(Denetle::degerGetir('urunsil')) AND Denetle::strlen(Denetle::degerGetir('numara')) > 10)
	{
		$numara = Denetle::degerGetir('numara');
		$tarih =  Denetle::tarihiCikar($numara);
		$id = (int)Denetle::idCikar($numara);
		if ($VT->varmi('musteriler', 'id_musteri = '.$id.' AND kayit_tarihi = "'.$tarih.'"'))
		{
			$urun_id = $VT->tekSatirGetir('urunler', 'id_musteri = '.$id.'', 'id_urun');
			$sil = $VT->sil('urunler', 'id_urun = '.$urun_id.'');
			$sil = $VT->sil('urun_detay', 'id_urun = '.$urun_id.'');
			$sil = $VT->sil('musteriler', 'id_musteri = '.$id.'');
			header('Location: '.$dizin.'musteriler/');
		}
	}
	else if (Denetle::sayisal(Denetle::degerGetir('musteriekle')) AND Denetle::strlen(Denetle::degerGetir('musteriekle')) == 1 AND Denetle::isimmi(Denetle::degerGetir('musteriad')))
	{
/*** MUSTERİ EKLE ****/
		$musteriad = Denetle::taglarisil(Denetle::degerGetir('musteriad'));
		$musterino = (int)Denetle::taglarisil(Denetle::degerGetir('musterino'));
		$adres = Denetle::degerGetir('adres');
		$telefon = Denetle::degerGetir('telefon');
		$aciklama = Denetle::degerGetir('aciklama');
		$eposta = Denetle::degerGetir('eposta');
		
/*** IFLER ***/		
		if (isset($_FILES["resim"]))
			$mresmi = 1;
		else
			$mresmi = 0;
		
		$eposta = (Denetle::eposta($eposta) ? $eposta : '');
		$adres = (Denetle::htmlTemizle($adres) ? $adres : '');
		$aciklama = (Denetle::htmlTemizle($aciklama) ? $aciklama : '');
		$telefon = (Denetle::sayisal($telefon) ? $telefon : '');
		$musterino = (Denetle::sayisal($musterino) ? $musterino : 0);

		$deger = array(
			'musteri_ad' => $musteriad,
			'adres' => $adres,
			'telefon' => $telefon,
			'eposta' => $eposta,
			'aciklama' => $aciklama,
			'resim' => $mresmi,
		);
		if ($VT->varmi('musteriler', 'id_musteri = "'. $musterino.'"'))
		{
			$duzenle 		= $VT->duzenle('musteriler', $deger,  'id_musteri = "'. $musterino.'"');
			$musteriID 	= $VT->tekSatirGetir('musteriler', 'musteri_ad = "'. $musteriad.'"', 'id_musteri');
		}
		else
			$musteriID = $VT->yaz('musteriler', $deger );
		
		if (isset($_FILES['resim']))
		{
			require_once(dirname(__FILE__).'/klaslar/class.upload.php');
			$rtipi=$_FILES["resim"]["type"];
				if ((($rtipi=="image/jpeg") OR ($rtipi=="image/gif") OR ($rtipi=="image/png")))
				{
						$upload = new Upload($_FILES["resim"]);
						if($upload->uploaded)
						{
							$isim = $musteriID;
							$upload->image_resize          = true;
							$upload->image_ratio_fill      = true;
							$upload->file_overwrite 	   = true;
							$upload->image_x               = 200;
							$upload->image_y               = 200;
							$upload->image_convert         = 'jpg';
						}
					$upload->file_new_name_body = $isim;
					$upload->Process('./img/musteri/');
				}
		}
		header('Location: '.$dizin.'musteriler/');
	}
	else
	{
		$musteriler = $VT->getir('musteriler', ' aktif = 1 ORDER BY id_musteri DESC LIMIT 20');
		$smarty->assign(array(
			'musteriler' => $musteriler,
			'baslik' => 1,
		));
		$sayfa->yapi('musteriler', 'musteri.css', 'musteri.js');
	}