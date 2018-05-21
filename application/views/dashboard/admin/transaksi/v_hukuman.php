            <?php
              $this->load->view('layouts/administrator/header');
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

                            <h4 class="m-t-0 header-title"><b>Pengajuan Hukuman</b></h4>
                            </div>
                            <div class="col-md-6">

                            <a href="#" class="btn btn-default btn-md waves-effect waves-light m-b-30 pull-right hidden" data-animation="slit" id="triggera" data-overlayspeed="200" data-overlaycolor="#36404a" data-toggle="modal" data-target="#customedit-modal"></a>
                            <a href="#" class="btn btn-default btn-md waves-effect waves-light m-b-30 pull-right" data-animation="slit" data-toggle="modal" data-target="#custom-modal"><i class="md md-add"></i> Ajuan Hukuman</a>
                            </div>
                            </div>
                            <p class="text-muted font-13 m-b-30">
                            </p>

                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Status</th>
                                    <th>Nama Lengkap</th>
                                    <th>Potongan</th>
                                    <th>Tanggal Pengajuan</th>
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

        <!-- <div id="custom-modal" class="modal-demo">
            <div class="modal-dialog"> 
                <div class="modal-content"> 
                    <div class="custom-modal-title"> 
                        <button type="button" class="close" onclick="Custombox.close();"><span>&times;</span><span class="sr-only">Close</span></button> 
                        <h4 class="custom-modal-title">Transaksi Hukuman</h4> 
                    </div> 
                    <div class="modal-body">
                    </div> 
                    <div class="modal-footer"> 
                        <button type="button" class="btn btn-default waves-effect" onclick="Custombox.close();" data-dismiss="modal">Close</button> 
                        <button type="button" class="btn btn-info waves-effect waves-light" id="btn_simpan">Simpan</button> 
                    </div> 
                </div> 
            </div>
        </div> -->

        <div id="custom-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
                <div class="modal-content"> 
                    <div class="modal-header"> 
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                        <h4 class="modal-title">Pengajuan Hukuman</h4> 
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
                                    <label for="field-2" class="control-label">Potongan</label> 
                                    <input class="form-control autonumber" id="field-2" data-a-sign="" placeholder="Potongan"> 
                                </div> 
                            </div> 
                        </div>  
                        <div class="row"> 
                            <div class="col-md-12"> 
                                <div class="form-group no-margin"> 
                                    <label for="field-16" class="control-label">Keterangan</label> 
                                    <textarea class="form-control autogrow" id="field-3" placeholder="Keterangan" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                                </div> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="modal-footer"> 
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                        <button type="button" class="btn btn-info waves-effect waves-light" id="btn_simpan">Save changes</button> 
                    </div> 
                </div> 
            </div>
        </div><!-- /.modal -->

        <div id="customedit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
                <div class="modal-content"> 
                    <div class="modal-header"> 
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                        <h4 class="modal-title">Edit Hukuman</h4> 
                    </div> 
                    <div class="modal-body"> 
                        <div class="editmodal hidden">
                            <div class="row"> 
                                <div class="col-md-6"> 
                                    <div class="form-group"> 
                                        <label for="field-11" class="control-label">Pegawai</label> 
                                        
                                        <select id="field-11" class="form-control select2">
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
                                        <label for="field-12" class="control-label">Potongan</label> 
                                        <input class="form-control autonumber" id="field-12" data-a-sign="" placeholder="Potongan"> 
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
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus hukuman ini?</p></div>
                        </div>
                    </div> 
                    <div class="modal-footer"> 
                        <div class="editmodal">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                            <button type="button" class="btn btn-info waves-effect waves-light" id="btn_edit">Ubah</button> 
                        </div>
                        <div class="deletemodal">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                            <button type="button" class="btn btn-danger waves-effect waves-light" id="btn_hapus">Hapus</button> 
                        </div>
                    </div> 
                </div> 
            </div>
        </div>

        <div id="customapprove-modal" class="modal-demo">
            <div class="modal-dialog"> 
                <div class="modal-content"> 
                    <div class="custom-modal-title"> 
                        <button type="button" class="close" onclick="Custombox.close();"><span>&times;</span><span class="sr-only">Close</span></button> 
                        <h4 class="custom-modal-title">Action Hukuman</h4> 
                    </div> 
                    <div class="modal-body"> 
                        <div class="">
                            <div class="row"> 
                                <div class="col-md-12"> 
                                    <div class="form-group no-margin"> 
                                        <label for="field-13" class="control-label">Keterangan</label> 
                                        <textarea class="form-control autogrow" id="field-21" placeholder="Keterangan" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                                    </div> 
                                </div> 
                            </div> 
                        </div>
                        <div class="hidden">
                            <input type="hidden" name="textkodeapprove" id="textkodeapprove" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus hukuman ini?</p></div>
                        </div>
                    </div> 
                    <div class="modal-footer"> 
                        <div class="approvemodal">
                        <button type="button" class="btn btn-default waves-effect" onclick="Custombox.close();" data-dismiss="modal">Close</button> 
                            <button type="button" class="btn btn-info waves-effect waves-light" id="btn_approve">Setujui</button> 
                        </div>
                        <div class="tolakmodal hidden">
                        <button type="button" class="btn btn-default waves-effect" onclick="Custombox.close();" data-dismiss="modal">Close</button> 
                            <button type="button" class="btn btn-danger waves-effect waves-light" id="btn_tolak">Tolak</button> 
                        </div>
                    </div> 
                </div> 
            </div>
        </div><!-- /.modal -->
            <?php
              $this->load->view('layouts/administrator/footer');
            ?>
        <script type="text/javascript">
        $('.select2').select2();
                    var table = $("#datatable-buttons").DataTable({
                      processing: true,
                      serverSide: true,
                              ajax: {"url": "<?php echo base_url().'index.php/transaksi_hukuman/get_hukuman_json'?>", "type": "POST"},
                                    columns: [
                                        {"data": "view"},
                                        {"data": "ubah_status", className:"text-right"},
                                        {"data": "nama_lengkap"},
                                        {"data": "cost", render: $.fn.dataTable.render.number(',', '.', ''), className: "text-right"},
                                        {"data": "tgl_buat", className:"text-right"},
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
                    $('#field-1').val('').trigger('change');;
                    $('#field-2').val('');
                    $('#field-3').val('');
                    $('#field-4').val('');
                    $('#field-5').val('');
                    $('#field-6').val('');
                    $('#field-11').val('').trigger('change');;
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
                    var es=$('#field-2').autoNumeric('get');
                    var ga=$('#field-3').val();
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('index.php/transaksi_hukuman/simpan_hukuman')?>",
                        dataType : "JSON",
                        data : {gol:gol , es:es, ga:ga},
                        success: function(data){
                            $('#custom-modal').modal('hide');
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
                        url  : "<?php echo base_url('index.php/transaksi_hukuman/get_hukuman')?>",
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
                                $('#field-11').val(data.a1).trigger('change');;
                                $('#field-12').autoNumeric('set', data.b1);
                                $('#field-13').val(data.c1);
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
                        url  : "<?php echo base_url('index.php/transaksi_hukuman/get_hukuman')?>",
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
                                $('#field-11').val(data.a1).trigger('change');;
                                $('#field-12').autoNumeric('set', data.b1);
                                $('#field-13').val(data.c1);
                            });
                        }
                    });
                    return false;
                });

                //Update Barang
                $('#btn_edit').on('click',function(){
                    var gol=$('#field-11').val();
                    var es=$('#field-12').autoNumeric('get');
                    var ga=$('#field-13').val();
                    var kode=$('#textkode').val();
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('index.php/transaksi_hukuman/update_hukuman')?>",
                        dataType : "JSON",
                        data : {gol:gol , es:es, ga:ga,kode:kode},
                        success: function(data){
                            $('#customedit-modal').modal('hide');
                            clearForm();
                            table.ajax.reload();
                        }
                    });
                    return false;
                });

                //Hapus Barang
                $('#btn_hapus').on('click',function(){
                    var kode=$('#textkode').val();
                    $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('index.php/transaksi_hukuman/hapus_hukuman')?>",
                    dataType : "JSON",
                            data : {kode: kode},
                            success: function(data){
                                $('#customedit-modal').modal('hide');
                                table.ajax.reload();
                            }
                        });
                        return false;
                });
        </script>




    </body>
</html>