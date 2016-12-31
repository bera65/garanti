<?php
	$sayfa = 'arama';
	require_once(dirname(__FILE__).'/ayarlar/ayarlar.php');
	
	if (Denetle::taglarisil(Denetle::degerGetir('musteriisim')))
	{
		$musteri = Denetle::taglarisil(Denetle::degerGetir('musteriisim'));
		if (Denetle::isimmi($musteri))
		{
			$musteriBilgi = $VT->getir('musteriler', ' musteri_ad LIKE "%' . $musteri . '%"');
			if ($musteriBilgi)
			{
				echo '<ul>';
					foreach ( $musteriBilgi as $row ){
						echo '<li onclick="yapistir(\''.str_replace("'", "\'",$row['musteri_ad']).'\')">'.$row['musteri_ad'].'</li>';
					}
				echo '</ul>';
			}
		}
	}
	else if (Denetle::taglarisil(Denetle::degerGetir('urun')))
	{
		$urun = Denetle::taglarisil(Denetle::degerGetir('urun'));
		$inputid = Denetle::taglarisil(Denetle::degerGetir('inputid'));
		if (Denetle::urunadimi($urun) AND Denetle::urunadimi($inputid))
		{
			$urunBilgi = $VT->getir('urun_detay', ' urun_adi LIKE "%' . $urun . '%"');
			if ($urunBilgi)
			{
				echo '<ul>';
					foreach ( $urunBilgi as $row ){
						echo '<li onclick="uyapistir(\''.str_replace("'", "\'",$row['urun_adi']).'\', \''.$inputid.'\')">'.$row['urun_adi'].'</li>';
					}
				echo '</ul>';
			}
		}
	}
	else if (Denetle::sayisal(Denetle::degerGetir('arama')) AND Denetle::md5Mi(Denetle::degerGetir('aramatkn')) AND Denetle::strlen(Denetle::degerGetir('kelime')) > 1)
	{
		$hata = '';
		$urunlerGetir = '';
		$atoken = Denetle::degerGetir('aramatkn');
		if (Denetle::urunadimi(Denetle::degerGetir('kelime')) AND $aramaToken == $atoken)
		{
			$kelime = Denetle::taglarisil(Denetle::degerGetir('kelime'));
			if ($VT->varmi('urun_detay', 'urun_adi LIKE "%'.$kelime.'%" OR urun_sn LIKE "%'.$kelime.'%"') OR $VT->varmi('musteriler', 'musteri_ad LIKE "%'.$kelime.'%"'))
			{
				$urunlerGetir = $VT->ucluGetir('urun_detay', 'urunler', 'musteriler', 'id_urun',  'id_urun', 'id_musteri', 'id_musteri', 'urun_adi LIKE "%'.$kelime.'%" OR urun_sn LIKE "%'.$kelime.'%" OR musteriler.musteri_ad LIKE "%'.$kelime.'%" ORDER BY urunler.id_urun DESC');
			}
			else
			{
				$kelime = 'bos';
				$hata = 'Sonuc Bulunamadı';
			}

		}
		else
		{
			$kelime = 'bos';
			$hata = 'Sonuc Bulunamadı';
		}
		aramaTokenOlustur();
		$smarty->assign(array(
			'kelime' => $kelime,
			'hata' => $hata,
			'urunler' => $urunlerGetir,
			'aramaToken' => $_SESSION['aramaToken'],
		));
		$sayfa->yapi('ara', 'ara.css');
	}
	else
		header('Location: '.LinkYapisi::php('sayfa-bulunamadi'));
