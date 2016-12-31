<?php

	function girisYap($kullanici,$parola,$token)
	{
		global $dizin;
		if (Denetle::kullanici($kullanici) AND Denetle::md5Mi($parola) AND Denetle::strlen($kullanici) < 33 AND Denetle::md5Mi($token))
		{
			global $girisToken;
			if ($token == $girisToken)
			{
				$tablo = 'kullanicilar';
				$kosul = 'kullanici_adi = "'.$kullanici.'" AND sifre="'.$parola.'"';
				if (VT::varmi($tablo,  $kosul))
				{
					$bilgiler = VT::getir($tablo,  $kosul);
					foreach ($bilgiler as $bilgi)
					{
						$_SESSION['garanti_kullanici']= $kullanici;
						$_SESSION['garanti_anahtar']= $bilgi['anahtar'];
					}
					header('Location: '.$dizin.'');
				}
				else
					return 1;
			}
			else
				return 1;
		}
		else
			return 1; 
		girisTokenOlustur();
		header('Location: '.$dizin.'');
	}
	function sifreHatirlat($eposta,$token)
	{
		if (Denetle::eposta($eposta) AND Denetle::md5Mi($token))
		{
			global $girisToken;
			if ($token == $girisToken)
			{
				$tablo = 'kullanicilar';
				$kosul = 'eposta = "'.$eposta.'"';
				if (VT::varmi($tablo,  $kosul))
				{
					global $mail;
					$yenisifre = "";
					$karakterler = "5716324890abcdefghijklmnopqrstuvwxyzBUNYAMINEYLUL";
					for($i=0;$i<12;$i++)
					{
						$yenisifre .= $karakterler{rand(0,49)};
					}
					$gecensaat =VT::teksatirGetir($tablo, $kosul, 'sonsifredegisikligi');
					$gecensaat = strtotime($gecensaat);
					$simdi = strtotime(date('Y-m-d H:i:s'));
					$degerler = array(
						'sifre' => md5($yenisifre),
						'sonsifredegisikligi' => date('Y-m-d H:i:s'),
					);
					if(date('i', $simdi-$gecensaat) > 1)
					{
						VT::duzenle($tablo, $degerler, $kosul);
						$mail->AddAddress($eposta, 'Sayin');
						$mail->CharSet = 'UTF-8';
						$mail->Subject = 'Sifre Degisikligi';
						$mail->MsgHTML('Yeni Sifreniz: '.$yenisifre.'');
						if($mail->Send()) {
							return 4;
						} else {
							return 5;
						}
					}
					else
						return 2;
				}
				else
					return 1;
			}
		}
		else
			return 1;
	}
	function kullaniciEkle($kullanici,$parola,$eposta,$token, $resim, $admin)
	{
		if (Denetle::kullanici($kullanici) AND Denetle::eposta($eposta) AND Denetle::md5Mi($parola) AND Denetle::md5Mi($token) AND Denetle::sayisal($admin))
		{
			global $girisToken;
			if ($token == $girisToken)
			{
				$tablo = 'kullanicilar';
				$kosul = 'eposta = "'.$eposta.'" OR kullanici_adi = "'.$kullanici.'"';
				if (VT::varmi($tablo,  $kosul))
					return '<script type="text/javascript">$(document).ready(function() { $.ambiance({ message: "Bu kullanıcı zaten var",  title: "Hata!", type: "error", timeout: 7 }); });</script> <script type="text/javascript">window.setTimeout(function(){ window.location.href = window.location.href; }, 7000);</script>';
				else
				{
					if (isset($_FILES["resim"]))
						$resimvarmi = 1;
					else
						$resimvarmi = 0;
					$anahtar =  md5($kullanici.$parola.'Bera');
					global $db;
					$sth = $db->prepare('INSERT INTO kullanicilar ( kullanici_adi , sifre, anahtar, eposta, admin, resim) VALUES (:kullanici_adi , :sifre, :anahtar, :eposta, :admin, :resim)');
					$insert = $sth->execute(array(
						  "kullanici_adi" => $kullanici,
						  "sifre" =>$parola,
						  "anahtar" => $anahtar,
						  "eposta" => $eposta,
						  "admin" => $admin,
						  "resim" => $resimvarmi,
					));
					$kullaniciID = VT::teksatirGetir('kullanicilar', 'kullanici_adi = "'.$kullanici .'"', 'id_kullanici');
					if (isset($_FILES['resim']))
					{
						require_once(dirname(__FILE__).'/../klaslar/class.upload.php');
						$rtipi=$_FILES["resim"]["type"];
							if ((($rtipi=="image/jpeg") OR ($rtipi=="image/gif") OR ($rtipi=="image/png")))
							{
									$upload = new Upload($_FILES["resim"]);
									if($upload->uploaded)
									{
										$isim = $kullaniciID;
										$upload->image_resize          = true;
										$upload->image_ratio_fill      = true;
										$upload->file_overwrite 	   = true;
										$upload->image_x               		= 200;
										$upload->image_y              		 = 200;
										$upload->image_convert         = 'jpg';
									}
								$upload->file_new_name_body = $isim;
								$upload->Process('./img/');
							}
					}
					return '<script type="text/javascript">$(document).ready(function() { $.ambiance({ message: "Kullanıcı Eklendi",  title: "Başarılı", type: "success", timeout: 7 }); });</script> <script type="text/javascript">window.setTimeout(function(){ window.location.href = window.location.href; }, 7000);</script>';
				}
			}
		}
	}
	function kullaniciSil($numara)
	{
		if (Denetle::sayisal($numara))
		{
			$tarih = Denetle::tarihiCikar($numara);
			$numara = (int)Denetle::idCikar($numara);
			if (VT::varmi('kullanicilar',  'id_kullanici = '.$numara.' AND kayit_tarihi = "'.$tarih.'"'))
			{
				VT::sil('kullanicilar',  'id_kullanici = '.$numara.'');
				return 1;
			}	
			else
			{
				return 0;
				//return '<script type="text/javascript">$(document).ready(function() { $.ambiance({ message: "Bu kullanıcı bulunamadı",  title: "Hata!", type: "error", timeout: 7 }); });</script>';
			}
		}
	}
	function profilDuzenle($eskikullanici, $kullanici,$eposta, $token)
	{
		if (Denetle::kullanici($eskikullanici) AND Denetle::kullanici($kullanici) AND Denetle::eposta($eposta) AND Denetle::md5Mi($token))
		{
			global $girisToken;
			if ($token == $girisToken)
			{

				$tablo = 'kullanicilar';
				$kosul = 'kullanici_adi = "'.$eskikullanici.'"';
				if (VT::varmi($tablo,  $kosul))
				{
					if (isset($_FILES["resim"]))
						$resimvarmi = 1;
					else
						$resimvarmi = 0;

					$degerler = array(
						'kullanici_adi' => $kullanici,
						'eposta' => $eposta,
						'resim' => $resimvarmi,
					);
					VT::duzenle($tablo, $degerler, $kosul);
					$kullaniciID = VT::teksatirGetir('kullanicilar', 'kullanici_adi = "'.$kullanici .'"', 'id_kullanici');
					if (isset($_FILES['resim']))
					{
						require_once(dirname(__FILE__).'/../klaslar/class.upload.php');
						$rtipi=$_FILES["resim"]["type"];
							if ((($rtipi=="image/jpeg") OR ($rtipi=="image/gif") OR ($rtipi=="image/png")))
							{
									$upload = new Upload($_FILES["resim"]);
									if($upload->uploaded)
									{
										$isim = $kullaniciID;
										$upload->image_resize          = true;
										$upload->image_ratio_fill      = true;
										$upload->file_overwrite 	   = true;
										$upload->image_x               		= 200;
										$upload->image_y              		 = 200;
										$upload->image_convert         = 'jpg';
									}
								$upload->file_new_name_body = $isim;
								$upload->Process('./img/');
							}
					}
					session_destroy();
					session_start();
					$kullaniciAnahtar = VT::teksatirGetir('kullanicilar', 'kullanici_adi = "'.$kullanici .'"', 'anahtar');
					$_SESSION['garanti_kullanici']= $kullanici;
					$_SESSION['garanti_anahtar']= $kullaniciAnahtar;
					header('Location: '.LinkYapisi::php('profilim'));
				}
			}
		}
	}
	function sifreDegistir($kullanici, $eskisifre, $yenisifre,$yenisifretekrar, $token)
	{
		if (Denetle::kullanici($kullanici) AND Denetle::md5Mi($token) AND Denetle::md5Mi($eskisifre) AND Denetle::md5Mi($yenisifre) AND Denetle::md5Mi($yenisifretekrar))
		{
			if ($yenisifre == $yenisifretekrar)
			{
				global $girisToken;
				if ($token == $girisToken)
				{
					$tablo = 'kullanicilar';
					$kosul = 'kullanici_adi = "'.$kullanici.'" AND sifre ="'.$eskisifre.'"';
					if (VT::varmi($tablo,  $kosul))
					{
						$degerler = array(
							'sifre' => $yenisifre,
							'sonsifredegisikligi' => date('Y-m-d H:i:s'),
						);
						VT::duzenle($tablo, $degerler, $kosul);
						return 2; // Başarılı
					}
					else
						return 3; // Eski Şifre Hatalı
				}
			}
			else
				return 4; // Şifreler Uyuşmadı
		}
		girisTokenOlustur();
	}

	if (@$_SESSION['garanti_anahtar'] AND $_SESSION['garanti_kullanici'])
	{
		if ($sayfa == 'girisyap')
			header('Location: '.$dizin.'/');
		
		$kullaniciBilgi = $_SESSION['garanti_kullanici'];
		$kullaniciAnahtar = $_SESSION['garanti_anahtar'];
		if (Denetle::kullanici($kullaniciBilgi) AND Denetle::md5Mi($kullaniciAnahtar))
		{
			if (VT::varmi('kullanicilar', 'kullanici_adi = "'.$kullaniciBilgi .'" AND anahtar = "'.$kullaniciAnahtar.'"'))
			{
				$kullaniciEposta = VT::teksatirGetir('kullanicilar', 'kullanici_adi = "'.$kullaniciBilgi .'"', 'eposta');
				$kullaniciAdmin = VT::teksatirGetir('kullanicilar', 'kullanici_adi = "'.$kullaniciBilgi .'"', 'admin');
				$kullaniciResim = VT::teksatirGetir('kullanicilar', 'kullanici_adi = "'.$kullaniciBilgi .'"', 'resim');
				$kullaniciID = VT::teksatirGetir('kullanicilar', 'kullanici_adi = "'.$kullaniciBilgi .'"', 'id_kullanici');
				$smarty->assign(array('kullaniciEposta'=> $kullaniciEposta,'kullaniciBilgi'=> $kullaniciBilgi,'kullaniciAdmin'=> $kullaniciAdmin,'kullaniciResim'=> $kullaniciResim,'kullaniciID'=> $kullaniciID));
			}
			else
			{
				session_destroy();
				header('Location: '.LinkYapisi::php('girisyap'));
			}
		}
	}
	else
	{
		$giris = 0;
		$girisYapanKullanici = 'misafir';
		$smarty->assign(array('giris'=> $giris,));
		if ($sayfa != 'girisyap')
			header('Location: '.LinkYapisi::php('girisyap'));
	}
	