<?php
	if (Denetle::gonder('ayarlariGuncelle') AND Denetle::md5mi(Denetle::degerGetir('token')))
	{
		if (Denetle::degerGetir('token') == $girisToken)
		{	
			$ayarlariGetir = $VT->getir('ayarlar','deger <> ""');
			$degerler = array();
			$degerleriki = array();
			foreach ($ayarlariGetir as $getir)
			{
				if (Denetle::urunadimi(Denetle::degerGetir(''.$getir["veri"].'')))
				{
					$deger = Denetle::degerGetir(''.$getir["veri"].'');
					$sql = $db->prepare('UPDATE ayarlar SET deger = "'.$deger.'" WHERE veri = "'.$getir['veri'].'" ');
					$sql->execute();
				}
			}
		}
		header('Location: '.$dizin.'ayarlar/siteayarlari');
	}
	else if (Denetle::gonder('kategoriekle'))
	{
		$kategoriad = Denetle::degerGetir('kategoriad');
		$numara = Denetle::degerGetir('numara');
		$token = Denetle::degerGetir('token');
		if (Denetle::urunadimi($kategoriad) AND Denetle::sayisal($numara) AND Denetle::md5Mi($token))
		{
			if ($token == $girisToken)
			{	
				$degerler = array(
					'kategori_adi' => $kategoriad,
					'kategori_seo' => Denetle::seo($kategoriad),
					'eklenme_tarihi' => date('Y-m-d H:i:s'),
					'grub' => 1,
					'aktif' => 1,
				);
				if ($numara)
				{
					$numara = Denetle::idCikar($numara);
					if ($VT->varmi('kategoriler',  'id_kategori = '.$numara.''))
						$VT->duzenle('kategoriler', $degerler, 'id_kategori = '.$numara.'');
				}
				else
				{
					$VT->yaz('kategoriler', $degerler);
				}
			}
		}
		header('Location: '.$dizin.'ayarlar/kategoriler');
	}
	else if (Denetle::degerGetir('sil'))
	{
		$numara = Denetle::degerGetir('sil');
		$numara = (int)Denetle::idCikar($numara);
		if (VT::varmi('kategoriler',  'id_kategori =  '.$numara.''))
			$VT->sil('kategoriler', 'id_kategori = '.$numara.'');
		echo '
		<script type="text/javascript">
			$(document).ready(function() { 
				$.ambiance({
				message: "Başarıyla Silindi", 
				title: "Başarılı!",
				type: "success",
				timeout: 5.71
				});
			});
		</script>
		<script type="text/javascript">
		window.setTimeout(function(){
				window.location.href = window.location.href;
		 }, 5710);
		</script>
			';
	}
	