<?php
if (isset($_GET)) {
    include './konfig.php';
    $id_ubah_dokter = $_GET['id_user'];
    $query = "SELECT * FROM tbl_dokter where id_user = '$id_ubah_dokter'";
    $result = mysqli_query($db_handle, $query);
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Edit Biodata Dokter</h4>
            </div>
            <div class="modal-body">
                <form name="edit_dokter" id="edit_dokter" method="POST" action="admin/aksi_ubah_dokter.php">
                    <input type="hidden" name="id_user" value="<?php echo $id_ubah_dokter; ?>"/>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input type="text" name="nama" placeholder="Nama Dokter" class="form-control input-lg" value="<?php echo $row['nama_dokter'] ?>" required autofocus  />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="fa fa-hospital-o"></i>
                        </span>
                        <input type="text" name="departemen" value="<?php echo $row['departemen']; ?>" placeholder="Departemen" class="form-control input-lg" required />
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </span>
                        <input type="text" name="jadwal_praktik" value="<?php echo $row['jadwal_praktik']; ?>" placeholder="Jadwal Praktik" class="form-control input-lg" required />
                    </div>
                    <div align="center">
                        <button type="reset" class="btn btn-inverse btn-lg"><i class="glyphicon glyphicon-refresh"></i> Reset </button>
                        <button type="submit" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-floppy-disk"></i>  Simpan </button>
                    </div>
                </form>
            </div>

            <?php
        }
    }
}
?>