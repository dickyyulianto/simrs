<?php
if (isset($_GET)) {
    include 'konfig.php';
    $id_ubah = $_GET['no_rj'];
    $query = "SELECT * FROM tbl_prj, tbl_pasien where "
        . "tbl_prj.id_pasien = tbl_pasien.id_pasien and "
        . "no_rj = '$id_ubah'";
    $result = mysqli_query($db_handle, $query);
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Input Pembayaran</h4>
            </div>
            <div class="modal-body">
                <form name="edit_prj" id="edit_prj" method="POST" action="Kasir/aksi_ubah_prj.php">
                    <input type="hidden" name="no_rj" value="<?php echo $id_ubah; ?>"/>
                    <div class="input-group input-lg">
                        <input type="hidden"  value="<?php echo $row['id_pasien']; ?>" name="id_pasien" id="id_pasien_hidden" />
                        <div id="result"></div>
                    </div>
                    <div class="modal-header">
                        <tr>
                            <td> <h3> Nama Pasien   : <?php echo $row['nama_pasien']?></h3></td>
                            <td> <h3> Alamat Pasien : <?php echo $row['alamat']?></h3></td>
                            <td> <h3> No Hp         : <?php echo $row['no_telepon']?></h3></td>
                        </tr>
                    </div>
                    <div class="modal-body">
                        <tr>
                            <td> <h3> Poli      : <?php echo $row['departemen']?></h3></td>
                            <td> <h3> Tindakan      : <?php echo $row['tindakan']?></h3></td>
                            <td> <h3> Resep     : <?php echo $row['resep']?></h3></td>
                            <td> <h3> Harga Resep  : Rp. <?php echo $row['harga_resep']?></h3></td>
                            <td> <h3> Biaya Tindakan : Rp. <?php echo $row['biaya']?></h3></td>
                            <td> <h3 class="modal-footer"> Total Biaya  : Rp. <?php echo $row['harga_resep']+ $row['biaya']?></h3></td>
                            <td> <h3 class="modal-footer"> Pembayaran : Rp. <?php echo $row['bayar']?></h3></td>
                        </tr>
                    </div>
                    <div align="center">
                        <button type="submit" class="btn btn-inverse btn-lg noprint" href="kasir/tampil_ubah_prj.php"><i class="glyphicon glyphicon-refresh"></i> Kembali </button>
                        <button type="submit" class="btn btn-primary btn-lg noprint" onclick="window.print();return false;"><i class="glyphicon glyphicon-print"></i>  Print </button>
                    </div>
                </form>
            </div>

            <style>
                @media print {
                    .noprint {
                        display: none;
                    }
                }
            </style>

            <script type="text/javascript">
                $(function() {
                    $(".search").keyup(function()
                    {
                        var searchid = $(this).val();
                        var dataString = 'search=' + searchid;
                        if (searchid != '')
                        {
                            $.ajax({
                                type: "POST",
                                url: "front-office/cari-pasien.php",
                                data: dataString,
                                cache: false,
                                success: function(html)
                                {
                                    $("#result").html(html).show();
                                }
                            });
                        }
                        return false;
                    });

                    jQuery("#result").live("click", function(e) {
                        var $clicked = $(e.target);
                        var $id = $clicked.find('.id').html();
                        var $nama = $clicked.find('.nama').html();
                        var dec_id = $("<div/>").html($id).text();
                        var dec_nama = $("<div/>").html($nama).text();
                        $('#id_pasien_hidden').val(dec_id);
                        $('#searchid').val(dec_nama);
                    });
                    jQuery(document).live("click", function(e) {
                        var $clicked = $(e.target);
                        if (!$clicked.hasClass("search")) {
                            jQuery("#result").fadeOut();
                        }
                    });
                    $('#searchid').click(function() {
                        jQuery("#result").fadeIn();
                    });
                });
            </script>

            <script type="text/javascript" language="javascript">
                $(document).ready(function() {
                    $("#departemen").change(function(event) {
                        var selectvalue = $(this).val();
                        $.ajax({
                            url: 'front-office/aksi_lihat_tarif_rj.php?departemen=' + selectvalue,
                            success: function(tarif) {
                                document.getElementById('biaya').value = tarif;
                            }
                        });
                    });
                });
            </script>
            <?php
        }
    }
}

