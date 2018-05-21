<?php
              $this->load->view('layouts/user/header');
            ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="btn-group pull-right m-t-15">
                                    <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                                    <ul class="dropdown-menu drop-menu-right" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>

                                <h4 class="page-title">Dashboard</h4>
                                <p class="text-muted page-title-alt">Selamat datang di <?php echo $credit; ?> admin panel !</p>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6 col-lg-6">
                                <div class="card-box">
                                    <h4 class="text-dark header-title m-t-0 m-b-30">Absen Kehadiran</h4>
                                    
                                    <?php if($absen == 0){
                                        if($status_login != ''){
                                        ?>
                                        <p class="text-muted text-center">Tanggal <?php echo $tgl_sekarang; ?> Anda Sudah Absen Masuk</p>
                                        <div class="widget-chart text-center">
                                            <button class="ladda-button btn btn-success hidden" id="btn_masuk" data-style="contract">Masuk
                                                    </button>
                                            <button class="ladda-button btn btn-danger" id="btn_keluar" data-style="contract">Keluar
                                                    </button>
                                        </div>
                                        <?php } else { ?>
                                        <p class="text-muted text-center">Tanggal <?php echo $tgl_sekarang; ?> Anda Belum Absen Kehadiran</p>

                                        <div class="widget-chart text-center">
                                            <button class="ladda-button btn btn-success" id="btn_masuk" data-style="contract">Masuk
                                                    </button>
                                            <button class="ladda-button btn btn-danger hidden" id="btn_keluar" data-style="contract">Keluar
                                                    </button>
                                        </div>
                                        <?php 
                                        }
                                    } else { ?>
                                        <p class="text-muted text-center">Tanggal <?php echo $tgl_sekarang; ?> Anda Sudah Absen</p>
                                    <?php } ?>
                                        <small>( Personal )</small>
                                </div>

                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box fadeInDown animated">
                                    <div class="bg-icon bg-icon-info pull-left">
                                        <i class="md md-attach-money text-info"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?php echo $pegawai; ?></b></h3>
                                        <p class="text-muted">Permintaan Cuti</p>
                                        <small>( Semua Pegawai )</small>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-pink pull-left">
                                        <i class="md md-add-shopping-cart text-pink"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter"><?php echo $kehadiran; ?></b></h3>
                                        <p class="text-muted">Kehadiran <?php echo date('M'); ?></p>
                                        <small>( Personal )</small>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row hidden">
                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box fadeInDown animated">
                                    <div class="bg-icon bg-icon-info pull-left">
                                        <i class="md md-attach-money text-info"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter">15</b></h3>
                                        <p class="text-muted">Sisa Cuti</p>
                                        <small>( Personal )</small>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3 hidden    ">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-pink pull-left">
                                        <i class="md md-add-shopping-cart text-pink"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter">280</b></h3>
                                        <p class="text-muted">Total Masuk</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="widget">
                                            <div class="widget-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div id="external-events" class="m-t-20">
                                                            <br>
                                                            <p>Uraian Navigasi</p>
                                                            <a href="#custom-modalcuti" class="fc-day-grid-event fc-h-event fc-event fc-start fc-end  fc-draggable cutinav" data-animation="slit" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a" style="background-color:#fb6d9d">
                                                                <div class="row">
                                                                    <div class="external-event bg-pink" data-class="bg-pink">
                                                                        <i class="fa fa-move"></i>Cuti
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end col-->
                                    <div class="col-md-9">
                                        <div class="card-box">
                                            <div id="calendar"></div>
                                        </div>
                                    </div> <!-- end col -->
                                </div>  <!-- end row -->

                                <!-- BEGIN MODAL -->
                                <div class="modal fade none-border" id="event-modal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title"><strong>View Event</strong></h4>
                                            </div>
                                            <div class="modal-body infohtml"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END MODAL -->
                            </div>
                            <!-- end col-12 -->
                        </div> <!-- end row -->
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    © 2018. <p><?php echo $credit; ?></p>
                </footer>

            </div>

        <div id="custom-modalcuti" class="modal-demo">
            <div class="modal-dialog"> 
                <div class="modal-content"> 
                    <div class="custom-modal-title"> 
                        <button type="button" class="close" onclick="Custombox.close();"><span>&times;</span><span class="sr-only">Close</span></button> 
                        <h4 class="custom-modal-title">Transaksi Cuti</h4> 
                    </div> 
                    <div class="modal-body"> 
                        <div class="row"> 
                            <div class="input-daterange input-group" id="date-range">
                                <input type="text" placeholder="Awal Cuti" class="form-control" id="field-1" />
                                <span class="input-group-addon bg-custom b-0 text-white">to</span>
                                <input type="text" placeholder="Akhir Cuti" class="form-control" id="field-2" />
                            </div>
                        </div> 
                        <div class="row"> 
                            <div class="col-md-12"> 
                                <div class="form-group no-margin"> 
                                    <label for="field-13" class="control-label">Keterangan</label> 
                                    <textarea class="form-control autogrow" id="field-3" placeholder="Keterangan" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                                </div> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="modal-footer"> 
                        <button type="button" class="btn btn-default waves-effect" onclick="Custombox.close();" data-dismiss="modal">Close</button> 
                        <button type="button" class="btn btn-info waves-effect waves-light" id="btn_simpancuti">Simpan</button> 
                    </div> 
                </div> 
            </div>
        </div>

        </div>
        <!-- END wrapper -->
