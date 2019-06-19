<?php
if (isset($_GET)) {
    include './konfig.php';
    $id_ubah_tarif_ri = $_GET['id_tarif_ri'];
    $query = "SELECT * FROM tbl_tarif_ri where id_tarif_ri = '$id_ubah_tarif_ri'";
    $result = mysqli_query($db_handle, $query);
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Edit Data Tarif</h4>
            </div>
            <div class="modal-body">
                <form name="edit_tarif_ri" id="edit_tarif_ri" method="POST" action="admin/aksi_ubah_tarif_ri.php">
                    <input type="hidden" name="id_tarif_ri" value="<?php echo $id_ubah_tarif_ri; ?>"/>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="fa-pencil-square"></i>
                        </span>
                        <input type="text" name="perawatan" placeholder="Perawatan" class="form-control input-lg" value="<?php echo $row['perawatan'] ?>" required autofocus  />
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="fa fa-pencil-square-o"></i>
                        </span>
                        <input type="text" name="pelayanan" placeholder="Pelayanan" class="form-control input-lg" value="<?php echo $row['pelayanan'] ?>" required autofocus  />
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="fa fa-hospital-o"></i>
                        </span>
                        <input type="text" name="tipe_kamar" placeholder="Tipe Kamar" class="form-control input-lg" value="<?php echo $row['tipe_kamar'] ?>" required autofocus  />
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="fa fa-money"></i>
                        </span>
                        <input type="text" name="tarif" placeholder="Tarif" class="form-control input-lg" value="<?php echo $row['tarif'] ?>" required autofocus  />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="fa fa-list-ol"></i>
                        </span>
                        <input type="text" name="kapasitas" value="<?php echo $row['kapasitas']; ?>" placeholder="Kapasitas" class="form-control input-lg" required />
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