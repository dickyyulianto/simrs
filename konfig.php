<?php
/*
|--------------------------------------------------------------------------
| Konfigurasi Database
|--------------------------------------------------------------------------
|
|   Aplikasi Sistem Informasi Rumah Sakit Sederhana
|   by Dendi Abdul Rohim 
|   dendicious@gmail.com
|   dendicous.com
|
*/

	$server = "localhost";
	$user = "root";
	$pass = "";
	$dbname = "sirusak";
        
    $base_url = "http://localhost/sirusak/";
	
	if (mysql_connect($server,$user,$pass)){
		//echo ":)";
		mysql_select_db($dbname) or die("database not found");
	}else{
		echo ":(";
	}
	 
?>