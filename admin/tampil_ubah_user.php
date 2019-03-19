<?php
if (isset($_GET)) {
    include './konfig.php';
    $id_ubah_user = $_GET['id_user'];
    $query = "SELECT * FROM tbl_user where id_user = '$id_ubah_user'";
    $result = mysqli_query($db_handle, $query);
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Edit Data User</h4>
            </div>
            <div class="modal-body">
                <form name="edit_user" id="edit_user" method="POST" action="admin/aksi_ubah_user.php">
                    <input type="hidden" name="id_user" value="<?php echo $id_ubah_user; ?>"/>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input type="text" name="username" placeholder="Username" class="form-control input-lg" value="<?php echo $row['username'] ?>" required autofocus  />
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="fa fa-sign-in"></i>
                        </span>
                        <input type="text" name="password" placeholder="Password" class="form-control input-lg" value="<?php echo $row['password'] ?>" required autofocus  />
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="fa fa-inbox"></i>
                        </span>
                        <input type="text" name="status" placeholder="Status" class="form-control input-lg" value="<?php echo $row['status'] ?>" required autofocus  />
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="fa fa-unlock"></i>
                        </span>
                        <input type="text" name="hak_akses" placeholder="Hak Akses" class="form-control input-lg" value="<?php echo $row['hak_akses'] ?>" required autofocus  />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="fa fa-info-circle"></i>
                        </span>
                        <input type="text" name="grup" value="<?php echo $row['grup']; ?>" placeholder="Grup" class="form-control input-lg" required />
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