<div id="module-opt" class="fc-popover fc-more-popover hidden" style="z-index: 100; top: 255px; left: 886px;">
  <div class="fc-header fc-widget-header"style="background-color: #34d3eb !important;"> <span class="fc-close fc-icon fc-icon-x" onclick="hidetool()"></span>
    <span class="fc-title" style="color:#fff;font-size: 15px;font-weight: 600;">Add Options</span>
    <div class="fc-clear"></div>
  </div>
  <div class="fc-body fc-widget-content" style="background-color:#fff;overflow: auto; height: 130px;">
    <div class="fc-event-container"> 
        <a href="#custom-modalcuti" class="fc-day-grid-event fc-h-event fc-event fc-start fc-end  fc-draggable cutinav" data-animation="slit" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a" style="background-color:#fb6d9d">
            <div class="fc-content"> <span class="fc-title">Cuti</span></div>
        </a>
    </div>
  </div>
</div>

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/detect.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/fastclick.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/counterup/jquery.counterup.min.js"></script>


        <script src="<?php echo base_url(); ?>assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.app.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/ladda-buttons/js/spin.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/ladda-buttons/js/ladda.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/ladda-buttons/js/ladda.jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/moment/moment.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src='<?php echo base_url(); ?>assets/plugins/fullcalendar/js/fullcalendar.min.js'></script>
        <script src="<?php echo base_url(); ?>assets/plugins/custombox/js/custombox.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/autoNumeric/autoNumeric.js" type="text/javascript"></script>
        <!--<script src="<?php echo base_url(); ?>assets/pages/jquery.fullcalendar.js"></script>-->
       
        <script type="text/javascript">
                function hidetool(){
                    $('#module-opt').addClass('hidden');
                }
              $('.autonumber').autoNumeric('init'); 
                $('.select2').select2();
                jQuery('#date-range').datepicker({
                    toggleActive: true,
                    format: "dd/mm/yyyy"
                });
                jQuery('#date-range1').datepicker({
                    toggleActive: true,
                    format: "dd/mm/yyyy"
                });
                var defaultEvents =  [{
                    title: 'Hey!',
                    start: new Date($.now() + 158000000),
                    className: 'bg-purple'
                }, {
                    title: 'See John Deo',
                    start: new Date($.now()),
                    end: new Date($.now()),
                    className: 'bg-danger'
                }, {
                    title: 'Buy a Theme',
                    start: new Date($.now() + 338000000),
                    className: 'bg-primary'
                }];
                var coba = [];
                 <?php
                 $stringarray = "";

                 foreach($kalender->result_array() as $list){
                    ?>
                    coba.push({title:"<?php echo $list['nama']?>",className:"<?php echo $list['class']?>", start:new Date("<?php echo $list['startdate'] ?>"),end:new Date("<?php echo $list['enddate'] ?>")});
                    <?php
                 }
                 ?>
                 function getKalender(){
                     $.getJSON( "<?php echo base_url().'index.php/dashboard_administrator/getKalender'?>", function( data ) {
                      coba = [];
                      $.each( data, function( key, val ) {
                        coba.push({title:val.nama,className:val.class, start:new Date(val.startdate),end:new Date(val.enddate)});
                      });
                    });
                    $('#calendar').fullCalendar('refresh');
                 }
                 function getView(data,tanggal){
                     $.getJSON( "<?php echo base_url().'index.php/dashboard_administrator/getData'?>", {title:data, tanggal:tanggal}, function( respon ) {
                        $('.infohtml').empty();
                        $('.infohtml').append(respon.respon);
                        $('#event-modal').modal('show');
                    });
                 }
                 getKalender();
                $('#calendar').fullCalendar({
                    slotDuration: '00:15:00', /* If we want to split day time each 15minutes */
                    minTime: '08:00:00',
                    maxTime: '19:00:00',  
                    defaultView: 'month',  
                    handleWindowResize: true,   
                    height: $(window).height() - 200,   
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    events: coba,
                    editable: true,
                    droppable: true, // this allows things to be dropped onto the calendar !!!
                    eventLimit: true, // allow "more" link when too many events
                    selectable: true,
                    eventRender: function(eventObj, $el) {
                        var start = eventObj.start;
                        var end = eventObj.end || start;
                      $el.popover({
                        title: eventObj.title,
                        content: moment(eventObj.start).format('DD/MM/YYYY')+ ' - ' + moment(end).format('DD/MM/YYYY'),
                        trigger: 'hover',
                        placement: 'top',
                        container: 'body'
                      });
                    },
                    dayClick: function(date, jsEvent, view) {
                        var event_date = date.format();
                        $('#field-1').datepicker('setDate', new Date(event_date));
                        $('#field-13').datepicker('setDate', new Date(event_date));
                        var eventInfo = $("#module-opt");
                        var mousex = jsEvent.pageX + 20; //Get X coodrinates
                        var mousey = jsEvent.pageY + 20; //Get Y coordinates
                        var tipWidth = eventInfo.width(); //Find width of tooltip
                        var tipHeight = eventInfo.height(); //Find height of tooltip

                        //Distance of element from the right edge of viewport
                        var tipVisX = $(window).width() - (mousex + tipWidth);
                        //Distance of element from the bottom of viewport
                        var tipVisY = $(window).height() - (mousey + tipHeight);

                        if (tipVisX < 20) { //If tooltip exceeds the X coordinate of viewport
                            mousex = jsEvent.pageX - tipWidth - 20;
                        } if (tipVisY < 20) { //If tooltip exceeds the Y coordinate of viewport
                            mousey = jsEvent.pageY - tipHeight - 0;
                        }
                        //Absolute position the tooltip according to mouse position
                        eventInfo.css({ top: mousey, left: mousex });
                        eventInfo.removeClass('hidden'); //Show tool tip

                    },
                    drop: function(date) { $this.onDrop($(this), date); },
                    //select: function (start, end, allDay) { $this.onSelect(start, end, allDay); },
                    eventClick: function(calEvent, jsEvent, view) { 
                        getView(calEvent.title,moment(calEvent.start).format('DD-MM-YYYY'));
                    }

                });
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
                // Bind normal buttons
                $('#btn_masuk').click(function(e){
                    e.preventDefault();
                    var l = Ladda.create(this);
                    l.start();
                    /*setTimeout(function() {
                        l.stop();
                        $('#btn_masuk').addClass('hidden');
                        $('#btn_keluar').removeClass('hidden');
                    }, 12000);*/
                    $.post("<?php echo base_url().'index.php/dashboard_administrator/masuk'?>",
                      function(response){
                      }, "json")
                    .done(function( data ) {
                        alert( "Data Loaded: " + data );
                        $('#btn_keluar').removeClass('hidden');
                        $('#btn_masuk').addClass('hidden');
                        l.stop();
                    });
                    return false;
                });
                $('#btn_keluar').click(function(e){
                    e.preventDefault();
                    var l = Ladda.create(this);
                    l.start();
                    $.post("<?php echo base_url().'index.php/dashboard_administrator/keluar'?>",
                      function(response){
                      }, "json")
                    .done(function( data ) {
                        location.reload();
                        /*$('#btn_keluar').addClass('hidden');
                        $('#btn_masuk').removeClass('hidden');
                        l.stop();*/
                        
                    });
                    return false;
                });
                function clearForm(){
                    $('#field-1').val('');
                    $('#field-2').val('');
                    $('#field-3').val('');
                    $('#field-11').val('').trigger('change');
                    $('#field-15').val('');
                    $('#field-16').val('');
                    $('#field-12').val('');
                    $('#field-13').val('');
                    $('#field-14').val('');
                }
                //Simpan Barang
                $('#btn_simpancuti').on('click',function(){
                    var a1=$('#field-1').val();
                    var b1=$('#field-2').val();
                    var c1=$('#field-3').val();
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('index.php/transaksi_cuti/simpan_cuti')?>",
                        dataType : "JSON",
                        data : {a1:a1 , b1:b1, c1:c1},
                        success: function(data){
                            Custombox.close();
                            clearForm();
                            getKalender();
                        }
                    });
                    return false;
                });  

            });
        </script>




    </body>
</html>