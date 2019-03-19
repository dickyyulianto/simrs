<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../konfig.php';
extract($_POST);
$query = "insert into tbl_user values(null,'$username','$password', '$status', '$hak_akses', '$grup') ";
mysqli_query($db_handle, $query);