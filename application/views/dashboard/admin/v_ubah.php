            <?php
              $this->load->view('layouts/admin/header');
            ?>


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row"> 
                            <div class="col-md-12"> 
                                <div class="form-group"> 
                                    <label for="field-1" class="control-label">Password Lama</label> 
                                    <input type="text" id="field-1" placeholder="Password Lama" data-a-sign="" class="form-control">
                                </div> 
                            </div> 
                        </div> 
                        <div class="row"> 
                            <div class="col-md-6"> 
                                <div class="form-group"> 
                                    <label for="field-2" class="control-label">Password Baru</label> 
                                    <input type="text" id="field-2" placeholder="Password Baru" data-a-sign="" class="form-control">
                                </div> 
                            </div> 
                            <div class="col-md-6"> 
                                <div class="form-group"> 
                                    <label for="field-3" class="control-label">Konfirmasi Password</label> 
                                    <input type="text" id="field-3" placeholder="Konfirmasi Password" data-a-sign="" class="form-control">
                                </div> 
                            </div>
                            <div class="col-md-12">
                            <button type="button" class="btn btn-info waves-effect waves-light" id="btn_edit">Ubah</button> 
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

        <?php
          $this->load->view('layouts/admin/footer');
        ?>

        <script type="text/javascript">

                //StartAction
                function clearForm(){
                    $('#field-1').val('');
                    $('#field-2').val('');
                    $('#field-3').val('');
                }

                //Update
                $('#btn_edit').on('click',function(){
                    $.ajax({
                        type : "POST",
                        contentType: false,
                        processData: false,
                        url  : "<?php echo base_url('index.php/pegawai/ubah_password')?>",
                        data: function() {
                            var data = new FormData();
                            data.append("a2", $("#field-1").val());
                            data.append("b2", $("#field-2").val());
                            data.append("c2", $("#field-3").val());
                            return data;
                            // Or simply return new FormData(jQuery("form")[0]);
                        }(),
                        success: function(data){
                            clearForm();
                        }
                    });
                    return false;
                });
        </script>

    </body>
</html>