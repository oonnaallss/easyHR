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

                            <h4 class="m-t-0 header-title"><b>Pengajuan Kehadiran</b></h4>
                            </div>
                            <div class="col-md-6">

                            <a href="#customedit-modal" class="btn btn-default btn-md waves-effect waves-light m-b-30 pull-right hidden" data-animation="slit" id="triggera" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a"></a>
                            <a href="#custom-modal" class="btn btn-default btn-md waves-effect waves-light m-b-30 pull-right hidden" data-animation="slit" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a"><i class="md md-add"></i> Ajuan kehadiran</a>
                            </div>
                            </div>
                            <div class="row m-t-10 m-b-10">
                                <div class="col-sm-4 col-lg-4">
                                    <div class="form-group contact-search m-b-30">
                                        <select id="field-4" class="form-control select2">
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
                                    <label for="field-1" class="control-label">Golongan</label> 
                                    <input type="text" placeholder="Golongan" data-v-max="999" id="field-1" data-v-min="0" class="form-control autonumber">
                                </div> 
                            </div> 
                            <div class="col-md-6"> 
                                <div class="form-group"> 
                                    <label for="field-2" class="control-label">Eselon</label> 
                                    <input class="form-control" id="field-2" placeholder="Eselon" type="text"> 
                                </div> 
                            </div> 
                        </div>  
                        <div class="row"> 
                            <div class="col-md-5"> 
                                <div class="form-group"> 
                                    <label for="field-3" class="control-label">Gaji</label> 
                                    <input type="text" id="field-3" placeholder="Gaji" data-a-sign="" class="form-control autonumber">
                                </div> 
                            </div> 
                            <div class="col-md-5"> 
                                <div class="form-group"> 
                                    <label for="field-4" class="control-label">Bonus</label> 
                                    <input type="text" id="field-4" placeholder="Bonus" data-a-sign="" class="form-control autonumber">
                                </div> 
                            </div>
                            <div class="col-md-2"> 
                                <div class="form-group"> 
                                    <label for="field-5" class="control-label">Cuti</label> 
                                    <input type="text" id="field-5" placeholder="Cuti" data-v-max="99" data-v-min="0" class="form-control autonumber">
                                </div> 
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
                        <h4 class="custom-modal-title">Edit kehadiran</h4> 
                    </div> 
                    <div class="modal-body"> 
                        <div class="editmodal">
                            <div class="row"> 
                                <div class="col-md-6"> 
                                    <div class="form-group"> 
                                        <label for="field-11" class="control-label">Golongan</label> 
                                        <input type="text" placeholder="Golongan" data-v-max="999" id="field-11" data-v-min="0" class="form-control autonumber">
                                    </div> 
                                </div> 
                                <div class="col-md-6"> 
                                    <div class="form-group"> 
                                        <label for="field-12" class="control-label">Eselon</label> 
                                        <input class="form-control" id="field-12" placeholder="Eselon" type="text"> 
                                    </div> 
                                </div> 
                            </div>  
                            <div class="row"> 
                                <div class="col-md-5"> 
                                    <div class="form-group"> 
                                        <label for="field-13" class="control-label">Gaji</label> 
                                        <input type="text" id="field-13" placeholder="Gaji" data-a-sign="" class="form-control autonumber">
                                    </div> 
                                </div> 
                                <div class="col-md-5"> 
                                    <div class="form-group"> 
                                        <label for="field-14" class="control-label">Bonus</label> 
                                        <input type="text" id="field-14" placeholder="Bonus" data-a-sign="" class="form-control autonumber">
                                    </div> 
                                </div>
                                <div class="col-md-2"> 
                                    <div class="form-group"> 
                                        <label for="field-15" class="control-label">Cuti</label> 
                                        <input type="text" id="field-15" placeholder="Cuti" data-v-max="99" data-v-min="0" class="form-control autonumber">
                                    </div> 
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
              $this->load->view('layouts/administrator/footer');
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
                    console.log($(".select2").val(),$('#datepicker').val());
                });
                    var table = $("#datatable-buttons").DataTable({
                      processing: true,
                      serverSide: true,
                      ajax: {"url": "<?php echo base_url().'index.php/transaksi_kehadiran/get_kehadiran_json'?>", "type": "POST"
                              /*"contentType": "application/json",
                              "data": {
                                "user_id": $('#datepicker').val(),
                                "bulan": $(".select2").val()
                              }*/
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
                    var gol=$('#field-1').autoNumeric('get');
                    var es=$('#field-2').val();
                    var ga=$('#field-3').autoNumeric('get');
                    var bo=$('#field-4').autoNumeric('get');
                    var cu=$('#field-5').autoNumeric('get');
                    var ket=$('#field-6').val();
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('index.php/master/simpan_golongan')?>",
                        dataType : "JSON",
                        data : {gol:gol , es:es, ga:ga ,bo:bo,cu:cu,ket:ket},
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
                        url  : "<?php echo base_url('index.php/master/get_golongan')?>",
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
                                $('#field-11').autoNumeric('set', data.gol);
                                $('#field-12').val(data.ese);
                                $('#field-13').autoNumeric('set', data.gaji);
                                $('#field-14').autoNumeric('set', data.bonus);
                                $('#field-15').autoNumeric('set', data.cuti);
                                $('#field-16').val(data.keterangan);
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
                        url  : "<?php echo base_url('index.php/master/get_golongan')?>",
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
                                $('#field-11').autoNumeric('set', data.gol);
                                $('#field-12').val(data.ese);
                                $('#field-13').autoNumeric('set', data.gaji);
                                $('#field-14').autoNumeric('set', data.bonus);
                                $('#field-15').autoNumeric('set', data.cuti);
                                $('#field-16').val(data.keterangan);
                            });
                        }
                    });
                    return false;
                });

                //Update Barang
                $('#btn_edit').on('click',function(){
                    var gol=$('#field-11').autoNumeric('get');
                    var es=$('#field-12').val();
                    var ga=$('#field-13').autoNumeric('get');
                    var bo=$('#field-14').autoNumeric('get');
                    var cu=$('#field-15').autoNumeric('get');
                    var ket=$('#field-16').val();
                    var kode=$('#textkode').val();
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('index.php/master/update_golongan')?>",
                        dataType : "JSON",
                        data : {gol:gol , es:es, ga:ga ,bo:bo,cu:cu,ket:ket,kode:kode},
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
                    url  : "<?php echo base_url('index.php/master/hapus_golongan')?>",
                    dataType : "JSON",
                            data : {kode: kode},
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