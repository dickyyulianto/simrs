<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../konfig.php';
extract($_POST);

$hari = date_diff(date_create($_POST['tanggal_checkout']), date_create($_POST['tanggal_checkin']));
$hari_menginap = $hari->format('%d');

$row = mysqli_fetch_assoc(mysqli_query($db_handle, "SELECT tarif FROM tbl_tarif_ri WHERE id_tarif_ri = '$id_tarif_ri' "));
$tarif = $row['tarif'];
$biaya = $tarif * $hari_menginap;

$query = "update tbl_pri set id_pasien='$id_pasien', tanggal_checkin = '$tanggal_checkin', tanggal_checkout = '$tanggal_checkout', keluhan = '$keluhan', hari_menginap = '$hari_menginap', biaya = '$biaya' where id_ri='$id_ri' ";
mysqli_query($db_handle, $query) or die(mysqli_error($db_handle));
header("location:../dokter.php?view=tampil_pri");

