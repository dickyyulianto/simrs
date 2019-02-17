<?php

/*
|--------------------------------------------------------------------------
| Aksi Logout
|--------------------------------------------------------------------------
|
|   Aplikasi Sistem Informasi Rumah Sakit Sederhana
|   by Dendi Abdul Rohim 
|   dendicious@gmail.com
|   dendicous.com
|
*/

session_start(); //memulai session
session_destroy(); //mengakhiri session
header("location:index.php");
