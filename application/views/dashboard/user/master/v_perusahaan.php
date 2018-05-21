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

                            <h4 class="m-t-0 header-title"><b>Master Perusahaan</b></h4>
                            </div>
                            <div class="col-md-6">

                            <a href="#customedit-modal" class="btn btn-default btn-md waves-effect waves-light m-b-30 pull-right hidden" data-animation="slit" id="triggera" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a"></a>
                            <a href="#custom-modal" class="btn btn-default btn-md waves-effect waves-light m-b-30 pull-right hidden" data-animation="slit" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a"><i class="md md-add"></i> Tambah Perusahaan</a>
                            </div>
                            </div>
                            <p class="text-muted font-13 m-b-30">
                            </p>

                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Email Perusahaan</th>
                                    <th>Alamat</th>
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

        <!-- Modal 
        <div id="custom-modal" class="modal-demo">
            <button type="button" class="close" onclick="Custombox.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title">Master Status Pegawai</h4>
            <div class="custom-modal-text">
                      <div class="form-group col-md-12">
                        <div class="col-md-3"><strong>No Golongan</strong></div>
                        <div class="col-md-9">
                          <input type="text" class="form-control" name="nama_golongan" id="nama_golongan" value="" placeholder="Nama Status">
                        </div>
                      </div>
                      <input type="hidden" name="id_param" value="">
                      <input type="hidden" name="st" value="">
                      <br>
                      <div class="control-group">
                        <div class="controls">
                          <button type="submit" class="btn btn-primary" id="btn_simpan">Simpan Data</button>
                          <button type="reset" class="btn">Reset</button>
                        </div>
                      </div>
            </div>
        </div>-->

        <div id="custom-modal" class="modal-demo">
            <div class="modal-dialog"> 
                <div class="modal-content"> 
                    <div class="custom-modal-title"> 
                        <button type="button" class="close" onclick="Custombox.close();"><span>&times;</span><span class="sr-only">Close</span></button> 
                        <h4 class="custom-modal-title">Master Perusahaan</h4> 
                    </div> 
                    <div class="modal-body"> 
                        <div class="row"> 
                            <div class="col-md-12"> 
                                <div class="form-group"> 
                                    <label for="field-1" class="control-label">Nama</label> 
                                    <input class="form-control" id="field-1" placeholder="Nama" type="text"> 
                                </div> 
                            </div> 
                        </div>  
                        <div class="row"> 
                            <div class="col-md-6"> 
                                <div class="form-group"> 
                                    <label for="field-2" class="control-label">Jam Masuk</label> 
                                    <input type="text" id="field-2" placeholder="Jam Masuk" data-a-sign="" class="form-control">
                                </div> 
                            </div> 
                            <div class="col-md-6"> 
                                <div class="form-group"> 
                                    <label for="field-3" class="control-label">Jam Keluar</label> 
                                    <input type="text" id="field-3" placeholder="Jam Keluar" data-a-sign="" class="form-control">
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
                        <h4 class="custom-modal-title">Edit Perusahaan</h4> 
                    </div> 
                    <div class="modal-body"> 
                        <div class="editmodal">
                            <div class="row"> 
                                <div class="col-md-6"> 
                                    <div class="form-group"> 
                                        <label for="field-12" class="control-label">Nama</label> 
                                        <input type="text" id="field-11" placeholder="Nama" value="" data-a-sign="" class="form-control">
                                    </div> 
                                </div> 
                                <div class="col-md-6"> 
                                    <div class="form-group"> 
                                        <label for="field-13" class="control-label">Email</label> 
                                        <input type="text" id="field-12" placeholder="Email" value="" data-a-sign="" class="form-control"/>
                                    </div> 
                                </div>
                            </div> 
                            <div class="row"> 
                                <div class="col-md-12"> 
                                    <div class="form-group"> 
                                        <label for="field-11" class="control-label">Alamat</label> 
                                        <input class="form-control" id="field-13" placeholder="Alamat" type="text"> 
                                    </div> 
                                </div> 
                            </div>  
                            <div class="row">
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
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus Perusahaan ini?</p></div>
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
                    var table = $("#datatable-buttons").DataTable({
                      processing: true,
                      serverSide: true,
                              ajax: {"url": "<?php echo base_url().'index.php/master_perusahaan/get_perusahaan_json'?>", "type": "POST"},
                                    columns: [
                                        {"data": "view"},
                                        {"data": "nama"},
                                        {"data": "email"},
                                                                //render harga dengan format angka
                                        {"data": "alamat"}
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
                    $('#field-11').val('');
                    $('#field-12').val('');
                    $('#field-13').val('');
                }

                function bukatutup(status){
                    $('#field-11').prop("readonly", status);
                    $('#field-12').prop("readonly", status);
                    $('#field-13').prop("readonly", status);
                }

                //GET UPDATE
                $('#datatable-buttons').on('click','.lihat-row',function(){
                    var id=$(this).attr('data');
                    $.ajax({
                        type : "GET",
                        url  : "<?php echo base_url('index.php/master_jam_kerja/get_jam')?>",
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
                                $('#field-11').val(data.a1);
                                $('#field-12').val(data.b1);
                                $('#field-13').val(data.c1);
                                $('#userimage').attr('src','<?php echo base_url(); ?>assets/kantor/medium/'+data.d1);
                            });
                        }
                    });
                    return false;
                });
                //GET UPDATE
                $('#datatable-buttons').on('click','.edit-row',function(){
                    var id=$(this).attr('data');
                    $.ajax({
                        type : "GET",
                        url  : "<?php echo base_url('index.php/master_perusahaan/get_perusahaan')?>",
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
                                $('#field-11').val(data.a1);
                                $('#field-12').val(data.b1);
                                $('#field-13').val(data.c1);
                                $('#userimage').attr('src','<?php echo base_url(); ?>assets/kantor/medium/'+data.d1);
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
                    var kode=$('#textkode').val();
                    var filename = $("#userfile").get(0).files[0];
                    $.ajax({
                        type : "POST",
                        contentType: false,
                        processData: false,
                        url  : "<?php echo base_url('index.php/master_perusahaan/update_perusahaan')?>",
                        data: function() {
                            var data = new FormData();
                            data.append("a2", $("#field-11").val());
                            data.append("b2", $("#field-12").val());
                            data.append("c2", $("#field-13").val());
                            data.append("d2", filename);
                            data.append("kode", kode);
                            return data;
                            // Or simply return new FormData(jQuery("form")[0]);
                        }(),
                        success: function(data){
                            Custombox.close();
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
                    url  : "<?php echo base_url('index.php/master_jam_kerja/hapus_jam')?>",
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