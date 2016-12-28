<?php

/*** TOKENLER ***/
	session_start();
	function aramaTokenOlustur(){
        $aramaToken = md5(uniqid(rand(), true));
        $_SESSION['aramaToken'] = $aramaToken;
        return $aramaToken;
    }
	function girisTokenOlustur(){
        $girisToken = md5(uniqid(rand(), true));
        $_SESSION['girisToken'] = $girisToken;
        return $girisToken;
    }
	if (!@$_SESSION['aramaToken'])
	{
		$aramaToken = aramaTokenOlustur();
	}
	else
		$aramaToken = $_SESSION['aramaToken'];
	
	if (!@$_SESSION['girisToken'])
	{
		$girisToken = girisTokenOlustur();
	}
	else
		$girisToken = $_SESSION['girisToken'];
	
	$smarty->assign(array(
		'aramaToken' => $_SESSION['aramaToken'],
		'girisToken' => $_SESSION['girisToken'],
	));
