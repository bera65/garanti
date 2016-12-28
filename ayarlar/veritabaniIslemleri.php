<?php

class VT
{
	public static function yaz($tablo,  $degerler) {
		global $db;
		$prep = array();
		foreach($degerler as $k => $v ) {
			$prep[':'.$k] = $v;
		}
		$sth = $db->prepare("INSERT INTO ".$tablo." ( " . implode(', ',array_keys($degerler)) . ") VALUES (" . implode(', ',array_keys($prep)) . ")");
		$res = $sth->execute($prep);
		return $db->lastInsertId();
	}
	public static function duzenle($tablo,  $degerler, $kosul) {
		global $db;
		$prep = array();
		foreach($degerler as $k => $v ) {
			$prep[$k.' = :'.$k] = $v;
		}
		
		$sth = $db->prepare("UPDATE ".$tablo." SET ".  implode(', ',array_keys($prep)) ."  WHERE ".$kosul."");
		$res = $sth->execute($degerler);
	}
	public static function getir($tablo,  $kosul) {
		global $db;
		$bilgiler = $db->query('SELECT * FROM '.$tablo.' WHERE '.$kosul.'', PDO::FETCH_ASSOC);
		return $bilgiler;
	}
	public static function tekSatirGetir($tablo,  $kosul, $stun) {
		global $db;
		$bilgiler = $db->query('SELECT * FROM '.$tablo.' WHERE '.$kosul.' LIMIT 1', PDO::FETCH_ASSOC);
		foreach ($bilgiler as $deger)
		{
			return $deger[$stun];
		}
	}
	public static function tekSatirTopla($tablo,  $kosul, $stun) {
		global $db;
		$bilgiler = $db->query('SELECT COUNT('.$stun.') as Toplam FROM '.$tablo.' WHERE '.$kosul.'', PDO::FETCH_ASSOC);
		foreach ($bilgiler as $deger)
		{
			return $deger['Toplam'];
		}
	}
	public static function ikiliGetir($tablo_ilk, $tablo_iki, $ilk_deger, $ikinci_deger, $kosul_ilk, $kosul_iki) {
		global $db;
		$bilgiler = $db->query('SELECT * FROM '.$tablo_ilk.' INNER JOIN '.$tablo_iki.' ON '.$tablo_ilk.'.'.$ilk_deger.' = '.$tablo_iki.'.'.$ikinci_deger.' WHERE '.$tablo_ilk.'.'.$kosul_ilk.' AND '.$tablo_iki.'.'.$kosul_iki.'', PDO::FETCH_ASSOC);
		return $bilgiler;
	}
	public static function ucluGetir($tablo_ilk, $tablo_iki,$tablo_uc,  $ilk_deger, $ikinci_deger,$ucuncu_deger, $dorduncu_deger, $kosul) {
		global $db;
		$bilgiler = $db->query('
			SELECT * FROM '.$tablo_ilk.' 
			INNER JOIN '.$tablo_iki.' ON '.$tablo_ilk.'.'.$ilk_deger.' = '.$tablo_iki.'.'.$ikinci_deger.' 
			INNER JOIN '.$tablo_uc.' ON '.$tablo_iki.'.'.$ucuncu_deger.' = '.$tablo_uc.'.'.$dorduncu_deger.' 
			WHERE '.$kosul.'
		', PDO::FETCH_ASSOC);
		return $bilgiler;
	}
	public static function varmi($tablo,  $kosul) {
		global $db;
		$bilgiler = $db->query('SELECT * FROM '.$tablo.' WHERE '.$kosul.'', PDO::FETCH_ASSOC);
		if ($bilgiler->fetchColumn())
			return 1;
		else
			return 0;
	}
	public static function sil($tablo,  $kosul) {
		global $db;
		$bilgiler = $db->query('DELETE FROM '.$tablo.' WHERE '.$kosul.' LIMIT 1', PDO::FETCH_ASSOC);
		return $bilgiler;
	}
	public static function ayarlar($veri) {
		global $db;
		$veri = Denetle::taglarisil($veri);
		$degeriGetir = $db->query('SELECT * FROM ayarlar WHERE veri = "'.$veri.'" LIMIT 1', PDO::FETCH_ASSOC);
		foreach ($degeriGetir as $deger)
		{
			return $deger['deger'];
		}
	}
	public static function garantiVarmi($tarih) {
		$bugun = strtotime(date('Y-m-d'));
		$garanti = strtotime($tarih);
		if ($bugun < $garanti)
			return 'garantivar';
		else
			return 'garantiyok';
	}
}