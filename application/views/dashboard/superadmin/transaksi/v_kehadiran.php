            <?php
              $this->load->view('layouts/superadmin/header');
            ?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div class="row">

                            <div class="col-md-6">

                            <h4 class="m-t-0 header-title"><b>Pengajuan Kehadiran</b></h4>
                            </div>
                            <div class="col-md-6">

                            <a href="#customedit-modal" class="btn btn-default btn-md waves-effect waves-light m-b-30 pull-right hidden" data-animation="slit" id="triggera" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a"></a>
                            <a href="#custom-modal" class="btn btn-default btn-md waves-effect waves-light m-b-30 pull-right" data-animation="slit" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a"><i class="md md-add"></i> Kehadiran</a>
                            </div>
                            </div>
                            <div class="row m-t-10 m-b-10">
                                <div class="col-sm-4 col-lg-4">
                                    <div class="form-group contact-search m-b-30">
                                        <select id="fieldfilter-4" class="form-control select2">
                                            <option value="">Pilih Pegawai</option>
                                            <?php
                                                foreach($mst_pegawai->result_array() as $me)
                                                {
                                                    
                                            ?>
                                                <option value="<?php echo $me['id']; ?>"><?php echo $me['nama_lengkap']; ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div> <!-- form-group -->
                                </div>

                                <div class="col-sm-4 col-lg-4">
                                    <input class="form-control" placeholder="Pilih Bulan" id="datepicker" type="text">
                                </div>
                                <div class="col-sm-2 col-lg-2">
                                    <a href="javascript:void(0);" id="btn_cari" class="btn btn-default btn-md waves-effect waves-light m-b-30 pull-right"><i class="md md-search"></i> Cari</a>
                                </div>
                            </div>
                            <p class="text-muted font-13 m-b-30">
                            </p>

                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Keterangan</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    © 2018. <p><?php echo $credit; ?></p>
                </footer>

            </div>

        </div>

        <div id="custom-modal" class="modal-demo">
            <div class="modal-dialog"> 
                <div class="modal-content"> 
                    <div class="custom-modal-title"> 
                        <button type="button" class="close" onclick="Custombox.close();"><span>&times;</span><span class="sr-only">Close</span></button> 
                        <h4 class="custom-modal-title">Transaksi kehadiran</h4> 
                    </div> 
                    <div class="modal-body"> 
                        <div class="row"> 
                            <div class="col-md-6"> 
                                <div class="form-group"> 
                                    <label for="field-1" class="control-label">Pegawai</label> 
                                        
                                    <select id="field-1" class="form-control select2">
                                        <option value="">Pilih Pegawai</option>
                                        <?php
                                            foreach($mst_pegawai->result_array() as $me)
                                            {
                                                
                                        ?>
                                            <option value="<?php echo $me['id']; ?>"><?php echo $me['nama_lengkap']; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div> 
                            </div> 
                            <div class="col-md-6"> 
                                <div class="form-group"> 
                                    <label for="field-2" class="control-label">Tanggal</label> 
                                    <input type="text" id="field-2" placeholder="Tanggal" data-a-sign="" class="form-control">
                                </div> 
                            </div>
                        </div> 
                        <div class="row"> 
                            <div class="col-md-6"> 
                                <div class="form-group"> 
                                    <label for="field-3" class="control-label">Masuk</label> 
                                    <input type="text" id="field-3" placeholder="Masuk" data-a-sign="" class="form-control">
                                </div> 
                            </div> 
                            <div class="col-md-6"> 
                                <div class="form-group"> 
                                    <label for="field-4" class="control-label">Keluar</label> 
                                    <input type="text" id="field-4" placeholder="Keluar" data-a-sign="" class="form-control">
                                </div> 
                            </div>
                        </div> 
                        <div class="row"> 
                            <div class="col-md-12"> 
                                <div class="form-group no-margin"> 
                                    <label for="field-5" class="control-label">Keterangan</label> 
                                    <textarea class="form-control autogrow" id="field-5" placeholder="Keterangan" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                                </div> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="modal-footer"> 
                        <button type="button" class="btn btn-default waves-effect" onclick="Custombox.close();" data-dismiss="modal">Close</button> 
                        <button type="button" class="btn btn-info waves-effect waves-light" id="btn_simpan">Simpan</button> 
                    </div> 
                </div> 
            </div>
        </div>

        <div id="customedit-modal" class="modal-demo">
            <div class="modal-dialog"> 
                <div class="modal-content"> 
                    <div class="custom-modal-title"> 
                        <button type="button" class="close" onclick="Custombox.close();"><span>&times;</span><span class="sr-only">Close</span></button> 
                        <h4 class="custom-modal-title">Edit kehadiran</h4> 
                    </div> 
                    <div class="modal-body"> 
                        <div class="editmodal">
                            <div class="row"> 
                                <div class="col-md-6"> 
                                    <div class="form-group"> 
                                        <label for="field-11" class="control-label">Masuk</label> 
                                        <input type="text" id="field-11" placeholder="Masuk" data-a-sign="" class="form-control">
                                    </div> 
                                </div> 
                                <div class="col-md-6"> 
                                    <div class="form-group"> 
                                        <label for="field-12" class="control-label">Keluar</label> 
                                        <input type="text" id="field-12" placeholder="Keluar" data-a-sign="" class="form-control">
                                    </div> 
                                </div>
                            </div> 
                            <div class="row"> 
                                <div class="col-md-12"> 
                                    <div class="form-group no-margin"> 
                                        <label for="field-13" class="control-label">Keterangan</label> 
                                        <textarea class="form-control autogrow" id="field-13" placeholder="Keterangan" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                                    </div> 
                                </div> 
                            </div> 
                        </div>
                        <div class="deletemodal hidden">
                            <input type="hidden" name="textkode" id="textkode" value="">
                            <input type="hidden" name="texttanggal" id="texttanggal" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus barang ini?</p></div>
                        </div>
                    </div> 
                    <div class="modal-footer editaja"> 
                        <div class="editmodal">
                        <button type="button" class="btn btn-default waves-effect" onclick="Custombox.close();" data-dismiss="modal">Close</button> 
                            <button type="button" class="btn btn-info waves-effect waves-light" id="btn_edit">Simpan</button> 
                        </div>
                        <div class="deletemodal hidden">
                        <button type="button" class="btn btn-default waves-effect" onclick="Custombox.close();" data-dismiss="modal">Close</button> 
                            <button type="button" class="btn btn-danger waves-effect waves-light" id="btn_hapus">Hapus</button> 
                        </div>
                    </div> 
                </div> 
            </div>
        </div>
        <!-- END Modal -->
            <?php
              $this->load->view('layouts/superadmin/footer');
            ?>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".select2").select2();
                $('#datepicker').datepicker({ format: "MM-yyyy",
                    viewMode: "months", 
                    minViewMode: "months",
                    autoclose:true });
                $('#btn_cari').on('click',function(){
                    table.ajax.reload();
                });
                
                $('#field-11').clockpicker({
                    placement: 'bottom',
                    align: 'left',
                    autoclose: true,
                    'default': 'now'
                });
                $('#field-12').clockpicker({
                    placement: 'bottom',
                    align: 'left',
                    autoclose: true,
                    'default': 'now'
                });
                $('#field-2').datepicker({ format: "dd-mm-yyyy",
                    autoclose:true });
                $('#field-3').clockpicker({
                    placement: 'bottom',
                    align: 'left',
                    autoclose: true,
                    'default': 'now'
                });
                $('#field-4').clockpicker({
                    placement: 'bottom',
                    align: 'left',
                    autoclose: true,
                    'default': 'now'
                });
                    var demo1 = $('#datepicker').val();
                    var table = $("#datatable-buttons").DataTable({
                      processing: true,
                      serverSide: true,
                      ajax: {   url: "<?php echo base_url().'index.php/transaksi_kehadiran/get_kehadiran_json'?>", 
                                type: "POST",
                              /*"contentType": "application/json",
                              */data: function(d){
                                 d.id_search = $("#fieldfilter-4").val();
                                 d.extra_search = $('#datepicker').val();
                              }
                        },
                            columns: [
                                {"data": "view"},
                                {"data": "nama_lengkap"},
                                {"data": "tgl_masuk", className:"text-right"},
                                {"data": "tgl_keluar", className:"text-right"},
                                                        //render harga dengan format angka
                                {"data": "keterangan"}
                          ],
                        order: [[2, 'asc']],
                        dom: "Bfrtip",
                        buttons: [{
                            extend: "copy",
                            className: "btn-sm"
                        }, {
                            extend: "csv",
                            className: "btn-sm"
                        }, {
                            extend: "excel",
                            className: "btn-sm"
                        }, {
                            extend: "pdf",
                            className: "btn-sm"
                        }, {
                            extend: "print",
                            className: "btn-sm"
                        }]
                    });
              $('.autonumber').autoNumeric('init');  

                function clearForm(){
                    $('#field-1').val('').trigger('change');
                    $('#field-2').val('');
                    $('#field-3').val('');
                    $('#field-4').val('');
                    $('#field-5').val('');
                    $('#field-6').val('');
                    $('#field-11').val('');
                    $('#field-12').val('');
                    $('#field-13').val('');
                    $('#field-14').val('');
                    $('#field-15').val('');
                    $('#field-16').val('');
                }

                function bukatutup(status){
                    $('#field-11').prop("readonly", status);
                    $('#field-12').prop("readonly", status);
                    $('#field-13').prop("readonly", status);
                    $('#field-14').prop("readonly", status);
                    $('#field-15').prop("readonly", status);
                    $('#field-16').prop("readonly", status);
                }
                //Simpan Barang
                $('#btn_simpan').on('click',function(){
                    var gol=$('#field-1').val();
                    var es=$('#field-2').val();
                    var ga=$('#field-3').val();
                    var bo=$('#field-4').val();
                    var ket=$('#field-5').val();
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('index.php/transaksi_kehadiran/simpan_kehadiran')?>",
                        dataType : "JSON",
                        data : {gol:gol , es:es, ga:ga ,bo:bo,ket:ket},
                        success: function(data){
                            Custombox.close();
                            clearForm();
                            table.ajax.reload();
                        }
                    });
                    return false;
                });  

                //GET UPDATE
                $('#datatable-buttons').on('click','.lihat-row',function(){
                    var id=$(this).attr('data');
                    $.ajax({
                        type : "GET",
                        url  : "<?php echo base_url('index.php/transaksi_kehadiran/get_kehadiran')?>",
                        dataType : "JSON",
                        data : {id:id},
                        success: function(data){
                            bukatutup(true);
                            $('.editmodal').removeClass('hidden');
                            $('.deletemodal').addClass('hidden');
                            $('.editaja').addClass('hidden');
                            $( "#triggera" ).trigger( "click" );
                            $.each(data,function(){
                                $('#textkode').val(id);
                                $('#texttanggal').val(data.tanggal);
                                $('#field-11').val(data.gol);
                                $('#field-12').val(data.es);
                                $('#field-13').val(data.keterangan);
                            });
                        }
                    });
                    return false;
                });

                $('#datatable-buttons').on('click','.hapus-row',function(){
                    var id=$(this).attr('data');
                    bukatutup(false);
                    $('.editaja').removeClass('hidden');
                    $('.editmodal').addClass('hidden');
                    $('.deletemodal').removeClass('hidden');
                    $('#textkode').val(id);
                    $( "#triggera" ).trigger( "click" );
                });
                //GET UPDATE
                $('#datatable-buttons').on('click','.edit-row',function(){
                    var id=$(this).attr('data');
                    $.ajax({
                        type : "GET",
                        url  : "<?php echo base_url('index.php/transaksi_kehadiran/get_kehadiran')?>",
                        dataType : "JSON",
                        data : {id:id},
                        success: function(data){
                            $('.editmodal').removeClass('hidden');
                            $('.deletemodal').addClass('hidden');
                            bukatutup(false);
                            $('.editaja').removeClass('hidden');
                            $( "#triggera" ).trigger( "click" );
                            $.each(data,function(){
                                $('#textkode').val(id);
                                $('#texttanggal').val(data.tanggal);
                                $('#field-11').val(data.gol);
                                $('#field-12').val(data.es);
                                $('#field-13').val(data.keterangan);
                            });
                        }
                    });
                    return false;
                });

                //Update Barang
                $('#btn_edit').on('click',function(){
                    var gol=$('#field-11').val();
                    var es=$('#field-12').val();
                    var ga=$('#field-13').val();
                    var tanggal=$('#texttanggal').val();
                    var kode=$('#textkode').val();
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('index.php/transaksi_kehadiran/update_kehadiran')?>",
                        dataType : "JSON",
                        data : {gol:gol , es:es, ga:ga,kode:kode,tanggal:tanggal},
                        success: function(data){
                            Custombox.close();
                            clearForm();
                            table.ajax.reload();
                        }
                    });
                    return false;
                });
            });
        </script>




    </body>
</html>