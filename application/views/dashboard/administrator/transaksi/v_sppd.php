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

                            <h4 class="m-t-0 header-title"><b>Pengajuan SPPD</b></h4>
                            </div>
                            <div class="col-md-6">


                            <a href="#customapprove-modal" class="btn btn-default btn-md waves-effect waves-light m-b-30 pull-right hidden" data-animation="slit" id="triggerb" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a"></a>
                            <a href="#customedit-modal" class="btn btn-default btn-md waves-effect waves-light m-b-30 pull-right hidden" data-animation="slit" id="triggera" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a"></a>
                            <a href="#custom-modal" class="btn btn-default btn-md waves-effect waves-light m-b-30 pull-right" data-animation="slit" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a"><i class="md md-add"></i> Pengajuan SPPD</a>
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

        <div id="custom-modal" class="modal-demo">
            <div class="modal-dialog"> 
                <div class="modal-content"> 
                    <div class="custom-modal-title"> 
                        <button type="button" class="close" onclick="Custombox.close();"><span>&times;</span><span class="sr-only">Close</span></button> 
                        <h4 class="custom-modal-title">Transaksi SPPD</h4> 
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
                                    <label for="field-2" class="control-label">Project</label> 
                                    <input class="form-control" id="field-2" placeholder="Project" type="text"> 
                                </div>
                            </div> 
                        </div> 
                        <div class="row"> 
                            <div class="input-daterange input-group" id="date-range">
                                <input type="text" placeholder="Awal SPPD" class="form-control" id="field-3" />
                                <span class="input-group-addon bg-custom b-0 text-white">to</span>
                                <input type="text" placeholder="Akhir SPPD" class="form-control" id="field-4" />
                            </div>
                        </div> 
                        <div class="row">
                            <div class="form-group"> 
                                <label for="field-5" class="control-label">Anggaran Sppd</label> 
                                <input class="form-control autonumber" id="field-5" placeholder="Anggaran Sppd" data-a-sign=""> 
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-12"> 
                                <div class="form-group no-margin"> 
                                    <label for="field-6" class="control-label">Keterangan</label> 
                                    <textarea class="form-control autogrow" id="field-6" placeholder="Keterangan" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
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
                        <h4 class="custom-modal-title">Edit SPPD</h4> 
                    </div> 
                    <div class="modal-body"> 
                        <div class="editmodal">
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
                                        <label for="field-2" class="control-label">Project</label> 
                                        <input class="form-control" id="field-12" placeholder="Project" type="text"> 
                                    </div>
                                </div> 
                            </div> 
                            <div class="row"> 
                                <div class="input-daterange input-group" id="date-range1">
                                    <input type="text" placeholder="Awal SPPD" class="form-control" id="field-13" />
                                    <span class="input-group-addon bg-custom b-0 text-white">to</span>
                                    <input type="text" placeholder="Akhir SPPD" class="form-control" id="field-14" />
                                </div>
                            </div> 
                            <div class="row">
                                <div class="form-group"> 
                                    <label for="field-15" class="control-label">Anggaran Sppd</label> 
                                    <input class="form-control autonumber" id="field-15"  data-a-sign="" placeholder="Anggaran Sppd"> 
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-md-12"> 
                                    <div class="form-group no-margin"> 
                                        <label for="field-16" class="control-label">Keterangan</label> 
                                        <textarea class="form-control autogrow" id="field-16" placeholder="Keterangan" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                                    </div> 
                                </div> 
                            </div> 
                        </div>
                        <div class="deletemodal hidden">
                            <input type="hidden" name="textkode" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus cuti ini?</p></div>
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

        <div id="customapprove-modal" class="modal-demo">
            <div class="modal-dialog"> 
                <div class="modal-content"> 
                    <div class="custom-modal-title"> 
                        <button type="button" class="close" onclick="Custombox.close();"><span>&times;</span><span class="sr-only">Close</span></button> 
                        <h4 class="custom-modal-title">Action Cuti</h4> 
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
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus cuti ini?</p></div>
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
        </div>
        <!-- END Modal -->
            <?php
              $this->load->view('layouts/administrator/footer');
            ?>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.select2').select2();
                jQuery('#date-range').datepicker({
                    toggleActive: true,
                    format: "dd/mm/yyyy"
                });
                jQuery('#date-range1').datepicker({
                    toggleActive: true,
                    format: "dd/mm/yyyy"
                });
                    var table = $("#datatable-buttons").DataTable({
                      processing: true,
                      serverSide: true,
                              ajax: {"url": "<?php echo base_url().'index.php/transaksi_sppd/get_sppd_json'?>", "type": "POST"},
                                    columns: [
                                        {"data": "view"},
                                        {"data": "ubah_status", className:"text-right"},
                                        {"data": "nama_lengkap"},
                                        {"data": "tgl_pengajuan", className:"text-right"},
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
                    $('#field-1').val('');
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
                    $('#field-21').val('');
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
                    var a1=$('#field-1').val();
                    var b1=$('#field-5').autoNumeric('get');
                    var c1=$('#field-6').val();
                    var d1=$('#field-2').val();
                    var e1=$('#field-3').val();
                    var f1=$('#field-4').val();
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('index.php/transaksi_sppd/simpan_sppd')?>",
                        dataType : "JSON",
                        data : {a2:a1 , b2:b1, c2:c1,d2:d1 , e2:e1, f2:f1},
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
                        url  : "<?php echo base_url('index.php/transaksi_sppd/get_sppd')?>",
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
                                $('#field-11').val(data.a1).trigger('change');
                                $('#field-15').autoNumeric('set', data.b1);
                                $('#field-16').val(data.c1);
                                $('#field-12').val(data.f1);
                                $('#field-13').datepicker('setDate', new Date(data.d1));
                                $('#field-14').datepicker('setDate', new Date(data.e1));
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

                //Approve


                $('#datatable-buttons').on('click','.approve-row',function(){
                    var id=$(this).attr('data');
                    $('#textkodeapprove').val(id);
                    $('.approvemodal').removeClass('hidden');
                    $('.tolakmodal').addClass('hidden');
                    $( "#triggerb" ).trigger( "click" );
                });
                $('#datatable-buttons').on('click','.reject-row',function(){
                    var id=$(this).attr('data');
                    $('#textkodeapprove').val(id);
                    $('.approvemodal').addClass('hidden');
                    $('.tolakmodal').removeClass('hidden');
                    $( "#triggerb" ).trigger( "click" );
                });
                //GET UPDATE
                $('#datatable-buttons').on('click','.edit-row',function(){
                    var id=$(this).attr('data');
                    $.ajax({
                        type : "GET",
                        url  : "<?php echo base_url('index.php/transaksi_sppd/get_sppd')?>",
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
                                $('#field-11').val(data.a1).trigger('change');
                                $('#field-15').autoNumeric('set', data.b1);
                                $('#field-16').val(data.c1);
                                $('#field-12').val(data.f1);
                                $('#field-13').datepicker('setDate', new Date(data.d1));
                                $('#field-14').datepicker('setDate', new Date(data.e1));
                            });
                        }
                    });
                    return false;
                });

                //Update Barang
                $('#btn_edit').on('click',function(){
                    var a1=$('#field-1').val();
                    var b1=$('#field-5').autoNumeric('get');
                    var c1=$('#field-6').val();
                    var d1=$('#field-2').val();
                    var e1=$('#field-3').val();
                    var f1=$('#field-4').val();
                    var kode=$('#textkode').val();
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('index.php/transaksi_sppd/update_sppd')?>",
                        dataType : "JSON",
                        data : {a2:a1 , b2:b1, c2:c1,d2:d1 , e2:e1, f2:f1,kode:kode},
                        success: function(data){
                            Custombox.close();
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
                    url  : "<?php echo base_url('index.php/transaksi_sppd/hapus_sppd')?>",
                    dataType : "JSON",
                            data : {kode: kode},
                            success: function(data){
                                Custombox.close();
                                table.ajax.reload();
                            }
                        });
                        return false;
                });

                //Approve

                $('#btn_approve').on('click',function(){
                    var kode=$('#textkodeapprove').val();
                    $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('index.php/transaksi_sppd/approve_sppd')?>",
                    dataType : "JSON",
                            data : {kode: kode,ket:$('#field-21').val()},
                            success: function(data){
                                Custombox.close();
                                table.ajax.reload();
                            }
                        });
                        return false;
                });

                $('#btn_tolak').on('click',function(){
                    var kode=$('#textkodeapprove').val();
                    $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('index.php/transaksi_sppd/tolak_sppd')?>",
                    dataType : "JSON",
                            data : {kode: kode,ket:$('#field-21').val()},
                            success: function(data){
                                Custombox.close();
                                table.ajax.reload();
                            }
                        });
                        return false;
                });
            });
        </script>




    </body>
</html>