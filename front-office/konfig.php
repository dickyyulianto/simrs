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
        
    $base_url = "http://simrs.test";
	
	if (mysqli_connect($server,$user,$pass)){
		//echo ":)";
        $db_handle = mysqli_connect($server,$user,$pass);
		mysqli_select_db($db_handle, $dbname) or die("database not found");
	}else{
		echo ":(";
	}
	 
?>