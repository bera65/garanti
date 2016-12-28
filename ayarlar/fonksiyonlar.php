<?php
class Denetle
{
	
	public static function htmlTemizle($html)
	{
		$events = 'onmousedown|onmousemove|onmmouseup|onmouseover|onmouseout|onload|onunload|onfocus|onblur|onchange';
		$events .= '|onsubmit|ondblclick|onclick|onkeydown|onkeyup|onkeypress|onmouseenter|onmouseleave|onerror|onselect|onreset|onabort|ondragdrop|onresize|onactivate|onafterprint|onmoveend';
		$events .= '|onafterupdate|onbeforeactivate|onbeforecopy|onbeforecut|onbeforedeactivate|onbeforeeditfocus|onbeforepaste|onbeforeprint|onbeforeunload|onbeforeupdate|onmove';
		$events .= '|onbounce|oncellchange|oncontextmenu|oncontrolselect|oncopy|oncut|ondataavailable|ondatasetchanged|ondatasetcomplete|ondeactivate|ondrag|ondragend|ondragenter|onmousewheel';
		$events .= '|ondragleave|ondragover|ondragstart|ondrop|onerrorupdate|onfilterchange|onfinish|onfocusin|onfocusout|onhashchange|onhelp|oninput|onlosecapture|onmessage|onmouseup|onmovestart';
		$events .= '|onoffline|ononline|onpaste|onpropertychange|onreadystatechange|onresizeend|onresizestart|onrowenter|onrowexit|onrowsdelete|onrowsinserted|onscroll|onsearch|onselectionchange';
			

		return (!preg_match('/<[ \t\n]*script/ui', $html) && !preg_match('/<.*('.$events.')[ \t\n]*=/ui', $html) && !preg_match('/<[\s]*(form|input|embed|object)/ims', $html)  && !preg_match('/.*script\:/ui', $html));
	}
	public static function kodlarisil($pattern)
    {
        return preg_replace('/\\\[px]\{[a-z]{1,2}\}|(\/[a-z]*)u([a-z]*)$/i', '$1$2', $pattern);
    }
	public static function sayisal($value)
	{
		return preg_match('/^[+0-9. ()\/-]*$/', $value);
	}
	public static function zaraliKodSil($pattern)
    {
        if (!defined('PREG_BAD_UTF8_OFFSET')) {
            return $pattern;
        }
        return preg_replace('/\\\[px]\{[a-z]{1,2}\}|(\/[a-z]*)u([a-z]*)$/i', '$1$2', $pattern);
    }
	public static function isimmi($name)
    {
        return preg_match(Denetle::zaraliKodSil('/^[^0-9!<>,;?=+()@#"°{}_$%:]*$/u'), stripslashes($name));
    }
	public static function urunadimi($name)
    {
        return preg_match(Denetle::zaraliKodSil('/^[^<>,\'()?;=#"°{}]*$/u'), $name);
    }
	public static function strlen($str, $encoding = 'UTF-8')
	{
		if (is_array($str))
			return false;
		$str = html_entity_decode($str, ENT_COMPAT, 'UTF-8');
		if (function_exists('mb_strlen'))
			return mb_strlen($str, $encoding);
		return strlen($str);
	}
	public static function taglarisil($yazilan)
	{
		return preg_replace("/[^\p{L}\p{N}.:+,-?=<> ]/u", ' ', $yazilan);
	}
	public static function kullanici($gelen)
    {
    	return preg_match('/^[_a-z0-9-]+$/ui', $gelen);
    }
	public static function parola($passwd)
	{
		return preg_match("#.*^(?=.{5,20})(?=.*[a-z])(?=.*[0-9]).*$#", $passwd);
	}
	public static function eposta($email)
	{
		return preg_match('/^[a-z\p{L}0-9!#$%&\'*+\/=?^`{}|~_-]+[.a-z\p{L}0-9!#$%&\'*+\/=?^`{}|~_-]*@[a-z\p{L}0-9]+(?:[.]?[_a-z\p{L}0-9-])*\.[a-z\p{L}0-9]+$/ui', $email);
	}

	public static function gonder($submit)
	{
		return (
			isset($_POST[$submit]) || isset($_POST[$submit.'_x']) || isset($_POST[$submit.'_y'])
			|| isset($_GET[$submit]) || isset($_GET[$submit.'_x']) || isset($_GET[$submit.'_y'])
		);
	}
	public static function degerGetir($key, $default_value = false)
	{
		if (!isset($key) || empty($key) || !is_string($key))
			return false;
		$ret = (isset($_POST[$key]) ? $_POST[$key] : (isset($_GET[$key]) ? $_GET[$key] : $default_value));

		if (is_string($ret) === true)
			$ret = urldecode(preg_replace('/((\%5C0+)|(\%00+))/i', '', urlencode($ret)));
		return !is_string($ret)? $ret : stripslashes($ret);
	}
	public static function degerVarmi($key)
	{
		if (!isset($key) || empty($key) || !is_string($key))
			return false;
		return isset($_POST[$key]) ? true : (isset($_GET[$key]) ? true : false);
	}
   public static function tarih($date)
	{
		return (bool)preg_match('/^([0-9]{4})-((0?[0-9])|(1[0-2]))-((0?[0-9])|([1-2][0-9])|(3[01]))( [0-9]{2}:[0-9]{2}:[0-9]{2})?$/', $date);
	}
	public static function md5Mi($md5)
    {
        return preg_match('/^[a-f0-9A-F]{32}$/', $md5);
    }
	public static function tarihiCikar($bitisik) {
		$tarihAl = substr($bitisik,0,10);
		$tarih = date("Y-m-d H:i:s",$tarihAl);
		return $tarih;
	}
	public static function idCikar($bitisik) {
		$tarihAl = substr($bitisik,0,10);
		$bastan = Denetle::strlen($tarihAl);
		$tumu = Denetle::strlen($bitisik);
		$idKacKarakter = $tumu-$bastan;
		$idBul = substr($bitisik,10,$idKacKarakter);
		return $idBul;
	}
	public static function seo($s) {
		 $tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',');
		 $eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','');
		 $s = str_replace($tr,$eng,$s);
		 $s = strtolower($s);
		 $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
		 $s = preg_replace('/\s+/', '-', $s);
		 $s = preg_replace('|-+|', '-', $s);
		 $s = preg_replace('/#/', '', $s);
		 $s = str_replace('.', '', $s);
		 $s = trim($s, '-');
		 return $s;
		}
}