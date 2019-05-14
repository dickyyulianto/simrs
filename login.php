<?php
/*
|--------------------------------------------------------------------------
| Aksi login
|--------------------------------------------------------------------------
|
|   Aplikasi Sistem Informasi Rumah Sakit Sederhana
|   by Dendi Abdul Rohim 
|   dendicious@gmail.com
|   dendicous.com
|
*/

session_start();
extract($_POST);
include './konfig.php';
$query = "select * from tbl_user where username = '$username' and password = '$password'";
$result = mysqli_query($db_handle, $query);
if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_array($result)) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['hak_akses'] = $row['hak_akses'];
        $_SESSION['grup'] = $row['grup'];
        
        if ($row['hak_akses'] == "Dokter") {
            header("location:dokter.php?view=tampil_pasien_dokter");
        } elseif ($row['hak_akses'] == "Front Office") {
            header("location:front-office.php?view=tampil_pasien");
        } elseif ($row['hak_akses'] == "Departemen") {
            header("location:departemen.php?view=tampil_pasien");
        } elseif ($_SESSION['hak_akses'] == "Admin") {
            header("location:admin.php?view=tampil_dokter");
        } elseif ($_SESSION['hak_akses'] == "Apoteker") {
            header("location:apoteker.php?view=tampil_prj");
        } elseif ($_SESSION['hak_akses'] == "Kasir") {
            header("location:kasir.php?view=tampil_kasir");
        } else {
            echo '<script>href.location</script>';
            session_destroy();
        }
    }
}else{
    echo "<script>
	location.href='index.php?error=salah';
	</script>";
}
?>