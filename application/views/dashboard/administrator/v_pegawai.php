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

                            <h4 class="m-t-0 header-title"><b>Informasi Pegawai</b></h4>
                            </div>
                            <div class="col-md-6">

                            <a href="#" data-target="#tabs-modal" class="btn btn-default btn-md waves-effect waves-light m-b-30 pull-right hidden" data-toggle="modal" id="triggera"></a>
                            <a href="#" onclick="clearForm()" data-target="#tabs-modal" class="btn btn-default btn-md waves-effect waves-light m-b-30 pull-right" data-toggle="modal" ><i class="md md-add"></i> Tambah Data Pegawai</a>
                            </div>
                            </div>
                            <p class="text-muted font-13 m-b-30">
                            </p>

                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Golongan</th>
                                    <th>Roles</th>
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
        <!-- END wrapper -->



        <div id="tabs-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" style="width:60%;">
                <div class="modal-content p-0">
                    <ul class="nav nav-tabs navtab-bg nav-justified editmodal">
                        <input class="form-control hidden" id="textkode" placeholder="Nama Lengkap" type="text"> 
                        <li id="tabactive" class="active">
                            <a href="#home-2" data-toggle="tab" aria-expanded="true"> 
                                <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                <span class="hidden-xs">Profile</span> 
                            </a> 
                        </li> 
                        <li class=""> 
                            <a href="#profile-2" data-toggle="tab" aria-expanded="false"> 
                                <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                <span class="hidden-xs">Bank</span> 
                            </a> 
                        </li> 
                        <li class=""> 
                            <a href="#detail-2" data-toggle="tab" aria-expanded="false"> 
                                <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                <span class="hidden-xs">Kelengkapan</span> 
                            </a> 
                        </li> 
                        <li class=""> 
                            <a href="#messages-2" data-toggle="tab" aria-expanded="false"> 
                                <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                                <span class="hidden-xs">Photo</span> 
                            </a> 
                        </li> 
                    </ul> 
                    <div class="tab-content editmodal"> 
                        <div class="tab-pane active" id="home-2"> 
                            <div class="row"> 
                                <div class="col-md-12"> 
                                    <div class="form-group"> 
                                        <label for="field-1" class="control-label">Nama Lengkap</label> 
                                        <input class="form-control" id="field-1" placeholder="Nama Lengkap" type="text"> 
                                    </div> 
                                </div> 
                            </div>  
                            <div class="row"> 
                                <div class="col-md-12"> 
                                    <div class="form-group"> 
                                        <label for="field-2" class="control-label">Username</label> 
                                        <input class="form-control" id="field-2" placeholder="Username" type="text"> 
                                    </div> 
                                </div> 
                            </div>  
                            <div class="row"> 
                                <div class="col-md-12"> 
                                    <div class="form-group"> 
                                        <label for="field-8" class="control-label">NIP</label> 
                                        <input class="form-control" id="field-8" placeholder="NIP" type="text"> 
                                    </div> 
                                </div> 
                            </div>  
                            <div class="row"> 
                                <div class="col-md-6"> 
                                    <div class="form-group"> 
                                        <label for="field-3" class="control-label">Email</label> 
                                        <input class="form-control" id="field-3" placeholder="Email" type="email"> 
                                    </div> 
                                </div> 
                                <div class="col-md-6"> 
                                    <div class="form-group"> 
                                        <label for="field-4" class="control-label">Jam Kerja</label> 
                                            <select id="field-4" class="form-control select2">
                                                <option value="">Pilih Jam Kerja</option>
                                                <?php
                                                    foreach($mst_jam->result_array() as $me)
                                                    {
                                                        
                                                ?>
                                                    <option value="<?php echo $me['id']; ?>"><?php echo $me['nama']; ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                    </div> 
                                </div> 
                            </div>  
                            <div class="row"> 
                                <div class="col-md-6"> 
                                    <div class="form-group"> 
                                        <label for="field-5" class="control-label">Role</label> 
                                            <select id="field-5" class="form-control select2">
                                                <option value="">Pilih Role</option>
                                                <?php
                                                    foreach($mst_role->result_array() as $me)
                                                    {
                                                        
                                                ?>
                                                    <option value="<?php echo $me['id']; ?>"><?php echo $me['nama']; ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                    </div> 
                                </div> 
                                <div class="col-md-6"> 
                                    <div class="form-group"> 
                                        <label for="field-6" class="control-label">Golongan</label> 
                                            <select id="field-6" class="form-control select2">
                                                <option value="">Pilih Golongan</option>
                                                <?php
                                                    foreach($mst_golongan->result_array() as $me)
                                                    {
                                                        
                                                ?>
                                                    <option value="<?php echo $me['id']; ?>"><?php echo $me['golongan'] . ' ' .$me['eselon']; ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                    </div> 
                                </div>
                            </div> 
                            <div class="row"> 
                                <div class="col-md-12"> 
                                    <div class="form-group"> 
                                        <label for="field-7" class="control-label">Password</label> 
                                        <input class="form-control" id="field-7" placeholder="Password" type="password"> 
                                    </div> 
                                </div> 
                            </div> 
                        </div> 
                        <div class="tab-pane" id="profile-2">
                            <div class="row"> 
                                <div class="col-md-12"> 
                                    <div class="form-group"> 
                                        <label for="field-21" class="control-label">Atas Nama</label> 
                                        <input class="form-control" id="field-21" placeholder="Atas Nama" type="text"> 
                                    </div> 
                                </div> 
                            </div>  
                            <div class="row"> 
                                <div class="col-md-6"> 
                                    <div class="form-group"> 
                                        <label for="field-22" class="control-label">Nama Bank</label> 
                                        <input class="form-control" id="field-22" placeholder="Nama Bank" type="text"> 
                                    </div> 
                                </div> 
                                <div class="col-md-6"> 
                                    <div class="form-group"> 
                                        <label for="field-23" class="control-label">No Rekening</label> 
                                        <input type="text" id="field-23" placeholder="No Rekening" data-a-sign="" class="form-control">
                                    </div> 
                                </div> 
                            </div>  
                        </div> 
                        <div class="tab-pane" id="detail-2">
                            <div class="row"> 
                                <div class="col-md-12"> 
                                    <div class="form-group"> 
                                        <label for="field-31" class="control-label">KTP</label> 
                                        <input class="form-control" id="field-31" placeholder="KTP" type="text"> 
                                    </div> 
                                </div> 
                            </div>  
                            <div class="row"> 
                                <div class="col-md-12"> 
                                    <div class="form-group"> 
                                        <label for="field-32" class="control-label">Ijasah Terakhir</label> 
                                        <input class="form-control" id="field-32" placeholder="Ijasah Terakhir" type="text"> 
                                    </div> 
                                </div> 
                            </div>  
                            <div class="row"> 
                                <div class="col-md-12"> 
                                    <div class="form-group"> 
                                        <label for="field-33" class="control-label">Lain2</label> 
                                        <input class="form-control" id="field-33" placeholder="Lain2" type="text"> 
                                    </div> 
                                </div> 
                            </div>  
                        </div> 
                        <div class="tab-pane" id="messages-2">
        
                              <div class="form-group">
                                <p><img class="zoom" src="" id="userimage" /></p>
                                <label class="control-label" for="userfile">Upload Foto</label>
                                <div class="controls">
                                <input type="file" class="form-control" name="userfile" id="userfile" placeholder="Upload Foto">
                                </div>
                            </div>
                        </div> 
                    </div> 
                    <div class="deletemodal hidden">
                        <input type="hidden" name="textkode" id="textkode" value="">
                        <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus pegawai ini?</p></div>
                    </div>
                    <div class="modal-footer editaja"> 
                        <div class="editmodal">
                            <button type="button" class="btn btn-default waves-effect" onclick="Custombox.close();" data-dismiss="modal">Close</button> 
                            <button type="button" class="btn btn-info waves-effect waves-light" id="btn_simpan">Simpan</button> 
                            <button type="button" class="btn btn-info waves-effect waves-light" id="btn_edit">Ubah</button> 
                        </div>
                        <div class="deletemodal hidden">
                            <button type="button" class="btn btn-default waves-effect" onclick="Custombox.close();" data-dismiss="modal">Close</button> 
                            <button type="button" class="btn btn-danger waves-effect waves-light" id="btn_hapus">Hapus</button> 
                        </div>
                    </div> 
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <?php
          $this->load->view('layouts/administrator/footer');
        ?>

        <script type="text/javascript">

                //StartAction
                function clearForm(){
                    bukatutup(false);
                    $('#field-1').val('');
                    $('#field-2').val('');
                    $('#field-3').val('');
                    $('#field-4').val('').trigger('change');
                    $('#field-5').val('').trigger('change');
                    $('#field-6').val('').trigger('change');
                    $('#field-7').val('');
                    $('#field-8').val('');
                    $('#field-11').val('');
                    $('#field-12').val('');
                    $('#field-13').val('');
                    $('#field-21').val('');
                    $('#field-22').val('');
                    $('#field-23').val('');
                    $('#field-31').val('');
                    $('#field-32').val('');
                    $('#field-33').val('');
                    $('#userimage').attr('src','<?php echo base_url(); ?>assets/foto_pegawai/medium/no-img.jpg');
                    $('#btn_edit').addClass('hidden');
                    $('#btn_simpan').removeClass('hidden');
                    $('.editmodal').removeClass('hidden');
                    $('.editaja').removeClass('hidden');
                    $('.deletemodal').addClass('hidden');
                }

                function bukatutup(status){
                    $('#field-1').prop("readonly", status);
                    $('#field-2').prop("readonly", status);
                    $('#field-3').prop("readonly", status);
                    $('#field-4').prop("readonly", status);
                    $('#field-5').prop("readonly", status);
                    $('#field-6').prop("readonly", status);
                    $('#field-7').prop("readonly", status);
                    $('#field-8').prop("readonly", status);
                    $('#field-11').prop("readonly", status);
                    $('#field-12').prop("readonly", status);
                    $('#field-13').prop("readonly", status);
                    $('#field-21').prop("readonly", status);
                    $('#field-22').prop("readonly", status);
                    $('#field-23').prop("readonly", status);
                    $('#field-31').prop("readonly", status);
                    $('#field-32').prop("readonly", status);
                    $('#field-33').prop("readonly", status);
                }
                $(".select2").select2();
                var table = $("#datatable-buttons").DataTable({
                  processing: true,
                  serverSide: true,
                          ajax: {"url": "<?php echo base_url().'index.php/pegawai/get_guest_json'?>", "type": "POST"},
                                columns: [
                                    {"data": "view"},
                                    {"data": "username"},
                                    {"data": "email"},
                                                            //render harga dengan format angka
                                    {"data": "golongan"},
                                    {"data": "roles"}
                              ],
                            order: [[2, 'asc']],
                    dom: "Bfrtip",
                    buttons: [{
                        extend: "copy",
                        className: "btn-sm"
                    },{
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

                //GET Lihat
                $('#datatable-buttons').on('click','.lihat-row',function(){
                    var id=$(this).attr('data');
                    $.ajax({
                        type : "GET",
                        url  : "<?php echo base_url('index.php/pegawai/get_pegawai')?>",
                        dataType : "JSON",
                        data : {id:id},
                        success: function(data){
                            bukatutup(true);
                            $('.editmodal').removeClass('hidden');
                            $('.deletemodal').addClass('hidden');
                            $('.editaja').addClass('hidden');
                            $( "#triggera" ).trigger( "click" );
                            $.each(data,function(){
                                $('#textkode').val(data.ko);
                                $('#field-1').val(data.a1);
                                $('#field-2').val(data.b1);
                                $('#field-3').val(data.c1);
                                $('#field-4').val(data.g1).trigger('change');
                                $('#field-5').val(data.e1).trigger('change');
                                $('#field-6').val(data.f1).trigger('change');
                                $('#field-7').val(data.g1);
                                $('#field-8').val(data.d1);
                                $('#field-21').val(data.h1);
                                $('#field-22').val(data.i1);
                                $('#field-23').val(data.j1);
                                $('#userimage').attr('src','<?php echo base_url(); ?>assets/foto_pegawai/medium/'+data.k1);
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
                    $('#btn_edit').removeClass('hidden');
                    $('#btn_simpan').addClass('hidden');
                    $.ajax({
                        type : "GET",
                        url  : "<?php echo base_url('index.php/pegawai/get_pegawai')?>",
                        dataType : "JSON",
                        data : {id:id},
                        success: function(data){
                            bukatutup(false);
                            $('.editmodal').removeClass('hidden');
                            $('.deletemodal').addClass('hidden');
                            $('.editaja').removeClass('hidden');
                            $( "#triggera" ).trigger( "click" );
                            $.each(data,function(){
                                $('#textkode').val(data.ko);
                                $('#field-1').val(data.a1);
                                $('#field-2').val(data.b1);
                                $('#field-3').val(data.c1);
                                $('#field-4').val(data.g1).trigger('change');
                                $('#field-5').val(data.e1).trigger('change');
                                $('#field-6').val(data.f1).trigger('change');
                                $('#field-7').val(data.g1);
                                $('#field-8').val(data.d1);
                                $('#field-21').val(data.h1);
                                $('#field-22').val(data.i1);
                                $('#field-23').val(data.j1);
                                $('#userimage').attr('src','<?php echo base_url(); ?>assets/foto_pegawai/medium/'+data.k1);
                            });
                        }
                    });
                    return false;
                });

                //Update
                $('#btn_simpan').on('click',function(){
                    var filename = $("#userfile").get(0).files[0];
                    $.ajax({
                        type : "POST",
                        contentType: false,
                        processData: false,
                        url  : "<?php echo base_url('index.php/pegawai/simpan_pegawai')?>",
                        data: function() {
                            var data = new FormData();
                            data.append("a2", $("#field-1").val());
                            data.append("b2", $("#field-2").val());
                            data.append("c2", $("#field-3").val());
                            data.append("d2", $("#field-8").val());
                            data.append("e2", $('#field-5').val());
                            data.append("f2", $('#field-6').val());
                            data.append("g2", $('#field-4').val());
                            data.append("h2", $('#field-21').val());
                            data.append("i2", $('#field-22').val());
                            data.append("j2", $('#field-23').val());
                            data.append("k2", filename);
                            data.append("l2", $('#field-7').val());
                            return data;
                            // Or simply return new FormData(jQuery("form")[0]);
                        }(),
                        success: function(data){
                            $('#tabs-modal').modal('hide');
                            clearForm();
                            table.ajax.reload();
                        }
                    });
                    return false;
                });

                //Update
                $('#btn_edit').on('click',function(){
                    var filename = $("#userfile").get(0).files[0];
                    $.ajax({
                        type : "POST",
                        contentType: false,
                        processData: false,
                        url  : "<?php echo base_url('index.php/pegawai/update_pegawai')?>",
                        data: function() {
                            var data = new FormData();
                            data.append("a2", $("#field-1").val());
                            data.append("b2", $("#field-2").val());
                            data.append("c2", $("#field-3").val());
                            data.append("d2", $("#field-8").val());
                            data.append("e2", $('#field-5').val());
                            data.append("f2", $('#field-6').val());
                            data.append("g2", $('#field-4').val());
                            data.append("h2", $('#field-21').val());
                            data.append("i2", $('#field-22').val());
                            data.append("j2", $('#field-23').val());
                            data.append("k2", filename);
                            data.append("ko", $('#textkode').val());
                            return data;
                            // Or simply return new FormData(jQuery("form")[0]);
                        }(),
                        success: function(data){
                            $('#tabs-modal').modal('hide');
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
                    url  : "<?php echo base_url('index.php/pegawai/hapus_pegawai')?>",
                    dataType : "JSON",
                            data : {kode: kode},
                            success: function(data){
                                $('#tabs-modal').modal('hide');
                                clearForm();
                                table.ajax.reload();
                            }
                        });
                        return false;
                });
        </script>

    </body>
</html>