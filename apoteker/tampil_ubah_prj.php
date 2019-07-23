<?php
if (isset($_GET)) {
    include 'konfig.php';
    $id_ubah = $_GET['no_rj'];
    $query = "SELECT * FROM tbl_prj, tbl_pasien, tbl_dokter where "
            . "tbl_prj.id_pasien = tbl_pasien.id_pasien and tbl_prj.id_dokter = tbl_dokter.id_user and "
            . "no_rj = '$id_ubah'";
    $result = mysqli_query($db_handle, $query);
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i>  Resep Pasien </h4>
            </div>
            <div class="modal-body">
                <form name="edit_prj" id="edit_prj" method="POST" action="apoteker/aksi_ubah_prj.php">
                    <input type="hidden" name="no_rj" value="<?php echo $id_ubah; ?>"/>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input type="hidden" value="<?php echo $row['id_pasien']; ?>" name="id_pasien" readonly id="id_pasien_hidden" />
                        <input type="text" value="<?php echo $row['nama_pasien']; ?>" name="search" readonly class="search form-control input-lg" id="searchid" placeholder="Masukan ID / Nama Pasien" required  />

                        <div id="result"></div>

                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>

                        <input type="text" value="<?php echo $row['nama_dokter']; ?>" name="nama_dokter" readonly class="search form-control input-lg" id="searchid" placeholder="Masukan ID / Nama Pasien" required  />

                        <div id="result"></div>

                    </div>

                    <div class="input-group input-lg ">

                        <span class="input-group-addon">
                            <i class="fa fa-hospital-o fa-lg"></i>
                        </span>
                        <select name="departemen" readonly id="departemen" class="form-control input-lg">
                            <option  value=''>Pilih Departemen</option>
                            <?php
                            $query2 = "SELECT distinct departemen from tbl_prj";
                            $result2 = mysqli_query($db_handle, $query2);
                            if (mysqli_num_rows($result2)) {
                                while ($row2 = mysqli_fetch_array($result2)) {
                                    echo '<option ';
                                    if ($row['departemen'] == $row2['departemen']) {
                                        echo 'selected';
                                    }
                                    echo '>' . $row2['departemen'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-question-sign"></i>
                        </span>
                        <input type="text" name="keluhan" readonly value="<?php echo $row['keluhan']; ?>" placeholder="Keluhan" class="form-control input-lg" required />
                    </div>
                    <!--<div class="input-group input-lg">
                        <span class="input-group-addon">Rp</span>
                        <input type="text" id="biaya" value="<?php echo $row['biaya']; ?>" name="biaya" placeholder="Biaya" class="form-control input-lg" value="" readonly required />
                        <span class="input-group-addon">,-</span>
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">Rp</span>
                        <input type="text" name="bayar" value="<?php echo $row['bayar']; ?>" placeholder="Bayar" class="form-control input-lg" value="" required />
                        <span class="input-group-addon">,-</span>
                    </div>-->
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-inbox"></i>
                        </span>
                        <input type="textarea" name="resep" readonly value="<?php echo $row['resep']; ?>" placeholder="Resep" class="form-control input-lg" required />
                    </div>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i >Rp</i>
                        </span>
                        <input type="text" name="harga_resep"  value="<?php echo $row['harga_resep']; ?>" placeholder="Harga Resep" class="form-control input-lg" required autofocus />
                    </div>
                    <div align="center">
                        <button type="reset" class="btn btn-inverse btn-lg"><i class="glyphicon glyphicon-refresh"></i> Reset </button>
                        <button type="submit" class="btn btn-primary btn-lg" id="submit"><i class="glyphicon glyphicon-floppy-disk"></i>  Simpan </button>
                    </div>
                </form>
            </div>

<!--            <script type="text/javascript">-->
<!--                $(function() {-->
<!--                    $(".search").keyup(function()-->
<!--                    {-->
<!--                        var searchid = $(this).val();-->
<!--                        var dataString = 'search=' + searchid;-->
<!--                        if (searchid != '')-->
<!--                        {-->
<!--                            $.ajax({-->
<!--                                type: "POST",-->
<!--                                url: "front-office/cari-pasien.php",-->
<!--                                data: dataString,-->
<!--                                cache: false,-->
<!--                                success: function(html)-->
<!--                                {-->
<!--                                    $("#result").html(html).show();-->
<!--                                }-->
<!--                            });-->
<!--                        }-->
<!--                        return false;-->
<!--                    });-->

<!--                    jQuery("#result").live("click", function(e) {-->
<!--                        var $clicked = $(e.target);-->
<!--                        var $id = $clicked.find('.id').html();-->
<!--                        var $nama = $clicked.find('.nama').html();-->
<!--                        var dec_id = $("<div/>").html($id).text();-->
<!--                        var dec_nama = $("<div/>").html($nama).text();-->
<!--                        $('#id_pasien_hidden').val(dec_id);-->
<!--                        $('#searchid').val(dec_nama);-->
<!--                    });-->
<!--                    jQuery(document).live("click", function(e) {-->
<!--                        var $clicked = $(e.target);-->
<!--                        if (!$clicked.hasClass("search")) {-->
<!--                            jQuery("#result").fadeOut();-->
<!--                        }-->
<!--                    });-->
<!--                    $('#searchid').click(function() {-->
<!--                        jQuery("#result").fadeIn();-->
<!--                    });-->
<!--                });-->
<!--            </script>-->

<!--            <script type="text/javascript" language="javascript">-->
<!--                $(document).ready(function() {-->
<!--                    $("#departemen").change(function(event) {-->
<!--                        var selectvalue = $(this).val();-->
<!--                        $.ajax({-->
<!--                            url: 'front-office/aksi_lihat_tarif_rj.php?departemen=' + selectvalue,-->
<!--                            success: function(tarif) {-->
<!--                                document.getElementById('biaya').value = tarif;-->
<!--                            }-->
<!--                        });-->
<!--                    });-->
<!--                });-->
<!--            </script>-->
            <?php
        }
    }
}

