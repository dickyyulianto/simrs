<div align="center">
    <h1><label class="label label-success">Data User</label></h1>
    <br>
    <button class="btn btn-primary btn-large" data-toggle="modal" data-target="#tambahModal">
        <i class="glyphicon glyphicon-plus-sign"></i> Tambah Data User
    </button>

    <button class="btn btn-primary btn-large" data-toggle="modal" data-target="#cetakModal">
        <i class="glyphicon glyphicon-plus-sign"></i> Cetak Data User
    </button>

</div>
<br>
<table id="datatable" class="display stripe">
    <thead>
    <th>No</th>
    <th>ID User</th>
    <th>Username</th>
    <th>Password</th>
    <th>Status</th>
    <th>Hak Akses</th>
    <th>Grup</th>
    <th>Aksi</th>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM tbl_user order by id_user desc";
    $result = mysqli_query($db_handle, $query);
    if (mysqli_num_rows($result)) {
        $no = 1;
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $no; ?> </td>
                <td><?php echo $row['id_user']; ?> </td>
                <td><?php echo $row['username']; ?> </td>
                <td><?php echo $row['password']; ?> </td>
                <td><?php echo $row['status']; ?> </td>
                <td><?php echo $row['hak_akses']; ?> </td>
                <td><?php echo $row['grup']; ?> </td>
                <td><?php echo "<a class='btn btn-info btn-sm' href='admin.php?view=tampil_ubah_user&id_user=" . $row['id_user'] . "'><i class='glyphicon glyphicon-edit'></i></a> | 
                    <a class='btn btn-danger btn-sm' href='admin.php?view=aksi_hapus_user&id_user=" . $row['id_user'] . "' onclick='return confirm(&quot;Apakah anda yakin akan menghapus data user tersebut?&quot;)'><i class='glyphicon glyphicon-trash'></i></a>";
                    ?></td>
            </tr>
            <?php
            $no ++;
        }
    } else {
        echo"kosong";
    }
    ?>
    </tbody>
    <tfoot>
    <th>No</th>
    <th>ID User</th>
    <th>Username</th>
    <th>Password</th>
    <th>Status</th>
    <th>Hak Akses</th>
    <th>Grup</th>
    <th>Aksi</th>
    </tfoot>
</table>

<!---------------------------- tambah ------------------------->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Biodata User Baru</h4>
            </div>
            <div class="modal-body">
                <form name="tambah_user" id="tambah_user" method="POST">
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input type="text" name="username" placeholder="Username" class="form-control input-lg" required autofocus  />
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="fa fa-sign-in"></i>
                        </span>
                        <input type="text" name="password" placeholder="Password" class="form-control input-lg" required autofocus  />
<!--                        <input name="password" id="password" class="form-control input-lg" type="password" placeholder="Password" autocomplete="off" required autofocus />-->

                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="fa fa-inbox"></i>
                        </span>
                        <input type="text" name="status" placeholder="Status" class="form-control input-lg" required autofocus  />
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="fa fa-unlock"></i>
                        </span>
                        <input type="text" name="hak_akses" placeholder="Hak Akses" class="form-control input-lg" required autofocus  />
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="fa fa-info-circle"></i>
                        </span>
                        <input type="text" name="grup" placeholder="Grup" class="form-control input-lg" required autofocus  />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-inverse"><i class="glyphicon glyphicon-refresh"></i> Reset </button>
                <button type="submit" class="btn btn-primary" id="submit"><i class="glyphicon glyphicon-floppy-disk"></i>  Simpan </button>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal -->

<script type="text/javascript">
    $("#submit").click(function () {
        $.ajax({
            type: "POST",
            url: "admin/aksi_tambah_user.php",
            data: $('form#tambah_user').serialize(),
            success: function (msg) {
                $("#tambahModal").modal('hide')
                location.href = 'admin.php?view=tampil_user';
                ;
            },
            error: function () {
                alert("Gagal menambah user baru");
            }
        });
    });
</script>


<!---------------------------- cetak ------------------------->
<div class="modal fade" id="cetakModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Cetak Data User</h4>
            </div>
            <table border="1" style="width: 100%">
                <tr>
                    <th>No</th>
                    <th>ID User</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>Hak Akses</th>
                    <th>Grup</th>
                </tr>
                <tbody>
                <?php
                $query = "SELECT * FROM tbl_user order by id_user desc";
                $result = mysqli_query($db_handle, $query);
                if (mysqli_num_rows($result)) {
                    $no = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?> </td>
                            <td><?php echo $row['id_user']; ?> </td>
                            <td><?php echo $row['username']; ?> </td>
                            <td><?php echo $row['password']; ?> </td>
                            <td><?php echo $row['status']; ?> </td>
                            <td><?php echo $row['hak_akses']; ?> </td>
                            <td><?php echo $row['grup']; ?> </td>
                        </tr>
                        <?php
                        $no ++;
                    }
                } else {
                    echo"kosong";
                }
                ?>
                </tbody>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="cetak"><i class="glyphicon glyphicon-print"></i>  Cetak </button>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal -->

<script type="text/javascript">
    $("#cetak").click(function () {
        $.ajax({
            type: "POST",
            url: "admin/aksi_cetak_user.php",
            data: $('form#cetak_user').serialize(),
            success: function (msg) {
                $("#cetakModal").modal('hide');
                location.href = 'admin.php?view=tampil_user';

            },
            error: function () {
                alert("Gagal mencetak data user ");
            }
        });
    });
</script>


