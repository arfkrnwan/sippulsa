<!DOCTYPE html>
<html>
    <head>
        <title> Sistem Informasi Penjualan Pulsa</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
        <script src="<?php echo base_url('assets/js/jquery.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/popper.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="container">
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h4><center>Silahkan Pilih Jenis Pulsa</center></h4></div>
                    <div class="panel-body"></div>
                    <!--Awal nav-tabs-->
                    <div class="container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Paket Data</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <!--Awal form input-->
                                <?php echo form_open('biling/paket') ?>
                                <div class="container">

                                    <div class="form-group row">
                                        <div class="col-xs-2">
                                            <label>Masukkan Nomor HP</label>
                                            <input class="form-control" name="no_hp" type="text">
                                        </div>
                                        
                                        <div class="col-xs-2">
                                            <label>Pilih Provider</label>
                                            <?php echo cmb_dinamis('proveder', 'proveder', 'nama_proveder', 'id_proveder') ?>
                                        </div>
                                        <div class="col-xs-4">
                                            <label>Pilih Nominal</label>
                                            <?php echo cmb_dinamis('nominal', 'nominal', 'nama_nominal', 'id_nominal', NULL, "id='nom' onChange='otomatis()'") ?>

                                        </div>
                                        
                                        <div class="col-xs-2">
                                            <label for="disabledInput" for="ex1">Harga Paket Data</label>

                                            <input class="form-control" name="harga" readonly="" id="harga_jual" type="text" >
                                            <input type="hidden" name="id_kategori" value="2">
                                        </div>
                                        <div class="col-xs-2">
                                            <label >Klik Beli Paket</label>
                                            <button type="submit" name="submit" class="btn btn-primary" id="ex1">Beli Paket</button>
                                        </div>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                                <!--Akhir form input-->
                            </div>
                        </div>
                    </div>
                    <!--Akhir nav-tab-->
                    <hr>
                </div>
            </div>
        </div>
        
        <script type="text/javascript">
            function isi_otomatis() {
                var nominal = $("#nominal").val();
                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url() ?>biling/form_autocomplit',
                    data: 'nominal=' + nominal,
                    success: function (data) {
                        var json = data,
                                obj = JSON.parse(json);
                        $("#harga").val(obj.harga_jual);

                    }
                });
            }

            function otomatis() {
                var nom = $("#nom").val();
                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url() ?>biling/form',
                    data: 'nom=' + nom,
                    success: function (data) {
                        var json = data,
                                obj = JSON.parse(json);
                        $("#harga_jual").val(obj.harga_jual);

                    }
                });
            }

            function isi() {
                var nomi = $("#nomi").val();
                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url() ?>biling/isi',
                    data: 'nomi=' + nomi,
                    success: function (data) {
                        var json = data,
                                obj = JSON.parse(json);
                        $("#harga_listrik").val(obj.harga_jual);

                    }
                });
            }
        </script>
    </body>
</html>