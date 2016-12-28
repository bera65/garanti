<?php
	$buyil =date('Y');
	$aylar = array("Ocak", "Subat", "Mart", "Nisan", "Mayis", "Haziran", "Temmuz", "Agustos", "Eylul","Ekim", "Kasim", "Aralik");
	$numara = 1;
	for ($ay = 0; $ay<12; $ay++)
	{
		$smarty->assign(array(
			'musteri'.$aylar[$ay] => $VT->tekSatirTopla('musteriler', 'MONTH(kayit_tarihi) = '.$numara.' AND YEAR(kayit_tarihi) = '.$buyil.'', 'id_musteri'),
		));
		$numara++;
	}
	$numara = 1;
	for ($ay = 0; $ay<12; $ay++)
	{
		$smarty->assign(array(
			'urun'.$aylar[$ay] => $VT->tekSatirTopla('urunler', 'MONTH(satis_tarihi) = '.$numara.' AND YEAR(satis_tarihi) = '.$buyil.'', 'id_urun'),
		));
		$numara++;
	}
	$smarty->assign(array(
		'toplamMusteri' => $VT->tekSatirTopla('musteriler', 'aktif = 1', 'id_musteri'),
		'toplamKullanici' => $VT->tekSatirTopla('kullanicilar', 'aktif = 1', 'id_kullanici'),
		'toplamUrun' => $VT->tekSatirTopla('urun_detay', 'aktif = 1', 'id_urun_detay'),
		'musteriler' => $VT->getir('musteriler', 'aktif = 1 ORDER BY id_musteri DESC LIMIT 10'),
		'urunler' => $VT->ucluGetir('musteriler', 'urunler','urun_detay', 'id_musteri','id_musteri','id_urun', 'id_urun', 'urun_detay.aktif = 1 ORDER BY duzenlenme_tarihi DESC LIMIT 10'),
	));