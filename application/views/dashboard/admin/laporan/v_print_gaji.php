            <?php
              $this->load->view('layouts/administrator/header');
            ?>

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <!-- <div class="panel-heading">
                                        <h4>Invoice</h4>
                                    </div> -->
                                    <div class="panel-body">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                                <h4 class="text-right"><img src="<?php echo base_url(); ?>assets/kantor/<?php echo $photo; ?>" alt="Logo" style="height:100px;weight:100px;"></h4>
                                                
                                            </div>
                                            <div class="pull-right">
                                                <h4>Print Gaji # <br>
                                                    <strong></strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                <div class="pull-left m-t-30">
                                                    <address>
                                                      <strong><?php echo $kantor; ?></strong><br>
                                                      <!-- 795 Folsom Ave, Suite 600<br>
                                                      San Francisco, CA 94107<br> -->
                                                      <abbr title="Phone">P:</abbr> <?php echo $telp; ?>
                                                      </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong>Order Date: </strong> <?php echo date('d/m/Y') ?></p>
                                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-success">Completed</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-h-50"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table m-t-30 table-bordered">
                                                        <thead>
                                                            <tr><th>#</th>
                                                            <th>Nama</th>
                                                            <th>Jenis</th>
                                                            <th>Unit Cost</th>
                                                        </tr></thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td><?php echo $nama_lengkap; ?></td>
                                                                <td>Gaji Pokok</td>
                                                                <td class="text-right"> <?php echo number_format($gaji); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td><?php echo $nama_lengkap; ?></td>
                                                                <td>Sppd</td>
                                                                <td class="text-right"> <?php echo number_format($sppd); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td><?php echo $nama_lengkap; ?></td>
                                                                <td>Penghargaan</td>
                                                                <td class="text-right"> <?php echo number_format($penghargaan); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td><?php echo $nama_lengkap; ?></td>
                                                                <td>Hukuman</td>
                                                                <td class="text-right"> - <?php echo number_format($hukuman); ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px;">
                                            <div class="col-md-3 col-md-offset-9">
                                                <p class="text-right"><b>Sub-total:</b> <?php echo number_format($gaji+$sppd+$penghargaan-$hukuman); ?></p>
                                                <!-- <p class="text-right">Discout: 12.9%</p>
                                                <p class="text-right">VAT: 12.9%</p> -->
                                                <hr>
                                                <h3 class="text-right">Rp <?php echo number_format($gaji+$sppd+$penghargaan-$hukuman); ?></h3>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <a href="#customapprove-modal" class="btn btn-inverse waves-effect waves-light"  data-animation="slit" id="triggerb" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a"><i class="fa fa-print"></i> Print</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer">
                    © 2016. All rights reserved.
                </footer>

            </div>

        <div id="customapprove-modal" class="modal-demo">
            <div class="modal-dialog"> 
                <div class="modal-content"> 
                    <div class="custom-modal-title"> 
                        <button type="button" class="close" onclick="Custombox.close();"><span>&times;</span><span class="sr-only">Close</span></button> 
                        <h4 class="custom-modal-title">Action Print</h4> 
                    </div> 
                    <div class="modal-body"> 
                        <div class="">
                            <input type="hidden" name="textkodeapprove" id="textkodeapprove" value="">
                            <div class="alert alert-warning"><p>Apakah Anda mengirim ke email pegawai?</p></div>
                        </div>
                    </div> 
                    <div class="modal-footer"> 
                        <div class="approvemodal">
                        <button type="button" class="btn btn-default waves-effect" id="btn_email">Email</button> 
                            <button type="button" class="btn btn-info waves-effect waves-light" id="btn_approve">Print</button> 
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
            $('#btn_approve').on('click',function(){
                javascript:window.print();
            });
            $('#btn_email').on('click',function(){
                var kode='<?php echo $kode ?>';
                $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/laporan_gaji/email')?>",
                dataType : "JSON",
                        data : {kode: kode},
                        success: function(data){
                            Custombox.close();
                        }
                    });
                    return false;
            });
        </script>


    </body>
</html>