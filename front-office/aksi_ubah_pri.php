<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../konfig.php';
extract($_POST);
$query = "update tbl_pri set id_pasien='$id_pasien', id_ruang = '$id_ruang', tanggal_checkin = '$tanggal_checkin', tanggal_checkout = '$tanggal_checkout', hari_menginap = '$hari_menginap', keluhan = '$keluhan', biaya = '$biaya', bayar = '$bayar' where id_ri='$id_ri' ";
mysqli_query($db_handle, $query) or die(mysqli_error($db_handle));
header("location:../front-office.php?view=tampil_pri");

