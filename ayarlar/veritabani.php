<?php
/** Veritabani Bilgileri **/
define('_DB_SERVER_', 'localhost');
define('_DB_NAME_', 'servis');
define('_DB_USER_', 'root');
define('_DB_PASSWD_', '');
define('_MYSQL_ENGINE_', 'InnoDB');

/** Veritabani Baglan **/
$user = _DB_USER_;
$parola = _DB_PASSWD_;
try {
    $db = new PDO('mysql:host='._DB_SERVER_.';dbname='._DB_NAME_.'', $user , $parola);
	$db->query("SET NAMES utf8"); 
	$db->query("SET CHARACTER SET utf8"); 
	$db->query("SET COLLATION_CONNECTION = \"utf8_turkish_ci\"");
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}