<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../konfig.php';
extract($_POST);
//$query = "insert into tbl_pri values(null,'$id_pasien', '$id_ruang', '$keluhan', '$tanggal_checkin', '$tanggal_checkout', '$hari_menginap', '$biaya', '$bayar')";
$query = "insert into tbl_pri values(null,'$id_pasien', '$id_ruang', '$keluhan', '$tanggal_checkin', null, null, null, null)";
mysqli_query($db_handle, $query) or die(mysqli_error($db_handle));
echo json_encode(array('success'=>'true'));
return true;