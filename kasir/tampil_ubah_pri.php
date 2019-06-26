<?php
if (isset($_GET)) {
    include 'konfig.php';
    $id_ubah = $_GET['id_ri'];
    $query = "SELECT * FROM tbl_pri, tbl_pasien, tbl_tarif_ri where "
            . "tbl_pri.id_pasien = tbl_pasien.id_pasien and tbl_tarif_ri.id_tarif_ri = tbl_pri.id_tarif_ri and "
            . "tbl_pri.id_ri = '$id_ubah'";
    $result = mysqli_query($db_handle, $query) or die(mysqli_error($db_handle));
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_array($result)) {
            ?>

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Ubah Data Rawat Inap</h4>
            </div> 
                        <div class="modal-body">
                <form name="ubah_pri" id="ubah_pri" method="POST" action="kasir/aksi_ubah_pri.php ">
                    <div class="input-group input-lg">
                        <input type="hidden" value="<?php echo $id_ubah; ?>" name="id_ri" />
                        <input type="hidden" value="<?php echo $row['id_pasien']; ?>" name="id_pasien" id="id_pasien_hidden" />
                        <div id="result"></div>
                    </div>
                    <tr align="left">
                        <td> <h1> Nama Pasien : <?php echo $row['nama_pasien']?></h1></td>
                        <td> <h1> Jenis Perawatan : <?php echo $row['perawatan']?></h1></td>
                        <td> <h1> Tanggal masuk : <?php echo $row['tanggal_checkin']?></h1></td>
                        <td> <h1> Tanggal Keluar : <?php echo $row['tanggal_checkout']?></h1></td>
                        <td> <h1> Pelayanan : <?php echo $row['pelayanan']?></h1></td>
                        <td> <h1> Tipe Kamar : <?php echo $row['tipe_kamar']?></h1></td>
                        <td> <h1> Lama Perawatan : <?php echo $row['hari_menginap']?> hari</h1></td>
                        <td> <h1> Biaya Kamar : Rp.<?php
                            $tarif = $row['tarif'];
                            echo $row['tarif'];
                                ?> </h1></td>
                        <td> <h1> Biaya Tindakan : Rp.
                            <?php
                            $id_ri = $row['id_ri'];
                            $query = mysqli_query($db_handle, "SELECT biaya_tindakan FROM tbl_tindakan where id_pri = '$id_ri'");
                            if (mysqli_num_rows($query)) {
                                $biaya_tindakan = 0;
                                while ($row = mysqli_fetch_array($query)) {
                                    $biaya_tindakan = $biaya_tindakan + $row['biaya_tindakan'];
                                }
                            }
                            else {
                                $row = mysqli_fetch_assoc($query);
                                $biaya_tindakan = $row['biaya_tindakan'];
                            }
                            echo $biaya_tindakan;
                            ?></h1>
                        </td>
                        <td><h1> Total Biaya : Rp.
                            <?php
                            $total = $tarif + $biaya_tindakan;
                            echo $total;
                            ?></h1>
                        </td>
                    </tr>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">Rp</span>
                        <input type="text" name="bayar" placeholder="Bayar" class="form-control input-lg" value="<?php echo $row['bayar']?>" required style="font-size: 25px;" />
                        <span class="input-group-addon">,-</span>
                    </div>

                    <div align="center">
                        <button type="reset" class="btn btn-inverse btn-lg"><i class="glyphicon glyphicon-refresh"></i> Reset </button>
                        <button type="submit" class="btn btn-primary btn-lg" id="submit"><i class="glyphicon glyphicon-floppy-disk"></i>  Simpan </button>
                    </div>

                </form>

            </div>

            
            <script type="text/javascript">
                $(function () {
                    $(".search").keyup(function ()
                    {
                        var searchid = $(this).val();
                        var dataString = 'search=' + searchid;
                        if (searchid != '')
                        {
                            $.ajax({
                                type: "POST",
                                url: "kasir/cari-pasien.php",
                                data: dataString,
                                cache: false,
                                success: function (html)
                                {
                                    $("#result").html(html).show();
                                }
                            });
                        }
                        return false;
                    });

                    jQuery("#result").live("click", function (e) {
                        var $clicked = $(e.target);
                        var $id = $clicked.find('.id').html();
                        var $nama = $clicked.find('.nama').html();
                        var dec_id = $("<div/>").html($id).text();
                        var dec_nama = $("<div/>").html($nama).text();
                        $('#id_pasien_hidden').val(dec_id);
                        $('#searchid').val(dec_nama);
                    });
                    jQuery(document).live("click", function (e) {
                        var $clicked = $(e.target);
                        if (!$clicked.hasClass("search")) {
                            jQuery("#result").fadeOut();
                        }
                    });
                    $('#searchid').click(function () {
                        jQuery("#result").fadeIn();
                    });
                });
            </script>



            <?php
        }
    }
}

